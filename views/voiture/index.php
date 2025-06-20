{{ include('layouts/header.php', {title: 'voiture index'})}}  
  <article>
    <h1>Nos inventaires de véhicules Prestiges</h1>
    <div class="container">
    {% for voiture in voitures %}
        <div class="card">
          <img src="{{ asset }}img/{{ voiture.images }}">
          <h2>{{ voiture.marque ~" "~ voiture.modele }}</h2>
          <div class="description">
            <p>Année : {{ voiture.annee }}</p>
            <p>Couleur : {{ voiture.couleur }}</p>
            <p>Transmission : {{ voiture.transmission }}</p>
            <p>Passagers : {{ voiture.nombrePassager }}</p>
            <p><strong>Prix : {{ voiture.prixJournalier | number_format(2, '.', ',') }} $ / jour</strong></p>
          </div>
          <form action="{{base}}/location/create" method="GET">
              <input type="hidden" name="id" value="{{ voiture.id }}">
              <input class="btn" type="submit" value="Choisir">
          </form>
        </div>
      {% endfor %}
    </div>
  </article>
{{ include('layouts/footer.php')}}     