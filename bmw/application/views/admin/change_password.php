
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
						 <form method="post" action="<?php echo base_url('profile/changepasswordpost'); ?>" id="change_password" name="change_password">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="oldpassword" id="oldpassword" placeholder="Enter Old Password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" id="password" name="password" placeholder="Enter New Password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm New Password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>


        
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
