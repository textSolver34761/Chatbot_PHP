<?php

// Connexion à la base de données
function prepareStatement($sql) {
	require __DIR__.'/create-pdo.php';

    if($pdo){
        try{
            $pdo_statement = $pdo->prepare($sql);
        } catch (PDOException $e) {
          echo 'erreur : ' . $e->getMessage();
        }
	}  
    return $pdo_statement;
}

// Ajout d'un message à l'aide d'une requête préparée
function Add_Message($values){
	$pdo = prepareStatement('INSERT INTO message (message)
							VALUES(:message)');
	$Add_Message = $pdo->execute(array(
		message => $values['message']
	));
	return $Add_Message;
}

// Récupération des 100 derniers messages
function Fetch_Message() {
	$Fetch_Message = [];

	$pdo = prepareStatement('SELECT * FROM message ORDER BY ID DESC LIMIT 0, 100');
	$Fetch_Message = $pdo->fetchAll(PDO::FETCH_ASSOC);
	
	return $Fetch_Message;
}

// En fonction du msg de l'utilisateur, l'IA répondra "Bonjour"
function IA_Bonjour(){
    if(stristr($Fetch_Message, $bonjour) === true){
        foreach($bonjour as $value){
            echo('Bonjour');
        }
    }
}

// Redirection de l'utilisateur vers la page du formulaire.php
header('Location: formulaire.php');
?>