<?php

session_start();

require './model/db.php';

if(isset($_SESSION['user_id'])){
  $records= $connection->prepare('SELECT ID, Usuario, Pass FROM users WHERE ID=:id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();

  $results= $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if(count($results) > 0){
    $user = $results;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./scripts/index.js"></script>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/login.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Registro documental</title>
</head>
<body>
    <?php if(!empty($user)): ?>
    <?php include './views/header_logged.php'?>
    <?php else: ?>
    <?php include './views/header.php'?>
    <?php endif; ?>
    <main>
      <?php include './controller/router.php'?>
    </main>
    <?php include './views/footer.php'?>
</body>
</html>