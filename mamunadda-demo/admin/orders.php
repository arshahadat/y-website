<?php include __DIR__ . '/../includes/header.php'; ?>
<div class="container py-5">
  <h2 class="fw-bold mb-4">Orders</h2>
  <?php if ($mysqli): ?>
    <?php
      if (isset($_POST['order_id'], $_POST['status'])) {
        $oid = (int)$_POST['order_id'];
        $st = $_POST['status'];
        $stmt = $mysqli->prepare("UPDATE orders SET status=? WHERE id=?");
        $stmt->bind_param("si", $st, $oid);
        $stmt->execute();
        echo '<div class="alert alert-success">Status updated.</div>';
      }
      $res = $mysqli->query("SELECT * FROM orders ORDER BY id DESC");
    ?>
    <div class="table-responsive">
      <table class="table table-sm align-middle">
        <thead><tr><th>ID</th><th>Customer</th><th>Phone</th><th>Total</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        <?php while ($row = $res && $row = $res->fetch_assoc()): ?>
          <tr>
            <td><?= (int)$row['id'] ?></td>
            <td><?= htmlspecialchars($row['customer_name']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td>৳ <?= number_format((float)$row['total_price'],2) ?></td>
            <td><span class="badge bg-secondary"><?= htmlspecialchars($row['status']) ?></span></td>
            <td>
              <form method="post" class="d-flex gap-2">
                <input type="hidden" name="order_id" value="<?= (int)$row['id'] ?>">
                <select class="form-select form-select-sm w-auto" name="status">
                  <?php foreach (['Pending','Processing','Delivered'] as $s): ?>
                    <option value="<?= $s ?>" <?= $s===$row['status']?'selected':'' ?>><?= $s ?></option>
                  <?php endforeach; ?>
                </select>
                <button class="btn btn-sm btn-primary" type="submit">Update</button>
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info">Connect your database to manage orders.</div>
  <?php endif; ?>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
