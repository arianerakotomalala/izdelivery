@extends('client.navigation')

@section('contenu')
<div class="container my-5">
    <h1 class="text-center mb-5" style="color: #f08e6b; font-weight: bold;">Informations sur nos services</h1>
    
    <!-- Service Cards with Images and Click Animation -->
    <div class="row g-4">
        <!-- Card 1: Conditions de Collaboration -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" onclick="animateCard(this)">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="{{asset('img/collabora.jpg')}}" class="img-fluid rounded-start" alt="Conditions de Collaboration">
                    </div>
                    <div class="col-md-8 p-3">
                        <h2 class="text-primary">Conditions de Collaboration</h2>
                        <p class="text-muted">Découvrez nos termes de collaboration pour une coopération réussie.</p>
                        <div class="alert alert-info" role="alert">Veuillez lire attentivement les termes avant de commencer toute collaboration avec nous.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Horaires d'Ouverture -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" onclick="animateCard(this)">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="{{asset('img/collabora.jpg')}}" class="img-fluid rounded-start" alt="Horaires d'Ouverture">
                    </div>
                    <div class="col-md-8 p-3">
                        <h2 class="text-primary">Nos Horaires d'Ouverture</h2>
                        <p class="text-muted">Nous sommes disponibles du lundi au dimanche ,24h/24h 7j/7j de 6h à 21h.</p>
                        <div class="alert alert-warning" role="alert"><i class="fa fa-info-circle"></i> Pour toute assistance, veuillez contacter notre service client.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Tarifs de Livraison -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" onclick="animateCard(this)">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="{{asset('img/collabora.jpg')}}" class="img-fluid rounded-start" alt="Tarifs de Livraison">
                    </div>
                    <div class="col-md-8 p-3">
                        <h2 class="text-primary">Tarifs de Livraison</h2>
                        <p class="text-muted">Nos tarifs de livraison sont adaptés selon le type et la distance, et le poids de votre colis</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Livraison des(1-3 jours) <span class="badge bg-success rounded-pill">10 €</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Livraison express (en 24h) <span class="badge bg-warning rounded-pill">20 €</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Livraison internationale <span class="badge bg-info rounded-pill">Contactez-nous</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Informations Supplémentaires -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" onclick="animateCard(this)">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="{{asset('img/collabora.jpg')}}" class="img-fluid rounded-start" alt="Informations Supplémentaires">
                    </div>
                    <div class="col-md-8 p-3">
                        <h2 class="text-primary">Informations Supplémentaires</h2>
                        <p class="text-muted">Vous avez des questions ? N'hésitez pas à nous contacter.</p>
                        <button class="btn btn-primary btn-lg">Contactez-nous</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Click Animation Script -->
<script>
    function animateCard(card) {
        card.classList.add('shadow-lg', 'animate__animated', 'animate__pulse');
        setTimeout(() => {
            card.classList.remove('shadow-lg', 'animate__animated', 'animate__pulse');
        }, 500);
    }
</script>

<!-- Animation Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
