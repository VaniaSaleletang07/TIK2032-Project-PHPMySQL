<?php
include 'db.php';

if (isset($_POST['submit_comment'])) {
    $article_id = (int)$_POST['article_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $query = "INSERT INTO comments (article_id, name, comment, created_at) VALUES ($article_id, '$name', '$comment', NOW())";
    if (mysqli_query($conn, $query)) {
        header("Location: artikel.php?id=$article_id");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}
?>