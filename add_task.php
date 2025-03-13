<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Add New Task</h1>
    <form method="POST" action="">
        <label>Task Title</label>
        <input type="text" name="title" required>

        <label>Task Description</label>
        <textarea name="description" required></textarea>

        <label>Due Date</label>
        <input type="date" name="due_date" required>

        <label>Priority</label>
        <select name="priority" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>

        <label>Status</label>
        <select name="status" required>
            <option value="To Do">To Do</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>

        <button type="submit" name="submit">Add Task</button>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tasks (title, description, due_date, priority, status) VALUES ('$title', '$description', '$due_date', '$priority', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Task added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
</body>
</html>
