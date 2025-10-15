<?php
// index.php — working modular setup for Paris • Tokyo • London showcase

include 'data.php';
include 'includes/header.php';
include 'includes/city-card.php';
include 'includes/footer.php';

// Determine selected city if any
$selected = null;
if (!empty($_GET['city'])) {
    $key = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['city']);
    foreach ($cities as $c) {
        if ($c['id'] === $key) {
            $selected = $c;
            break;
        }
    }
}

// Render header
renderHeader($cities);
?>

<main>
  <section class="hero">
    <div>
      <h1 class="title">Explore three iconic cities</h1>
      <p class="lead">This modular PHP showcase displays Paris, Tokyo, and London — easily expandable with more cities.</p>
    </div>
    <div class="hero-inner">
      <div style="padding:12px;border-radius:10px;background:rgba(255,255,255,0.02)">
        <strong>Quick tips</strong>
        <div style="font-size:13px;color:rgba(230,238,248,0.7);margin-top:8px">
          Click any card's “View” button to open an image. Use navigation links to filter cities.
        </div>
      </div>
    </div>
  </section>

  <section class="grid">
    <?php foreach ($cities as $city): ?>
      <?php if ($selected && $selected['id'] !== $city['id']) continue; ?>
      <?php renderCityCard($city); ?>
    <?php endforeach; ?>
  </section>
</main>

<?php renderFooter(); ?>