<?php

require_once 'config/db.php';
// require_once 'includes/auth.php';
?>

<!Doctype html>
<html lang="es" > 
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
</head>
<body>
  <h1>Bienvenido <?= htmlspecialchars($_SESSION['user_name'])?> </h1>
  <ul>
    <li> <a href="users/list.php">Gestion de Usuarios</a></li>
    <li> <a href="products/list.php">Gestion de Productos</a></li>
    <li> <a href="cities/list.php">Gestion de Ciudades</a></li>
    <li> <a href="orders/list.php">Gestion de Pedidos</a></li>
  </ul>
  <a href="logout.php">Cerrar Sesion</a>
</body>
</html>