[file name]: detail.php
[file content begin]
<?php
include 'koneksi.php';

if(isset($_GET['id']) && !empty(trim($_GET['id']))){
    $id = trim($_GET['id']);
    
    $sql = "SELECT * FROM berita WHERE id = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = $id;
        
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $judul = $row['judul'];
                $kategori = $row['kategori'];
                $isi = $row['isi'];
                $tanggal = $row['tanggal'];
                $gambar = $row['gambar'];
            } else{
                header("Location: index.php");
                exit();
            }
        }
        $stmt->close();
    }
    $conn->close();
} else{
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($judul) ?> - ENT PENS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .news-header {
            background-color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-bottom: 1px solid #e9ecef;
        }
        
        .news-content {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        
        .news-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        
        .news-meta {
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        
        .news-image {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        
        .news-body {
            line-height: 1.8;
            font-size: 1.1rem;
            color: #2c3e50;
        }
        
        .category-badge {
            background: #fd7e14;
            color: white;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .back-btn {
            background: #4e73df;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .back-btn:hover {
            background: #2e59d9;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-newspaper me-2"></i>ENT PENS News
            </a>
            <a href="index.php" class="back-btn">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="news-content">
            <h1 class="news-title"><?= htmlspecialchars($judul) ?></h1>
            
            <div class="news-meta d-flex align-items-center gap-3">
                <span class="category-badge"><?= htmlspecialchars($kategori) ?></span>
                <span><i class="bi bi-calendar me-1"></i> <?= date('d M Y', strtotime($tanggal)) ?></span>
                <span><i class="bi bi-clock me-1"></i> <?= date('H:i', strtotime($tanggal)) ?> WIB</span>
            </div>
            
            <?php if($gambar): ?>
            <img src="uploads/<?= $gambar ?>" class="news-image" alt="<?= htmlspecialchars($judul) ?>">
            <?php endif; ?>
            
            <div class="news-body">
                <?= nl2br(htmlspecialchars($isi)) ?>
            </div>
            
            <div class="mt-4 pt-3 border-top">
                <a href="index.php" class="back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2023 ENT PENS News. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
[file content end]