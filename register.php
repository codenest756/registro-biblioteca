<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style4.css">
  <title>Formulario Registro</title>
</head>
<body>
<section class="form-register">
<form method="post" action="registration.php" name="admin">
<link rel="stylesheet" href="style4.css">
    <div class="users">
        
        <input class="controls" type="text" name="nombre" placeholder="Ingrese su Nombre" required />
    </div>
    <div class="users">
       
        <input class="controls" type="email" name="email" placeholder="Ingrese su Correo" required />
    </div>
    <div class="users">
        
        <input class="controls" type="text" name="username" pattern="[a-zA-Z0-9]+" placeholder="Ingrese su Usarname"  required />
    </div>
    <div class="users">
        
        <input class="controls" type="password" name="password" placeholder="Ingrese su Contraseña" required />
    </div>
    <button class="botons" type="submit" name="register"> Registrar </button>


    
</form>
</section>
</body>



</html>


 




