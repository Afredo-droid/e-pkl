<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="<?= base_url('../assets/css/admin-siswa.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="brand-logo">E</div>
                <div class="brand-text">
                    <div class="name">E-PKL</div>
                    <div class="desc">SMK Negeri 1</div>
                </div>
            </div>

            <nav class="nav">
                <div class="nav-item">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </div>
                <div class="nav-item active">
                    <i class="fa-solid fa-user-graduate"></i>
                    <span>Data Siswa</span>
                </div>
                <div class="nav-item">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <span>Guru Pembimbing</span>
                </div>
                <div class="nav-item">
                    <i class="fa-solid fa-building-columns"></i>
                    <span>Instansi Mitra</span>
                </div>
                <div class="nav-item">
                    <i class="fa-solid fa-users"></i>
                    <span>Manajemen User</span>
                </div>
                <div class="nav-item">
                    <i class="fa-solid fa-file-lines"></i>
                    <span>Laporan</span>
                </div>
            </nav>

            <div class="sidebar-footer">
                E-PKL SMK v2.0
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="topbar-left">
                    <div><span class="status-dot"></span> Server Online</div>
                    <div>|</div>
                    <div>Tahun Ajaran 2024/2025</div>
                </div>

                <div class="topbar-right">
                    <div class="user-chip">
                        <div class="user-avatar">AU</div>
                        <div>
                            <div class="user-name">Admin Utama</div>
                            <div class="user-role">Administrator</div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="content">
                <div class="section-box form-page">
                    <div class="breadcrumb">
                        <a href="<?= site_url('admin/siswa'); ?>">Data Siswa</a>
                        <span>/</span>
                        <span>Tambah Siswa Baru</span>
                    </div>

                    <div class="page-header">
                        <div class="page-header-left">
                            <h1>Tambah Data Siswa</h1>
                            <p>Formulir pendaftaran data siswa baru untuk penempatan Praktik Kerja Lapangan (PKL)</p>
                        </div>

                        <a href="<?= site_url('admin/siswa'); ?>" class="btn btn-light">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <form method="post" action="<?= site_url('admin/siswa/store'); ?>" enctype="multipart/form-data">
                        <?= $this->load->view('admin/siswa/_form', ['data' => [], 'mode' => 'create']); ?>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>