
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>District Wise</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Town</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php echo base_url('town/addpost');?>">
                            <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-6">
                                            <label>select District</label>
											<div class="">
												<select class="form-control select2" name="district_name">
													<option value="">Select</option>
													<?php if(isset($district_list)&& count($district_list)>0){ ?>
											<?php foreach ($district_list as $list){ ?>
											<option value="<?php echo $list['d_id']; ?>"><?php echo $list['name']; ?></option>
											<?php }?>
											<?php }?>
												</select>
											</div>
                                        </div>
										
										 <div class="form-group col-md-6">
                                            <label>Town name</label>
                                            <input id="name" type="text" class="form-control" name="town_name">
                                        </div>
                                       
										
										</div><br><br>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" class="btn btn-primary ">
                                            Submit
                                        </button>
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
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             district_name: {
                validators: {
					notEmpty: {
						message: 'District name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'District name wont allow <> [] = % '
					}
				}
            },
			 town_name: {
                validators: {
					notEmpty: {
						message: 'Town name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Town name wont allow <> [] = % '
					}
				}
            },
			
			
			
			
			
			
			
			
            }
        })
     
});

</script>
