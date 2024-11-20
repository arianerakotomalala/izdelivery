<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5 shadow-lg " style="">
                <div class="card-header text-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width:100px;">
                </div>
                {{-- message success --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{route('login.action')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn w-100" style="background-color:#f08e6b">
                            Connexion
                        </button>

                            <div class="mt-3 text-center">
                                <span>Vous n'avez pas de compte ?</span>
                                <a href="{{route('inscrire.blade')}}" class="text-decoration-none" style="color: #f08e6b;">
                                    Inscrivez-vous
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
