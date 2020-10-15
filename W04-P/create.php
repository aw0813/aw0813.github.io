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
  if(isset($_GET['id'])) {
    $query = "SELECT * FROM playlist WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
  }

  $query = "SELECT * FROM info";
  $result = mysqli_query($link, $query);
  $select_form = '<select name="info_id">';
  while($row = mysqli_fetch_array($result)) {
    $select_form .= '<option value="'.$row['id'].'">'.$row['genre'].'</option>';
  }
  $select_form .= '</select>';

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>My PLAYLIST</title>
   </head>
   <body>
     <h1><a href="index.php">My PLAYLIST</a></h1>
     <ol><?= $list ?></ol>
     <form action="process_create.php" method="POST">
       <p><input type="text" name="title" placeholder="title"></p>
       <p><textarea name="description" placeholder="description"></textarea></p>
       <?= $select_form ?>
       <p><input type="submit"></p>
     </form>
   </body>
 </html>
