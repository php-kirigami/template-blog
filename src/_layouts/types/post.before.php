<?php
/**
 * prepros.types.post.before — opens a blog post (@type post), inside the
 * global header. The post itself only writes its body (an `@content _post.md`
 * Markdown file); its @title, @date, @abstract and @tags form the heading.
 */
?>
<article class="section wrap post">
    <header class="post__head">
        <p class="post__meta"><?php echo blog_date($date); ?></p>
        <h1><?php echo str_htmlesc($title); ?></h1>
        <?php if (!empty($abstract)): ?>
            <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
        <?php endif; ?>
    </header>

    <div class="prose">
