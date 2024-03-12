<?php
$conn  = " ";
try 
{
    $file_db = new PDO('sqlite:HappyU_Gala.db');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException  $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>