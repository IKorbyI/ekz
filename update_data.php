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

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM student WHERE id='$id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    { 
        $row = $result->fetch_assoc();
        echo "<form action='update_data.php' method='post'>";
        echo "Полное имя: <input type='text' name='full_name' value='".$row['full_name']."'>"; 
        echo "ID Факультета: <input type='text' name='faculty_id' value='".$row['faculty_id']."'>"; 
        echo "Курс: <input type='text' name='course' value='".$row['course']."'>"; 
        echo "<input type='hidden' name='id' value='".$id."'>";
        echo "<input type='submit' value='Сохранить'>"; 
        echo "</form>"; 
    } 
    else 
    { 
        echo "ID не найден";
    } 
}
$conn->close(); 
?>