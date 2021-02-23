

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Payments</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payments List</h4>
                        </div>
					
						<div class="card-body">
						<?php if(isset($edit_payments) && count($edit_payments)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Hospital name</th>
                <th>Month</th>
                <th>Year</th>
                <th>Sales Person</th>
                <th>Investment Amount</th>
                <th>Total Amount</th>
                <th>Received Amount</th>
                <th>Discount</th>
                <th>Payment Type</th>
                <th>Transaction Number</th>
                <th>Cheque Number</th>
                <th>Date</th>
			    <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
				<?php if($edit_payments['hospitals_name']=='Investment'){?>
				<?php echo isset($edit_payments['hospitals_name'])?$edit_payments['hospitals_name']:''?>
				<?php }else{?>
				<?php echo isset($edit_payments['hospitals_name'])?$edit_payments['hospitals_name']:''?>
				<?php }?>
				</td>
                <td>
				<?php if($edit_payments['hospitals_name']=='Investment'){?>
				<?php if($edit_payments['months_names']==1){ echo "January";}else if($edit_payments['months_names']==2){ echo "February"; }else if($edit_payments['months_names']==3){ echo "March";}else if($edit_payments['months_names']==4){ echo "April";}else if($edit_payments['months_names']==5){ echo "May";}else if($edit_payments['months_names']==6){ echo "June";}else if($edit_payments['months_names']==7){ echo "July";}else if($edit_payments['months_names']==8){ echo "August";}else if($edit_payments['months_names']==9){ echo "September";}else if($edit_payments['months_names']==10){ echo "October";}else if($edit_payments['months_names']==11){ echo "November";}else if($edit_payments['months_names']==12){ echo "December";}?>
				<?php }else{?>
				<?php if($edit_payments['months_names']==1){ echo "January";}else if($edit_payments['months_names']==2){ echo "February"; }else if($edit_payments['months_names']==3){ echo "March";}else if($edit_payments['months_names']==4){ echo "April";}else if($edit_payments['months_names']==5){ echo "May";}else if($edit_payments['months_names']==6){ echo "June";}else if($edit_payments['months_names']==7){ echo "July";}else if($edit_payments['months_names']==8){ echo "August";}else if($edit_payments['months_names']==9){ echo "September";}else if($edit_payments['months_names']==10){ echo "October";}else if($edit_payments['months_names']==11){ echo "November";}else if($edit_payments['months_names']==12){ echo "December";}?>
				<?php }?>
				</td>
                <td>
				<?php if($edit_payments['hospitals_name']=='Investment'){?>
				<?php echo isset($edit_payments['year_name'])?$edit_payments['year_name']:''?>
				<?php }else{?>
				<?php echo isset($edit_payments['years'])?$edit_payments['years']:''?>
				<?php }?>
				
				</td>
                <td><?php echo isset($edit_payments['sales_person'])?$edit_payments['sales_person']:''?></td>
                <td>₹<?php echo isset($edit_payments['investment_amount'])?$edit_payments['investment_amount']:'0'?></td>
                <td>₹<?php echo isset($edit_payments['total_amount'])?$edit_payments['total_amount']:'0'?></td>
                <td>₹ <?php echo isset($edit_payments['paid_amount'])?$edit_payments['paid_amount']:'0'?></td>
                <td>₹ <?php echo isset($edit_payments['discount'])?$edit_payments['discount']:'0'?></td>
                <td><?php if($edit_payments['payment_type']==1){ echo "Cash";}else if($edit_payments['payment_type']==2){ echo "Online"; }else if($edit_payments['payment_type']==3){ echo "Cheque"; } ?></td>
                <td><?php echo isset($edit_payments['trans_action_no'])?$edit_payments['trans_action_no']:''?></td>
                <td><?php echo isset($edit_payments['cheque_no'])?$edit_payments['cheque_no']:''?></td>
                <td><?php echo isset($edit_payments['created_at'])?$edit_payments['created_at']:''?></td>
	            <td><?php if($edit_payments['notification_status']==2){ echo "Delete";} ?></td>	

				
			   
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


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>