<?php 
    $link = mysqli_connect('localhost', 'admin','admin','employees');

    if(mysqli_connect_errno()){
        echo "Failed to connect to MariaDB: " . mysqli_connect_error();
        exit();
    }

    $query = "
        SELECT *
        FROM salaries
        ORDER BY salary DESC
        LIMIT 10
    ";

    $result = mysqli_query($link, $query);  

    $article = '';    
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["emp_no"];
        $article .= '</td><td>';
        $article .= $row["salary"];
        $article .= '</td><td>';
        $article .= $row["from_date"];
        $article .= '</td><td>';
        $article .= $row["to_date"];
        $article .= '</td></tr>';
    }
    
    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>연봉 정보</title>
    <style>
        body {
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 연봉 정보</h2>
    <table>
        <tr>
            <th>emp_no</th>
            <th>salary</th>
            <th>from_date</th>
            <th>to_date</th>
        </tr>        
        <?= $article ?> 
    </table>
</body>
</html>
