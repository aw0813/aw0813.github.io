<?php
  $link = mysqli_connect("localhost", "root", "wlthd4524", "music");
  $filtered = array(
       'genre' => mysqli_real_escape_string($link, $_POST['genre']),
       'division' => mysqli_real_escape_string($link, $_POST['division'])
   );
  $query = "
    INSERT INTO info
      (genre, division)
      VALUES (
      '{$filtered['genre']}',
      '{$filtered['division']}'
      )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관라자에게 문의하세요.';
    error_log(mysqli_error($link));
  } else {
    header('Location: info.php');
  }
?>
