
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
                            <h4>Edit Hospital</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php echo base_url('hospital/editpost');?>">
                         <input type="hidden" name="h_id" id="h_id" value="<?php echo isset($edit_hospital['h_id'])?$edit_hospital['h_id']:''?>" >
   
							<div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-6">
                                            <label>Hospital name </label>
                                            <input id="hospital_name" type="text" class="form-control" name="hospital_name" value="<?php echo isset($edit_hospital['hospital_name'])?$edit_hospital['hospital_name']:''?>">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label>Hospital type </label>
											<select class="form-control" name="hospital_type" onchange="get_hospital_type(this.value);" id="hospital_type">
											<option value="">Select</option>
											<option value="Bedded hospital" <?php if($edit_hospital['hospital_type']=='Bedded hospital'){  echo "selected"; }?>>Bedded hospital</option>
											<option value="Clinic" <?php if($edit_hospital['hospital_type']=='Clinic'){  echo "selected"; }?>>Clinic</option>
											<option value="Dispensary" <?php if($edit_hospital['hospital_type']=='Dispensary'){  echo "selected"; }?>>Dispensary</option>
											<option value="Homeopathy" <?php if($edit_hospital['hospital_type']=='Homeopathy'){  echo "selected"; }?>>Homeopathy</option>
											<option value="Mobile hospital" <?php if($edit_hospital['hospital_type']=='Mobile hospital'){  echo "selected"; }?>>Mobile hospital</option>
											<option value="Siddha" <?php if($edit_hospital['hospital_type']=='Siddha'){  echo "selected"; }?>>Siddha</option>
											<option value="Unani" <?php if($edit_hospital['hospital_type']=='Unani'){  echo "selected"; }?>>Unani</option>
											<option value="Veterinary hospital" <?php if($edit_hospital['hospital_type']=='Veterinary hospital'){  echo "selected"; }?>>Veterinary hospital</option>
											<option value="Yoga" <?php if($edit_hospital['hospital_type']=='Yoga'){  echo "selected"; }?>>Yoga</option>
											<option value="Animal house" <?php if($edit_hospital['hospital_type']=='Animal house'){  echo "selected"; }?>>Animal house</option>
											<option value="blood bank" <?php if($edit_hospital['hospital_type']=='blood bank'){  echo "selected"; }?>>blood bank</option>
											<option value="Dental hospital" <?php if($edit_hospital['hospital_type']=='Dental hospital'){  echo "selected"; }?>>Dental hospital</option>
											<option value="Nursing home" <?php if($edit_hospital['hospital_type']=='Nursing home'){  echo "selected"; }?>>Nursing home</option>
											<option value="Health camp" <?php if($edit_hospital['hospital_type']=='Health camp'){  echo "selected"; }?>>Health camp</option>
											<option value="Pathological laboratory" <?php if($edit_hospital['hospital_type']=='Pathological laboratory'){  echo "selected"; }?>>Pathological laboratory</option>
											<option value="School/ institutions/first aid centers" <?php if($edit_hospital['hospital_type']=='School/ institutions/first aid centers'){  echo "selected"; }?>>School/ institutions/first aid centers</option>
											</select>
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>Start date of registration </label>
                                            <input id="s_d_r" type="date" class="form-control" name="s_d_r" value="<?php echo isset($edit_hospital['s_d_r'])?$edit_hospital['s_d_r']:''?>">
                                        </div>
										<div class="form-group  col-md-6">
                                            <label>End date of registration </label>
                                            <input id="e_d_r" type="date" class="form-control" name="e_d_r" value="<?php echo isset($edit_hospital['e_d_r'])?$edit_hospital['e_d_r']:''?>">
                                        </div>
										<div class="form-group  col-md-4" id="no_beds">
                                            <label>No of Beds</label>
                                            <input id="no_beds" type="text" class="form-control" name="no_beds" value="<?php echo isset($edit_hospital['no_beds'])?$edit_hospital['no_beds']:''?>">
                                        </div>
										<div class="form-group  col-md-4" id="cost_per_month">
                                            <label>Cost of Bed per Month</label>
                                            <input id="cost_per_month" type="text" class="form-control" name="cost_per_month" value="<?php echo isset($edit_hospital['cost_per_month'])?$edit_hospital['cost_per_month']:''?>">
                                        </div>
										<div class="form-group  col-md-4" id="total_amount">
                                            <label>Cost per Month</label>
                                            <input id="total_amount" type="text" class="form-control" name="total_amount" value="<?php echo isset($edit_hospital['total_amount'])?$edit_hospital['total_amount']:''?>" >
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Advance fee </label>
                                            <input id="advance_fee" type="text" class="form-control" name="advance_fee" value="<?php echo isset($edit_hospital['advance_fee'])?$edit_hospital['advance_fee']:''?>">
                                        </div>
										
										<div class="form-group  col-md-6">
                                            <label>District</label>
											<select class="form-control" id="district" name="district" onchange="get_town_list(this.value);">
											<option value="">Select</option>
											<?php if(isset($district_list)&& count($district_list)>0){ ?>
											<?php foreach ($district_list as $list){ ?>
											<?php if($list['d_id']==$edit_hospital['district']){ ?>
											<option selected value="<?php echo $list['d_id']; ?>"><?php echo $list['name']; ?></option>
											<?php }else{ ?>
											<option value="<?php echo $list['d_id']; ?>"><?php echo $list['name']; ?></option>
											<?php } ?>
											<?php }?>
										   <?php }?>
											</select>
                                        </div>
										
										<div class="form-group  col-md-6">
                                            <label>Town</label>
											<select class="form-control" id="town" name="town" >
											<option value="">Select</option>
											<?php if(isset($town_list)&& count($town_list)>0){ ?>
											<?php foreach ($town_list as $list){ ?>
											<?php if($list['t_id']==$edit_hospital['town']){ ?>
											<option selected value="<?php echo $list['t_id']; ?>"><?php echo $list['town_name']; ?></option>
											<?php }else{ ?>
											<option value="<?php echo $list['t_id']; ?>"><?php echo $list['town_name']; ?></option>
											<?php } ?>
											<?php }?>
										   <?php }?>
											</select>
                                        </div>
										
										
										
										<div class="form-group  col-md-12">
                                            <label>Address of Hospital </label>
                                            <textarea class="form-control" name="hospital_address"><?php echo isset($edit_hospital['hospital_address'])?$edit_hospital['hospital_address']:''?></textarea>
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
 <script>
$('#hospital_type').keyup(function() {
  //alert(hospital_type);
  if ($(this).val() == 'Bedded hospital') {
   $('#no_beds').show(); 
		 $('#cost_per_month').show(); 
		 $('#total_amount').hide();  
     }else if ($(this).val() == 'Nursing home') {
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

 
}).keyup(); 
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
			hospital_type: {
                validators: {
					notEmpty: {
						message: 'Hospital type is required'
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
