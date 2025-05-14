<?php

include 'db.php';

$id = $_GET['id'];

// Ambil data artikel berdasarkan ID
$query = "SELECT * FROM blog WHERE id = $id";
$result = mysqli_query($conn, $query);
$article = mysqli_fetch_assoc($result);

// Ambil komentar berdasarkan ID artikel
$comments_query = "SELECT * FROM comments WHERE article_id = $id ORDER BY created_at ASC";
$comments_result = mysqli_query($conn, $comments_query);
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
        <p class="rating-artikel">Rating Artikel: <?php echo number_format($article['rating'], 1); ?> / 5</p>
        <p class="sumber-artikel">Dipublikasikan pada <?php echo $article['created_at']; ?></p>
        <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" class="gambar-artikel">
        <div class="isi-artikel">
            <p><?php echo nl2br($article['content']); ?></p>
        </div>
         
        <!-- Form Komentar -->
        <div class="komentar-form">
            <h3>Tinggalkan Komentar Disini</h3>
            <form method="POST" action="comments.php">
                <input type="hidden" name="article_id" value="<?php echo $id; ?>">
                <input type="text" name="name" placeholder="Nama Anda" required>
                <textarea name="comment" placeholder="Tulis Tanggapan Anda" required></textarea>
                <button type="submit" name="submit_comment">Kirim</button>
            </form>
        </div>

        <!-- Daftar Komentar -->
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

        <!-- Form Rating -->
        <div class="rating-form">
            <h3>Beri Rating Artikel Ini</h3>
            <form method="POST" action="rating.php">
                <input type="hidden" name="article_id" value="<?php echo $id; ?>">
                <label for="rating">Pilih Rating:</label>
                <select name="rating" id="rating" required>
                    <option value="1">1 - Sangat Buruk</option>
                    <option value="2">2 - Buruk</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                </select>
                <button type="submit" name="submit_rating">Kirim Rating</button>
            </form>
        </div>

        <p><a href="blog.php" class="linkkembali">← Kembali ke Halaman Blog</a></p>
    </main>

    <script src="script.js"></script>
</body>
</html>