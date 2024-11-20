<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Base</title>
    <style>
        /* Image de fond */
        body {
            background-image: url('{{ asset('img/box.jpg') }}');
            background-size: cover;
            background-position: center center;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Liens superposés sur l'image */
        .image-container {
            position: relative;
            width: 100%;
            height: 500px;
        }
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
      

        /* Animation du texte */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
        

        /* Navbar sans couleur de fond avec liens ronds */
        .navbar {
            background: transparent !important;
            box-shadow: none;
            padding: 1rem 0;
        }
        .navbar-nav .nav-link {
            color: #fff;
            margin: 0 15px;
            padding: 12px 20px;
            border-radius: 50%; /* Liens entourés d'un cercle */
            font-size: 25px;
            transition: all 0.3s ease;
    
        }
        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.5);
            color: #fff;
            text-decoration: none;
           text-decoration: 1px solid white;
           border-radius: 3px
        }

        /* Footer avec les informations de contact toujours en bas */
        .footer-contact {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            padding: ;
            text-align: center;
            margin-top: auto; /* Pousse le footer en bas */
        }
        .contact-info {
            font-size: 14px;
        }
        .social-icons img {
            width: 24px;
            margin: 0 8px;
            background-color: black;
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('/img/logo.png') }}" alt="Logo" width="65"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.acceuil') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.collaboration') }}">Conditions de collaboration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('client.propos')}}">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.commander.form') }}">Commander</a>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a class="nav-link btn btn-light text-dark" href="{{ route('login.form') }}">Se connecter</a>
                        @else
                            <div class="dropdown">
                                <a class="nav-link btn btn-light text-dark dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); confirmLogout();">Déconnexion</a>
                                    </li>
                                </ul>
                            </div>
                            <form id="logout-form" action="{{ route('login.deconnexion') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    @yield('contenu')
    <!-- Footer avec les informations de contact toujours en bas -->
    <div class="footer-contact">
        <div class="contact-info">
            <span><i class="fa fa-phone"></i> +261 34 12 345 67 |</span>
            <span><i class="fa fa-envelope"></i> izdelivery@gmail.mg |</span>
            <span><i class="fa fa-map-marker"></i> Analakely Rue12</span>
        </div>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><img src="{{ asset('img/facebook.png') }}" alt="Facebook"></a>
            <a href="https://instagram.com" target="_blank"><img src="{{ asset('img/instagram.png') }}" alt="Instagram"></a>
            <a href="https://whatsapp.com" target="_blank"><img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp"></a>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function confirmLogout() {
            if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</body>
</html>
