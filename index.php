<!DOCTYPE html>
<html>
<head>
    <title>Site</title>
    <link rel="icon" type="image/x-icon" href="free-icon-web-3178162.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#141e30, #243b55);
            color: white;
            overflow: hidden;
        }

        table {
            border-spacing: 0;
            width: 100%;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid white;
        }

        form {
            margin-top: 20px;
            color: white;
        }

        input[type="text"], input[type="submit"] {
            padding: 5px;
            margin: 5px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #1c262e;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 20px;
        }

        input[type="submit"]:hover {
            background-color: #02c0de;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "ekzamen"; 

    $conn = new mysqli($servername, $username, $password, $dbname); 
    if ($conn->connect_error) 
    { 
        die("Connection failed: " . $conn->connect_error); 
    } 
    $sql = "SELECT id, full_name, faculty_id, course FROM student";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    { 
        echo "<table><tr><th>ID</th><th>full_name</th><th>faculty_id</th><th>course</th></tr>"; 
        while($row = $result->fetch_assoc()) 
        { 
            echo "<tr><td>".$row["id"]."</td><td>".$row["full_name"]."</td><td>".$row["faculty_id"]."</td><td>".$row["course"]."</td></tr>"; 
        } 
            echo "</table>"; 
        } 
        else 
        { 
            echo "0 results"; 
        } 

        // Форма редактирования и удаления 
        echo "<form action='insert_data.php' method='post'>"; 
        echo "Полное имя: <input type='text' name='full_name'><br>"; 
        echo "ID Факультета: <input type='text' name='faculty_id'><br>"; 
        echo "Курс: <input type='text' name='course'><br>"; 
        echo "<input type='submit' value='Добавить'><br>"; 
        echo "</form>";
        
        echo "<form action='update_data.php' method='post'>"; 
        echo "Полное имя: <input type='text' name='full_name'><br>"; 
        echo "ID Факультета: <input type='text' name='faculty_id'><br>"; 
        echo "Курс: <input type='text' name='course'><br>";       
        echo "ID: <input type='text' name='id'>";  echo "<input type='submit' value='Редактировать'>"; 
        echo "</form>"; 

        echo "<form action='delete_data.php' method='post'>"; 
        echo "ID: <input type='text' name='id'>"; 
        echo "<input type='submit' value='Удалить'>"; 
        echo "</form>"; 

        $conn->close(); 
    ?>
</body>

</html>