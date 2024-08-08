<?php
if (isset($_GET['book_id'])) {
    include("connect.php");
    $bookId = $_GET['book_id'];
    $query = "DELETE FROM books WHERE id='$bookId'";
    if (mysqli_query($connection, $query)) {
        session_start();
        $_SESSION["message"] = "Book Deleted Successfully!";
        header("Location:index.php");
    } else {
        die("Error deleting record: " . mysqli_error($connection));
    }
} else {
    echo "Book does not exist";
}
?>
