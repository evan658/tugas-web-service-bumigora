

<?php
session_start();

$valid_username = "Stevano Marawo"; 
$valid_password = "2301010045"; 

$error = ""; 

if (isset($_SESSION['nama_user'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username === $valid_username && $input_password === $valid_password) {
        $_SESSION['nama_user'] = $valid_username;
        $_SESSION['nim_user'] = $valid_password; 
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Login Gagal. Username/Password (Nama/NIM) salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Session - Login</title>
    <style>
        .login-box { 
            width: 300px; margin: 100px auto; padding: 20px; border: 1px solid #ccc; 
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1); 
        }
        .error { 
            color: red; margin-bottom: 15px; 
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login (Session)</h2>
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        
        <label for="username">Username (Nama):</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password (NIM):</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>