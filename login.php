<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] === 'admin') header('Location: admin_cartas.php');
    else header('Location: cartas.php');
    exit;
}

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
        $stmt->close();

        if ($row['rol'] === 'admin') header('Location: admin_cartas.php');
        else header('Location: cartas.php');
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
            padding: 70px 40px 40px;
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
            font-size: 18px;
            font-family: sans-serif;
            letter-spacing: 2px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .login-box p.subtitulo {
            font-family: sans-serif;
            font-size: 13px;
            color: #555;
            margin-bottom: 25px;
        }

        .login-box input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 12px;
            border: 1px solid #aab8c4;
            background: #ffffff;
            font-size: 14px;
            font-family: sans-serif;
            outline: none;
        }

        .login-box input:focus { border-color: #00336c; }

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
            margin-top: 5px;
        }
        .btn-login:hover { background-color: #00254d; }

        .error-msg {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 13px;
            font-family: sans-serif;
            border-left: 3px solid #c0392b;
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
            <h2>Acceso Administrativo</h2>
            <p class="subtitulo">Solo para gestión de cartas</p>

            <?php if ($error): ?>
                <div class="error-msg"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST">
                <input type="text"     name="usuario"    placeholder="Usuario"    required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button type="submit" class="btn-login">Ingresar</button>
            </form>

            <a href="cartas.php" class="volver">← Volver a Cartas</a>
        </div>
    </div>
</body>
</html>
