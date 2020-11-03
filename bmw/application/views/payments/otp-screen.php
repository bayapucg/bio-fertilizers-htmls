

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
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php echo base_url('payments/post');?>">
                            <div class="row ">
							
							
							
							<div class="form-group col-md-6">
								<label>Email</label>
								<input type="text" class="form-control" name="email" >
							</div>
							  <div class="form-group col-md-6">
										<label>Password</label>
										<input  type="password"  name="password"  class="form-control" >
									
									</div>
									
									<div class="form-group col-md-4">
										<label>&nbsp;</label>
										<div>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" class="btn btn-primary ">
                                            Submit
                                        </button>
										</div>
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

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             email: {
                   validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        regexp: {
                        regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
                        message: 'Please enter a valid email address. For example johndoe@domain.com.'
                        }
                    }
                },
			 password: {
                   validators: {
                        notEmpty: {
                            message: 'Password is required'
                        },
                        regexp: {
                        regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
                        message:'Password wont allow <> [] = % '
                        }
                    }
                },
         
            }
        })
     
});

</script>

