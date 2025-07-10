<?php include 'admin/controller/koneksi.php'; ?>

  <title>Data Menu</title>
  <style>
    img.thumb {
      border-radius: 8px;
      object-fit: cover;
      height: 60px;
      width: 80px;
    }
  </style>

<body class="bg-light">
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Menu Catering</h3>
    <a href="?page=add-menu" class="btn btn-primary">+ Tambah Menu</a>
  </div>

  <div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-4">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($config, "SELECT * FROM menu ORDER BY id DESC");
          $menuList = mysqli_fetch_all($result, MYSQLI_ASSOC);

          if (count($menuList) == 0) {
            echo '<tr><td colspan="7" class="text-center text-muted">Belum ada data menu.</td></tr>';
          }

          foreach ($menuList as $i => $data):
          ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td><?= htmlspecialchars($data['nama']) ?></td>
              <td>Rp<?= number_format($data['harga'], 0, ',', '.') ?></td>
              <td><span class="badge bg-secondary"><?= $data['kategori'] ?></span></td>
              <td><?= nl2br(htmlspecialchars($data['deskripsi'])) ?></td>
              <td>
                <?php if (!empty($data['gambar'])) : ?>
                  <img src="admin/content/uploads/<?= $data['gambar'] ?>" class="thumb" alt="<?= $data['nama'] ?>">
                <?php else : ?>
                  <span class="text-muted">-</span>
                <?php endif; ?>
              </td>
              <td class="text-nowrap">
                <a href="?page=add-menu&edit=<?= $data['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?page=add-menu&hapus=<?= $data['id'] ?>" onclick="return confirm('Hapus menu ini?')" class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
