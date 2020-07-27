<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>BMW invoice</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Otp  </h4>
                        </div>
                        <div class="card-body">
						 <form method="" id="add_category" action="">
                            <div class="row ">
							
							
							
							<div class="form-group col-md-4">
								<label>Received by</label>
								<select class="form-control">
									<option>Sale person 1</option>
									<option>Sale person 2</option>
									<option>Sale person 3</option>
									<option>Sale person 4</option>
								
									
								</select>
							</div>
							  <div class="form-group col-md-4">
										<label>Register Mobile No</label>
										<input id="image" type="text" class="form-control" value="85xxxxxx82" readonly>
									</div>
									<div class="form-group col-md-4">
										<label>Enter Otp</label>
										<input id="image" type="text" class="form-control" placeholder="Enter Otp">
									</div>
									<div class="form-group col-md-4">
										<label>&nbsp;</label>
										<div>
										<a href="update-payment.php" class="btn btn-primary">Update Payment</a>
										</div>
									</div>							   
                                   
                               
                            </div>
							 </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include("footer.php"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             name: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
            image: {
                validators: {
					notEmpty: {
						message: 'Image is required'
					},
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            }
            }
        })
     
});

</script>
