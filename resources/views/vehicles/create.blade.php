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
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            min-width: 250px;
            background-color: #f08e6b;
            color: white;
            padding: 20px;
        }

        .sidebar .nav-link {
            color: white !important;
        }

        .sidebar .nav-link.active, 
        .sidebar .nav-link:hover {
            background-color: #e57d5f;
            color: white !important;
        }

        .main-wrapper {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 300px;
            padding-right: 300px;
            background-color: white;
            margin: 0px 0px;
            margin-left: 100px;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .btn-primary {
            background-color: #f08e6b;
            border-color: #f08e6b;
        }
        .form-control:focus {
            border-color: #f08e6b;
            box-shadow: 0 0 5px rgba(240, 142, 107, 0.5);
        }
        .btn-primary:hover {
            background-color: #e57d5f;
            border-color: #e57d5f;
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


<div class="main-wrapper">
        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf
            <h1 class="text-center mb-4">Ajouter un Véhicule</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="mb-3">
                <label for="marque" class="form-label">Marque :</label>
                <input 
                    type="text" 
                    id="marque" 
                    name="marque" 
                    class="form-control @error('marque') is-invalid @enderror" 
                    value="{{ old('marque') }}" 
                    placeholder="Entrez la marque du véhicule"
                    required>
                @error('marque')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="modele" class="form-label">Modèle :</label>
                <input 
                    type="text" 
                    id="modele" 
                    name="modele" 
                    class="form-control @error('modele') is-invalid @enderror" 
                    value="{{ old('modele') }}" 
                    placeholder="Entrez le modèle du véhicule"
                    required>
                @error('modele')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="numeroPlaque" class="form-label">Numéro d'immatriculation :</label>
                <input 
                    type="text" 
                    id="numeroPlaque" 
                    name="numeroPlaque" 
                    class="form-control @error('numeroPlaque') is-invalid @enderror" 
                    value="{{ old('numeroPlaque') }}" 
                    placeholder="Entrez le numéro d'immatriculation"
                    required>
                @error('numeroPlaque')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3 px-5">
                    <i class="bi bi-plus-circle"></i> Ajouter
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icons library -->
    <script src="{{ asset('plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js copy/script.js') }}"></script>
</body>
</html>
