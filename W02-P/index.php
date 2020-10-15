<?php
  $link = mysqli_connect('localhost', 'root', 'wlthd4524', 'music');
  $query = "SELECT * FROM playlist";
  $result = mysqli_query($link, $query);
  $list = "";
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href = \"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }
  $article = array(
    'title' => 'drive',
    'description' => 'pop song'
  );

  if(isset($_GET['id'])){
    $query = "SELECT * FROM playlist WHERE id = {$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>PLAYLIST</title>
</head>
<body>
  <h1><a href = "index.php">MY PLAYLIST</a></h1>
  <ol><?= $list?></ol>
  <a href = "create.php">create</a>
  <h2><?=$article['title']?></h2>
  <?=$article['description']?>
</body>
</html>
