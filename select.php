<?php

define ('DSN','mysql:host=mysql;dbname=pet_shop;charset=utf8;');
define('USER', 'staff');
define('PASSWORD', '9999');

try {
  $dbh = new PDO(DSN,USER,PASSWORD);
} catch(PDOException $e) {
  echo $e->getMessage();
  exit;
}

$keyword = '%'.$keyword.'%';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $keyword = $_GET["keyword"];
  $sql = "select * from animals where status = 'notyet'";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

  //   if ( empty($keyword) ) {
  //     $sql = "insert into tasks (animals, created_at, updated_at) values (:animals, now(), now())";
  //   $stmt->bindParam(":animals", $animals);

  // } else {
  // SELECT * FROM [animls] WHERE [description] LIKE :keyword;
  

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ペットショップ</title>
</head>
<body>
  <h1>本日のご紹介ペット！</h1>
  <p>
    <form action="" method="get">
      <label for="keyword">キーワード:
        <input type="text" name="keyword" placeholder="キーワードの入力">
      </label>
      <input type="submit" value="検索">
    </form>
    
    <?php 
    foreach ($animals as $animal) 
    {
      echo $animal['type'] . 'の' .
      $animal['classifaction'] . 'ちゃん<br>' . 
      $animal['description'] . '<br>' . 
      $animal['birthday'] . ' 生まれ<br>出身地 ' . 
      $animal['birthplace'] . '' . '<hr>';  
    }
    ?>  
  
  </p>
</body>
</html>