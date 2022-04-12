<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM humano WHERE id=$id";
    if(mysqli_query($conn,$sql)){
        echo "<script languages='javascript' type/text='javascript'>
             window.location.href='index.php'
             </script>";
    } else {
        echo "Registro não pode ser apagado!";
    }
?>