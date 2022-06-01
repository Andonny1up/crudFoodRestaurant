<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud FoodRestaurant</title>

    <!-- link de font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- link del CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
    <a href="#" class="logo"><i class="fas fa-utensils"></i>food</a>
    </header>
    <main>
        <section class="crud">
            <h1 class="heading">full <span>menu</span></h1>
            <div class="container-btn">
            <a href="./create.php" class="btn">New food</a><br><br>
            </div>
            <?php
                include("connection.php");
                //select
                $sql="select * from menu";
                $result=mysqli_query($connection,$sql);
            ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // foreach ($variable as $value) {
                            //     echo $value.nombre;
                            // }
                            while ($row=mysqli_fetch_assoc($result)) {
                                # code...
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?> </td>
                            <td><?php echo $row["name"]; ?> </td>
                            <td><?php echo $row["description"]; ?> </td>
                            <td><?php echo $row["price"]; ?> </td>
                            <td>
                                <?php echo "<a class='btn' href='./edit.php?id=".$row["id"]."'>Edit</a>"; ?>
                                
                                <?php echo "<a class='btn' href='./delete.php?id=".$row["id"]."' onclick='return confirmDelete()'>Delete</a>"; ?> 
                            </td>
                        </tr>
                        <?php   
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
            mysqli_close($connection);
            ?>
        </section>
    </main>
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
    <script src="./js/script.js"></script>
</body>
</html>