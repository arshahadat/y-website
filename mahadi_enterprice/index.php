<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<section class="hero text-center bg-dark text-white p-5">
    <h1>Welcome to Mamun Adda</h1>
    <p>Delicious Food | Fast Delivery | Affordable Price</p>
    <a href="menu.php" class="btn btn-warning mt-3">Order Now</a>
</section>

<section class="container mt-5">
    <h2 class="text-center mb-4">Today's Special</h2>
    <div class="row">
        <?php
        $query = "SELECT * FROM menu_items ORDER BY id DESC LIMIT 4";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='assets/images/{$row['image']}' class='card-img-top' alt='{$row['name']}'>
                    <div class='card-body text-center'>
                        <h5>{$row['name']}</h5>
                        <p>৳ {$row['price']}</p>
                        <a href='order.php?id={$row['id']}' class='btn btn-primary'>Order Now</a>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
