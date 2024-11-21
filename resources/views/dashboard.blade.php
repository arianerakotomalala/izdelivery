<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('img/svg/Logo.svg') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #f08e6b;
            min-height: 100vh;
            color: white;
        }

        .sidebar .logo-wrapper {
            text-align: center;
            padding: 20px 0;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar a:hover {
            color: #ffe8dc;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body i {
            font-size: 2rem;
        }

        .card-primary {
            background-color: #f08e6b;
            color: white;
        }

        .topbar {
            background-color: #f08e6b;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .main-content {
            padding: 20px;
        }

        .chart-container {
            position: relative;
            height: 400px;
        }

        .btn-primary {
            background-color: #f08e6b;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e27d5e;
        }
        /* Barre latérale */
.sidebar {
    background-color: #f08e6b;
    min-height: 100vh;
    width: 250px;
    color: white;
    padding: 20px;
    position: fixed;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    z-index: 10;
}

/* Contenu principal */
.main-content {
    margin-left: 270px; /* Ajusté pour laisser la place à la barre latérale */
    padding: 20px;
}

/* Cartes */
.card {
    background-color: #ffffff;
    border: 1px solid #f0f0f0;
    border-radius: 12px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
}

/* Titres */
.card h4 {
    font-size: 18px;
    font-weight: bold;
    color: #333333;
}

/* Graphiques */
.chart-container {
    background-color: #f9f9f9;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <span class="icon home" aria-hidden="true"></span>Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">
                            <span class="icon document" aria-hidden="true"></span>Client
                        </a>
                    </li>

                    <li>
                        <a class="show-cat-btn" href="#">
                            <span class="icon folder" aria-hidden="true"></span>Livreur
                            <span class="category__btn transparent-btn">
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li><a href="{{ route('livreurs.create') }}">Ajouter</a></li>
                            <li><a href="{{ route('livreurs.index') }}">Liste</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="show-cat-btn active" href="#">
                            <span class="icon image" aria-hidden="true"></span>Véhicule
                            <span class="category__btn transparent-btn">
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li><a href="{{ route('vehicles.create') }}">Ajouter</a></li>
                            <li><a href="{{ route('vehicles.index') }}">Liste</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('commande.index') }}">
                            <span class="icon document" aria-hidden="true"></span>Commande
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon message" aria-hidden="true"></span>Disponibilité
                        </a>
                    </li>
                </ul>
                <span class="system-menu__title">Système</span>
                <ul class="sidebar-body-menu">
                    <li>
                        <a href="#">
                            <span class="icon setting" aria-hidden="true"></span>Paramètres
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content w-100">
            <!-- Topbar -->
            <div class="topbar">
                <h4>Tableau de bord</h4>
                <div>
                    <i class="fas fa-bell me-3"></i>
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>

            <!-- Dashboard Statistics -->
            <div class="row g-4 mt-4">
                <div class="col-md-3">
                    <div class="card card-primary text-center">
                        <div class="card-body">
                            <i class="fas fa-cart-arrow-down"></i>
                            <h5>Total Commandes</h5>
                            <h3>320</h3>
                            <p class="text-light">+8%</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-users text-danger"></i>
                            <h5>Total Clients</h5>
                            <h3>150</h3>
                            <p class="text-danger">-3%</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-shipping-fast text-success"></i>
                            <h5>Total Livreurs</h5>
                            <h3>45</h3>
                            <p class="text-success">+2%</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-box-open text-warning"></i>
                            <h5>Total Produits</h5>
                            <h3>1200</h3>
                            <p class="text-success">+10%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5>Statistiques des Activités</h5>
                    <div class="chart-container">
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre'],
                datasets: [
                    {
                        label: 'Commandes',
                        data: [200, 220, 250, 280, 300, 320],
                        borderColor: '#f08e6b',
                        backgroundColor: 'rgba(240, 142, 107, 0.2)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            }
        });
    </script>
</body>

</html>
