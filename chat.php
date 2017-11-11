<?php

require __DIR__.'/model.php';
require __DIR__.'/intelligence.php';

// si je reçois des données de formulaire,
if (
    isset($_POST['message'])
){
    $Add_Message = Add_Message();

    // si la création a réussi,
    if ($Add_Message) {
        // rediriger vers le formulaire.php
        header('Location: /formulaire.php');
    }
}


//Si j'ai des données dans la bdd,
if (
    isset($_GET['message'])
){
    //alors, je vais les checher
    $Fetch_Message = Fetch_Message();

    //si la création a réussi,
    if ($Fetch_Message) {
        // rediriger vers le formulaire.php
        header('Location: /formulaire.php');
    }
}


//Si l'utilisateur écrit certains mots,
if(true){
    // alors je compare ce que l'utilisateur à écrit et un tableau de valeur (intelligence.php)
    $bonjour = IA_Bonjour();

    //si ce que l'utilisateur à écrit correspond à une des valeurs du tableau je renvoi "Bonjour"
    if($bonjour == $Fetch_Message){
        echo('Bonjour');
    } 
    // sinon, je ne fais rien
    else{
        print('');
    }
}

