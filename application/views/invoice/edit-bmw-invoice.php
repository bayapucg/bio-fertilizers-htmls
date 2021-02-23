
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
						 <form method="post" id="add_category" action="<?php echo base_url('bmwinvoice/editpost'); ?>">
                            <input type="hidden" name="h_m_b_id" id="h_m_b_id" value="<?php echo isset($edit_bill['h_m_b_id'])?$edit_bill['h_m_b_id']:'' ?>" >
							<div class="row ">
							<div class="form-group col-md-4">
								<label> Hospital Type</label>
								<select class="form-control select2" name="hospital_types"  id="hospital_types" onchange="get_value(this.value),get_hospital_types(this.value);">
									<option value="">Select</option>
									<?php foreach ($hospital_types as $list){ ?>
								<?php if($list['hospital_type']==$edit_bill['hospital_types']){ ?>
								<option selected value="<?php echo $list['hospital_type']; ?>"><?php echo $list['hospital_type']; ?></option>
								<?php }else{ ?>
								<option value="<?php echo $list['hospital_type']; ?>"><?php echo $list['hospital_type']; ?></option>
								 <?php } ?>
				                  <?php }?>
								  
								
								</select>
							</div>
							
							
							
							<div class="form-group col-md-4">
							<label>Select Hospital</label>
							<select class="form-control select2" name="hospital"  id="hospital" onchange="get_hospital_no_beds(this.value);">
							<option value="">Select</option>
							<?php if(isset($hospital_list_data)&& count($hospital_list_data)>0){?>
								<?php foreach ($hospital_list_data as $list){ ?>
								<?php if($list['h_id']==$edit_bill['hospital']){ ?>
								<option selected value="<?php echo $list['h_id']; ?>"><?php echo $list['hospital_name']; ?></option>
								<?php }else{ ?>
								<option value="<?php echo $list['h_id']; ?>"><?php echo $list['hospital_name']; ?></option>
								 <?php } ?>
								<?php }?>
								<?php }?>
							</select>
							</div>
							
							
							
							<div class="form-group col-md-4">
								<label>Select Month</label>
								<select class="form-control" name="month" >
									<option value="">Select</option>
									<option value="1" <?php if($edit_bill['month']=='1'){  echo "selected"; }?>>January</option>
									<option value="2" <?php if($edit_bill['month']=='2'){  echo "selected"; }?>>February</option>
									<option value="3" <?php if($edit_bill['month']=='3'){  echo "selected"; }?>>March</option>
									<option value="4" <?php if($edit_bill['month']=='4'){  echo "selected"; }?>>April</option>
									<option value="5" <?php if($edit_bill['month']=='5'){  echo "selected"; }?>>May</option>
									<option value="6" <?php if($edit_bill['month']=='6'){  echo "selected"; }?>>June</option>
									<option value="7" <?php if($edit_bill['month']=='7'){  echo "selected"; }?>>July</option>
									<option value="8" <?php if($edit_bill['month']=='8'){  echo "selected"; }?>>August</option>
									<option value="9" <?php if($edit_bill['month']=='9'){  echo "selected"; }?>>September</option>
									<option value="10" <?php if($edit_bill['month']=='10'){  echo "selected"; }?>>October</option>
									<option value="11"<?php if($edit_bill['month']=='11'){  echo "selected"; }?>>November</option>
									<option value="12" <?php if($edit_bill['month']=='12'){  echo "selected"; }?>>December</option>
								</select>
							</div>
							           <!--<div class="form-group  col-md-4">
                                            <label>Year</label>
                                            <input id="year" type="text" class="form-control" name="year">
                                        </div>-->
							
							            <div class="form-group  col-md-4" id="remove_no_beds">
                                            <label>No of Beds</label>
                                           <div class=""  id="no_beds"   >
										   
										   <?php if($edit_bill['hospital_types']=='Bedded hospital'){?>
                                            <input  type="text" class="form-control" name="no_beds" value="<?php echo isset($edit_bill['no_beds'])?$edit_bill['no_beds']:'' ?>">
											<?php }else if($edit_bill['hospital_types']=='Nursing home'){?>
                                            <input  type="text" class="form-control" name="no_beds" value="<?php echo isset($edit_bill['no_beds'])?$edit_bill['no_beds']:'' ?>">
											<?php }else{?>
											<input  type="text" class="form-control" name="no_beds" value="0" readonly>
											<?php }?>
										   
								                </div>
												<!--<div id="retur_type_divs">
                                            <input  type="text" class="form-control" name="no_beds" value="<?php echo isset($edit_bill['no_beds'])?$edit_bill['no_beds']:'' ?>">
                                           </div>-->
                                            <!--<input id="no_beds" type="text" class="form-control" name="no_beds">-->
                                        </div>
										<div class="form-group  col-md-4" id="remove_cost_per_month">
                                            <label>Cost of Bed per Month</label>
											<div class="" id="cost_per_month">
											<?php if($edit_bill['hospital_types']=='Bedded hospital'){?>
<input id="cost_per_month" type="text" class="form-control" name="cost_per_month"  value="<?php echo isset($edit_bill['cost_per_month'])?$edit_bill['cost_per_month']:'' ?>">											
											
											<?php }else if($edit_bill['hospital_types']=='Nursing home'){?>
<input id="cost_per_month" type="text" class="form-control" name="cost_per_month" value="<?php echo isset($edit_bill['cost_per_month'])?$edit_bill['cost_per_month']:'' ?>">											<?php }else{?>
											<input  type="text" class="form-control" name="cost_per_month" value="0" readonly>
											<?php }?>
										
											
											
											
								                </div>
												<!--<div id="retur_type_div">
                                            <input id="cost_per_month" type="text" class="form-control" name="cost_per_month" value="<?php echo isset($edit_bill['cost_per_month'])?$edit_bill['cost_per_month']:'' ?>">
                                           </div>-->
                                            <!--<input id="cost_per_month" type="text" class="form-control" name="cost_per_month">-->
                                        </div>
							              <div class="form-group  col-md-4" id="remove_total_amount">
                                            <label>Cost  per Month</label>
											<div class="" id="total_amount">
											<?php if($edit_bill['hospital_types']=='Bedded hospital'){?>
											 <input  type="text" class="form-control" name="total_amount" value="0" readonly>
											<?php }else if($edit_bill['hospital_types']=='Nursing home'){?>
                                              <input  type="text" class="form-control" name="total_amount" value="0" readonly>

											<?php }else{?>
                                            <input  type="text" class="form-control" name="total_amount" value="<?php echo isset($edit_bill['total_amount'])?$edit_bill['total_amount']:'' ?>">
											<?php }?>
												</div>
												<!--<div id="retur_type_divss">
                                            <input  type="text" class="form-control" name="total_amount" value="<?php echo isset($edit_bill['total_amount'])?$edit_bill['total_amount']:'' ?>">
                                           </div>-->
                                            <!--<input id="cost_per_month" type="text" class="form-control" name="cost_per_month">-->
                                        </div>
							
							<br><br><br><br><br>
                               <div class="col-md-12 text-center">
								<button type="submit" class="btn btn-primary">Generate Bill</button>
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
<script type="text/javascript">
  
  function get_value(val){
	  //alert(val);
	  if(val=='Bedded hospital'){
		 $('#no_beds').show(); 
		 $('#cost_per_month').show(); 
		 $('#total_amount').hide(); 
		 $('#retur_type_divss').hide(); 
		 $('#retur_type_div').hide(); 
		 $('#retur_type_divs').hide(); 		 
        $('#retur_type_div').hide(); 
	  }else if(val=='Nursing home'){
		 $('#no_beds').show(); 
		 $('#cost_per_month').show(); 
		 $('#total_amount').hide(); 
		 $('#retur_type_div').hide(); 
        $('#retur_type_divs').hide(); 		 
        $('#retur_type_div').hide(); 		 
	  }else{
	  $('#no_beds').hide(); 
		 $('#cost_per_month').hide(); 
		 $('#total_amount').show(); 
		 $('#retur_type_divss').hide(); 
         $('#retur_type_divs').hide(); 
         $('#retur_type_div').hide(); 
	  }
	  
  }
  
 </script>
 <script>
$('#hospital_types').keyup(function() {
  //alert(hospital_type);
  if ($(this).val() == 'Bedded hospital') {
  $('#retur_type_divs').show(); 
		 $('#retur_type_div').show(); 
		 $('#retur_type_divss').hide();
     }else if ($(this).val() == 'Nursing home') {
	$('#retur_type_divs').show(); 
		 $('#retur_type_div').show(); 
		 $('#retur_type_divss').hide();
	 }else{
      $('#retur_type_divs').hide(); 
		 $('#retur_type_div').hide(); 
		 $('#retur_type_divss').show(); 
	 } 

 
}).keyup(); 
</script>
<script>
function get_hospital_types(hospital_types){
	//alert(hospital_types);
	if(hospital_types !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('bmwinvoice/get_hospital_types');?>",
   			data: {
				hospital_types: hospital_types,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#hospital').empty();
							$('#hospital').append("<option value=''>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#hospital').append("<option value="+parsedData.list[i].h_id+">"+parsedData.list[i].hospital_name+"</option>");                          

								
							 
							}
						}
						
   					}
           });
	   }
}
</script>
<script>
function get_hospital_no_beds(hospital){
	//alert(hospital);
	if(hospital !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('bmwinvoice/get_hospital_no_beds');?>",
   			data: {
				hospital: hospital,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#no_beds').empty();
							$('#cost_per_month').empty();
							$('#total_amount').empty();
							$('#no_beds').append("<input type='hidden'  id='no_beds' class='form-control' name='no_beds'>");
							$('#cost_per_month').append("<input type='hidden'  id='cost_per_month' class='form-control' name='cost_per_month'>");
							$('#total_amount').append("<input type='hidden'  id='total_amount' class='form-control' name='total_amounts'>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
						$('#no_beds').append("<input type='text' id='no_beds'  name='no_beds' class='form-control' value="+parsedData.list[i].no_beds+">");                      
						$('#cost_per_month').append("<input type='text' id='cost_per_month'  name='cost_per_month' class='form-control' value="+parsedData.list[i].cost_per_month+">");                      
						$('#total_amount').append("<input type='text' id='total_amount'  name='total_amounts' class='form-control' value="+parsedData.list[i].total_amount+">");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             hospital: {
                validators: {
					notEmpty: {
						message: 'Hospital is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			hospital_types: {
                validators: {
					notEmpty: {
						message: 'Hospital Type is required'
					}
					
				}
            },
            month: {
                validators: {
					notEmpty: {
						message: 'Month is required'
					}
					
				}
            },
			year: {
                validators: {
					notEmpty: {
						message: 'Year is required'
					}
					
				}
            },
			
			
			
			
			
            }
        })
     
});

</script>
