<?php include 'admin/controller/koneksi.php'; ?>
<title>Dapur Mama Niar – Menu</title>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
  :root {
    --primary: #ff5e57;
    --secondary: #fcd34d;
    --radius: 1rem;
    --shadow: 0 6px 20px rgba(0, 0, 0, .08);
    --bg-light: #f9fafb;
  }

  body {
    background: var(--bg-light);
    font-family: 'Poppins', sans-serif;
  }

  /* ==== HERO CAROUSEL ==== */
  #heroCarousel .carousel-item {
    height: 360px;
  }

  #heroCarousel .carousel-item img {
    height: 100%;
    object-fit: cover;
    filter: brightness(0.6);
  }

  #heroCarousel .carousel-caption {
    bottom: 60px;
  }

  #heroCarousel h1,
  #heroCarousel p {
    text-shadow: 0 3px 10px rgba(0, 0, 0, .4);
  }

  /* ==== MENU CARD ==== */
  .menu-card {
    border: 0;
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: .3s;
    display: flex;
    flex-direction: column;
    background: #fff;
  }

  .menu-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, .1);
  }

  .menu-card img {
    height: 220px;
    width: 100%;
    object-fit: cover;
    transition: .4s;
  }

  .menu-card:hover img {
    transform: scale(1.05);
  }

  .kategori-pill {
    background: var(--secondary);
    font-size: .75rem;
    font-weight: 600;
    padding: .35rem .8rem;
    border-radius: 50rem;
    color: #222;
  }

  .price-tag {
    color: var(--primary);
    font-weight: 700;
    font-size: 1.2rem;
  }

  .card-text {
    font-size: .85rem;
    color: #6b7280;
    height: 3.6em;
    overflow: hidden;
    margin-bottom: .75rem;
  }

  .btn-primary {
    background: var(--primary);
    border: 0;
  }

  .btn-primary:hover {
    background: #cc0812;
  }

  .btn-outline-secondary {
    border-color: #d1d5db;
    color: #444;
  }

  .btn-outline-secondary:hover {
    background: #f3f4f6;
  }

  .rating-badge {
    background: #10b981;
    color: #fff;
    font-size: .75rem;
    padding: .25rem .55rem;
    border-radius: .5rem;
  }
</style>
</head>

<body>

  <!-- ===== HERO CAROUSEL ===== -->
  <header id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="admin/content/uploads/banner1.jpg" class="w-100" alt="Banner 1">
        <div class="carousel-caption">
          <h1 class="fw-bold text-white">Dapur Mama Niar</h1>
          <p class="lead text-white">Makanan rumahan, hangat & selalu fresh</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="admin/content/uploads/banner2.png" class="w-100" alt="Banner 2">
        <div class="carousel-caption">
          <h1 class="fw-bold text-white">Promo Spesial Hari Ini!</h1>
          <p class="lead text-white">Diskon s/d 30 % untuk menu favorit</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="assets/img/banner3.jpg" class="w-100" alt="Banner 3">
        <div class="carousel-caption">
          <h1 class="fw-bold text-white">Pesan Sekarang</h1>
          <p class="lead text-white">Langsung dari dapur ke rumah Anda</p>
        </div>
      </div>

    </div>

    <!-- navigasi panah (opsional) -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </header>

  <!-- ===== MENU ===== -->
  <main id="menu" class="container py-5">
    <div class="row g-4">
      <?php
      $result = mysqli_query($config, "SELECT * FROM menu ORDER BY id DESC LIMIT 12");
      $menu = mysqli_fetch_all($result, MYSQLI_ASSOC);
      foreach ($menu as $row): ?>
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 d-flex">
          <div class="card menu-card w-100">
            <img src="admin/content/uploads/<?= $row['gambar'] ?: 'default.png' ?>"
              alt="<?= htmlspecialchars($row['nama']) ?>">
            <div class="card-body d-flex flex-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="kategori-pill"><i class="bi bi-tag"></i> <?= htmlspecialchars($row['kategori']) ?></span>
                <span class="rating-badge"><i class="bi bi-star-fill"></i> 4.8</span>
              </div>
              <h5 class="card-title fw-semibold"><?= htmlspecialchars($row['nama']) ?></h5>
              <p class="price-tag">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
              <p class="card-text"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>

              <div class="mt-auto d-grid gap-2">
                <a href="?page=detail&id=<?= $row['id'] ?>" class="btn btn-outline-secondary btn-sm">
                  <i class="bi bi-info-circle"></i> Detail
                </a>
                <a href="?page=beli&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">
                  <i class="bi bi-cart3"></i> Pesan Sekarang
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <!-- Bootstrap JS bundle (wajib untuk carousel) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>