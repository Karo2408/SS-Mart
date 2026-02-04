<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - SS-Mart Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{
  --ink:#0b1a12; --forest:#0f3d25; --moss:#1a5c38; --leaf:#2e8b57;
  --gold:#c9a227; --gold-soft:#e8d48b; --warm:#faf8f4; --sand:#ebe6dd;
}
*{ margin:0; padding:0; box-sizing:border-box; }
html,body{ height:100%; }
body{
  font-family:'Outfit',sans-serif;
  background:var(--warm);
  color:var(--ink);
  -webkit-font-smoothing:antialiased;
}
a{ text-decoration:none; color:inherit; }
input{ font-family:inherit; border:none; outline:none; background:transparent; }

.login-container{
  display:flex; height:100vh; overflow:hidden;
}

/* LEFT PANEL */
.login-left{
  flex:1; background:var(--ink);
  position:relative; overflow:hidden;
  display:flex; flex-direction:column;
  justify-content:flex-end; padding:56px;
}
.login-left .lb1, .login-left .lb2{
  position:absolute; border-radius:50%; pointer-events:none;
}
.lb1{
  width:380px; height:380px;
  background:radial-gradient(circle,rgba(46,139,87,0.35),transparent 65%);
  top:-100px; right:-80px;
  animation:lbf 9s ease-in-out infinite;
}
.lb2{
  width:260px; height:260px;
  background:radial-gradient(circle,rgba(201,162,39,0.2),transparent 60%);
  bottom:-60px; left:20%;
  animation:lbf 12s ease-in-out infinite reverse;
}
@keyframes lbf{
  0%,100%{ transform:translate(0,0); }
  50%    { transform:translate(22px,-18px); }
}
.login-left::before{
  content:''; position:absolute; inset:0;
  background-image:
    repeating-linear-gradient(0deg,transparent,transparent 39px,rgba(255,255,255,0.02) 39px,rgba(255,255,255,0.02) 40px),
    repeating-linear-gradient(90deg,transparent,transparent 39px,rgba(255,255,255,0.02) 39px,rgba(255,255,255,0.02) 40px);
  pointer-events:none;
}
.logo-big{
  position:relative; z-index:1;
  font-family:'Cormorant Garamond',serif;
  font-size:42px; font-weight:700;
  color:#fff; letter-spacing:4px;
}
.logo-big em{ color:var(--gold); font-style:normal; }
.logo-tagline{
  position:relative; z-index:1;
  color:rgba(255,255,255,0.38);
  font-size:15px; font-weight:300;
  margin-top:12px; line-height:1.7;
  max-width:320px;
}

/* RIGHT PANEL */
.login-right{
  width:480px; background:var(--warm);
  display:flex; align-items:center; justify-content:center;
  padding:60px 56px;
}
.login-box{ width:100%; max-width:340px; }
.login-box h2{
  font-family:'Cormorant Garamond',serif;
  font-size:34px; font-weight:600;
  color:var(--forest); margin-bottom:6px;
}
.login-sub{
  font-size:14px; color:rgba(11,26,18,0.45);
  font-weight:300; margin-bottom:36px;
}

.input-group{ margin-bottom:20px; }
.input-group label{
  display:block; font-size:12px; font-weight:600;
  letter-spacing:1.5px; text-transform:uppercase;
  color:var(--forest); margin-bottom:8px;
}
.input-wrap{
  position:relative;
  border:1.5px solid var(--sand);
  border-radius:12px;
  transition:border-color .3s, box-shadow .3s;
  background:#fff;
}
.input-wrap:focus-within{
  border-color:var(--moss);
  box-shadow:0 0 0 3px rgba(26,92,56,0.12);
}
.input-wrap.error{
  border-color:#e04848;
  box-shadow:0 0 0 3px rgba(224,72,72,0.12);
}
.i-icon{
  position:absolute; left:16px; top:50%;
  transform:translateY(-50%);
  width:18px; height:18px;
  color:rgba(11,26,18,0.3);
}
.input-wrap input{
  width:100%; padding:14px 16px 14px 44px;
  font-size:14px; color:var(--ink);
  border-radius:12px;
}
.input-wrap input::placeholder{ color:rgba(11,26,18,0.3); }

.error-msg{
  font-size:12px; color:#e04848;
  margin-top:6px; font-weight:500;
}

.login-btn{
  width:100%; margin-top:8px;
  background:linear-gradient(135deg,var(--gold),#b8911f);
  color:var(--ink);
  border:none; padding:15px;
  border-radius:12px;
  font-family:inherit; font-size:14px; font-weight:600;
  letter-spacing:1px; cursor:pointer;
  transition:transform .25s, box-shadow .25s;
  box-shadow:0 4px 20px rgba(201,162,39,0.3);
}
.login-btn:hover{
  transform:translateY(-2px);
  box-shadow:0 8px 28px rgba(201,162,39,0.45);
}

.login-link{
  margin-top:28px; text-align:center;
  padding:16px;
  background:rgba(26,92,56,0.04);
  border-radius:10px;
  border:1px solid rgba(26,92,56,0.08);
}
.login-link p{
  font-size:13px; color:rgba(11,26,18,0.5);
  font-weight:300;
}
.login-link a{
  color:var(--moss); font-weight:600;
  border-bottom:1.5px solid var(--gold);
  padding-bottom:1px;
  transition:color .25s;
}
.login-link a:hover{ color:var(--forest); }

@media(max-width:900px){
  .login-container{ flex-direction:column; }
  .login-left{ flex:none; height:180px; padding:32px 28px; justify-content:center; }
  .logo-big{ font-size:32px; }
  .logo-tagline{ font-size:13px; max-width:100%; }
  .lb1{ width:240px; height:240px; top:-80px; right:-40px; }
  .lb2{ width:180px; height:180px; bottom:-40px; left:10%; }
  .login-right{ width:100%; flex:1; padding:40px 28px; }
}
</style>
</head>
<body>

<div class="login-container">
  <div class="login-left">
    <div class="lb1"></div>
    <div class="lb2"></div>
    <div class="logo-big">SS<em>-</em>MART</div>
    <p class="logo-tagline">Panel administrasi untuk mengelola toko sarung online Anda dengan mudah dan efisien.</p>
  </div>

  <div class="login-right">
    <div class="login-box">
      <h2>Selamat Datang</h2>
      <p class="login-sub">Login ke panel admin Anda</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
          <label for="email">Email</label>
          <div class="input-wrap @error('email') error @enderror">
            <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
            <input 
              type="email" 
              id="email" 
              name="email" 
              placeholder="admin@ssmart.com" 
              value="{{ old('email') }}"
              required
              autofocus>
          </div>
          @error('email')
            <div class="error-msg">{{ $message }}</div>
          @enderror
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <div class="input-wrap @error('password') error @enderror">
            <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
            <input 
              type="password" 
              id="password" 
              name="password" 
              placeholder="••••••••"
              required>
          </div>
          @error('password')
            <div class="error-msg">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="login-btn">Masuk ke Dashboard</button>
      </form>

      <div class="login-link">
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>