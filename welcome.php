<?php session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']['name']; ?>!</h2>
    <p>Your role is: <?php echo $_SESSION['user']['role']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
