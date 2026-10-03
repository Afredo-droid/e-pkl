<?php
$pageTitle = 'Dashboard Monitoring PKL';
$pageSubtitle = 'Pantau aktivitas PKL secara realtime';
$pageStatusLabel = 'Realtime';
$activePage = 'dashboard';
$content = <<<'HTML'
<section class="card shadow-sm mb-4">
    <div class="card-body">
        <h2 class="h5 font-weight-bold text-gray-800">Dashboard Admin</h2>
        <p class="mb-0">Admin Shell berhasil dirender.</p>
    </div>
</section>
HTML;

require dirname(__DIR__) . '/app/Views/layouts/admin.php';
