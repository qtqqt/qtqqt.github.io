<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php include 'connect.php';
if (!$conn) {
    die("не подключилось: " . mysqli_connect_error());
}
echo "ПОДКЛЮЧИЛОСЬ К БАЗЕ";?>
<p>ВСЯ ИНФОРМАЦИЯ ИЗ БД:</p>
<?php
$sql = "SELECT * FROM new.table1";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>name</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No data";
    }
} else{
    echo "ERROR:  $sql. " . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>