<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        .book-info {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book Details</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back to List</a>
            </div>
        </header>
        <div class="book-info p-5 my-4">
            <?php
            include("connect.php");
            if (isset($_GET['book_id'])) {
                $bookId = mysqli_real_escape_string($connection, $_GET['book_id']);
                $query = "SELECT * FROM books WHERE id = $bookId";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                    $record = mysqli_fetch_array($result);
                    ?>
                    <h3>Title:</h3>
                    <p><?php echo htmlspecialchars($record["title"]); ?></p>
                    <h3>Description:</h3>
                    <p><?php echo htmlspecialchars($record["description"]); ?></p>
                    <h3>Author:</h3>
                    <p><?php echo htmlspecialchars($record["author"]); ?></p>
                    <h3>Type:</h3>
                    <p><?php echo htmlspecialchars($record["type"]); ?></p>
                    <?php
                } else {
                    echo "<h3>No book found with this ID</h3>";
                }
            } else {
                echo "<h3>No book ID provided</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
