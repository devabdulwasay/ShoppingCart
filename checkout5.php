<!DOCTYPE html>
<html lang="en">
<?php
  include('include/header.php');
  ?>
       <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Order confirmed</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Order confirmed</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Checout Forms-->
    <section class="checkout">
      <div class="container">
        <div class="confirmation-icon"><i class="fa fa-check"></i></div>
        <h2>Thank you, Julie. Your order is confirmed.</h2>
        <p class="mb-5">Your order hasn't shipped yet but we will send you ane email when it does.</p>
        <p> <a href="customer-order.php" class="btn btn-template wide">View or manage your order</a></p>
      </div>
    </section>
    <?php
  include('include/footer.php');
  ?>
    </body>

</html>