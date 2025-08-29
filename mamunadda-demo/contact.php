<?php include __DIR__ . '/includes/header.php'; ?>
<section class="container py-5">
  <h2 class="fw-bold">Contact Us</h2>
  <p class="text-muted">Have a question or want to place a custom order? Reach out!</p>
  <div class="row g-4">
    <div class="col-md-6">
      <form method="post" action="#">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input class="form-control" name="phone" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Message</label>
          <textarea class="form-control" name="message" rows="4" required></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          echo '<div class="alert alert-success mt-3">Thanks! In demo, messages are not persisted.</div>';
        }
        ?>
      </form>
    </div>
    <div class="col-md-6">
      <div class="p-4 bg-light rounded-3 h-100">
        <h5 class="fw-semibold mb-2">Quick Chat (WhatsApp)</h5>
        <p class="small text-muted mb-3">Click to start a chat on WhatsApp.</p>
        <?php $wa = isset($whatsapp_number) ? preg_replace('/\D+/', '', $whatsapp_number) : ''; ?>
        <a class="btn btn-success" target="_blank" href="<?php echo $wa ? 'https://wa.me/' . $wa : '#'; ?>">Open WhatsApp</a>
        <hr>
        <h6 class="fw-semibold">Address</h6>
        <p class="mb-0 small text-muted">Your business address goes here.</p>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
