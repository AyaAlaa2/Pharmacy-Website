<?php
    session_start();
    $conn = mysqli_connect('localhost','root','');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // // Create database
    // $sql = "CREATE DATABASE pharmacy";
    // if (mysqli_query($conn, $sql)) {
    //     echo "Database created successfully";
    // } else {
    //     echo "Error creating database: " . mysqli_error($conn);
    // }
    $db_select =mysqli_select_db($conn,'pharmacy');
?>