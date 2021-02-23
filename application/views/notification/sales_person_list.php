
<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Sales Person </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sales Person List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($edit_salespersons) && count($edit_salespersons)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Alt Mobile Number</th>
                <th>Aadhar Number</th>
                <th>Qualifaction</th>
                <th>Date of Join</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo isset($edit_salespersons['name'])?$edit_salespersons['name']:''?></td>
                <td><?php echo isset($edit_salespersons['email'])?$edit_salespersons['email']:''?></td>
                <td><?php echo isset($edit_salespersons['mobile_number'])?$edit_salespersons['mobile_number']:''?></td>
                <td><?php echo isset($edit_salespersons['alt_mobile_number'])?$edit_salespersons['alt_mobile_number']:''?></td>
                <td><?php echo isset($edit_salespersons['aadhar_number'])?$edit_salespersons['aadhar_number']:''?></td>
                <td><?php echo isset($edit_salespersons['qualification'])?$edit_salespersons['qualification']:''?></td>
                <td><?php echo isset($edit_salespersons['dob'])?$edit_salespersons['dob']:''?></td>
                <td><?php echo isset($edit_salespersons['address'])?$edit_salespersons['address']:''?></td>
                
			    <td><?php if($edit_salespersons['notification_status']==2){ echo "Delete";}else if($edit_salespersons['notification_status']==3){ echo "Edit"; } ?></td>	
               
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
