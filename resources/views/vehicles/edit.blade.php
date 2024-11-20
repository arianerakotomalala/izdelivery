<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Véhicule</title>
</head>
<body>
    <h1>Modifier le Véhicule</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="marque">Marque :</label>
        <input type="text" id="marque" name="marque" value="{{ old('brand', $vehicle->marque) }}">
        @error('marque')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="modele">Modèle :</label>
        <input type="text" id="modele" name="modele" value="{{ old('modele', $vehicle->modele) }}">
        @error('modele')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="numeroPlaque">Numéro d'immatriculation :</label>
        <input type="text" id="numeroPlaque" name="numeroPlaque" value="{{ old('numeroPlaque', $vehicle->license_plate) }}">
        @error('numeroPlaque')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <button type="submit">Mettre à jour le Véhicule</button>
    </form>
</body>
</html>
