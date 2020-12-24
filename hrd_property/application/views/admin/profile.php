
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
								<?php if($user_details['profile_pic']!=''){?>
                                    <img class="mr-3 rounded-circle float-right" width="150" src="<?php echo base_url('assets/profile_pics/'.$user_details['profile_pic']); ?>" alt="avatar">
                                <?php }else{?>
								<img class="mr-3 rounded-circle float-right" width="150" src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpeg" alt="avatar">
								  <?php }?>
								</div>
                                <div class="col-md-7">
                                    <div class="mb-2">
                                        <b class="mr-1">Role</b> : <span class="ml-1"><?php echo isset($user_details['role_name'])?$user_details['role_name']:'' ?></span>
                                    </div> 
									<div class="mb-2">
                                        <b class="mr-1">Employee name</b> : <span class="ml-1"><?php echo isset($user_details['name'])?$user_details['name']:'' ?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Email Id</b> : <span class="ml-1"><?php echo isset($user_details['email'])?$user_details['email']:'' ?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Mobile Number</b> : <span class="ml-1"><?php echo isset($user_details['mobile_number'])?$user_details['mobile_number']:'' ?></span>
                                    </div>
									 <div class="mb-2">
                                        <b class="mr-1">Alt Mobile Number</b> : <span class="ml-1"><?php echo isset($user_details['alt_mobile_number'])?$user_details['alt_mobile_number']:'' ?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Age</b> : <span class="ml-1"><?php echo isset($user_details['age'])?$user_details['age']:'' ?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Experience</b> : <span class="ml-1"><?php echo isset($user_details['experience'])?$user_details['experience']:'' ?></span>
                                    </div>
									 <div class="mb-2">
                                        <b class="mr-1">Date of Birth</b> : <span class="ml-1"><?php echo isset($user_details['dob'])?$user_details['dob']:'' ?></span>
                                    </div>
                                <div class="mb-2">
                                        <b class="mr-1">Location</b> : <span class="ml-1"><?php echo isset($user_details['location'])?$user_details['location']:'' ?></span>
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
                            <form id="add_category" method="post" action="<?php echo base_url('profile/post'); ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Employee name</label>
                                    <input type="text"  name="name" value="<?php echo isset($user_details['name'])?$user_details['name']:'' ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text"  name="email" value="<?php echo isset($user_details['email'])?$user_details['email']:'' ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile_number" value="<?php echo isset($user_details['mobile_number'])?$user_details['mobile_number']:'' ?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Alt Mobile Number</label>
                                    <input  type="text" class="form-control" name="alt_mobile_number" value="<?php echo isset($user_details['alt_mobile_number'])?$user_details['alt_mobile_number']:'' ?>">
                                </div>
								
								
								<div class="form-group">
                                    <label>Age</label>
                                    <input type="text"  name="age" value="<?php echo isset($user_details['age'])?$user_details['age']:'' ?>" class="form-control">
                                </div>

								
								<div class="form-group">
                                    <label>Experience</label>
                                    <input type="text"  name="experience" value="<?php echo isset($user_details['experience'])?$user_details['experience']:'' ?>" class="form-control">
                                </div>

								<div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date"  name="dob" value="<?php echo isset($user_details['dob'])?$user_details['dob']:'' ?>" class="form-control">
                                </div>
								
								<div class="form-group">
                                    <label>Location</label>
                                    <input type="text"  name="location" value="<?php echo isset($user_details['location'])?$user_details['location']:'' ?>" class="form-control">
                                </div>
								
								
                                <div class="form-group">
                                    <label class="form-control-label">Profile Pic</label>
                                    <input type="file"  name="profile_pic" class="form-control">
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


<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             name: {
                validators: {
					notEmpty: {
						message: 'Employee name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			role_id: {
                validators: {
					notEmpty: {
						message: 'Role is required'
					},
					
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
				password: {
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
           
           confirm_password: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and Confirm Password do not match'
					}
					}
				},
				dob: {
                validators: {
					notEmpty: {
								message: 'Date of Birth is required'
						},
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The value is not a valid date'
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
			alt_mobile_number: {
                 validators: {
					notEmpty: {
						message: 'Alt Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Alt Mobile Number must be 10 digits'
					}
				
				}
            },
			age: {
                validators: {
					notEmpty: {
						message: 'Age is required'
					}
				}
            },
			experience: {
                validators: {
					notEmpty: {
						message: 'Experience is required'
					}
				}
            },
			location: {
                 validators: {
					notEmpty: {
						message: 'Location is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Location wont allow <> [] = % '
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
            },
			
			
			
			
			
            }
        })
     
});

</script>
