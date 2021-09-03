Mix Manifest plugin for Craft 3
===

A minimal Craft 3 plugin to load assets from `mix-manifest.json`

### Installation

```bash
composer require leowebguy/mix-manifest
```

On your Control Panel, go to Settings → Plugins → "Mix Manifest" → Install

### Usage

Find versioned file from `/js/app.js`

```html
<link rel="stylesheet" href="{{ mix('/js/app.js') }}">
```

output 👇

```html
<link rel="stylesheet" href="/js/app.js?id=1b26b5dcee58a5ecb27d">
```

---

You may also pass a different `mix-manifest.json` filename

`{{ mix('/js/app.js', 'my-manifest.json') }}`
