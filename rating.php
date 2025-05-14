<?php

include 'db.php';

if (isset($_POST['submit_rating'])) {
    $article_id = (int)$_POST['article_id'];
    $rating = (int)$_POST['rating'];

    if ($rating >= 1 && $rating <= 5) {
        $query = "UPDATE blog SET rating = (rating + $rating) / 2 WHERE id = $article_id";
        if (mysqli_query($conn, $query)) {
            header("Location: artikel.php?id=$article_id");
            exit();
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($conn);
        }
    } else {
        echo "Rating tidak valid.";
    }
}
?>