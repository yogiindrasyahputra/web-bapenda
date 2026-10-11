<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pajak Hotel | Kota Padangsidimpuan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
    <style>
        :root { --navy:#103b5d; --deep:#082943; --teal:#087f78; --gold:#f4c542; --ink:#173b62; --muted:#6a7c8d; --line:#dcebe8; --soft:#f2f8f7; }
        * { box-sizing:border-box; }
        html { scroll-behavior:smooth; }
        body { margin:0; color:var(--ink); background:#fff; font-family:'DM Sans',sans-serif; }
        a { color:inherit; text-decoration:none; }
        .top-strip { padding:9px max(24px,calc((100% - 1180px)/2)); color:rgba(255,255,255,.78); background:var(--deep); font-size:11px; }
        .top-strip-inner { display:flex; justify-content:space-between; gap:18px; }
        .site-header { position:relative; z-index:3; border-bottom:1px solid var(--line); background:rgba(255,255,255,.97); }
        .site-nav { display:flex; align-items:center; justify-content:space-between; gap:26px; width:min(100% - 48px,1180px); min-height:82px; margin:auto; }
        .brand { display:flex; align-items:center; gap:12px; min-width:220px; }
        .brand-mark { display:grid; place-items:center; flex:0 0 48px; width:48px; height:54px; overflow:hidden; background:transparent; filter:drop-shadow(0 5px 7px rgba(8,127,120,.2)); clip-path:polygon(0 18%,24% 5%,50% 0,76% 5%,100% 18%,100% 60%,86% 84%,50% 100%,14% 84%,0 60%); }
        .brand-mark img { width:100%; height:100%; object-fit:cover; }
        .brand strong,.brand small { display:block; }.brand strong { color:var(--navy); font-size:12px; letter-spacing:.045em; line-height:1.25; }.brand small { margin-top:4px; color:var(--muted); font-size:9px; letter-spacing:.06em; text-transform:uppercase; }
        .nav-links { display:flex; align-items:center; gap:25px; color:#49657a; font-size:12px; font-weight:700; }.nav-links a { padding:31px 0 28px; border-bottom:3px solid transparent; white-space:nowrap; }.nav-links a:hover,.nav-links a.active { color:var(--teal); border-bottom-color:var(--gold); }
        .nav-actions { display:flex; align-items:center; gap:9px; }.nav-logout-form { display:contents; }.nav-login,.nav-register { display:inline-flex; align-items:center; justify-content:center; min-height:36px; padding:0 16px; border-radius:7px; font-size:11px; font-weight:800; }.nav-login { color:var(--teal); border:1px solid #b9ded4; }.nav-register { color:#fff; border:0; background:linear-gradient(135deg,var(--teal),#1763a5); cursor:pointer; }
        .hero { position:relative; min-height:480px; color:#fff; background:linear-gradient(90deg,rgba(5,48,79,.9),rgba(9,78,105,.6) 48%,rgba(8,102,96,.12)),url('https://cdn.phototourl.com/member/2026-09-12-2a1e9be2-995f-427b-97f7-ab2b27507f1d.jpg') center/cover; }.hero-inner { display:flex; align-items:center; width:min(100% - 48px,1180px); min-height:480px; margin:auto; }.hero-copy { max-width:620px; padding:52px 0; }.eyebrow { display:inline-flex; align-items:center; gap:10px; color:var(--gold); font-size:12px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; }.eyebrow:before { width:28px; height:2px; content:''; background:var(--gold); }.hero h1 { margin:15px 0 17px; font-family:'Playfair Display',serif; font-size:clamp(38px,5.2vw,68px); line-height:1.02; }.hero h1 em { color:var(--gold); font-style:normal; }.hero p { max-width:525px; margin:0 0 26px; color:rgba(255,255,255,.87); font-size:15px; line-height:1.7; }.hero-actions { display:flex; flex-wrap:wrap; gap:10px; }.hero-primary,.hero-secondary { display:inline-flex; align-items:center; gap:14px; min-height:46px; padding:0 19px; border-radius:6px; font-size:12px; font-weight:800; }.hero-primary { color:var(--navy); background:var(--gold); }.hero-secondary { color:#fff; border:1px solid rgba(255,255,255,.5); background:rgba(255,255,255,.08); }
        .quick-links { position:relative; z-index:2; display:grid; grid-template-columns:repeat(4,1fr); width:min(100% - 48px,1180px); margin:-42px auto 0; overflow:hidden; border-radius:10px; box-shadow:0 14px 34px rgba(18,63,89,.15); }.quick-link { display:flex; align-items:center; gap:13px; min-height:84px; padding:16px 19px; color:#fff; background:var(--teal); border-right:1px solid rgba(255,255,255,.16); }.quick-link:nth-child(2){background:#1763a5}.quick-link:nth-child(3){background:#315b86}.quick-link:nth-child(4){background:#d49425;border-right:0}.quick-icon { display:grid; place-items:center; flex:0 0 34px; width:34px; height:34px; border:1px solid rgba(255,255,255,.45); border-radius:8px; font-size:11px; font-weight:800; }.quick-link strong,.quick-link small { display:block; }.quick-link strong { font-size:12px; }.quick-link small { margin-top:4px; color:rgba(255,255,255,.75); font-size:10px; }
        .section { width:min(100% - 48px,1180px); margin:auto; padding:84px 0; }.section-heading { display:flex; align-items:end; justify-content:space-between; gap:20px; margin-bottom:28px; }.section-heading h2,.info-grid h2 { margin:8px 0 0; color:var(--navy); font-family:'Playfair Display',serif; font-size:33px; }.section-heading p { max-width:400px; margin:0; color:var(--muted); font-size:13px; line-height:1.6; text-align:right; }.service-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:17px; }.service-card { padding:25px; border:1px solid var(--line); border-radius:10px; background:#fff; box-shadow:0 10px 24px rgba(18,63,89,.05); }.service-number { color:var(--teal); font-size:11px; font-weight:800; letter-spacing:.1em; }.service-card h3 { margin:26px 0 8px; color:var(--navy); font-size:18px; }.service-card p { min-height:45px; margin:0; color:var(--muted); font-size:12px; line-height:1.6; }.service-card a { display:inline-block; margin-top:20px; color:var(--teal); font-size:11px; font-weight:800; }
        .info-band { background:var(--soft); border-top:1px solid var(--line); border-bottom:1px solid var(--line); }.info-grid { display:grid; grid-template-columns:1.2fr .8fr; gap:70px; align-items:center; }.info-grid h2 { margin:10px 0 13px; font-size:34px; }.info-grid p { margin:0; color:var(--muted); font-size:13px; line-height:1.75; }.about-copy { max-width:650px; }.about-copy p + p { margin-top:14px; }.about-lead { font-size:15px !important; font-weight:600; line-height:1.7 !important; }.about-points { display:grid; gap:11px; margin:22px 0 0; padding:0; list-style:none; }.about-points li { position:relative; padding-left:25px; color:var(--muted); font-size:12px; line-height:1.6; }.about-points li:before { position:absolute; top:.52em; left:0; width:10px; height:10px; border-radius:50%; content:''; background:var(--teal); box-shadow:0 0 0 4px rgba(8,127,120,.12); }.contact-list { display:grid; gap:14px; padding-left:22px; border-left:3px solid var(--gold); }.contact-list strong,.contact-list span { display:block; }.contact-list strong { color:var(--navy); font-size:12px; }.contact-list span { margin-top:4px; color:var(--muted); font-size:12px; line-height:1.5; }.contact-list a { color:var(--teal); font-weight:700; text-decoration:underline; text-underline-offset:3px; }.site-footer { padding:30px max(24px,calc((100% - 1180px)/2)); color:rgba(255,255,255,.7); background:var(--deep); font-size:11px; }.footer-inner { display:flex; justify-content:space-between; gap:24px; }.footer-brand { color:#fff; font-weight:800; letter-spacing:.05em; }
        .news-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:17px; }.news-card { min-height:210px; padding:23px; border-radius:10px; background:var(--navy); color:#fff; }.news-card:nth-child(2) { background:#1763a5; }.news-card:nth-child(3) { background:#087f78; }.news-card:nth-child(4) { background:#315b86; }.news-card:nth-child(5) { background:#b9624e; }.news-card:nth-child(6) { background:#4f7e64; }.news-card small { color:rgba(255,255,255,.65); font-size:10px; letter-spacing:.08em; text-transform:uppercase; }.news-card h3 { margin:24px 0 9px; font-family:'Playfair Display',serif; font-size:22px; line-height:1.15; }.news-card p { margin:0; color:rgba(255,255,255,.78); font-size:12px; line-height:1.6; }.news-card a { display:inline-block; margin-top:18px; color:var(--gold); font-size:11px; font-weight:800; }.gallery-grid { display:grid; grid-template-columns:repeat(4,1fr); grid-auto-rows:180px; gap:14px; }.gallery-item { min-height:0; padding:20px; display:flex; align-items:end; border-radius:12px; color:#fff; background-position:center; background-size:cover; box-shadow:inset 0 -120px 90px rgba(4,25,42,.62); }.gallery-item:nth-child(1) { grid-column:span 2; grid-row:span 2; background-image:url('https://cdn.phototourl.com/member/2026-09-15-7bddb6f7-9d71-4948-be5f-f6db839534c4.jpg'); }.gallery-item:nth-child(2) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-a255c570-921d-47a5-a945-42a1ff556038.jpg'); }.gallery-item:nth-child(3) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-6c428523-80d0-4a25-8ec4-f1f685078a88.jpg'); }.gallery-item:nth-child(4) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-f9800f90-90e5-41ff-b59c-38ae11b1d629.jpg'); }.gallery-item:nth-child(5) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-e120918a-137e-4667-a05d-23d6454ac79d.jpg'); }.gallery-item:nth-child(6) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-1bb6aa57-14fd-4fac-b1fe-0d828ee82c5d.jpg'); }.gallery-item:nth-child(7) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-1306fd55-656c-4f03-bed3-180cfb187cf0.jpg'); }.gallery-item:nth-child(8) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-5b82e149-9026-4a26-b335-a54bef272024.jpg'); }.gallery-item:nth-child(9) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-54ba6d84-b7dc-4dcf-bc32-8ea27c8e370f.jpg'); }.gallery-item:nth-child(10) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-5b9eb2d7-ef15-4986-986c-5570156f4706.jpg'); }.gallery-item:nth-child(11) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-9b15ba96-ccea-4bbc-a0d0-32ea16f7b035.jpg'); }.gallery-item:nth-child(12) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-3645fe6b-7b2e-47fe-9c8e-01d12a9da156.jpg'); }.gallery-item:nth-child(13) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-da073075-bb37-4431-8808-1c2b1bf26431.jpg'); }.gallery-item:nth-child(14) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-9a8568b4-9f51-4875-b520-7915ac02923e.jpg'); }.gallery-item:nth-child(15) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-70a5c6c0-02fd-4b81-baa9-b322b574502e.jpg'); }.gallery-item:nth-child(16) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-96885a17-c955-4bc9-aa11-ac4745e19a57.jpg'); }.gallery-item:nth-child(17) { background-image:url('https://cdn.phototourl.com/member/2026-09-15-f60adb6a-940e-42a7-b246-fb7a3111b198.jpg'); }.gallery-item strong { font-size:12px; text-shadow:0 2px 8px rgba(0,0,0,.45); }
        :root { --coral:#e96f58; --sky:#2d86b8; }
        .news-grid { grid-template-columns:repeat(3,minmax(0,1fr)); gap:18px; }
        .news-card { min-height:235px; padding:25px; border-radius:14px; box-shadow:0 12px 24px rgba(18,63,89,.12); transition:transform .2s ease,box-shadow .2s ease; }
        .news-card:hover { transform:translateY(-5px); box-shadow:0 18px 32px rgba(18,63,89,.18); }
        .news-card small { display:inline-flex; padding-bottom:9px; border-bottom:2px solid rgba(255,255,255,.35); }
        .news-card h3 { margin-top:20px; }
        .news-card a { position:relative; z-index:1; }
        body.dark-theme .news-card { box-shadow:0 12px 24px rgba(0,0,0,.2); }
        .access-panel { display:grid; grid-template-columns:1.2fr repeat(3,1fr); gap:12px; align-items:stretch; margin-top:-38px; padding:18px; border-radius:16px; color:#fff; background:linear-gradient(120deg,#103b5d,#087f78); box-shadow:0 16px 30px rgba(16,59,93,.14); }
        .access-section { padding-top:20px; padding-bottom:20px; }.access-section .access-panel { margin-top:0; }
        .access-intro { padding:8px 12px 8px 4px; }.access-intro strong { display:block; font-family:'Playfair Display',serif; font-size:22px; }.access-intro span { display:block; margin-top:7px; color:rgba(255,255,255,.75); font-size:11px; line-height:1.45; }
        .access-link { display:flex; align-items:center; gap:10px; min-height:64px; padding:12px 14px; border:1px solid rgba(255,255,255,.2); border-radius:10px; color:#fff; background:rgba(255,255,255,.09); transition:background .2s ease,transform .2s ease; }.access-link:hover { color:#fff; background:rgba(255,255,255,.18); transform:translateY(-3px); }.access-link b { display:block; font-size:11px; }.access-link small { display:block; margin-top:3px; color:rgba(255,255,255,.7); font-size:9px; }
        :root { --luxury-gold:#d9a441; --luxury-cream:#fbf7ed; --luxury-ink:#0d2b43; }
        body { background:linear-gradient(135deg,#f8fbfa 0%,#f8faf8 58%,#f5f0e5 100%); }
        .top-strip { color:rgba(255,255,255,.86); background:linear-gradient(90deg,#071f34,#103b5d 48%,#0a625c); letter-spacing:.04em; }
        .site-header { min-height:88px; border-bottom-color:rgba(217,164,65,.28); background:rgba(255,255,255,.88); box-shadow:0 10px 30px rgba(13,43,67,.08); backdrop-filter:blur(14px); }
        .brand strong { color:var(--luxury-ink); letter-spacing:.07em; }.brand small { color:#8a754d; letter-spacing:.1em; }
        .nav-links { color:#38566b; gap:28px; }.nav-links a { position:relative; border-bottom:0; transition:color .2s ease; }.nav-links a:after { position:absolute; right:0; bottom:21px; left:0; height:2px; border-radius:99px; content:''; background:var(--luxury-gold); transform:scaleX(0); transform-origin:center; transition:transform .2s ease; }.nav-links a:hover:after,.nav-links a.active:after { transform:scaleX(1); }.nav-links a:hover,.nav-links a.active { color:#9b6b1f; border-bottom-color:transparent; }
        .nav-register { background:linear-gradient(135deg,#b9852f,#e1b759); box-shadow:0 9px 18px rgba(173,125,42,.24); }
        .hero { min-height:520px; background:linear-gradient(90deg,rgba(5,35,57,.84),rgba(9,61,77,.54) 48%,rgba(8,102,96,.08)); }.hero-inner { min-height:520px; }.hero-copy { max-width:680px; padding:66px 0; }.hero h1 { margin-top:19px; font-size:clamp(42px,5.5vw,76px); letter-spacing:.01em; text-shadow:0 10px 30px rgba(0,0,0,.2); }.hero h1 em { color:#f1c96f; }.hero p { max-width:590px; color:rgba(255,255,255,.9); }.hero-primary { color:#3d2a0e; background:linear-gradient(135deg,#e5b34e,#f5d57f); box-shadow:0 12px 24px rgba(217,164,65,.3); }.hero-secondary { border-color:rgba(255,255,255,.62); background:rgba(255,255,255,.12); backdrop-filter:blur(5px); }
        .quick-links { margin-top:-50px; }.quick-link { border-color:rgba(217,164,65,.22); box-shadow:0 16px 30px rgba(13,43,67,.1); }.quick-link:before,.quick-link:nth-child(2):before,.quick-link:nth-child(3):before,.quick-link:nth-child(4):before { background:var(--luxury-gold); }.quick-link:hover { box-shadow:0 20px 36px rgba(13,43,67,.16); }.quick-icon,.quick-link:nth-child(2) .quick-icon,.quick-link:nth-child(3) .quick-icon,.quick-link:nth-child(4) .quick-icon { background:linear-gradient(145deg,#b9852f,#e1b759); box-shadow:0 8px 15px rgba(173,125,42,.22); }
        .section { padding:92px 0; }.section-heading { margin-bottom:32px; }.section-heading h2,.info-grid h2 { color:var(--luxury-ink); }.service-card { border-color:rgba(217,164,65,.2); border-radius:14px; box-shadow:0 14px 28px rgba(13,43,67,.07); }.service-card:before,.service-card:nth-child(2):before,.service-card:nth-child(3):before { background:linear-gradient(90deg,var(--teal),var(--luxury-gold)); }.service-card h3 { color:var(--luxury-ink); }
        .news-card { border:1px solid rgba(217,164,65,.18); box-shadow:0 15px 30px rgba(13,43,67,.13); }.news-card:nth-child(1) { background:linear-gradient(145deg,#103b5d,#087f78); }.news-card:nth-child(2) { background:linear-gradient(145deg,#1763a5,#315b86); }.news-card:nth-child(3) { background:linear-gradient(145deg,#087f78,#4f7e64); }.news-card:hover { box-shadow:0 22px 38px rgba(13,43,67,.2); }
        .info-band { background:linear-gradient(120deg,#edf7f4,#fbf7ed); border-color:rgba(217,164,65,.24); }.contact-list { border-left-color:var(--luxury-gold); }.site-footer { background:linear-gradient(120deg,#071f34,#103b5d); border-top:3px solid var(--luxury-gold); }
        body.dark-theme .site-header { background:rgba(9,25,35,.86); border-bottom-color:rgba(217,164,65,.3); } body.dark-theme .brand strong { color:#f3f6f4; } body.dark-theme .brand small { color:#d8b66a; } body.dark-theme .nav-links { color:#c3d3d9; } body.dark-theme .nav-links a:hover,body.dark-theme .nav-links a.active { color:#f0c96d; } body.dark-theme .nav-register { color:#39270d; } body.dark-theme .info-band { background:linear-gradient(120deg,#102b36,#243024); }
        @media(max-width:850px){.news-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
        @media(max-width:850px){.summary-band{grid-template-columns:repeat(2,1fr)}.access-panel{grid-template-columns:repeat(2,1fr);margin-top:0}.access-intro{grid-column:1/-1}}
        body { background:#f8fbfa; }
        .site-header { box-shadow:0 8px 24px rgba(16,59,93,.06); }
        .nav-login,.nav-register { transition:transform .2s ease,box-shadow .2s ease; }
        .nav-register { background:linear-gradient(135deg,var(--teal),var(--sky)); box-shadow:0 7px 14px rgba(8,127,120,.18); }
        .nav-login:hover,.nav-register:hover { transform:translateY(-2px); box-shadow:0 10px 20px rgba(16,59,93,.16); }
        @keyframes page-load-down { from { opacity:0; transform:translateY(-14px); } to { opacity:1; transform:translateY(0); } }
        @keyframes page-load-up { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
        .top-strip { animation:page-load-down .55s ease both; }
        .site-header { animation:page-load-down .7s .08s ease both; }
        .hero { animation:page-load-up .8s .18s ease both; }
        .quick-links { animation:page-load-up .75s .38s ease both; }
        .section:first-of-type { animation:page-load-up .75s .52s ease both; }
        @media (prefers-reduced-motion: reduce) { *,*::before,*::after { animation-duration:.01ms !important; animation-iteration-count:1 !important; scroll-behavior:auto !important; transition-duration:.01ms !important; } }
        .hero { isolation:isolate; background:linear-gradient(90deg,rgba(5,48,79,.84),rgba(9,78,105,.5) 48%,rgba(8,102,96,.06)),url('https://cdn.phototourl.com/member/2026-09-12-2a1e9be2-995f-427b-97f7-ab2b27507f1d.jpg') center/cover; }
        .hero:after { position:absolute; right:8%; bottom:-115px; z-index:-1; width:300px; height:300px; border:1px solid rgba(244,197,66,.45); border-radius:50%; box-shadow:0 0 0 28px rgba(244,197,66,.08),0 0 0 58px rgba(244,197,66,.05); content:''; }
        .hero-copy { animation:hero-reveal .7s ease both; }
        .hero-primary,.hero-secondary { transition:transform .2s ease,box-shadow .2s ease; }
        .hero-primary { box-shadow:0 10px 22px rgba(244,197,66,.22); }
        .hero-primary:hover,.hero-secondary:hover { transform:translateY(-3px); box-shadow:0 12px 22px rgba(4,25,42,.24); }
        .quick-links { border:1px solid rgba(255,255,255,.35); border-radius:14px; box-shadow:0 18px 34px rgba(18,63,89,.18); }
        .quick-link { transition:filter .2s ease,transform .2s ease; }
        .quick-link:hover { filter:brightness(1.1); transform:translateY(-3px); }
        .quick-link:nth-child(2) { background:var(--sky); }.quick-link:nth-child(4) { background:var(--coral); }
        .quick-icon { border-radius:50%; }
        .service-card { position:relative; overflow:hidden; transition:transform .2s ease,box-shadow .2s ease; }.service-card:before { position:absolute; top:0; left:0; width:100%; height:4px; content:''; background:var(--teal); }.service-card:nth-child(2):before { background:var(--sky); }.service-card:nth-child(3):before { background:var(--coral); }.service-card:hover { transform:translateY(-6px); box-shadow:0 18px 34px rgba(18,63,89,.12); }
        .news-card { position:relative; overflow:hidden; }.news-card.has-image { background-position:center; background-size:cover; }.news-card.has-image:before { position:absolute; inset:0; content:''; background:linear-gradient(145deg,rgba(7,31,52,.92),rgba(8,127,120,.58)); }.news-card:after { position:absolute; right:-28px; bottom:-58px; width:150px; height:150px; border:1px solid rgba(255,255,255,.2); border-radius:50%; content:''; box-shadow:0 0 0 18px rgba(255,255,255,.05); }.news-card > * { position:relative; z-index:1; }
        .gallery-item { transition:transform .25s ease,filter .25s ease; }.gallery-item:hover { filter:saturate(1.2) brightness(1.08); transform:scale(1.02); }
        .gallery-grid { position:relative; display:block; height:300px; overflow:hidden; border-radius:16px; background:#102b36; box-shadow:0 18px 38px rgba(18,63,89,.14); }
        .gallery-item,.gallery-item:nth-child(1) { position:absolute; top:0; bottom:0; left:0; display:flex; width:calc((100% - 28px) / 3); min-height:100%; padding:24px; border-radius:14px; opacity:0; pointer-events:none; transform:scale(.97); transition:opacity .55s ease,transform .8s ease,filter .25s ease; }
        .gallery-item.is-visible { opacity:1; pointer-events:auto; transform:scale(1); }
        .gallery-item.is-active { opacity:1; }
        .gallery-item strong { max-width:420px; font-size:clamp(16px,2vw,24px); }
        .gallery-controls { display:flex; align-items:center; justify-content:center; gap:14px; margin-top:16px; }
        .gallery-arrow { display:grid; place-items:center; width:38px; height:38px; border:1px solid var(--line); border-radius:50%; color:var(--ink); background:var(--surface,#fff); cursor:pointer; font-size:19px; transition:background .2s ease,color .2s ease,transform .2s ease; }
        .gallery-arrow:hover { color:#fff; background:var(--teal); transform:translateY(-2px); }
        .gallery-dots { display:flex; align-items:center; justify-content:center; gap:6px; max-width:calc(100% - 120px); overflow:hidden; }
        .gallery-dot { width:7px; height:7px; padding:0; border:0; border-radius:50%; background:#b7c8cb; cursor:pointer; transition:width .2s ease,background .2s ease; }
        .gallery-dot.is-active { width:22px; border-radius:999px; background:var(--teal); }
        body.dark-theme .gallery-grid { background:#0d202a; }.dark-theme .gallery-arrow { color:#e7f1f3; border-color:#294652; background:#102733; }.dark-theme .gallery-dot { background:#42616b; }.dark-theme .gallery-dot.is-active { background:#8be0d1; }
        @keyframes hero-reveal { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }
        .hero { background:linear-gradient(90deg,rgba(5,48,79,.82),rgba(9,78,105,.5) 48%,rgba(8,102,96,.1)); }
        .hero-inner { position:relative; z-index:1; }
        .hero-slide { position:absolute; inset:0; z-index:-2; display:block; background-position:center; background-size:cover; background-repeat:no-repeat; opacity:0; image-rendering:auto; animation:hero-slide-fade 30s infinite; animation-timing-function:ease-in-out; will-change:opacity; }
        .hero-slide-1 { background-image:url('https://cdn.phototourl.com/member/2026-09-18-b1ffe14d-38b6-4e28-9c7f-0475f69039cc.jpg'); animation-delay:0s; }
        .hero-slide-2 { background-image:url('https://cdn.phototourl.com/member/2026-09-18-aec965d4-163d-4685-bd0f-9b4fe795a2b6.jpg'); animation-delay:6s; }
        .hero-slide-3 { background-image:url('https://cdn.phototourl.com/member/2026-09-18-a13c13c0-7a83-4453-a4d4-15e5ef3904a1.jpg'); animation-delay:12s; }
        .hero-slide-4 { background-image:url('https://cdn.phototourl.com/member/2026-09-18-afdc2ac9-bc65-4227-855d-d1096a33c5a2.jpg'); animation-delay:18s; }
        .hero-slide-5 { background-image:url('https://cdn.phototourl.com/member/2026-09-18-73d91917-81c4-43cb-ab1e-f8ad7032c822.jpg'); animation-delay:24s; }
        @keyframes hero-slide-fade { 0%,18% { opacity:1; } 24%,96% { opacity:0; } 100% { opacity:1; } }
        .quick-links { gap:12px; overflow:visible; border:0; border-radius:0; box-shadow:none; }
        .quick-link,.quick-link:nth-child(2),.quick-link:nth-child(3),.quick-link:nth-child(4) { position:relative; min-height:112px; padding:22px 20px; color:var(--ink); border:1px solid var(--line); border-radius:14px; background:#fff; box-shadow:0 12px 24px rgba(18,63,89,.08); }
        .quick-link:before { position:absolute; top:0; left:20px; width:42px; height:4px; border-radius:0 0 5px 5px; background:var(--teal); content:''; }
        .quick-link:nth-child(2):before { background:var(--sky); }.quick-link:nth-child(3):before { background:#315b86; }.quick-link:nth-child(4):before { background:var(--coral); }
        .quick-link:hover { color:var(--ink); filter:none; transform:translateY(-5px); box-shadow:0 18px 30px rgba(18,63,89,.14); }
        .quick-icon { color:#fff; border:0; background:var(--teal); box-shadow:0 7px 14px rgba(8,127,120,.2); font-size:16px; }
        .quick-link:nth-child(2) .quick-icon { background:var(--sky); }.quick-link:nth-child(3) .quick-icon { background:#315b86; }.quick-link:nth-child(4) .quick-icon { background:var(--coral); }
        .quick-link strong { color:var(--navy); font-size:13px; }.quick-link small { color:var(--muted); font-size:10px; line-height:1.35; }
        .quick-link strong:after { display:block; margin-top:4px; color:var(--muted); content:'Buka layanan  ->'; font-size:9px; font-weight:600; }
        body { transition:background .25s ease,color .25s ease; }
        body.dark-theme { --ink:#e7f1f3; --navy:#f1f7f8; --muted:#afc1c8; --line:#294652; --soft:#102b36; color:var(--ink); background:#091923; }
        body.dark-theme .site-header { border-color:var(--line); background:rgba(9,25,35,.96); }
        body.dark-theme .brand strong,body.dark-theme .nav-links { color:var(--navy); }
        body.dark-theme .brand small { color:var(--muted); }
        body.dark-theme .nav-links a:hover,body.dark-theme .nav-links a.active { color:#68d5c2; }
        body.dark-theme .nav-login { color:#68d5c2; border-color:#326b72; }
        body.dark-theme .service-card,body.dark-theme .quick-link { border-color:var(--line); background:#102733; box-shadow:0 12px 24px rgba(0,0,0,.2); }
        body.dark-theme .quick-link strong,body.dark-theme .service-card h3,body.dark-theme .section-heading h2,body.dark-theme .info-grid h2,body.dark-theme .contact-list strong { color:var(--navy); }
        body.dark-theme .quick-link small,body.dark-theme .service-card p,body.dark-theme .section-heading p,body.dark-theme .info-grid p,body.dark-theme .contact-list span { color:var(--muted); }
        body.dark-theme .quick-link strong:after,body.dark-theme .service-number { color:#8be0d1; }
        body.dark-theme .service-card a,body.dark-theme .contact-list a { color:#8be0d1; }
        body.dark-theme .news-card { color:#fff; background:#163544; }
        body.dark-theme .news-card:nth-child(2) { background:#164d70; }
        body.dark-theme .news-card:nth-child(3) { background:#075e5a; }
        body.dark-theme .news-card small { color:rgba(255,255,255,.86); }
        body.dark-theme .news-card h3 { color:#fff; }
        body.dark-theme .news-card p { color:rgba(255,255,255,.9); }
        body.dark-theme .news-card a { color:#ffe08a; }
        body.dark-theme .info-band { border-color:var(--line); background:var(--soft); }
        body.dark-theme .brand-mark { filter:drop-shadow(0 5px 8px rgba(0,0,0,.35)); }
        body:not(.dark-theme) { color:#173b62; background:#f8fbfa; }
        body:not(.dark-theme) .site-header { border-color:#dcebe8; background:rgba(255,255,255,.97); }
        body:not(.dark-theme) .brand strong { color:#103b5d; }
        body:not(.dark-theme) .brand small { color:#6a7c8d; }
        body:not(.dark-theme) .nav-links { color:#49657a; }
        body:not(.dark-theme) .nav-links a:hover,body:not(.dark-theme) .nav-links a.active { color:#087f78; }
        body:not(.dark-theme) .quick-link { color:#173b62; background:#fff; }
        body:not(.dark-theme) .quick-link strong { color:#103b5d; }
        body:not(.dark-theme) .quick-link small,body:not(.dark-theme) .service-card p { color:#6a7c8d; }
        body:not(.dark-theme) .service-card h3,body:not(.dark-theme) .section-heading h2,body:not(.dark-theme) .info-grid h2 { color:#103b5d; }
        body:not(.dark-theme) .section-heading p,body:not(.dark-theme) .info-grid p,body:not(.dark-theme) .contact-list span { color:#6a7c8d; }
        body:not(.dark-theme) .contact-list strong { color:#103b5d; }
        body:not(.dark-theme) { background:linear-gradient(135deg,#f4fbf8 0%,#f8fbff 54%,#fff8ed 100%); }
        body:not(.dark-theme) .site-header { background:rgba(255,255,255,.94); box-shadow:0 8px 24px rgba(16,59,93,.1); }
        body:not(.dark-theme) .top-strip { background:linear-gradient(90deg,#0d5362,#087f78 54%,#d49425); }
        body:not(.dark-theme) .hero { background:linear-gradient(90deg,rgba(5,48,79,.72),rgba(8,102,96,.4) 58%,rgba(8,102,96,.08)),url('https://cdn.phototourl.com/member/2026-09-12-2a1e9be2-995f-427b-97f7-ab2b27507f1d.jpg') center/cover; }
        body:not(.dark-theme) .hero-slide { filter:saturate(1.14) contrast(1.12) brightness(1.03); image-rendering:auto; transform:translateZ(0) scale(1.002); backface-visibility:hidden; }
        body:not(.dark-theme) .hero h1 { font-size:clamp(44px,5.5vw,74px); line-height:1.08; }
        body:not(.dark-theme) .hero p { max-width:600px; color:#fff; font-size:clamp(14px,1.35vw,16px); line-height:1.75; text-shadow:0 2px 7px rgba(0,0,0,.35); }
        body:not(.dark-theme) .eyebrow { color:#a66e12; font-size:13px; }
        body:not(.dark-theme) .hero .eyebrow { color:#ffe08a; }
        body:not(.dark-theme) .section-heading h2,body:not(.dark-theme) .info-grid h2 { font-size:clamp(29px,3vw,38px); line-height:1.15; }
        body:not(.dark-theme) .section-heading p,body:not(.dark-theme) .info-grid p { font-size:14px; line-height:1.75; }
        body:not(.dark-theme) .quick-link { border-color:#cfe5df; background:#fff; box-shadow:0 14px 26px rgba(18,63,89,.1); }
        body:not(.dark-theme) .quick-link:nth-child(2) { border-top:4px solid #2d86b8; } body:not(.dark-theme) .quick-link:nth-child(3) { border-top:4px solid #315b86; } body:not(.dark-theme) .quick-link:nth-child(4) { border-top:4px solid #e96f58; }
        body:not(.dark-theme) .quick-link strong { font-size:14px; } body:not(.dark-theme) .quick-link small { font-size:11px; line-height:1.45; }
        body:not(.dark-theme) .service-card { border-color:#d5e8e3; background:rgba(255,255,255,.9); box-shadow:0 14px 28px rgba(18,63,89,.08); }
        body:not(.dark-theme) .service-card h3 { font-size:19px; } body:not(.dark-theme) .service-card p { font-size:13px; line-height:1.7; }
        body:not(.dark-theme) .info-band { background:linear-gradient(120deg,#e9f8f3,#fff7e8); }
        body:not(.dark-theme) .news-card { box-shadow:0 15px 30px rgba(18,63,89,.15); }
        @media (prefers-reduced-motion: reduce) { *,*::before,*::after { scroll-behavior:auto !important; animation-duration:.01ms !important; animation-iteration-count:1 !important; transition-duration:.01ms !important; } }
        @media(max-width:850px){.quick-links{gap:10px}}
        @media(max-width:850px){.gallery-grid{height:270px}.gallery-item,.gallery-item:nth-child(1){padding:18px}}
        @media(max-width:850px){.news-grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:850px){.site-nav{flex-wrap:wrap;padding:15px 0}.nav-links{order:3;width:100%;justify-content:space-between;gap:12px;overflow-x:auto}.nav-links a{padding:10px 0}.quick-links{grid-template-columns:repeat(2,1fr)}.quick-link:nth-child(2){border-right:0}.quick-link:nth-child(3),.quick-link:nth-child(4){border-top:1px solid rgba(255,255,255,.16)}.info-grid{grid-template-columns:1fr;gap:30px}}
        @media(max-width:600px){.top-strip-inner,.section-heading,.footer-inner{align-items:flex-start;flex-direction:column}.top-strip-inner span:last-child{display:none}.brand{min-width:auto}.brand-mark{flex-basis:40px;width:40px;height:40px;border-radius:10px 10px 13px 13px}.brand strong{font-size:11px}.nav-actions{margin-left:auto}.nav-register{display:none}.hero,.hero-inner{min-height:510px}.hero h1{font-size:42px}.hero p{font-size:13px}.section{padding:62px 0}.quick-links,.service-grid,.news-grid{grid-template-columns:1fr}.summary-band{grid-template-columns:1fr;margin-top:24px}.quick-link,.quick-link:nth-child(2),.quick-link:nth-child(3){border-right:0;border-bottom:1px solid rgba(255,255,255,.16)}.access-panel{grid-template-columns:1fr;padding:14px}.access-intro{grid-column:auto}.gallery-grid{height:220px}.gallery-item,.gallery-item:nth-child(1){padding:16px}.gallery-item strong{font-size:11px}.section-heading h2,.info-grid h2{font-size:28px}.section-heading p{text-align:left}}
        body.landing-page { --surface:#fff; --surface-soft:#f3f7f7; --ink:#16344b; --muted:#647988; --line:#dce7e8; --navy:#123d59; --deep:#0b2637; --teal:#087f78; --sky:#297db0; --gold:#eabd4b; --coral:#d76d5c; color:var(--ink); background:#f4f7f6; }
        body.landing-page.dark-theme { --surface:#102330; --surface-soft:#132c38; --ink:#e8f1f2; --muted:#aec0c7; --line:#29434d; --navy:#e8f1f2; --deep:#081923; color:var(--ink); background:#091923; }
        body.landing-page .top-strip { min-height:34px; display:flex; align-items:center; background:#092536; font-size:10px; letter-spacing:.035em; }
        body.landing-page .site-header { position:sticky; top:0; border-color:var(--line); background:color-mix(in srgb,var(--surface) 91%,transparent); box-shadow:0 8px 26px rgba(8,35,50,.07); backdrop-filter:blur(16px); }
        body.landing-page .site-nav { min-height:76px; gap:22px; }
        body.landing-page .brand { min-width:0; gap:12px; }
        body.landing-page .brand-mark { flex-basis:58px; width:58px; height:62px; clip-path:none; border:1px solid rgba(18,61,89,.08); border-radius:15px; background:linear-gradient(145deg,#fff,#f4f7f4); box-shadow:0 8px 18px rgba(8,35,50,.1),inset 0 1px 0 #fff; filter:none; }
        body.landing-page .brand-mark img { width:100%; height:100%; padding:4px; object-fit:contain; object-position:center; image-rendering:auto; }
        body.landing-page .brand-copy { display:grid; gap:6px; padding-left:14px; border-left:2px solid #d9b65e; }
        body.landing-page .brand strong { color:var(--ink); font-size:11px; font-weight:800; letter-spacing:.085em; line-height:1.35; }
        body.landing-page .brand small { margin:0; color:#8a754d; font-size:9px; font-weight:700; letter-spacing:.12em; }
        body.landing-page .nav-links { align-self:stretch; gap:clamp(10px,1.6vw,22px); color:#536978; font-size:11px; }
        body.landing-page .nav-links a { position:relative; display:flex; align-items:center; padding:0 2px; border:0; transition:color .2s ease; }
        body.landing-page .nav-links a:after { position:absolute; right:2px; bottom:17px; left:2px; height:2px; border:0; border-radius:99px; content:""; background:#c49a48; transform:scaleX(0); transform-origin:left; transition:transform .22s ease; }
        body.landing-page .nav-links a:hover:after,body.landing-page .nav-links a.active:after { transform:scaleX(1); }
        body.landing-page .nav-links a:hover,body.landing-page .nav-links a.active { color:#8d6828; }
        body.landing-page .nav-actions { gap:9px; }
        body.landing-page .nav-login,body.landing-page .nav-register { min-height:40px; padding:0 17px; border-radius:11px; font-size:10px; font-weight:800; transition:transform .2s ease,box-shadow .2s ease,background .2s ease; }
        body.landing-page .nav-login { color:#31546a; border:1px solid #d8e2e2; background:rgba(255,255,255,.72); }
        body.landing-page .nav-login:hover { color:#087f78; border-color:#a7cbc3; background:#f5fbf9; transform:translateY(-2px); }
        body.landing-page .nav-register { color:#fff; border:1px solid #a97c30; background:linear-gradient(135deg,#a97c30,#d2ad5d); box-shadow:0 8px 17px rgba(151,111,43,.2),inset 0 1px 0 rgba(255,255,255,.2); }
        body.landing-page .nav-register:hover { background:linear-gradient(135deg,#946a25,#c49b48); box-shadow:0 11px 22px rgba(151,111,43,.28); transform:translateY(-2px); }
        body.landing-page .nav-login:focus-visible,body.landing-page .nav-register:focus-visible,body.landing-page .nav-links a:focus-visible,body.landing-page .brand:focus-visible { outline:3px solid rgba(8,127,120,.32); outline-offset:4px; }
        
        body.landing-page .hero { min-height:610px; overflow:hidden; isolation:isolate; background:radial-gradient(ellipse at 80% 46%,rgba(27,119,123,.25),transparent 34%),radial-gradient(ellipse at 88% 12%,rgba(205,162,71,.14),transparent 28%),linear-gradient(125deg,#092536 0%,#103e53 56%,#123e49 100%); }
        body.landing-page .hero:before { position:absolute; z-index:-1; top:-230px; right:-110px; width:650px; height:650px; border:1px solid rgba(232,195,112,.2); border-radius:50%; content:""; box-shadow:0 0 0 34px rgba(232,195,112,.035),0 0 0 78px rgba(232,195,112,.025),0 0 0 135px rgba(232,195,112,.018); }
        body.landing-page .hero:after { right:11%; bottom:-190px; z-index:-1; width:360px; height:360px; border-color:rgba(255,255,255,.11); box-shadow:0 0 0 32px rgba(255,255,255,.025),0 0 0 68px rgba(255,255,255,.018); }
        body.landing-page .hero-slide { display:block; }
        body.landing-page .hero-slide:after { position:absolute; inset:0; content:""; background:linear-gradient(90deg,rgba(5,35,57,.82),rgba(9,61,77,.52) 52%,rgba(8,68,66,.28)); }
        body:not(.dark-theme).landing-page .hero-slide { filter:saturate(1.08) contrast(1.04) brightness(.88); }
        body.dark-theme.landing-page .hero-slide { filter:saturate(.92) brightness(.72); }
        body.landing-page .hero-inner { display:grid; grid-template-columns:minmax(0,1fr); align-items:start; width:min(100% - 64px,1180px); min-height:610px; padding:74px 0 76px; }
        body.landing-page .hero-copy { max-width:660px; padding:0; }
        body.landing-page .hero .eyebrow { color:#efd17e; font-size:10px; letter-spacing:.17em; }
        body.landing-page .hero .eyebrow:before { width:24px; background:#d9b65e; }
        body.landing-page .hero h1 { max-width:620px; margin:18px 0 16px; font-size:clamp(42px,5vw,64px); line-height:1.04; letter-spacing:-.045em; }
        body.landing-page .hero h1 em { color:#e9c56d; }
        body.landing-page .hero p { max-width:510px; margin-bottom:24px; color:rgba(243,248,249,.84); font-size:13px; line-height:1.75; }
        body.landing-page .hero-primary,body.landing-page .hero-secondary { min-height:46px; padding:0 18px; border-radius:10px; font-size:10px; }
        body.landing-page .hero-primary { color:#1c2e33; background:linear-gradient(135deg,#f1d682,#dfb953); box-shadow:0 12px 24px rgba(212,174,82,.2); }
        body.landing-page .hero-secondary { border-color:rgba(255,255,255,.22); background:rgba(255,255,255,.055); backdrop-filter:blur(8px); }
        body.landing-page .quick-links { width:min(100% - 64px,1180px); margin:-40px auto 0; gap:12px; }
        body.landing-page .quick-link,body.landing-page .quick-link:nth-child(2),body.landing-page .quick-link:nth-child(3),body.landing-page .quick-link:nth-child(4) { min-height:108px; padding:20px 18px; border:1px solid var(--line); border-radius:16px; color:var(--ink); background:var(--surface); box-shadow:0 16px 34px rgba(14,49,65,.09); }
        body.landing-page .quick-link:before { left:18px; width:36px; height:3px; }
        body.landing-page .quick-link:hover { box-shadow:0 21px 40px rgba(14,49,65,.15); }
        body.landing-page .quick-link strong { color:var(--ink); font-size:12px; }
        body.landing-page .quick-link small { color:var(--muted); font-size:10px; }
        body.landing-page .quick-link strong:after { color:var(--teal); font-size:9px; }
        body.landing-page .section { padding:78px 0; }
        body.landing-page .section-heading { margin-bottom:30px; }
        body.landing-page .section-heading h2,body.landing-page .info-grid h2 { color:var(--ink); letter-spacing:-.025em; }
        body.landing-page .section-heading p,body.landing-page .info-grid p { color:var(--muted); }
        body.landing-page .service-card { border-color:var(--line); border-radius:16px; background:var(--surface); box-shadow:0 14px 34px rgba(14,49,65,.055); }
        body.landing-page .service-card h3,body.landing-page .news-card h3 { color:var(--ink); }
        body.landing-page .service-card p { color:var(--muted); }
        body.landing-page .info-band { border-color:var(--line); background:var(--surface-soft); }
        body.landing-page .contact-list { border-color:#d9b65e; }
        body.landing-page .contact-list strong { color:var(--ink); }
        body.landing-page .contact-list span { color:var(--muted); }
        body.landing-page .site-footer { background:#092536; }
        body.landing-page.dark-theme .quick-link,body.landing-page.dark-theme .quick-link:nth-child(2),body.landing-page.dark-theme .quick-link:nth-child(3),body.landing-page.dark-theme .quick-link:nth-child(4),body.landing-page.dark-theme .service-card { border-color:var(--line); background:var(--surface); }
        body.landing-page.dark-theme .quick-link strong,body.landing-page.dark-theme .service-card h3,body.landing-page.dark-theme .section-heading h2,body.landing-page.dark-theme .info-grid h2,body.landing-page.dark-theme .contact-list strong { color:var(--ink); }
        body.landing-page.dark-theme .quick-link small,body.landing-page.dark-theme .service-card p,body.landing-page.dark-theme .section-heading p,body.landing-page.dark-theme .info-grid p,body.landing-page.dark-theme .contact-list span { color:var(--muted); }
        @media(max-width:1000px){body.landing-page .site-nav{gap:14px}body.landing-page .nav-links{gap:12px}}
        @media(max-width:850px){body.landing-page .site-header{position:relative}body.landing-page .site-nav{gap:10px}body.landing-page .nav-links{justify-content:flex-start;gap:24px}body.landing-page .hero,body.landing-page .hero-inner{min-height:0}body.landing-page .hero-inner{padding:58px 0 80px}body.landing-page .hero-copy{max-width:700px}body.landing-page .quick-links{margin-top:-42px}}
        @media(max-width:600px){body.landing-page .top-strip{min-height:30px}body.landing-page .site-nav{width:calc(100% - 32px);padding:12px 0}body.landing-page .brand{gap:9px}body.landing-page .brand-mark{flex-basis:46px;width:46px;height:50px;border-radius:12px}body.landing-page .brand-copy{gap:4px;padding-left:9px}body.landing-page .brand strong{max-width:165px;font-size:8px;letter-spacing:.055em}body.landing-page .brand small{font-size:7px;letter-spacing:.08em}body.landing-page .nav-actions{gap:5px}body.landing-page .nav-login,body.landing-page .nav-register{min-height:34px;padding:0 10px;font-size:9px}body.landing-page .nav-register{display:inline-flex}body.landing-page .nav-links{gap:23px}body.landing-page .nav-links a{font-size:10px}body.landing-page .nav-links a:after{bottom:5px}body.landing-page .hero-inner{width:calc(100% - 40px);padding:44px 0 68px}body.landing-page .hero h1{margin-top:16px;font-size:clamp(38px,10vw,52px)}body.landing-page .hero p{font-size:12px}body.landing-page .hero-primary,body.landing-page .hero-secondary{min-height:43px;padding:0 13px;font-size:10px}body.landing-page .quick-links{width:calc(100% - 32px);grid-template-columns:1fr;gap:9px;margin-top:-34px}body.landing-page .quick-link,body.landing-page .quick-link:nth-child(2),body.landing-page .quick-link:nth-child(3),body.landing-page .quick-link:nth-child(4){min-height:86px;padding:15px 16px}body.landing-page .quick-link:before{left:16px}body.landing-page .section{width:calc(100% - 40px);padding:58px 0}body.landing-page .section-heading{align-items:flex-start;flex-direction:column;gap:10px}body.landing-page .section-heading p{text-align:left}body.landing-page .service-grid,body.landing-page .news-grid{grid-template-columns:1fr}body.landing-page .service-card{padding:21px}body.landing-page .info-grid{gap:28px}}
        @media(max-width:380px){body.landing-page .site-nav{width:calc(100% - 24px)}body.landing-page .nav-links{gap:17px}body.landing-page .brand strong{max-width:145px}body.landing-page .nav-actions{gap:4px}body.landing-page .nav-login,body.landing-page .nav-register{padding:0 8px}}
        @media(prefers-reduced-motion:reduce){body.landing-page *,body.landing-page *:before,body.landing-page *:after{scroll-behavior:auto!important;animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important}}
    </style>
</head>
<body class="landing-page">
<div class="public-page">
    <div class="top-strip"><div class="top-strip-inner"><span>Pemerintah Kota Padangsidimpuan</span><span>Pelayanan informasi pajak daerah yang mudah dan terbuka</span></div></div>
    <header class="site-header"><nav class="site-nav" aria-label="Navigasi utama">
        <a class="brand" href="{{ url('/') }}"><span class="brand-mark"><img src="{{ asset('images/logo-salumpat-transparent.png') }}" alt="Logo Salumpat Saindege"></span><span class="brand-copy"><strong>SISTEM INFORMASI PAJAK HOTEL</strong><small>PEMERINTAH KOTA PADANGSIDIMPUAN</small></span></a>
        <div class="nav-links"><a class="active" href="#beranda">Beranda</a><a href="{{ route('pengaduan.index') }}">Layanan</a><a href="{{ route('hotel.index') }}">Daftar Hotel</a><a href="{{ route('profile') }}">Profil</a><a href="#kontak">Kontak</a></div>
        <div class="nav-actions">@auth<a class="nav-login" href="{{ route('dashboard') }}">Dashboard</a><form method="POST" action="{{ route('logout') }}" class="nav-logout-form">@csrf<button type="submit" class="nav-register">Keluar</button></form>@else<a class="nav-login" href="{{ route('login') }}">Masuk</a><a class="nav-register" href="{{ route('register') }}">Daftar</a>@endauth</div>
    </nav></header>
    <main>
        <section class="hero" id="beranda">
            <span class="hero-slide hero-slide-1" aria-hidden="true"></span>
            <span class="hero-slide hero-slide-2" aria-hidden="true"></span>
            <span class="hero-slide hero-slide-3" aria-hidden="true"></span>
            <span class="hero-slide hero-slide-4" aria-hidden="true"></span>
            <span class="hero-slide hero-slide-5" aria-hidden="true"></span>
            <div class="hero-inner">
                <div class="hero-copy">
                    <span class="eyebrow">Bersama membangun daerah</span>
                    <h1>Pajak Hotel<br><em>untuk pembangunan</em></h1>
                    <p>Bayar dan laporkan pajak hotel tepat waktu. Kontribusi Anda membantu menghadirkan pelayanan publik dan pembangunan Kota Padangsidimpuan yang lebih baik.</p>
                    <div class="hero-actions">
                        <a class="hero-primary" href="{{ route('login') }}">Masuk ke Sistem <span aria-hidden="true">↗</span></a>
                        <a class="hero-secondary" href="{{ route('laporan.index') }}">Pelajari panduan</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="quick-links" aria-label="Layanan cepat"><a class="quick-link" href="{{ route('laporan.index') }}"><span class="quick-icon">▤</span><span><strong>Panduan Pajak</strong><small>Pelajari cara pembayaran</small></span></a><a class="quick-link" href="{{ route('hotel.index') }}"><span class="quick-icon">⌂</span><span><strong>Daftar Hotel</strong><small>Lihat data hotel terdaftar</small></span></a><a class="quick-link" href="{{ route('peta.index') }}"><span class="quick-icon">⌖</span><span><strong>Peta Lokasi</strong><small>Temukan layanan daerah</small></span></a><a class="quick-link" href="{{ route('faq.index') }}"><span class="quick-icon">?</span><span><strong>Pusat Bantuan</strong><small>Jawaban pertanyaan umum</small></span></a></section>
        <section class="section access-section"><div class="access-panel"><div class="access-intro"><strong>Akses publik cepat</strong><span>Temukan informasi penting dan kanal resmi daerah.</span></div><a class="access-link" href="https://lapor.go.id/" target="_blank" rel="noopener noreferrer"><span>↗</span><span><b>LAPOR!</b><small>Sampaikan aspirasi</small></span></a><a class="access-link" href="https://bpkpd.padangsidimpuankota.go.id/struktur-organisasi/" target="_blank" rel="noopener noreferrer"><span>↗</span><span><b>BPKPD</b><small>Portal pendapatan daerah</small></span></a><a class="access-link" href="https://web.padangsidimpuankota.go.id/berita" target="_blank" rel="noopener noreferrer"><span>↗</span><span><b>Berita Pemko</b><small>Kabar terbaru daerah</small></span></a></div></section>
        <section class="section" id="layanan"><div class="section-heading"><div><span class="eyebrow">Layanan utama</span><h2>Informasi dalam satu tempat</h2></div><p>Akses informasi pajak hotel secara cepat, tertib, dan transparan melalui portal resmi Pemerintah Kota Padangsidimpuan.</p></div><div class="service-grid"><article class="service-card"><span class="service-number">01 / INFORMASI</span><h3>Ketentuan Pajak Hotel</h3><p>Pahami objek, tarif, masa pajak, dan kewajiban pelaporan pajak hotel.</p><a href="{{ route('peraturan.index') }}">Lihat peraturan -></a></article><article class="service-card"><span class="service-number">02 / DATA PUBLIK</span><h3>Direktori Hotel</h3><p>Temukan informasi hotel terdaftar beserta status dan lokasinya.</p><a href="{{ route('hotel.index') }}">Buka direktori -></a></article><article class="service-card"><span class="service-number">03 / PELAYANAN</span><h3>Panduan Pembayaran</h3><p>Ikuti langkah pembayaran dan pelaporan pajak hotel dengan benar.</p><a href="{{ route('laporan.index') }}">Baca panduan -></a></article></div></section>
        <section class="section"><div class="section-heading"><div><span class="eyebrow">Berita dan pengumuman</span><h2>Kabar pelayanan daerah</h2></div><p>Berita terbaru Pemerintah Kota Padangsidimpuan, diperbarui otomatis setiap hari.</p></div><div class="news-grid">@forelse($cityNews ?? [] as $news)<article class="news-card{{ !empty($news['image']) ? ' has-image' : '' }}" @if (!empty($news['image'])) style="background-image: url('{{ $news['image'] }}');" @endif><small>Berita Pemko Padangsidimpuan</small><h3>{{ $news['title'] }}</h3><p>{{ $news['description'] }}</p><a href="{{ $news['url'] }}" target="_blank" rel="noopener noreferrer">Baca berita -></a></article>@empty<article class="news-card"><small>Informasi utama</small><h3>Berita terbaru Pemerintah Kota Padangsidimpuan.</h3><p>Kunjungi sumber berita resmi untuk membaca informasi pelayanan dan kegiatan daerah.</p><a href="https://web.padangsidimpuankota.go.id/berita" target="_blank" rel="noopener noreferrer">Lihat berita -></a></article>@endforelse</div></section>
        <section class="section"><div class="section-heading"><div><span class="eyebrow">Galeri daerah</span><h2>Potret Padangsidimpuan</h2></div><p>Kumpulan foto daerah, pelayanan, dan kegiatan pembangunan yang tersusun dalam satu galeri.</p></div><div class="gallery-grid"><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 1"><strong>Padangsidimpuan</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 2"><strong>Pelayanan publik</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 3"><strong>Kegiatan daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 4"><strong>Pembangunan daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 5"><strong>Ruang kota</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 6"><strong>Wajah daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 7"><strong>Kolaborasi</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 8"><strong>Untuk masyarakat</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 9"><strong>Layanan daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 10"><strong>Informasi publik</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 11"><strong>Semangat pembangunan</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 12"><strong>Kota yang tumbuh</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 13"><strong>Pelayanan terbuka</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 14"><strong>Partisipasi warga</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 15"><strong>Daerah berdaya</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 16"><strong>Potensi lokal</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 17"><strong>Padangsidimpuan maju</strong></a></div></section>
            <section class="section"><div class="section-heading"><div><span class="eyebrow">Galeri daerah</span><h2>Potret Padangsidimpuan</h2></div><p>Kumpulan foto daerah, pelayanan, dan kegiatan pembangunan yang tersusun dalam slideshow.</p></div><div class="gallery-grid"><a class="gallery-item is-active" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 1"><strong>Padangsidimpuan</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 2"><strong>Pelayanan publik</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 3"><strong>Kegiatan daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 4"><strong>Pembangunan daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 5"><strong>Ruang kota</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 6"><strong>Wajah daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 7"><strong>Kolaborasi</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 8"><strong>Untuk masyarakat</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 9"><strong>Layanan daerah</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 10"><strong>Informasi publik</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 11"><strong>Semangat pembangunan</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 12"><strong>Kota yang tumbuh</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 13"><strong>Pelayanan terbuka</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 14"><strong>Partisipasi warga</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 15"><strong>Daerah berdaya</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 16"><strong>Potensi lokal</strong></a><a class="gallery-item" href="{{ route('publikasi.index') }}" aria-label="Buka galeri foto 17"><strong>Padangsidimpuan maju</strong></a></div><div class="gallery-controls"><button class="gallery-arrow" type="button" data-gallery-prev aria-label="Foto sebelumnya">&lsaquo;</button><div class="gallery-dots" aria-label="Pilih foto galeri">@for($galleryIndex = 0; $galleryIndex < 17; $galleryIndex++)<button class="gallery-dot {{ $galleryIndex === 0 ? 'is-active' : '' }}" type="button" data-gallery-dot="{{ $galleryIndex }}" aria-label="Tampilkan foto {{ $galleryIndex + 1 }}"></button>@endfor</div><button class="gallery-arrow" type="button" data-gallery-next aria-label="Foto berikutnya">&rsaquo;</button></div></section>
        <section class="info-band" id="kontak"><div class="section info-grid"><div class="about-copy"><span class="eyebrow">Tentang portal</span><h2>Kolaborasi untuk Padangsidimpuan yang lebih maju.</h2><p class="about-lead">Portal Sistem Informasi Pajak Hotel hadir sebagai ruang informasi dan pelayanan publik yang terbuka, mudah diakses, dan dapat digunakan bersama.</p><p>Melalui portal ini, wajib pajak dapat memperoleh informasi mengenai ketentuan pajak hotel, direktori hotel, panduan pembayaran, serta layanan pengaduan secara lebih terarah. Masyarakat juga dapat ikut memantau informasi daerah dan memahami bagaimana pajak berperan dalam mendukung pembangunan.</p><p>Pengelolaan informasi yang tertib membantu Pemerintah Kota Padangsidimpuan meningkatkan kualitas pelayanan, memperluas keterbukaan data, dan membangun komunikasi yang lebih baik dengan wajib pajak.</p><ul class="about-points"><li>Informasi pajak hotel yang jelas dan mudah dipahami.</li><li>Akses layanan publik yang praktis dari satu portal.</li><li>Mendorong kepatuhan dan partisipasi dalam pembangunan daerah.</li></ul></div><div class="contact-list"><div><strong>Alamat</strong><span>88Q4+7W4, Palopat PK, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22733</span></div><div><strong>Pelayanan</strong><span><a href="https://lapor.go.id/" target="_blank" rel="noopener noreferrer">https://lapor.go.id/</a></span></div><div><strong>Butuh bantuan?</strong><span><a href="https://bpkpd.padangsidimpuankota.go.id/struktur-organisasi/" target="_blank" rel="noopener noreferrer">https://bpkpd.padangsidimpuankota.go.id/struktur-organisasi/</a></span></div><div><strong>Telepon</strong><span><a href="tel:+6263427075">(0634) 27075</a></span></div><div><strong>Email</strong><span><a href="mailto:bpkpd@padangsidimpuankota.go.id">bpkpd@padangsidimpuankota.go.id</a></span></div><div><strong>Instagram</strong><span><a href="https://www.instagram.com/bpkpdsidempuan?stkn=ejd2bDQxeDZra3V6" target="_blank" rel="noopener noreferrer">@bpkpdsidempuan</a></span></div></div></div></section>
    </main>
    <footer class="site-footer"><div class="footer-inner"><span class="footer-brand">SISTEM INFORMASI PAJAK HOTEL PADANGSIDIMPUAN</span><span>&copy; {{ date('Y') }} Pemerintah Kota Padangsidimpuan</span></div></footer>
</div>
<script>
    (function () {
        const galleries = document.querySelectorAll('.gallery-grid');
        if (galleries.length > 1) {
            galleries[0].closest('.section').remove();
        }

        const gallery = document.querySelector('.gallery-grid');
        if (!gallery) return;

        const slides = Array.from(gallery.querySelectorAll('.gallery-item'));
        const dots = Array.from(document.querySelectorAll('[data-gallery-dot]'));
        const previousButton = document.querySelector('[data-gallery-prev]');
        const nextButton = document.querySelector('[data-gallery-next]');
        const groupSize = 3;
        const groupCount = Math.ceil(slides.length / groupSize);
        let activeIndex = 0;
        let timer;

        function showSlide(index) {
            activeIndex = (index + groupCount) % groupCount;
            const firstSlide = activeIndex * groupSize;
            slides.forEach(function (slide, slideIndex) {
                const groupPosition = slideIndex - firstSlide;
                const isVisible = groupPosition >= 0 && groupPosition < groupSize;
                slide.classList.toggle('is-visible', isVisible);
                slide.classList.toggle('is-active', slideIndex === firstSlide);
                if (isVisible) {
                    slide.style.left = groupPosition === 0
                        ? '0'
                        : groupPosition === 1
                            ? 'calc((100% + 14px) / 3)'
                            : 'calc((200% + 28px) / 3)';
                }
            });
            dots.forEach(function (dot, dotIndex) {
                dot.style.display = dotIndex < groupCount ? 'block' : 'none';
                dot.classList.toggle('is-active', dotIndex === activeIndex);
                dot.setAttribute('aria-current', dotIndex === activeIndex ? 'true' : 'false');
            });
        }

        function restartTimer() {
            window.clearInterval(timer);
            timer = window.setInterval(function () { showSlide(activeIndex + 1); }, 5000);
        }

        previousButton.addEventListener('click', function () { showSlide(activeIndex - 1); restartTimer(); });
        nextButton.addEventListener('click', function () { showSlide(activeIndex + 1); restartTimer(); });
        dots.forEach(function (dot) {
            dot.addEventListener('click', function () { showSlide(Number(dot.dataset.galleryDot)); restartTimer(); });
        });
        gallery.addEventListener('mouseenter', function () { window.clearInterval(timer); });
        gallery.addEventListener('mouseleave', restartTimer);
        showSlide(0);
        restartTimer();
    }());
</script>
</body>
</html>
