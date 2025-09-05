<?php
// expects $editCity variable to be defined before including this file
?>

<h3><?php echo $editCity ? 'Edit City' : 'Add City'; ?></h3>
<form method="post">
  <?php if ($editCity): ?>
    <input type="hidden" name="id" value="<?php echo $editCity['id']; ?>">
  <?php endif; ?>
  <input type="text" name="name" placeholder="City Name" required value="<?php echo $editCity ? htmlspecialchars($editCity['name']) : ''; ?>">
  <br>
  <textarea name="description" placeholder="Description" required><?php echo $editCity ? htmlspecialchars($editCity['description']) : ''; ?></textarea>
  <br>
  <button type="submit" name="<?php echo $editCity ? 'edit' : 'add'; ?>">
    <?php echo $editCity ? 'Update' : 'Add'; ?>
  </button>
  <?php if ($editCity): ?>
    <a href="index.php">Cancel</a>
  <?php endif; ?>
</form>
