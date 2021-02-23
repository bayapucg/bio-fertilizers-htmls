

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Property </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Property List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($p_list)&& count($p_list)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name of property</th>
                <th>Owner name</th>
                <th>City</th>
                <th>Address</th>
                <th>Type of property</th>
                <th>Land in acres /cents</th>
                <th>Property cost</th>
                <th>Specifications</th>
				<th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		   <?php foreach($p_list as $list){?>
            <tr>
                <td><?php echo isset($list['property_name'])?$list['property_name']:''?></td>
                <td><?php echo isset($list['owner_name'])?$list['owner_name']:''?></td>
                <td><?php echo isset($list['c_name'])?$list['c_name']:''?></td>
                <td><?php echo isset($list['address'])?$list['address']:''?></td>
                <td><?php echo isset($list['property'])?$list['property']:''?></td>
                <td><?php echo isset($list['land'])?$list['land']:''?></td>
                <td><?php echo isset($list['p_cost'])?$list['p_cost']:''?></td>
                <td><?php echo isset($list['specifications'])?$list['specifications']:''?></td>
                <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>

				
		       <td>
				<a href="<?php echo base_url('properties/edit/'.base64_encode($list['p_id'])); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
                <a class="btn btn-warning btn-action" href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['p_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="ion ion-information-circled"></i></a>
				<a class="btn btn-danger btn-action" href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['p_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="ion ion-trash-b"></i></a>
				</td>
		
		
            </tr>
           <?php }?>
        </tbody>
        
    </table>
                            </div>
							 <?php }else{?>
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
		<a href="<?php echo base_url('properties/lists'); ?>" type="button" class="close" >&times;</a>

			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <a href="<?php echo base_url('properties/lists'); ?>" type="button"  class="btn  blueBtn">Cancel</a>
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
	$(".popid").attr("href","<?php echo base_url('properties/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('properties/delete'); ?>"+"/"+id);
	
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