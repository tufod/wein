<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
       
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
        exit;
        ?>
    </body>
</html>
