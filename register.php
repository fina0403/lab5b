<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="">
        <label>Matric:</label>
        <input type="text" name="matric" required><br>

        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Role:</label>
        <select name="role" required>
            <option value="" disabled selected>Please select</option>
            <option value="Student">Student</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Admin">Admin</option>
        </select><br><br>

        <button type="submit" name="submit">Register</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $matric = $_POST['matric'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = $_POST['role'];

        $stmt = $conn->prepare("INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $matric, $name, $password, $role);

        if ($stmt->execute()) {
            echo "Registration successful! <a href='login.php'>Login</a> here.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>
</body>
</html>
