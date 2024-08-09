<?php
include 'dbconn.php';

if (isset($_GET['bookID'])) {
    $bookID = $_GET['bookID'];

    $sql = "DELETE FROM books WHERE bookID=$bookID";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Book deleted successfully");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
