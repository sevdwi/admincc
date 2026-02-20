<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BKN - Dashboard</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background: linear-gradient(135deg, #0099cc 0%, #006699 40%, #004d80 100%);
      overflow: hidden;
      position: relative;
    }

    /* Indonesia map background */
    .map-bg {
      position: absolute;
      inset: 0;
      background-image: radial-gradient(circle, rgba(255,255,255,0.12) 1px, transparent 1px);
      background-size: 30px 30px;
      z-index: 0;
    }

    /* Decorative glow dots */
    .dot {
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.5);
      animation: pulse 3s ease-in-out infinite;
    }
    .dot-1 { width: 8px; height: 8px; top: 18%; left: 38%; animation-delay: 0s; }
    .dot-2 { width: 6px; height: 6px; top: 55%; left: 27%; animation-delay: 1s; }
    .dot-3 { width: 10px; height: 10px; top: 70%; right: 35%; animation-delay: 2s; }
    .dot-4 { width: 6px; height: 6px; top: 30%; right: 25%; animation-delay: 0.5s; }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 0.5; }
      50% { transform: scale(1.5); opacity: 1; }
    }

    /* Decorative lines */
    .lines-bg {
      position: absolute;
      inset: 0;
      background:
        linear-gradient(45deg, transparent 48%, rgba(255,255,255,0.04) 49%, rgba(255,255,255,0.04) 51%, transparent 52%),
        linear-gradient(-45deg, transparent 48%, rgba(255,255,255,0.04) 49%, rgba(255,255,255,0.04) 51%, transparent 52%);
      background-size: 200px 200px;
      z-index: 0;
    }

    /* Top bar */
    .top-bar {
      position: fixed;
      top: 0; left: 0; right: 0;
      padding: 14px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 10;
    }

    .welcome-text {
      color: white;
      font-size: 0.9rem;
      font-weight: 500;
      letter-spacing: 0.3px;
    }

    .btn-keluar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: rgba(255,255,255,0.15);
      border: 1.5px solid rgba(255,255,255,0.4);
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-size: 0.6rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      text-decoration: none;
      gap: 2px;
      backdrop-filter: blur(10px);
    }
    .btn-keluar i { font-size: 1.1rem; }
    .btn-keluar:hover {
      background: rgba(255,255,255,0.25);
      color: white;
      transform: scale(1.05);
    }

    /* Main content */
    .main-content {
      position: relative;
      z-index: 5;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding-top: 60px;
    }

    /* Menu container */
    .menu-container {
      position: relative;
      width: 580px;
      height: 480px;
    }

    /* Center BKN circle */
    .circle-center {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      width: 180px;
      height: 180px;
      border-radius: 50%;
      background: radial-gradient(circle at 40% 35%, #f0f0f0, #d0d0d0);
      border: 4px solid #cc1a4a;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: 0 0 40px rgba(204, 26, 74, 0.3), 0 8px 30px rgba(0,0,0,0.2);
      z-index: 4;
      animation: centerPulse 4s ease-in-out infinite;
    }

    @keyframes centerPulse {
      0%, 100% { box-shadow: 0 0 40px rgba(204,26,74,0.3), 0 8px 30px rgba(0,0,0,0.2); }
      50% { box-shadow: 0 0 60px rgba(204,26,74,0.5), 0 8px 40px rgba(0,0,0,0.25); }
    }

    .bkn-logo-text {
      font-size: 1.6rem;
      font-weight: 700;
      color: #0099cc;
      letter-spacing: 2px;
      line-height: 1;
    }

    /* BKN logo icon (stylized) */
    .bkn-icon {
      width: 70px;
      height: 70px;
      margin-bottom: 4px;
    }

    /* Menu circles */
    .menu-item {
      position: absolute;
      width: 130px;
      height: 130px;
      border-radius: 50%;
      background: radial-gradient(circle at 35% 30%, rgba(255,255,255,0.95), rgba(230,240,250,0.9));
      border: 2px solid rgba(255,255,255,0.7);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 15px;
      cursor: pointer;
      box-shadow: 0 6px 25px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
      text-decoration: none;
      color: #444;
      z-index: 3;
    }

    .menu-item:hover {
      transform: scale(1.08);
      box-shadow: 0 10px 35px rgba(0,0,0,0.25);
      color: #444;
    }

    .menu-item i {
      font-size: 1.6rem;
      color: #cc1a4a;
      margin-bottom: 6px;
    }

    .menu-item span {
      font-size: 0.65rem;
      font-weight: 600;
      line-height: 1.3;
      color: #555;
    }

    /* Positioning */
    .item-top-left    { top: 28px;  left: 50%; transform: translateX(-160px); }
    .item-top-right   { top: 28px;  left: 50%; transform: translateX(30px); }
    .item-middle-left { top: 50%;   left: 30px; transform: translateY(-50%); }
    .item-middle-right{ top: 50%;   right: 30px; transform: translateY(-50%); }

    .item-top-left:hover    { transform: translateX(-160px) scale(1.08); }
    .item-top-right:hover   { transform: translateX(30px) scale(1.08); }
    .item-middle-left:hover { transform: translateY(-50%) scale(1.08); }
    .item-middle-right:hover{ transform: translateY(-50%) scale(1.08); }

    /* Connector lines (decorative) */
    .connector {
      position: absolute;
      top: 50%; left: 50%;
      width: 2px;
      background: rgba(255,255,255,0.2);
      transform-origin: top center;
      z-index: 2;
    }

    /* Majalah button */
    .btn-majalah {
      margin-top: 24px;
      background: rgba(255,255,255,0.15);
      border: 1.5px solid rgba(255,255,255,0.4);
      color: white;
      padding: 12px 32px;
      border-radius: 50px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.85rem;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 10px;
      backdrop-filter: blur(10px);
      transition: all 0.3s;
      text-decoration: none;
    }
    .btn-majalah:hover {
      background: rgba(255,255,255,0.25);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .btn-majalah i { font-size: 1.1rem; color: #cc1a4a; }

    /* Entrance animations */
    .menu-item { animation: fadeInScale 0.6s ease both; }
    .item-top-left    { animation-delay: 0.1s; }
    .item-top-right   { animation-delay: 0.2s; }
    .item-middle-left { animation-delay: 0.3s; }
    .item-middle-right{ animation-delay: 0.4s; }
    .circle-center    { animation: fadeInScale 0.5s ease both, centerPulse 4s ease-in-out 0.5s infinite; }
    .btn-majalah      { animation: fadeInScale 0.6s ease 0.5s both; }

    @keyframes fadeInScale {
      from { opacity: 0; transform: scale(0.7); }
      to { opacity: 1; }
    }

    /* Override transform for positioned items */
    .item-top-left    { animation: fadeInScaleTopLeft 0.6s ease 0.1s both; }
    .item-top-right   { animation: fadeInScaleTopRight 0.6s ease 0.2s both; }
    .item-middle-left { animation: fadeInScaleMiddleLeft 0.6s ease 0.3s both; }
    .item-middle-right{ animation: fadeInScaleMiddleRight 0.6s ease 0.4s both; }

    @keyframes fadeInScaleTopLeft {
      from { opacity: 0; transform: translateX(-160px) scale(0.7); }
      to   { opacity: 1; transform: translateX(-160px) scale(1); }
    }
    @keyframes fadeInScaleTopRight {
      from { opacity: 0; transform: translateX(30px) scale(0.7); }
      to   { opacity: 1; transform: translateX(30px) scale(1); }
    }
    @keyframes fadeInScaleMiddleLeft {
      from { opacity: 0; transform: translateY(-50%) scale(0.7); }
      to   { opacity: 1; transform: translateY(-50%) scale(1); }
    }
    @keyframes fadeInScaleMiddleRight {
      from { opacity: 0; transform: translateY(-50%) scale(0.7); }
      to   { opacity: 1; transform: translateY(-50%) scale(1); }
    }

    /* Privacy link */
    .privacy-link {
      position: fixed;
      bottom: 12px;
      right: 16px;
      font-size: 0.65rem;
      color: rgba(255,255,255,0.5);
      z-index: 10;
    }
  </style>
</head>
<body>

  <div class="map-bg"></div>
  <div class="lines-bg"></div>
  <div class="dot dot-1"></div>
  <div class="dot dot-2"></div>
  <div class="dot dot-3"></div>
  <div class="dot dot-4"></div>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="welcome-text">Selamat Datang, SEVAN DWI KUSUMA</div>
    <a href="#" class="btn-keluar">
      <i class="bi bi-box-arrow-right"></i>
      <span>Keluar</span>
    </a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="menu-container">

      <!-- Menu Item: Layanan Individu ASN (Top Left) -->
      <a href="#" class="menu-item item-top-left">
        <i class="bi bi-person-circle"></i>
        <span>Layanan Individu ASN</span>
      </a>

      <!-- Menu Item: Layanan Manajemen ASN Instansi (Top Right) -->
      <a href="#" class="menu-item item-top-right">
        <i class="bi bi-person-badge"></i>
        <span>Layanan Manajemen ASN Instansi</span>
      </a>

      <!-- Menu Item: Layanan Seleksi (Middle Left) -->
      <a href="#" class="menu-item item-middle-left">
        <i class="bi bi-building-fill-check"></i>
        <span>Layanan Seleksi</span>
      </a>

      <!-- Center BKN Logo -->
      <div class="circle-center">
        <svg class="bkn-icon" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <!-- Stylized BKN emblem -->
          <circle cx="40" cy="32" r="10" fill="#cc1a4a" opacity="0.9"/>
          <circle cx="40" cy="32" r="6" fill="#e8e8e8"/>
          <circle cx="40" cy="32" r="3" fill="#0099cc"/>
          <!-- Rays -->
          <line x1="40" y1="18" x2="40" y2="10" stroke="#cc1a4a" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="51" y1="21" x2="57" y2="15" stroke="#cc1a4a" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="54" y1="32" x2="62" y2="32" stroke="#0099cc" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="29" y1="21" x2="23" y2="15" stroke="#cc1a4a" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="26" y1="32" x2="18" y2="32" stroke="#0099cc" stroke-width="2.5" stroke-linecap="round"/>
          <!-- Body -->
          <ellipse cx="30" cy="58" rx="7" ry="12" fill="#0099cc" opacity="0.8" transform="rotate(-15 30 58)"/>
          <ellipse cx="50" cy="58" rx="7" ry="12" fill="#0099cc" opacity="0.8" transform="rotate(15 50 58)"/>
          <ellipse cx="40" cy="55" rx="5" ry="10" fill="#cc1a4a" opacity="0.85"/>
        </svg>
        <div class="bkn-logo-text">BKN</div>
      </div>

      <!-- Menu Item: Layanan Pendukung (Middle Right) -->
      <a href="#" class="menu-item item-middle-right">
        <i class="bi bi-gear-wide-connected"></i>
        <span>Layanan Pendukung</span>
      </a>

    </div>

    <!-- Majalah Digital Button -->
    <a href="#" class="btn-majalah">
      <i class="bi bi-book-half"></i>
      Majalah Digital BKN
    </a>
  </div>

  <div class="privacy-link">Privacy · Terms</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
