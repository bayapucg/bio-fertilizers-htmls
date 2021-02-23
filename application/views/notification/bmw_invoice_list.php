

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Bmw Invoice</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bmw Invoice Monthly List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($edit_bmw_invoice) && count($edit_bmw_invoice)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Hospital name</th>
                <th>Hospital type</th>
                <th>Month</th>
                <th>Year</th>
                <th>No of Beds</th>
                <th>Cost of Bed per Month</th>
                <th>Cost per Month</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo isset($edit_bmw_invoice['hospital_name'])?$edit_bmw_invoice['hospital_name']:''?></td>
                <td><?php echo isset($edit_bmw_invoice['hospital_types'])?$edit_bmw_invoice['hospital_types']:''?></td>
                <td>
				<?php if($edit_bmw_invoice['month']==1){ echo "January";}else if($edit_bmw_invoice['month']==2){ echo "February"; }else if($edit_bmw_invoice['month']==3){ echo "March";}else if($edit_bmw_invoice['month']==4){ echo "April";}else if($edit_bmw_invoice['month']==5){ echo "May";}else if($edit_bmw_invoice['month']==6){ echo "June";}else if($edit_bmw_invoice['month']==7){ echo "July";}else if($edit_bmw_invoice['month']==8){ echo "August";}else if($edit_bmw_invoice['month']==9){ echo "September";}else if($edit_bmw_invoice['month']==10){ echo "October";}else if($edit_bmw_invoice['month']==11){ echo "November";}else if($edit_bmw_invoice['month']==12){ echo "December";}?>
				
				</td>
                <td><?php echo isset($edit_bmw_invoice['year'])?$edit_bmw_invoice['year']:''?></td>
                <td><?php echo isset($edit_bmw_invoice['no_beds'])?$edit_bmw_invoice['no_beds']:''?></td>
                <td><?php echo isset($edit_bmw_invoice['cost_per_month'])?$edit_bmw_invoice['cost_per_month']:''?></td>
				<td>
				<?php if($edit_bmw_invoice['hospital_types']=='Bedded hospital'){?>
				<?php }else if($edit_bmw_invoice['hospital_types']=='Nursing home'){?>
				<?php }else {?>
				<?php echo isset($edit_bmw_invoice['total_amount'])?$edit_bmw_invoice['total_amount']:''?>
				<?php }?>
				</td>
                <td><?php echo isset($edit_bmw_invoice['total_amount'])?$edit_bmw_invoice['total_amount']:''?></td>
			    <td><?php if($edit_bmw_invoice['notification_status']==2){ echo "Delete";}else if($edit_bmw_invoice['notification_status']==3){ echo "Edit"; } ?></td>	
					
                 
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