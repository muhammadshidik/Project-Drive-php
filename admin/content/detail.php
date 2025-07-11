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
    background-color: #f5f7fa;
    font-family: 'Segoe UI', sans-serif;
  }

  .detail-container {
    max-width: 960px;
    margin: 3rem auto;
    background: #fff;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  }

  .image-box {
    width: 100%;
    height: 320px;
    overflow: hidden;
  }

  .image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
  }

  .image-box img:hover {
    transform: scale(1.05);
  }

  .detail-body {
    padding: 2rem;
  }

  .detail-body h1 {
    font-size: 1.8rem;
    font-weight: bold;
  }

  .price-tag {
    color: #16a085;
    font-weight: 600;
    font-size: 1.3rem;
    margin: 1rem 0;
  }

  .desc {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
  }

  .button-group {
    margin-top: 2rem;
    display: flex;
    gap: 0.75rem;
  }

  .btn-custom {
    padding: 0.6rem 1.4rem;
    font-weight: 500;
    border-radius: 8px;
  }

  @media (min-width: 768px) {
    .detail-container {
      display: flex;
      flex-direction: row;
    }

    .image-box {
      flex: 1;
      height: auto;
    }

    .detail-body {
      flex: 1;
    }
  }
</style>
</head>

<body>
  <div class="container">
    <div class="detail-container">
      <div class="image-box">
        <img src="admin/content/uploads/<?= $data['gambar'] ?: 'default.png' ?>" alt="<?= htmlspecialchars($data['nama']) ?>">
      </div>
      <div class="detail-body">
        <h1><?= htmlspecialchars($data['nama']) ?></h1>
        <div class="price-tag">Rp<?= number_format($data['harga'], 0, ',', '.') ?></div>
        <p class="desc"><?= nl2br(htmlspecialchars($data['deskripsi'])) ?></p>
        <div class="button-group">
          <a href="menu.php" class="btn btn-outline-dark btn-custom"><i class="bi bi-arrow-left"></i> Kembali</a>
          <a href="beli.php?id=<?= $data['id'] ?>" class="btn btn-success btn-custom"><i class="bi bi-cart"></i> Beli Sekarang</a>
        </div>
      </div>
    </div>
  </div>
</body>