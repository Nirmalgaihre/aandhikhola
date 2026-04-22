<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Manually require the library from your public folder
require_once public_path('fpdf/fpdf.php');

/**
 * Custom PDF Class to handle Watermarks and Rotated Text
 */
class CertificatePDF extends \FPDF {
    var $angle = 0;

    function RotatedText($x, $y, $txt, $angle) {
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

    function Rotate($angle, $x = -1, $y = -1) {
        if($x == -1) $x = $this->x;
        if($y == -1) $y = $this->y;
        if($this->angle != 0) $this->_out('Q');
        $this->angle = $angle;
        if($angle != 0) {
            $angle *= M_PI / 180;
            $c = cos($angle);
            $s = sin($angle);
            $cx = $x * $this->k;
            $cy = ($this->h - $y) * $this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.5F %.5F cm 1 0 0 1 %.5F %.5F cm',
                $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
        }
    }
}

class CertificateController extends Controller
{
    /**
     * Display a listing of certificates.
     */
    public function index() {
        $certificates = DB::table('student_certificates')->orderBy('id', 'desc')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new certificate.
     */
    public function create() {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created certificate (Timestamps removed to prevent SQL errors)
     */
    public function store(Request $request) {
        $data = $request->except('_token');
        DB::table('student_certificates')->insert($data);
        return redirect()->route('certificates.index')->with('success', 'Certificate added successfully!');
    }

    /**
     * Show the form for editing.
     */
    public function edit($id) {
        $certificate = DB::table('student_certificates')->where('id', $id)->first();
        if (!$certificate) {
            return redirect()->route('certificates.index')->with('error', 'Record not found.');
        }
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the certificate (Timestamps removed to prevent SQL errors)
     */
    public function update(Request $request, $id) {
        $data = $request->except(['_token', '_method']);
        DB::table('student_certificates')->where('id', $id)->update($data);
        return redirect()->route('certificates.index')->with('success', 'Certificate updated!');
    }

    /**
     * Delete a certificate.
     */
    public function destroy($id) {
        DB::table('student_certificates')->where('id', $id)->delete();
        return back()->with('success', 'Record removed.');
    }

    /**
     * Generate the FPDF Certificate with Watermark & Copyright style
     */
    public function print($id) {
        $certificate = DB::table('student_certificates')->where('id', $id)->first();

        if (!$certificate) {
            abort(404, 'Certificate not found.');
        }

        $data = (array) $certificate;
        $pdf = new CertificatePDF('L', 'mm', 'A4');
        $pdf->AddPage();

        /* COLORS */
        $customBlue = [0, 51, 102]; 
        $black = [0, 0, 0];

        /* BORDER */
        $pdf->SetDrawColor(...$customBlue);
        $pdf->SetLineWidth(2.2);
        $pdf->Rect(10, 10, 277, 190);
        $pdf->SetLineWidth(0.6);
        $pdf->Rect(13, 13, 271, 184);

        /* WATERMARK (Added Copyright/Security feel) */
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetTextColor(235, 235, 235);
        for ($y = 30; $y <= 200; $y += 40) {
            for ($x = 10; $x <= 280; $x += 70) {
                $pdf->RotatedText($x, $y, 'OFFICIAL DOCUMENT - AKPI', 45);
            }
        }

        /* HEADER */
        $pdf->Image('https://abps.edu.np/assets/img/logo.png', 22, 22, 28);
        $pdf->SetFont('Times', 'B', 16);
        $pdf->SetTextColor(...$customBlue);
        $pdf->SetXY(65, 24);
        $pdf->Cell(170, 8, 'Council for Technical Education and Vocational Training', 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 19);
        $pdf->SetXY(65, 33);
        $pdf->Cell(170, 7, 'Aandhikhola Technical Institute', 0, 1, 'C');
        $pdf->SetFont('Times', '', 11);
        $pdf->SetXY(65, 41);
        $pdf->Cell(170, 6, 'Walling-13, Syangja, Nepal', 0, 1, 'C');

        /* PHOTO BOX */
        $pdf->SetDrawColor(200, 200, 200);
        $pdf->Rect(245, 22, 32, 38);
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetXY(245, 61);
        $pdf->Cell(32, 4, '', 0, 0, 'C');

        /* ISSUE NUMBER */
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetTextColor(...$customBlue);
        $pdf->SetXY(22, 58);
        $pdf->Cell(80, 6, 'Issue No: ' . $data['issue_no'], 0, 0);

        /* TITLE */
        $pdf->SetY(72);
        $pdf->SetFont('Times', 'B', 22);
        $pdf->SetTextColor(...$customBlue);
        $pdf->Cell(0, 12, 'CHARACTER / TRANSFER CERTIFICATE', 0, 1, 'C');

        /* MAIN BODY TEXT */
        $pdf->SetLeftMargin(28);
        $pdf->SetRightMargin(28);
        $pdf->SetY(95);
        $pdf->SetFont('Times', '', 14);
        $pdf->SetTextColor(...$customBlue); 
        $lh = 9;

        $parentName = $data['father_name'] ?: $data['mother_name'];

        $pdf->Write($lh, "This is to certify that ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['full_name']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, ", son/daughter of ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, "Mr. / Mrs. " . $parentName); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, ", resident of ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['municipality']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " municipality/R.M, ward no. ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['ward_number']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " of District ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['district']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " and province ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['province']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " had been a bonafide student of this institute from ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['year_from']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " to ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['year_to']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " BS. He/She has successfully completed the final exam of the three years ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['course']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " course conducted by CTEVT in ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['pass_year'] ?: $data['year_to']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " with ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['division']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " division and ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['percentage'] . " %"); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, " marks according to API record his/her date of birth is ");
        $pdf->SetFont('Times', 'B', 14); $pdf->Write($lh, $data['dob_nepali']); 
        $pdf->SetFont('Times', '', 14); $pdf->Write($lh, ". We know nothing against his/her moral character.");

        /* REGISTRATION & DATE */
        $pdf->SetY(150);
        $pdf->SetTextColor(...$customBlue);
        $pdf->SetFont('Times', 'B', 12); 
        $pdf->Cell(100, 6, 'CTEVT Reg No : ' . $data['ctevt_reg_no'], 0, 1);
        $pdf->Cell(100, 6, 'Issue Date     : ' . $data['issue_date_nepali'], 0, 1);

        /* SIGNATURE SECTION */
        $pdf->SetY(175);
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell(85, 5, '____________________', 0, 0, 'C');
        $pdf->Cell(85, 5, '____________________', 0, 0, 'C');
        $pdf->Cell(85, 5, '____________________', 0, 1, 'C');
        $pdf->Cell(85, 7, 'Prepared By', 0, 0, 'C');
        $pdf->Cell(85, 7, 'Checked By', 0, 0, 'C');
        $pdf->Cell(85, 7, 'Principal', 0, 1, 'C');
        return response($pdf->Output('S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="Certificate_' . $data['full_name'] . '.pdf"');
    }
}