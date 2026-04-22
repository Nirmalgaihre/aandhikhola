<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $this->sendCredentialsEmail($request->email, $request->name, $request->password, "Account Created");

        return redirect()->route('users.index')->with('success', 'Admin created and email sent!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Only update password and send mail if a new password is typed
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $this->sendCredentialsEmail($user->email, $user->name, $request->password, "Account Updated / Password Reset");
        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id) {
        if(auth()->id() == $id) return back()->with('error', 'You cannot delete yourself!');
        User::findOrFail($id)->delete();
        return back()->with('success', 'User deleted!');
    }

    private function sendCredentialsEmail($email, $name, $password, $subjectType) {
    // Exact casing found: app -> Libraries -> PHPMailer
    $path = base_path('app/Libraries/PHPMailer/');

    require_once $path . 'Exception.php';
    require_once $path . 'PHPMailer.php';
    require_once $path . 'SMTP.php';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ctevt.abps@gmail.com'; 
        $mail->Password   = 'notg mygm tlyr vgpw'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; 

        $mail->setFrom('ctevt.abps@gmail.com', 'ABPS Admin');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "$subjectType - ABPS CMS";
        $mail->Body    = "
            <div style='font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px;'>
                <h2 style='color: #1d0647;'>$subjectType</h2>
                <p>Hello <b>$name</b>,</p>
                <p>Your login credentials for ABPS CMS have been issued/updated.</p>
                <p style='background: #f4f4f4; padding: 10px; border-radius: 5px;'>
                    <b>Email:</b> $email<br>
                    <b>Password:</b> $password
                </p>
                <p>Please login at: <a href='" . url('/login') . "'>" . url('/login') . "</a></p>
            </div>";

        $mail->send();
    } catch (Exception $e) {
        \Log::error("Mail failed: " . $mail->ErrorInfo);
    }
}
}