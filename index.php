<?php
        $name = $_POST['name'] ?? null;
        $lastName = $_POST['lastName'] ?? null;
        $img = $_FILES['image'] ?? null;

        if(!is_dir('img')) {
            mkdir('img');
        }

        if($img){
            $imagePath = 'img/'.$img['name'];
            move_uploaded_file($img['tmp_name'], $imagePath);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="/index.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="lastName">Lastname</label>
                <input type="text" name="lastName" class="form-control" placeholder="Enter your lastname" required>
            </div>
            <input type="file" name="image">
            <input type="submit" name="submit">
        </form>

        <?php 
            if($name && $lastName && $img){
                echo "<div class='preview'><h1>$name $lastName</h1><img src=$imagePath></div>";
            }
        ?>
    </div>
</body>
</html>