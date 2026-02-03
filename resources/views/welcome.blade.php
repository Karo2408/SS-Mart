<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SS-Mart | Pusat Sarung Original</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
/* ════════════════════════════════════════════
   RESET & VARS
   ════════════════════════════════════════════ */
:root {
  --ink:        #0b1a12;
  --forest:     #0f3d25;
  --moss:       #1a5c38;
  --leaf:       #2e8b57;
  --sage:       #6baa85;
  --gold:       #c9a227;
  --gold-soft:  #e8d48b;
  --cream:      #f5f1eb;
  --warm-white: #faf8f4;
  --sand:       #ede8df;
  --glass:      rgba(255,255,255,0.07);
  --glass-b:    rgba(255,255,255,0.12);
}

*{ margin:0; padding:0; box-sizing:border-box; }
html{ scroll-behavior:smooth; }
body{
  font-family:'Outfit',sans-serif;
  background:var(--cream);
  color:var(--ink);
  overflow-x:hidden;
  -webkit-font-smoothing:antialiased;
}
a{ text-decoration:none; color:inherit; }
img{ display:block; }

/* ════════════════════════════════════════════
   CURSOR
   ════════════════════════════════════════════ */
.cursor{
  width:12px; height:12px;
  background:var(--gold);
  border-radius:50%;
  position:fixed; top:0; left:0;
  pointer-events:none;
  z-index:9999;
  transform:translate(-50%,-50%);
  transition:transform .15s ease, width .3s ease, height .3s ease, background .3s;
  mix-blend-mode:difference;
}
.cursor.expand{
  width:44px; height:44px;
  background:var(--gold-soft);
}

/* ════════════════════════════════════════════
   NAVBAR
   ════════════════════════════════════════════ */
nav{
  position:fixed; top:0; left:0; right:0;
  z-index:200;
  padding:22px 56px;
  display:flex; justify-content:space-between; align-items:center;
  transition:padding .4s cubic-bezier(.22,1,.36,1), background .4s;
  background:transparent;
}
nav.scrolled{
  padding:14px 56px;
  background:rgba(11,26,18,0.88);
  backdrop-filter:blur(22px);
  -webkit-backdrop-filter:blur(22px);
  border-bottom:1px solid rgba(201,162,39,0.12);
}
.logo{
  font-family:'Cormorant Garamond',serif;
  font-size:28px; font-weight:700;
  color:#fff; letter-spacing:3px;
  text-transform:uppercase;
}
.logo em{ font-style:normal; color:var(--gold); }

.nav-links{ display:flex; gap:36px; align-items:center; }
.nav-links a{
  color:rgba(255,255,255,0.6);
  font-size:13px; font-weight:500;
  letter-spacing:1.8px; text-transform:uppercase;
  position:relative; padding-bottom:6px;
  transition:color .3s;
}
.nav-links a::after{
  content:''; position:absolute;
  bottom:0; left:50%; transform:translateX(-50%);
  width:0; height:1px; background:var(--gold);
  transition:width .35s;
}
.nav-links a:hover{ color:#fff; }
.nav-links a:hover::after{ width:100%; }

.nav-btn{
  background:linear-gradient(135deg,var(--gold),#b8911f);
  color:var(--ink) !important;
  padding:10px 26px; border-radius:40px;
  font-weight:600 !important; font-size:12px !important;
  letter-spacing:1.2px !important;
  box-shadow:0 4px 20px rgba(201,162,39,0.3);
  transition:transform .25s, box-shadow .25s !important;
}
.nav-btn::after{ display:none !important; }
.nav-btn:hover{ transform:translateY(-2px); box-shadow:0 8px 28px rgba(201,162,39,0.45); }

/* ════════════════════════════════════════════
   HERO
   ════════════════════════════════════════════ */
.hero{
  min-height:100vh;
  background:var(--ink);
  position:relative;
  display:flex; flex-direction:column;
  justify-content:center; align-items:center;
  text-align:center;
  padding:140px 40px 100px;
  overflow:hidden;
}

/* Woven grid texture */
.hero::before{
  content:'';
  position:absolute; inset:0;
  background-image:
    repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(255,255,255,0.018) 39px, rgba(255,255,255,0.018) 40px),
    repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(255,255,255,0.018) 39px, rgba(255,255,255,0.018) 40px);
  pointer-events:none;
}

/* Blobs */
.b1,.b2,.b3,.b4{ position:absolute; border-radius:50%; pointer-events:none; }
.b1{ width:600px; height:600px; top:-200px; left:-180px;
     background:radial-gradient(circle at 40% 40%,rgba(46,139,87,0.4),transparent 65%);
     animation:driftA 11s ease-in-out infinite; }
.b2{ width:420px; height:420px; bottom:-140px; right:-100px;
     background:radial-gradient(circle,rgba(201,162,39,0.22),transparent 60%);
     animation:driftB 14s ease-in-out infinite; }
.b3{ width:280px; height:280px; top:55%; left:60%;
     background:radial-gradient(circle,rgba(46,139,87,0.28),transparent 60%);
     animation:driftA 9s ease-in-out infinite reverse; }
.b4{ width:180px; height:180px; top:20%; right:15%;
     background:radial-gradient(circle,rgba(201,162,39,0.15),transparent 55%);
     animation:driftB 7s ease-in-out infinite; }

@keyframes driftA{
  0%,100%{ transform:translate(0,0) scale(1); }
  33%    { transform:translate(30px,-24px) scale(1.05); }
  66%    { transform:translate(-18px,20px) scale(0.97); }
}
@keyframes driftB{
  0%,100%{ transform:translate(0,0) scale(1); }
  50%    { transform:translate(-28px,22px) scale(1.07); }
}

/* Diagonal accent line */
.hero-diag{
  position:absolute;
  top:0; right:0;
  width:55%; height:100%;
  overflow:hidden;
  pointer-events:none;
}
.hero-diag::before{
  content:'';
  position:absolute;
  top:-10%; right:-5%;
  width:100%; height:120%;
  background:linear-gradient(160deg, transparent 40%, rgba(46,139,87,0.06) 40%, rgba(46,139,87,0.06) 41%, transparent 41%);
}

.hero-content{ position:relative; z-index:2; max-width:820px; }

/* Animated badge */
.badge{
  display:inline-flex; align-items:center; gap:10px;
  border:1px solid rgba(201,162,39,0.28);
  background:rgba(201,162,39,0.08);
  padding:8px 20px; border-radius:40px;
  color:var(--gold-soft);
  font-size:12px; font-weight:500;
  letter-spacing:2px; text-transform:uppercase;
  margin-bottom:36px;
  opacity:0; animation:riseIn .8s .15s forwards;
}
.badge-dot{
  width:8px; height:8px;
  background:var(--gold); border-radius:50%;
  animation:blink 2.2s ease-in-out infinite;
}
@keyframes blink{ 0%,100%{opacity:1;} 50%{opacity:.35;} }

.hero h1{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(44px,7.5vw,82px);
  font-weight:600; line-height:1.05;
  color:#fff; letter-spacing:-1px;
  opacity:0; animation:riseIn .9s .35s forwards;
}
.hero h1 .line2{
  display:block;
  font-style:italic; font-weight:300;
  color:var(--gold-soft);
  margin-top:6px;
}

.hero-sub{
  font-size:16px; font-weight:300;
  color:rgba(255,255,255,0.5);
  max-width:520px; margin:28px auto 0;
  line-height:1.8;
  opacity:0; animation:riseIn .9s .55s forwards;
}

.hero-btns{
  display:flex; justify-content:center;
  gap:18px; margin-top:44px; flex-wrap:wrap;
  opacity:0; animation:riseIn .9s .72s forwards;
}

/* Primary glow btn */
.btn-glow{
  position:relative;
  background:linear-gradient(135deg,var(--gold),#b8911f);
  color:var(--ink);
  padding:16px 40px; border-radius:50px;
  font-weight:600; font-size:14px;
  letter-spacing:0.8px;
  overflow:hidden;
  transition:transform .3s, box-shadow .3s;
  box-shadow:0 6px 30px rgba(201,162,39,0.38);
}
.btn-glow::before{
  content:''; position:absolute; inset:0;
  background:linear-gradient(135deg,rgba(255,255,255,0.25),transparent 50%);
  opacity:0; transition:opacity .35s;
}
.btn-glow:hover{ transform:translateY(-2px); box-shadow:0 12px 40px rgba(201,162,39,0.5); }
.btn-glow:hover::before{ opacity:1; }
.btn-glow span{ position:relative; z-index:1; }

.btn-ghost{
  border:1.5px solid rgba(255,255,255,0.2);
  color:rgba(255,255,255,0.75);
  padding:16px 40px; border-radius:50px;
  font-weight:400; font-size:14px;
  letter-spacing:0.8px;
  transition:border-color .3s, background .3s, color .3s;
}
.btn-ghost:hover{
  border-color:rgba(255,255,255,0.5);
  background:rgba(255,255,255,0.06);
  color:#fff;
}

@keyframes riseIn{
  from{ opacity:0; transform:translateY(32px); }
  to  { opacity:1; transform:translateY(0); }
}

/* Scroll chevron */
.scroll-cue{
  position:absolute; bottom:42px; left:50%;
  transform:translateX(-50%); z-index:3;
  display:flex; flex-direction:column;
  align-items:center; gap:8px;
}
.scroll-cue span{
  font-size:10px; letter-spacing:3px;
  text-transform:uppercase; color:rgba(255,255,255,0.3);
}
.scroll-cue .chevron{
  width:20px; height:20px;
  border-right:1.5px solid rgba(255,255,255,0.35);
  border-bottom:1.5px solid rgba(255,255,255,0.35);
  transform:rotate(45deg);
  animation:chev 2s ease-in-out infinite;
}
@keyframes chev{
  0%   { opacity:1; transform:rotate(45deg) translate(0,0); }
  100% { opacity:0; transform:rotate(45deg) translate(6px,6px); }
}

/* ════════════════════════════════════════════
   MARQUEE BRANDS
   ════════════════════════════════════════════ */
.marquee-wrap{
  background:var(--warm-white);
  border-top:1px solid var(--sand);
  border-bottom:1px solid var(--sand);
  padding:32px 0;
  overflow:hidden;
  white-space:nowrap;
}
.marquee-track{
  display:inline-flex; gap:0;
  animation:scroll 22s linear infinite;
}
.marquee-track:hover{ animation-play-state:paused; }
.m-item{
  display:inline-flex; align-items:center;
  gap:0; padding:0 44px;
}
.m-name{
  font-family:'Cormorant Garamond',serif;
  font-size:20px; font-weight:600;
  color:var(--forest); letter-spacing:4px;
  text-transform:uppercase;
}
.m-sep{
  width:5px; height:5px;
  background:var(--gold); border-radius:50%;
  margin:0 44px;
}
@keyframes scroll{
  0%  { transform:translateX(0); }
  100%{ transform:translateX(-50%); }
}

/* ════════════════════════════════════════════
   STATS BAR
   ════════════════════════════════════════════ */
.stats-bar{
  background:var(--forest);
  padding:58px 56px;
}
.stats-inner{
  max-width:1080px; margin:0 auto;
  display:grid; grid-template-columns:repeat(4,1fr);
  gap:32px;
}
.stat-block{ text-align:center; position:relative; }
.stat-block:not(:last-child)::after{
  content:''; position:absolute;
  top:15%; right:0; width:1px; height:70%;
  background:rgba(255,255,255,0.1);
}
.stat-number{
  font-family:'Cormorant Garamond',serif;
  font-size:52px; font-weight:700;
  color:var(--gold-soft); line-height:1;
}
.stat-label{
  font-size:12px; font-weight:400;
  color:rgba(255,255,255,0.45);
  letter-spacing:2px; text-transform:uppercase;
  margin-top:10px;
}

/* ════════════════════════════════════════════
   SECTION COMMONS
   ════════════════════════════════════════════ */
.sec-tag{
  display:inline-flex; align-items:center; gap:12px;
  font-size:11px; font-weight:600;
  letter-spacing:3px; text-transform:uppercase;
  color:var(--moss); margin-bottom:16px;
}
.sec-tag::before{
  content:''; width:32px; height:2px;
  background:var(--gold); border-radius:2px;
}
.sec-head{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(32px,4.5vw,48px);
  font-weight:600; color:var(--forest);
  line-height:1.15; letter-spacing:-0.5px;
}
.sec-desc{
  color:rgba(11,26,18,0.52);
  font-size:15px; line-height:1.8; font-weight:300;
  max-width:460px; margin-top:14px;
}

/* ════════════════════════════════════════════
   WHY US – EDITORIAL LAYOUT
   ════════════════════════════════════════════ */
.why-section{
  padding:120px 56px;
  background:var(--cream);
  position:relative;
}
/* subtle corner ornament */
.why-section::before{
  content:'';
  position:absolute; top:80px; right:60px;
  width:180px; height:180px;
  border-top:2px solid var(--sand);
  border-right:2px solid var(--sand);
  border-radius:0 16px 0 0;
  pointer-events:none;
}

.why-grid{
  max-width:1140px; margin:0 auto;
  display:grid;
  grid-template-columns:1.1fr 0.9fr;
  gap:100px; align-items:start;
}

.why-left .sec-head em{ font-style:italic; color:var(--moss); }

.feature-list{ margin-top:52px; }
.feature-row{
  display:flex; align-items:flex-start; gap:22px;
  padding:28px 0;
  border-bottom:1px solid var(--sand);
  transition:transform .3s;
}
.feature-row:first-child{ border-top:1px solid var(--sand); }
.feature-row:hover{ transform:translateX(6px); }

.feat-num{
  font-family:'Cormorant Garamond',serif;
  font-size:28px; font-weight:300;
  color:var(--gold); line-height:1;
  min-width:36px;
}
.feat-content h5{
  font-size:16px; font-weight:600;
  color:var(--forest); margin-bottom:4px;
}
.feat-content p{
  font-size:14px; color:rgba(11,26,18,0.5);
  line-height:1.6; font-weight:300;
}

/* Right: stacked visual panels */
.why-right{ display:flex; flex-direction:column; gap:20px; padding-top:40px; }

.panel{
  border-radius:22px; padding:36px 32px;
  position:relative; overflow:hidden;
  transition:transform .35s;
}
.panel:hover{ transform:translateY(-3px); }

.panel-dark{
  background:var(--forest);
  color:#fff;
}
.panel-dark .panel-icon{
  font-size:32px; margin-bottom:16px;
}
.panel-dark h4{
  font-family:'Cormorant Garamond',serif;
  font-size:24px; font-weight:600; margin-bottom:8px;
}
.panel-dark p{
  font-size:14px; color:rgba(255,255,255,0.5);
  font-weight:300; line-height:1.6;
}

.panel-light{
  background:var(--warm-white);
  border:1px solid var(--sand);
  display:flex; align-items:center; gap:28px;
}
.panel-light .pl-icon{
  width:56px; height:56px; flex-shrink:0;
  background:linear-gradient(135deg,var(--moss),var(--leaf));
  border-radius:16px;
  display:flex; align-items:center; justify-content:center;
  font-size:24px;
}
.panel-light h4{
  font-size:15px; font-weight:600; color:var(--forest);
  margin-bottom:3px;
}
.panel-light p{
  font-size:13px; color:rgba(11,26,18,0.48);
  font-weight:300;
}

/* gold ring deco in dark panel */
.panel-dark .ring{
  position:absolute; top:-30px; right:-30px;
  width:120px; height:120px;
  border:2px solid rgba(201,162,39,0.15);
  border-radius:50%;
  pointer-events:none;
}

/* ════════════════════════════════════════════
   PRODUCTS
   ════════════════════════════════════════════ */
.prod-section{
  padding:120px 56px;
  background:var(--warm-white);
}
.prod-header{
  max-width:1140px; margin:0 auto 64px;
  display:flex; justify-content:space-between;
  align-items:flex-end; flex-wrap:wrap; gap:20px;
}
.prod-header .view-all{
  font-size:13px; font-weight:500;
  color:var(--moss); letter-spacing:0.8px;
  border-bottom:1.5px solid var(--gold);
  padding-bottom:3px;
  transition:color .3s;
}
.prod-header .view-all:hover{ color:var(--forest); }

.prod-grid{
  max-width:1140px; margin:0 auto;
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:22px;
}

/* ─── Product Card ─── */
.pc{
  background:#fff;
  border-radius:20px;
  border:1px solid var(--sand);
  overflow:hidden;
  transition:transform .4s cubic-bezier(.22,1,.36,1), box-shadow .4s;
  position:relative;
}
.pc:hover{ transform:translateY(-8px); box-shadow:0 24px 60px rgba(0,0,0,0.1); }

.pc-img{
  height:240px; position:relative;
  overflow:hidden;
}
/* Individual gradient backgrounds */
.pc:nth-child(1) .pc-img{ background:linear-gradient(145deg,#1a5c38,#2e8b57); }
.pc:nth-child(2) .pc-img{ background:linear-gradient(145deg,#0f3d25,#1a5c38); }
.pc:nth-child(3) .pc-img{ background:linear-gradient(145deg,#2e8b57,#458c6e); }
.pc:nth-child(4) .pc-img{ background:linear-gradient(145deg,#145a38,#1e7a4a); }

/* Woven pattern overlay on product images */
.pc-img::before{
  content:'';
  position:absolute; inset:0;
  background-image:
    repeating-linear-gradient(0deg, transparent, transparent 7px, rgba(255,255,255,0.04) 7px, rgba(255,255,255,0.04) 8px),
    repeating-linear-gradient(90deg, transparent, transparent 7px, rgba(255,255,255,0.04) 7px, rgba(255,255,255,0.04) 8px);
  z-index:1;
}

/* Diamond shape decorative */
.pc-img .diamond{
  position:absolute;
  width:100px; height:100px;
  border:1.5px solid rgba(255,255,255,0.12);
  border-radius:12px;
  transform:rotate(45deg);
  top:50%; left:50%;
  margin-top:-50px; margin-left:-50px;
  z-index:2;
}
.pc-img .diamond-inner{
  position:absolute;
  width:56px; height:56px;
  border:1.5px solid rgba(255,255,255,0.08);
  border-radius:8px;
  transform:rotate(45deg);
  top:50%; left:50%;
  margin-top:-28px; margin-left:-28px;
  z-index:2;
}

/* Sarung fabric icon */
.pc-img .fabric-icon{
  position:absolute; inset:0;
  display:flex; align-items:center; justify-content:center;
  z-index:2;
}

.pc-tag{
  position:absolute; top:16px; left:16px; z-index:3;
  background:rgba(11,26,18,0.78);
  backdrop-filter:blur(8px);
  color:#fff; font-size:10px; font-weight:600;
  letter-spacing:1.5px; text-transform:uppercase;
  padding:6px 14px; border-radius:24px;
}
/* Gold accent tag */
.pc-tag.gold{
  background:linear-gradient(135deg,var(--gold),#b8911f);
  color:var(--ink);
}

/* Hover zoom on img */
.pc-img .zoom-layer{
  position:absolute; inset:0; z-index:1;
  transition:transform .6s cubic-bezier(.22,1,.36,1);
}
.pc:hover .pc-img .zoom-layer{ transform:scale(1.06); }

.pc-body{ padding:24px; }
.pc-body h4{
  font-family:'Cormorant Garamond',serif;
  font-size:20px; font-weight:600;
  color:var(--forest); margin-bottom:4px;
}
.pc-brand{
  font-size:11px; font-weight:500;
  color:rgba(11,26,18,0.4);
  letter-spacing:1.8px; text-transform:uppercase;
  margin-bottom:18px;
}

.pc-foot{
  display:flex; justify-content:space-between; align-items:center;
}
.pc-price{
  font-family:'Cormorant Garamond',serif;
  font-size:22px; font-weight:700;
  color:var(--forest);
}

/* Cart circle btn */
.cart-circle{
  width:42px; height:42px;
  background:var(--forest); border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  transition:transform .3s, background .3s;
  position:relative; overflow:hidden;
}
.cart-circle::before{
  content:''; position:absolute; inset:0;
  background:var(--moss); opacity:0;
  transition:opacity .3s;
}
.cart-circle:hover::before{ opacity:1; }
.cart-circle:hover{ transform:scale(1.1) rotate(8deg); }
.cart-circle svg{ position:relative; z-index:1; }

/* ════════════════════════════════════════════
   TESTIMONIAL STRIP
   ════════════════════════════════════════════ */
.testi-section{
  padding:100px 56px;
  background:var(--cream);
}
.testi-inner{
  max-width:900px; margin:0 auto;
  text-align:center;
}
.testi-quote{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(22px,3vw,30px);
  font-weight:300; font-style:italic;
  color:var(--forest);
  line-height:1.6; letter-spacing:-0.3px;
  position:relative; padding:0 40px;
}
.testi-quote::before{
  content:'\201C';
  position:absolute; left:0; top:-8px;
  font-size:64px; font-style:normal;
  color:var(--gold); line-height:1;
  font-weight:300;
}
.testi-quote::after{
  content:'\201D';
  position:absolute; right:0; bottom:-16px;
  font-size:64px; font-style:normal;
  color:var(--gold); line-height:1;
  font-weight:300;
}
.testi-author{
  margin-top:32px; display:flex;
  align-items:center; justify-content:center; gap:14px;
}
.testi-avatar{
  width:48px; height:48px; border-radius:50%;
  background:linear-gradient(135deg,var(--moss),var(--leaf));
  display:flex; align-items:center; justify-content:center;
  color:#fff; font-weight:600; font-size:18px;
  font-family:'Cormorant Garamond',serif;
}
.testi-name{ font-weight:600; font-size:15px; color:var(--forest); }
.testi-loc{ font-size:13px; color:rgba(11,26,18,0.4); font-weight:300; }

/* Stars */
.stars{ color:var(--gold); font-size:16px; letter-spacing:3px; margin-bottom:24px; }

/* ════════════════════════════════════════════
   CTA
   ════════════════════════════════════════════ */
.cta-section{
  padding:60px 56px 120px;
  background:var(--warm-white);
}
.cta-card{
  max-width:1140px; margin:0 auto;
  border-radius:30px;
  background:var(--ink);
  position:relative; overflow:hidden;
  padding:100px 72px;
  display:grid;
  grid-template-columns:1.2fr .8fr;
  gap:60px; align-items:center;
}
/* bg texture */
.cta-card::before{
  content:'';
  position:absolute; inset:0;
  background-image:
    repeating-linear-gradient(0deg,transparent,transparent 59px,rgba(255,255,255,0.015) 59px,rgba(255,255,255,0.015) 60px),
    repeating-linear-gradient(90deg,transparent,transparent 59px,rgba(255,255,255,0.015) 59px,rgba(255,255,255,0.015) 60px);
  pointer-events:none;
}
.cta-blob-a{
  position:absolute; top:-100px; right:-80px;
  width:340px; height:340px; border-radius:50%;
  background:radial-gradient(circle,rgba(46,139,87,0.18),transparent 65%);
  pointer-events:none;
}
.cta-blob-b{
  position:absolute; bottom:-80px; left:15%;
  width:240px; height:240px; border-radius:50%;
  background:radial-gradient(circle,rgba(201,162,39,0.12),transparent 60%);
  pointer-events:none;
}

.cta-left{ position:relative; z-index:1; }
.cta-left .sec-tag{ color:var(--gold-soft); }
.cta-left .sec-tag::before{ background:var(--gold); }
.cta-left .sec-head{ color:#fff; }
.cta-left .sec-desc{ color:rgba(255,255,255,0.45); max-width:100%; }
.cta-left .btn-glow{ display:inline-block; margin-top:34px; }

.cta-right{ position:relative; z-index:1; }
.cta-perk{
  display:flex; align-items:center; gap:16px;
  padding:18px 0;
  border-bottom:1px solid rgba(255,255,255,0.07);
}
.cta-perk:first-child{ border-top:1px solid rgba(255,255,255,0.07); }
.cta-perk-icon{
  width:40px; height:40px; flex-shrink:0;
  background:rgba(201,162,39,0.12);
  border-radius:50%;
  display:flex; align-items:center; justify-content:center;
}
.cta-perk-text{ font-size:15px; color:rgba(255,255,255,0.7); font-weight:300; }
.cta-perk-text strong{ color:#fff; font-weight:500; }

/* ════════════════════════════════════════════
   FOOTER
   ════════════════════════════════════════════ */
footer{
  background:var(--forest);
  color:rgba(255,255,255,0.45);
  padding:80px 56px 36px;
}
.foot-grid{
  max-width:1140px; margin:0 auto;
  display:grid;
  grid-template-columns:2.2fr 1fr 1fr 1fr;
  gap:48px;
  padding-bottom:52px;
  border-bottom:1px solid rgba(255,255,255,0.07);
}
.foot-brand .logo{ margin-bottom:18px; }
.foot-brand p{ font-size:14px; line-height:1.8; font-weight:300; max-width:260px; }

/* social */
.foot-socials{ display:flex; gap:14px; margin-top:24px; }
.foot-soc{
  width:36px; height:36px; border-radius:50%;
  border:1px solid rgba(255,255,255,0.15);
  display:flex; align-items:center; justify-content:center;
  color:rgba(255,255,255,0.45);
  transition:border-color .3s, color .3s, transform .3s;
}
.foot-soc:hover{ border-color:var(--gold); color:var(--gold); transform:translateY(-2px); }

.foot-col h6{
  color:#fff; font-size:12px; font-weight:600;
  letter-spacing:2px; text-transform:uppercase;
  margin-bottom:22px;
}
.foot-col a{
  display:block; color:rgba(255,255,255,0.42);
  font-size:14px; margin-bottom:14px;
  transition:color .25s, transform .25s;
  font-weight:300;
}
.foot-col a:hover{ color:var(--gold-soft); transform:translateX(4px); }

.foot-bottom{
  max-width:1140px; margin:0 auto;
  padding-top:30px;
  display:flex; justify-content:space-between;
  font-size:13px; font-weight:300;
}

/* ════════════════════════════════════════════
   SCROLL REVEAL
   ════════════════════════════════════════════ */
.anim{
  opacity:0;
  transform:translateY(40px);
  transition:opacity .8s cubic-bezier(.22,1,.36,1), transform .8s cubic-bezier(.22,1,.36,1);
}
.anim.show{ opacity:1; transform:translateY(0); }
.anim-left{
  opacity:0; transform:translateX(-40px);
  transition:opacity .8s cubic-bezier(.22,1,.36,1), transform .8s cubic-bezier(.22,1,.36,1);
}
.anim-left.show{ opacity:1; transform:translateX(0); }
.anim-right{
  opacity:0; transform:translateX(40px);
  transition:opacity .8s cubic-bezier(.22,1,.36,1), transform .8s cubic-bezier(.22,1,.36,1);
}
.anim-right.show{ opacity:1; transform:translateX(0); }

/* stagger delay utility */
.d1{ transition-delay:.05s; }
.d2{ transition-delay:.12s; }
.d3{ transition-delay:.19s; }
.d4{ transition-delay:.26s; }

/* ════════════════════════════════════════════
   RESPONSIVE
   ════════════════════════════════════════════ */
@media(max-width:960px){
  .prod-grid{ grid-template-columns:repeat(2,1fr); }
  .why-grid{ grid-template-columns:1fr; gap:60px; }
  .cta-card{ grid-template-columns:1fr; text-align:center; padding:72px 40px; }
  .cta-left .sec-desc{ max-width:100%; margin-left:auto; margin-right:auto; }
  .stats-inner{ grid-template-columns:repeat(2,1fr); gap:40px; }
  .stat-block:nth-child(2)::after{ display:none; }
}
@media(max-width:600px){
  nav{ padding:16px 24px; }
  nav.scrolled{ padding:12px 24px; }
  .nav-links{ gap:18px; }
  .nav-btn{ display:none; }
  .prod-grid{ grid-template-columns:1fr; }
  .why-section, .prod-section, .cta-section, .testi-section{ padding:80px 24px; }
  .foot-grid{ grid-template-columns:1fr 1fr; }
  .stats-inner{ grid-template-columns:1fr 1fr; }
  .stat-block::after{ display:none !important; }
}
</style>
</head>
<body>

<!-- Custom cursor -->
<div class="cursor" id="cursor"></div>

<!-- ─── NAV ─── -->
<nav id="nav">
  <div class="logo">SS<em>-</em>Mart</div>
  <div class="nav-links">
    <a href="#produk">Produk</a>
    <a href="#mengapa">Tentang</a>
    <a href="#testimoni">Review</a>
    <a href="#" class="nav-btn">Belanja Sekarang</a>
  </div>
</nav>

<!-- ─── HERO ─── -->
<section class="hero">
  <div class="b1"></div><div class="b2"></div><div class="b3"></div><div class="b4"></div>
  <div class="hero-diag"></div>

  <div class="hero-content">
    <div class="badge"><span class="badge-dot"></span> Koleksi Premium 2025</div>
    <h1>
      Sarung Original &amp;<br>
      <span class="line2">Berkualitas Tinggi</span>
    </h1>
    <p class="hero-sub">
      Koleksi sarung premium dari merek-merek terpercaya Indonesia.
      Sempurna untuk ibadah, acara resmi, maupun sehari-hari.
    </p>
    <div class="hero-btns">
      <a href="#produk" class="btn-glow"><span>Jelajahi Koleksi</span></a>
      <a href="#mengapa" class="btn-ghost">Tentang Kami</a>
    </div>
  </div>

  <div class="scroll-cue"><span>Scroll</span><div class="chevron"></div></div>
</section>

<!-- ─── MARQUEE ─── -->
<div class="marquee-wrap">
  <div class="marquee-track">
    <div class="m-item"><span class="m-name">BHS</span><span class="m-sep"></span><span class="m-name">Sapphire</span><span class="m-sep"></span><span class="m-name">Wadimor</span><span class="m-sep"></span><span class="m-name">Gajah Duduk</span><span class="m-sep"></span><span class="m-name">Atlas</span><span class="m-sep"></span></div>
    <div class="m-item"><span class="m-name">BHS</span><span class="m-sep"></span><span class="m-name">Sapphire</span><span class="m-sep"></span><span class="m-name">Wadimor</span><span class="m-sep"></span><span class="m-name">Gajah Duduk</span><span class="m-sep"></span><span class="m-name">Atlas</span><span class="m-sep"></span></div>
  </div>
</div>

<!-- ─── STATS ─── -->
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat-block anim">
      <div class="stat-number" data-target="5">0</div>
      <div class="stat-label">Merek Premium</div>
    </div>
    <div class="stat-block anim d1">
      <div class="stat-number" data-target="10000">0</div>
      <div class="stat-label">Pelanggan Puas</div>
    </div>
    <div class="stat-block anim d2">
      <div class="stat-number" data-target="98">0</div>
      <div class="stat-label">% Kepuasan</div>
    </div>
    <div class="stat-block anim d3">
      <div class="stat-number" data-target="24">0</div>
      <div class="stat-label">Jam Layanan</div>
    </div>
  </div>
</div>

<!-- ─── WHY US ─── -->
<section class="why-section" id="mengapa">
  <div class="why-grid">
    <div class="why-left anim-left">
      <span class="sec-tag">Mengapa Kami</span>
      <h2 class="sec-head">Terpercaya &<br><em>Kualitas Terbaik</em></h2>
      <p class="sec-desc">Kami menghadirkan sarung original langsung dari produsen terbaik Indonesia, dengan komitmen penuh pada keaslian dan kepuasan.</p>

      <div class="feature-list">
        <div class="feature-row">
          <span class="feat-num">01</span>
          <div class="feat-content">
            <h5>100% Produk Original</h5>
            <p>Langsung dari produsen resmi dan bersertifikat, setiap produk dijamin asli.</p>
          </div>
        </div>
        <div class="feature-row">
          <span class="feat-num">02</span>
          <div class="feat-content">
            <h5>Pengiriman Cepat & Aman</h5>
            <p>Terima di rumah dalam 2–4 hari kerja dengan packing yang terjaga.</p>
          </div>
        </div>
        <div class="feature-row">
          <span class="feat-num">03</span>
          <div class="feat-content">
            <h5>Garansi Uang Kembali</h5>
            <p>Tidak puas dengan produk? Kami kembalikan dana Anda tanpa syarat.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="why-right anim-right">
      <div class="panel panel-dark">
        <div class="ring"></div>
        <div class="panel-icon">✦</div>
        <h4>Koleksi Eksklusif</h4>
        <p>Pilihan sarung premium yang tidak mudah ditemukan di tempat lain. Edisi terbatas, kualitas tak tertandingi.</p>
      </div>
      <div class="panel panel-light">
        <div class="pl-icon">🚚</div>
        <div>
          <h4>Pengiriman Se-Indonesia</h4>
          <p>Gratis ongkir untuk pembelian di atas Rp 300.000</p>
        </div>
      </div>
      <div class="panel panel-light">
        <div class="pl-icon">💎</div>
        <div>
          <h4>Bahan Berkualitas Tinggi</h4>
          <p>Nyaman dipakai sepanjang hari, tahan lama &amp; mudah dicuci</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── PRODUCTS ─── -->
<section class="prod-section" id="produk">
  <div class="prod-header anim">
    <div>
      <span class="sec-tag">Koleksi</span>
      <h2 class="sec-head">Produk Pilihan</h2>
    </div>
    <a href="#" class="view-all">Lihat Semua →</a>
  </div>

  <div class="prod-grid">
    <!-- Card 1 -->
    <div class="pc anim d1">
      <div class="pc-img">
        <div class="zoom-layer"></div>
        <div class="diamond"></div>
        <div class="diamond-inner"></div>
        <span class="pc-tag gold">Best Seller</span>
        <div class="fabric-icon">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" opacity="0.22">
            <rect x="6" y="6" width="36" height="36" rx="3" stroke="white" stroke-width="2"/>
            <path d="M6 18h36M6 30h36M18 6v36M30 6v36" stroke="white" stroke-width="1.2" opacity="0.6"/>
          </svg>
        </div>
      </div>
      <div class="pc-body">
        <h4>Sarung BHS Premium</h4>
        <div class="pc-brand">BHS · Edisi Khusus</div>
        <div class="pc-foot">
          <span class="pc-price">Rp 250.000</span>
          <a href="#" class="cart-circle">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="pc anim d2">
      <div class="pc-img">
        <div class="zoom-layer"></div>
        <div class="diamond"></div>
        <div class="diamond-inner"></div>
        <span class="pc-tag">Klasik</span>
        <div class="fabric-icon">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" opacity="0.22">
            <rect x="6" y="6" width="36" height="36" rx="3" stroke="white" stroke-width="2"/>
            <path d="M6 18h36M6 30h36M18 6v36M30 6v36" stroke="white" stroke-width="1.2" opacity="0.6"/>
          </svg>
        </div>
      </div>
      <div class="pc-body">
        <h4>Sarung Wadimor Classic</h4>
        <div class="pc-brand">Wadimor · Pilihan Harian</div>
        <div class="pc-foot">
          <span class="pc-price">Rp 120.000</span>
          <a href="#" class="cart-circle">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="pc anim d3">
      <div class="pc-img">
        <div class="zoom-layer"></div>
        <div class="diamond"></div>
        <div class="diamond-inner"></div>
        <span class="pc-tag">Populer</span>
        <div class="fabric-icon">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" opacity="0.22">
            <rect x="6" y="6" width="36" height="36" rx="3" stroke="white" stroke-width="2"/>
            <path d="M6 18h36M6 30h36M18 6v36M30 6v36" stroke="white" stroke-width="1.2" opacity="0.6"/>
          </svg>
        </div>
      </div>
      <div class="pc-body">
        <h4>Sarung Atlas Favorit</h4>
        <div class="pc-brand">Atlas · Favorit Pelanggan</div>
        <div class="pc-foot">
          <span class="pc-price">Rp 150.000</span>
          <a href="#" class="cart-circle">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="pc anim d4">
      <div class="pc-img">
        <div class="zoom-layer"></div>
        <div class="diamond"></div>
        <div class="diamond-inner"></div>
        <span class="pc-tag">Baru</span>
        <div class="fabric-icon">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" opacity="0.22">
            <rect x="6" y="6" width="36" height="36" rx="3" stroke="white" stroke-width="2"/>
            <path d="M6 18h36M6 30h36M18 6v36M30 6v36" stroke="white" stroke-width="1.2" opacity="0.6"/>
          </svg>
        </div>
      </div>
      <div class="pc-body">
        <h4>Sarung Gajah Duduk</h4>
        <div class="pc-brand">Gajah Duduk · Tradisional</div>
        <div class="pc-foot">
          <span class="pc-price">Rp 180.000</span>
          <a href="#" class="cart-circle">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── TESTIMONIAL ─── -->
<section class="testi-section" id="testimoni">
  <div class="testi-inner anim">
    <span class="sec-tag" style="justify-content:center;">Testimoni</span>
    <div class="stars">★★★★★</div>
    <p class="testi-quote">
      Sarung BHS yang saya beli kualitasnya luar biasa, bahan halus dan warnanya sangat bagus.
      Pastinya akan belanja lagi di sini.
    </p>
    <div class="testi-author">
      <div class="testi-avatar">AR</div>
      <div>
        <div class="testi-name">Ahmad Rizky</div>
        <div class="testi-loc">Jakarta Selatan</div>
      </div>
    </div>
  </div>
</section>

<!-- ─── CTA ─── -->
<section class="cta-section">
  <div class="cta-card anim">
    <div class="cta-blob-a"></div>
    <div class="cta-blob-b"></div>

    <div class="cta-left">
      <span class="sec-tag">Mulai Sekarang</span>
      <h2 class="sec-head">Daftar &amp; Nikmati<br>Pengalaman Belanja<br>Terbaik</h2>
      <p class="sec-desc">Bergabung dengan ribuan pelanggan setia dan dapatkan akses eksklusif ke penawaran spesial.</p>
      <a href="#" class="btn-glow"><span>Daftar Gratis</span></a>
    </div>

    <div class="cta-right">
      <div class="cta-perk">
        <div class="cta-perk-icon">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9l4 4 8-8" stroke="#c9a227" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <span class="cta-perk-text"><strong>Diskon 30%</strong> untuk member baru</span>
      </div>
      <div class="cta-perk">
        <div class="cta-perk-icon">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9l4 4 8-8" stroke="#c9a227" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <span class="cta-perk-text"><strong>Early bird</strong> akses koleksi terbaru</span>
      </div>
      <div class="cta-perk">
        <div class="cta-perk-icon">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9l4 4 8-8" stroke="#c9a227" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <span class="cta-perk-text"><strong>Gratis ongkir</strong> pembelian pertama</span>
      </div>
      <div class="cta-perk">
        <div class="cta-perk-icon">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9l4 4 8-8" stroke="#c9a227" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <span class="cta-perk-text"><strong>Layanan 24 jam</strong> siap membantu</span>
      </div>
    </div>
  </div>
</section>

<!-- ─── FOOTER ─── -->
<footer>
  <div class="foot-grid">
    <div class="foot-brand">
      <div class="logo">SS<em>-</em>Mart</div>
      <p>Pusat sarung original dan berkualitas tinggi. Menghadirkan produk terbaik langsung dari produsen terpercaya di Indonesia.</p>
      <div class="foot-socials">
        <a href="#" class="foot-soc">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="#" class="foot-soc">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
        </a>
        <a href="#" class="foot-soc">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
        </a>
      </div>
    </div>
    <div class="foot-col">
      <h6>Navigasi</h6>
      <a href="#">Beranda</a>
      <a href="#">Produk</a>
      <a href="#">Tentang Kami</a>
      <a href="#">Kontak</a>
    </div>
    <div class="foot-col">
      <h6>Merek</h6>
      <a href="#">BHS</a>
      <a href="#">Sapphire</a>
      <a href="#">Wadimor</a>
      <a href="#">Gajah Duduk</a>
      <a href="#">Atlas</a>
    </div>
    <div class="foot-col">
      <h6>Bantuan</h6>
      <a href="#">FAQ</a>
      <a href="#">Pengiriman</a>
      <a href="#">Pengembalian</a>
      <a href="#">Privasi</a>
    </div>
  </div>
  <div class="foot-bottom">
    <span>© 2025 SS-Mart · Pusat Sarung Original</span>
    <span>Dibuat dengan ♥ di Indonesia</span>
  </div>
</footer>

<!-- ─── JS ─── -->
<script>
// ── Custom Cursor ──
const cursor = document.getElementById('cursor');
document.addEventListener('mousemove', e => {
  cursor.style.left = e.clientX + 'px';
  cursor.style.top  = e.clientY + 'px';
});
document.querySelectorAll('a, .pc, .panel, .feature-row, .btn-glow').forEach(el => {
  el.addEventListener('mouseenter', () => cursor.classList.add('expand'));
  el.addEventListener('mouseleave', () => cursor.classList.remove('expand'));
});

// ── Navbar scroll ──
window.addEventListener('scroll', () => {
  document.getElementById('nav').classList.toggle('scrolled', scrollY > 50);
});

// ── Scroll Reveal ──
const animEls = document.querySelectorAll('.anim, .anim-left, .anim-right');
const io = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if(e.isIntersecting){
      e.target.classList.add('show');
      io.unobserve(e.target);
    }
  });
}, { threshold: 0.15 });
animEls.forEach(el => io.observe(el));

// ── Counter Animation ──
function animateCounter(el, target, suffix='') {
  const start = performance.now();
  const duration = 1600;
  function step(now) {
    const pct = Math.min((now - start) / duration, 1);
    const ease = 1 - Math.pow(1 - pct, 4);
    const val = Math.round(ease * target);
    el.textContent = (val >= 1000 ? val.toLocaleString() : val) + suffix;
    if(pct < 1) requestAnimationFrame(step);
  }
  requestAnimationFrame(step);
}

const counterObserver = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if(e.isIntersecting){
      const t = parseInt(e.target.dataset.target);
      const suffix = t === 98 ? '%' : (t === 5 ? '+' : (t === 24 ? '/7' : '+'));
      animateCounter(e.target, t, suffix);
      counterObserver.unobserve(e.target);
    }
  });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-number[data-target]').forEach(el => counterObserver.observe(el));

// ── Marquee pause on hover (already CSS) ──
</script>

</body>
</html>