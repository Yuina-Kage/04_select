<?php

define ('DSN','mysql:host=mysql;dbname=pet_shop;charset=utf8;');
define('USER', 'staff');
define('PASSWORD', '9999');

try {
  $dbh = new PDO(DSN,USER,PASSWORD);
  echo '' . '<br>';
} catch(PDOException $e) {
  echo $e->getMessage();
  exit;
}

$sql = "select * from animals";

$stmt = $dbh->prepare($sql);

$stmt->execute();

$animals = $stmt->fetchALL(PDO::FETCH_ASSOC);

foreach ($animals as $animal) {
  echo $animal['type'] . 'の';
  echo $animal['classifaction'] . 'ちゃん<br>';
  echo $animal['description'] . '<br>';
  echo $animal['birthday'] . '生まれ<br>出身地';
  echo $animal['birthplace'] . '';
  echo $animal[''] . '<hr>';
}


