

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Profile</div>
        </h1>
        <div class="section-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>My Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
								<?php if(isset($user_details['profile_pic']) && $user_details['profile_pic']!=''){ ?>
                                    <img class="mr-3 rounded-circle float-right" width="150" src="<?php echo base_url('assets/admin_profile_pic/'.$user_details['profile_pic']); ?>" alt="avatar">
                                    <?php }else{ ?>
									<img class="mr-3 rounded-circle float-right" width="150" src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpeg" alt="avatar">
                                <?php } ?>
								</div>
                                <div class="col-md-7">
                                    <div class="mb-2">
                                        <b class="mr-1">Name</b> : <span class="ml-1"><?php echo isset($user_details['name'])?$user_details['name']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Email</b> : <span class="ml-1"><?php echo isset($user_details['email'])?$user_details['email']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Mobile Number</b> : <span class="ml-1"><?php echo isset($user_details['mobile_number'])?$user_details['mobile_number']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Gender</b> : <span class="ml-1"><?php echo isset($user_details['gender'])?$user_details['gender']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Address</b> : <span class="ml-1"><?php echo  isset($user_details['address'])?$user_details['address']:''?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form id="edit_profile" method="post" action="<?php echo base_url('profile/editpost');?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="name" name="name"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="email" name="email"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" id="mobile" name="mobile_number"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input id="address" type="text" class="form-control" name="address" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Profile Pic</label>
                                    <input type="file" id="profile_pic" name="profile_pic" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Save Changes
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

 <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#edit_profile').bootstrapValidator({
        
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
            mobile_number: {
                validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
				
				}
            },
            gender: {
                validators: {
					notEmpty: {
						message: 'Gender is required'
					}
				}
            },
           address: {
                 validators: {
					  notEmpty: {
						message: 'Address  is required'
					},
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Address wont allow <>[]'
					}
                }
            },
            profile_pic: {
                validators: {
					
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
