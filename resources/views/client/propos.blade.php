
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fff5f2; /* Couleur de fond claire */
        color: #333333; /* Couleur du texte principal */
    }
    .hero-section {
        background-color: #aea29e; /* Couleur principale */
        color: #fff;
        padding: 100px 0;
        text-align: center;
    }
    .hero-section h1 {
        font-size: 3rem;
        font-weight: 600;
    }
    .feature-box {
        padding: 30px;
        background-color: #ffb897; /* Couleur d'accentuation */
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }
    .feature-box:hover {
        transform: translateY(-10px);
        background-color: #f08e6b; /* Changement de couleur au survol */
        color: #fff;
    }
    .feature-box img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 20px;
    }
    .card-custom {
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 10px;
        background-color: #fff5f2;
    }
    .card-custom img {
        border-radius: 10px 10px 0 0;
    }
    .card-custom .card-title {
        color: #b35a3b; /* Couleur de texte accentuée */
    }
    .btn-primary {
        background-color: #f08e6b;
        border-color: #f08e6b;
    }
    .btn-primary:hover {
        background-color: #b35a3b; /* Couleur complémentaire foncée */
        border-color: #b35a3b;
    }
    .text-muted{
        color: white;
    }
</style>

@extends('client.navigation')
@section('contenu')
    

<div class="hero-section">
    <div class="container">
    </div>
</div>

<!-- À propos Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <h2>Qui sommes-nous ?</h2>
            <p class="text-muted">
                Une agence de livraison comme IZ Delivery pourrait être une entreprise spécialisée dans
                la gestion et l'acheminement de colis ou de produits à travers divers modes de transport
                (moto, vélo, voiture, etc.). Même si l'agence peut avoir peu d'historique ou une
                présence récente, il est possible de mettre en avant plusieurs services et informations clés
             pour renforcer sa crédibilité et attirer des clients. </p>
        </div>
        <div class="col-12 col-md-6">
            <img src="{{asset('img/collabora.jpg')}}" alt="Notre équipe" class="img-fluid rounded shadow-sm">
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Nos Services</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="feature-box">
                <img src="{{asset('img/livraison1.jpg')}}" alt="Livraison rapide">
                <h4>Livraison Rapide</h4>
                <p>Nous assurons la livraison de vos commandes dans les meilleurs délais.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <img src="{{asset('img/livraison1.jpg')}}" alt="Suivi en temps réel">
                <h4>Pourquoi Choisir IZ Delivery</h4>
                <p>
                    Fiabilité : Un service fiable avec des délais de livraison respectés.
                    Service client de qualité : Réactivité et prise en charge rapide des préoccupations des clients.
                    Flexibilité : Des options adaptées pour tous types de besoins, de la livraison express à la livraison standard.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <img src="{{asset('img/livraison1.jpg')}}" alt="Sécurité">
                <h4>Innfomations generales</h4>
                <p>
                    Livraison Express : Livraison rapide (le jour même ou sous 24 heures) pour des colis urgents.
                    Livraison Standard : Livraison en 2 à 5 jours pour des envois moins urgents.
                
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS et Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection
