<?php
/**
 * @title    Posts
 * @section  posts
 * @abstract Every post, newest first.
 */

// Group by year: [2026 => [post, …], 2025 => […]]
$years = [];
foreach (blog_posts() as $post) {
    $years[substr($post->date, 0, 4)][] = $post;
}
?>

<section class="section wrap">
    <h1><?php echo str_htmlesc($title); ?></h1>
    <p class="lead"><?php echo str_htmlesc($abstract); ?></p>

    <?php foreach ($years as $year => $posts): ?>
        <h2 class="year"><?php echo $year; ?></h2>
        <div class="entries">
            <?php foreach ($posts as $post): ?>
                <?php echo blog_entry($post, $relroot); ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</section>
