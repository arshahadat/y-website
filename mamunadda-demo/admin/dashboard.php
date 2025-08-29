<?php include __DIR__ . '/../includes/header.php'; ?>
<div class="container py-5">
  <h2 class="fw-bold mb-4">Admin Dashboard</h2>
  <div class="row g-3">
    <div class="col-md-4">
      <a class="card card-link h-100 p-4 text-decoration-none" href="/admin/add-item.php">
        <h5 class="fw-semibold">Add Menu Item</h5>
        <p class="text-muted small mb-0">Create or update products.</p>
      </a>
    </div>
    <div class="col-md-4">
      <a class="card card-link h-100 p-4 text-decoration-none" href="/admin/orders.php">
        <h5 class="fw-semibold">Orders</h5>
        <p class="text-muted small mb-0">View and update order status.</p>
      </a>
    </div>
  </div>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
