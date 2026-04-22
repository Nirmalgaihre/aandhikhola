<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <style>
        body { font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4; }
        .card { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #1a3c6d; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; border-radius: 4px; }
        .error { color: red; font-size: 13px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Enter OTP</h2>
        <p>A 6-digit code was sent to your email.</p>
        @if($errors->any()) <div class="error">{{ $errors->first() }}</div> @endif
        <form method="POST" action="{{ url('/verify-otp') }}">
            @csrf
            <input type="text" name="otp" placeholder="6-digit code" required autofocus>
            <button type="submit">Verify & Login</button>
        </form>
    </div>
</body>
</html>