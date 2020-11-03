
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
						<?php if(isset($salespersons_list) && count($salespersons_list)>0){ ?>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php $cnt=1; foreach($salespersons_list as $list){ ?>
            <tr>
                <td><?php echo isset($list['name'])?$list['name']:''?></td>
                <td><?php echo isset($list['email'])?$list['email']:''?></td>
                <td><?php echo isset($list['mobile_number'])?$list['mobile_number']:''?></td>
                <td><?php echo isset($list['alt_mobile_number'])?$list['alt_mobile_number']:''?></td>
                <td><?php echo isset($list['aadhar_number'])?$list['aadhar_number']:''?></td>
                <td><?php echo isset($list['qualification'])?$list['qualification']:''?></td>
                <td><?php echo isset($list['dob'])?$list['dob']:''?></td>
                <td><?php echo isset($list['address'])?$list['address']:''?></td>
                
					<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>	
                <td>
				<a href="<?php echo base_url('salespersons/edit/'.base64_encode($list['s_id'])); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-warning btn-action" href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['s_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="ion ion-information-circled"></i></a>
				<a class="btn btn-danger btn-action" href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['s_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="ion ion-trash-b"></i></a>
				
				
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
			<a href="<?php echo base_url('salespersons/lists'); ?>" type="button" class="close" >&times;</a>

			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
            <a href="<?php echo base_url('salespersons/lists'); ?>" type="button"  class="btn  blueBtn">Cancel</a>

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
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('salespersons/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('salespersons/delete'); ?>"+"/"+id);
	
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