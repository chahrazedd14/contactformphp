<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';
require_once './db.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['name','email'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('title')->maxLength(3000);
$validator->field('Référence')->maxLength(3000);
$validator->field('title')->maxLength(3000);
$validator->field('message')->maxLength(6000);
$validator->field('phone')->areRequired();

$pp->attachFiles(['image' ,'cv']);


$pp->sendEmailTo('shera.mng@gmail.com'); // ← Your email here

echo $pp->process($_POST);

 
 


?>







