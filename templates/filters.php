<div id="filtersDiv" class="filters">

  <div class="filtersCategory">
    <h1>Categories</h1>
    <?php foreach ($categoriesList as $category): ?>
      <input type="checkbox" name="category[]" id="cat" value="<?= $category; ?>"><?= $category; ?><br>
    <?php endforeach; ?>
  </div>

  <div class="filtersColor">
    <h1>Colors</h1>
    <?php foreach ($colorsList as $color): ?>
      <input type="checkbox" name="color[]" id="col" value="<?= $color; ?>"><?= $color; ?><br>
    <?php endforeach; ?>
  </div>

</div>
