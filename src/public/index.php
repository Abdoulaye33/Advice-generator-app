<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advice Generator App</title>
</head>
<body>

    <?php 

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        use GuzzleHttp\Client;

        require '../vendor/autoload.php';



        $client = new Client();
        $response = $client->get('https://api.adviceslip.com/advice');
        $data = json_decode($response->getBody(), true);

        echo '<pre>';
        print_r($data);
        echo '</pre>';

        if (isset($data['slip']['advice'])) {
            echo '<h2>' . $data['slip']['advice'] . '</h2>';
        } else {
            echo 'Aucune donnée disponible';
        }

    ?>

</body>
</html>
