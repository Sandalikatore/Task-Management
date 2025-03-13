<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Edit Task</h1>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tasks WHERE id = $id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $task = $result->fetch_assoc();
        } else {
            echo "<script>alert('Task not found!'); window.location.href='index.php';</script>";
        }
    }

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $due_date = $_POST['due_date'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];

        $sql = "UPDATE tasks SET title = '$title', description = '$description', due_date = '$due_date', priority = '$priority', status = '$status' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Task updated successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

    <form method="POST" action="">
        <label>Task Title</label>
        <input type="text" name="title" value="<?php echo $task['title']; ?>" required>

        <label>Task Description</label>
        <textarea name="description" required><?php echo $task['description']; ?></textarea>

        <label>Due Date</label>
        <input type="date" name="due_date" value="<?php echo $task['due_date']; ?>" required>

        <label>Priority</label>
        <select name="priority" required>
            <option value="Low" <?php if ($task['priority'] == 'Low') echo 'selected'; ?>>Low</option>
            <option value="Medium" <?php if ($task['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
            <option value="High" <?php if ($task['priority'] == 'High') echo 'selected'; ?>>High</option>
        </select>

        <label>Status</label>
        <select name="status" required>
            <option value="To Do" <?php if ($task['status'] == 'To Do') echo 'selected'; ?>>To Do</option>
            <option value="In Progress" <?php if ($task['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Completed" <?php if ($task['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select>

        <button type="submit" name="update">Update Task</button>
    </form>
</div>
</body>
</html>
