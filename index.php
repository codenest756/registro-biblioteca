<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            header('Location: pagina2.php');
            exit;
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido!</title>
    <link rel="stylesheet" href="style1.css">
    </head>
    <body background="1.jpg">
        <br>
       <font size="5"> <a href="https://ieti-camacho.edu.co/">Blog Institucional </font></a>
       <P align="center">
        <table width="100%">
            <tr>
                <td><font color="0A1A78" face="Showcard Gothic" size="7"><p align="center">REGISTRO INGRESO BIBLIOTECA IETI ANTONIO JOSE CAMACHO</p></font></td>
                <td><img src="5.jpg.png" width="250" height="250"></td>
            </tr>
        </table>
         </title></P>
         <div class="formulario">
        <h1>Inicio de sesion</h1>
         <form action="" method="post">
            <div class="username">
                <input type="text" id="username" name="username" required>
                <label>Nombre de usuario</label>
            </div>
            <div class="username">
                <input type="password" id="password" name="password"  required>
                <label>Contraseña</label>
            </div>
            
            <input type="submit" name="login" value="iniciar">
            
            <div class="registrarse">
                No tienes cuenta <a href="register.php">registrate</a>
            </div>
          </form>
</div>
    </body>
</html>



