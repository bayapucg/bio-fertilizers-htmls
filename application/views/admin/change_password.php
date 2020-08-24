<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Change Password</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="change_password" action="<?php echo base_url('profile/changepasswordpost'); ?>" enctype="multipart/form-data">
                            <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-6">
                                            <label>Old Password</label>
                                            <input  type="password" class="form-control" name="oldpassword">
                                        </div>
                                        
										
										<div class="form-group  col-md-6">
                                            <label>New Password</label>
                                            <input  type="password" class="form-control" name="password">
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>Confirm Password</label>
                                            <input  type="password" class="form-control" name="confirmpassword">
                                        </div>
										
									
									    
										   </div>
										    <br>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" class="btn btn-primary ">
                                            Submit
                                        </button>
										</div>
                                   
                               
                          
							 </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


 <script>
	$(document).ready(function() {
    $('#change_password').bootstrapValidator({
        
        fields: {
            oldpassword: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Old Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Old Password wont allow <>[]'
					}
				}
            }, password: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
           
            confirmpassword: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and confirm Password do not match'
					}
					}
				}
            }
        })
     
});

</script>
