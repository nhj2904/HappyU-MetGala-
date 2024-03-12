<?php
function getDB()
{
    $dbConnect = new PDO('sqlite:HappyU_Gala.db');
    $dbConnect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnect;
}

if (isset($_POST['usrnm']) && isset ($_POST['psw']))
{
    $username = $_POST['usrnm'];
    $password = $_POST['psw'];

    try 
    {
        $db = getDB();
        $db -> exec("SELECT * FROM Admin WHERE username = '$username' AND password = '$password'");
        if (!empty($db))
        {
            header("Location:guests.html");
            exit();    
        }
        else echo 'Login Error';
        $db = NULL;
    }

    catch (PDOException $e)
    {
        echo 'Exception : '.$e->getMessage();
    }
}

if (isset($_POST['fullname']) && isset ($_POST['email']) && isset($_POST['contact']) && isset ($_POST['id']))
{
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $num = $_POST['contact'];
    $id = $_POST['id'];

    try 
    {
        $db = getDB();
        $db -> exec("INSERT INTO Guest(studentID, name, email, contactNum) VALUES ('$id','$name','$email','$num')");
        $db = NULL;
    }

    catch (PDOException $e)
    {
        echo 'Exception : '.$e->getMessage();
    }
    
    header("Location:payment.html");
    exit();    
}
?>