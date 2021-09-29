<?php

include('./model/db.php');
//session_start();

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM users WHERE Usuario = :username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">El Nombre de usuario ya esta registrado</p>';
    }

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(Usuario,Pass) VALUES (:username,:password_hash)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            echo '<p class="success">Registro Exitoso</p>';
        } else {
            echo '<p class="error">Algo salio mal :c</p>';
        }
    }
}

?>

<div class="container">
  <div class="row">
    <div class="col s12 m6 l4 offset-l4 offset-m3">
      <form action="" method="post">
        <div class="row card-panel z-depth-4">
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input 
            type="text"
            placeholder="Usuario"
            id="usuario"
            name="username"
            class="validate"
            required
            />
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">fingerprint</i>
            <input 
            type="password"
            placeholder="Contraseña"
            id="pswd"
            name="password"
            class="validate"
            required
            />
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">fingerprint</i>
            <input 
            type="password"
            placeholder="Confirmar contraseña"
            id="pswd"
            name="pswd"
            class="validate"
            required
            />
          </div>
          <button class="btn blue right" type="submit" name="register" value="register">
            <i class="material-icons left">login</i>
            Enviar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
