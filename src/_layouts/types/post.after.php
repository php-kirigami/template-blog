<?php
/**
 * prepros.types.post.after — closes what post.before.php opened.
 */

$post_tags = array_filter(array_map('trim', explode(',', $tags ?? '')));
?>
    </div>

    <?php if ($post_tags): ?>
        <ul class="tags">
            <?php foreach ($post_tags as $tag): ?>
                <li><?php echo str_htmlesc($tag); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p class="post__back"><a href="<?php echo $relroot; ?>posts/">← All posts</a></p>
</article>
