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

    <!-- ================= Ajouter un Emprunt ================= -->
    <section class="add-section">
        <h2>Ajouter un Emprunt</h2>

        <form id="empruntForm" method="POST" action="">
            @csrf

            <div class="form-group">
                <label>Adhérent</label>
                <select name="user_id" required>
                    <option value="">Choisir un Adhérent</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->nom }} {{ $user->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Exemplaire</label>
                <select name="exemplaire_id" required>
                    <option value="">Choisir un exemplaire</option>
                    @foreach($ouvrages as $ouvrage)
                        <option value="{{ $ouvrage->id }}">
                            {{ $ouvrage->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Date d'emprunt</label>
                    <input type="date" name="dateemprunt" value="{{ date('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label>Date de retour</label>
                    <input type="date" name="dateretour">
                </div>
            </div>

            <button type="submit">Ajouter Emprunt</button>
        </form>
    </section>

    <!-- ================= Ajouter un Ouvrage ================= -->
    <section class="add-section">
        <h2>Ajouter un Ouvrage</h2>

        <form id="ouvrageForm" method="POST" action="{{ route('ouvrages.store') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="titre" placeholder="Titre du livre">
                @error('titre')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="auteur" placeholder="Auteur">
                @error('auteur')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <select name="categorie_id">
                    <option value="">Choisir une catégorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <input type="number" name="nbrexemplaires" placeholder="Nombre d'exemplaires">
            </div>

            <button type="submit">Ajouter Ouvrage</button>
        </form>
    </section>

    <!-- ================= Ajouter un Adhérent ================= -->
    <section class="add-section">
        <h2>Ajouter un Adhérent</h2>

        <form id="adherentForm" method="POST" action="{{ route('adherents.store') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="nom" placeholder="Nom" required>
            </div>

            <div class="form-group">
                <input type="text" name="prenom" placeholder="Prénom" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <button type="submit">Ajouter Adhérent</button>
        </form>
    </section>

    <!-- ================= Liste des Ouvrages ================= -->
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
            <tbody>
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

    <!-- ================= Liste des Adhérents ================= -->
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
            <tbody>
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
