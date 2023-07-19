<!doctype html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">
<body>
    <article>
        <h1><?=$post->title; ?></h2>

        <div>
            <?= $post->body; ?>
        </div>
    </article>

    <a href="/">Go Back</a>
</body>