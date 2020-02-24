<?php

require "config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("new.sql");
    $connection->exec($sql);

    echo "БАЗА СОЗДАНА";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * 
            FROM table1
            WHERE name = 'misha'";

    $location = 1;
    $statement = $connection->prepare($sql);
    $statement->bindParam(':name', $location, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<p>ВЫВОД ИЗ БАЗЫ:</p>
<?php foreach ($result as $row) : ?>

    <p><?php echo  $row["id"] . " " . $row["name"]; ?></p>
<?php endforeach; ?>