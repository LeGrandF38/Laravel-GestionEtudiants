<!-- resources/views/etudiant/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Liste des étudiants</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Filière</th>
            <th colspan="3"><a href="/etudiants/create">Ajouter</a></th>
        </tr>
        @foreach ($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->sexe }}</td>
                <td>{{ $etudiant->filiere ? $etudiant->filiere->nom : 'Non défini' }}</td>

                <td><a href="/etudiants/edit/{{ $etudiant->id }}">Modifier</a></td>
                <td><a href="/etudiants/delete/{{ $etudiant->id }}">Supprimer</a></td>
                <td><a href="/etudiants/show/{{ $etudiant->id }}">Afficher</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
