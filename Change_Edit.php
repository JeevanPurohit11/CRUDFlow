<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Book</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Edit Book</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php 
            if (isset($_GET['book_id'])) {
                include("connect.php");
                $bookId = $_GET['book_id'];
                $query = "SELECT * FROM books WHERE id=$bookId";
                $result = mysqli_query($connection, $query);
                $book = mysqli_fetch_array($result);
                ?>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="book_title" placeholder="Book Title:" value="<?php echo htmlspecialchars($book["title"]); ?>">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="book_author" placeholder="Author Name:" value="<?php echo htmlspecialchars($book["author"]); ?>">
                </div>
                <div class="form-element my-4">
                    <select name="book_type" id="" class="form-control">
                        <option value="">Select Book Type:</option>
                        <option value="Adventure" <?php if($book["type"] == "Adventure") { echo "selected"; } ?>>Adventure</option>
                        <option value="Crime" <?php if($book["type"] == "Crime") { echo "selected"; } ?>>Crime</option>
                        <option value="Fantasy" <?php if($book["type"] == "Fantasy") { echo "selected"; } ?>>Fantasy</option>
                        <option value="Horror" <?php if($book["type"] == "Horror") { echo "selected"; } ?>>Horror</option>
                    </select>
                </div>
                <div class="form-element my-4">
                    <textarea name="book_description" id="" class="form-control" placeholder="Book Description:"><?php echo htmlspecialchars($book["description"]); ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $bookId; ?>" name="book_id">
                <div class="form-element my-4">
                    <input type="submit" name="update_book" value="Update Book" class="btn btn-primary">
                </div>
                <?php
            } else {
                echo "<h3>Book Does Not Exist</h3>";
            }
            ?>
        </form>
    </div>
</body>
</html>
