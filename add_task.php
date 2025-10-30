<?php
    include('db_connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST['title'];
        $sql = "INSERT INTO tasks (title, status, created_at) VALUES ('$title', 'pendente', NOW())";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao adicionar tarefa: " . $conn->error;
        }
    }
    $conn->close();
?>