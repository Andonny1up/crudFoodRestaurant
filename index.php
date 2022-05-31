<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <h1>Menu</h1>
    </header>
    <main>
        <a href="./create.php">New food</a><br><br>
        <section>
            <?php
                include("connection.php");
                //select
                $sql="select * from menu";
                $result=mysqli_query($connection,$sql);
            ?>
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
                            <?php echo "<a href='./edit.php?id=".$row["id"]."'>Edit</a>"; ?>
                            -
                            <?php echo "<a href='./delete.php?id=".$row["id"]."' onclick='return confirmDelete()'>Delete</a>"; ?> 
                        </td>
                    </tr>
                    <?php   
                        }
                    ?>
                </tbody>
            </table>
            <?php
            mysqli_close($connection);
            ?>
        </section>
    </main>
    <script src="./js/script.js"></script>
</body>
</html>