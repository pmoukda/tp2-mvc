{{ include('layouts/header.php', {title: 'location create'})}} 
    <h1>Liste des Clients</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresses</th>
                        <th>Code Postal</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Permis</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
               {% for client in clients %}
                    <tr>
                        <td>{{client.nom}}</td>
                        <td>{{client.adresse}}</td>
                        <td>{{client.codePostal}}</td>
                        <td>{{client.phone}}</td>
                        <td>{{client.email}}</td>
                        <td>{{client.permis_conduire}}</td>
                        <td>
                            <a href="{{base}}/client/view.php?id={{client.id}}">View</a>
                        </td>
                    </tr>
                  {% endfor %}
                </tbody>
            </table>
            <a  class="btn small" href="{{base}}/voiture">Faire une réservation</a>
{{ include('layouts/footer.php')}}             