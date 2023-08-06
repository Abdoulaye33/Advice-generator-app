<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use GuzzleHttp\Client;

require_once __DIR__ . '/../vendor/autoload.php';


$client = new Client();

try {

    $response = $client->get('https://api.adviceslip.com/advice');
    $data = json_decode($response->getBody(), true);

    $advice = $data['slip']['advice'] ?? 'Aucune donnée disponible pour advice';
    $adviceId = $data['slip']['id'] ?? 'Aucune donnée disponible pour slip > id';

} catch (Exception $e) {

    $advice = 'Une erreur s\'est produite lors de la récupération des conseils.';

    echo '<pre>';
    print_r($e);
    echo '</pre>';

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Advice Generator App</title>
</head>
<body>

    <div>
        <div>
            <strong>ADVICE #<?= $adviceId ?></strong>

            <h2><?= $advice ?></h2>

            <img src="pattern-divider-desktop.svg" alt="" srcset="" class="desktop">
            <img src="pattern-divider-mobile.svg" alt="" class="mobile">

            <form method="post">
                <button type="submit">
                <img src="icon-dice.svg" alt="" srcset="">
                </button>
            </form>
        </div>
    </div>

</body>
</html>
