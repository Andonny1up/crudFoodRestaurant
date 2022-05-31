<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <?php
        if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            include("connection.php");
            //Insert
            $sql="insert into menu(name,description,price) 
            values('".$name."','".$description."','".$price."')";
            $result = mysqli_query($connection,$sql);

            if ($result) {
                //Ingresados correctamente
                echo "<script language='JavaScript'>
                    alert('entered correctly');
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
        }
    ?>
    <main>
        <h1>add new food</h1>
        <section>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <label for="" >Name</label>
                <input type="text" name="name">
                <label for="" >Description</label>
                <input type="text" name="description">
                <label for="" >Price</label>
                <input type="number" step="0.25" name="price">
                <input type="submit" name="send" value="Add">
                <a href="./index.php">return</a>
            </form>
        </section>
    </main>
</body>
</html>