<?php

include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $query = "INSERT INTO comments (article_id, name, comment) VALUES ('$id', '$name', '$comment')";
    if (mysqli_query($conn, $query)) {
         echo "<script>showNotification('Komentar berhasil dikirim!');</script>";
    } else {
        echo "<script>showNotification('Terjadi kesalahan: " . mysqli_error($conn) . "');</script>";
    }
}

$query = "SELECT * FROM blog WHERE id = $id";
$result = mysqli_query($conn, $query);
$article = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['title']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="artikel-container">
        <h1 class="judul-artikel"><?php echo $article['title']; ?></h1>
        <p class="sumber-artikel">Dipublikasikan pada <?php echo $article['created_at']; ?></p>
        <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" class="gambar-artikel">
        <div class="isi-artikel">
            <p><?php echo nl2br($article['content']); ?></p>
        </div>

        <div id="notification" class="notification hidden"></div>

        <div class="komentar-form">
            <h3>Tinggalkan Komentar Disini</h3>
            <form method="POST" action="">
                <input type="text" name="name" placeholder="Nama Anda" required>
                <textarea name="comment" placeholder="Tulis Tanggapan Anda" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>

        <?php
        // Ambil komentar berdasarkan ID artikel
        $comments_query = "SELECT * FROM comments WHERE article_id = $id ORDER BY created_at ASC";
        $comments_result = mysqli_query($conn, $comments_query);
        echo "ID Artikel: " . $id;
        ?>

        <div class="komentar-list">
            <h3>Komentar</h3>
            <?php while ($comment = mysqli_fetch_assoc($comments_result)): ?>
                <div class="komentar-item">
                    <p><strong><?php echo htmlspecialchars($comment['name']); ?></strong> :</p>
                    <p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                    <p class="komentar-tanggal"><?php echo $comment['created_at']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <p><a href="blog.php" class="linkkembali">← Kembali ke Halaman Blog</a></p>
    </main>
</body>
</html>