

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Expenditure</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Expenditure </h4>
                        </div>
                        <div class="card-body">
						 <form enctype="multipart/form-data" method="post" id="add_category" action="<?php echo base_url('expenditure/addpost');?>">
                            <div class="row ">
							
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
							
							<div class="form-group col-md-4">
								<label>Particulars</label>
								<input id="particulars" name="particulars"  type="text" class="form-control" >
							    </div>	
							<div class="form-group col-md-4">
								<label>Image</label>
								<input id="image" name="image"  type="file" class="form-control" >
							    </div>
							<div class="form-group col-md-4">
								<label>Received By </label>
								<input id="received_by" name="received_by"  type="text" class="form-control" >
							    </div>	
							
							
							
							 <div class="form-group col-md-4">
								<label>Amount</label>
								<input id="amount" name="amount"  type="text" class="form-control" >
							    </div>	
									
									
								<div class="form-group col-md-4">
							   <label>Payment Type</label>
								<select class="form-control" name="payment_type"  onchange="get_payment_type(this.value);">
									<option value="">Select</option>
									<option value="Cash">Cash</option>
									<option value="Online">Online</option>
									<option value="Cheques">Cheques</option>
									
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
							
							<div class="form-group col-md-4" id="cheque_no">
								<label>Date</label>
								<input  name="date"   type="date" class="form-control" >
							</div>	
									<div class="form-group col-md-12">
										<label>&nbsp;</label>
										<div>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" name="signup" value="submit"  class="btn btn-primary ">
                                           Submit
                                        </button>
										</div>
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
<script>
function get_town_list(district){
	//alert(month_name);
	if(district !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('expenditure/get_town_list');?>",
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
  
  function get_payment_type(val){
	  if(val=='Cash'){
		 $('#trans_action_no').hide(); 
		 $('#cheque_no').hide();
	     $('#trans_action_no').val(''); 
	     $('#cheque_no').val(''); 
	  }else if(val=='Online'){
		 $('#trans_action_no').show(); 
		 $('#cheque_no').hide(); 
		$('#cheque_no').val(''); 
	  }else if(val=='Cheques'){
		  $('#cheque_no').show(); 
		 $('#trans_action_no').hide(); 
		 $('#trans_action_no').val(''); 

	  }
	  
  }
  
 </script>

<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
           
			 particulars: {
                validators: {
					notEmpty: {
						message: 'Particulars is required'
					}
					
				}
            },
			received_by: {
                validators: {
					notEmpty: {
						message: 'Received By is required'
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
						message: 'Sales Person is required'
					}
					
				}
            },
			
			amount: {
                validators: {
					notEmpty: {
						message: 'Amount is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Amount must be digits'
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
			date: {
                validators: {
					notEmpty: {
						message: 'Date is required'
						},
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
         
            }
        })
     
});

</script>
