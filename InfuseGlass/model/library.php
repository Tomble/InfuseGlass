<?php
function do_sql($sql_string) {
    $connection = new PDO("mysql:host=localhost;dbname=infuseglass", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $row_result = $connection->query($sql_string);
    } catch (PDOException $Exception) {
        echo $sql_string . '</br>';
        echo $Exception;
        // debugging only, plese remark out for production
        exit();
    }

    return $row_result;
}
?>