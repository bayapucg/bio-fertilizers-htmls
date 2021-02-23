<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Property</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Property</h4>
                        </div>
                        <div class="card-body">
						 <form method="post" id="add_category" action="<?php  echo base_url('properties/editpost');?>" enctype="multipart/form-data">
                            <input type="hidden" name="p_id" value="<?php echo isset($p_d['p_id'])?$p_d['p_id']:'' ?>" >
							<div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Name of property</label>
                                            <input  type="text" value="<?php echo isset($p_d['property_name'])?$p_d['property_name']:'' ?>" class="form-control" name="property_name">
                                        </div>
                                        
										<div class="form-group col-md-6">
                                            <label>Owner name</label>
                                            <input  type="text" value="<?php echo isset($p_d['owner_name'])?$p_d['owner_name']:'' ?>" class="form-control" name="owner_name">
                                        </div>
										<div class="form-group col-md-6">
                                            <label>City</label>
											<select id="city" name="city"  class="form-control" >
										    <option value="">Select</option>
											<?php foreach ($city_list as $list){ ?>
											<?php if($list['c_id']==$p_d['city']){ ?>
											<option selected value="<?php echo $list['c_id']; ?>"><?php echo $list['city']; ?></option>
											<?php }else{ ?>
											<option value="<?php echo $list['c_id']; ?>"><?php echo $list['city']; ?></option>
											<?php } ?>
											<?php }?>
											
										</select>
                                        </div>
									    <div class="form-group col-md-6">
                                            <label>Address</label>
                                            <input  type="text" value="<?php echo isset($p_d['address'])?$p_d['address']:'' ?>" class="form-control" name="address">
                                        </div>
										<div class="form-group col-md-6">
                                            <label>Type of property</label>
											<select id="type_of_property" name="type_of_property"  class="form-control" >
										    <option value="">Select</option>
											<?php foreach ($property_list as $list){ ?>
											<?php if($list['p_id']==$p_d['type_of_property']){ ?>
											<option selected value="<?php echo $list['p_id']; ?>"><?php echo $list['property']; ?></option>
											<?php }else{ ?>
											<option value="<?php echo $list['p_id']; ?>"><?php echo $list['property']; ?></option>
											<?php } ?>
											<?php }?>
										</select>
                                        </div>
										<div class="form-group col-md-6">
                                            <label>Land in acres /cents</label>
                                            <input  type="text" value="<?php echo isset($p_d['land'])?$p_d['land']:'' ?>" class="form-control" name="land">
                                        </div>
										
										<div class="form-group col-md-6">
                                            <label>Property cost</label>
                                            <input  type="text" value="<?php echo isset($p_d['p_cost'])?$p_d['p_cost']:'' ?>" class="form-control" name="p_cost">
                                        </div>
										
										<div class="form-group col-md-6">
                                            <label>Specifications</label>
                                            <input  type="text" value="<?php echo isset($p_d['specifications'])?$p_d['specifications']:'' ?>" class="form-control" name="specifications">
                                        </div>
										
										
										
										
										
										
										   </div>
										    <br>
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


<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             property_name: {
                validators: {
					notEmpty: {
						message: 'Name of property  is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			owner_name: {
                validators: {
					notEmpty: {
						message: 'Owner name  is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			city: {
                validators: {
					notEmpty: {
						message: 'City  is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			address: {
                validators: {
					notEmpty: {
						message: 'Address  is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			type_of_property: {
                validators: {
					notEmpty: {
						message: 'Type of property  is required'
					},
					
				}
            },
			
			land: {
                validators: {
					notEmpty: {
						message: 'Land in acres /cents  is required'
					},
					
				}
            },
			p_cost: {
                validators: {
					notEmpty: {
						message: 'Property cost  is required'
					},
					
				}
            },
			specifications: {
                validators: {
					notEmpty: {
						message: 'Specifications is required'
					},
					
				}
            },
			
			
			
			
			
			
			
			
			
			
			
			
            }
        })
     
});

</script>
