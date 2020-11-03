
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>District</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit District</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php echo base_url('district/editpost');?>">
                            <input type="hidden" id="d_id" name="d_id"  value="<?php echo isset($edit_district['d_id'])?$edit_district['d_id']:''?>" >
							<div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-6">
                                            <label>District name </label>
                                            <input id="name" type="text" class="form-control" name="name" value="<?php echo isset($edit_district['name'])?$edit_district['name']:''?>">
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

<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             name: {
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
			
			
			
			
			
			
			
			
			
            }
        })
     
});

</script>
