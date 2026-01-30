<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bibliothécaire Dashboard</title>

    @vite([
        'resources/css/bibliothecaire.css',
        'resources/js/bibliothecaire.js'
    ])

</head>

<body>
    <div class="container">
        <h1>Bibliothécaire Dashboard</h1>

        <!-- Section: Ajouter Emprunt -->
        <section class="add-section">
            <h2>Ajouter un Emprunt</h2>
            <form id="empruntForm" method="POST" action="">
                @csrf

                <!-- Choisir Adhérent -->
                <select name="user_id" required>
                    <option value="">Choisir un Adhérent</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }}</option>
                    @endforeach
                </select>

                <!-- Choisir Ouvrage -->
                <select name="exemplaire_id" required>
                    <option value="">Choisir un exemplaire</option>
                    @foreach($ouvrages as $ouvrage)
                        <option value="{{ $ouvrage->id }}">
                            {{$ouvrage->titre }}
                        </option>
                    @endforeach
                </select>

                <!-- Date d’emprunt -->
                <input type="date" name="dateemprunt" value="{{ date('Y-m-d') }}" required>

                <!-- Date de retour -->
                <input type="date" name="dateretour">

                <button type="submit">Ajouter Emprunt</button>
            </form>
        </section>

        <!-- Section: Ajouter Ouvrage -->
        <section class="add-section">
            <h2>Ajouter un Ouvrage</h2>
            <form id="ouvrageForm" method="POST" action="{{ route('ouvrages.store') }}">
                @csrf
                <input type="text" name="titre" placeholder="Titre du livre" required>
                <input type="text" name="auteur" placeholder="Auteur" required>
                <select name="categorie_id" required>
                    <option value="">Choisir une catégorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
                <input type="number" name="nbrexemplaires" placeholder="Nombre d'exemplaires" required>
                <button type="submit">Ajouter</button>
            </form>
        </section>

        <!-- Section: Ajouter Adherent -->
        <section class="add-section">
            <h2>Ajouter un Adhérent</h2>
            <form id="adherentForm" method="POST" action="{{ route('adherents.store') }}">
                @csrf
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prénom" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit">Ajouter</button>
            </form>
        </section>

        <!-- Section: Liste des Ouvrages -->
        <section class="list-section">
            <h2>Liste des Ouvrages</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Catégorie</th>
                        <th>Exemplaires</th>
                    </tr>
                </thead>
                <tbody id="ouvragesTable">
                    @foreach($ouvrages as $ouvrage)
                        <tr>
                            <td>{{ $ouvrage->id }}</td>
                            <td>{{ $ouvrage->titre }}</td>
                            <td>{{ $ouvrage->auteur }}</td>
                            <td>{{ $ouvrage->categorie->nom }}</td>
                            <td>{{ $ouvrage->nbrexemplaires }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="list-section">
            <h2>Liste des Adhérents</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="adherentsTable">
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->adherent->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>