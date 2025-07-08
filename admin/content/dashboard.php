<?php

function tanggal_indonesia($tanggal = null) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April',
             'Mei', 'Juni', 'Juli', 'Agustus',
             'September', 'Oktober', 'November', 'Desember'
    ];
    $hari = [
        'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu', 'Thursday' => 'Kamis',
        'Friday' => 'Jumat', 'Saturday' => 'Sabtu'
    ];

    $tanggal = $tanggal ?: date('Y-m-d');
    $dt = new DateTime($tanggal);
    return $hari[$dt->format('l')] . ", " . $dt->format('d') . " " .
           $bulan[(int)$dt->format('m')] . " " . $dt->format('Y');
}
?>


<div class="container py-4">

  <!-- Welcome Card -->
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title mb-2">Selamat Datang, Admin</h5>
      <p class="card-text text-muted mb-0">
        <?= tanggal_indonesia(); ?> | <span id="jam-lokal">--:--:--</span> WIB
      </p>
    </div>
  </div>

  <!-- Upload Form -->
  <div class="card mb-4">
    <div class="card-body">
      <form>
        <div class="row g-3 align-items-center">
          <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Nama File">
          </div>
          <div class="col-md-5">
            <input type="file" class="form-control">
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary w-100" disabled>Upload</button>
          </div>
        </div>
        <div class="form-text mt-2">*Form ini hanya tampilan, belum terhubung ke backend.</div>
      </form>
    </div>
  </div>

  <!-- Table Files -->
  <div class="card">
    <div class="card-header bg-white">
      <strong>Daftar File</strong>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>No.</th>
              <th>Nama File</th>
              <th>Tanggal Upload</th>
              <th>Ukuran</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>document.pdf</td>
              <td>04 Juli 2025 14:30</td>
              <td>500 KB</td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-outline-success btn-sm">Download</button>
                  <button class="btn btn-outline-warning btn-sm">Rename</button>
                  <button class="btn btn-outline-danger btn-sm">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>photo.jpg</td>
              <td>03 Juli 2025 10:15</td>
              <td>1.2 MB</td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-outline-success btn-sm">Download</button>
                  <button class="btn btn-outline-warning btn-sm">Rename</button>
                  <button class="btn btn-outline-danger btn-sm">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>resume.docx</td>
              <td>01 Juli 2025 09:00</td>
              <td>300 KB</td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <button class="btn btn-outline-success btn-sm">Download</button>
                  <button class="btn btn-outline-warning btn-sm">Rename</button>
                  <button class="btn btn-outline-danger btn-sm">Hapus</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- JavaScript Jam Real-Time -->
<script>
  function updateJamLokal() {
    const now = new Date();
    const jam = now.getHours().toString().padStart(2, '0');
    const menit = now.getMinutes().toString().padStart(2, '0');
    const detik = now.getSeconds().toString().padStart(2, '0');
    document.getElementById("jam-lokal").textContent = `${jam}:${menit}:${detik}`;
  }
  updateJamLokal();
  setInterval(updateJamLokal, 1000); // update setiap detik
</script>
