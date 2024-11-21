<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Inscription</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        .form-container {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .left-section {
            background-image: url('{{ asset('img.jpg') }}');
            background-size: cover;
            background-position: center;
            border-radius: 10px 0 0 10px;
            position: relative;
            color: white;
        }
        .left-section .text-overlay {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        .left-section .text-overlay .title {
            font-size: 2rem;
            font-weight: bold;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            border-right: 2px solid;
            animation: typing 2s steps(15) infinite alternate, blink 0.5s step-end infinite alternate;
        }
        .left-section .text-overlay p {
            font-size: 1.1rem;
            color: #ffffff;
            margin-top: 10px;
        }
        .right-section {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            display: flex;
            align-items: center;
            text-align: center;
            gap: 10px;
            padding-bottom: 20px;
        }
        .form-header h5 {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
        }
        .form-header p {
            margin: 0;
            font-size: 0.9rem;
            color: #777;
        }
        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-bottom-color: #f08e6b;
            box-shadow: none;
        }
        .btn-custom {
            background-color: #f08e6b;
            color: white;
        }
        .btn-custom:hover {
            background-color: #e0765a;
        }
        .text-center a {
            color: #f08e6b;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }

        /* Animations */
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink {
            from, to { border-color: transparent; }
            50% { border-color: #ffffff; }
        }
    </style>
</head>
<body>
<div class="container-fluid form-container">
    <div class="row w-100 m-0">
        <!-- Section gauche avec image et texte -->
        <div class="col-md-6 left-section">
            <div class="text-overlay">
                <div class="title">Iz'Delivery</div>
                <p>Inscrivez-vous pour profiter de tous les avantages !</p>
            </div>
        </div>

        <!-- Section droite avec le formulaire -->
        <div class="col-md-6 right-section">
            <!-- Message de succès -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-header">
                <h5>Inscription</h5>
                <p>Remplissez les informations pour créer votre compte.</p>
            </div>

            <!-- Formulaire d'inscription -->
            <form method="POST" action="">
                @csrf

                <!-- Nom -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autofocus>
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Prénom -->
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required>
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Téléphone -->
                <div class="mb-3">
                    <label for="tel" class="form-label">Téléphone</label>
                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required>
                    @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Localisation -->
                <div class="mb-3">
                    <label for="local" class="form-label">Localisation</label>
                    <input id="local" type="text" class="form-control @error('local') is-invalid @enderror" name="local" value="{{ old('local') }}" required>
                    @error('local')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirmez le mot de passe</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <!-- Bouton d'inscription -->
                <button type="submit" class="btn btn-custom w-100 mt-3">S'inscrire</button>

                <!-- Lien pour la connexion -->
                <div class="mt-3 text-center">
                    <span>Vous avez déjà un compte ?</span>
                    <a href="{{ route('login') }}">Connectez-vous</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

