<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigner Livreur et Véhicule</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/svg/Logo.svg') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .main-wrapper {
            padding: 20px;
        }

        h1 {
            font-size: 1.75rem;
            color: #212529;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: inline-block;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background-color: #f08e6b;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e57d5f;
        }

        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #6c757d;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
        .custom-bg {
            background-color: #f08e6b !important;
        }
        .custom-text {
            color: #f08e6b !important;
        }
        .sidebar {
            background-color: #f08e6b;
        }
        .sidebar .nav-link {
            color: white !important;
        }
        .sidebar .nav-link.active, 
        .sidebar .nav-link:hover {
            background-color: #e57d5f;
            color: white !important;
        }
        .btn-primary {
            background-color: #f08e6b;
            border-color: #f08e6b;
        }
        .btn-primary:hover {
            background-color: #e57d5f;
            border-color: #e57d5f;
        }
        .table thead.custom-bg {
            background-color: #f08e6b;
            color: white;
        }
        .accordion-button {
            font-size: 1.25rem; /* Augmente la taille du texte */
            font-weight: bold;
            text-align: center; /* Centre le texte */
            justify-content: center; /* Centre horizontalement l'élément */
            padding: 20px; /* Augmente l'espacement autour */
            background-color: #f8f9fa; /* Couleur de fond plus douce */
            color: #f08e6b; /* Couleur du texte */
            border: 1px solid #ddd; /* Ajoute une bordure douce */
            transition: background-color 0.3s, transform 0.3s; /* Animation douce */
        }

        .accordion-button:hover {
            background-color: #f08e6b; /* Couleur de fond au survol */
            color: white; /* Couleur du texte au survol */
            transform: scale(1.05); /* Zoom léger pour l'interactivité */
        }

        .accordion-button:focus {
            box-shadow: none; /* Supprime l'effet de focus par défaut */
        }

        .accordion-item {
            margin-bottom: 15px; /* Ajoute un espacement entre les items */
        }

        .accordion-header {
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>

<body>
    <div class="layer"></div>
    <div class="page-flex">
        <!-- Sidebar -->
        <div class="d-flex">
        <nav class="sidebar vh-100 p-3 bg-dark text-white" style="min-width: 250px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/" class="text-white text-decoration-none d-flex align-items-center">
            <img src="{{ asset('img/sary1.1.png') }}" alt="logo" style="width: 40px; height: auto;">
            <span class="ms-2 fs-5">Dashboard</span>
        </a>
        <button class="btn btn-sm btn-outline-light d-lg-none" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
            <i class="bi bi-list"></i>
        </button>
    </div>
    <div class="collapse d-lg-block" id="sidebarMenu">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('dashboard') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-house-door-fill me-2"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('users.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-people-fill me-2"></i>
                    <span>Client</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex align-items-center dropdown-toggle" data-bs-toggle="collapse" href="#menuLivreur" role="button">
                    <i class="bi bi-truck me-2"></i>
                    <span>Livreur</span>
                </a>
                <div class="collapse ps-3" id="menuLivreur">
                    <a href="{{ route('livreurs.create') }}" class="nav-link text-white">Ajouter</a>
                    <a href="{{ route('livreurs.index') }}" class="nav-link text-white">Liste</a>
                </div>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex align-items-center dropdown-toggle" data-bs-toggle="collapse" href="#menuVehicule" role="button">
                    <i class="bi bi-car-front-fill me-2"></i>
                    <span>Véhicule</span>
                </a>
                <div class="collapse ps-3" id="menuVehicule">
                    <a href="{{ route('vehicles.create') }}" class="nav-link text-white">Ajouter</a>
                    <a href="{{ route('vehicles.index') }}" class="nav-link text-white">Liste</a>
                </div>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('commande.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-journal-text me-2"></i>
                    <span>Commande</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('livreurs.emploi_du_temps') }}" class="nav-link text-white">
                    <i class="bi bi-calendar-check me-2"></i> 
                    <span>Disponibilité</span>
                </a>
            </li>
        </ul>
        <hr class="text-secondary">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-gear-fill me-2"></i>
                    <span>Paramètres</span>
                </a>
            </li>
        </ul>
    </div>
</nav>


        <!-- Main Content -->
        <section class="section dashboard mt-4">
            <div class="row">
                <div class="col-12">
                <div class="accordion" id="emploiDuTempsAccordion">
    @foreach ($emploiDuTemps as $date => $commandes)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse-{{ $loop->index }}">
                    📅 <span>{{ $date }}</span>
                </button>
            </h2>
            <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#emploiDuTempsAccordion">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="custom-bg text-white">
                                <tr>
                                    <th>Heure de Livraison</th>
                                    <th>Description</th>
                                    <th>ID du Livreur</th>
                                    <th>Nom du Livreur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commandes as $commande)
                                    <tr>
                                        <td>{{ $commande->heure_livraison }}</td>
                                        <td>{{ $commande->description }}</td>
                                        <td>{{ $commande->livreur->id ?? 'Non assigné' }}</td>
                                        <td>{{ $commande->livreur->name ?? 'Non assigné' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
