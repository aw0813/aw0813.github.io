<?php
    $link = mysqli_connect('localhost', 'root', 'wlthd4524', 'music');

    $query = "SELECT * FROM info";
    $result = mysqli_query($link, $query);
    $info_info = '';

    while ($row = mysqli_fetch_array($result)) {
      $filtered = array(
        'id' => htmlspecialchars($row['id']),
        'genre' => htmlspecialchars($row['genre']),
        'division' => htmlspecialchars($row['division'])
      );
      $info_info .= '<tr align = "center" bgcolor="#ECEBFF">';
      $info_info .= '<td>'.$filtered['id'].'</td>';
      $info_info .= '<td>'.$filtered['genre'].'</td>';
      $info_info .= '<td>'.$filtered['division'].'</td>';
      $info_info .= '<td><a href="info.php?id='.$filtered['id'].'">update</a></td>';
      $info_info .=
      '<td>
        <form action="process_delete_info.php" method="post">
          <input type="hidden" name="id" value="'.$filtered['id'].'">
          <input type="submit" value="delete">
        </form>
      </td>';

      $info_info .= '</tr>';
    };

    $escaped = array(
      'genre' => '',
      'division' => ''
    );

    $form_action = 'process_create_info.php';
    $label_submit = 'Create info';
    $form_id ='';

    if(isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      settype($filtered_id, 'integer');
      $query = "SELECT * FROM info WHERE id = {$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped['genre'] = htmlspecialchars($row['genre']);
      $escaped['division'] = htmlspecialchars($row['division']);

      $form_action = 'process_update_info.php';
      $label_submit = 'Update info';
      $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
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
        <p><a href="index.php">playlist</a></p>

        <table border=1 cellspacing=0 cellpadding=10 style="text-align:center;">
          <tr align = "center" bgcolor="#DAD9FF">
            <th>id</th>
            <th>genre</th>
            <th>division</th>
            <th>update</th>
            <th>delete</th>
          </tr>

          <?= $info_info ?>
        </table>
        <br>
        <form action="<?= $form_action ?>" method="post">
          <?=$form_id?>
          <label for="fname">genre:</label><br>
          <input type="text" id="genre" name="genre" placeholder="genre" value="<?=$escaped['genre']?>"><br>
          <label for="lname">division:</label><br>
          <input type="text" id="division" name="division" placeholder="division" value="<?=$escaped['division']?>"><br><br>
          <input type="submit" value="<?=$label_submit?>">
        </form>
    </body>
</html>
