<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Kepegawaian')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #4f46e5; /* Indigo Modern */
            --primary-dark: #4338ca;
            --secondary: #64748b;
            --bg-light: #f3f4f6;
            --white: #ffffff;
            --text-dark: #1e293b;
            --text-gray: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- Navbar Professional --- */
        header {
            background-color: var(--white);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        nav ul {
            display: flex;
            gap: 30px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--text-gray);
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: var(--primary);
        }

        /* --- Main Content --- */
        main {
            flex: 1;
            max-width: 1200px;
            width: 100%;
            margin: 30px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* --- Global Styles --- */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h2 { font-size: 24px; font-weight: 700; color: var(--text-dark); margin: 0; }
        
        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            gap: 8px;
        }
        .btn-primary { background-color: var(--primary); color: white; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2); }
        .btn-primary:hover { background-color: var(--primary-dark); transform: translateY(-1px); }
        
        .btn-success { background-color: var(--success); color: white; }
        .btn-danger { background-color: var(--danger); color: white; }
        .btn-warning { background-color: var(--warning); color: white; }

        /* Tables Modern */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        
        th {
            background-color: #f8fafc;
            color: var(--text-gray);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            color: var(--text-dark);
            font-size: 14px;
        }
        
        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #f8fafc; }

        /* Forms */
        form { background: var(--white); padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); }
        label { font-weight: 500; margin-bottom: 8px; display: block; font-size: 14px; color: var(--text-dark); }
        input, select, textarea {
            width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; margin-bottom: 20px;
            font-size: 14px; transition: border-color 0.2s; box-sizing: border-box; font-family: 'Inter', sans-serif;
        }
        input:focus, select:focus, textarea:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1); }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            color: var(--text-gray);
            font-size: 13px;
            margin-top: auto;
            border-top: 1px solid #e2e8f0;
        }

        /* Alert */
        .alert { padding: 15px; background: #ecfdf5; border: 1px solid #d1fae5; color: #065f46; border-radius: 8px; margin-bottom: 20px; font-size: 14px; }
    </style>
</head>
<body>

    <header>
        <div class="navbar-container">
            <a href="{{ url('/') }}" class="logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                HR System
            </a>
            <nav>
                <ul>
                    <li><a href="{{ route('employees.index') }}">Pegawai</a></li>
                    <li><a href="{{ route('departements.index') }}">Departemen</a></li>
                    <li><a href="{{ route('positions.index') }}">Jabatan</a></li>
                    <li><a href="{{ route('attendance.index') }}">Absensi</a></li>
                    <li><a href="{{ route('salaries.index') }}">Gaji</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} HR System - Manajemen Kepegawaian Profesional</p>
    </footer>

</body>
</html>