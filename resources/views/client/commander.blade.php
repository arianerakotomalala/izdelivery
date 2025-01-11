<style>
    .card-body textarea {
        resize: none;
    }

    .payment-option {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .payment-option img {
        width: 30px;
        height: 30px;
        margin-right: 8px;
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .form-control {
        border: none;
        border-radius: 5px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        background-color: rgba(229, 175, 175, 0.85);
        color: #333;
    }

    .form-control:focus {
        outline: none;
        box-shadow: 0 0 8px rgba(255, 175, 146, 0.5);
    }

    .btn-custom {
        background-image: linear-gradient(to right, #eedabe, #f08e6b);
        color: white;
    }

    .row {
        margin-bottom: 10px; /* Réduit l'espace entre les lignes */
    }

    /* Nouveau style pour afficher les champs sur une seule ligne */
    .single-line-form {
        display: flex; /* Utilise flexbox pour aligner les éléments */
        flex-wrap: wrap; /* Permet aux éléments de passer à la ligne suivante si nécessaire */
    }

    .single-line-form > div {
        flex: 1; /* Chaque champ prend un espace égal */
        margin-right: 10px; /* Espace entre les champs */
    }


</style>

@extends('client.navigation')

@section('contenu')
<div class="background-container">
    <div class="card shadow-lg w-50 m-auto mt-3 mb-3">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <h2 class="text-center mb-4">Les informations concernant votre colis !</h2>
            <form action="{{ route('client.commander.submit') }}" method="POST">
                @csrf
                <!-- Type de colis et durabilité -->
                <div class="single-line-form">
                    <div class="mb-3">
                        <label for="type_colis" class="form-label">Type de colis</label>
                        <select name="type_colis" id="type_colis" class="form-control @error('type_colis') is-invalid @enderror">
                            <option value="" disabled selected>Sélectionnez le type de colis</option>
                            <option value="simple" {{ old('type_colis') == 'fragile' ? 'selected' : '' }}>Livraison simple</option>
                            <option value="express" {{ old('type_colis') == 'non_fragile' ? 'selected' : '' }}>Livraison Express</option>
                            <option value="internationnale" {{ old('type_colis') == 'alimentaire' ? 'selected' : '' }}>Livraison Internationale</option>
                            <option value="autre" {{ old('type_colis') == 'autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('type_colis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- durabilite --}}
                    <div class="mb-3">
                        <label for="durabilite_range" class="form-label">Durabilité</label>
                        <input type="range" min="0" max="100" value="{{ old('durabilite', 50) }}" class="form-control" id="durabilite_range" oninput="updateValeurDurabilite(this.value)">
                        <p id="ValueDisplay" class="text-muted">{{ old('durabilite', 50) }}%</p>
                        <input type="hidden" name="durabilite" id="durabilite" value="{{ old('durabilite', 50) }}">
                    </div>
                </div>

                <!-- Description -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Date et heure de livraison -->
                <div class="single-line-form">
                    <div class="mb-3">
                        <label for="date_de_livraison" class="form-label">Date de livraison</label>
                        <input type="date" class="form-control @error('date_de_livraison') is-invalid @enderror" name="date_de_livraison" value="{{ old('date_de_livraison') }}">
                        @error('date_de_livraison')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="heure_livraison" class="form-label">Heure de livraison</label>
                    <select class="form-control @error('heure_livraison') is-invalid @enderror" name="heure_livraison">
                        @php $i = 6; @endphp
                        @while($i <= 19)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) . ':00-' . str_pad($i + 1, 2, '0', STR_PAD_LEFT) . ':00' }}" {{ old('heure_livraison') == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00-' . str_pad($i + 1, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : '' }}>
                                {{ $i . ' hr - ' . ($i + 1) . ' hr' }}
                            </option>
                            @php $i++; @endphp
                        @endwhile
                    </select>
                    @error('heure_livraison')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                </div>

                <!-- Poids du colis -->
                <div class="single-line-form">
                    <div class="mb-3">
                        <label for="poids_colis" class="form-label">Poids du colis</label>
                        <select name="poids_colis" id="poids_colis" class="form-control @error('poids_colis') is-invalid @enderror">
                            @php $poids = ['moins de 1', '1-9', '10-19', '20-29', '30-49', '50-79', '80-100', '100-500', '500 et plus']; @endphp
                            @foreach($poids as $poid)
                                <option value="{{ $poid }}" {{ old('poids_colis') == $poid ? 'selected' : '' }}>
                                    {{ $poid . ' kg' }}
                                </option>
                            @endforeach
                        </select>
                        @error('poids_colis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- lieu de livraison --}}
                    <div class="mb-3">
                        <label for="lieu_livraison" class="form-label">Lieu de livraison</label>
                        <input class="form-control @error('lieu_livraison') is-invalid @enderror" type="text" name="lieu_livraison" value="{{ old('lieu_livraison') }}">
                        @error('lieu__livraison')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Mode de paiement --}}
                    <div class="mb-3">
                        <label for="mode_payement" class="form-label">Mode de paiement</label>
                        <select class="form-control @error('mode_payement') is-invalid @enderror" name="mode_payement" value="{{ old('mode_payement') }}">
                            <option value="cash" {{ old('mode_payement') == 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="carte" {{ old('mode_payement') == 'carte' ? 'selected' : '' }}>Carte bancaire</option>
                            <option value="mobile_money" {{ old('mode_payement') == 'mobile_money' ? 'selected' : '' }}>Mobile Money</option>
                        </select>
                        @error('mode_payement')
                    <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <!-- Bouton d'envoi -->
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom w-100 mt-3">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function updateValeurDurabilite(value) {
    document.getElementById('ValueDisplay').textContent = value + '%';
    document.getElementById('durabilite').value = value;
}
</script>

@endsection
