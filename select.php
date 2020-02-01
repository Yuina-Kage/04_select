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

$keyword = $_GET["keyword"];
$keyword = '%'.$keyword.'%';

if ("REQUEST_METHOD" === "GET") {
  $keyword = $_GET["keyword"];
  echo 'キーワードを変数に代入';
} elseif ($empty === $keyword) {
  $sql = "selct * from animals";
  echo '変数[$keyword]は空です';
} elseif ($empty !== $keyword) {
  "SELECT * FROM [animls] WHERE [description] LIKE :keyword";
  echo '変数[$keyword]は空ではありません';
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
  foreach ()
  
  </p>
</body>
</html>




