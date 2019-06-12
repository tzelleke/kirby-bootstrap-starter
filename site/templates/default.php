<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $page->title()->h() ?></title>
  <?= mix('/site.css') ?>
</head>
<body>

<div class="container">
  <h1><?= $page->title()->h() ?></h1>
</div>

<?= mix('/manifest.js') ?>
<?= mix('/vendor.js') ?>
<?= mix('/site.js') ?>
</body>
</html>