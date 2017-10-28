<?php

require_once  '../vendor/autoload.php';


$token_csfr = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',70)), 0 , 70);

$form = new ToolForm\ToolForm($token_csfr);


//Open the form
$form->FormPost('/' );

//Label of a input
$form->label('input or name: ');

//Input text
$form->inputText('cool');

//Bottom submit 
$form->submit(['value' => 'submit']);

//Close the form
$form->FormEnd();




