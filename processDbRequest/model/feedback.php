<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['type']) && isset($_POST['feedback'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $feedback = $_POST['feedback'];
}

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

// $domain = "sandboxe6a5fd16c3d24bb799cb9608b0533b69.mailgun.org";
// $API_KEY = $_ENV['MAILGUN_API_KEY'];
// $API_URL = 'https://api:#' . $API_KEY . '@api.mailgun.net/v2/' . $domain;

use Mailgun\HttpClient\HttpClientConfigurator;
use Mailgun\Hydrator\NoopHydrator;

$configurator = new HttpClientConfigurator();
$configurator->setEndpoint('http://bin.mailgun.net/115a10f9');
$configurator->setApiKey('55e53a8481de135f576622c8e77ab83c-30b9cd6d-b4290394');
$configurator->setDebug(true);

$mg = new Mailgun($configurator, new NoopHydrator());
$mg->messages()->send('example.com', [
  'from'    => 'meganthong@outlook.com',
  'to'      => 'megan.thong.2020@scis.smu.edu.sg',
  'subject' => 'The PHP SDK is awesome!',
  'text'    => 'It is so simple to send a message.'
]);
# Instantiate the client.
// $mgClient = Mailgun::create($API_KEY, $API_URL);
// $params = array(
//   'from'    => $name . '<' . $email . '>',
//   'to'      => 'intern.fyi.contact@gmail.com',
//   'subject' => $type,
//   'text'    => $feedback
// );

# Make the call to the client.
// $sent = $mgClient->messages()->send($domain, $params);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <title>Feedback Submission Status</title>
  </head>
  <body>
    <?php
if ($sent) {
    echo "<script>alert('Feedback submitted successfully!')
    window.location.assign('../../HTML/feedback.php')
    </script>";
    exit;
} else {
    echo "<script>console.log('Feedback was not successful')</script>";
    exit;
}
?>
</body>
</html>