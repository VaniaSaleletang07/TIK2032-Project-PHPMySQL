<?php

include 'db.php';

// Ambil ID artikel dari URL
$id = $_GET['id'];

// Query untuk mendapatkan artikel berdasarkan ID
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
        <p><a href="blog.php" class="linkkembali">← Kembali ke Halaman Blog</a></p>
    </main>
</body>
</html>