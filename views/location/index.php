{{ include('layouts/header.php', {title: 'location index'})}} 
    <h1>Liste des Réservations</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client_id</th>
                    <th>Voiture_id</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Montant ($CAD)</th>
                    <th>Statut</th>
                  
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
             {% for reservation in location %}
                <tr>
                    <td>{{reservation.id}}</td>
                    <td>{{reservation.client_id}}</td>
                    <td>{{reservation.voiture_id}}</td>
                    <td>{{reservation.dateDebut}}</td>
                    <td>{{reservation.dateFin}}</td>
                    <td>{{reservation.montant}}</td>
                    <td>{{reservation.statut}}</td>
                   
                    <td>
                        <a href="{{base}}/location/view?id={{reservation.id}}">View</a>
                    </td>
                </tr>
              {% endfor %}
            </tbody>
        </table>
        <a class="btn small" href="{{base}}/client">Voir la liste des clients</a>
{{ include('layouts/footer.php')}} 