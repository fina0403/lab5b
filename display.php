<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
    <h2>User List</h2>
    <table border="1">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT matric, name, role FROM users");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['matric']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['role']}</td>
                    <td>
                        <a href='update.php?matric={$row['matric']}'>Update</a> | 
                        <a href='delete.php?matric={$row['matric']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
