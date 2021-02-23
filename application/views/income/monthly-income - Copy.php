
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>District Wise Monthly Income </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Select District Wise Monthly Income </h4>
                        </div>
                        <div class="card-body">
						 <form  target="_blank" method="post" id="add_category" action="<?php echo base_url('income/monthlywisereports');?>">
                            <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-4">
                                            <label>select District</label>
											<div class="">
												<select class="form-control" name="district">
													<option value="">Select</option>
													<?php if(isset($district_list)&& count($district_list)>0){ ?>
											<?php foreach ($district_list as $list){ ?>
											<option value="<?php echo $list['district']; ?>"><?php echo $list['name']; ?></option>
											<?php }?>
											<?php }?>
												</select>
											</div>
                                        </div>
										
										
										 <div class="form-group col-md-4">
                                            <label>select Month </label>
											<div class="">
												<select class="form-control" name="month">
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
										
										
                                       <div class="form-group  col-md-4">
                                            <label>Year</label>
                                            <input id="year" type="text" class="form-control" name="year">
                                        </div>
										
										<div class="col-md-2 ">
										<label>&nbsp; </label>
											<div class="">
												 <button type="submit" class="btn btn-primary ">
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
