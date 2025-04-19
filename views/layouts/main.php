<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title ?? 'Новини'); ?></title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php echo $content; ?>
</body>
</html>
