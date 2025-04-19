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
        <div class="pagination">
            <?php if (isset($pagination['page']) && $pagination['page'] > 1): ?>
                <a href="index.php?page=<?php echo $pagination['page'] - 1; ?>">« Попередня</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                <a href="index.php?page=<?php echo $i; ?>" <?php echo $i == $pagination['page'] ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
            <?php if ($pagination['page'] < $pagination['total_pages']): ?>
                <a href="index.php?page=<?php echo $pagination['page'] + 1; ?>">Наступна »</a>
            <?php endif; ?>
        </div>
<?php endif; ?>
