@title    Writing in Markdown
@type     post
@date     2026-09-15
@abstract A tour of what the Markdown engine gives you for free.
@tags     markdown, writing
@ld_type  BlogPosting
@og_type  article

Kirigami ships a GitHub-flavoured Markdown engine, so most posts need nothing
else.

## Formatting

Text can be **bold**, *italic*, ~~struck~~ or `inline code`, and links can be
[inline](https://example.com) or bare: https://example.com.

> [!TIP]
> Alerts render as styled callouts: `[!NOTE]`, `[!TIP]`, `[!WARNING]`.

## Lists and tables

- [x] Task lists
- [x] Footnotes[^1]
- [ ] Your next idea

| Tag     | Where                      |
|:--------|:---------------------------|
| `@tags` | post header                |
| `@date` | sorting, `<time>`, JSON-LD |

## Code

```js
const greet = (name) => `Hello, ${name}!`;
```

[^1]: Like this one.
