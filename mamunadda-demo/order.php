<?php include __DIR__ . '/includes/header.php'; ?>
<section class="container py-5">
  <h2 class="fw-bold mb-4">Place an Order</h2>
  <form method="post">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Customer Name</label>
        <input class="form-control" name="customer_name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input class="form-control" name="phone" required>
      </div>
      <div class="col-md-12">
        <label class="form-label">Address</label>
        <textarea class="form-control" name="address" rows="2" required></textarea>
      </div>
      <div class="col-md-8">
        <label class="form-label">Select Item</label>
        <select class="form-select" name="item_id" required>
          <option value="">Choose...</option>
          <?php
          if ($mysqli) {
            $res = $mysqli->query("SELECT id, name, price FROM menu_items ORDER BY name ASC");
            while ($opt = $res && $opt = $res->fetch_assoc()) {
              $sel = (isset($_GET['item']) && (int)$_GET['item'] === (int)$opt['id']) ? 'selected' : '';
              echo '<option ' . $sel . ' value="' . (int)$opt['id'] . '">' . htmlspecialchars($opt['name']) . ' — ৳ ' . htmlspecialchars($opt['price']) . '</option>';
            }
          } else {
            echo '<option>Connect DB to load items</option>';
          }
          ?>
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">Quantity</label>
        <input type="number" class="form-control" name="qty" value="1" min="1" required>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit Order</button>
      </div>
    </div>
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && $mysqli) {
    $name = $mysqli->real_escape_string($_POST['customer_name']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $item_id = (int)$_POST['item_id'];
    $qty = max(1, (int)$_POST['qty']);

    $item = $mysqli->query("SELECT id, name, price FROM menu_items WHERE id = $item_id")->fetch_assoc();
    if ($item) {
      $total = $item['price'] * $qty;
      $items_json = json_encode([['id'=>$item['id'],'name'=>$item['name'],'qty'=>$qty,'price'=>$item['price']]], JSON_UNESCAPED_UNICODE);
      $stmt = $mysqli->prepare("INSERT INTO orders (customer_name, phone, address, items, total_price, status) VALUES (?,?,?,?,?, 'Pending')");
      $stmt->bind_param("ssssd", $name, $phone, $address, $items_json, $total);
      $stmt->execute();
      echo '<div class="alert alert-success mt-4">Order placed! Your total is ৳ ' . number_format($total, 2) . '.</div>';
    } else {
      echo '<div class="alert alert-danger mt-4">Invalid item selected.</div>';
    }
  }
  ?>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
