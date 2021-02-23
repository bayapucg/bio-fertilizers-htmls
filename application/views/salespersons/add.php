

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Sales </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Sales Person</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php  echo base_url('salespersons/addpost');?>">
                            <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-6">
                                            <label>Full name </label>
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label>Email ID </label>
                                            <input id="email" type="text" class="form-control" name="email">
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>Password</label>
                                            <input id="password" type="password" class="form-control" name="password">
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>Confirm Password</label>
                                            <input id="org_password" type="password" class="form-control" name="org_password">
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>Mobile Number  </label>
                                            <input id="mobile_number" type="text" class="form-control" name="mobile_number">
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>Alt Mobile Number  </label>
                                            <input id="alt_mobile_number" type="text" class="form-control" name="alt_mobile_number">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Aadhar Number </label>
                                            <input id="aadhar_number" type="text" class="form-control" name="aadhar_number">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Qualification</label>
                                            <input id="qualification" type="text" class="form-control" name="qualification">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Date of Birth</label>
                                            <input id="dob" type="date" class="form-control" name="dob">
                                        </div>
										
										<div class="form-group  col-md-12">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address"></textarea>
                                        </div>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" class="btn btn-primary ">
                                            Submit
                                        </button>
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
           
           org_password: {
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
			qualification: {
                validators: {
					notEmpty: {
						message: 'Qualification is required'
					}
				}
            },
			aadhar_number: {
                validators: {
					notEmpty: {
						message: 'Aadhar Number is required'
					},
					regexp: {
					regexp:   /^[0-9]{11,16}$/,
					message:'Aadhar Number must be 11 to 16 digits'
					}
				}
            },
			address: {
                 validators: {
					  notEmpty: {
						message: 'Address is required'
					},
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Address wont allow <>[]'
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
