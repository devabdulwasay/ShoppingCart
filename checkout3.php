<!DOCTYPE html>
<html lang="en">
<?php
  include('include/header.php');
  include('include/connect.php');
  
  ?>
       <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Checkout</h1><p class="lead">You currently have 3 item(s) in your basket</p>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Checkout Forms-->
    <section class="checkout">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="checkout.php" class="nav-link">Address</a></li>
              <li class="nav-item"><a href="checkout2.php" class="nav-link">Delivery Method </a></li>
              <li class="nav-item"><a href="checkout3.php" class="nav-link active">Payment Method </a></li>
              <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
            </ul>
            <div class="tab-content">
              <div id="payment-method" class="tab-block">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="card">
                    <div id="headingOne" role="tab" class="card-header">
                      <h6><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Credit Card</a></h6>
                    </div>
                    <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" class="collapse show">
                      <div class="card-body">
                        <form action="#" method="POST">
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label for="card-name" class="form-label">Name on Card</label>
                              <input type="text" name="card-name" placeholder="Name on card" id="card-name" class="form-control" value="<?php echo $_SESSION['name']?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="card-number" class="form-label">Card Number</label>
                              <input type="text" name="card-number" placeholder="Card number" id="card-number" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="expiry-date" class="form-label">Expiry Date</label>
                              <input type="date" name="expiry-date" placeholder="MM/YY" id="expiry-date" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="cvv" class="form-label">CVC/CVV</label>
                              <input type="text" name="cvv" placeholder="123" id="cvv" class="form-control">
                            </div>
                          </div>
                          <button type="submit" name="insert">Continue to order review<i class="fa fa-angle-right"></i></button>
                        </form>

                        <?php
                        if(isset($_POST['insert']))
                        {
                          $card = $_POST['card-number'];  
                          $expiry = $_POST['expiry-date'];  
                          $cvv = $_POST['cvv'];
                          $order_no = $_GET['order-no'];
                          
                          $sql_query = "INSERT INTO `order_details`(`order_no`, `credit_card`, `cvv`, `expiry_date`) VALUES ('$order_no','$card','$cvv','$expiry')";
                          $query = mysqli_query($con,$sql_query);
                          if($query)
                          {
                            header('location:checkout4.php');
                          }
                          else{
                            echo "Undefined Card";
                          }
                        }
                        
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div id="headingTwo" role="tab" class="card-header">
                      <h6><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">Paypal</a></h6>
                    </div>
                    <div id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" class="collapse">
                      <div class="card-body">
                        <input type="radio" name="shippping" id="payment-method-1" class="radio-template">
                        <label for="payment-method-1"><strong>Continue with Paypal</strong><br><span class="label-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></label>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div id="headingThree" role="tab" class="card-header">
                      <h6><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsed">Pay on delivery</a></h6>
                    </div>
                    <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="collapse">
                      <div class="card-body">
                        <input type="radio" name="shippping" id="payment-method-2" class="radio-template">
                        <label for="payment-method-2"><strong>Pay on Delivery</strong><br><span class="label-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a href="checkout2.php" class="btn btn-template-outlined wide prev"><i class="fa fa-angle-left"></i>Back to delivery method</a></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block-body order-summary">
              <h6 class="text-uppercase">Order Summary</h6>
              <p>Shipping and additional costs are calculated based on values you have entered</p>
              <ul class="order-menu list-unstyled">
                <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>$390.00</strong></li>
                <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$10.00</strong></li>
                <li class="d-flex justify-content-between"><span>Tax</span><strong>$0.00</strong></li>
                <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">$400.00</strong></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
  include('include/footer.php');
  ?>
   
  </body>

</html>