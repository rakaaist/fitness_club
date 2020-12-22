<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print $data['title'] ?></title>

    <?php foreach ($data['css'] as $path) : ?>
        <link rel="stylesheet" href="<?php print $path; ?>">
    <?php endforeach; ?>

    <?php foreach ($data['js'] as $path) : ?>
        <script src="<?php print $path; ?>" defer></script>
    <?php endforeach; ?>

</head>
<body class="<?php print $data['body-class'] ?? ''; ?>">
<header>
    <?php print $data['header'] ?>
</header>
<main class="<?php print $data['main-class'] ?? ''; ?>">
    <?php print $data['content']; ?>
</main>
<footer>
    <?php print $data['footer']; ?>
</footer>
</body>
</html>
