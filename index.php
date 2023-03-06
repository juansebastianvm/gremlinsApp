<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Gremlins App</title>

    <link href="src/css/styles.css" rel="stylesheet" />
    <script src="src/js/all.min.js" crossorigin="anonymous"></script>
    <link href="src/css/datatables.min.css" />
    <script src="src/js/datatables.min.js"></script>
    <script src="src/js/funcionesJS.js"></script>
    <script src="https://kit.fontawesome.com/43c27c90f5.js" crossorigin="anonymous"></script>
</head>

<?php
if (isset($_SESSION['user'])) {
    if (file_exists("src/view/" . $_GET["pid"] . ".php")) {
        include("src/view/" . $_GET["pid"] . ".php"); 
    } else {
        include("src/view/principal.php");
    }
} else {
    include("src/view/login.php");
}
?>

</html>