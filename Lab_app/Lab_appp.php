<html>
<head>
    <title>IBP LAB APP</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'Lab_app';


try {
    $db = new PDO("mysql:host=$servername;dbname=ibp_project", $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Successful";
} catch(PDOException $e) {
    echo "Connection Failed<br>: " . $e->getMessage();
}
?>

    <form action="?process=add" method="post">
        Full Name: <input type="text" name="full_name" required> <br>
        E-mail: <input type="email" name="email"><br>
        Gender:<input type="radio" value="Male" name="gender" required> Male
    <input type="radio" value="Female" name="gender" required> Female
    <br>

    <input type="submit" value="Submit" name="Submit">

</form>

<form action="?process=List" method="post">
    <input type="submit" value="List"">

</form>

<?php

if ($_REQUEST['process']=="add") {

    $full_name = $_REQUEST['full_name'];
    $email = $_REQUEST['email'];
    $gender = $_REQUEST['gender'];

        $sql = "INSERT INTO students (full_name,email,gender) VALUES ('$full_name','$email','$gender')";
        $db->exec($sql);
        echo "Succesfully Added<br>";
}


?>


<?php
if ($_REQUEST['process']=="List"){

?>
<table border="1" width="400">
    <tr>
        <td>id</td>
        <td>Full Name</td>
        <td>E-Mail</td>
        <td>Gender</td>

    </tr>

    <?php

    $sql="SELECT * FROM students";
    foreach ($db -> query($sql) as $item) {
        ?>
        <tr>
            <td><?=$item ['id']?></td>
            <td><?=$item ['full_name'] ?></td>
            <td><?=$item ['email'] ?></td>
            <td><?=$item ['gender'] ?></td>

        </tr>
        <?php
    }
    }
    ?>
</table>
</body>
</html>

