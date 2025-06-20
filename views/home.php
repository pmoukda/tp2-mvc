<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" href="{{asset}}css/style.css">
</head>
<body>
    <header>
      <ul class="language">
        <li><a href="#">S'inscrire</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Fr</a>|</li>
        <li><a href="#">En</a></li>
      </ul>
      <nav>
        <div class="logo" >
          <span>Prestige</span>
          <small>Car Rental</small>
        </div>
        <ul>
          <li><a href="{{base}}/home">Accueil</a></li>
          <li><a href="{{base}}/voiture">Inventaires</a></li>
          <li><a href="{{base}}/client">Clients</a></li>
          <li><a href="{{base}}/location">Gérer ma réservation</a></li>
        </ul>
      </nav>
  </header>
  <main>
    <h1>{{data}}</h1>
    <article>
      <p>Que vous planifiez un voyage, un déplacement professionnel ou que vous ayez simplement besoin d’un véhicule pour quelques jours,</p><p>notre service de location vous propose une large gamme de voitures modernes, confortables et fiables à des tarifs compétitifs.</p>
      <ul>
        <li>Une sélection de véhicules pour tous les besoins : citadines, berlines, SUV, utilitaires…</li>
        <li>Des réservations simples et rapides en ligne</li>
        <li>Une équipe à votre écoute pour vous accompagner</li>
        <li>Des tarifs transparents, sans mauvaise surprise</li>
      </ul>
      
      <p><strong>Réservez en quelques clics,</strong>récupérez votre voiture à l’agence ou optez pour la livraison, et partez en toute sérénité </p>
      
      <div class="card">
        <h2>Besoin d’un véhicule aujourd’hui ?</h2>
        <p>Rendez-vous directement sur la page Inventaire pour découvrir les voitures disponibles et choisir les dates qui vous conviennent.</p>
        <p>Merci de votre confiance et bonne route avec Prestige <small>car rental</small> !</p>
      </div>
    </article>
    <div class="homebtn"><a class="btn small" href="{{base}}/voiture">Découvrir nos véhicules</a></div>
  </main>
  <footer>
    <p> Moukda &copy; 2025 TP2-MVC. Tous droits réservés</p>
  </footer>
</body>
</html>