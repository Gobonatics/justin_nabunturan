<?php
require_once 'city.php';

// Handle Add
if (isset($_POST['add'])) {
  addCity($_POST['name'], $_POST['description']);
  header("Location: index.php");
  exit;
}

// Handle Edit
if (isset($_POST['edit'])) {
  updateCity($_POST['id'], $_POST['name'], $_POST['description']);
  header("Location: index.php?city=" . intval($_POST['id']));
  exit;
}

$cities = getCities();

$editCity = null;
$showAddForm = false;
if (isset($_GET['edit'])) {
  $editCity = getCityById($_GET['edit']);
}
if (isset($_GET['add'])) {
  $showAddForm = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h2>Cities</h2>
</header>

<section>
  <nav>
    <ul>
      <?php foreach ($cities as $city): ?>
        <li>
          <a href="?city=<?php echo $city['id']; ?>"><?php echo htmlspecialchars($city['name']); ?></a>
          <a href="?edit=<?php echo $city['id']; ?>">[Edit]</a>
        </li>
      <?php endforeach; ?>
    </ul>
    <br>
    <a href="?add=1">
      <button type="button">Add City</button>
    </a>
  </nav>
  
  <article>
    <?php
    $selectedCity = null;
    if (isset($_GET['city'])) {
      foreach ($cities as $city) {
        if ($city['id'] == $_GET['city']) {
          $selectedCity = $city;
          break;
        }
      }
    }
    if ($selectedCity):
    ?>
      <h1><?php echo htmlspecialchars($selectedCity['name']); ?></h1>
      <p><?php echo htmlspecialchars($selectedCity['description']); ?></p>
    <?php elseif (!$editCity && !$showAddForm): ?>
      <h1>Welcome</h1>
      <p>Select a city from the menu.</p>
    <?php endif; ?>

    <!-- Add/Edit Form -->
    <?php
      // Only show form if editing or adding
      if ($editCity || $showAddForm) {
        // If adding, $editCity should be null
        include 'form.php';
      }
    ?>
  </article>
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>
