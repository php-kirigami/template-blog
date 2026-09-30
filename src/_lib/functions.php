<?php
/**
 * prepros.includes entry — include_once'd before any page renders.
 *
 * Blog helpers: every folder under src/posts/ that holds an _index.php is a
 * post. Its PHPDOC block is the post's front matter:
 *
 *   @title    Post title
 *   @date     2026-09-01          (required, YYYY-MM-DD)
 *   @abstract One-sentence summary (lists, SEO description)
 *   @tags     php, static         (comma separated, optional)
 *   @draft    true                (optional: hidden from the lists; the page
 *                                  is still built — add @robots noindex)
 */


/**
 * All published posts, newest first. Each entry is the parsed PHPDOC of the
 * post plus ->slug, ->url (relative to the site root) and ->tag_list (array).
 *
 * @return object[]
 */
function blog_posts(): array
{
    $posts = [];

    foreach (glob(dirname(__DIR__) . '/posts/*/_index.php') ?: [] as $file) {
        // FS::phpFileInfo() caches and returns a shared object: clone it so
        // the keys added below don't leak into the post's own page variables.
        $info = FS::phpFileInfo($file);
        if (!$info || empty($info->date)) continue;
        $info = clone $info;
        if (in_array(strtolower(trim((string) ($info->draft ?? ''))), ['1', 'true', 'yes', 'on'], true)) continue;

        $info->slug     = basename(dirname($file));
        $info->url      = 'posts/' . $info->slug . '/';
        $info->tag_list = array_values(array_filter(array_map('trim', explode(',', $info->tags ?? ''))));
        $posts[]        = $info;
    }

    usort($posts, fn($a, $b) => strcmp($b->date, $a->date));
    return $posts;
}

/** "2026-09-01" → a <time> element reading "September 1, 2026". */
function blog_date(string $date): string
{
    return '<time datetime="' . str_htmlesc($date) . '">'
        . date('F j, Y', strtotime($date)) . '</time>';
}

/** One post as a list entry (home page + archive). */
function blog_entry(object $post, string $relroot): string
{
    $tags = '';
    foreach ($post->tag_list as $tag) {
        $tags .= '<li>' . str_htmlesc($tag) . '</li>';
    }

    return '<article class="entry">'
        . '<p class="entry__meta">' . blog_date($post->date) . '</p>'
        . '<h3 class="entry__title"><a href="' . $relroot . $post->url . '">' . str_htmlesc($post->title) . '</a></h3>'
        . (empty($post->abstract) ? '' : '<p class="entry__abstract">' . str_htmlesc($post->abstract) . '</p>')
        . ($tags === '' ? '' : '<ul class="tags">' . $tags . '</ul>')
        . '</article>';
}


/* Markdown shortcode — {% lead A short highlighted intro %}
 * Works inside .md data files and <markdown> blocks. */
md_register_plugin('lead', function (array $args, string $body): string {
    $text = trim($body !== '' ? $body : implode(' ', $args));
    return $text === '' ? '' : '<p class="lead">' . str_htmlesc($text) . '</p>';
});
