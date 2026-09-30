<?php
/**
 * @title    About
 * @section  about
 * @type     page
 * @abstract Who writes this blog, and how it is built.
 */
?>

<markdown>
    Hi, I'm **<?php echo str_htmlesc($author); ?>**. Edit this page in
    `src/about/_index.php` and tell readers who you are.

    ## About this template

    This is the **Kirigami blog template**: a home page with the latest posts, an
    archive grouped by year, a post layout with date and tags, dark mode and a
    small themeable stylesheet. No client-side framework; the only JavaScript is
    the theme and menu toggles.

    ## Make it yours

    - **`kirigami.yaml`**: set `project`, `baseurl`, `author`, `description`, `tagline`.
    - **`src/styles/partials/_conf.scss`**: palette, dark mode and fonts.
    - **`src/_lib/functions.php`**: the `blog_*` helpers that list posts.
</markdown>
