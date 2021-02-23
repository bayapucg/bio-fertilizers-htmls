<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Employee </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Employee</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php  echo base_url('employee/editpost');?>" enctype="multipart/form-data">
                         <input type="hidden" name="e_id" id="e_id" value="<?php echo isset($employee_details['e_id'])?$employee_details['e_id']:'' ?>"  >  
						   <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-4">
                                            <label>Name</label>
                                            <input  type="text" class="form-control" name="name" value="<?php echo isset($employee_details['name'])?$employee_details['name']:'' ?>">
                                        </div>
                                        <!--<div class="form-group  col-md-4">
                                            <label>Role </label>
                                           <div>
											<select name="role_id" class="selectpicker form-control"  data-live-search="true">
											<option value="">Select</option>
											<?php if(isset($roles_list)&& count($roles_list)>0){ ?>
											<?php foreach ($roles_list as $list){ ?>
											<option value="<?php echo $list['r_id']; ?>"><?php echo $list['role_name']; ?></option>
											<?php }?>
											<?php }?>
								          </select>
										   </div>
                                        </div>-->
										<div class="form-group  col-md-4">
                                            <label>Email ID</label>
                                            <input  type="text" class="form-control" name="email" value="<?php echo isset($employee_details['email'])?$employee_details['email']:'' ?>">
                                        </div>
										
										<div class="form-group col-md-4">
                                            <label>City</label>
											<select id="city" name="city"  class="form-control" >
										    <option value="">Select</option>
											<?php foreach ($city_list as $list){ ?>
											<?php if($list['c_id']==$employee_details['city']){ ?>
											<option selected value="<?php echo $list['c_id']; ?>"><?php echo $list['city']; ?></option>
											<?php }else{ ?>
											<option value="<?php echo $list['c_id']; ?>"><?php echo $list['city']; ?></option>
											<?php } ?>
											<?php }?>
											
										</select>
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Mobile Number</label>
                                            <input  type="text" class="form-control" name="mobile_number" value="<?php echo isset($employee_details['mobile_number'])?$employee_details['mobile_number']:'' ?>">
                                        </div>
										
										
										<div class="form-group  col-md-4">
                                            <label>Address</label>
                                            <input  type="text" class="form-control" name="address" value="<?php echo isset($employee_details['address'])?$employee_details['address']:'' ?>">
                                        </div>
										
										
										<div class="form-group  col-md-4">
                                            <label>Profile Pic</label>
                                            <input  type="file" class="form-control" name="profile_pic">
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
					message:'Name wont allow <> [] = % '
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
			address: {
                 validators: {
					notEmpty: {
						message: 'Address is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address wont allow <> [] = % '
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
