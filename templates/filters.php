<div id="filtersDiv" class="filters">

  <div id="filtersCategory" class="filters">
    <h1>Categories</h1>
    <?php foreach ($categoriesList as $category): ?>
      <input type="checkbox" name="category[]" id="cat" value="<?= $category; ?>"><?= $category; ?><br>
    <?php endforeach; ?>
  </div>

  <div id="filtersColor" class="filters">
    <h1>Colors</h1>
    <?php foreach ($colorsList as $color): ?>
      <input type="checkbox" name="color[]" id="col" value="<?= $color; ?>"><label for="col" class="color-<?= $color; ?>"><?= $color; ?></label><br>
    <?php endforeach; ?>
  </div>

</div>
