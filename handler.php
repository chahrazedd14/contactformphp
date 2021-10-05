<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
include './vendor/autoload.php';
// require_once get_stylesheet_directory() .'/db.php';

include "../../../wp-load.php";



use FormGuide\Handlx\FormHandler;





$name = $_POST['nom'];
$email = $_POST['E-mail'];
$phone = $_POST['numéro_de_téléphone'];
$Référence = $_POST['Référence'];
$Title = $_POST['Titre_de_poste'];
$image = $_FILES['motivation']['name'];
$cv = $_FILES['CV']['name'];
$message = $_POST['message'];
 



global $wpdb;


$wpdb->insert('wp_contact_info_form', array(
    'name' => $name,
    'email' => $email,
    'phone' => $phone, // ... and so on
    'Référence' => $Référence,
    'Title' => $Title,
    'image' => $image,
    'cv'  => $cv,
    'message' => $message,

));

$dataxx = $wpdb->get_results("SELECT * FROM wp_recmmv_postmeta  WHERE meta_key = '_application' AND `post_id` = '$Référence' ORDER BY post_id DESC LIMIT 1 ");



$pp = new FormHandler($Title); 

$validator = $pp->getValidator();
$validator->fields(['nom','E-mail'])->areRequired()->maxLength(50);
$validator->field('E-mail')->isEmail();
$validator->field('Titre de poste')->maxLength(3000);
$validator->field('Référence')->maxLength(3000);

$validator->field('message')->maxLength(6000);
//$validator->field('numéro de téléphone')->areRequired();

$pp->attachFiles(['motivation' ,'CV']);


$pp->sendEmailTo($dataxx[0]->meta_value); // ← Your email here

//$pp->sendEmailTo($email);

echo $pp->process($_POST);


?>
