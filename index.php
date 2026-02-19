<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>G7 E-Commerce – Your Trusted Shopping Partner in Tanzania</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
/* ── RESET & VARIABLES ─────────────────────────────── */
*{margin:0;padding:0;box-sizing:border-box}
:root{
  --primary:#FF6B2C;--dark:#0D1117;--light:#F8FAFC;
  --text:#1E293B;--muted:#64748B;--border:#E2E8F0;
  --card:#fff;--grad:linear-gradient(135deg,#FF6B2C 0%,#FF8C42 100%);
}
html{scroll-behavior:smooth}
body{font-family:'DM Sans',sans-serif;color:var(--text);background:var(--light);overflow-x:hidden}
h1,h2,h3,h4{font-family:'Raleway',sans-serif}

/* ── NAV ────────────────────────────────────────────── */
.navbar{position:fixed;top:0;left:0;right:0;z-index:999;
        background:rgba(13,17,23,.92);backdrop-filter:blur(16px);
        border-bottom:1px solid rgba(255,255,255,.06)}
.nav-inner{max-width:1200px;margin:0 auto;padding:0 24px;
           display:flex;align-items:center;justify-content:space-between;height:70px}
.logo{font-family:'Raleway',sans-serif;font-weight:900;font-size:26px;
      color:#fff;text-decoration:none;letter-spacing:-0.5px}
.logo span{color:var(--primary)}
.nav-links{display:flex;list-style:none;gap:4px}
.nav-links a{color:rgba(255,255,255,.7);text-decoration:none;padding:8px 16px;
             border-radius:8px;font-size:14px;font-weight:500;transition:.2s;cursor:pointer}
.nav-links a:hover,.nav-links a.active{color:#fff;background:rgba(255,107,44,.15)}
.nav-cta{background:var(--grad);color:#fff!important;border-radius:8px!important;
         padding:8px 20px!important;font-weight:700!important}
.nav-cta:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(255,107,44,.4);
               background:var(--grad)!important}

/* ── PAGE SYSTEM ────────────────────────────────────── */
.page{display:none}
.page.active{display:block;animation:fadeIn .4s ease}
@keyframes fadeIn{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
main{padding-top:70px}

/* ── BUTTONS ─────────────────────────────────────────── */
.btn{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;border:none;
     border-radius:10px;font-family:'Raleway',sans-serif;font-weight:700;font-size:15px;
     cursor:pointer;text-decoration:none;transition:.25s}
.btn-primary{background:var(--grad);color:#fff}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(255,107,44,.4)}
.btn-outline{background:transparent;color:#fff;border:2px solid rgba(255,255,255,.4)}
.btn-outline:hover{background:rgba(255,255,255,.1);border-color:#fff}
.btn-sm{padding:9px 18px;font-size:13px}

/* ── SECTION BASICS ─────────────────────────────────── */
.section{padding:90px 0}
.container{max-width:1200px;margin:0 auto;padding:0 24px}
.section-label{font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:2px;
               color:var(--primary);margin-bottom:12px}
.section-title{font-size:40px;font-weight:900;line-height:1.15;margin-bottom:16px}
.section-sub{font-size:16px;color:var(--muted);max-width:560px;line-height:1.7}
.text-center{text-align:center}.text-center .section-sub{margin:0 auto}

/* ══════════════════════════════════════════════════════
   HOME PAGE
══════════════════════════════════════════════════════ */
.hero{position:relative;min-height:calc(100vh - 70px);display:flex;align-items:center;
      background:var(--dark);overflow:hidden}
.hero-bg{position:absolute;inset:0;
         background-image:url('https://images.unsplash.com/photo-1483985988355-763728e1935b?w=1600');
         background-size:cover;background-position:center;opacity:.2}
.hero-glow{position:absolute;width:600px;height:600px;background:var(--primary);
           border-radius:50%;filter:blur(140px);opacity:.15;top:-100px;right:-100px}
.hero-content{position:relative;z-index:2;max-width:680px}
.hero-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(255,107,44,.12);
            border:1px solid rgba(255,107,44,.3);color:var(--primary);padding:6px 16px;
            border-radius:20px;font-size:13px;font-weight:600;margin-bottom:28px}
.hero h1{font-size:clamp(42px,7vw,76px);font-weight:900;color:#fff;line-height:1.05;
         letter-spacing:-2px;margin-bottom:22px}
.hero h1 span{color:var(--primary)}
.hero p{font-size:18px;color:rgba(255,255,255,.65);line-height:1.75;margin-bottom:36px;max-width:520px}
.hero-btns{display:flex;gap:14px;flex-wrap:wrap}
.hero-stats{display:flex;gap:40px;margin-top:56px;padding-top:40px;border-top:1px solid rgba(255,255,255,.08)}
.stat-item .num{font-family:'Raleway',sans-serif;font-size:32px;font-weight:900;color:#fff}
.stat-item .lbl{font-size:13px;color:rgba(255,255,255,.5);margin-top:2px}

/* Features strip */
.features-strip{background:#fff;padding:32px 0;border-bottom:1px solid var(--border)}
.features-inner{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1px;background:var(--border)}
.feature-item{background:#fff;padding:28px 24px;display:flex;align-items:center;gap:14px}
.feature-icon{width:44px;height:44px;border-radius:10px;background:rgba(255,107,44,.08);
              display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:18px;flex-shrink:0}
.feature-text strong{font-size:14px;font-weight:700;display:block;margin-bottom:2px}
.feature-text span{font-size:12px;color:var(--muted)}

/* Categories */
.cats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:20px;margin-top:48px}
.cat-card{position:relative;border-radius:16px;overflow:hidden;aspect-ratio:4/3;cursor:pointer}
.cat-card img{width:100%;height:100%;object-fit:cover;transition:.4s}
.cat-card:hover img{transform:scale(1.07)}
.cat-card .overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.8),transparent)}
.cat-card .cat-info{position:absolute;bottom:20px;left:20px}
.cat-card .cat-info h3{color:#fff;font-size:20px;font-weight:800}
.cat-card .cat-info span{color:rgba(255,255,255,.65);font-size:13px}

/* Featured products (home) */
.fp-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:24px;margin-top:48px}

/* ══════════════════════════════════════════════════════
   PRODUCTS PAGE
══════════════════════════════════════════════════════ */
.products-hero{background:var(--dark);padding:80px 0 56px;text-align:center}
.products-hero h1{color:#fff;font-size:48px;font-weight:900}
.products-hero p{color:rgba(255,255,255,.6);font-size:16px;margin-top:12px}

.filter-bar{background:#fff;padding:20px 24px;border-bottom:1px solid var(--border);
            display:flex;align-items:center;gap:12px;flex-wrap:wrap;position:sticky;top:70px;z-index:99}
.filter-btn{padding:8px 20px;border-radius:20px;border:1px solid var(--border);background:#fff;
            font-size:13px;font-weight:600;cursor:pointer;transition:.2s;color:var(--text)}
.filter-btn.active,.filter-btn:hover{background:var(--primary);color:#fff;border-color:var(--primary)}

.products-section{background:var(--light);padding:48px 0}
.products-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:24px}

/* Product Card */
.product-card{background:#fff;border-radius:16px;overflow:hidden;transition:.3s;
              box-shadow:0 1px 4px rgba(0,0,0,.06)}
.product-card:hover{transform:translateY(-6px);box-shadow:0 16px 40px rgba(0,0,0,.12)}
.product-card .img-wrap{height:220px;overflow:hidden;position:relative}
.product-card img{width:100%;height:100%;object-fit:cover;transition:.4s}
.product-card:hover img{transform:scale(1.05)}
.product-card .category-tag{position:absolute;top:12px;left:12px;background:rgba(255,107,44,.9);
                             color:#fff;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700}
.product-card .body{padding:20px}
.product-card .brand{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;
                     color:var(--primary);margin-bottom:6px}
.product-card h3{font-size:17px;font-weight:700;margin-bottom:8px;line-height:1.3}
.product-card p{font-size:13px;color:var(--muted);line-height:1.6;margin-bottom:16px;
                display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.product-card .foot{display:flex;align-items:center;justify-content:space-between;
                    padding-top:14px;border-top:1px solid var(--border)}
.product-card .price{font-family:'Raleway',sans-serif;font-size:20px;font-weight:900;color:var(--primary)}
.product-card .qty{font-size:12px;color:var(--muted)}
.product-card .qty span{color:var(--text);font-weight:600}

/* ══════════════════════════════════════════════════════
   ABOUT PAGE
══════════════════════════════════════════════════════ */
.about-hero{position:relative;padding:100px 0;background:var(--dark);overflow:hidden}
.about-hero-bg{position:absolute;inset:0;
               background-image:url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1400');
               background-size:cover;background-position:center;opacity:.12}
.about-hero .content{position:relative;z-index:2;text-align:center}
.about-hero h1{font-size:56px;font-weight:900;color:#fff;margin-bottom:16px}
.about-hero p{font-size:18px;color:rgba(255,255,255,.65);max-width:600px;margin:0 auto}

.about-story{padding:90px 0}
.story-grid{display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center}
.story-grid img{border-radius:20px;width:100%;height:420px;object-fit:cover}
.story-body .section-label{margin-top:0}
.story-body p{color:var(--muted);line-height:1.9;margin-bottom:18px;font-size:16px}

.values-section{background:#fff;padding:90px 0}
.values-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:28px;margin-top:52px}
.value-card{border:1px solid var(--border);border-radius:16px;padding:32px 28px;text-align:center;transition:.3s}
.value-card:hover{border-color:var(--primary);transform:translateY(-4px);box-shadow:0 12px 32px rgba(255,107,44,.1)}
.value-icon{width:64px;height:64px;border-radius:16px;background:rgba(255,107,44,.08);
            display:flex;align-items:center;justify-content:center;font-size:26px;
            color:var(--primary);margin:0 auto 20px}
.value-card h3{font-size:18px;font-weight:800;margin-bottom:10px}
.value-card p{font-size:14px;color:var(--muted);line-height:1.7}

.stats-section{background:var(--dark);padding:80px 0}
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:40px}
.stat-box{text-align:center}
.stat-box .num{font-family:'Raleway',sans-serif;font-size:52px;font-weight:900;color:var(--primary)}
.stat-box .lbl{font-size:15px;color:rgba(255,255,255,.6);margin-top:6px}

.team-section{padding:90px 0}
.team-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:32px;margin-top:52px}
.team-card{text-align:center}
.team-card img{width:140px;height:140px;border-radius:50%;object-fit:cover;margin:0 auto 18px;
               display:block;border:4px solid var(--primary)}
.team-card h3{font-size:18px;font-weight:800;margin-bottom:4px}
.team-card .role{font-size:13px;color:var(--primary);font-weight:600}
.team-card .bio{font-size:13px;color:var(--muted);margin-top:10px;line-height:1.6}

/* ══════════════════════════════════════════════════════
   CONTACT PAGE
══════════════════════════════════════════════════════ */
.contact-hero{background:var(--dark);padding:80px 0;text-align:center}
.contact-hero h1{color:#fff;font-size:52px;font-weight:900}
.contact-hero p{color:rgba(255,255,255,.6);font-size:17px;margin-top:12px}

.contact-section{padding:80px 0}
.contact-grid{display:grid;grid-template-columns:1fr 1.2fr;gap:48px;align-items:start}
.contact-info h2{font-size:28px;font-weight:800;margin-bottom:28px}
.contact-item{display:flex;gap:16px;margin-bottom:28px}
.ci-icon{width:50px;height:50px;border-radius:12px;background:rgba(255,107,44,.08);
         display:flex;align-items:center;justify-content:center;color:var(--primary);
         font-size:20px;flex-shrink:0}
.ci-text strong{font-size:14px;font-weight:700;display:block;margin-bottom:4px}
.ci-text span{font-size:14px;color:var(--muted);line-height:1.6}
.hours-table{margin-top:28px;border:1px solid var(--border);border-radius:12px;overflow:hidden}
.hours-table .hour-row{display:flex;justify-content:space-between;align-items:center;
                       padding:12px 16px;border-bottom:1px solid var(--border);font-size:14px}
.hours-table .hour-row:last-child{border-bottom:none}
.hours-table .day{font-weight:600}
.hours-table .time{color:var(--muted)}
.hours-table .closed{color:#ef4444;font-weight:600}

.social-title{font-size:16px;font-weight:700;margin:28px 0 14px}
.social-row{display:flex;gap:12px;flex-wrap:wrap}
.social-btn{display:inline-flex;align-items:center;gap:8px;padding:10px 18px;
            border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;transition:.2s}
.social-btn:hover{transform:translateY(-2px);box-shadow:0 6px 16px rgba(0,0,0,.15)}
.social-fb{background:#1877F2;color:#fff}
.social-ig{background:linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);color:#fff}
.social-yt{background:#FF0000;color:#fff}
.social-tw{background:#1DA1F2;color:#fff}
.social-wa{background:#25D366;color:#fff}

/* Contact Form */
.contact-form-card{background:#fff;border:1px solid var(--border);border-radius:20px;
                   padding:36px;box-shadow:0 4px 20px rgba(0,0,0,.06)}
.contact-form-card h2{font-size:24px;font-weight:800;margin-bottom:24px}
.form-group{margin-bottom:18px}
.form-group label{display:block;font-size:12px;font-weight:700;text-transform:uppercase;
                  letter-spacing:.6px;color:var(--muted);margin-bottom:8px}
.form-group input,.form-group textarea,.form-group select{
  width:100%;padding:12px 16px;border:1px solid var(--border);border-radius:10px;
  font-family:'DM Sans',sans-serif;font-size:14px;color:var(--text);transition:.2s;background:#fff}
.form-group input:focus,.form-group textarea:focus,.form-group select:focus{
  outline:none;border-color:var(--primary);box-shadow:0 0 0 3px rgba(255,107,44,.1)}
.form-group textarea{resize:vertical;min-height:110px}
.form-row-2{display:grid;grid-template-columns:1fr 1fr;gap:16px}

/* Map */
.map-section{padding:0 0 80px}
#map-embed{width:100%;height:420px;border:none;border-radius:20px;overflow:hidden;
           box-shadow:0 8px 32px rgba(0,0,0,.1)}

/* ══════════════════════════════════════════════════════
   FOOTER
══════════════════════════════════════════════════════ */
footer{background:var(--dark);padding:72px 0 0}
.footer-grid{display:grid;grid-template-columns:1.8fr 1fr 1fr 1fr;gap:48px;margin-bottom:56px}
.footer-brand .logo{font-size:28px;font-weight:900;font-family:'Raleway',sans-serif;
                    color:#fff;text-decoration:none;display:inline-block;margin-bottom:16px}
.footer-brand p{font-size:14px;color:rgba(255,255,255,.5);line-height:1.8;margin-bottom:24px}
.footer-social{display:flex;gap:10px}
.fs-link{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;
         justify-content:center;font-size:16px;text-decoration:none;transition:.25s}
.fs-link:hover{transform:translateY(-3px)}
.fs-fb{background:#1877F2;color:#fff}
.fs-ig{background:linear-gradient(135deg,#f09433,#dc2743,#bc1888);color:#fff}
.fs-yt{background:#FF0000;color:#fff}
.fs-tw{background:#1DA1F2;color:#fff}
.fs-wa{background:#25D366;color:#fff}

.footer-col h4{font-size:13px;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;
               color:rgba(255,255,255,.9);margin-bottom:20px}
.footer-col a,.footer-col span{display:block;color:rgba(255,255,255,.5);font-size:14px;
                               text-decoration:none;margin-bottom:10px;transition:.2s;cursor:pointer}
.footer-col a:hover{color:var(--primary)}

.newsletter{background:rgba(255,107,44,.08);border:1px solid rgba(255,107,44,.2);
            border-radius:12px;padding:28px;margin-top:32px}
.newsletter h4{font-size:15px;font-weight:700;color:#fff;margin-bottom:8px}
.newsletter p{font-size:13px;color:rgba(255,255,255,.5);margin-bottom:16px}
.newsletter form{display:flex;gap:10px}
.newsletter input{flex:1;padding:11px 16px;background:rgba(255,255,255,.08);
                  border:1px solid rgba(255,255,255,.12);border-radius:8px;
                  color:#fff;font-size:13px}
.newsletter input::placeholder{color:rgba(255,255,255,.3)}
.newsletter input:focus{outline:none;border-color:var(--primary)}
.newsletter button{padding:11px 18px;background:var(--primary);color:#fff;
                   border:none;border-radius:8px;font-weight:700;cursor:pointer;
                   font-size:13px;transition:.2s;white-space:nowrap}
.newsletter button:hover{background:#e55a20}

.footer-bottom{border-top:1px solid rgba(255,255,255,.06);padding:22px 0}
.footer-bottom-inner{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px}
.footer-bottom-inner p{font-size:13px;color:rgba(255,255,255,.35)}
.footer-bottom-links{display:flex;gap:20px}
.footer-bottom-links a{font-size:13px;color:rgba(255,255,255,.35);text-decoration:none;transition:.2s}
.footer-bottom-links a:hover{color:var(--primary)}

/* Loading skeleton */
.skeleton{background:linear-gradient(90deg,#f0f0f0 25%,#e0e0e0 50%,#f0f0f0 75%);
          background-size:200% 100%;animation:shimmer 1.5s infinite;border-radius:8px}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}

/* ── Responsive ─────────────────────────────────────── */
@media(max-width:900px){
  .story-grid{grid-template-columns:1fr}
  .contact-grid{grid-template-columns:1fr}
  .footer-grid{grid-template-columns:1fr 1fr}
  .hero h1{font-size:48px}
}
@media(max-width:600px){
  .footer-grid{grid-template-columns:1fr}
  .section-title{font-size:30px}
  .hero h1{font-size:36px}
  .form-row-2{grid-template-columns:1fr}
  .hero-stats{flex-direction:column;gap:20px}
}
</style>
</head>
<body>

<!-- ── NAV ───────────────────────────────────────────── -->
<nav class="navbar">
  <div class="nav-inner">
    <a class="logo" href="#"><span>G7</span>Store</a>
    <ul class="nav-links">
      <li><a onclick="showPage('home')" class="active" id="nav-home">Home</a></li>
      <li><a onclick="showPage('products')" id="nav-products">Products</a></li>
      <li><a onclick="showPage('about')" id="nav-about">About</a></li>
      <li><a onclick="showPage('contact')" id="nav-contact">Contact</a></li>
      <li><a href="../admin/login.php" class="nav-cta"><i class="fas fa-shield-halved"></i> Admin</a></li>
    </ul>
  </div>
</nav>

<main>

<!-- ══════════════════════════════════════════════════════
     HOME PAGE
══════════════════════════════════════════════════════ -->
<div id="page-home" class="page active">

  <!-- Hero -->
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-glow"></div>
    <div class="container">
      <div class="hero-content">
        <div class="hero-badge"><i class="fas fa-bolt"></i> Tanzania's #1 E-Commerce Platform</div>
        <h1>Shop Smart, <br>Live <span>Better</span></h1>
        <p>Discover thousands of quality products — electronics, fashion, home essentials and more — delivered straight to your door across Tanzania.</p>
        <div class="hero-btns">
          <button class="btn btn-primary" onclick="showPage('products')"><i class="fas fa-bag-shopping"></i> Shop Now</button>
          <button class="btn btn-outline" onclick="showPage('about')"><i class="fas fa-play"></i> Our Story</button>
        </div>
        <div class="hero-stats">
          <div class="stat-item"><div class="num">50K+</div><div class="lbl">Happy Customers</div></div>
          <div class="stat-item"><div class="num">500+</div><div class="lbl">Products</div></div>
          <div class="stat-item"><div class="num">20+</div><div class="lbl">Cities Covered</div></div>
          <div class="stat-item"><div class="num">4.9★</div><div class="lbl">Customer Rating</div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features -->
  <div class="features-strip">
    <div class="features-inner">
      <div class="feature-item">
        <div class="feature-icon"><i class="fas fa-truck-fast"></i></div>
        <div class="feature-text"><strong>Fast Delivery</strong><span>Same-day in Dar es Salaam</span></div>
      </div>
      <div class="feature-item">
        <div class="feature-icon"><i class="fas fa-shield-check"></i></div>
        <div class="feature-text"><strong>Secure Payments</strong><span>100% safe transactions</span></div>
      </div>
      <div class="feature-item">
        <div class="feature-icon"><i class="fas fa-rotate-left"></i></div>
        <div class="feature-text"><strong>Easy Returns</strong><span>30-day hassle-free returns</span></div>
      </div>
      <div class="feature-item">
        <div class="feature-icon"><i class="fas fa-headset"></i></div>
        <div class="feature-text"><strong>24/7 Support</strong><span>Always here to help</span></div>
      </div>
    </div>
  </div>

  <!-- Categories -->
  <section class="section">
    <div class="container">
      <div class="section-label">Browse by Category</div>
      <div class="section-title">Shop What You Love</div>
      <div class="cats-grid">
        <div class="cat-card" onclick="filterAndGo('Electronics')">
          <img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?w=600" alt="Electronics">
          <div class="overlay"></div>
          <div class="cat-info"><h3>Electronics</h3><span>Gadgets & Tech</span></div>
        </div>
        <div class="cat-card" onclick="filterAndGo('Fashion')">
          <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=600" alt="Fashion">
          <div class="overlay"></div>
          <div class="cat-info"><h3>Fashion</h3><span>Clothing & Shoes</span></div>
        </div>
        <div class="cat-card" onclick="filterAndGo('Home')">
          <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600" alt="Home">
          <div class="overlay"></div>
          <div class="cat-info"><h3>Home & Living</h3><span>Appliances & Decor</span></div>
        </div>
        <div class="cat-card" onclick="filterAndGo('Sports')">
          <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?w=600" alt="Sports">
          <div class="overlay"></div>
          <div class="cat-info"><h3>Sports</h3><span>Gear & Equipment</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Products -->
  <section class="section" style="background:#fff;padding-top:70px">
    <div class="container">
      <div class="text-center">
        <div class="section-label">Hand-Picked</div>
        <div class="section-title">Featured Products</div>
        <div class="section-sub">Curated selection of our best-selling items</div>
      </div>
      <div class="fp-grid" id="featured-container">
        <!-- injected by JS -->
        <div style="height:320px" class="skeleton"></div>
        <div style="height:320px" class="skeleton"></div>
        <div style="height:320px" class="skeleton"></div>
        <div style="height:320px" class="skeleton"></div>
      </div>
      <div style="text-align:center;margin-top:40px">
        <button class="btn btn-primary" onclick="showPage('products')"><i class="fas fa-grid-2"></i> View All Products</button>
      </div>
    </div>
  </section>

</div><!-- end home -->

<!-- ══════════════════════════════════════════════════════
     PRODUCTS PAGE
══════════════════════════════════════════════════════ -->
<div id="page-products" class="page">
  <div class="products-hero">
    <div class="container">
      <h1>Our Products</h1>
      <p>Browse our full catalogue — fresh stock fetched live from our database</p>
    </div>
  </div>
  <div class="filter-bar">
    <button class="filter-btn active" onclick="filterProducts('all',this)">All</button>
    <button class="filter-btn" onclick="filterProducts('Electronics',this)"><i class="fas fa-laptop"></i> Electronics</button>
    <button class="filter-btn" onclick="filterProducts('Fashion',this)"><i class="fas fa-shirt"></i> Fashion</button>
    <button class="filter-btn" onclick="filterProducts('Home',this)"><i class="fas fa-home"></i> Home</button>
    <button class="filter-btn" onclick="filterProducts('Sports',this)"><i class="fas fa-dumbbell"></i> Sports</button>
  </div>
  <div class="products-section">
    <div class="container">
      <div class="products-grid" id="products-container">
        <!-- filled by JS -->
      </div>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════
     ABOUT PAGE
══════════════════════════════════════════════════════ -->
<div id="page-about" class="page">

  <div class="about-hero">
    <div class="about-hero-bg"></div>
    <div class="container content">
      <div class="section-label" style="text-align:center;margin-bottom:14px">About G7 E-Commerce</div>
      <h1>Built for Tanzania,<br>Loved by Thousands</h1>
      <p>We're on a mission to make quality products accessible to every Tanzanian</p>
    </div>
  </div>

  <!-- Story -->
  <section class="about-story">
    <div class="container">
      <div class="story-grid">
        <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800" alt="Our Story">
        <div class="story-body">
          <div class="section-label">Our Story</div>
          <div class="section-title">From a Small Idea to Tanzania's Trusted Online Store</div>
          <p>G7 E-Commerce was founded in 2024 with a single goal: to bring the convenience of online shopping to every corner of Tanzania. We saw that many Tanzanians lacked access to quality products at fair prices — and we decided to change that.</p>
          <p>Starting with just 20 products and a passionate team of five, we have grown to offer over 500 products across four major categories, serving customers in more than 20 cities nationwide.</p>
          <p>Today, G7 E-Commerce is trusted by over 50,000 customers who rely on us every day for electronics, fashion, home appliances, sports equipment, and much more. Our commitment to quality, transparency, and customer satisfaction has never wavered.</p>
          <button class="btn btn-primary" onclick="showPage('contact')"><i class="fas fa-envelope"></i> Get in Touch</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Values -->
  <section class="values-section">
    <div class="container">
      <div class="text-center">
        <div class="section-label">What We Stand For</div>
        <div class="section-title">Our Core Values</div>
      </div>
      <div class="values-grid">
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-shield-halved"></i></div>
          <h3>Trust & Security</h3>
          <p>Every transaction is secured with industry-standard encryption. Your data and money are always safe with us.</p>
        </div>
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-truck-fast"></i></div>
          <h3>Fast Delivery</h3>
          <p>We operate an efficient logistics network ensuring your orders reach you quickly, wherever you are in Tanzania.</p>
        </div>
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-star"></i></div>
          <h3>Quality Products</h3>
          <p>We carefully vet every supplier and product category to ensure only genuine, high-quality items are listed.</p>
        </div>
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-headset"></i></div>
          <h3>Customer First</h3>
          <p>Our 24/7 support team is always ready to resolve issues, answer questions, and ensure your satisfaction.</p>
        </div>
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-hand-holding-heart"></i></div>
          <h3>Community Impact</h3>
          <p>We partner with local Tanzanian businesses, empowering entrepreneurs and creating jobs across the country.</p>
        </div>
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-leaf"></i></div>
          <h3>Sustainability</h3>
          <p>We're committed to eco-friendly packaging and reducing our carbon footprint in every delivery we make.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stats-section">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-box"><div class="num">50,000+</div><div class="lbl">Happy Customers</div></div>
        <div class="stat-box"><div class="num">500+</div><div class="lbl">Products Listed</div></div>
        <div class="stat-box"><div class="num">20+</div><div class="lbl">Cities Covered</div></div>
        <div class="stat-box"><div class="num">98%</div><div class="lbl">Satisfaction Rate</div></div>
        <div class="stat-box"><div class="num">100K+</div><div class="lbl">Orders Fulfilled</div></div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="team-section">
    <div class="container">
      <div class="text-center">
        <div class="section-label">The People Behind G7</div>
        <div class="section-title">Meet Our Team</div>
      </div>
      <div class="team-grid">
        <div class="team-card">
          <img src="https://i.pravatar.cc/140?img=11" alt="CEO">
          <h3>Israel Zumba</h3>
          <div class="role">Founder & CEO</div>
          <p class="bio">Visionary leader with 10+ years in e-commerce and technology. Passionate about transforming African retail.</p>
        </div>
        <div class="team-card">
          <img src="https://i.pravatar.cc/140?img=47" alt="CTO">
          <h3>Mary Njovu</h3>
          <div class="role">Chief Technology Officer</div>
          <p class="bio">Full-stack engineer and system architect. Ensures our platform is fast, reliable and secure.</p>
        </div>
        <div class="team-card">
          <img src="https://i.pravatar.cc/140?img=33" alt="CMO">
          <h3>Peter Kilimani</h3>
          <div class="role">Head of Marketing</div>
          <p class="bio">Creative strategist growing G7's brand across Tanzania through digital marketing and partnerships.</p>
        </div>
        <div class="team-card">
          <img src="https://i.pravatar.cc/140?img=44" alt="COO">
          <h3>Grace Mbeya</h3>
          <div class="role">Head of Operations</div>
          <p class="bio">Logistics expert managing our warehouse, delivery network and customer experience operations.</p>
        </div>
      </div>
    </div>
  </section>

</div><!-- end about -->

<!-- ══════════════════════════════════════════════════════
     CONTACT PAGE
══════════════════════════════════════════════════════ -->
<div id="page-contact" class="page">

  <div class="contact-hero">
    <div class="container">
      <div class="section-label" style="text-align:center;margin-bottom:12px">We'd Love to Hear From You</div>
      <h1>Contact Us</h1>
      <p>Reach out through any channel — we respond within 24 hours</p>
    </div>
  </div>

  <section class="contact-section">
    <div class="container">
      <div class="contact-grid">

        <!-- Info Panel -->
        <div>
          <h2>Get In Touch</h2>
          <div class="contact-item">
            <div class="ci-icon"><i class="fas fa-map-location-dot"></i></div>
            <div class="ci-text">
              <strong>Office Address</strong>
              <span>Kariakoo Street, Dar es Salaam<br>P.O. Box 12345, Tanzania</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon"><i class="fas fa-phone"></i></div>
            <div class="ci-text">
              <strong>Phone Numbers</strong>
              <span>+255 700 000 000 (Main)<br>+255 711 111 111 (Support)</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon"><i class="fas fa-envelope"></i></div>
            <div class="ci-text">
              <strong>Email Addresses</strong>
              <span>info@g7store.co.tz<br>support@g7store.co.tz</span>
            </div>
          </div>

          <div class="hours-table">
            <div class="hour-row"><span class="day">Monday – Friday</span><span class="time">8:00 AM – 6:00 PM</span></div>
            <div class="hour-row"><span class="day">Saturday</span><span class="time">9:00 AM – 4:00 PM</span></div>
            <div class="hour-row"><span class="day">Sunday</span><span class="closed">Closed</span></div>
            <div class="hour-row"><span class="day">Public Holidays</span><span class="closed">Closed</span></div>
          </div>

          <div class="social-title">Follow Us on Social Media</div>
          <div class="social-row">
            <a href="https://facebook.com/g7store" target="_blank" class="social-btn social-fb"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="https://instagram.com/g7store" target="_blank" class="social-btn social-ig"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="https://youtube.com/@g7store" target="_blank" class="social-btn social-yt"><i class="fab fa-youtube"></i> YouTube</a>
            <a href="https://twitter.com/g7store" target="_blank" class="social-btn social-tw"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="https://wa.me/255700000000" target="_blank" class="social-btn social-wa"><i class="fab fa-whatsapp"></i> WhatsApp</a>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-card">
          <h2><i class="fas fa-paper-plane" style="color:var(--primary)"></i> Send Us a Message</h2>
          <form onsubmit="submitContactForm(event)">
            <div class="form-row-2">
              <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="first_name" required placeholder="John">
              </div>
              <div class="form-group">
                <label>Last Name *</label>
                <input type="text" name="last_name" required placeholder="Doe">
              </div>
            </div>
            <div class="form-group">
              <label>Email Address *</label>
              <input type="email" name="email" required placeholder="john@example.com">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="tel" name="phone" placeholder="+255 712 345 678">
            </div>
            <div class="form-group">
              <label>Subject</label>
              <select name="subject">
                <option>General Inquiry</option>
                <option>Order Support</option>
                <option>Product Information</option>
                <option>Complaint</option>
                <option>Partnership</option>
              </select>
            </div>
            <div class="form-group">
              <label>Message *</label>
              <textarea name="message" required placeholder="Write your message here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center">
              <i class="fas fa-paper-plane"></i> Send Message
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Google Map -->
  <div class="map-section">
    <div class="container">
      <div class="text-center" style="margin-bottom:32px">
        <div class="section-label">Find Us</div>
        <div class="section-title">Our Location</div>
      </div>
      <iframe id="map-embed"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.8208209948!2d39.27622407480735!3d-6.8161499931226895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4b02e9d9a7a3%3A0x9b5b6b8b8b8b8b8b!2sKariakoo%2C%20Dar%20es%20Salaam%2C%20Tanzania!5e0!3m2!1sen!2sus!4v1700000000000"
        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

</div><!-- end contact -->

</main>

<!-- ── FOOTER ─────────────────────────────────────────── -->
<footer>
  <div class="container">
    <div class="footer-grid">

      <!-- Brand -->
      <div class="footer-brand">
        <a class="logo"><span style="color:var(--primary)">G7</span>Store</a>
        <p>Tanzania's most trusted e-commerce platform. Quality products, fast delivery, and exceptional service — every time.</p>
        <div class="footer-social">
          <a href="https://facebook.com/g7store" target="_blank" class="fs-link fs-fb"><i class="fab fa-facebook-f"></i></a>
          <a href="https://instagram.com/g7store" target="_blank" class="fs-link fs-ig"><i class="fab fa-instagram"></i></a>
          <a href="https://youtube.com/@g7store" target="_blank" class="fs-link fs-yt"><i class="fab fa-youtube"></i></a>
          <a href="https://twitter.com/g7store" target="_blank" class="fs-link fs-tw"><i class="fab fa-twitter"></i></a>
          <a href="https://wa.me/255700000000" target="_blank" class="fs-link fs-wa"><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="newsletter">
          <h4>Stay in the Loop</h4>
          <p>Get deals and new arrivals in your inbox</p>
          <form onsubmit="subscribeNewsletter(event)">
            <input type="email" required placeholder="Your email address">
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>

      <!-- Shop -->
      <div class="footer-col">
        <h4>Shop</h4>
        <a onclick="filterAndGo('Electronics')">Electronics</a>
        <a onclick="filterAndGo('Fashion')">Fashion</a>
        <a onclick="filterAndGo('Home')">Home & Living</a>
        <a onclick="filterAndGo('Sports')">Sports & Outdoors</a>
        <a onclick="showPage('products')">All Products</a>
      </div>

      <!-- Company -->
      <div class="footer-col">
        <h4>Company</h4>
        <a onclick="showPage('about')">About Us</a>
        <a onclick="showPage('contact')">Contact</a>
        <span>Careers</span>
        <span>Blog</span>
        <span>Press</span>
      </div>

      <!-- Support -->
      <div class="footer-col">
        <h4>Support</h4>
        <span>Track Your Order</span>
        <span>Shipping Info</span>
        <span>Returns & Refunds</span>
        <span>FAQs</span>
        <a href="../admin/login.php"><i class="fas fa-shield-halved"></i> Admin Panel</a>
        <div style="margin-top:20px;padding-top:16px;border-top:1px solid rgba(255,255,255,.06)">
          <span style="font-size:12px;text-transform:uppercase;letter-spacing:1px;margin-bottom:10px;display:block">Contact</span>
          <span><i class="fas fa-phone" style="margin-right:6px;color:var(--primary)"></i>+255 700 000 000</span>
          <span><i class="fas fa-envelope" style="margin-right:6px;color:var(--primary)"></i>info@g7store.co.tz</span>
          <span><i class="fas fa-map-pin" style="margin-right:6px;color:var(--primary)"></i>Dar es Salaam, TZ</span>
        </div>
      </div>

    </div><!-- end footer-grid -->

    <div class="footer-bottom">
      <div class="footer-bottom-inner">
        <p>&copy; 2026 G7 E-Commerce. All rights reserved. | RCS 212 Project</p>
        <div class="footer-bottom-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
          <a href="#">Cookie Policy</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- ── JAVASCRIPT ─────────────────────────────────────── -->
<script>
/* ── navigation ── */
let activeFilter = 'all';
let allProducts  = [];

function showPage(page) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
  document.getElementById('page-' + page).classList.add('active');
  const nl = document.getElementById('nav-' + page);
  if (nl) nl.classList.add('active');
  window.scrollTo({top: 0, behavior: 'smooth'});
}

function filterAndGo(cat) {
  activeFilter = cat;
  showPage('products');
  // apply filter after render
  setTimeout(() => {
    document.querySelectorAll('.filter-btn').forEach(b => {
      b.classList.toggle('active', b.textContent.trim().includes(cat));
    });
    renderProducts(cat === 'all' ? allProducts : allProducts.filter(p => p.category === cat));
  }, 100);
}

/* ── product card renderer ── */
function productCard(p) {
  return `
  <div class="product-card">
    <div class="img-wrap">
      <img src="${p.image_url || 'https://via.placeholder.com/300x220'}" alt="${esc(p.name)}"
           onerror="this.src='https://via.placeholder.com/300x220'">
      <div class="category-tag">${esc(p.category)}</div>
    </div>
    <div class="body">
      <div class="brand">${esc(p.brand)}</div>
      <h3>${esc(p.name)}</h3>
      <p>${esc(p.description || 'Quality product from G7 E-Commerce.')}</p>
      <div class="foot">
        <div class="price">Tsh ${Number(p.price).toLocaleString()}</div>
        <div class="qty">Qty: <span>${p.quantity}</span></div>
      </div>
    </div>
  </div>`;
}

function esc(s) { return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }

function renderProducts(list) {
  const c = document.getElementById('products-container');
  if (!c) return;
  if (!list.length) { c.innerHTML = '<p style="color:#64748b;text-align:center;grid-column:1/-1;padding:40px">No products in this category.</p>'; return; }
  c.innerHTML = list.map(productCard).join('');
}

function renderFeatured(list) {
  const c = document.getElementById('featured-container');
  if (!c) return;
  const featured = list.slice(0, 4);
  c.innerHTML = featured.map(productCard).join('');
}

/* ── fetch products from PHP API ── */
async function loadProducts() {
  try {
    const r = await fetch('api/get_products.php');
    const data = await r.json();
    if (data.success) {
      allProducts = data.products;
      renderFeatured(allProducts);
      renderProducts(allProducts);
    }
  } catch(e) {
    // Fallback: show static message
    const c = document.getElementById('featured-container');
    if(c) c.innerHTML = '<p style="color:#64748b;text-align:center;grid-column:1/-1;padding:40px"><i class="fas fa-database" style="font-size:40px;display:block;margin-bottom:12px"></i>Connect to your PHP server to load products from the database.</p>';
    const c2 = document.getElementById('products-container');
    if(c2) c2.innerHTML = '<p style="color:#64748b;text-align:center;grid-column:1/-1;padding:40px"><i class="fas fa-database" style="font-size:40px;display:block;margin-bottom:12px"></i>Connect to your PHP server to load products from the database.</p>';
  }
}

/* ── filter products ── */
function filterProducts(cat, btn) {
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  activeFilter = cat;
  if (cat === 'all') renderProducts(allProducts);
  else renderProducts(allProducts.filter(p => p.category === cat));
}

/* ── forms ── */
function submitContactForm(e) {
  e.preventDefault();
  const name = e.target.first_name.value + ' ' + e.target.last_name.value;
  alert(`✅ Thank you, ${name}!\n\nYour message has been sent. We will get back to you within 24 hours.`);
  e.target.reset();
}

function subscribeNewsletter(e) {
  e.preventDefault();
  alert('🎉 You\'re subscribed! Welcome to the G7 family. Expect great deals in your inbox!');
  e.target.reset();
}

/* ── init ── */
loadProducts();
</script>
</body>
</html>
