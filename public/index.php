<?php
$page = $_GET['page'] ?? 'dashboard';

switch ($page) {
    case 'data-siswa':
        require dirname(__DIR__) . '/app/Views/admin/siswa/index.php';
        break;

    case 'dashboard':
    default:
        require dirname(__DIR__) . '/app/Views/admin/dashboard.php';
        break;

    case 'create':
        require dirname(__DIR__) . '/app/Views/admin/siswa/create.php';
        break;
}