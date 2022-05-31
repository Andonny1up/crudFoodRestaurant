<?php
    $id=$_GET['id'];
    include("connection.php");
    //delete
    $sql="delete from menu where id ='".$id."'";
    $result = mysqli_query($connection,$sql);

    if ($result) {
        //Eliminado correctamente
        echo "<script language='JavaScript'>
            alert('Delete');
            location.assign('index.php');
            </script>";
    }else {
        //No eliminado
        echo "<script language='JavaScript'>
            alert('Error:');
            location.assign('index.php');
            </script>
        ";
    }
    mysqli_close($connection);
?>