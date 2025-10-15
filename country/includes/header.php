<?php
// includes/header.php
// Renders the site header and navigation

function renderHeader($cities){ ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Paris • Tokyo • London</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <div class="brand">
    <div class="logo">PTL</div>
    <div>
      <div style="font-weight:700">Paris • Tokyo • London</div>
      <div style="font-size:13px;color:rgba(230,238,248,0.65)">A modular PHP + CSS demo</div>
    </div>
  </div>
  <nav>
    <?php foreach ($cities as $c): ?>
      <a href="?city=<?php echo htmlspecialchars($c['id']) ?>"><?php echo htmlspecialchars($c['name']) ?></a>
    <?php endforeach; ?>
    <a href="?">All</a>
  </nav>
</header>
<?php } ?>