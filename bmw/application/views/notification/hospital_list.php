

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Hospital</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Hospital List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($edit_hospital) && count($edit_hospital)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Hospital name</th>
                <th>Hospital type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>No of Beds</th>
                <th>Bed Cost / M</th>
                <th>Cost / M</th>
                <th>Advance fee</th>
                <th>Address of Hospital</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo isset($edit_hospital['hospital_name'])?$edit_hospital['hospital_name']:''?></td>
                <td><?php echo isset($edit_hospital['hospital_type'])?$edit_hospital['hospital_type']:''?></td>
                <td><?php echo isset($edit_hospital['s_d_r'])?$edit_hospital['s_d_r']:''?></td>
                <td><?php echo isset($edit_hospital['e_d_r'])?$edit_hospital['e_d_r']:''?></td>
                <td><?php echo isset($edit_hospital['no_beds'])?$edit_hospital['no_beds']:'0'?></td>
                <td> <?php echo isset($edit_hospital['cost_per_month'])?$edit_hospital['cost_per_month']:'0'?></td>
				<td><?php echo isset($edit_hospital['total_amount'])?$edit_hospital['total_amount']:'0'?></td>
                <td> <?php echo isset($edit_hospital['advance_fee'])?$edit_hospital['advance_fee']:''?></td>
                <td><?php echo isset($edit_hospital['hospital_address'])?$edit_hospital['hospital_address']:''?></td>
			    <td><?php if($edit_hospital['notification_status']==2){ echo "Delete";}else if($edit_hospital['notification_status']==3){ echo "Edit"; } ?></td>	
					
               
            </tr>
		 
        </tbody>
        
    </table>
                            </div>
							<?php }else{ ?>
                               <div> No data available</div>
                                    <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>