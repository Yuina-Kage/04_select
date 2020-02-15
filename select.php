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

// 表示はされるが、これでは検索結果が取得できなかった
// $keyword = '%'.$keyword.'%';

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//   $keyword = $_GET['keyword'];
// }

// if  ($keyword == '') {
//   $sql = "SELECT * FROM animals";
//   $stmt = $dbh->prepare($sql);
//   $stmt->execute();
//   $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
// } else {
//   $sql = "SELECT * FROM animals WHERE description LIKE '%keyword%'";
//   $stmt = $dbh->prepare($sql);
//   $stmt->bindParam(":keyword", $keyword);
//   $stmt->execute();
//   $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $keyword = $_GET["keyword"];
  if  ($keyword == '') {
  $sql = "SELECT * FROM animals";
  $stmt = $dbh->prepare($sql);
} else {
  $sql2 = "SELECT * FROM animals WHERE description LIKE '%$keyword%'";
  $stmt = $dbh->prepare($sql2);
  $keyword = '%' . $keyword . '%';
  $stmt->bindParam(":keyword", $keyword);
}
  $stmt->execute();
  $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  <h2>本日のご紹介ペット！</h2>
  <p>
    <form action="" method="get">
      <label for="keyword">キーワード:
        <input type="text" name="keyword" placeholder="キーワードの入力">
      </label>
      <input type="submit" value="検索">
    </form> 
    <p> 
    <?php foreach ($animals as $animal) : ?>
      <?php echo $animal['type'] . 'の' . 
            $animal['classifaction'] . 'ちゃん<br>' .
            $animal['description'] . '<br>' .
            $animal['birthday'] . ' 生まれ<br>出身地 ' .
            $animal['birthplace'] . '' . '<hr>' ; ?>
    <?php endforeach; ?>
    </p>
  </p>
</body>
</html>