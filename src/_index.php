<?php
/**
 * @title    Home
 * @section  home
 * @abstract Notes on making things, one post at a time.
 */

$latest = array_slice(blog_posts(), 0, 5);
?>

<section class="hero wrap">
    <h1><?php echo str_htmlesc($tagline); ?></h1>
    <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
</section>

<section class="section wrap">
    <h2>Latest posts</h2>

    <div class="entries">
        <?php foreach ($latest as $post): ?>
            <?php echo blog_entry($post, $relroot); ?>
        <?php endforeach; ?>
    </div>

    <p><a href="<?php echo $relroot; ?>posts/">All posts →</a></p>
</section>
