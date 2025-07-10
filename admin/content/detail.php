<?php
include 'admin/controller/koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "<div class='text-center mt-5'>Menu tidak ditemukan.</div>";
  exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($config, "SELECT * FROM menu WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
  echo "<div class='text-center mt-5'>Menu tidak ditemukan.</div>";
  exit;
}
?>

  <title>Detail Menu - <?= htmlspecialchars($data['nama']) ?></title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .detail-container {
      max-width: 1000px;
      margin: 50px auto;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }

    .menu-image {
      width: 100%;
      height: 360px;
      object-fit: cover;
      object-position: center;
      border-radius: 16px 0 0 16px;
    }

    .menu-detail {
      padding: 2rem;
    }

    .menu-detail h1 {
      font-weight: bold;
      font-size: 1.75rem;
    }

    .menu-price {
      font-size: 1.4rem;
      font-weight: 600;
      color: #0d6efd;
      margin-top: 1rem;
      margin-bottom: 1rem;
    }

    .menu-description {
      color: #444;
      font-size: 1rem;
      line-height: 1.6;
    }

    .btn-group-custom {
      display: flex;
      gap: 1rem;
      margin-top: 2rem;
    }

    @media (max-width: 768px) {
      .menu-image {
        border-radius: 16px 16px 0 0;
        height: 240px;
      }

      .row.flex-md-row {
        flex-direction: column;
      }
    }
  </style>

<body>

<div class="container px-3">
  <div class="detail-container">
    <div class="row flex-md-row">
      <div class="col-md-6 p-0">
        <img src="admin/content/uploads/<?= $data['gambar'] ?: 'default.png' ?>" alt="<?= $data['nama'] ?>" class="menu-image">
      </div>
      <div class="col-md-6">
        <div class="menu-detail">
          <h1><?= htmlspecialchars($data['nama']) ?></h1>
          <div class="menu-price">Rp<?= number_format($data['harga'], 0, ',', '.') ?></div>
          <p class="menu-description"><?= nl2br(htmlspecialchars($data['deskripsi'])) ?></p>

          <div class="btn-group-custom">
            <a href="menu.php" class="btn btn-outline-secondary">← Kembali</a>
            <a href="beli.php?id=<?= $data['id'] ?>" class="btn btn-primary">Beli Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

