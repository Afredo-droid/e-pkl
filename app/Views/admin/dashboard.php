<?php
$pageTitle = 'Dashboard Monitoring PKL';
$pageSubtitle = 'Pantau aktivitas PKL secara realtime';
$pageStatusLabel = 'Realtime';
$activePage = 'dashboard';

$statistics = [
    [
        'label' => 'TOTAL SISWA PKL',
        'value' => '348',
        'description' => 'Seluruh siswa terdaftar',
        'icon' => 'fas fa-users',
        'color' => 'primary',
    ],
    [
        'label' => 'HADIR HARI INI',
        'value' => '312',
        'description' => 'Siswa hadir di instansi',
        'icon' => 'fas fa-check-circle',
        'color' => 'success',
    ],
    [
        'label' => 'IZIN HARI INI',
        'value' => '19',
        'description' => 'Siswa dengan keterangan izin',
        'icon' => 'fas fa-clipboard-list',
        'color' => 'warning',
    ],
    [
        'label' => 'TIDAK HADIR HARI INI',
        'value' => '17',
        'description' => 'Belum tercatat hadir',
        'icon' => 'fas fa-user-times',
        'color' => 'danger',
    ],
];

$attendanceRecords = [
    [
        'name' => 'Alya Putri Ramadhani',
        'nis' => '2301042',
        'company' => 'PT. Informatika Solusi Nusantara',
        'time' => '07:42',
        'status' => 'Hadir',
    ],
    [
        'name' => 'Bima Pratama',
        'nis' => '2301058',
        'company' => 'CV. Karya Digital Mandiri',
        'time' => '07:51',
        'status' => 'Hadir',
    ],
    [
        'name' => 'Citra Lestari',
        'nis' => '2301071',
        'company' => 'PT. Informatika Solusi Nusantara',
        'time' => '—',
        'status' => 'Izin',
    ],
    [
        'name' => 'Dimas Saputra',
        'nis' => '2301093',
        'company' => 'Bengkel Teknologi Jaya',
        'time' => '—',
        'status' => 'Tidak Hadir',
    ],
    [
        'name' => 'Nadia Aulia Salsabila',
        'nis' => '2301116',
        'company' => 'CV. Karya Digital Mandiri',
        'time' => '07:36',
        'status' => 'Hadir',
    ],
    [
        'name' => 'Rizky Maulana',
        'nis' => '2301130',
        'company' => 'Bengkel Teknologi Jaya',
        'time' => '—',
        'status' => 'Izin',
    ],
];

$statusBadgeClasses = [
    'Hadir' => 'badge-success',
    'Izin' => 'badge-warning',
    'Tidak Hadir' => 'badge-danger',
];

$e = static fn ($value): string => htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

ob_start();
?>
<style>
    .dashboard-stat-card {
        overflow: hidden;
        border-radius: .55rem;
    }

    .dashboard-stat-card .card-body {
        min-height: 112px;
    }

    .dashboard-stat-label {
        color: #7b8794;
        font-size: .67rem;
        font-weight: 700;
        letter-spacing: .045em;
    }

    .dashboard-stat-value {
        color: #253247;
        font-size: 1.55rem;
        font-weight: 800;
        line-height: 1.15;
    }

    .dashboard-stat-description {
        color: #7b8794;
        font-size: .68rem;
    }

    .dashboard-stat-icon {
        display: inline-flex;
        width: 42px;
        height: 42px;
        align-items: center;
        justify-content: center;
        border-radius: .55rem;
        font-size: 1rem;
    }

    .dashboard-stat-icon-primary {
        color: #2875bd;
        background: #e8f2fb;
    }

    .dashboard-stat-icon-success {
        color: #1f8a63;
        background: #e6f5ef;
    }

    .dashboard-stat-icon-warning {
        color: #b7791f;
        background: #fff4dc;
    }

    .dashboard-stat-icon-danger {
        color: #c54a55;
        background: #fbeaec;
    }

    .dashboard-table-card {
        border: 1px solid #e7ecf2;
        border-radius: .6rem;
    }

    .dashboard-table-card .card-header {
        background: #fff;
        border-bottom: 1px solid #edf0f4;
        border-radius: .6rem .6rem 0 0;
    }

    .dashboard-table-title {
        color: #253247;
        font-size: .98rem;
        font-weight: 700;
    }

    .dashboard-date-label {
        color: #677588;
        font-size: .75rem;
        font-weight: 600;
    }

    .dashboard-filter-input {
        min-width: 205px;
    }

    .dashboard-filter-status {
        min-width: 140px;
    }

    .dashboard-attendance-table {
        min-width: 760px;
    }

    .dashboard-attendance-table thead th {
        padding-top: .8rem;
        padding-bottom: .8rem;
        color: #748092;
        background: #f8fafc;
        border-top: 0;
        border-bottom: 1px solid #e9edf2;
        font-size: .66rem;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .dashboard-attendance-table tbody td {
        padding-top: .82rem;
        padding-bottom: .82rem;
        color: #536174;
        font-size: .77rem;
        vertical-align: middle;
    }

    .dashboard-student-name {
        color: #344054;
        font-weight: 600;
    }

    .dashboard-company-name {
        min-width: 185px;
    }

    .dashboard-no-results {
        display: none;
    }

    @media (max-width: 575.98px) {
        .dashboard-stat-card .card-body {
            min-height: 104px;
        }

        .dashboard-stat-value {
            font-size: 1.35rem;
        }

        .dashboard-table-card .card-header {
            align-items: flex-start !important;
            flex-direction: column;
        }

        .dashboard-filter-input,
        .dashboard-filter-status {
            min-width: 0;
            width: 100%;
        }
    }
</style>

<section class="row" aria-label="Ringkasan presensi siswa PKL">
    <?php foreach ($statistics as $statistic): ?>
        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <article class="card dashboard-stat-card border-left-<?= $e($statistic['color']) ?> shadow-sm h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="mr-2">
                        <div class="dashboard-stat-label mb-2"><?= $e($statistic['label']) ?></div>
                        <div class="dashboard-stat-value mb-1"><?= $e($statistic['value']) ?></div>
                        <div class="dashboard-stat-description"><?= $e($statistic['description']) ?></div>
                    </div>
                    <span class="dashboard-stat-icon dashboard-stat-icon-<?= $e($statistic['color']) ?>">
                        <i class="<?= $e($statistic['icon']) ?>" aria-hidden="true"></i>
                    </span>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</section>

<section class="card dashboard-table-card shadow-sm mb-4" aria-labelledby="attendanceTitle">
    <div class="card-header py-3 d-flex align-items-center justify-content-between flex-wrap">
        <div class="mb-2 mb-md-0">
            <h2 class="dashboard-table-title mb-1" id="attendanceTitle">Presensi Harian</h2>
            <div class="dashboard-date-label">
                <i class="far fa-calendar-alt text-info mr-1" aria-hidden="true"></i>
                <time id="attendanceDate"><?= $e(date('d M Y')) ?></time>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap">
            <div class="input-group input-group-sm dashboard-filter-input mr-sm-2 mb-2 mb-sm-0">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white">
                        <i class="fas fa-search text-gray-500" aria-hidden="true"></i>
                    </span>
                </div>
                <input class="form-control" id="attendanceSearch" type="search"
                       placeholder="Cari nama, NIS, instansi..." aria-label="Cari presensi harian">
            </div>

            <select class="custom-select custom-select-sm dashboard-filter-status"
                    id="attendanceStatusFilter" aria-label="Filter status presensi">
                <option value="">Semua Status</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
            </select>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table dashboard-attendance-table mb-0" id="attendanceTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($attendanceRecords as $index => $record): ?>
                        <tr data-status="<?= $e($record['status']) ?>">
                            <td class="text-center"><?= $index + 1 ?></td>
                            <td class="dashboard-student-name"><?= $e($record['name']) ?></td>
                            <td><?= $e($record['nis']) ?></td>
                            <td class="dashboard-company-name"><?= $e($record['company']) ?></td>
                            <td><?= $e($record['time']) ?></td>
                            <td>
                                <span class="badge <?= $e($statusBadgeClasses[$record['status']]) ?>">
                                    <?= $e($record['status']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="dashboard-no-results" id="attendanceNoResults">
                        <td colspan="6" class="py-4 text-center text-muted">
                            Tidak ada data presensi yang sesuai.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white py-2">
        <small class="text-muted" id="attendanceResultCount">
            Menampilkan <?= count($attendanceRecords) ?> data dummy
        </small>
    </div>
</section>

<script>
    (() => {
        const searchInput = document.getElementById('attendanceSearch');
        const statusFilter = document.getElementById('attendanceStatusFilter');
        const tableRows = Array.from(document.querySelectorAll('#attendanceTable tbody tr[data-status]'));
        const noResultsRow = document.getElementById('attendanceNoResults');
        const resultCount = document.getElementById('attendanceResultCount');
        const dateElement = document.getElementById('attendanceDate');
        const today = new Date();

        const localDate = [
            today.getFullYear(),
            String(today.getMonth() + 1).padStart(2, '0'),
            String(today.getDate()).padStart(2, '0')
        ].join('-');
        dateElement.dateTime = localDate;
        dateElement.textContent = new Intl.DateTimeFormat('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(today);

        const filterAttendance = () => {
            const query = searchInput.value.trim().toLocaleLowerCase('id-ID');
            const selectedStatus = statusFilter.value;
            let visibleCount = 0;

            tableRows.forEach((row) => {
                const matchesQuery = row.textContent.toLocaleLowerCase('id-ID').includes(query);
                const matchesStatus = selectedStatus === '' || row.dataset.status === selectedStatus;
                const isVisible = matchesQuery && matchesStatus;

                row.hidden = !isVisible;
                if (isVisible) {
                    visibleCount += 1;
                }
            });

            noResultsRow.style.display = visibleCount === 0 ? 'table-row' : 'none';
            resultCount.textContent = `Menampilkan ${visibleCount} dari ${tableRows.length} data dummy`;
        };

        searchInput.addEventListener('input', filterAttendance);
        statusFilter.addEventListener('change', filterAttendance);
    })();
</script>
<?php
$content = ob_get_clean();

require dirname(__DIR__) . '/layouts/admin.php';
