

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
						<?php if(isset($expenditure_list) && count($expenditure_list)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>District Name</th>
                <th>Town</th>
                <th>Particulars</th>
				<th>Image</th>
                <th>Received By</th>
                <th>Amount</th>
                <th>Payment Type</th>
                <th>Transaction Number</th>
                <th>Cheque Number</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php $cnt=1; foreach($expenditure_list as $list){ ?>
            <tr>
                <td><?php echo isset($list['name'])?$list['name']:''?></td>
                <td><?php echo isset($list['town_name'])?$list['town_name']:''?></td>
                <td><?php echo isset($list['particulars'])?$list['particulars']:''?></td>
				<td><img src="<?php echo base_url('assets/expenditure_images/'.$list['image']); ?>" height="80px;" width="auto;"></td>
                <td><?php echo isset($list['received_by'])?$list['received_by']:''?></td>
                <td>₹<?php echo isset($list['amount'])?$list['amount']:''?></td>
                <td><?php echo isset($list['payment_type'])?$list['payment_type']:''?></td>
                <td><?php echo isset($list['trans_action_no'])?$list['trans_action_no']:''?></td>
                <td><?php echo isset($list['cheque_no'])?$list['cheque_no']:''?></td>
                <td><?php echo isset($list['date'])?$list['date']:''?></td>
                <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
					
                   <td>
				<a href="<?php echo base_url('expenditure/edit/'.base64_encode($list['e_id'])); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-warning btn-action" href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['e_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="ion ion-information-circled"></i></a>
				<a class="btn btn-danger btn-action" href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['e_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="ion ion-trash-b"></i></a>
				
				
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
		<a href="<?php echo base_url('expenditure/lists'); ?>" type="button" class="close" >&times;</a>

			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <a href="<?php echo base_url('expenditure/lists'); ?>" type="button"  class="btn  blueBtn">Cancel</a>
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
	$(".popid").attr("href","<?php echo base_url('expenditure/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('expenditure/delete'); ?>"+"/"+id);
	
}
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to deactivate?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to activate?');
	}
}

function admin(id){
			$('#content1').html('Are you sure you want to delete?');

}



</script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>