<?php
include 'config.php';

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $result = $conn->query("SELECT * FROM users WHERE matric = '$matric'");
    $user = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $conn->query("UPDATE users SET name = '$name', role = '$role' WHERE matric = '$matric'");
    header("Location: display.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="POST">
        <label>Matric:</label>
        <input type="text" name="matric" value="<?php echo $user['matric']; ?>" readonly><br>

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>

        <label>Role:</label>
        <select name="role" required>
            <option value="Student" <?php if ($user['role'] == 'Student') echo 'selected'; ?>>Student</option>
            <option value="Lecturer" <?php if ($user['role'] == 'Lecturer') echo 'selected'; ?>>Lecturer</option>
            <option value="Admin" <?php if ($user['role'] == 'Admin') echo 'selected'; ?>>Admin</option>
        </select><br><br>

        <button type="submit" name="update">Update</button>
        <a href="display.php">Cancel</a>
    </form>
</body>
</html>
