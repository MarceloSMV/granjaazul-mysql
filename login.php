<?php
session_start();
require_once('db.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario    = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    $stmt = $conn->prepare("SELECT id, usuario, rol FROM usuarios WHERE usuario = ? AND contrasena = ?");
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['rol']     = $row['rol'];
        header('Location: cartas.php');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estiloencabezado.css">
    <title>Login - Granja Azul</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background-color: #eeeeee; font-family: 'Georgia', serif; }

        .login-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .login-box {
            background-color: #d1dce5;
            width: 400px;
            padding: 60px 40px 40px;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .login-box img.logo-login {
            width: 120px;
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
        }

        .login-box h2 {
            color: #00336c;
            font-size: 20px;
            font-family: sans-serif;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .login-box input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #aab8c4;
            background: #ffffff;
            font-size: 14px;
            font-family: sans-serif;
            outline: none;
        }

        .login-box input:focus {
            border-color: #00336c;
        }

        .btn-login {
            width: 100%;
            background-color: #00336c;
            color: white;
            border: none;
            padding: 13px;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
            font-family: sans-serif;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .btn-login:hover { background-color: #00254d; }

        .error-msg {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 13px;
            font-family: sans-serif;
        }

        .volver {
            display: inline-block;
            margin-top: 20px;
            color: #00336c;
            font-size: 13px;
            font-family: sans-serif;
            text-decoration: none;
        }
        .volver:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-box">
            <img src="img/logo.avif" alt="Granja Azul" class="logo-login">
            <h2>Iniciar Sesión</h2>

            <?php if ($error): ?>
                <div class="error-msg"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST">
                <input type="text"     name="usuario"    placeholder="Usuario"    required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" class="btn-login">Ingresar</button>
            </form>

            <a href="index.php" class="volver">← Volver al inicio</a>
        </div>
    </div>
</body>
</html>
