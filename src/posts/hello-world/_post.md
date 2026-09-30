{% lead Every post is a folder with two files: a tiny `_index.php` and a Markdown body. %}

Welcome. This blog is a [Kirigami](https://github.com/php-kirigami/kirigami)
site, so it compiles to plain static HTML: no server, no database, nothing to
patch.

## Writing a post

1. Create `src/posts/<slug>/_index.php` with a PHPDOC block (`@title`, `@date`, `@abstract`, `@tags`, `@type post`, `@content _post.md`).
2. Write the text in `src/posts/<slug>/_post.md`.
3. Run `npx kiri serve` and open the page.

The home page and the archive pick the new post up automatically, sorted by
`@date`.

## Publishing

Push to `main`: the included GitHub Actions workflow builds the site and
deploys it to GitHub Pages.
