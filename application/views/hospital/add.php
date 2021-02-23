
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Hospital</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Hospital</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php echo base_url('hospital/addpost');?>">
                            <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-6">
                                            <label>Hospital name </label>
                                            <input id="hospital_name" type="text" class="form-control" name="hospital_name">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label>Hospital type </label>
											<select class="form-control" id="hospital_type" name="hospital_type" onchange="get_hospital_type(this.value);">
											<option value="">Select</option>
											<option value="Bedded hospital">Bedded hospital</option>
											<option value="Clinic">Clinic</option>
											<option value="Dispensary">Dispensary</option>
											<option value="Homeopathy">Homeopathy</option>
											<option value="Mobile hospital">Mobile hospital</option>
											<option value="Siddha">Siddha</option>
											<option value="Unani">Unani</option>
											<option value="Veterinary hospital">Veterinary hospital</option>
											<option value="Yoga">Yoga</option>
											<option value="Animal house">Animal house</option>
											<option value="blood bank">blood bank</option>
											<option value="Dental hospital">Dental hospital</option>
											<option value="Nursing home">Nursing home</option>
											<option value="Health camp">Health camp</option>
											<option value="Pathological laboratory">Pathological laboratory</option>
											<option value="School/ institutions/first aid centers">School/ institutions/first aid centers</option>
											</select>
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>Start date of registration </label>
                                            <input id="s_d_r" type="date" class="form-control" name="s_d_r">
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>End date of registration </label>
                                            <input id="e_d_r" type="date" class="form-control" name="e_d_r">
                                        </div>
										<div class="form-group  col-md-4" id="no_beds">
                                            <label>No of Beds</label>
                                            <input id="no_beds" type="text" class="form-control" name="no_beds" >
                                        </div>
										
										<div class="form-group  col-md-4" id="cost_per_month">
                                            <label>Cost of Bed per Month</label>
                                            <input id="cost_per_month" type="text" class="form-control" name="cost_per_month" >
                                        </div>
										
										<div class="form-group  col-md-4" id="total_amount">
                                            <label>Cost per Month</label>
                                            <input id="total_amount" type="text" class="form-control" name="total_amount" >
                                        </div>
										
										
										<div class="form-group  col-md-4">
                                            <label>Advance fee </label>
                                            <input id="advance_fee" type="text" class="form-control" name="advance_fee">
                                        </div>
										
										
										
										<div class="form-group  col-md-4">
                                            <label>District</label>
											<select class="form-control select2" id="district" name="district"  onchange="get_town_list(this.value);">
											<option value="">Select</option>
											<?php if(isset($district_list)&& count($district_list)>0){ ?>
											<?php foreach ($district_list as $list){ ?>
											<option value="<?php echo $list['d_id']; ?>"><?php echo $list['name']; ?></option>
											<?php }?>
											<?php }?>
											</select>
                                        </div>
										
										<div class="form-group  col-md-4">
                                            <label>Town</label>
											<select class="form-control" id="town" name="town" >
											<option value="">Select</option>
											
											</select>
                                        </div>
										
										
										
										
										<div class="form-group  col-md-12">
                                            <label>Address of Hospital </label>
                                            <textarea class="form-control" name="hospital_address"></textarea>
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

<script>
  $(function () {
     //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<script>
function get_town_list(district){
	//alert(month_name);
	if(district !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('hospital/get_town_list');?>",
   			data: {
				district: district,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#town').empty();
							$('#town').append("<option value=''>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#town').append("<option value="+parsedData.list[i].t_id+">"+parsedData.list[i].town_name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>


    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
  
  function get_hospital_type(val){
	  if(val=='Bedded hospital'){
		 $('#no_beds').show(); 
		 $('#cost_per_month').show(); 
		 $('#total_amount').hide(); 
	  }else if(val=='Nursing home'){
		$('#no_beds').show(); 
		$('#cost_per_month').show();
		$('#total_amount').hide(); 
	  }else{
	   $('#total_amount').show(); 
	   $('#no_beds').hide(); 
       $('#no_beds').val(''); 
       $('#cost_per_month').hide();
       $('#cost_per_month').val(''); 

	  }
	  
  }
  
 </script>
<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             hospital_name: {
                validators: {
					notEmpty: {
						message: 'Hospital name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Hospital name wont allow <> [] = % '
					}
				}
            },
			district: {
                validators: {
					notEmpty: {
						message: 'District is required'
					}
				}
            },
			town: {
                validators: {
					notEmpty: {
						message: 'Town is required'
					}
				}
            },
			hospital_type: {
                validators: {
					notEmpty: {
						message: 'Hospital type is required'
					}
				}
            },
            s_d_r: {
                validators: {
					notEmpty: {
						message: 'Start date of registration is required'
						},
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
			e_d_r: {
                validators: {
					notEmpty: {
								message: 'End date of registration is required'
						},
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
			no_beds: {
                validators: {
					notEmpty: {
						message: 'No of Beds is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'No of Beds must be digits'
   					}
				}
            },
			cost_per_month: {
                validators: {
					notEmpty: {
						message: 'Cost of Bed per Month is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Cost of Bed per Month must be digits'
   					}
				}
            },
			total_amount: {
                validators: {
					notEmpty: {
						message: 'Cost per Month is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Cost per Month must be digits'
   					}
				}
            },
			advance_fee: {
                validators: {
					notEmpty: {
						message: 'Advance fee is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Advance fee must be digits'
   					}
				}
            },
			hospital_address: {
                 validators: {
					  notEmpty: {
						message: 'Address of Hospital is required'
					},
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Address of Hospital wont allow <>[]'
					}
                }
            },
			
			
			
			
			
			
			
			
			
			
            }
        })
     
});

</script>
