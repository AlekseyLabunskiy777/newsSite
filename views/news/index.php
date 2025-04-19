<h1>Новини</h1>
<?php if (empty($news)): ?>
    <p>Новин немає.</p>
    <?php else: ?>
        <?php foreach ($news as $item): ?>
            <div class="news-item">
                <h2><?php echo htmlspecialchars($item['title']); ?></h2>
                <p><small><?php echo $item['created_at']; ?></small></p>
                <p><?php echo htmlspecialchars($item['short_description']); ?></p>
                <a href="index.php?route=view&id=<?php echo $item['id']; ?>">Детальніше</a>
            </div>
        <?php endforeach; ?>
<?php endif; ?>
