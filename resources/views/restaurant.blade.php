@extends('layout')

@section('content')

    <div class="restaurant-main">
        <h1>Le Chat Noir Bistro</h1>
    </div>

    <div class="row">
        <div class="restaurant-leftcolumn">
            <div class="card container">
                <h2 class="restaurant-headers">Details</h2>
                <img class="restaurant-miniImg" src="img/Binx.jpg" alt="Yawing cat named Binx">
                <br>
                <h4 class="center restaurant-headers"><strong>Location</strong></h4>
                <p class="center">348 E. Main St, <br>
                    Lexington, KY</p>
                <br>
                <h4 class="center restaurant-headers"><strong>Hours</strong></h4>
                <p class="center">Wednesday through Saturday</p>
                <p class="center">Dinner Only: 5pm - 10pm</p>
                <p class="center">Sunday Brunch and Dinner</p>
                <p class="center">11am - 8pm</p>
            </div>
            <food-card><h2 class="restaurant-headers" slot="specialHeader">Le plat du jour</h2></food-card>
        </div>

        <div class="restaurant-rightcolumn">
            <div class="card container">
                <h2 class="restaurant-headers">Opening Soon</h2>
                <p>Il y a un film d'Elvis sur le panneau de sélection,
                    Nous avons tous vu au moins trois fois
                    Tout le monde est fauché, Bobby a un dollar
                    Mettez un dollar d'essence dans sa camionnette
                    Nous allons '90 milles à l'heure dans une impasse
                    Qu'est-ce qui est pressé, mon fils, où vas-tu aller?
                    On va hurler à la lune, tirer la lumière
                    C'est une petite ville samedi soir
                    C'est une petite ville samedi soir</p>
            </div>
            <accordion></accordion>
        </div>
    </div>
@endsection