

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Expenditure</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Expenditure List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($edit_expenditure) && count($edit_expenditure)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Particulars</th>
				<th>Image</th>
                <th>Received By</th>
                <th>Amount</th>
                <th>Payment Type</th>
                <th>Transaction Number</th>
                <th>Cheque Number</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo isset($edit_expenditure['particulars'])?$edit_expenditure['particulars']:''?></td>
				<td><img src="<?php echo base_url('assets/expenditure_images/'.$edit_expenditure['image']); ?>" height="80px;" width="auto;"></td>
                <td><?php echo isset($edit_expenditure['received_by'])?$edit_expenditure['received_by']:''?></td>
                <td>₹<?php echo isset($edit_expenditure['amount'])?$edit_expenditure['amount']:''?></td>
                <td><?php echo isset($edit_expenditure['payment_type'])?$edit_expenditure['payment_type']:''?></td>
                <td><?php echo isset($edit_expenditure['trans_action_no'])?$edit_expenditure['trans_action_no']:''?></td>
                <td><?php echo isset($edit_expenditure['cheque_no'])?$edit_expenditure['cheque_no']:''?></td>
                <td><?php echo isset($edit_expenditure['date'])?$edit_expenditure['date']:''?></td>
			    <td><?php if($edit_expenditure['notification_status']==2){ echo "Delete";}else if($edit_expenditure['notification_status']==3){ echo "Edit"; } ?></td>	
					
                   
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