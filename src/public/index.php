<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '../vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

try {

    $response = $client->get('https://api.adviceslip.com/advice');
    $data = json_decode($response->getBody(), true);

    $advice = $data['slip']['advice'] ?? 'Aucune donnée disponible pour advice';

} catch (Exception $e) {

    $advice = 'Une erreur s\'est produite lors de la récupération des conseils.';

    echo '<pre>';
    print_r($e);
    echo '</pre>';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advice Generator App</title>
</head>
<body>

    <h2><?= $advice ?></h2>

</body>
</html>
