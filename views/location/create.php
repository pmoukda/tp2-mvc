{{ include('layouts/header.php', {title: 'location create'})}} 
    <h1>Formulaire de Réservation</h1>
        <form action="{{base}}/location/store" method="POST">
            <fieldset>
                <legend>Détail sur le véhicule</legend>
                <input type="hidden" name="voiture_id" value="{{voiture.id}}">
                <input type="hidden" id="prixJournalier" value="{{ voiture.prixJournalier }}">

                <!-- Affichage des infos voiture -->
                <img src="{{asset}}img/{{ voiture.images}}" alt="voitures">
                <div class="description">
                    <p><strong>Marque : </strong>{{ voiture.marque }}</p>
                    <p><strong>Modèle : </strong>{{ voiture.modele }}</p>
                    <p><strong>Année : </strong>{{ voiture.annee }}</p>
                    <p><strong>Couleur : </strong>{{ voiture.couleur }}</p>
                    <p><strong>Transmission : </strong>{{ voiture.transmission }}</p>
                    <p><strong>Passagers : </strong>{{voiture.nombrePassager}}</p>
                    <p><strong>Prix journalier : </strong>{{voiture.prixJournalier | number_format(2, '.', ',')}} $</p>
                </div>
            </fieldset>
           
              <!--  formulaire location -->
            <fieldset>
                <legend>Détails de la Location</legend>
                <input type="hidden" id="location-id" value="{{ location.id}}">

                <label for="dateDebut">Date de début :</label>
                <input type="date" id="dateDebut" name="dateDebut" value="{{location.dateDebut}}">
                {% if errors.dateDebut is defined %}
                    <span class="error">{{errors.dateDebut}}</span>
                 {% endif %}

                <label for="dateFin">Date de fin :</label>
                <input type="date" id="dateFin" name="dateFin" value="{{location.dateFin}}">
                {% if errors.dateFin is defined %}
                    <span class="error">{{errors.dateFin}}</span>
                {% endif %}

                <label for="montant">Montant ($CAD) :</label>
                <input type="number" id="montant" name="montant" value="{{location.montant}}" readonly>
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
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" value="{{client.nom}}">
                {% if errors.nom is defined %}
                    <span class="error">{{errors.nom}}</span>
                {% endif %}
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse"  placeholder="Votre adresse" value="{{client.adresse}}">
                 {% if errors.adresse is defined %}
                    <span class="error">{{errors.Adresse}}</span>
                {% endif %}
                <label for="codePostal">Code Postal :</label>
                <input type="text" id="codePostal" name="codePostal"  placeholder="Votre code postal" value="{{client.codepostal}}">
                 {% if errors.codePostal is defined %}
                    <span class="error">{{errors.codePostal}}</span>
                {% endif %}
                <label for="phone">Téléphone :</label>
                <input type="tel" id="phone" name="phone"  placeholder="Votre téléphone" value="{{client.phone}}">
                 {% if errors.phone is defined %}
                    <span class="error">{{errors.phone}}</span>
                {% endif %}
                <label for="email">Email :</label>
                <input type="email" id="email" name="email"  placeholder="Votre courriel" value="{{client.email}}">
                 {% if errors.email is defined %}
                    <span class="error">{{errors.email}}</span>
                {% endif %}
                <label for="permis_conduire">Permis de conduire :</label>
                <input type="text" id="permis_conduire" name="permis_conduire" placeholder="Votre permis" value="{{client.permi_conduire}}">
                 {% if errors.permis_conduire is defined %}
                    <span class="error">{{errors.permis_conduire}}</span>
                {% endif %}
            </fieldset>
            <input class="btn form" type="submit" value="Réserver">
        </form>

    <!-- Script pour le calcul du montant -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dateDebutInput = document.getElementById('dateDebut');
    const dateFinInput = document.getElementById('dateFin');
    const montantInput = document.getElementById('montant');
    const prixJournalier = parseFloat(document.getElementById('prixJournalier').value);

    function calculerMontant() {
        const dateDebut = new Date(dateDebutInput.value);
        const dateFin = new Date(dateFinInput.value);

        if (dateDebutInput.value && dateFinInput.value && dateFin >= dateDebut) {
            const diffTime = dateFin.getTime() - dateDebut.getTime();
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            const total = diffDays * prixJournalier;
            montantInput.value = total.toFixed(2);
        } else {
            montantInput.value = '';
        }
    }

    dateDebutInput.addEventListener('change', calculerMontant);
    dateFinInput.addEventListener('change', calculerMontant);
});
</script>

{{ include('layouts/footer.php')}} 