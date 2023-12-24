<?php
// On récuper la connexion via e ficher dbConnect.php

require_once 'dbConnect.php';
// On écrit notre requête SQL pour récuper les lignes qui nous intéresse
$req = 'SELECT * FROM t_stagiaire';
// on établit notre reqête à la bdd et on exécute la reqête
$sth = $dbh->query($req);

// on récuper un résultat dans un tableau à la fois association et indexé
// https://www.php.net/manual/fr/pdosstatments.fetchall.php
$rows = $sth->fetchAll();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Accueil CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <!-- On affiche le résultat dans un tableau -->
    <h1 class="text-center mt-3">List des stagiaires en formation</h1>
    <table class="table" border="1">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Adresse</th>
            <th scope="col">CP</th>
            <th scope="col">Ville</th>
            <th scope="col">Id Formation</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
        <tbody>
            <?php
            // on boucle $rows [0] as $row
            foreach ($rows as $row) {
                echo "<tr class='text-center'>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["prenom"] . "</td>";
                echo "<td>" . $row["nom"] . "</td>";
                echo "<td>" . $row["adresse"] . "</td>";
                echo "<td>" . $row["cp"] . "</td>";
                echo "<td>" . $row["ville"] . "</td>";
                echo "<td>" . $row["idF"] . "</td>";
                echo '<td><a href="actions.php?a=r&id=' . $row["id"] . '" class="btn btn-info"><i class="bi bi-eye-fill"></i></a></td>';
                echo '<td><a href="actions.php?a=u&id=' . $row["id"] . '" class="btn btn-warning"><i class=" bi bi-pencil-fill"></i></a></td>';
                echo '<td><a href="actions.php?a=d&id=' . $row["id"] . '" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>';
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="create">
        <a href="actions.php?a=c&id=" class="btn btn-outline-success">Créer un nouveau stagiaire</a>
    </div>


</body>

</html>