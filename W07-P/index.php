<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>
<body>
    <h1>직원 관리 시스템</h1>
    <a href = "emp_select.php">(1) 직원 정보 조회</a> <br>
    <a href = "emp_insert.php">(2) 신규 직원 등록</a> <br>
    <form action = "emp_update.php" method = "POST">
    (3) 직원 정보 수정 : 
    <br>
    <input type="text" name="emp_no" placeholder="emp_no">
    <input type="submit" value="Search">
    </form>

    <form action = "emp_delete.php" method = "POST">
    (4) 직원 정보 삭제 :
    <br>
    <input type="text" name="emp_no" placeholder="emp_no">
    <input type="submit" value="Delete">
    </form>

    <form action="salary_info.php" method="GET">
    (5) 연봉 정보: 
    <br>
    <input type="text" name="number" placeholder="number">
    <input type="submit" value="Search">
    </form>

    <form action="emp_info.php" method="GET">
    (6) 직원 부서, 연봉 조회: 
    <br>
    <input type="text" name="emp_no" placeholder="직원 번호를 입력하세요">
    <input type="submit" value="Search">
    </form>

</body>
</html>