
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Order cum invoice  </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order cum invoice  List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($ordercuminvoice_list) && count($ordercuminvoice_list)>0){ ?>

                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
					<tr>
					<th class="text-center">
							Role  
						</th>
						<th class="text-center">
							Name  
						</th>
						<th class="text-center">
							Name of the GL/TM
						</th>
						<th class="text-center">
							Name of TM/ABM
						</th>
						<th class="text-center" >
							Date
						</th>
						<th class="text-center">
							Order No
						</th>
						<th class="text-center">
							Name of the sales Executive
						</th>
						
						<th class="text-center">
							Signature of GL/TM & ABM
						</th>
						<th class="text-center">
							Issue invoice Doc. or Cancel
						</th>
						
						<th class="text-center">
							Units
						</th>
						<th class="text-center">
							Status
						</th>
						<th class="text-center">
							Action
						</th>
					</tr>
				</thead>
				<tbody>
					    <?php $cnt=1; foreach($ordercuminvoice_list as $list){ ?>

					<tr>
					<td>
						<?php echo isset($list['role_name'])?$list['role_name']:''?>
						</td>
					
					
					<td>
						<?php echo isset($list['name'])?$list['name']:''?>
						</td>
						<td>
						<?php echo isset($list['group_leader'])?$list['group_leader']:''?>
						</td>
						<td>
						<?php echo isset($list['manager'])?$list['manager']:''?>
						</td>
						<td>
						<?php foreach($list['invoice_data'] as $lis) { ?>
										<li><?php echo $lis['date']. '<br>'; ?></li>
										<?php } ?>
						</td>
						<td>
						<?php foreach($list['invoice_data'] as $lis) { ?>
										<li><?php echo $lis['order_no']. '<br>'; ?></li>
										<?php } ?>
						</td>
						<td>
						<?php foreach($list['invoice_data'] as $lis) { ?>
										<li><?php echo $lis['name_of_sales_executive']. '<br>'; ?></li>
										<?php } ?>
						</td>
						<td>
						<?php foreach($list['invoice_data'] as $lis) { ?>
										<img src="<?php echo base_url('assets/ordercuminvoice_signature/'.$lis['signature_gl_abm']); ?>" height="100px;" width="100px;">
										<?php }?>
						</td>
					<td>
						<?php foreach($list['invoice_data'] as $lis) { ?>
										<li><?php echo $lis['invoice_doc']. '<br>'; ?></li>
										<?php } ?>
						</td>
						<td>
						<?php foreach($list['invoice_data'] as $lis) { ?>
										<li><?php echo $lis['units']. '<br>'; ?></li>
										<?php } ?>
						</td>
						
						
						<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
                      <?php if($list['role_id']==5){?>                  
					 <td>
				<a href="<?php echo base_url('ordercuminvoice/edit/'.base64_encode($list['o_id'])); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
                <a class="btn btn-warning btn-action" href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['o_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="ion ion-information-circled"></i></a>
				<a class="btn btn-danger btn-action" href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['o_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="ion ion-trash-b"></i></a>
				</td>
				<?php }else{?>
				<td></td>
				<?php }?>
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
		<a href="<?php echo base_url('ordercuminvoice/lists'); ?>" type="button" class="close" >&times;</a>

			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <a href="<?php echo base_url('ordercuminvoice/lists'); ?>" type="button"  class="btn  blueBtn">Cancel</a>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>	
  <script>
function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('ordercuminvoice/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('ordercuminvoice/delete'); ?>"+"/"+id);
	
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