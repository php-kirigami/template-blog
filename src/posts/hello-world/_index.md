@title    Hello, world
@type     post
@date     2026-09-01
@abstract The first post: how this blog is put together.
@tags     meta, kirigami
@ld_type  BlogPosting
@og_type  article

{% lead Every post is a folder holding a single Markdown file with a short header on top. %}

Welcome. This blog is a [Kirigami](https://github.com/php-kirigami/kirigami)
site, so it compiles to plain static HTML: no server, no database, nothing to
patch.

## Writing a post

1. Create `src/posts/<slug>/_index.md`.
2. Start it with the header (`@title`, `@type post`, `@date`, `@abstract`, `@tags`), then a blank line.
3. Write the text in Markdown below it, and run `npx kiri serve`.

The home page and the archive pick the new post up automatically, sorted by
`@date`.

## Publishing

Push to `main`: the included GitHub Actions workflow builds the site and
deploys it to GitHub Pages.
