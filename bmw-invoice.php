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
                            <h4>Generate BMW invoice </h4>
                        </div>
                        <div class="card-body">
						 <form method="" id="add_category" action="">
                            <div class="row ">
							<div class="form-group col-md-6">
								<label>Select Hospital</label>
								<select class="form-control">
									<option>Select</option>
									<option>Hospital-1</option>
									<option>Hospital-2</option>
									<option>Hospital-3</option>
									<option>Hospital-4</option>
									<option>Hospital-5</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Select Month</label>
								<select class="form-control">
									<option>Select</option>
									<option>January</option>
									<option>February</option>
									<option>March</option>
									<option>April</option>
									<option>May</option>
									<option>June</option>
									<option>July</option>
									<option>August</option>
									<option>September</option>
									<option>October</option>
									<option>November</option>
									<option>December</option>
								</select>
							</div>
                               <div class="col-md-12 text-center">
								<a href="view-bill.php" class="btn btn-primary">Generate Bill</a>
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
