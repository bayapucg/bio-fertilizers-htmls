
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
						 <form method="post" id="add_category" action="<?php echo base_url('bmwinvoice/billprint'); ?>">
                            <div class="row ">
							
							<div class="form-group col-md-4">
							<label>Select Hospital</label>
								<select class="form-control select2" name="hospital"  id="hospital" onchange="get_hospital_no_beds(this.value);">
								<option value="">Select</option>
								<?php foreach ($hospital_list as $list){ ?>
								<option value="<?php echo $list['h_id']; ?>"><?php echo $list['hospital_name']; ?></option>
								<?php }?>
							</select>
							</div>
							
							
							
							
							
							<div class="form-group col-md-4">
                                            <label>select Month </label>
											<div class="">
												<select class="form-control" name="month">
													<option value="">Select</option>
													<option value="1">Jan</option>
													<option value="2">Feb</option>
													<option value="3">Mar</option>
													<option value="4">Apr</option>
													<option value="5">May</option>
													<option value="6">Jun</option>
													<option value="7">Jul</option>
													<option value="8">Aug</option>
													<option value="9">Sep</option>
													<option value="10">Oct</option>
													<option value="11">Nov</option>
													<option value="12">Dec</option>
												</select>
											</div>
                                        </div>
                                       <div class="form-group  col-md-4">
                                            <label>Year</label>
                                            <input id="year" type="text" class="form-control" name="year">
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
	  if(val=='Bedded hospital'){
		 $('#no_beds').show(); 
		$('#remove_no_beds').show(); 
		$('#cost_per_month').show();
		$('#remove_cost_per_month').show();
		$('#total_amount').hide(); 
	   $('#remove_total_amount').hide(); 
	   $('#total_amount').val(''); 
	   $('#remove_total_amount').val('');
	  }else if(val=='Nursing home'){
		$('#no_beds').show(); 
		$('#remove_no_beds').show(); 
		$('#cost_per_month').show();
		$('#remove_cost_per_month').show();
		$('#total_amount').hide(); 
	   $('#remove_total_amount').hide();
        $('#total_amount').val(''); 
	   $('#remove_total_amount').val('');	   
	  }else{
	   $('#remove_total_amount').show(); 
	   $('#total_amount').show(); 
	   $('#no_beds').hide(); 
       $('#no_beds').val(''); 
       $('#cost_per_month').hide();
       $('#cost_per_month').val(''); 
       $('#remove_no_beds').hide(); 
       $('#remove_no_beds').val(''); 
       $('#remove_cost_per_month').hide(); 
       $('#remove_cost_per_month').val(''); 
	  }
	  
  }
  
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
							$('#hospital').append("<option>select</option>");
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
						message: 'Name is required'
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
