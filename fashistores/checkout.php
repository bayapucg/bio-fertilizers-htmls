<?php include("header.php"); ?>
	  <section class="checkout-section spad" style="background: url('img/bg-img.png') ">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                       
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label>
                                <input type="text" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input type="text" id="last">
                            </div>
							   <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" id="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="phone">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                               <textarea class="form-control" rows="8"></textarea>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                       
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <li class="fw-normal">Combination x 1 <span>$60.00</span></li>
                                    <li class="fw-normal">Combination x 1 <span>$60.00</span></li>
                                   
                                    <li class="fw-normal">Subtotal <span>$120.00</span></li>
                                    <li class="total-price">Total <span>$120.00</span></li>
                                </ul>
                               
                                <div class="order-btn">
                                    <button type="submit" class=" btn btn-block btn-site rounded-0">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php include("footer.php"); ?>