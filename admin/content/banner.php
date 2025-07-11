<?php
// Konfigurasi folder penyimpanan
$targetDir = "admin/content/uploads/";
$uploadStatus = "";

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = basename($_FILES["banner"]["name"]);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ["jpg", "jpeg", "png", "webp"];

    // Validasi jenis file
    if (!in_array($imageFileType, $allowedTypes)) {
        $uploadStatus = "❌ Hanya file JPG, JPEG, PNG, atau WEBP yang diperbolehkan.";
    } elseif ($_FILES["banner"]["size"] > 2 * 1024 * 1024) {
        $uploadStatus = "❌ Ukuran file terlalu besar. Maks 2MB.";
    } elseif (move_uploaded_file($_FILES["banner"]["tmp_name"], $targetFile)) {
        $uploadStatus = "✅ Gambar berhasil diunggah sebagai: <strong>$fileName</strong><br>
    Gunakan nama ini di hero carousel.";
    } else {
        $uploadStatus = "❌ Gagal mengunggah gambar.";
    }
}
?>

<title>Upload Gambar Banner</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f8fafc;
    }

    .container {
        max-width: 500px;
        margin-top: 5rem;
    }

    .preview {
        margin-top: 1rem;
    }

    img.preview-img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
    }
</style>
</head>

<body>

    <div class="container">
        <h3 class="mb-4 text-center">Upload Gambar Banner</h3>

        <?php if ($uploadStatus): ?>
            <div class="alert alert-info"><?= $uploadStatus ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="banner" class="form-label">Pilih gambar (JPG/PNG/WEBP, max 2MB)</label>
                <input class="form-control" type="file" name="banner" id="banner" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Upload</button>
        </form>

        <div class="preview text-center" id="preview-box" style="display: none;">
            <p class="mt-3">Pratinjau:</p>
            <img src="#" alt="Preview" class="preview-img" id="preview-img">
        </div>
    </div>

    <!-- Preview gambar sebelum upload -->
    <script>
        document.getElementById("banner").onchange = function(evt) {
            const [file] = this.files;
            if (file) {
                const previewBox = document.getElementById("preview-box");
                const previewImg = document.getElementById("preview-img");
                previewBox.style.display = "block";
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script>

</body>