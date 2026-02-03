<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST" action="{{ route('register') }}">
@csrf

<input type="text" name="nama" placeholder="Nama Lengkap" required><br><br>

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br><br>

<button type="submit">Daftar</button>

</form>

<a href="/login">Sudah punya akun? Login</a>

</body>
</html>