@extends('layouts.blank')
@section('content')
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SS-Mart Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
/* ══════════════════════════════════════════════
   GLOBAL
   ══════════════════════════════════════════════ */
:root{
  --ink:#0b1a12; --forest:#0f3d25; --moss:#1a5c38; --leaf:#2e8b57;
  --sage:#6baa85; --gold:#c9a227; --gold-soft:#e8d48b;
  --cream:#f4f1eb; --warm:#faf8f4; --sand:#ebe6dd;
  --red:#e04848; --blue:#3b82f6; --amber:#f59e0b; --teal:#14b8a6;
  --sidebar-w:240px;
}
*{ margin:0; padding:0; box-sizing:border-box; }
html,body{ height:100%; }
body{
  font-family:'Outfit',sans-serif;
  background:var(--cream);
  color:var(--ink);
  overflow:hidden;
  -webkit-font-smoothing:antialiased;
}
a{ text-decoration:none; color:inherit; }
input,select,textarea{
  font-family:inherit; border:none; outline:none;
  background:transparent;
}

/* ══════════════════════════════════════════════
   PAGE SYSTEM  (login / dashboard)
   ══════════════════════════════════════════════ */
.page{ position:absolute; inset:0; opacity:0; pointer-events:none;
  transition:opacity .45s cubic-bezier(.22,1,.36,1), transform .45s cubic-bezier(.22,1,.36,1);
  transform:translateY(12px);
}
.page.active{ opacity:1; pointer-events:auto; transform:translateY(0); }

/* ══════════════════════════════════════════════
   LOGIN PAGE
   ══════════════════════════════════════════════ */
#loginPage{
  display:flex; height:100vh;
}
.login-left{
  flex:1; background:var(--ink);
  position:relative; overflow:hidden;
  display:flex; flex-direction:column;
  justify-content:flex-end; padding:56px;
}
/* blobs */
.login-left .lb1,.login-left .lb2{
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
@keyframes lbf{ 0%,100%{transform:translate(0,0);} 50%{transform:translate(22px,-18px);} }

/* woven */
.login-left::before{
  content:''; position:absolute; inset:0;
  background-image:
    repeating-linear-gradient(0deg,transparent,transparent 39px,rgba(255,255,255,0.02) 39px,rgba(255,255,255,0.02) 40px),
    repeating-linear-gradient(90deg,transparent,transparent 39px,rgba(255,255,255,0.02) 39px,rgba(255,255,255,0.02) 40px);
  pointer-events:none;
}
.login-left .logo-big{
  position:relative; z-index:1;
  font-family:'Cormorant Garamond',serif;
  font-size:42px; font-weight:700;
  color:#fff; letter-spacing:4px;
}
.login-left .logo-big em{ color:var(--gold); font-style:normal; }
.login-left .logo-tagline{
  position:relative; z-index:1;
  color:rgba(255,255,255,0.38);
  font-size:15px; font-weight:300;
  margin-top:12px; line-height:1.7;
  max-width:320px;
}

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
.login-box .login-sub{
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
.input-wrap .i-icon{
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
.login-btn:hover{ transform:translateY(-2px); box-shadow:0 8px 28px rgba(201,162,39,0.45); }

.login-hint{
  margin-top:28px; padding:16px;
  background:rgba(26,92,56,0.06);
  border-radius:10px; border:1px solid rgba(26,92,56,0.1);
}
.login-hint p{ font-size:12px; color:var(--moss); font-weight:500; }
.login-hint span{ color:rgba(11,26,18,0.5); font-weight:300; }

/* ══════════════════════════════════════════════
   DASHBOARD LAYOUT
   ══════════════════════════════════════════════ */
#dashPage{ display:flex; height:100vh; }

/* ── SIDEBAR ── */
.sidebar{
  width:var(--sidebar-w); flex-shrink:0;
  background:var(--ink);
  display:flex; flex-direction:column;
  height:100%; position:relative; z-index:10;
}
.sidebar .sb-logo{
  padding:28px 24px 24px;
  font-family:'Cormorant Garamond',serif;
  font-size:22px; font-weight:700;
  color:#fff; letter-spacing:3px;
  border-bottom:1px solid rgba(255,255,255,0.06);
}
.sidebar .sb-logo em{ color:var(--gold); font-style:normal; }

.sb-nav{ flex:1; padding:16px 12px; overflow-y:auto; }
.sb-section-label{
  font-size:10px; font-weight:600;
  letter-spacing:2.5px; text-transform:uppercase;
  color:rgba(255,255,255,0.22);
  padding:18px 14px 8px;
}
.sb-item{
  display:flex; align-items:center; gap:13px;
  padding:11px 14px; border-radius:10px;
  color:rgba(255,255,255,0.5);
  font-size:14px; font-weight:400;
  cursor:pointer;
  transition:background .25s, color .25s, transform .2s;
  position:relative; margin-bottom:2px;
}
.sb-item:hover{ background:rgba(255,255,255,0.06); color:rgba(255,255,255,0.85); }
.sb-item.active{
  background:linear-gradient(135deg,rgba(26,92,56,0.5),rgba(46,139,87,0.3));
  color:#fff;
}
.sb-item.active::before{
  content:''; position:absolute;
  left:0; top:20%; width:3px; height:60%;
  background:var(--gold); border-radius:0 3px 3px 0;
}
.sb-item .sb-icon{ width:18px; height:18px; flex-shrink:0; opacity:.7; }
.sb-item.active .sb-icon{ opacity:1; }

/* badge count */
.sb-badge{
  margin-left:auto;
  background:var(--red); color:#fff;
  font-size:11px; font-weight:600;
  padding:2px 8px; border-radius:10px;
  min-width:22px; text-align:center;
}

.sb-bottom{
  padding:16px 12px 20px;
  border-top:1px solid rgba(255,255,255,0.06);
}
.sb-user{
  display:flex; align-items:center; gap:12px;
  padding:10px 12px; border-radius:10px;
  cursor:pointer;
  transition:background .25s;
}
.sb-user:hover{ background:rgba(255,255,255,0.06); }
.sb-avatar{
  width:36px; height:36px; border-radius:10px;
  background:linear-gradient(135deg,var(--moss),var(--leaf));
  display:flex; align-items:center; justify-content:center;
  color:#fff; font-weight:600; font-size:14px;
  font-family:'Cormorant Garamond',serif;
}
.sb-user-info .sb-uname{ color:#fff; font-size:13px; font-weight:500; }
.sb-user-info .sb-urole{ color:rgba(255,255,255,0.32); font-size:11px; }
.sb-logout{ margin-left:auto; color:rgba(255,255,255,0.3); cursor:pointer; transition:color .25s; }
.sb-logout:hover{ color:var(--red); }

/* ── MAIN CONTENT ── */
.main{
  flex:1; display:flex; flex-direction:column;
  overflow:hidden; min-width:0;
}

/* ── TOPBAR ── */
.topbar{
  height:68px; flex-shrink:0;
  background:#fff;
  border-bottom:1px solid var(--sand);
  display:flex; align-items:center;
  justify-content:space-between;
  padding:0 36px; gap:20px;
}
.topbar-left{ display:flex; align-items:center; gap:20px; }
.topbar-left h3{
  font-family:'Cormorant Garamond',serif;
  font-size:22px; font-weight:600;
  color:var(--forest);
}
.topbar-left .tb-sub{
  font-size:13px; color:rgba(11,26,18,0.4);
  font-weight:300;
}

.search-box{
  display:flex; align-items:center; gap:10px;
  background:var(--cream); border:1px solid var(--sand);
  border-radius:10px; padding:9px 16px;
  width:240px;
  transition:border-color .3s, box-shadow .3s;
}
.search-box:focus-within{ border-color:var(--moss); box-shadow:0 0 0 3px rgba(26,92,56,0.1); }
.search-box input{ font-size:13px; width:100%; }
.search-box input::placeholder{ color:rgba(11,26,18,0.35); }
.search-box svg{ color:rgba(11,26,18,0.35); flex-shrink:0; }

.topbar-right{ display:flex; align-items:center; gap:16px; margin-left:auto; }

.tb-notif{
  width:38px; height:38px; border-radius:10px;
  border:1px solid var(--sand);
  background:#fff;
  display:flex; align-items:center; justify-content:center;
  cursor:pointer; position:relative;
  transition:background .25s;
  color:rgba(11,26,18,0.5);
}
.tb-notif:hover{ background:var(--cream); }
.tb-notif .notif-dot{
  position:absolute; top:7px; right:7px;
  width:8px; height:8px;
  background:var(--red); border-radius:50%;
  border:2px solid #fff;
}

.tb-avatar{
  width:36px; height:36px; border-radius:10px;
  background:linear-gradient(135deg,var(--moss),var(--leaf));
  display:flex; align-items:center; justify-content:center;
  color:#fff; font-weight:600; font-size:14px;
  font-family:'Cormorant Garamond',serif;
  cursor:pointer;
}

/* ── CONTENT AREA ── */
.content{
  flex:1; overflow-y:auto; padding:28px 36px;
}
.content::-webkit-scrollbar{ width:6px; }
.content::-webkit-scrollbar-track{ background:transparent; }
.content::-webkit-scrollbar-thumb{ background:var(--sand); border-radius:3px; }

/* ── SUB PAGES ── */
.sub-page{ display:none; }
.sub-page.active{ display:block; animation:fadeSlide .35s cubic-bezier(.22,1,.36,1); }
@keyframes fadeSlide{ from{opacity:0;transform:translateY(8px);} to{opacity:1;transform:translateY(0);} }

/* ══════════════════════════════════════════════
   DASHBOARD OVERVIEW
   ══════════════════════════════════════════════ */
/* Stat Cards */
.stat-row{
  display:grid; grid-template-columns:repeat(4,1fr);
  gap:18px; margin-bottom:24px;
}
.stat-card{
  background:#fff; border-radius:16px;
  border:1px solid var(--sand);
  padding:22px 24px;
  position:relative; overflow:hidden;
  transition:transform .3s, box-shadow .3s;
}
.stat-card:hover{ transform:translateY(-3px); box-shadow:0 8px 28px rgba(0,0,0,0.07); }
.stat-card .sc-icon{
  width:44px; height:44px; border-radius:13px;
  display:flex; align-items:center; justify-content:center;
  font-size:20px; margin-bottom:16px;
}
.sc-green{ background:rgba(26,92,56,0.1); }
.sc-gold { background:rgba(201,162,39,0.12); }
.sc-blue { background:rgba(59,130,246,0.1); }
.sc-red  { background:rgba(224,72,72,0.1); }

.stat-card .sc-val{
  font-family:'Cormorant Garamond',serif;
  font-size:30px; font-weight:700;
  color:var(--forest);
}
.stat-card .sc-label{
  font-size:13px; color:rgba(11,26,18,0.45);
  font-weight:300; margin-top:4px;
}
.stat-card .sc-change{
  display:inline-flex; align-items:center; gap:4px;
  font-size:12px; font-weight:600;
  margin-top:8px; padding:3px 8px; border-radius:6px;
}
.sc-change.up{ background:rgba(26,92,56,0.08); color:var(--moss); }
.sc-change.down{ background:rgba(224,72,72,0.08); color:var(--red); }

/* Bottom grid: chart + recent */
.dash-bottom{
  display:grid; grid-template-columns:1.6fr 1fr;
  gap:18px;
}
.card{
  background:#fff; border-radius:16px;
  border:1px solid var(--sand);
  padding:24px;
}
.card-head{
  display:flex; justify-content:space-between;
  align-items:center; margin-bottom:20px;
}
.card-head h4{
  font-family:'Cormorant Garamond',serif;
  font-size:18px; font-weight:600; color:var(--forest);
}
.card-head .card-action{
  font-size:12px; color:var(--moss); font-weight:500;
  cursor:pointer; letter-spacing:0.5px;
  border-bottom:1px solid var(--gold); padding-bottom:1px;
}

/* ── Mini Bar Chart ── */
.chart-wrap{ height:200px; display:flex; align-items:flex-end; gap:6px; padding-top:20px; }
.chart-col{ flex:1; display:flex; flex-direction:column; align-items:center; gap:6px; }
.chart-bar-wrap{ flex:1; width:100%; display:flex; align-items:flex-end; justify-content:center; }
.chart-bar{
  width:70%; border-radius:6px 6px 0 0;
  background:linear-gradient(to top,var(--moss),var(--leaf));
  transition:height .6s cubic-bezier(.22,1,.36,1);
  position:relative;
}
.chart-bar.gold{ background:linear-gradient(to top,var(--gold),#dbb83a); }
.chart-bar:hover{ filter:brightness(1.1); }
.chart-bar .bar-val{
  position:absolute; top:-22px; left:50%;
  transform:translateX(-50%);
  font-size:11px; font-weight:600;
  color:var(--forest); white-space:nowrap;
  opacity:0; transition:opacity .25s;
}
.chart-bar:hover .bar-val{ opacity:1; }
.chart-label{ font-size:11px; color:rgba(11,26,18,0.4); }

/* ── Recent Orders mini ── */
.order-mini-row{
  display:flex; align-items:center; gap:14px;
  padding:12px 0;
  border-bottom:1px solid var(--sand);
}
.order-mini-row:last-child{ border-bottom:none; }
.order-mini-row .om-avatar{
  width:34px; height:34px; border-radius:9px;
  background:var(--cream);
  display:flex; align-items:center; justify-content:center;
  font-size:14px;
}
.om-info{ flex:1; min-width:0; }
.om-info .om-name{ font-size:13px; font-weight:500; color:var(--ink); }
.om-info .om-id{ font-size:11px; color:rgba(11,26,18,0.38); }
.om-price{ font-weight:600; font-size:14px; color:var(--forest); }
.om-status{
  font-size:11px; font-weight:600; padding:3px 9px;
  border-radius:6px; letter-spacing:0.5px;
}
.st-pending{ background:rgba(245,158,11,0.1); color:var(--amber); }
.st-shipped{ background:rgba(59,130,246,0.1); color:var(--blue); }
.st-done   { background:rgba(26,92,56,0.1); color:var(--moss); }
.st-cancel { background:rgba(224,72,72,0.1); color:var(--red); }

/* ══════════════════════════════════════════════
   PRODUCTS PAGE
   ══════════════════════════════════════════════ */
.page-header{
  display:flex; justify-content:space-between;
  align-items:center; margin-bottom:22px;
  flex-wrap:wrap; gap:14px;
}
.page-header h3{
  font-family:'Cormorant Garamond',serif;
  font-size:24px; font-weight:600; color:var(--forest);
}
.btn-add{
  display:flex; align-items:center; gap:8px;
  background:linear-gradient(135deg,var(--gold),#b8911f);
  color:var(--ink); padding:9px 20px;
  border-radius:10px; border:none;
  font-family:inherit; font-size:13px; font-weight:600;
  cursor:pointer;
  transition:transform .25s, box-shadow .25s;
  box-shadow:0 3px 14px rgba(201,162,39,0.3);
}
.btn-add:hover{ transform:translateY(-1px); box-shadow:0 6px 20px rgba(201,162,39,0.4); }

/* Filter bar */
.filter-bar{
  display:flex; gap:10px; align-items:center;
  margin-bottom:20px; flex-wrap:wrap;
}
.filter-btn{
  padding:7px 16px; border-radius:8px;
  border:1px solid var(--sand);
  background:#fff; font-family:inherit;
  font-size:13px; color:rgba(11,26,18,0.5);
  cursor:pointer; transition:all .25s;
}
.filter-btn:hover{ border-color:var(--moss); color:var(--moss); }
.filter-btn.active{
  background:var(--forest); color:#fff;
  border-color:var(--forest);
}

/* Product Table */
.table-wrap{
  background:#fff; border-radius:16px;
  border:1px solid var(--sand);
  overflow:hidden;
}
table{ width:100%; border-collapse:collapse; }
thead th{
  text-align:left; padding:14px 20px;
  font-size:11px; font-weight:600;
  letter-spacing:1.8px; text-transform:uppercase;
  color:rgba(11,26,18,0.38);
  border-bottom:1px solid var(--sand);
  background:var(--warm);
  white-space:nowrap;
}
tbody tr{
  border-bottom:1px solid var(--sand);
  transition:background .2s;
}
tbody tr:last-child{ border-bottom:none; }
tbody tr:hover{ background:#fdfcfa; }
tbody td{ padding:14px 20px; font-size:14px; }

.tbl-product{ display:flex; align-items:center; gap:14px; }
.tbl-thumb{
  width:42px; height:42px; border-radius:10px;
  display:flex; align-items:center; justify-content:center;
  font-size:18px; flex-shrink:0;
}
.tbl-product .tp-name{ font-weight:500; color:var(--ink); }
.tbl-product .tp-brand{ font-size:12px; color:rgba(11,26,18,0.4); }

.tbl-price{ font-weight:600; color:var(--forest); }
.tbl-stock{ font-weight:500; }
.tbl-stock.low{ color:var(--red); }
.tbl-stock.ok { color:var(--moss); }

/* Action buttons */
.tbl-actions{ display:flex; gap:8px; }
.act-btn{
  width:32px; height:32px; border-radius:8px;
  border:1px solid var(--sand);
  background:#fff;
  display:flex; align-items:center; justify-content:center;
  cursor:pointer; color:rgba(11,26,18,0.45);
  transition:all .2s;
}
.act-btn:hover{ border-color:var(--moss); color:var(--moss); background:rgba(26,92,56,0.05); }
.act-btn.danger:hover{ border-color:var(--red); color:var(--red); background:rgba(224,72,72,0.05); }

/* ══════════════════════════════════════════════
   ORDERS PAGE  (reuses table)
   ══════════════════════════════════════════════ */
/* ── nothing extra needed, uses same .table-wrap ── */

/* ══════════════════════════════════════════════
   CUSTOMERS PAGE
   ══════════════════════════════════════════════ */
.customer-grid{
  display:grid; grid-template-columns:repeat(3,1fr);
  gap:16px;
}
.cust-card{
  background:#fff; border-radius:16px;
  border:1px solid var(--sand);
  padding:24px; text-align:center;
  transition:transform .3s, box-shadow .3s;
}
.cust-card:hover{ transform:translateY(-3px); box-shadow:0 10px 30px rgba(0,0,0,0.07); }
.cust-avatar{
  width:56px; height:56px; border-radius:50%;
  margin:0 auto 14px;
  display:flex; align-items:center; justify-content:center;
  font-size:20px; font-family:'Cormorant Garamond',serif;
  font-weight:700; color:#fff;
}
.cust-card h5{ font-size:15px; font-weight:600; color:var(--forest); margin-bottom:3px; }
.cust-card .c-email{ font-size:12px; color:rgba(11,26,18,0.4); margin-bottom:12px; }
.cust-stats{ display:flex; justify-content:center; gap:24px; }
.cust-stats div{ text-align:center; }
.cust-stats .cs-val{ font-weight:600; font-size:15px; color:var(--ink); }
.cust-stats .cs-lbl{ font-size:11px; color:rgba(11,26,18,0.38); margin-top:2px; }

/* ══════════════════════════════════════════════
   MODAL  (Add / Edit Product)
   ══════════════════════════════════════════════ */
.modal-overlay{
  position:fixed; inset:0; z-index:999;
  background:rgba(11,26,18,0.55);
  backdrop-filter:blur(4px);
  display:flex; align-items:center; justify-content:center;
  opacity:0; pointer-events:none;
  transition:opacity .3s;
}
.modal-overlay.open{ opacity:1; pointer-events:auto; }
.modal{
  background:#fff; border-radius:20px;
  width:90%; max-width:520px;
  padding:32px;
  transform:translateY(16px);
  transition:transform .35s cubic-bezier(.22,1,.36,1);
  max-height:90vh; overflow-y:auto;
}
.modal-overlay.open .modal{ transform:translateY(0); }
.modal-head{
  display:flex; justify-content:space-between;
  align-items:center; margin-bottom:24px;
}
.modal-head h4{
  font-family:'Cormorant Garamond',serif;
  font-size:22px; font-weight:600; color:var(--forest);
}
.modal-close{
  width:32px; height:32px; border-radius:8px;
  border:1px solid var(--sand); background:#fff;
  display:flex; align-items:center; justify-content:center;
  cursor:pointer; color:rgba(11,26,18,0.4);
  transition:all .2s;
}
.modal-close:hover{ border-color:var(--red); color:var(--red); }

.modal .input-group{ margin-bottom:18px; }
.modal .input-wrap input,
.modal .input-wrap select{
  width:100%; padding:12px 16px;
  font-size:14px; color:var(--ink);
  border-radius:12px;
  background:#fff;
}
.modal .input-wrap select{ appearance:none; cursor:pointer; }
.modal .input-wrap input::placeholder{ color:rgba(11,26,18,0.3); }

.modal-row{ display:grid; grid-template-columns:1fr 1fr; gap:16px; }

.modal-foot{
  display:flex; justify-content:flex-end; gap:10px;
  margin-top:24px;
}
.btn-cancel{
  padding:10px 22px; border-radius:10px;
  border:1px solid var(--sand); background:#fff;
  font-family:inherit; font-size:13px; font-weight:500;
  color:rgba(11,26,18,0.5); cursor:pointer;
  transition:border-color .25s;
}
.btn-cancel:hover{ border-color:rgba(11,26,18,0.3); }
.btn-save{
  padding:10px 28px; border-radius:10px;
  border:none;
  background:linear-gradient(135deg,var(--forest),var(--moss));
  color:#fff; font-family:inherit;
  font-size:13px; font-weight:600; cursor:pointer;
  transition:transform .25s, box-shadow .25s;
  box-shadow:0 3px 14px rgba(26,92,56,0.25);
}
.btn-save:hover{ transform:translateY(-1px); box-shadow:0 6px 20px rgba(26,92,56,0.35); }

/* ══════════════════════════════════════════════
   TOAST
   ══════════════════════════════════════════════ */
.toast{
  position:fixed; bottom:28px; right:28px; z-index:1000;
  background:var(--ink); color:#fff;
  padding:14px 22px; border-radius:12px;
  font-size:14px; font-weight:500;
  display:flex; align-items:center; gap:10px;
  transform:translateY(80px); opacity:0;
  transition:transform .4s cubic-bezier(.22,1,.36,1), opacity .4s;
  box-shadow:0 8px 30px rgba(0,0,0,0.25);
  max-width:340px;
}
.toast.show{ transform:translateY(0); opacity:1; }
.toast .t-icon{ font-size:18px; }

/* ══════════════════════════════════════════════
   RESPONSIVE
   ══════════════════════════════════════════════ */
@media(max-width:900px){
  .stat-row{ grid-template-columns:repeat(2,1fr); }
  .dash-bottom{ grid-template-columns:1fr; }
  .customer-grid{ grid-template-columns:repeat(2,1fr); }
}
@media(max-width:680px){
  .sidebar{ width:64px; }
  .sb-item span, .sb-section-label, .sb-user-info, .sb-logout{ display:none; }
  .sb-logo .logo-text{ display:none; }
  .main{ margin-left:0; }
  .content{ padding:20px 16px; }
  .topbar{ padding:0 18px; }
  .search-box{ width:160px; }
  .customer-grid{ grid-template-columns:1fr; }
  .stat-row{ grid-template-columns:1fr 1fr; }
}
</style>
</head>
<body>

<!-- ═══ LOGIN PAGE ═══ -->
<div class="page active" id="loginPage">
  <div class="login-left">
    <div class="lb1"></div><div class="lb2"></div>
    <div class="logo-big">SS<em>-</em>MART</div>
    <p class="logo-tagline">Panel administrasi untuk mengelola toko sarung online Anda dengan mudah dan efisien.</p>
  </div>
  <div class="login-right">
    <div class="login-box">
      <h2>Selamat Datang</h2>
      <p class="login-sub">Login ke panel admin Anda</p>

      <div class="input-group">
        <label>Email</label>
        <div class="input-wrap">
          <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <input type="email" id="emailInput" placeholder="admin@ssmart.com" value="admin@ssmart.com">
        </div>
      </div>

      <div class="input-group">
        <label>Password</label>
        <div class="input-wrap">
          <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
          <input type="password" id="passInput" placeholder="••••••••" value="admin123">
        </div>
      </div>

      <button class="login-btn" onclick="doLogin()">Masuk ke Dashboard</button>

      <div class="login-hint">
        <p>Demo credentials</p>
        <span>Email: admin@ssmart.com &nbsp;|&nbsp; Pass: admin123</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══ DASHBOARD PAGE ═══ -->
<div class="page" id="dashPage">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sb-logo">SS<em>-</em>Mart</div>
    <nav class="sb-nav">
      <div class="sb-section-label">Utama</div>
      <div class="sb-item active" onclick="goTo('overview')" data-page="overview">
        <svg class="sb-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
        <span>Dashboard</span>
      </div>
      <div class="sb-item" onclick="goTo('products')" data-page="products">
        <svg class="sb-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
        <span>Produk</span>
      </div>

      <div class="sb-section-label">Transaksi</div>
      <div class="sb-item" onclick="goTo('orders')" data-page="orders">
        <svg class="sb-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
        <span>Pesanan</span>
        <span class="sb-badge">3</span>
      </div>
      <div class="sb-item" onclick="goTo('customers')" data-page="customers">
        <svg class="sb-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
        <span>Pelanggan</span>
      </div>

      <div class="sb-section-label">Sistem</div>
      <div class="sb-item" onclick="goTo('settings')" data-page="settings">
        <svg class="sb-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
        <span>Pengaturan</span>
      </div>
    </nav>

    <div class="sb-bottom">
      <div class="sb-user">
        <div class="sb-avatar">AD</div>
        <div class="sb-user-info">
          <div class="sb-uname">Admin</div>
          <div class="sb-urole">Super Admin</div>
        </div>
        <div class="sb-logout" onclick="doLogout()" title="Logout">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main">
    <!-- TOPBAR -->
    <header class="topbar">
      <div class="topbar-left">
        <div>
          <h3 id="topTitle">Dashboard</h3>
          <span class="tb-sub" id="topSub">Selamat pagi, Admin</span>
        </div>
      </div>
      <div class="topbar-right">
        <div class="search-box">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" placeholder="Cari...">
        </div>
        <div class="tb-notif">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
          <span class="notif-dot"></span>
        </div>
        <div class="tb-avatar">AD</div>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="content">

      <!-- ── OVERVIEW ── -->
      <div class="sub-page active" id="pg-overview">
        <div class="stat-row">
          <div class="stat-card">
            <div class="sc-icon sc-gold">💰</div>
            <div class="sc-val">Rp 48.2M</div>
            <div class="sc-label">Total Pendapatan</div>
            <span class="sc-change up">↑ 12.5% dari bulan lalu</span>
          </div>
          <div class="stat-card">
            <div class="sc-icon sc-green">📦</div>
            <div class="sc-val">284</div>
            <div class="sc-label">Pesanan Bulan Ini</div>
            <span class="sc-change up">↑ 8.2% dari bulan lalu</span>
          </div>
          <div class="stat-card">
            <div class="sc-icon sc-blue">👥</div>
            <div class="sc-val">1,847</div>
            <div class="sc-label">Pelanggan Aktif</div>
            <span class="sc-change up">↑ 3.1% dari bulan lalu</span>
          </div>
          <div class="stat-card">
            <div class="sc-icon sc-red">🧺</div>
            <div class="sc-val">42</div>
            <div class="sc-label">Produk Tersedia</div>
            <span class="sc-change down">↓ 2 produk habis</span>
          </div>
        </div>

        <div class="dash-bottom">
          <!-- Chart -->
          <div class="card">
            <div class="card-head">
              <h4>Pendapatan Mingguan</h4>
              <span class="card-action">Lihat Detail</span>
            </div>
            <div class="chart-wrap" id="chartWrap"></div>
          </div>

          <!-- Recent Orders -->
          <div class="card">
            <div class="card-head">
              <h4>Pesanan Terbaru</h4>
              <span class="card-action" onclick="goTo('orders')">Lihat Semua</span>
            </div>
            <div id="recentOrders"></div>
          </div>
        </div>
      </div>

      <!-- ── PRODUCTS ── -->
      <div class="sub-page" id="pg-products">
        <div class="page-header">
          <h3>Kelola Produk</h3>
          <button class="btn-add" onclick="openModal('add')">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Produk
          </button>
        </div>
        <div class="filter-bar">
          <button class="filter-btn active" onclick="filterProducts('all',this)">Semua</button>
          <button class="filter-btn" onclick="filterProducts('BHS',this)">BHS</button>
          <button class="filter-btn" onclick="filterProducts('Sapphire',this)">Sapphire</button>
          <button class="filter-btn" onclick="filterProducts('Wadimor',this)">Wadimor</button>
          <button class="filter-btn" onclick="filterProducts('Gajah Duduk',this)">Gajah Duduk</button>
          <button class="filter-btn" onclick="filterProducts('Atlas',this)">Atlas</button>
        </div>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Produk</th>
                <th>Merek</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="productsTbody"></tbody>
          </table>
        </div>
      </div>

      <!-- ── ORDERS ── -->
      <div class="sub-page" id="pg-orders">
        <div class="page-header">
          <h3>Kelola Pesanan</h3>
        </div>
        <div class="filter-bar">
          <button class="filter-btn active" onclick="filterOrders('all',this)">Semua</button>
          <button class="filter-btn" onclick="filterOrders('Pending',this)">Pending</button>
          <button class="filter-btn" onclick="filterOrders('Shipped',this)">Dikirim</button>
          <button class="filter-btn" onclick="filterOrders('Delivered',this)">Tiba</button>
          <button class="filter-btn" onclick="filterOrders('Cancelled',this)">Batal</button>
        </div>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>No. Pesanan</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="ordersTbody"></tbody>
          </table>
        </div>
      </div>

      <!-- ── CUSTOMERS ── -->
      <div class="sub-page" id="pg-customers">
        <div class="page-header"><h3>Pelanggan</h3></div>
        <div class="customer-grid" id="customerGrid"></div>
      </div>

      <!-- ── SETTINGS ── -->
      <div class="sub-page" id="pg-settings">
        <div class="page-header"><h3>Pengaturan Toko</h3></div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;">
          <div class="card">
            <div class="card-head"><h4>Info Toko</h4></div>
            <div class="input-group">
              <label style="font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--forest);display:block;margin-bottom:8px;">Nama Toko</label>
              <div class="input-wrap"><input value="SS-Mart" style="padding:12px 16px;font-size:14px;color:var(--ink);border-radius:12px;width:100%;"></div>
            </div>
            <div class="input-group">
              <label style="font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--forest);display:block;margin-bottom:8px;">Deskripsi</label>
              <div class="input-wrap"><input value="Pusat Sarung Original & Berkualitas" style="padding:12px 16px;font-size:14px;color:var(--ink);border-radius:12px;width:100%;"></div>
            </div>
            <div class="input-group">
              <label style="font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--forest);display:block;margin-bottom:8px;">Email Toko</label>
              <div class="input-wrap"><input value="info@ssmart.com" style="padding:12px 16px;font-size:14px;color:var(--ink);border-radius:12px;width:100%;"></div>
            </div>
            <button class="btn-save" style="margin-top:8px;" onclick="showToast('✓','Pengaturan berhasil disimpan!')">Simpan Perubahan</button>
          </div>
          <div class="card">
            <div class="card-head"><h4>Keamanan Akun</h4></div>
            <div class="input-group">
              <label style="font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--forest);display:block;margin-bottom:8px;">Nama Admin</label>
              <div class="input-wrap"><input value="Administrator" style="padding:12px 16px;font-size:14px;color:var(--ink);border-radius:12px;width:100%;"></div>
            </div>
            <div class="input-group">
              <label style="font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--forest);display:block;margin-bottom:8px;">Email Admin</label>
              <div class="input-wrap"><input value="admin@ssmart.com" style="padding:12px 16px;font-size:14px;color:var(--ink);border-radius:12px;width:100%;"></div>
            </div>
            <div class="input-group">
              <label style="font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--forest);display:block;margin-bottom:8px;">Password Baru</label>
              <div class="input-wrap"><input type="password" placeholder="••••••••" style="padding:12px 16px;font-size:14px;color:var(--ink);border-radius:12px;width:100%;"></div>
            </div>
            <button class="btn-save" style="margin-top:8px;" onclick="showToast('✓','Password berhasil diubah!')">Ubah Password</button>
          </div>
        </div>
      </div>

    </div><!-- /content -->
  </div><!-- /main -->
</div><!-- /dashPage -->

<!-- ═══ MODAL ═══ -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <div class="modal-head">
      <h4 id="modalTitle">Tambah Produk</h4>
      <div class="modal-close" onclick="closeModal()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </div>
    </div>
    <div class="input-group">
      <label>Nama Produk</label>
      <div class="input-wrap"><input id="m-name" placeholder="Contoh: Sarung BHS Premium"></div>
    </div>
    <div class="modal-row">
      <div class="input-group">
        <label>Merek</label>
        <div class="input-wrap">
          <select id="m-brand">
            <option value="">Pilih Merek</option>
            <option value="BHS">BHS</option>
            <option value="Sapphire">Sapphire</option>
            <option value="Wadimor">Wadimor</option>
            <option value="Gajah Duduk">Gajah Duduk</option>
            <option value="Atlas">Atlas</option>
          </select>
        </div>
      </div>
      <div class="input-group">
        <label>Kategori</label>
        <div class="input-wrap">
          <select id="m-cat">
            <option value="Premium">Premium</option>
            <option value="Classic">Classic</option>
            <option value="Tradisional">Tradisional</option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-row">
      <div class="input-group">
        <label>Harga (Rp)</label>
        <div class="input-wrap"><input id="m-price" type="number" placeholder="250000"></div>
      </div>
      <div class="input-group">
        <label>Stok</label>
        <div class="input-wrap"><input id="m-stock" type="number" placeholder="50"></div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal()">Batal</button>
      <button class="btn-save" onclick="saveProduct()">Simpan Produk</button>
    </div>
  </div>
</div>

<!-- ═══ TOAST ═══ -->
<div class="toast" id="toast">
  <span class="t-icon" id="toastIcon">✓</span>
  <span id="toastMsg">Berhasil!</span>
</div>

<!-- ═══ JAVASCRIPT ═══ -->
<script>
/* ════════════════════════════════════════
   DATA
   ════════════════════════════════════════ */
let products = [
  { id:1, name:'Sarung BHS Premium', brand:'BHS', cat:'Premium', price:250000, stock:48, emoji:'🟢' },
  { id:2, name:'Sarung BHS Classic', brand:'BHS', cat:'Classic', price:180000, stock:32, emoji:'🟢' },
  { id:3, name:'Sarung Sapphire Elegan', brand:'Sapphire', cat:'Premium', price:290000, stock:12, emoji:'🔵' },
  { id:4, name:'Sarung Wadimor Classic', brand:'Wadimor', cat:'Classic', price:120000, stock:65, emoji:'🟡' },
  { id:5, name:'Sarung Wadimor Batik', brand:'Wadimor', cat:'Tradisional', price:155000, stock:3, emoji:'🟡' },
  { id:6, name:'Sarung Gajah Duduk', brand:'Gajah Duduk', cat:'Tradisional', price:180000, stock:27, emoji:'🟤' },
  { id:7, name:'Sarung Gajah Duduk Premium', brand:'Gajah Duduk', cat:'Premium', price:220000, stock:0, emoji:'🟤' },
  { id:8, name:'Sarung Atlas Favorit', brand:'Atlas', cat:'Classic', price:150000, stock:41, emoji:'🟠' },
  { id:9, name:'Sarung Atlas Polos', brand:'Atlas', cat:'Classic', price:95000, stock:78, emoji:'🟠' },
  { id:10, name:'Sarung Sapphire Royal', brand:'Sapphire', cat:'Premium', price:340000, stock:8, emoji:'🔵' },
];

const orders = [
  { id:'ORD-2025-001', customer:'Ahmad Rizky', product:'Sarung BHS Premium x2', total:500000, status:'Pending', date:'03 Feb' },
  { id:'ORD-2025-002', customer:'Budi Santoso', product:'Sarung Wadimor Classic x1', total:120000, status:'Shipped', date:'02 Feb' },
  { id:'ORD-2025-003', customer:'Rina Dewi', product:'Sarung Sapphire Elegan x1', total:290000, status:'Delivered', date:'01 Feb' },
  { id:'ORD-2025-004', customer:'Dian Pratiwi', product:'Sarung Atlas Favorit x3', total:450000, status:'Pending', date:'03 Feb' },
  { id:'ORD-2025-005', customer:'Eko Nugroho', product:'Sarung Gajah Duduk x1', total:180000, status:'Shipped', date:'31 Jan' },
  { id:'ORD-2025-006', customer:'Siti Rahayu', product:'Sarung BHS Classic x2', total:360000, status:'Cancelled', date:'30 Jan' },
  { id:'ORD-2025-007', customer:'Hendra Kris', product:'Sarung Atlas Polos x4', total:380000, status:'Delivered', date:'29 Jan' },
  { id:'ORD-2025-008', customer:'Lina Surya', product:'Sarung Sapphire Royal x1', total:340000, status:'Pending', date:'03 Feb' },
];

const customers = [
  { name:'Ahmad Rizky', email:'ahmad@email.com', orders:12, spent:3200000, avatar:'AR', color:'linear-gradient(135deg,#1a5c38,#2e8b57)' },
  { name:'Budi Santoso', email:'budi@email.com', orders:8, spent:1450000, avatar:'BS', color:'linear-gradient(135deg,#2e8b57,#458c6e)' },
  { name:'Rina Dewi', email:'rina@email.com', orders:15, spent:4800000, avatar:'RD', color:'linear-gradient(135deg,#0f3d25,#1a5c38)' },
  { name:'Dian Pratiwi', email:'dian@email.com', orders:5, spent:890000, avatar:'DP', color:'linear-gradient(135deg,#145a38,#1e7a4a)' },
  { name:'Eko Nugroho', email:'eko@email.com', orders:21, spent:6200000, avatar:'EN', color:'linear-gradient(135deg,#386641,#52796f)' },
  { name:'Siti Rahayu', email:'siti@email.com', orders:3, spent:420000, avatar:'SR', color:'linear-gradient(135deg,#1a5c38,#458c6e)' },
];

const chartData = [
  { day:'Sen', val:4200 },
  { day:'Sel', val:6800 },
  { day:'Rab', val:5100 },
  { day:'Rab', val:8200 },
  { day:'Kam', val:7400 },
  { day:'Jum', val:9600 },
  { day:'Sab', val:11200 },
];

/* ════════════════════════════════════════
   LOGIN / LOGOUT
   ════════════════════════════════════════ */
function doLogin(){
  const email = document.getElementById('emailInput').value;
  const pass  = document.getElementById('passInput').value;
  if(email === 'admin@ssmart.com' && pass === 'admin123'){
    document.getElementById('loginPage').classList.remove('active');
    document.getElementById('dashPage').classList.add('active');
    setTimeout(()=>{ renderChart(); renderRecentOrders(); renderProducts(); renderOrders(); renderCustomers(); }, 300);
    showToast('👋','Selamat datang, Admin!');
  } else {
    showToast('⚠️','Email atau password salah');
  }
}
function doLogout(){
  document.getElementById('dashPage').classList.remove('active');
  document.getElementById('loginPage').classList.add('active');
  showToast('👋','Anda telah logout');
}

/* ════════════════════════════════════════
   NAVIGATION
   ════════════════════════════════════════ */
const titles = { overview:['Dashboard','Selamat pagi, Admin'], products:['Kelola Produk','Atur produk dan inventori'], orders:['Pesanan','Kelola semua transaksi'], customers:['Pelanggan','Daftar pelanggan aktif'], settings:['Pengaturan','Konfigurasitoko'] };

function goTo(page){
  document.querySelectorAll('.sub-page').forEach(p=> p.classList.remove('active'));
  document.getElementById('pg-'+page).classList.add('active');
  document.querySelectorAll('.sb-item').forEach(i=> i.classList.remove('active'));
  document.querySelector('.sb-item[data-page="'+page+'"]').classList.add('active');
  document.getElementById('topTitle').textContent = titles[page][0];
  document.getElementById('topSub').textContent   = titles[page][1];
}

/* ════════════════════════════════════════
   RENDER CHART
   ════════════════════════════════════════ */
function renderChart(){
  const wrap = document.getElementById('chartWrap');
  const max  = Math.max(...chartData.map(d=>d.val));
  wrap.innerHTML = chartData.map(d=>`
    <div class="chart-col">
      <div class="chart-bar-wrap">
        <div class="chart-bar" style="height:${(d.val/max)*100}%">
          <span class="bar-val">Rp ${(d.val/1000).toFixed(1)}K</span>
        </div>
      </div>
      <span class="chart-label">${d.day}</span>
    </div>`).join('');
}

/* ════════════════════════════════════════
   RENDER RECENT ORDERS (mini)
   ════════════════════════════════════════ */
function renderRecentOrders(){
  const el = document.getElementById('recentOrders');
  el.innerHTML = orders.slice(0,5).map(o=>`
    <div class="order-mini-row">
      <div class="om-avatar">${o.customer.split(' ').map(w=>w[0]).join('')}</div>
      <div class="om-info">
        <div class="om-name">${o.customer}</div>
        <div class="om-id">${o.id}</div>
      </div>
      <span class="om-price">Rp ${o.total.toLocaleString()}</span>
      <span class="om-status ${statusClass(o.status)}">${statusLabel(o.status)}</span>
    </div>`).join('');
}

/* ════════════════════════════════════════
   RENDER PRODUCTS TABLE
   ════════════════════════════════════════ */
let editId = null;
function renderProducts(list){
  const arr = list || products;
  document.getElementById('productsTbody').innerHTML = arr.map(p=>`
    <tr>
      <td><div class="tbl-product">
        <div class="tbl-thumb" style="background:${brandBg(p.brand)}">${p.emoji}</div>
        <div><div class="tp-name">${p.name}</div><div class="tp-brand">${p.cat}</div></div>
      </div></td>
      <td>${p.brand}</td>
      <td class="tbl-price">Rp ${p.price.toLocaleString()}</td>
      <td class="tbl-stock ${p.stock===0?'low':(p.stock<10?'low':'ok')}">${p.stock===0?'Habis':p.stock+' unit'}</td>
      <td><span class="om-status ${p.stock===0?'st-cancel':'st-done'}">${p.stock===0?'Habis':'Tersedia'}</span></td>
      <td><div class="tbl-actions">
        <div class="act-btn" onclick="openModal('edit',${p.id})" title="Edit">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <div class="act-btn danger" onclick="deleteProduct(${p.id})" title="Hapus">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
        </div>
      </div></td>
    </tr>`).join('');
}

function filterProducts(brand, btn){
  document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  renderProducts(brand==='all' ? products : products.filter(p=>p.brand===brand));
}

function deleteProduct(id){
  products = products.filter(p=>p.id!==id);
  renderProducts();
  showToast('🗑️','Produk berhasil dihapus');
}

/* ════════════════════════════════════════
   RENDER ORDERS TABLE
   ════════════════════════════════════════ */
function renderOrders(list){
  const arr = list || orders;
  document.getElementById('ordersTbody').innerHTML = arr.map(o=>`
    <tr>
      <td style="font-weight:600;color:var(--forest)">${o.id}</td>
      <td>${o.customer}</td>
      <td style="color:rgba(11,26,18,0.6)">${o.product}</td>
      <td class="tbl-price">Rp ${o.total.toLocaleString()}</td>
      <td><span class="om-status ${statusClass(o.status)}">${statusLabel(o.status)}</span></td>
      <td><div class="tbl-actions">
        <div class="act-btn" onclick="changeStatus('${o.id}')" title="Ubah Status">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/></svg>
        </div>
      </div></td>
    </tr>`).join('');
}

function filterOrders(status, btn){
  document.querySelectorAll('#pg-orders .filter-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  renderOrders(status==='all' ? orders : orders.filter(o=>o.status===status));
}

function changeStatus(id){
  const flow = { Pending:'Shipped', Shipped:'Delivered', Delivered:'Delivered', Cancelled:'Cancelled' };
  const o = orders.find(x=>x.id===id);
  if(o){
    const old = o.status;
    o.status = flow[o.status];
    renderOrders();
    renderRecentOrders();
    showToast('📦',`${id}: ${statusLabel(old)} → ${statusLabel(o.status)}`);
  }
}

/* ════════════════════════════════════════
   RENDER CUSTOMERS
   ════════════════════════════════════════ */
function renderCustomers(){
  document.getElementById('customerGrid').innerHTML = customers.map(c=>`
    <div class="cust-card">
      <div class="cust-avatar" style="background:${c.color}">${c.avatar}</div>
      <h5>${c.name}</h5>
      <div class="c-email">${c.email}</div>
      <div class="cust-stats">
        <div><div class="cs-val">${c.orders}</div><div class="cs-lbl">Pesanan</div></div>
        <div><div class="cs-val">Rp ${(c.spent/1000000).toFixed(1)}M</div><div class="cs-lbl">Total Belanja</div></div>
      </div>
    </div>`).join('');
}

/* ════════════════════════════════════════
   MODAL
   ════════════════════════════════════════ */
function openModal(mode, id){
  editId = id || null;
  document.getElementById('modalTitle').textContent = mode==='add' ? 'Tambah Produk Baru' : 'Edit Produk';
  if(mode==='edit'){
    const p = products.find(x=>x.id===id);
    document.getElementById('m-name').value  = p.name;
    document.getElementById('m-brand').value = p.brand;
    document.getElementById('m-cat').value   = p.cat;
    document.getElementById('m-price').value = p.price;
    document.getElementById('m-stock').value = p.stock;
  } else {
    document.getElementById('m-name').value  = '';
    document.getElementById('m-brand').value = '';
    document.getElementById('m-cat').value   = 'Premium';
    document.getElementById('m-price').value = '';
    document.getElementById('m-stock').value = '';
  }
  document.getElementById('modalOverlay').classList.add('open');
}

function closeModal(){
  document.getElementById('modalOverlay').classList.remove('open');
}

function saveProduct(){
  const name  = document.getElementById('m-name').value.trim();
  const brand = document.getElementById('m-brand').value;
  const cat   = document.getElementById('m-cat').value;
  const price = parseInt(document.getElementById('m-price').value);
  const stock = parseInt(document.getElementById('m-stock').value);
  if(!name || !brand || !price){ showToast('⚠️','Isi semua field yang diperlukan'); return; }

  const emojiMap = { BHS:'🟢', Sapphire:'🔵', Wadimor:'🟡', 'Gajah Duduk':'🟤', Atlas:'🟠' };

  if(editId){
    const p = products.find(x=>x.id===editId);
    Object.assign(p, { name, brand, cat, price, stock, emoji:emojiMap[brand] });
    showToast('✓','Produk berhasil diperbarui');
  } else {
    products.push({ id:Date.now(), name, brand, cat, price, stock, emoji:emojiMap[brand] });
    showToast('✓','Produk baru berhasil ditambahkan');
  }
  closeModal();
  renderProducts();
}

document.getElementById('modalOverlay').addEventListener('click', function(e){ if(e.target===this) closeModal(); });

/* ════════════════════════════════════════
   TOAST
   ════════════════════════════════════════ */
let toastTimer;
function showToast(icon, msg){
  document.getElementById('toastIcon').textContent = icon;
  document.getElementById('toastMsg').textContent  = msg;
  const t = document.getElementById('toast');
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(()=> t.classList.remove('show'), 2800);
}

/* ════════════════════════════════════════
   HELPERS
   ════════════════════════════════════════ */
function statusClass(s){ return { Pending:'st-pending', Shipped:'st-shipped', Delivered:'st-done', Cancelled:'st-cancel' }[s]; }
function statusLabel(s){ return { Pending:'Pending', Shipped:'Dikirim', Delivered:'Tiba', Cancelled:'Batal' }[s]; }
function brandBg(b){ return { BHS:'rgba(26,92,56,0.1)', Sapphire:'rgba(59,130,246,0.1)', Wadimor:'rgba(245,158,11,0.1)', 'Gajah Duduk':'rgba(160,110,60,0.12)', Atlas:'rgba(249,115,22,0.1)' }[b]; }

// Enter key login
document.getElementById('passInput').addEventListener('keydown', e=>{ if(e.key==='Enter') doLogin(); });
</script>
</body>
@endsection