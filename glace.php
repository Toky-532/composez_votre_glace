<?php
require_once 'fonctions.php';

// Déclaration des valeurs
//Checkbox (Array)
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
//Radio (String)
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
//Checkbox (Array)
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5,
];

// TITRE (PHP)
$title = "Composez votre glace";

// Définir les composants de la glace (parfums, cornet, suppléments) avec calcul autom.
$ingredients = [];
$total = 0;

if (isset($_GET['parfum'])) {                   // Array
    foreach ($_GET['parfum'] as $parfum) {
        if (isset($parfums[$parfum])) {
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}
if (isset($_GET['cornet'])) {                   // String
    $cornet = $_GET['cornet'];
    if (isset($cornets[$cornet])) {
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }
}
if (isset($_GET['supplement'])) {               // Array
    foreach ($_GET['supplement'] as $supplement) {
        if (isset($supplements[$supplement])) {
            $ingredients[] = $supplement;
            $total += $supplements[$supplement];
        }
    }
}
?>

<!-- Affichage HTML -->
<h1>Composer votre glace</h1>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <?php foreach ($ingredients as $ingredient) : ?>
                    <li><?= $ingredient ?></li>
                    <?php endforeach; ?>
                    <p>
                        <strong>Prix:</strong><?= $total ?> $
                    </p>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Formulaire PHP et HTML -->
<div class="row">
    <div class="col-lg-8">
        <form action="glace.php" method="GET">
            <h2>Choisissez vos parfums</h2>
            <?php foreach ($parfums as $parfum => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('parfum', $parfum, $_GET) ?> <!-- fonctions.php -->
                    <?= $parfum ?> - <?= $prix ?> $
                </label>
            </div>
            <?php endforeach; ?>

            <h2>Choisissez votre cornet</h2>
            <?php foreach ($cornets as $cornet => $prix) : ?>
            <div class="radio">
                <label>
                    <?= radio('cornet', $cornet, $_GET) ?> <!-- fonctions.php -->
                    <?= $cornet ?> - <?= $prix ?> $
                </label>
            </div>
            <?php endforeach; ?>

            <h2>Choisissez vos suppléments </h2>
            <?php foreach ($supplements as $supplement => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('supplement', $supplement, $_GET) ?> <!-- fonctions.php -->
                    <?= $supplement ?> - <?= $prix ?> $
                </label>
            </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary">Composez ma glace</button>
        </form>
    </div>
</div>

<?php

?>