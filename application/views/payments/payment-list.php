

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
						<!--<?php  foreach($payments_list as $list){ ?>
						<a href="<?php echo base_url('payments/otp/'.base64_encode($list['s_id'])); ?>">Back</a>
                        <?php }?>-->
						<div class="card-body">
						<?php if(isset($payments_list) && count($payments_list)>0){ ?>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php $cnt=1; foreach($payments_list as $list){ ?>
            <tr>
                <td>
				<?php if($list['hospitals_name']=='Investment'){?>
				<?php echo isset($list['hospitals_name'])?$list['hospitals_name']:''?>
				<?php }else{?>
				<?php echo isset($list['hospital_name'])?$list['hospital_name']:''?>
				<?php }?>
				</td>
                <td>
				<?php if($list['hospitals_name']=='Investment'){?>
				<?php if($list['months_names']==1){ echo "January";}else if($list['months_names']==2){ echo "February"; }else if($list['months_names']==3){ echo "March";}else if($list['months_names']==4){ echo "April";}else if($list['months_names']==5){ echo "May";}else if($list['months_names']==6){ echo "June";}else if($list['months_names']==7){ echo "July";}else if($list['months_names']==8){ echo "August";}else if($list['months_names']==9){ echo "September";}else if($list['months_names']==10){ echo "October";}else if($list['months_names']==11){ echo "November";}else if($list['months_names']==12){ echo "December";}?>
				<?php }else{?>
				<?php if($list['month']==1){ echo "January";}else if($list['month']==2){ echo "February"; }else if($list['month']==3){ echo "March";}else if($list['month']==4){ echo "April";}else if($list['month']==5){ echo "May";}else if($list['month']==6){ echo "June";}else if($list['month']==7){ echo "July";}else if($list['month']==8){ echo "August";}else if($list['month']==9){ echo "September";}else if($list['month']==10){ echo "October";}else if($list['month']==11){ echo "November";}else if($list['month']==12){ echo "December";}?>
				<?php }?>
				</td>
                <td>
				<?php if($list['hospitals_name']=='Investment'){?>
				<?php echo isset($list['year_name'])?$list['year_name']:''?>
				<?php }else{?>
				<?php echo isset($list['years'])?$list['years']:''?>
				<?php }?>
				
				</td>
                <td><?php echo isset($list['sales_person'])?$list['sales_person']:''?></td>
                <td>₹<?php echo isset($list['investment_amount'])?$list['investment_amount']:'0'?></td>
                <td>₹<?php echo isset($list['total_amount'])?$list['total_amount']:'0'?></td>
                <td>₹ <?php echo isset($list['paid_amount'])?$list['paid_amount']:'0'?></td>
                <td>₹ <?php echo isset($list['discount'])?$list['discount']:'0'?></td>
                <td><?php if($list['payment_type']==1){ echo "Cash";}else if($list['payment_type']==2){ echo "Online"; }else if($list['payment_type']==3){ echo "Cheque"; } ?></td>
                <td><?php echo isset($list['trans_action_no'])?$list['trans_action_no']:''?></td>
                <td><?php echo isset($list['cheque_no'])?$list['cheque_no']:''?></td>
                <td><?php echo isset($list['created_at'])?$list['created_at']:''?></td>
				
				<?php if($list['payment_type']==3 && $list['hospitals_name']=='Investment'){?>
				 <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>                
				<?php }else{?>
				<?php if($list['payment_type']==3){?>
				<td ><?php if($list['status']==1){ echo "Cleared";}else if($list['status']==0){ echo "Pending"; }else if($list['status']==3){ echo "Un Cleared"; } ?></td>                
               <?php }else{?>
			   <td><?php if($list['status']==1){ echo "Active";}else if($list['status']==0){ echo "Pending"; } ?></td>                
			   <?php }?>
			   
			   <?php }?>
			   <td>
		
		<?php if($list['payment_type']==3 && $list['status']==0){?>
		<a class="btn btn-success btn-action" href="javascript;void(0);" onclick="admincleared('<?php echo base64_encode(htmlentities($list['p_id']));?>');cleared('');" data-toggle="modal" data-target="#myModal" title="cleared">Cleared</a>
		<a class="btn btn-warning btn-action" href="javascript;void(0);" onclick="adminuncleared('<?php echo base64_encode(htmlentities($list['p_id']));?>');uncleared('');" data-toggle="modal" data-target="#myModal" title="uncleared">Un Cleared</a>
		<?php }else if($list['payment_type']==3 && $list['status']==0){ ?>
      <?php }?>
		<br>
		<a class="btn btn-danger btn-action" href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['p_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="ion ion-trash-b"></i></a>
		</td>
            </tr>
		 <?php $cnt++;}?>
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
			
			<div style="padding:10px">
			<a href="<?php echo base_url('payments/lists'); ?>" type="button" class="close" >&times;</a>
			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <a href="<?php echo base_url('payments/lists'); ?>" type="button"  class="btn  blueBtn">Cancel</a>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>  
<script>
function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('payments/checkcheque'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('payments/delete'); ?>"+"/"+id);
	
}

function admincleared(id){
	$(".popid").attr("href","<?php echo base_url('payments/cleared'); ?>"+"/"+id);
	
}


function adminuncleared(id){
	$(".popid").attr("href","<?php echo base_url('payments/uncleared'); ?>"+"/"+id);
	
}



function admin(id){
			$('#content1').html('Are you sure you want to delete?');

}
function cleared(id){
			$('#content1').html('Are you sure you want to Cleared?');

}
function uncleared(id){
			$('#content1').html('Are you sure you want to Un Cleared?');

}

</script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>