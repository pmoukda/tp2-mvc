{{ include('layouts/header.php', {title: 'location edit'})}} 
     <h1> Modifier la réservation</h1>
    <form method="POST">
      <fieldset>
        <legend>Détail sur le véhicule</legend>
      <input type="hidden" name="voiture_id" value="{{ voiture.id}}">
      
        <!-- Affichage des infos voiture -->
        <img src="{{asset}}/img/{{ voiture.images}}" width="600" height="300" alt="">
        <p><strong>Marque : </strong>{{ voiture.marque }}</p>
        <p><strong>Modèle : </strong>{{ voiture.modele }}</p>
        <p><strong>Année : </strong>{{ voiture.annee }}</p>
        <p><strong>Couleur : </strong>{{ voiture.couleur }}</p>
        <p><strong>Transmission : </strong>{{ voiture.transmission }}</p>
        <p><strong>Passagers : </strong>{{ voiture.nombrePassager }}</p>
        <p><strong>Prix journalier : </strong>{{ voiture.prixJournalier}}$</p>
        <div class="btn small"><a href="{{base}}/voiture">Changer</a></div>
      </fieldset>
      <!--  formulaire location -->
      <fieldset>
          <legend>Détails de la Location</legend>
          <input type="hidden" id="id" name="id" value="{{location.id}}">

          <label for="dateDebut">Date de début :</label>
          <input type="date" id="dateDebut" name="dateDebut" value="{{location.dateDebut}}">
          {% if errors.dateDebut is defined %}
            <span class="error">{{errors.dateDebut}}</span>
          {% endif %}

          <label for="dateFin">Date de fin :</label>
          <input type="date" id="datFin" name="dateFin" value="{{location.dateFin}}">
          {% if errors.dateFin is defined %}
            <span class="error">{{errors.dateFin}}</span>
          {% endif %}

          <label for="montant">Montant (CAD) :</label>
          <input type="number" id="montant" name="montant" min="0" readonly value="{{location.montant}}">
          {% if errors.montant is defined %}
            <span class="error">{{errors.montant}}</span>
          {% endif %}
          <label for="statut">Statut :</label>
          <select name="statut" required>
              <option value="Confirmée" {% if location.statut == 'Confirmée' %}selected{% endif %}>Confirmée</option>
              <option value="En cours" {% if location.statut == 'En cours' %}selected{% endif %}>En cours</option>
              <option value="En attente" {% if location.statut == 'En attente' %}selected{% endif %}>En attente</option>
              <option value="Annulée" {% if location.statut == 'Annulée' %}selected{% endif %}>Annulée</option>
          </select>
          {% if errors.statut is defined %}
            <span class="error">{{errors.statut}}</span>
          {% endif %}
      </fieldset>
      <!--  formulaire client -->
      <fieldset>
          <legend>Informations du Client</legend>
          <input type="hidden" id="id" name="client_id" value="{{location.client_id}}">

          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom" value="{{client.nom}}">
          {% if errors.nom is defined %}
            <span class="error">{{errors.nom}}</span>
          {% endif %}
 
          <label for="adresse">Adresse :</label>
          <input type="text" id="adresse" name="adresse" value="{{client.adresse}}">
          {% if errors.adresse is defined %}
            <span class="error">{{errors.adresse}}</span>
          {% endif %}

          <label for="codePostal">Code Postal :</label>
          <input type="text" id="codePostal" name="codePostal" value="{{client.codePostal}}">
           {% if errors.codePostal is defined %}
            <span class="error">{{errors.codePostal}}</span>
          {% endif %}

          <label for="phone">Téléphone :</label>
          <input type="tel" id="hone" name="phone" value="{{client.phone}}">
           {% if errors.phone is defined %}
            <span class="error">{{errors.phone}}</span>
          {% endif %}

          <label for="email">Email :</label>
          <input type="email" id="email" name="email" value="{{client.email}}">
           {% if errors.email is defined %}
            <span class="error">{{errors.email}}</span>
          {% endif %}

          <label for="permis_conduire">Permis de conduire :</label>
          <input type="text" id="permis_conduire" name="permis_conduire" value="{{client.permis_conduire}}">
           {% if errors.permis_conduire is defined %}
            <span class="error">{{errors.permis_conduire}}</span>
          {% endif %}
      </fieldset>
 
      <input class="btn form" type="submit" value="Enregistrer">
    </form>
{{ include('layouts/footer.php')}} 