<?php
include 'dbconn.php';

if (isset($_GET['bookID'])) {
    $bookID = $_GET['bookID'];
    $sql = "SELECT * FROM books WHERE bookID=$bookID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookID = $_POST['bookID'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $language = $_POST['language'];
    $pages = $_POST['pages'];
    $date = $_POST['date'];
    $stock_amount = $_POST['stock_amount'];

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', price='$price', language='$language', pages='$pages', date='$date', stock_amount='$stock_amount' WHERE bookID=$bookID";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Book updated successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Update Book</h1>
        <form method="POST" action="update.php">
            <input type="hidden" name="bookID" value="<?php echo $row['bookID']; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $row['author']; ?>" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $row['genre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language" value="<?php echo $row['language']; ?>" required>
            </div>
            <div class="form-group">
                <label for="pages">Pages</label>
                <input type="number" class="form-control" id="pages" name="pages" value="<?php echo $row['pages']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stock_amount">Stock Amount</label>
                <input type="number" class="form-control" id="stock_amount" name="stock_amount" value="<?php echo $row['stock_amount']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update Book</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
