{{ include('layouts/header.php', {title: 'location view'})}} 
    <article>
        <h1>Résumé de la Réservation</h1>
        <div class="container big">
            <div class="card resume">
                <h2 class="resume-title">Détails de la location</h2>
                <div class="description">
                    <p><strong>Date de début : </strong>{{ location.dateDebut }}</p>
                    <p><strong>Date de fin : </strong>{{ location.dateFin }}</p>
                    <p><strong>Montant total : </strong>{{ location.montant }} $</p>
                    <p><strong>Statut : </strong>{{ location.statut }}</p>
                </div>
                <hr>
                <h2 class="resume-title">Informations sur la voiture</h2>
                <div class="description">
                    <p><strong>Marque : </strong>{{ voiture.marque }}</p>
                    <p><strong>Modèle : </strong>{{ voiture.modele }}</p>
                    <p><strong>Année : </strong>{{ voiture.annee }}</p>
                    <p><strong>Couleur : </strong>{{ voiture.couleur }}</p>
                    <p><strong>Transmission : </strong> {{ voiture.transmission }}</p>
                    <p><strong>Nombre de passagers : </strong> {{ voiture.nombrePassager }}</p>
                    <p><strong>Prix journalier : </strong>{{ voiture.prixJournalier }} $</p>
                </div>
                <hr>
                <h2 class="resume-title">Informations sur le client</h2>
                <div class="description">
                    <p><strong>Nom : </strong>{{ client.nom }}</p>
                    <p><strong>Adresse : </strong>{{ client.adresse }}</p>
                    <p><strong>Code postal : </strong>{{ client.codePostal }}</p>
                    <p><strong>Téléphone : </strong>{{ client.phone }}</p>
                    <p><strong>Email : </strong>{{ client.email}}</p>
                    <p><strong>Permis de conduire : </strong>{{ client.permis_conduire }}</p>
                </div>
            </div>
            
            <div class="redirectionBtn">
                <a class="btn small" href="{{base}}/location/edit?id={{ location.id }}">Modifier</a>
                <a class="btn small" href="{{base}}/facture/create?id={{ location.id }}">Faire le paiement</a>
                <a class="btn small" href="{{base}}/location">Retour à la liste réservation</a>
            </div>

            <form action="{{base}}/location/delete" method="POST">
                <input type="hidden" name="id" value="{{ location.id }}">
                <input class="btn red" type="submit" value="Annuler">
            </form>
        </div>
    </article>
{{ include('layouts/footer.php')}} 