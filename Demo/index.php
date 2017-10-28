<?php

require_once  '../vendor/autoload.php';


$token_csfr = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',70)), 0 , 70);

$form = new ToolForm\ToolForm($token_csfr);

$form->FormPost('/' );
$form->label('input or name: ');
$form->inputText('name');
$form->submit(['value' => 'submit']);
$form->FormEnd();




