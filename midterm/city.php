<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'world');
    $query = "SELECT * from city WHERE countrycode='kor'";

    $city = '';

    if(isset($_GET['code'])){
        $filtered_city = mysqli_real_escape_string($link, $_GET['code']);
        $query = " SELECT * from city WHERE countrycode='{$filtered_city}'";
    }



    $result = mysqli_query($link, $query);

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

    <!-- <form action = "city.php" method = "POST">
        <select name="country">
            <option value="">국가 선택</option>
            <option value="<?= $code ?>"><?= $country ?></option>
        </select>
        <button type="submit">확인</button>
    </form> -->

    <form action = "city.php" method = "GET">
        <select name="code">   
            <option value="">국가 선택</option>
            <?php
                    $sql = "SELECT DISTINCT a.Name, a.Code FROM country a
                    LEFT JOIN city b
                            ON a.Code = b.CountryCode;";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)){
                        print "<option value='".$row['Code']."' ";
                    
                        print ">".$row['Name']."</option>\n";
                    }
            ?>
        </select>
        <button type="submit">확인</button>
    </form>

    <br>
    <table border=1 cellspacing=0 cellpadding=5 style="text-align:center;">
        <tr>
            <th>도시명</th>
            <th>인구수</th>
            <th>행정 구역</th>
        </tr>
        <?= $city ?>

    </table>
</body>
</html>