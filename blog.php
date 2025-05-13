<?php
include 'db.php';

$query = "SELECT * FROM blog ORDER BY created_at ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Personal Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1 class="title">PORTOFOLIO</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <button id="dark-mode-toggle" class="dark-mode-toggle">🌙</button>
    </header>
    <h1 class="blog">Blog</h1>
 <div class="blog-container">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <article class="blog-card">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
            <div class="blog-content">
                <h2><?php echo $row['title']; ?></h2>
                <p><?php echo substr($row['content'], 0, 100); ?>...</p>
                <!-- Tambahkan Rating Artikel -->
                <p class="rating-artikel">Rating: <?php echo number_format($row['rating'], 1); ?> / 5</p>
                <a href="artikel.php?id=<?php echo $row['id']; ?>" class="read-more">Baca Selengkapnya</a>
            </div>
        </article>
    <?php endwhile; ?>
  </div>
</body>
</html>