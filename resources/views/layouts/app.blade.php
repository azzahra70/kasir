<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Wrapper */
        .wrapper {
            display: flex;
            height: 100vh;
            background: #f0f2f5;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #4e54c8, #8f94fb);
            color: white;
            display: flex;
            flex-direction: column;
            transition: width 0.3s, box-shadow 0.3s;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            border-radius: 0 10px 10px 0;
            overflow: hidden;
        }

        .sidebar .brand {
            padding: 25px 20px;
            text-align: center;
            font-weight: bold;
            font-size: 1.4rem;
            letter-spacing: 1px;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .sidebar .brand .logo {
            font-size: 1.8rem; /* bisa emoji atau simbol */
        }

        .sidebar .menu {
            list-style: none;
            padding: 10px 0;
            flex: 1;
        }

        .sidebar .menu li {
            padding: 12px 20px;
            transition: background 0.3s, transform 0.3s;
            border-radius: 8px;
            margin: 5px 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .sidebar .menu li:hover {
            background: rgba(255,255,255,0.15);
            transform: translateX(5px);
        }

        .sidebar .menu li .icon {
            font-size: 1.2rem;
        }

        .sidebar .menu li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            flex: 1;
        }

        .sidebar .menu li a:hover {
            color: #ffeb3b;
        }

        /* Main */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #f0f2f5;
        }

        /* Navbar */
        .navbar {
            height: 60px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .toggle-btn {
            font-size: 22px;
            background: none;
            border: none;
            cursor: pointer;
            color: #4e54c8;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        /* Footer */
        .footer {
            height: 40px;
            background: white;
            text-align: center;
            line-height: 40px;
            border-top: 1px solid #ddd;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.05);
        }

        /* Sidebar Collapse */
        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .menu li {
            margin: 5px 0;
            text-align: center;
            padding: 15px 0;
            justify-content: center;
        }

        .sidebar.collapsed .menu li a {
            font-size: 0;
        }

        .sidebar.collapsed .brand {
            font-size: 1rem;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="brand">
                <span class="logo">⚡</span> <!-- Logo bawaan HTML -->
                <span>{{ env('APP_NAME') }}</span>
            </div>
            <ul class="menu">
                <li>
                    <span class="icon">🏠</span>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <span class="icon">📂</span>
                    <a href="{{ route('kategori.index') }}">Kategori</a>
                </li>
                <li>
                    <span class="icon">🤝</span>
                    <a href="{{ route('suplier.index') }}">Suplier</a>
                </li>
                <li>
                    <span class="icon">📦</span>
                    <a href="{{ route('produk.index') }}">Produk</a>
                </li>
                <li>
                    <span class="icon">🛒</span>
                    <a href="{{ route('stok.index') }}">Stok</a>
                </li>
                <li>
                    <span class="icon">💰</span>
                    <a href="{{ route('transaksi.index') }}">Transaksi</a>
                </li>
            </ul>
        </aside>

        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <header class="navbar">
                <button class="toggle-btn" id="toggleBtn">&#9776;</button>
                <h1>@yield('title')</h1>
                <div class="user-info">
                    <span>{{ Auth::user()->nama ?? 'Guest' }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <main class="content">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="footer">
                &copy; 2025 SMK Nurul Islam
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.getElementById("toggleBtn");
            const sidebar = document.getElementById("sidebar");

            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("collapsed");
            });
        });
    </script>
</body>
</html>
