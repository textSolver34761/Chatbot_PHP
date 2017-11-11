<?php

try {
  require __DIR__.'/config.php';

  $pdo = new PDO('mysql:host=localhost;dbname=chatbot;charset=utf8', 'root', '');

  $pdo_statement = $pdo->prepare($sql);
} catch (PDOException $e) {
  echo 'erreur : ' . $e->getMessage();

  $pdo_statement = null;
}