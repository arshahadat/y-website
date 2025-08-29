<?php include __DIR__ . '/includes/header.php'; ?>
<section class="hero d-flex align-items-center text-center text-white">
  <div class="container py-5">
    <h1 class="display-5 fw-bold">Delicious Food, Fast Delivery</h1>
    <p class="lead">Fresh, affordable, and delivered to your door.</p>
    <a href="/menu.php" class="btn btn-warning btn-lg mt-2">See Menu</a>
  </div>
</section>

<section class="container my-5">
  <div class="row g-4 align-items-center">
    <div class="col-md-6">
      <img class="img-fluid rounded-3 shadow-sm" src="/assets/images/placeholder.png" alt="Food">
    </div>
    <div class="col-md-6">
      <h2 class="fw-bold">Today's Specials</h2>
      <p class="text-muted">Handpicked items curated daily. Update from admin panel.</p>
      <div class="row g-3">
        <?php
        if ($mysqli) {
          $q = $mysqli->query("SELECT id, name, price, image FROM menu_items ORDER BY id DESC LIMIT 4");
          while ($row = $q && $row = $q->fetch_assoc()) {
            $img = $row['image'] ? '/assets/images/' . htmlspecialchars($row['image']) : '/assets/images/placeholder.png';
            echo '<div class="col-6"><div class="card h-100"><img src="' . $img . '" class="card-img-top" alt="">';
            echo '<div class="card-body text-center"><h6 class="fw-semibold">' . htmlspecialchars($row['name']) . '</h6>';
            echo '<p class="mb-2">৳ ' . htmlspecialchars($row['price']) . '</p>';
            echo '<a href="/order.php?item=' . (int)$row['id'] . '" class="btn btn-sm btn-primary">Order</a></div></div></div>';
          }
        } else {
          echo '<div class="col-12"><div class="alert alert-info">Connect your database to see live specials.</div></div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
