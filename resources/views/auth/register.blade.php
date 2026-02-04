<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Akun - SS-Mart</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
/* ══════════════════════════════════════════════
   GLOBAL
   ══════════════════════════════════════════════ */
:root{
  --ink:#0b1a12;
  --forest:#0f3d25;
  --moss:#1a5c38;
  --leaf:#2e8b57;
  --gold:#c9a227;
  --gold-soft:#e8d48b;
  --warm:#faf8f4;
  --sand:#ebe6dd;
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

/* ══════════════════════════════════════════════
   REGISTER PAGE
   ══════════════════════════════════════════════ */
.register-container{
  display:flex; height:100vh; overflow:hidden;
}

/* ─── LEFT PANEL ─── */
.register-left{
  flex:1; background:var(--ink);
  position:relative; overflow:hidden;
  display:flex; flex-direction:column;
  justify-content:flex-end; padding:56px;
}

/* Blobs */
.register-left .lb1, .register-left .lb2{
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

/* Woven texture */
.register-left::before{
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
  max-width:360px;
}

/* ─── RIGHT PANEL ─── */
.register-right{
  width:520px; background:var(--warm);
  display:flex; align-items:center; justify-content:center;
  padding:60px 56px;
  overflow-y:auto;
}

.register-box{ width:100%; max-width:380px; }

.register-box h2{
  font-family:'Cormorant Garamond',serif;
  font-size:34px; font-weight:600;
  color:var(--forest); margin-bottom:6px;
}

.register-sub{
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

.register-btn{
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

.register-btn:hover{
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

/* Password strength indicator */
.password-strength{
  margin-top:8px; display:flex; gap:4px; height:3px;
}

.ps-bar{
  flex:1; background:var(--sand);
  border-radius:2px;
  transition:background .3s;
}

.ps-bar.active{ background:var(--moss); }
.ps-bar.weak{ background:#e04848; }
.ps-bar.medium{ background:#f59e0b; }
.ps-bar.strong{ background:var(--moss); }

.ps-label{
  font-size:11px; font-weight:500;
  margin-top:6px; color:rgba(11,26,18,0.4);
}

/* Toast notification */
.toast{
  position:fixed; top:28px; right:28px; z-index:1000;
  background:var(--ink); color:#fff;
  padding:14px 22px; border-radius:12px;
  font-size:14px; font-weight:500;
  display:flex; align-items:center; gap:10px;
  transform:translateY(-80px); opacity:0;
  transition:transform .4s cubic-bezier(.22,1,.36,1), opacity .4s;
  box-shadow:0 8px 30px rgba(0,0,0,0.25);
  max-width:340px;
}

.toast.show{ transform:translateY(0); opacity:1; }
.toast .t-icon{ font-size:18px; }

/* Error state */
.input-wrap.error{
  border-color:#e04848;
  box-shadow:0 0 0 3px rgba(224,72,72,0.12);
}

.error-msg{
  font-size:12px; color:#e04848;
  margin-top:6px; font-weight:500;
  display:none;
}

.error-msg.show{ display:block; }

/* ══════════════════════════════════════════════
   RESPONSIVE
   ══════════════════════════════════════════════ */
@media(max-width:900px){
  .register-container{ flex-direction:column; }
  .register-left{
    flex:none; height:180px;
    padding:32px 28px; justify-content:center;
  }
  .logo-big{ font-size:32px; }
  .logo-tagline{ font-size:13px; max-width:100%; }
  .lb1{ width:240px; height:240px; top:-80px; right:-40px; }
  .lb2{ width:180px; height:180px; bottom:-40px; left:10%; }
  .register-right{
    width:100%; flex:1;
    padding:40px 28px;
  }
}

@media(max-width:480px){
  .register-box{ max-width:100%; }
  .register-left{ height:140px; padding:24px 20px; }
  .logo-big{ font-size:26px; }
  .register-right{ padding:32px 20px; }
}
</style>
</head>
<body>

<div class="register-container">
  <!-- LEFT PANEL -->
  <div class="register-left">
    <div class="lb1"></div>
    <div class="lb2"></div>
    <div class="logo-big">SS<em>-</em>MART</div>
    <p class="logo-tagline">
      Bergabunglah dengan ribuan pelanggan setia kami dan nikmati pengalaman
      belanja sarung premium terbaik di Indonesia.
    </p>
  </div>

  <!-- RIGHT PANEL -->
  <div class="register-right">
    <div class="register-box">
      <h2>Buat Akun Baru</h2>
      <p class="register-sub">Daftar untuk mulai berbelanja</p>

      <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <!-- Nama Lengkap -->
        <div class="input-group">
          <label for="nama">Nama Lengkap</label>
          <div class="input-wrap" id="wrapNama">
            <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
            <input 
              type="text" 
              name="nama" 
              id="nama"
              placeholder="Masukkan nama lengkap" 
              required
              value="{{ old('nama') }}">
          </div>
          <div class="error-msg" id="errNama">Nama harus diisi</div>
        </div>

        <!-- Email -->
        <div class="input-group">
          <label for="email">Email</label>
          <div class="input-wrap" id="wrapEmail">
            <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
            <input 
              type="email" 
              name="email" 
              id="email"
              placeholder="nama@email.com" 
              required
              value="{{ old('email') }}">
          </div>
          <div class="error-msg" id="errEmail">Email tidak valid</div>
        </div>

        <!-- Password -->
        <div class="input-group">
          <label for="password">Password</label>
          <div class="input-wrap" id="wrapPass">
            <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
            <input 
              type="password" 
              name="password" 
              id="password"
              placeholder="Minimal 8 karakter" 
              required>
          </div>
          <div class="password-strength" id="passStrength">
            <div class="ps-bar"></div>
            <div class="ps-bar"></div>
            <div class="ps-bar"></div>
            <div class="ps-bar"></div>
          </div>
          <div class="ps-label" id="passLabel">Kekuatan password</div>
          <div class="error-msg" id="errPass">Password minimal 8 karakter</div>
        </div>

        <!-- Konfirmasi Password -->
        <div class="input-group">
          <label for="password_confirmation">Konfirmasi Password</label>
          <div class="input-wrap" id="wrapConfirm">
            <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
            <input 
              type="password" 
              name="password_confirmation" 
              id="password_confirmation"
              placeholder="Ulangi password" 
              required>
          </div>
          <div class="error-msg" id="errConfirm">Password tidak cocok</div>
        </div>

        <button type="submit" class="register-btn">Daftar Sekarang</button>
      </form>

      <div class="login-link">
        <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
      </div>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast">
  <span class="t-icon" id="toastIcon">✓</span>
  <span id="toastMsg">Berhasil!</span>
</div>

<!-- JAVASCRIPT -->
<script>
/* ════════════════════════════════════════
   VALIDATION & PASSWORD STRENGTH
   ════════════════════════════════════════ */

// Password strength checker
const passInput = document.getElementById('password');
const strengthBars = document.querySelectorAll('.ps-bar');
const strengthLabel = document.getElementById('passLabel');

passInput.addEventListener('input', function() {
  const val = this.value;
  const len = val.length;
  
  // Reset
  strengthBars.forEach(bar => {
    bar.classList.remove('active','weak','medium','strong');
  });
  
  if(len === 0) {
    strengthLabel.textContent = 'Kekuatan password';
    strengthLabel.style.color = 'rgba(11,26,18,0.4)';
    return;
  }
  
  // Calculate strength
  let strength = 0;
  if(len >= 8) strength++;
  if(/[a-z]/.test(val) && /[A-Z]/.test(val)) strength++;
  if(/[0-9]/.test(val)) strength++;
  if(/[^a-zA-Z0-9]/.test(val)) strength++;
  
  // Apply visual feedback
  if(strength === 1) {
    strengthBars[0].classList.add('active','weak');
    strengthLabel.textContent = 'Password lemah';
    strengthLabel.style.color = '#e04848';
  } else if(strength === 2) {
    strengthBars[0].classList.add('active','medium');
    strengthBars[1].classList.add('active','medium');
    strengthLabel.textContent = 'Password sedang';
    strengthLabel.style.color = '#f59e0b';
  } else if(strength === 3) {
    strengthBars[0].classList.add('active','strong');
    strengthBars[1].classList.add('active','strong');
    strengthBars[2].classList.add('active','strong');
    strengthLabel.textContent = 'Password kuat';
    strengthLabel.style.color = '#1a5c38';
  } else if(strength === 4) {
    strengthBars.forEach(bar => bar.classList.add('active','strong'));
    strengthLabel.textContent = 'Password sangat kuat';
    strengthLabel.style.color = '#1a5c38';
  }
});

// Real-time validation
const form = document.getElementById('registerForm');
const namaInput = document.getElementById('nama');
const emailInput = document.getElementById('email');
const confirmInput = document.getElementById('password_confirmation');

// Email validation
emailInput.addEventListener('blur', function() {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const wrap = document.getElementById('wrapEmail');
  const err = document.getElementById('errEmail');
  
  if(!emailRegex.test(this.value) && this.value.length > 0) {
    wrap.classList.add('error');
    err.classList.add('show');
  } else {
    wrap.classList.remove('error');
    err.classList.remove('show');
  }
});

// Password match validation
confirmInput.addEventListener('input', function() {
  const wrap = document.getElementById('wrapConfirm');
  const err = document.getElementById('errConfirm');
  
  if(this.value !== passInput.value && this.value.length > 0) {
    wrap.classList.add('error');
    err.classList.add('show');
  } else {
    wrap.classList.remove('error');
    err.classList.remove('show');
  }
});

// Form submission validation
form.addEventListener('submit', function(e) {
  let valid = true;
  
  // Check nama
  if(namaInput.value.trim().length < 3) {
    document.getElementById('wrapNama').classList.add('error');
    document.getElementById('errNama').classList.add('show');
    document.getElementById('errNama').textContent = 'Nama minimal 3 karakter';
    valid = false;
  } else {
    document.getElementById('wrapNama').classList.remove('error');
    document.getElementById('errNama').classList.remove('show');
  }
  
  // Check email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if(!emailRegex.test(emailInput.value)) {
    document.getElementById('wrapEmail').classList.add('error');
    document.getElementById('errEmail').classList.add('show');
    valid = false;
  } else {
    document.getElementById('wrapEmail').classList.remove('error');
    document.getElementById('errEmail').classList.remove('show');
  }
  
  // Check password length
  if(passInput.value.length < 8) {
    document.getElementById('wrapPass').classList.add('error');
    document.getElementById('errPass').classList.add('show');
    valid = false;
  } else {
    document.getElementById('wrapPass').classList.remove('error');
    document.getElementById('errPass').classList.remove('show');
  }
  
  // Check password match
  if(confirmInput.value !== passInput.value) {
    document.getElementById('wrapConfirm').classList.add('error');
    document.getElementById('errConfirm').classList.add('show');
    valid = false;
  } else {
    document.getElementById('wrapConfirm').classList.remove('error');
    document.getElementById('errConfirm').classList.remove('show');
  }
  
  if(!valid) {
    e.preventDefault();
    showToast('⚠️', 'Mohon periksa kembali form Anda');
  }
});

/* ════════════════════════════════════════
   TOAST
   ════════════════════════════════════════ */
let toastTimer;
function showToast(icon, msg) {
  document.getElementById('toastIcon').textContent = icon;
  document.getElementById('toastMsg').textContent = msg;
  const toast = document.getElementById('toast');
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 3200);
}

// Show Laravel validation errors if any
@if($errors->any())
  showToast('⚠️', '{{ $errors->first() }}');
  
  @if($errors->has('nama'))
    document.getElementById('wrapNama').classList.add('error');
    document.getElementById('errNama').textContent = '{{ $errors->first("nama") }}';
    document.getElementById('errNama').classList.add('show');
  @endif
  
  @if($errors->has('email'))
    document.getElementById('wrapEmail').classList.add('error');
    document.getElementById('errEmail').textContent = '{{ $errors->first("email") }}';
    document.getElementById('errEmail').classList.add('show');
  @endif
  
  @if($errors->has('password'))
    document.getElementById('wrapPass').classList.add('error');
    document.getElementById('errPass').textContent = '{{ $errors->first("password") }}';
    document.getElementById('errPass').classList.add('show');
  @endif
@endif

// Show success message if redirected from somewhere
@if(session('success'))
  showToast('✓', '{{ session("success") }}');
@endif
</script>

</body>
</html>