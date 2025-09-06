@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard">
        <div class="grid">
            <!-- Jumlah Kategori -->
            <div class="card stat-card bg-info">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="details">
                    <span class="icon">📂</span>
                    <h3>Kategori</h3>
                    <p></p>
                </div>
            </div>

            <!-- Jumlah Produk -->
            <div class="card stat-card bg-danger">
                <div class="icon">
                    <i class="fas fa-list-alt"></i>
                </div>
                <div class="details">
                    <span class="icon">📦</span>
                    <h3>Produk</h3>
                    <p></p>
                </div>
            </div>

            <!-- Jumlah Stok -->
            <div class="card stat-card bg-success">
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="details">
                    <span class="icon">🛒</span>
                    <h3>stok</h3>
                    <p></p>
                </div>
            </div>

            <!-- Jumlah 'suplier -->
            <div class="card stat-card bg-warning">
                <div class="icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="details">
                    <span class="icon">🤝</span>
                    <h3>suplier</h3>
                    <p></p>
                </div>

                 <!-- Jumlah Transaksi -->
            <div class="card stat-card bg-warning">
                <div class="icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="details">
                    <span class="icon">💰</span>
                    <h3>Transaksi</h3>
                    <p></p>
                </div>

            </div>
        </div>
    </div>

    <style>
        .dashboard {
            margin-top: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 12px;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card .icon {
            font-size: 32px;
            margin-right: 15px;
        }

        .stat-card .details h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .stat-card .details p {
            font-size: 20px;
            font-weight: bold;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Warna sesuai kebutuhan */
        .bg-info { background: #3498db; }
        .bg-danger { background: #e74c3c; }
        .bg-success { background: #2ecc71; }
        .bg-warning { background: #f39c12; }
    </style>

    <script>
        // Misalnya nanti buat animasi angka
        document.addEventListener("DOMContentLoaded", function () {
            const counters = document.querySelectorAll(".stat-card p");
            counters.forEach(counter => {
                let value = parseInt(counter.innerText) || 0;
                let start = 0;
                let duration = 1000;
                let increment = value / (duration / 16);

                function animate() {
                    start += increment;
                    if (start < value) {
                        counter.innerText = Math.floor(start);
                        requestAnimationFrame(animate);
                    } else {
                        counter.innerText = value;
                    }
                }
                if (value > 0) animate();
            });
        });
    </script>
@endsection
