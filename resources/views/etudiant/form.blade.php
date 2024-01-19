<!-- resources/views/etudiant/etudiant.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($etudiant) ? 'Modifier un étudiant' : 'Ajouter un étudiant' }}</title>
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

        form {
            width: 50%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        div {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>{{ isset($etudiant) ? 'Modifier un étudiant' : 'Ajouter un étudiant' }}</h1>

    <form action="{{ isset($etudiant) ? url('/etudiants/update/' . $etudiant->id) : url('/etudiants/insert') }}" method="post">

        @csrf

        @if(isset($etudiant))
            @method('PUT')
        @endif

        <label for="nom">Nom de l'étudiant:</label>
        <input type="text" name="nom" value="{{ old('nom', isset($etudiant) ? $etudiant->nom : '') }}">
        @error('nom')
            <div>{{ $message }}</div>
        @enderror

        <label for="prenom">Prénom de l'étudiant:</label>
        <input type="text" name="prenom" value="{{ old('prenom', isset($etudiant) ? $etudiant->prenom : '') }}">
        @error('prenom')
            <div>{{ $message }}</div>
        @enderror

        <label for="sexe">Sexe de l'étudiant:</label>
        <input type="text" name="sexe" value="{{ old('sexe', isset($etudiant) ? $etudiant->sexe : '') }}">
        @error('sexe')
            <div>{{ $message }}</div>
        @enderror

        <label for="filiere_id">Filière:</label>
        <select name="filiere_id">
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}" {{ isset($etudiant) && $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>
                    {{ $filiere->nom }}
                </option>
            @endforeach
        </select>

        <!-- Champ pour sélectionner l'utilisateur -->
        <label for="user_id">Utilisateur:</label>
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ isset($etudiant) && $etudiant->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} <!-- Assurez-vous d'ajuster le nom de l'attribut utilisateur en conséquence -->
                </option>
            @endforeach
        </select>
        <!-- Fin du champ pour sélectionner l'utilisateur -->

        <button type="submit">{{ isset($etudiant) ? 'Modifier' : 'Enregistrer' }}</button>
    </form>
</body>
</html>
