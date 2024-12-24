<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Handle Delete Action
if (isset($_GET['delete'])) {
    $matric = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}

// Fetch Users
$result = $conn->query("SELECT matric, name, role FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Management</title>
</head>
<body>
    <h2>User Management</h2>
    <a href="logout.php">Logout</a>
    <table border="1">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['matric']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td>
                <a href="update.php?matric=<?php echo $row['matric']; ?>">Update</a>
                <a href="index.php?delete=<?php echo $row['matric']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
