<!doctype html>

<head>
<title>My blog</title>
<link rel="stylesheet" href="app.css">
</head>

<body>
<?php foreach($posts as $post) : ?>
<article>
    <h1><?= $post->title; ?></h1>
</article>  
<?php endforeach; ?>  
</body>

