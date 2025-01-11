
<div class="container">
    <h1>Emploi du Temps des Livreurs</h1>

    @if($emploiDuTemps->isEmpty())
        <p>Aucune commande à afficher.</p>
    @else
        @foreach($emploiDuTemps as $date => $commandes)
            <h3>Date : {{ $date }}</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Heure</th>
                        <th>Description</th>
                        <th>ID du livreur</th>
                        <th>Nom du livreur</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                        <tr>
                            <td>{{ $commande['heure'] }}</td>
                            <td>{{ $commande['description'] }}</td>
                            <td>{{ $commande['livreur_id'] ?? 'Non assigné' }}</td>
                            <td>{{ $commande['livreur_name'] ?? 'Non assigné' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endif
</div>

