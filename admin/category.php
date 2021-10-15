<?php 
    require('../include/database.php');
    session_start();
    if(!isset($_SESSION['tf'])) $_SESSION['tf'] = true;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['new'])) {
           $_SESSION['tf'] = !$_SESSION['tf'];
        }
        if (isset($_POST['add'])) {
            $s = "insert into category(category_name) values ('".$_POST['category_name']."')";
            doSQL($s);
            $_SESSION['tf'] = !$_SESSION['tf'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method="post">
        <div class="form-group" style="margin-left: 30px">
            <div class="mb-3">
            Category name: <br>
            <input type="text" name="category_name" placeholder="Nhập Category Name" <?php if($_SESSION['tf']) echo 'disabled'; else echo 'abled'; ?>>
            <button type="submit" class="btn btn-info" name="new">...</button>
            </div>
            <div class="mb-3">
            <?php 
                $s = "select * from category";
                echo loadDatatoTable($s);
                ?>
            <div class="form-group">
                <button type="submit" name="add" <?php if($_SESSION['tf']) echo 'disabled'; else echo 'abled'; ?>>Add</button>
                <button type="submit" name = "cancel">Cancel</button>
                <button type="submit" name = "back">Back</button>
            </div>
        </div>
        </div>
    </form>
</body>
</html>