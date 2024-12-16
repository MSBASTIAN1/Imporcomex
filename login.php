<?php
require_once 'config/db.php';

if(isset($_SESSION['user_id'])){
  header('Location: index.php');
  exit;
}

$error = '';

if($_SERVER['REQUEST_METHOD']==='POST'){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = $conn->prepare("SELECT * FROM users WHERE email =?");
  $query->execute([$email]);
  $user = $query->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password'])){
    $_SESSION['user_id']= $user['id'];
    $_SESSION['user_name']= $user['name'];
    $_SESSION['user_role']= $user['role'];
    $_SESSION['user_phone']= $user['phone'];
    $_SESSION['user_email']= $user['email'];
    exit;
  }else{
    $error = 'Credenciales Invalidas';
  }
}
?>

<!Doctype html>
<html lang = "es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
</head>
<body>
<?php if ($error):?>
    <p style = "color: red;"><? $error ?></p>
  <?php endif; ?>
  
  <form action="" method="POST">
    <label>Email </label>
    <input type="email" name="email" required><br>>
    <label>Contraseña</label>
    <input type="password" name="password" required><br>>
    <button type="submit">Iniciar Sesión</button>

  </form>
</body>