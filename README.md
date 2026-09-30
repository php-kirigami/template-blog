<div align="center">

<img src="https://zmotrin.github.io/assets/kirigami/kirigami-logo-universal.svg" alt="Kirigami" width="400" />

---

# Kirigami blog

A blog template for **[Kirigami](https://github.com/php-kirigami/kirigami)** —
`kiri create blog` clones it.

[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE)
[![Node](https://img.shields.io/badge/node-%3E%3D24.0.0-brightgreen)](#develop)

</div>

---

Posts written in Markdown (one `_index.md` each), compiled to dependency-free static HTML — no PHP
install, no server, no database. A home page with the latest posts, an archive
grouped by year, a post layout with date and tags, dark mode, build-time syntax
highlighting and `BlogPosting` JSON-LD.

## Develop

```console
npm install
npx kiri serve      # build, then rebuild on save with a live-reloading local server
```

`npx kiri build` does a one-off build; `npx kiri export` writes a production site
into `dist/`. In VS Code, the recommended Kirigami extension runs the same
commands and the dev server from the Command Palette and the status bar.

## Write a post

A post is a folder under `src/posts/` holding one file, `_index.md`. The folder
name is the URL slug. The `@tag` lines at the top are the post's header, then a
blank line, then the text in GitHub-flavoured Markdown:

```markdown
@title    My first post
@type     post
@date     2026-10-05
@abstract One sentence shown in the lists and as the SEO description.
@tags     notes, travel
@ld_type  BlogPosting
@og_type  article

The text of the post, in **Markdown**.
```

The home page and `posts/` pick it up automatically, newest `@date` first. Add
`@draft true` to keep a post out of the lists while you write it (the page is
still built, so pair it with `@robots noindex, nofollow` or keep it out of git).

## Layout

```
kirigami.yaml                 # the one config file
src/
  _layouts/header.php         # wraps every page (prepros.before)
  _layouts/footer.php         # wraps every page (prepros.after)
  _layouts/types/page.*.php   # title + lead around pages with @type page
  _layouts/types/post.*.php   # date, title, lead and tags around @type post
  _lib/functions.php          # blog_posts(), blog_entry(), blog_date()
  _index.php                  # → index.html (latest posts)
  posts/_index.php            # → posts/index.html (archive by year)
  posts/<slug>/_index.md      # → posts/<slug>/index.html (one Markdown page per post)
  about/_index.php            # → about/index.html
  styles/kirigami.core.scss   # Sass entry — partials/_conf.scss holds the theme
  scripts/kirigami.core.js    # esbuild entry
assets/fonts/                 # inlined by the Sass font pipeline
```

Retheme in `src/styles/partials/_conf.scss` — it `@forward`s
`@kirigami/canva/conf`, so every design token (palette, dark mode, fonts) is one
override away. `sitemap.xml` and `robots.txt` are generated from
`kirigami.baseurl`. Pushing to `main` deploys to GitHub Pages through
`.github/workflows/page.yml`.

## Kiri Studio

The `studio:` block in `kirigami.yaml` lets a client add, edit and delete posts from
[Kiri Studio](https://github.com/php-kirigami/kiri-studio) without touching Git: each new
post starts from the `header` defaults there. Remove the block for a developer-only site.

MIT
