
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>District Wise Expenditure</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Select District Wise Expenditure</h4>
                        </div>
                        <div class="card-body">
						 <form  target="_blank" method="post" id="add_category" action="<?php  echo base_url('expenditure/districtwisereports');?>">
                            <div class="row ">
                                
                              	<div class="form-group  col-md-3">
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
                                   
								   <div class="form-group  col-md-3">
                                            <label>Town</label>
											<select class="form-control" id="town" name="town" >
											<option value="">Select</option>
											
											</select>
                                        </div>
								   
								   
                                        <div class="form-group col-md-3">
                                            <label>select Month </label>
											<div class="">
												<select  name="month" class="form-control">
													<option value="">Select</option>
													<option value="01">Jan</option>
													<option value="02">Feb</option>
													<option value="03">Mar</option>
													<option value="04">Apr</option>
													<option value="05">May</option>
													<option value="06">Jun</option>
													<option value="07">Jul</option>
													<option value="08">Aug</option>
													<option value="09">Sep</option>
													<option value="10">Oct</option>
													<option value="11">Nov</option>
													<option value="12">Dec</option>
												</select>
											</div>
                                        </div>
                                       
										<div class="form-group col-md-3" >
								<label>Year</label>
								<input  name="year"   type="text" class="form-control"  >
							             </div>
										<div class="col-md-2 ">
										<label>&nbsp; </label>
											<div class="">
												<button type="submit" name="signup" value="submit"  class="btn btn-primary ">
                                           Submit
                                        </button>
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
   			url: "<?php echo base_url('income/get_town_list');?>",
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
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
           
			 month: {
                validators: {
					notEmpty: {
						message: 'Month is required'
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
