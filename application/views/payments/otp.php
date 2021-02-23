

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
                            <h4>Otp  </h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php echo base_url('payments/update'); ?>">
						 <input type="hidden" name="s_id" id="s_id" value="<?php echo isset($details['s_id'])?$details['s_id']:''; ?>">

                            <div class="row ">
							
							
							
							<!--<div class="form-group col-md-6">
								<label>Sale person</label>
								<select class="form-control" name="sale_person" onchange="get_sales_person_mobile_number(this.value);">
							<option value="">Select</option>
									<?php foreach ($sales_person_list as $list){ ?>
								<option value="<?php echo $list['s_id']; ?>"><?php echo $list['name']; ?></option>
								<?php }?>
								
									
								</select>
							</div>
							  <div class="form-group col-md-6">
										<label>Register Mobile No</label>
										<select id="mobile" name="mobile"  class="form-control" >
									<option value="">Select</option>
									</select>
									</div>-->
									<div class="form-group col-md-6">
										<label>Enter Otp</label>
										<input id="otp"  name="otp" type="text" class="form-control" placeholder="Enter Otp">
									</div>
									<br>
									<div class="form-group col-md-6">
										<label>&nbsp;</label>
										<div>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" class="btn btn-primary ">
                                            Submit
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
<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
           
			 otp: {
                validators: {
					notEmpty: {
						message: 'Otp is required'
					}
					
				}
            },
         
            }
        })
     
});

</script>
<script>
function get_sales_person_mobile_number(sale_person){
	if(sale_person !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('payments/get_sales_person_mobile_number_list');?>",
   			data: {
				sale_person: sale_person,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#mobile').empty();
							$('#mobile').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#mobile').append("<option value="+parsedData.list[i].s_id+">"+parsedData.list[i].mobile_number+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>
