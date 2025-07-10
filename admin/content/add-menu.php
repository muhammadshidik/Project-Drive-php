<?php
include 'admin/controller/koneksi.php';

// Tambah / Edit data
if (isset($_POST['simpan'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga1 = $_POST['harga'];
  $harga = $harga1 * 1000;
  $deskripsi = $_POST['deskripsi'];
  $kategori = $_POST['kategori'];

  $gambar = '';
  if ($_FILES['gambar']['name']) {
    $gambar = time() . '-' . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'admin/content/uploads/' . $gambar);
  }

  if ($id == '') {
    mysqli_query($config, "INSERT INTO menu (nama, harga, deskripsi, gambar, kategori) 
      VALUES ('$nama', '$harga1', '$deskripsi', '$gambar', '$kategori')");
  } else {
    if ($gambar != '') {
      mysqli_query($config, "UPDATE menu SET nama='$nama', harga='$harga1', deskripsi='$deskripsi', gambar='$gambar', kategori='$kategori' WHERE id=$id");
    } else {
      mysqli_query($config, "UPDATE menu SET nama='$nama', harga='$harga1', deskripsi='$deskripsi', kategori='$kategori' WHERE id=$id");
    }
  }
  header("Location:?page=menu");
  exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($config, "DELETE FROM menu WHERE id=$id");
  header("Location:?page=menu");
  exit;
}

// Ambil data untuk edit
$edit = null;
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $result = mysqli_query($config, "SELECT * FROM menu WHERE id=$id");
  $edit = mysqli_fetch_assoc($result);
}
?>
    <div class="card">
      <div class="card-body p-5">
        <h4 class="mb-4"><?= isset($edit) ? 'Edit' : 'Tambah' ?> Menu Catering</h4>
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">

          <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama" class="form-control" required value="<?= $edit['nama'] ?? '' ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Harga (Ribuan)</label>
            <input type="number" name="harga" class="form-control" required value="<?= $edit['harga'] ?? '' ?>">
            <div class="form-text">Contoh: 25 untuk Rp25.000</div>
          </div>

          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="Makanan" <?= (isset($edit['kategori']) && $edit['kategori'] == 'Makanan') ? 'selected' : '' ?>>Makanan</option>
              <option value="Minuman" <?= (isset($edit['kategori']) && $edit['kategori'] == 'Minuman') ? 'selected' : '' ?>>Minuman</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required><?= $edit['deskripsi'] ?? '' ?></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Gambar <?= isset($edit) ? '(Kosongkan jika tidak diubah)' : '' ?></label>
            <input type="file" name="gambar" class="form-control">
            <?php if (!empty($edit['gambar'])) : ?>
              <img src="admin/content/uploads/<?= $edit['gambar'] ?>" width="100" class="mt-2 rounded">
            <?php endif; ?>
          </div>

          <div class="d-flex justify-content-between">
            <button type="submit" name="simpan" class="btn btn-success">💾 Simpan</button>
            <a href="menu.php" class="btn btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
