 <?php
  $link = mysqli_connect('localhost','root','wlthd4524','music');
  $query = "SELECT * FROM playlist";
  $result = mysqli_query($link, $query);
  $list ='';

  while ($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }
  $article = array(
    'title' => 'My PLAYLIST',
    'description' => 'PLAYING...'
  );

  $update_link = '';
  $delete_link = '';
  $info = '';

  if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM playlist LEFT JOIN info ON playlist.info_id = info.id WHERE playlist.id={$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    //print_r($row);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['genre'] = htmlspecialchars($row['genre']);

    $update_link = '<a href="update.php?id='.$filtered_id.'">update</a>';
    $delete_link = '
      <form action="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
      ';
    $info = "<p>장르 : {$article['genre']} </p>";
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>My PLAYLIST</title>
   </head>
   <body>
     <h1><a href="index.php">My PLAYLIST</a></h1>
     <a href="info.php">music info</a>
     <ol><?= $list ?></ol>
     <a href="create.php">create</a>
     <?= $update_link ?>
     <?= $delete_link ?>
     <h2><?= $article['title'] ?></h2>
     <?= $article['description'] ?>
     <?= $info ?>
   </body>
 </html>
