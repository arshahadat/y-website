<?php include __DIR__ . '/includes/header.php'; ?>
<section class="container py-5">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="mb-0 fw-bold">Menu</h2>
    <form class="d-flex" method="get">
      <input class="form-control me-2" type="search" name="q" placeholder="Search items...">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>
  <div class="row g-4">
    <?php
    $qstr = isset($_GET['q']) ? trim($_GET['q']) : '';
    $sql = "SELECT id, name, price, description, image FROM menu_items";
    if ($qstr !== '') {
      $safe = $mysqli ? $mysqli->real_escape_string($qstr) : $qstr;
      $sql .= " WHERE name LIKE '%$safe%'";
    }
    $sql .= " ORDER BY id DESC";
    if ($mysqli) {
      $res = $mysqli->query($sql);
      if ($res && $res->num_rows) {
        while ($row = $res->fetch_assoc()) {
          $img = $row['image'] ? '/assets/images/' . htmlspecialchars($row['image']) : '/assets/images/placeholder.png';
          echo '<div class="col-md-3"><div class="card h-100">';
          echo '<img src="' . $img . '" class="card-img-top" alt="">';
          echo '<div class="card-body">';
          echo '<h6 class="fw-semibold">' . htmlspecialchars($row['name']) . '</h6>';
          echo '<p class="small text-muted">' . htmlspecialchars($row['description']) . '</p>';
          echo '<div class="d-flex align-items-center justify-content-between">';
          echo '<span class="fw-bold">৳ ' . htmlspecialchars($row['price']) . '</span>';
          echo '<a href="/order.php?item=' . (int)$row['id'] . '" class="btn btn-sm btn-primary">Order</a>';
          echo '</div></div></div></div>';
        }
      } else {
        echo '<div class="col-12"><div class="alert alert-warning">No items found.</div></div>';
      }
    } else {
      echo '<div class="col-12"><div class="alert alert-info">Connect your database to see menu items.</div></div>';
    }
    ?>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
