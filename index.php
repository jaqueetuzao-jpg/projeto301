<?php include ('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO_DO_LIST</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Minha Lista de Tarefas</h1>
    <form action="add_task.php" method="POST">
        <input type="text" name="title" placeholder="Nova tarefa..." required>
        <button type="submit">Adicionar</button>
    </form>
    <hr>
    <ul>
        <?php
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>";
                echo $row['status'] == 'concluida' ? "<s>{$row['title']}</s>" : $row['title'];
                echo "
                        <a href='update_task.php?id={$row['id']}'>&#x270E</a>
                        <a href='update_task_name.php?id={$row['id']}'>&#x270E</a>
                        <a href='delete_task.php?id={$row['id']}'>&#x274C</a>";
                        echo "</li>";
            }
        } else {
            echo "<p>Nenhuma tarefa cadastrada.</p>";
        }
        ?>
    </ul>
</body>
</html>