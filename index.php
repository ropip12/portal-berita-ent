<?php
include 'koneksi.php';

$result = $conn->query("SELECT * FROM berita ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita ENT PENS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --accent-color: #fd7e14;
            --light-bg: #f8f9fa;
            --dark-bg: #212529;
        }
        
        body {
            background-color: #f5f7f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1495020689067-958852a7765e?ixlib=rb-4.0.3') center/cover no-repeat;
            color: white;
            padding: 5rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
        }
        
        .news-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 10px;
            overflow: hidden;
            border: none;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }
        
        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .news-title {
            font-weight: 700;
            color: var(--dark-bg);
            line-height: 1.3;
            margin-bottom: 10px;
        }
        
        .news-excerpt {
            color: var(--secondary-color);
            line-height: 1.6;
        }
        
        .news-meta {
            font-size: 0.85rem;
            color: var(--secondary-color);
        }
        
        .read-more-btn {
            font-weight: 600;
            color: var(--primary-color);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .read-more-btn:hover {
            color: #0a58ca;
        }
        
        .read-more-btn i {
            margin-left: 5px;
            transition: transform 0.3s;
        }
        
        .read-more-btn:hover i {
            transform: translateX(5px);
        }
        
        .footer {
            background-color: var(--dark-bg);
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: color 0.3s;
        }
        
        .social-links a:hover {
            color: var(--accent-color);
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            font-weight: 700;
        }
        
        .section-title:after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: var(--accent-color);
            margin-top: 10px;
        }
        
        .news-date {
            display: flex;
            align-items: center;
            color: var(--secondary-color);
        }
        
        .news-date i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-newspaper me-2"></i>ENT PENS News
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Teknologi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Olahraga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Politik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ekonomi</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="login.php" class="btn btn-primary">
                        <i class="bi bi-lock-fill me-2"></i>Login Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Portal Berita ENT PENS</h1>
            <p class="lead">Sumber informasi terkini dan terpercaya dari organisasi ENT PENS</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mb-5">
        <h2 class="section-title">Berita Terbaru</h2>
        
        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-lg-4 col-md-6">
                <div class="news-card card h-100">
                    <?php if($row['gambar']): ?>
                    <div class="position-relative">
                        <img src="uploads/<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['judul'] ?>">
                        <span class="category-badge"><?= $row['kategori'] ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="news-title"><?= $row['judul'] ?></h5>
                        <div class="news-meta mb-2">
                            <span class="news-date">
                                <i class="bi bi-calendar-event"></i> <?= date('d M Y', strtotime($row['tanggal'])) ?>
                            </span>
                        </div>
                        <p class="news-excerpt"><?= substr($row['isi'],0,150) ?>...</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <a href="detail.php?id=<?= $row['id'] ?>" class="read-more-btn">
                            Baca selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        
        <!-- Pagination (optional) -->
        <nav aria-label="Page navigation" class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>Tentang ENT PENS News</h5>
                    <p>Portal berita resmi organisasi ENT PENS yang menyajikan informasi terkini dan terpercaya seputar kampus, teknologi, dan berbagai informasi menarik lainnya.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>Kontak Kami</h5>
                    <p><i class="bi bi-geo-alt-fill me-2"></i> Jl. Raya PENS, Sukolilo, Surabaya</p>
                    <p><i class="bi bi-envelope-fill me-2"></i> info@entpensnews.id</p>
                    <p><i class="bi bi-telephone-fill me-2"></i> (031) 1234567</p>
                </div>
                <div class="col-lg-4">
                    <h5>Ikuti Kami</h5>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4" style="border-color: rgba(255,255,255,0.1)">
            <div class="text-center">
                <p class="mb-0">© 2023 ENT PENS News. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>