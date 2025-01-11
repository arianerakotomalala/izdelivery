<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Commande</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

    <style>
        #map {
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            background-color: #f08e6b;
            font-weight: bold;
            font-size: 1.25rem;
            color: white;
        }

        .info-title {
            font-size: 1rem;
            font-weight: bold;
            color: #6c757d;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 500;
        }

        body {
            background-color: #f5f5f5;
        }

        h1 {
            color: #212529;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #f08e6b;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #e57d5f;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Bouton de retour -->
        <div class="mb-4">
            <a href="{{ route('commande.index') }}" class="btn btn-custom">
                <i class="bi bi-arrow-left-circle"></i> Retour à la liste des commandes
            </a>
        </div>

        <!-- Titre -->
        <h1>Détails de la Commande {{ $commande->id }}</h1>

        <!-- Contenu -->
        <div class="row g-4">
            <!-- Informations de la commande -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Informations de la Commande</div>
                    <div class="card-body">
                        <p><span class="info-title">Client :</span> 
                            <span class="info-value">{{ $commande->user ? $commande->user->name : 'Non attribué' }}</span>
                        </p>
                        <p><span class="info-title">Produit :</span> <span class="info-value">{{ $commande->description }}</span></p>
                        <p><span class="info-title">Livreur :</span> <span class="info-value">{{ $commande->livreur->name ?? 'Non assigné' }}</span></p>
                        <p><span class="info-title">Véhicule :</span> <span class="info-value">{{ $commande->vehicle->marque?? 'Non assigné' }}</span></p>
                        <p><span class="info-title">Statut :</span> <span class="info-value">{{ $commande->status }}</span></p>
                        <p><span class="info-title">Adresse de livraison :</span> <span class="info-value">{{ $commande->lieu_livraison }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Carte de la localisation -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Localisation de la Livraison</div>
                    <div class="card-body p-0">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Adresse de livraison (récupérée depuis la base de données)
            const adresseLivraison = "{{ $commande->lieu_livraison }}";

            // Initialiser la carte
            const map = L.map('map').setView([0, 0], 2); // Vue globale par défaut

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Utiliser Nominatim pour convertir l'adresse en coordonnées GPS
            const geocodeUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(adresseLivraison)}`;

            fetch(geocodeUrl)
                .then(response => response.json())
                .then(data => {
                    if (data && data.length > 0) {
                        const { lat, lon } = data[0]; // Récupérer latitude et longitude

                        // Centrer la carte sur les coordonnées obtenues
                        map.setView([lat, lon], 18); // Zoom élevé pour une adresse précise

                        // Ajouter un marqueur
                        L.marker([lat, lon]).addTo(map)
                            .bindPopup(`<strong>${adresseLivraison}</strong>`)
                            .openPopup();
                    } else {
                        alert("Impossible de localiser l'adresse. Veuillez vérifier l'adresse saisie.");
                    }
                })
                .catch(error => {
                    console.error("Erreur lors du géocodage :", error);
                    alert("Une erreur s'est produite lors de la récupération de l'adresse.");
                });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
