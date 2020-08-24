
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Sales bulletin</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sales bulletin List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($sales_bulletin_list) && count($sales_bulletin_list)>0){ ?>

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
						<th class="text-center" >
							Name of GL/TM
						</th>
						<th class="text-center">
							Grovin
						</th>
						<th class="text-center">
							Free
						</th>
						<th class="text-center">
							3G
						</th>
						<th class="text-center">
							Neem
						</th>
						<th class="text-center">
							Neem Oil
						</th>
						<th class="text-center">
							SS
						</th>
						<th class="text-center">
							Mic
						</th>
						<th class="text-center">
							Action
						</th>
						<th class="text-center">
							Corax
						</th>
						<th class="text-center">
							Bkts
						</th>
						<th class="text-center">
							Fatra
						</th>
						<th class="text-center">
							Terror
						</th>
						<th class="text-center">
							Total Units
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
					<?php $cnt=1; foreach($sales_bulletin_list as $list){ ?>
					<tr>
					<td><?php echo isset($list['role_name'])?$list['role_name']:''?></td>
					<td><?php echo isset($list['name'])?$list['name']:''?></td>
					<td><?php echo isset($list['group_leader'])?$list['group_leader']:''?></td>
					<td><?php echo isset($list['grovin'])?$list['grovin']:''?></td>
					<td><?php echo isset($list['free'])?$list['free']:''?></td>
					<td><?php echo isset($list['3g'])?$list['3g']:''?></td>
					<td><?php echo isset($list['neem'])?$list['neem']:''?></td>
					<td><?php echo isset($list['neem_oil'])?$list['neem_oil']:''?></td>
					<td><?php echo isset($list['ss'])?$list['ss']:''?></td>
					<td><?php echo isset($list['mic'])?$list['mic']:''?></td>
					<td><?php echo isset($list['action'])?$list['action']:''?></td>
					<td><?php echo isset($list['corax'])?$list['corax']:''?></td>
					<td><?php echo isset($list['bkts'])?$list['bkts']:''?></td>
					<td><?php echo isset($list['fatra'])?$list['fatra']:''?></td>
					<td><?php echo isset($list['terror'])?$list['terror']:''?></td>
					<td><?php echo isset($list['total_units'])?$list['total_units']:''?></td>
					<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>               
			     <?php if($list['role_id']==4){?>      
				<td>
				<a href="<?php echo base_url('salesbulletin/edit/'.base64_encode($list['s_id'])); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
                <a class="btn btn-warning btn-action" href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['s_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="ion ion-information-circled"></i></a>
				<a class="btn btn-danger btn-action" href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['s_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="ion ion-trash-b"></i></a>
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
		<a href="<?php echo base_url('salesbulletin/lists'); ?>" type="button" class="close" >&times;</a>

			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <a href="<?php echo base_url('salesbulletin/lists'); ?>" type="button"  class="btn  blueBtn">Cancel</a>
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
	$(".popid").attr("href","<?php echo base_url('salesbulletin/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('salesbulletin/delete'); ?>"+"/"+id);
	
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