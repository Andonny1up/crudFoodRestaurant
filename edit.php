<!DOCTYPE html>
<?php
    include("connection.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- link de font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- link del CSS -->
    <link rel="stylesheet" href="./css/style.css">
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
    <header>
    <a href="#" class="logo"><i class="fas fa-utensils"></i>food</a>
    </header>
    <main>
        <section class="edit-food">
        <h1 class="heading">Edit <span>food</span></h1>
            <div class="row">
                <figure class="image">
                    <img src="./img/s-1.png" alt="burger">
                </figure>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <label for="" >Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    
                    <label for="" >Price</label>
                    <input type="number" step="0.01" name="price" value="<?php echo $price; ?>">

                    <label for="" >Description</label>
                    <!-- <input class="description" type="text" name="description" value="<?php echo $description; ?>"> -->
                    <textarea name="description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <input class="btn" type="submit" name="send" value="Edit">
                </form>
                
            </div>
            <div class="container-btn">
                <a class="btn" href="./index.php">return</a>
            </div>
        
        </section>
    </main>
    <?php
        }
    ?>
    <footer class="footer">
        <div class="share">
            <a href="#" class="btn">facebook</a>
            <a href="#" class="btn">twitter</a>
            <a href="#" class="btn">instagram</a>
            <a href="https://github.com/Andonny1up" class="btn" target="_blank">github</a>
            <a href="https://www.linkedin.com/in/andoni-barba-noe-894460184/" class="btn" target="_blank">linkedin</a>
        </div>
        <h1 class="credit">created by <span>andonny1up</span> | andoni barba noe</h1>
    </footer>
</body>
</html>