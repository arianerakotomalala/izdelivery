<style>
    .overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        animation: fadeIn 2s ease-in-out;
    }

    .overlay .btn-link {
        color: white;
        font-size: 24px;
        text-decoration: none;
        background: rgba(0, 0, 0, 0.5);
        padding: 10px 20px;
        border-radius: 15px;
    }

    /* Typing animation for "Grand titre" */
    .typing {
        font-size: 3vw;
        color: white;
        font-weight: bolder;
        white-space: nowrap;
        overflow: hidden;
        border-right: 3px solid #fff;
        width: 0;
        animation: typing 2s steps(30) 1s forwards, blink 0.75s step-end infinite;
    }

    /* Typing effect */
    @keyframes typing {
        from {
            width: 0;
        }
        to {
            width: 100%;
        }
    }

    /* Cursor blinking effect */
    @keyframes blink {
        50% {
            border-color: transparent;
        }
    }
</style>

@extends('client.navigation')
@section('contenu')
    <div class="overlay">
        <h1 class="typing">Bienvenue sur Iz'Delivery</h1>
        <p style="font-weight: bolder">IzyDelivery est votre solution de livraison rapide, fiable et personnalisée pour
            toutes vos commandes et expéditions. Nous comprenons que chaque colis a de la valeur,
            et c'est pourquoi nous mettons l'accent sur la sécurité, la rapidité, et l'accessibilité
            de nos services.</p>
        <a href="#" class="btn-link">Découvrir nos services</a>
    </div>

@endsection
