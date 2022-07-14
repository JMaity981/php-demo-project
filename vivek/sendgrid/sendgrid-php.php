<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'vendor/autoload.php';
require 'lib/SendGrid.php';


$sendgrid = new SendGrid('sri@c-freight.com', 'LastMile99@');
$email = new SendGrid\Email();
$email
    ->addTo('noman@metaabstraxion.com')
    ->setFrom('info@gle-go.com')
    ->setSubject('Subject goes here')
    ->setText('Hello World!')
    ->setHtml('<strong>Hello World!</strong>')
;

$sendgrid->send($email);

// Or catch the error

try {
    $sendgrid->send($email);
} catch(\SendGrid\Exception $e) {
    echo $e->getCode();
    foreach($e->getErrors() as $er) {
        echo $er;
    }
}
?>