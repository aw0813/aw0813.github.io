<?php
  $link = mysqli_connect("localhost", "root", "wlthd4524", "music");
  $filtered = array(
       'title' => mysqli_real_escape_string($link,$_POST['title']),
       'description' => mysqli_real_escape_string($link, $_POST['description']),
       'info_id' => mysqli_real_escape_string($link, $_POST['info_id'])
   );
  $query = "
    INSERT INTO playlist
      (title, description, created, info_id)
      VALUES (
      '{$filtered['title']}',
      '{$filtered['description']}',
      now(),
      '{$filtered['info_id']}'
        )
  ";

  $result = mysqli_multi_query($link, $query);
  if($result == false){
    echo '저장하는 과정에서 문제가 발생했습니다. 관라자에게 문의하세요.';
    error_log(mysqli_error($link));
  } else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
?>
