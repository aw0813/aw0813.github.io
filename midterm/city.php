<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'world');
    $query = "SELECT * from city WHERE countrycode='kor'";
    // if(isset($_POST['emp_no'])){
    //     $filtered_id = mysqli_real_escape_string($link, $_POST['emp_no']);
    //     $query = " SELECT * FROM employees WHERE emp_no <='{$filtered_id}' order by emp_no desc limit 10";
    // }



    $result = mysqli_query($link, $query);
    
    $city = '';
    while($row = mysqli_fetch_array($result)){
        $city .= '<tr>';
        $city .= '<td>'.$row['Name'].'</td>';
        $city .= '<td>'.$row['Population'].'</td>';
        $city .= '<td>'.$row['District'].'</td>';
        $city .= '</tr>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> World DataBase </title>
</head>
<body>
    <h2><a href ="index.php">세계 정보</a> | 도시별 인구수</h2>

    <!-- <form action = "emp_select.php" method = "POST">
        <label>직원 번호 : </label>
        <input type="text" name="emp_no" placeholder="직원 번호">
        <button type="submit">확인</button>
        <br>
    </form> -->

    <br>
    <table border=1 cellspacing=0 cellpadding=5 style="text-align:center;">
        <tr>
            <th>도시명</th>
            <th>인구수</th>
            <th>행정 구역/th>
        </tr>
        <?= $city ?>

    </table>
</body>
</html>