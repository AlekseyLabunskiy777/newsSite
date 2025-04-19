<?php if (!empty($news)): ?>
    <div class="news-item">
        <h2><?php echo htmlspecialchars($news['title']); ?></h2>
        <p><small><?php echo $news['created_at']; ?></small></p>
        <p><?php echo htmlspecialchars($news['content']); ?></p>
        <a href="/"><- повернутись</a>
    </div>
<?php else:
    echo "Пуста новина"; ?>
<?php endif; ?>
