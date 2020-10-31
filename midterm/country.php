<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'world');
    $query = "SELECT * from country ORDER BY Name";

    $info = '';

    if(isset($_GET['continet'])){
        $filtered_cont = mysqli_real_escape_string($link, $_GET['continet']);
        $query = " SELECT * from country WHERE continent='{$filtered_cont}' ORDER BY Name";
    }



    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_array($result)){
        $info .= '<tr>';
        $info .= '<td>'.$row['Name'].'</td>';
        $info .= '<td>'.$row['Code'].'</td>';
        $info .= '<td>'.$row['Population'].'</td>';
        $info .= '<td>'.$row['Continent'].'</td>';
        $info .= '<td>'.$row['Region'].'</td>';
        $info .= '<td>'.$row['LifeExpectancy'].'</td>';
        $info .= '</tr>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> World DataBase </title>
</head>
<body>
    <h2><a href ="index.php">세계 정보</a> | 대륙별 국가 정보</h2>
    <form action = "country.php" method = "GET">
        <select name="continet">   
            <option value="">대륙 선택</option>
            <?php
                    $sql = "SELECT DISTINCT Continent FROM country
                    ORDER BY Continent;";
                    $result = mysqli_query($link, $sql);
                    while ($row2 = mysqli_fetch_array($result)){
                        print "<option value='".$row2['Continent']."' ";
                    
                        print ">".$row2['Continent']."</option>\n";
                    }
            ?>
        </select>
        <button type="submit">확인</button>
    </form>

    <br>
    <table border=1 cellspacing=0 cellpadding=5 style="text-align:center;">
        <tr>
            <th>국가명</th>
            <th>국가 코드</th>
            <th>총 인구수(명)</th>
            <th>대륙</th>
            <th>지역</th>
            <th>기대 수명(세)</th>
        </tr>
        <?= $info ?>
    </table>
</body>
</html>