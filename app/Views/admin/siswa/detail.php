<?php
/**
 * Admin > Data Siswa > Detail
 * Tidak ada desain Figma untuk halaman ini, jadi dibuat sederhana mengikuti gaya halaman lain.
 * UI saja, data dari dummy berdasarkan ?id=.
 */
require __DIR__ . '/_shared.php';

$s = siswaById($siswaList, $_GET['id'] ?? 1);
$e = function ($key) use ($s) {
    $val = trim((string) ($s[$key] ?? ''));
    return $val === '' ? '-' : htmlspecialchars($val);
};
$tgl = function ($d) {
    return $d ? date('d/m/Y', strtotime($d)) : '-';
};

$pageTitle = $s['nama'];
$pageSubtitle = 'NISN: ' . $s['nisn'];
$pageStatusLabel = $s['status'];
$activePage = 'siswa'; // samakan dengan kunci menu "Data Siswa" di sidebar.php
$pageHeaderActions = '<a href="index.php" class="btn btn-light border btn-sm mr-2"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>'
    . '<a href="edit.php?id=' . (int) $s['id'] . '" class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit mr-1"></i> Edit</a>'
    . '<button type="button" class="btn btn-outline-danger btn-sm btn-hapus"'
    . ' data-nama="' . htmlspecialchars($s['nama']) . '" data-nisn="' . htmlspecialchars($s['nisn']) . '"'
    . ' data-kelas="' . htmlspecialchars($s['kelas_lengkap']) . '" data-instansi="' . htmlspecialchars($s['instansi']) . '"'
    . ' data-guru="' . htmlspecialchars($s['guru']) . '"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>';

ob_start();
siswaStyles();
?>
<div class="siswa-page">

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card form-card h-100"><div class="card-body p-4">
                <div class="section-title">Informasi Pribadi &amp; Akademik</div>
                <div class="detail-row"><div class="k">Nama Lengkap</div><div class="v"><?= $e('nama') ?></div></div>
                <div class="detail-row"><div class="k">NISN</div><div class="v"><?= $e('nisn') ?></div></div>
                <div class="detail-row"><div class="k">Kelas &amp; Jurusan</div><div class="v"><?= $e('kelas_lengkap') ?></div></div>
                <div class="detail-row"><div class="k">Jenis Kelamin</div><div class="v"><?= $e('jk') ?></div></div>
                <div class="detail-row"><div class="k">Tempat, Tanggal Lahir</div><div class="v"><?= $e('ttl') ?></div></div>
                <div class="detail-row"><div class="k">WhatsApp</div><div class="v"><?= $e('wa') ?></div></div>
                <div class="detail-row"><div class="k">Email</div><div class="v"><?= $e('email') ?></div></div>
                <div class="detail-row"><div class="k">Alamat</div><div class="v"><?= $e('alamat') ?></div></div>
                <div class="detail-row"><div class="k">Orang Tua / Wali</div><div class="v"><?= $e('ortu') ?></div></div>
                <div class="detail-row"><div class="k">Telepon Orang Tua</div><div class="v"><?= $e('tlp_ortu') ?></div></div>
            </div></div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card form-card h-100"><div class="card-body p-4">
                <div class="section-title">Penempatan PKL</div>
                <div class="detail-row"><div class="k">Instansi Mitra</div><div class="v"><?= $e('instansi') ?></div></div>
                <div class="detail-row"><div class="k">Pembimbing Lapangan</div><div class="v"><?= $e('pic') ?></div></div>
                <div class="detail-row"><div class="k">Guru Pembimbing</div><div class="v"><?= $e('guru') ?></div></div>
                <div class="detail-row"><div class="k">Periode PKL</div><div class="v"><?= $tgl($s['mulai']) ?> s/d <?= $tgl($s['selesai']) ?></div></div>
                <div class="detail-row"><div class="k">Status</div><div class="v"><span class="<?= badgeStatus($s['status']) ?>"><?= $e('status') ?></span></div></div>
            </div></div>
        </div>
    </div>
</div>

<?php siswaModalHapus(); ?>
<?php
$content = ob_get_clean();
require __DIR__ . '/../../layouts/admin.php';
