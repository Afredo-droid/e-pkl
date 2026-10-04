<?php
$data = $data ?? [
    'id' => 1,
    'nisn' => '0068472910',
    'nama' => 'Ahmad Rizky Pratama',
    'kelas' => 'XII RPL 1',
    'jenis_kelamin' => 'Laki-laki',
    'ttl' => 'Bandung, 14 Mei 2007',
    'no_hp' => '0812-3456-7890',
    'alamat' => 'Jl. Cendana No. 12, Bandung',
    'nama_orang_tua' => 'Bapak Surya Pratama',
    'hp_orang_tua' => '0813-9876-5432',
    'instansi_id' => '1',
    'guru_id' => '1',
    'mulai_pkl' => '2024-07-01',
    'selesai_pkl' => '2024-12-31',
    'status' => 'Aktif',
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin-siswa.css'); ?>">
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
                        <span>Edit</span>
                    </div>

                    <div class="page-header">
                        <div class="page-header-left">
                            <h1>Edit Data Siswa</h1>
                            <p>Perbarui data siswa, penempatan PKL, dan status bimbingan magang</p>
                        </div>

                        <a href="<?= site_url('admin/siswa'); ?>" class="btn btn-light">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <form method="post" action="<?= site_url('admin/siswa/update/' . ($data['id'] ?? 1)); ?>" enctype="multipart/form-data">
                        <?= $this->load->view('admin/siswa/_form', ['data' => $data, 'mode' => 'edit']); ?>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>