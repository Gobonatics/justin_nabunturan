<?php
// includes/city-card.php
// Renders a single city card

function renderCityCard($city){ ?>
<article class="card">
  <div class="media" style="background-image:url('<?php echo $city['image'] ?>')"></div>
  <div class="body">
    <div class="meta">
      <h3><?php echo htmlspecialchars($city['name']) ?></h3>
      <span>&middot; <?php echo htmlspecialchars($city['country']) ?></span>
    </div>
    <div class="desc"><?php echo htmlspecialchars($city['subtitle']) ?></div>
    <p class="desc" style="font-size:14px;margin-top:10px"><?php echo htmlspecialchars($city['description']) ?></p>
    <div class="actions">
      <a class="btn primary" href="#" data-img="<?php echo $city['image'] ?>" data-title="<?php echo htmlspecialchars($city['name']) ?>">View</a>
      <a class="btn ghost" href="<?php echo $city['map'] ?>" target="_blank">Open map</a>
    </div>
  </div>
</article>
<?php } ?>
