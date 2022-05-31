<!DOCTYPE html>
<?php
    include("connection.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST['send'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            //update
            $sql="update menu set name='".$name."',description='".$description."',price='".$price."'
            where id='".$id."'";
            $result = mysqli_query($connection,$sql);

            if ($result) {
                //Editado correctamente
                echo "<script language='JavaScript'>
                    alert('Updated successfully');
                    location.assign('index.php');
                    </script>";
            }else {
                //No ingresados
                echo "<script language='JavaScript'>
                    alert('Error:');
                    location.assign('index.php');
                    </script>
                ";
            }
            mysqli_close($connection);
        }else{
            $id=$_GET['id'];
            $sql="select * from menu where id ='".$id."'";
            $result = mysqli_query($connection,$sql);

            $row =mysqli_fetch_assoc($result);

            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            mysqli_close($connection);
    ?>
    <main>
    <h1>Edit food</h1>
        <section>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <label for="" >Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <label for="" >Description</label>
                <input type="text" name="description" value="<?php echo $description; ?>">
                <label for="" >Price</label>
                <input type="number" step="0.25" name="price" value="<?php echo $price; ?>">

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input type="submit" name="send" value="Edit">
                <a href="./index.php">return</a>
            </form>
        
        </section>
    </main>
    <?php
        }
    ?>
</body>
</html>