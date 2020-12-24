

				<div class="main-content">
				<section class="section">
				<h1 class="section-header">
				<div>City Wise Property List</div>
				</h1>
				<div class="section-body">
				<div class="row">
				<div class="col-12">
				<div class="card">
				<div class="card-header">
				<h4>City Wise Property List</h4>
				</div>
				<div class="card-body">
				 <form method="post" id="add_category" action="<?php  echo base_url('citywise/propertylist');?>" enctype="multipart/form-data">
                            <div class="row ">
                                
                              
                                   
                                       <div class="form-group col-md-6">
                                            <label>City</label>
											<select id="city" name="city"  class="form-control" >
										    <option value="">Select</option>
											<?php if(isset($city_list) && count($city_list)>0){ ?>
											<?php foreach($city_list as $list){ ?>
												<option value="<?php echo $list['c_id']; ?>"><?php echo $list['city']; ?></option>
												
											<?php } ?>
										<?php } ?>
										</select>
                                        </div>
										
										
									    
										   </div>
										    <br>
										<div class="col-md-2 col-offset-md-3">
                                        <button type="submit" name="signup" value="submit" class="btn btn-primary ">
                                            Submit
                                        </button>
										</div>
                                   
                               
                          
							 </form>
				</div>
				
				
				
				
				<div class="card-body">
				<?php if(isset($c_w_p_list)&& count($c_w_p_list)>0){ ?>
				<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
				<tr>
                <th>Name of property</th>
                <th>Owner name</th>
                <th>City</th>
                <th>Address</th>
                <th>Type of property</th>
                <th>Land in acres /cents</th>
                <th>Property cost</th>
                <th>Specifications</th>
				<th>Status</th>
            </tr>
				</thead>
				<tbody>
				<?php foreach($c_w_p_list as $list){?>
				<tr>
                <td><?php echo isset($list['property_name'])?$list['property_name']:''?></td>
                <td><?php echo isset($list['owner_name'])?$list['owner_name']:''?></td>
                <td><?php echo isset($list['c_name'])?$list['c_name']:''?></td>
                <td><?php echo isset($list['address'])?$list['address']:''?></td>
                <td><?php echo isset($list['property'])?$list['property']:''?></td>
                <td><?php echo isset($list['land'])?$list['land']:''?></td>
                <td><?php echo isset($list['p_cost'])?$list['p_cost']:''?></td>
                <td><?php echo isset($list['specifications'])?$list['specifications']:''?></td>
				<td class="text-center">
				<?php if($list['p_status']==1){  ?>
				<button class="btn btn-success   btn-sm">Acepted</button>
				<?php }else if($list['p_status']==0){ ?>
				<button class="btn btn-warning  btn-sm">Pending</button>
				<?php }else if($list['p_status']==2){ ?>
				<button class="btn btn-danger   btn-sm">Rejected</button>
				<?php }?>
				</td>
				</tr>
               <?php }?>
				</tbody>

				</table>
				</div>
				<?php }else{?>
				<div> No data available</div>
				<?php }?>


				</div>



				</div>
				</div>
				</div>
				</div>
				</section>
				</div>


				<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
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
			
			
			
			
			
			
			
            }
        })
     
});

</script>
