<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'world');
    $query = "SELECT * from city where countrycode='kor'";

    $city = '';
    $country = 'South Korea';

    if(isset($_GET['code'])){
        $filtered_city = mysqli_real_escape_string($link, $_GET['code']);
        $query = " SELECT * from city WHERE countrycode='{$filtered_city}'";
        $country_q = "SELECT Name from country WHERE code='{$filtered_city}'";
        $country_r = mysqli_query($link, $country_q);
        $country_row = mysqli_fetch_array($country_r);
        $country = $country_row['Name'];
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


    <form action = "city.php" method = "GET">
        <select name="code">   
            <option value="">국가 선택</option>
            <?php
                    $sql = "SELECT DISTINCT a.Name, a.Code FROM country a
                    LEFT JOIN city b
                            ON a.Code = b.CountryCode
                    ORDER BY a.Name;";
                    $result = mysqli_query($link, $sql);
                    while ($row2 = mysqli_fetch_array($result)){
                        print "<option value='".$row2['Code']."' ";
                    
                        print ">".$row2['Name']."</option>\n";
                    }
            ?>
        </select>
        <button type="submit">확인</button>
    </form>

    <br>
    <table border=1 cellspacing=0 cellpadding=5 style="text-align:center;">
        <caption><?=$country?></caption>
        <tr>
            <th>도시명</th>
            <th>인구수</th>
            <th>행정 구역</th>
        </tr>
        <?= $city ?>
    </table>
</body>
</html>