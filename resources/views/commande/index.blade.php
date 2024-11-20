<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Véhicules</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/svg/Logo.svg') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="layer"></div>
    <div class="page-flex">
<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
            <a href="/" class="logo-wrapper" title="Home">
                <img src="{{ asset('img/sary1.1.png') }}" alt="logo">
            </a>
        </div>

        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li><a href="{{ route('welcome') }}"><span class="icon home" aria-hidden="true"></span>Tableau de bord</a></li>
                <li><a href="{{ route('users.index') }}"><span class="icon document" aria-hidden="true"></span>Client</a></li>
                <li>
                    <a class="show-cat-btn" href="#">
                        <span class="icon folder" aria-hidden="true"></span>Livreur
                        <span class="category__btn transparent-btn">
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li><a href="{{ route('livreurs.create') }}">Ajouter</a></li>
                        <li><a href="{{ route('livreurs.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn active" href="#">
                        <span class="icon image" aria-hidden="true"></span>Vehicule
                        <span class="category__btn transparent-btn">
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li><a href="{{ route('vehicles.create') }}">Ajouter</a></li>
                        <li><a href="{{ route('vehicles.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('commande.index') }}"><span class="icon document" aria-hidden="true"></span>Commande</a></li>
                <li><a href="#"><span class="icon message" aria-hidden="true"></span>Disponibilité</a></li>
            </ul>
            <span class="system-menu__title">System</span>
            <ul class="sidebar-body-menu">
                <li><a href="#"><span class="icon setting" aria-hidden="true"></span>Paramètres</a></li>
            </ul>
        </div>
    </div>
</aside>

<div class="main-wrapper">
    <!-- Main Navigation -->
<h1>Liste des Commandes</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Produit</th>
        <th>Livreur</th>
        <th>Véhicule</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach ($commandes as $commande)
        <tr>
            <td>{{ $commande->id }}</td>
            <td>{{ $commande->client->name ?? 'N/A' }}</td>
            <td>{{ $commande->produit }}</td>
            <td>{{ $commande->livreur->nom ?? 'Non assigné' }}</td>
            <td>{{ $commande->vehicule->nom ?? 'Non assigné' }}</td>
            <td>{{ $commande->status }}</td>
            <td>
                <a href="{{ route('commande.assign', $commande->id) }}">Assigner Livreur et Véhicule</a>
            </td>
        </tr>
    @endforeach
</table>
