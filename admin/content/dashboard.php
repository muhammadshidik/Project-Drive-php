<?php include 'admin/controller/koneksi.php'; ?>

<style>
  .menu-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: 0.3s ease-in-out;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .menu-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
  }

  .menu-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }

  .menu-info {
    padding: 1rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .menu-info h5 {
    font-weight: 600;
    margin-bottom: 0.4rem;
  }

  .menu-info .kategori {
    font-size: 0.75rem;
    font-weight: 500;
    padding: 3px 8px;
    background: #e9ecef;
    border-radius: 6px;
    display: inline-block;
    margin-bottom: 0.5rem;
  }

  .menu-info p {
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    color: #555;
  }

  .menu-info .desc {
    flex-grow: 1;
    font-size: 0.85rem;
    color: #666;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Max lines */
    -webkit-box-orient: vertical;
  }

  .menu-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
  }

  .menu-actions .btn {
    flex: 1;
    font-size: 0.85rem;
    padding: 6px 12px;
    border-radius: 8px;
  }
</style>
</head>

<body class="bg-light">

<div class="container py-5">
  <h2 class="fw-bold text-center mb-2">Menu Catering Dapur Mama Niar</h2>
  <p class="text-muted text-center mb-4">Pilih menu favoritmu di bawah ini:</p>

  <div class="row g-4">
    <?php
    $result = mysqli_query($config, "SELECT * FROM menu ORDER BY id DESC LIMIT 12");
    $menu = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($menu as $row):
    ?>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="admin/content/uploads/<?= $row['gambar'] ?: 'default.png' ?>" class="menu-image" alt="<?= htmlspecialchars($row['nama']) ?>">

          <div class="menu-info">
            <div class="kategori"><?= htmlspecialchars($row['kategori']) ?></div>
            <h5><?= htmlspecialchars($row['nama']) ?></h5>
            <p class="text-muted">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
            <div class="desc"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></div>

            <div class="menu-actions">
              <a href="?page=detail&id=<?= $row['id'] ?>" class="btn btn-outline-secondary btn-sm">Detail</a>
              <a href="?page=beli&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Beli</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>
