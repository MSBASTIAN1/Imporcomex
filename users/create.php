<?php
require_once '../config/db.php';
// require_once '../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $phone = $_POST['phone'];

    $query = $conn->prepare("INSERT INTO users (name, email, phone ,password, role) VALUES (?, ?, ?, ?,?)");
    $query->execute([$name, $email, $phone, $password, $role]);

    header('Location: list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="email">Teléfono:</label>
        <input type="phone" name="phone" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="role">Rol:</label>
        <select name="role">
            <option value="Administrador">Administrador</option>
            <option value="Operador">Operador</option>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
