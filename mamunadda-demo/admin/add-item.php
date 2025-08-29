<?php include __DIR__ . '/../includes/header.php'; ?>
<div class="container py-5">
  <h2 class="fw-bold mb-4">Add Menu Item</h2>
  <form method="post">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input class="form-control" name="name" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Price (৳)</label>
        <input class="form-control" type="number" step="0.01" min="0" name="price" required>
      </div>
      <div class="col-md-12">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
      </div>
      <div class="col-md-6">
        <label class="form-label">Image filename (upload manually to /assets/images)</label>
        <input class="form-control" name="image">
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </div>
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && $mysqli) {
    $name = $mysqli->real_escape_string($_POST['name']);
    $price = (float)$_POST['price'];
    $desc = $mysqli->real_escape_string($_POST['description']);
    $image = $mysqli->real_escape_string($_POST['image']);
    $stmt = $mysqli->prepare("INSERT INTO menu_items (name, price, description, image) VALUES (?,?,?,?)");
    $stmt->bind_param("sdss", $name, $price, $desc, $image);
    $stmt->execute();
    echo '<div class="alert alert-success mt-3">Item saved!</div>';
  }
  ?>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
