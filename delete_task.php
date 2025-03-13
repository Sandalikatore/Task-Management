<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tasks WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Task deleted successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "<script>alert('Invalid Task ID!'); window.location.href='index.php';</script>";
}
?>
