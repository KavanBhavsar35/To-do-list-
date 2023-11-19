<?php  
    include("database/connection.php");
    session_start();
    $query = "UPDATE $user[1] SET task_name = $taskname";
    // $result = $conn->query($query);
    // if (!$result) {
    //     die("Query failed: " . mysqli_error($conn));
    // }
    $query = "UPDATE $user[1] SET task_desc = $taskdesc";
    // $result = $conn->query($query);
    // if (!$result) {
    //     die("Query failed: " . mysqli_error($conn));
    // }
?>