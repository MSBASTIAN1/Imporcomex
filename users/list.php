<?php
require_once '../config/db.php';
// require_once 'includes/auth.php';

$query = $conn->query("SELECT * FROM users");
$users = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!Doctype html>
<html lang="es" > 
<head>
  <meta charset="UTF-8">
  <title>Usuarios</title>
</head>
<body>
  <table>
  <h1>Usuarios</h1>
  <a href="create.php">Crear Usuario</a>
    <tr>
      <th>Nombre</th>
      <th>Email</th>
      <th>Telefono</th>
      <th>Rol</th>
    </tr>
  <?php foreach ($users as $user):?>
    <tr>
      <td><?=$user['id']?> </td>
      <td><?=$user['name']?> </td>
      <td><?=$user['email']?> </td>
      <td><?=$user['phone']?> </td>
      <td><?=$user['role']?> </td>
      <td> <a href="edit.php?id=<? $user['id']?>">Editar</a></td>
      <td> <a href="delete.php?id=<? $user['id']?>">Eliminar</a></td>

    </tr>  
    <?php endforeach;?>
    </table>
</body>
</html>

