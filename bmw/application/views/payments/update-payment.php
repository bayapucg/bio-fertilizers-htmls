

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
                            <h4>Update payment </h4>
                        </div>
                        <div class="card-body">
						 <form  method="post" id="add_category" action="<?php echo base_url('payments/updatepost');?>">
                           <input type="hidden" name="s_id" id="s_id" value="<?php echo isset($check['s_id'])?$check['s_id']:'' ?>">

						   <div class="row ">
							
							
							
							<div class="form-group col-md-4">
								<label>Select Hospital</label>
								<select class="form-control select2" name="hospital"  onchange="get_hospital_month_wise_total_amount(this.value),get_hospital_type(this.value);">
							<option value="">Select</option>
							<option value="Investment">Investment</option>
							<?php if(isset($hospital_list)&& count($hospital_list)>0){ ?>
									<?php foreach ($hospital_list as $list){ ?>
								<option value="<?php echo $list['h_id']; ?>"><?php echo $list['hospital_name']; ?></option>
								<?php }?>
								<?php }?>
									
								</select>
							</div>
							
							
							
							
							
							  <div class="form-group col-md-4" id="remove_div">
							   <label>Select Month</label>
								<select id="month_name" name="month_name"  class="form-control"  onchange="get_hospital_month_wise_year(this.value);">
							<option value="">Select</option>
							</select>
								
									</div>
									
									<div class="form-group col-md-4" id="remove_divs">
							   <label>Year</label>
								<select id="year" name="year"  class="form-control"  onchange="get_hospital_paid_amount(this.value),get_hospital_year_wise_total_amount(this.value);">
							<option value="">Select</option>
							</select>
							</div>
									
									
									
									
							<div class="form-group col-md-4" id="remove_divss">
							<label>Total Amount</label>
							<select id="total_amount" name="total_amount"  class="form-control" >
							<option value="">Select</option>
							</select>
							</div>
							
							
							
							
							<!--<div class="form-group col-md-4">
								<label>Pending Amount</label>
								<input id="pending_amount" name="pending_amount"  type="text" class="form-control" >
							</div>-->
							<div class="form-group col-md-4" id="remove_divsss">
								<label>Received Amount </label>
									 <div class="" id="paid_amount">
								  
							</div>
							</div>
									
									
								        <div class="form-group col-md-4" id="show_div">
                                            <label>select Month </label>
											<div class="">
												<select class="form-control" id="m_name" name="months_names">
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
										
							<div class="form-group col-md-4" id="show_divs">
							<label>Investment Amount</label>
							<input id="investment_amount" name="investment_amount"  type="text" class="form-control" >
							</div>	
										
										
										
								<div class="form-group col-md-4">
								<label>Received By</label>
								<input id="sales_person" name="sales_person"  type="text" class="form-control" >
							     </div>	
									
									
								<div class="form-group col-md-4" id="remove_divssss">
								<label>Discount</label>
								<input id="discount" name="discount"  type="text" class="form-control" >
							</div>	
									
									
								<div class="form-group col-md-4">
							   <label>Payment Type</label>
								<select class="form-control" name="payment_type"  onchange="get_payment_type(this.value);">
									<option value="">Select</option>
									<option value="1">Cash</option>
									<option value="2">Online</option>
									<option value="3">Cheque</option>
									
								</select>
								</div>
									
									<div class="form-group col-md-4" id="trans_action_no">
								<label>Transaction Number</label>
								<input  name="trans_action_no"   type="text" class="form-control" >
							   </div>	
							
							
							<div class="form-group col-md-4" id="cheque_no">
								<label>Cheque Number</label>
								<input  name="cheque_no"   type="text" class="form-control" >
							</div>	
							
							
									<div class="form-group col-md-12">
										<label>&nbsp;</label>
										<div>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" name="signup" value="submit"  class="btn btn-primary ">
                                            Update Payment
                                        </button>
										</div>
										<!--<a href="update-payment.php" class="btn btn-primary">Update Payment</a>-->
										</div>
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
  
  function get_hospital_type(val){
	  //alert(val);
	  if(val=='Investment'){
		 $('#remove_div').hide(); 
		 $('#remove_divs').hide(); 
		 $('#remove_divss').hide(); 
		 $('#remove_divsss').hide(); 
		 $('#remove_divssss').hide(); 
          $('#show_div').show(); 
		  $('#show_divs').show(); 
		 $('#month_name').val('');  
		 $('#year').val('');
		 $('#total_amount').val(''); 
		 $('#paid_amount').val('');
		 $('#discount').val(''); 
		  
	  }else{
		  $('#show_div').hide(); 
		  $('#show_divs').hide();
          $('#m_name').val(''); 
		  $('#investment_amount').val(''); 
        $('#remove_div').show(); 
		 $('#remove_divs').show(); 
		 $('#remove_divss').show(); 
		 $('#remove_divsss').show(); 
		 $('#remove_divssss').show();
		  
	  }
	  
  }
  
 </script>
<script type="text/javascript">
  
  function get_payment_type(val){
	  if(val=='1'){
		 $('#trans_action_no').hide(); 
		 $('#cheque_no').hide();
	     $('#trans_action_no').val(''); 
	     $('#cheque_no').val(''); 
	  }else if(val=='2'){
		 $('#trans_action_no').show(); 
		 $('#cheque_no').hide(); 
		$('#cheque_no').val(''); 
	  }else if(val=='3'){
		  $('#cheque_no').show(); 
		 $('#trans_action_no').hide(); 
		 $('#trans_action_no').val(''); 

	  }
	  
  }
  
 </script>
<script>
function get_hospital_paid_amount(year){
	//alert(year);
	if(year !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('payments/get_hospital_paid_amount');?>",
   			data: {
				year: year,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#paid_amount').empty();
							$('#paid_amount').append("<input type='hidden'  id='paid_amount' class='form-control'  name='paid_amount'>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
						$('#paid_amount').append("<input type='text' id='paid_amount'  name='paid_amount' class='form-control' value="+parsedData.list[i].paid+">");                      

								
							 
							}
						}
						
   					}
           });
	   }
}
function get_hospital_year_wise_total_amount(year){
	//alert(year);
	if(year !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('payments/get_hospital_year_wise_total_amount');?>",
   			data: {
				year: year,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#total_amount').empty();
							$('#total_amount').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#total_amount').append("<option value="+parsedData.list[i].total+">"+parsedData.list[i].total+"</option>");                      

								
							 
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
			months_names: {
                validators: {
					notEmpty: {
						message: 'Month is required'
					}
					
				}
            },
			payment_type: {
                validators: {
					notEmpty: {
						message: 'Payment Type is required'
					}
					
				}
            },
			sales_person: {
                validators: {
					notEmpty: {
						message: 'Received By is required'
					}
					
				}
            },
			investment_amount: {
                validators: {
					notEmpty: {
						message: 'Investment Amount is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Investment Amount must be digits'
   					}
				}
            },
			total_amount: {
                validators: {
					notEmpty: {
						message: 'Total Amount is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Total Amount must be digits'
   					}
				}
            },
			pending_amount: {
                validators: {
					notEmpty: {
						message: 'Pending Amount is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Pending Amount must be digits'
   					}
				}
            },
			paid_amount: {
                validators: {
					notEmpty: {
						message: 'Paid Amount is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Paid Amount must be digits'
   					}
				}
            },
			discount: {
                validators: {
					notEmpty: {
						message: 'Discount is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Discount must be digits'
   					}
				}
            },
			trans_action_no: {
                validators: {
					notEmpty: {
						message: 'Transaction Number is required'
					}
					
				}
            },
			cheque_no: {
                validators: {
					notEmpty: {
						message: 'Cheque Number is required'
					}
					
				}
            },
			
         
            }
        })
     
});

</script>
<script>
function get_hospital_month_wise_year(month_name){
	//alert(month_name);
	if(month_name !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('payments/get_hospital_month_wise_year');?>",
   			data: {
				month_name: month_name,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#year').empty();
							$('#year').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#year').append("<option value="+parsedData.list[i].h_m_b_id+">"+parsedData.list[i].year+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}








function get_hospital_month_wise_total_amount(hospital){
	//alert(hospital);
	if(hospital !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('payments/get_hospital_month_wise_total_amount');?>",
   			data: {
				hospital: hospital,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#month_name').empty();
							//$('#total_amount').empty();
							$('#month_name').append("<option>select</option>");
							//$('#total_amount').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#month_name').append("<option value="+parsedData.list[i].h_m_b_id+">"+parsedData.list[i].months+"</option>");                      
							//$('#total_amount').append("<option value="+parsedData.list[i].total+">"+parsedData.list[i].total+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>
