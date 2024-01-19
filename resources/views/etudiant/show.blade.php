<!-- resources/views/etudiant/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'étudiant</title>
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

        p {
            margin-bottom: 10px;
        }

        p:last-child {
            margin-bottom: 0;
        }

        p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Détails de l'étudiant</h1>

    <p><strong>Nom:</strong> {{ $etudiant->nom }}</p>
    <p><strong>Prénom:</strong> {{ $etudiant->prenom }}</p>
    <p><strong>Sexe:</strong> {{ $etudiant->sexe }}</p>
    <p><strong>Filière:</strong> {{ $etudiant->filiere ? $etudiant->filiere->nom : 'Non défini' }}</p>
</body>
</html>
