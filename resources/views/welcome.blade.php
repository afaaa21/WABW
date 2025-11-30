@extends('master')

@section('title', 'Dashboard')

@section('content')
    <!-- Hero Section -->
    <div style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); padding: 40px; border-radius: 16px; color: white; margin-bottom: 40px; box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);">
        <h1 style="margin: 0; font-size: 28px; font-weight: 700;">Selamat Datang, Admin!</h1>
        <p style="margin: 10px 0 0; opacity: 0.9;">Berikut adalah ringkasan data kepegawaian perusahaan Anda hari ini.</p>
    </div>

    <div class="dashboard-grid">
        
        <!-- Card 1: Pegawai -->
        <a href="{{ route('employees.index') }}" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card">
                <div class="icon-bg" style="background-color: #e0e7ff; color: #4f46e5;">
                    <!-- Icon Users -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div>
                    <h3>Pegawai</h3>
                    <p>Kelola data karyawan</p>
                </div>
            </div>
        </a>

        <!-- Card 2: Departemen -->
        <a href="{{ route('departements.index') }}" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card">
                <div class="icon-bg" style="background-color: #dcfce7; color: #10b981;">
                    <!-- Icon Building -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                        <line x1="9" y1="22" x2="9" y2="22"></line>
                        <line x1="15" y1="22" x2="15" y2="22"></line>
                        <line x1="12" y1="22" x2="12" y2="22"></line>
                        <line x1="12" y1="2" x2="12" y2="22"></line>
                    </svg>
                </div>
                <div>
                    <h3>Departemen</h3>
                    <p>Atur struktur divisi</p>
                </div>
            </div>
        </a>

        <!-- Card 3: Jabatan -->
        <a href="{{ route('positions.index') }}" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card">
                <div class="icon-bg" style="background-color: #fef3c7; color: #d97706;">
                    <!-- Icon Briefcase -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <p>Manajemen posisi & gaji</p>
                </div>
            </div>
        </a>

        <!-- Card 4: Absensi -->
        <a href="{{ route('attendance.index') }}" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card">
                <div class="icon-bg" style="background-color: #e0f2fe; color: #0ea5e9;">
                    <!-- Icon Calendar -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </div>
                <div>
                    <h3>Absensi</h3>
                    <p>Pantau kehadiran</p>
                </div>
            </div>
        </a>

        <!-- Card 5: Gaji -->
        <a href="{{ route('salaries.index') }}" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card">
                <div class="icon-bg" style="background-color: #fee2e2; color: #ef4444;">
                    <!-- Icon Money -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
                <div>
                    <h3>Gaji</h3>
                    <p>Rekapitulasi payroll</p>
                </div>
            </div>
        </a>

        <!-- Card 6: Pengaturan (Tambahan agar layout genap) -->
        <a href="#" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card">
                <div class="icon-bg" style="background-color: #f1f5f9; color: #475569;">
                    <!-- Icon Sliders / Settings Modern -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                </div>
                <div>
                    <h3>Pengaturan</h3>
                    <p>Konfigurasi sistem</p>
                </div>
            </div>
        </a>

    </div>

    <!-- Tambahan CSS Khusus Halaman Ini -->
    <style>
        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #f1f5f9;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: #e0e7ff;
        }

        .dashboard-card h3 {
            margin: 0 0 5px 0;
            font-size: 18px;
            color: #1e293b;
        }

        .dashboard-card p {
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }

        .icon-bg {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* ... css dashboard-card yang lama ... */

    /* Tambahkan CSS Grid Baru ini di paling bawah */
    .dashboard-grid {
        display: grid;
        gap: 25px;
        /* Default Mobile: 1 Kolom */
        grid-template-columns: 1fr;
    }

    @media (min-width: 600px) {
        /* Tablet: 2 Kolom */
        .dashboard-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 900px) {
        /* Desktop: Paksa 3 Kolom (Supaya jadi 3x2 rapi) */
        .dashboard-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    </style>
@endsection