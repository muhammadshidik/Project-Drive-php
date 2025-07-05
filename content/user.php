<?php
include __DIR__ . '/../config/koneksi.php';

$query = mysqli_query($config, "SELECT * FROM users ORDER BY id DESC");


// Cek jika query gagal
if (!$query) {
    die("Query error: " . mysqli_error($config));
}

// Ambil semua hasil sebagai array asosiatif
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data User</h5>
                <div class="table-responsive">
                    <table class="table table-bordered datatable">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($rows as $data): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($data['name']); ?></td>
                                    <td><?php echo htmlspecialchars($data['email']); ?></td>
                                    <td>
                                        <a href="?page=tambah-user&edit=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Are you sure you want to delete this user?')"
                                           href="?page=tambah-user&delete=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($rows)): ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data user.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        
                    </table>
                    <div class="mb-3 d-flex justify-content-between">
             <a href="?page=tambah-user" class="btn btn-primary btn-sm">Add User</a>
         </div>
                </div>

            </div>
        </div>
    </div>
</div>
