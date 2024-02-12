<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'PersonalWeb');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, email) 
            values(?, ?, ?)");
        $stmt->bind_param("sss", $firstName, $lastName, $email);
        $stmt->execute();
        echo "Registration Successfully ...";
        $stmt->close();
        $conn->close();
    }
?>