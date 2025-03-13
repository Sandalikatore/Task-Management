<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Task Management System</h1>

    <a href="add_task.php" class="btn">Add New Task</a>

    <table class="task-table">
        <thead>
            <tr>
                <th>Task Title</th>
                <th>Due Date</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM tasks";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['due_date'] . "</td>";
                    echo "<td>" . $row['priority'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>
                            <a href='edit_task.php?id=" . $row['id'] . "' class='btn edit'>Edit</a>
                            <a href='delete_task.php?id=" . $row['id'] . "' class='btn delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No tasks found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
