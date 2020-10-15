<?php 
    $link = mysqli_connect('localhost', 'admin','admin','employees');

    if(mysqli_connect_errno()){
        echo "Failed to connect to MariaDB: " . mysqli_connect_error();
        exit();
    }

    $emp_no = mysqli_real_escape_string($link, $_GET['emp_no']);
    $query = "
        SELECT e.emp_no, e.first_name, e.last_name, de.dept_name, t.title
        FROM employees e
        INNER JOIN dept_emp dp ON e.emp_no=dp.emp_no
        INNER JOIN departments de ON dp.dept_no=de.dept_no
        INNER JOIN titles t ON e.emp_no=t.emp_no
        WHERE e.emp_no=".$emp_no;

    $result = mysqli_query($link, $query);  

    $article = '';    
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["emp_no"];
        $article .= '</td><td>';
        $article .= $row["first_name"];
        $article .= '</td><td>';
        $article .= $row["last_name"];
        $article .= '</td><td>';
        $article .= $row["dept_name"];
        $article .= '</td><td>';
        $article .= $row["title"];
        $article .= '</td></tr>';
    }
    
    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 부서, 업무 정보</title>
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
    <h2><a href="index.php">직원 관리 시스템</a> | 부서, 업무 정보</h2>
    <table style = "text-align: center;">
        <tr>
            <th>emp_no</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>department</th>
            <th>title</th>
        </tr>        
        <?= $article ?> 
    </table>
</body>
</html>
