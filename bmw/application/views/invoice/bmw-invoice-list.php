

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
						<?php if(isset($mothly_bill_list) && count($mothly_bill_list)>0){ ?>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php $cnt=1; foreach($mothly_bill_list as $list){ ?>
            <tr>
                <td><?php echo isset($list['hospital_name'])?$list['hospital_name']:''?></td>
                <td><?php echo isset($list['hospital_types'])?$list['hospital_types']:''?></td>
                <td>
				<?php if($list['month']==1){ echo "January";}else if($list['month']==2){ echo "February"; }else if($list['month']==3){ echo "March";}else if($list['month']==4){ echo "April";}else if($list['month']==5){ echo "May";}else if($list['month']==6){ echo "June";}else if($list['month']==7){ echo "July";}else if($list['month']==8){ echo "August";}else if($list['month']==9){ echo "September";}else if($list['month']==10){ echo "October";}else if($list['month']==11){ echo "November";}else if($list['month']==12){ echo "December";}?>
				
				</td>
                <td><?php echo isset($list['year'])?$list['year']:''?></td>
                <td><?php echo isset($list['no_beds'])?$list['no_beds']:''?></td>
                <td><?php echo isset($list['cost_per_month'])?$list['cost_per_month']:''?></td>
				<td>
				<?php if($list['hospital_types']=='Bedded hospital'){?>
				<?php }else if($list['hospital_types']=='Nursing home'){?>
				<?php }else {?>
				<?php echo isset($list['total_amount'])?$list['total_amount']:''?>
				<?php }?>
				</td>
                <td><?php echo isset($list['total_amount'])?$list['total_amount']:''?></td>
                <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
					
                   <td>
				<!--<a class="btn btn-info btn-action" href="<?php echo base_url('bmwinvoice/prints/'.base64_encode($list['h_m_b_id'])); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Print">Print</a>-->
				<a href="<?php echo base_url('bmwinvoice/edit/'.base64_encode($list['h_m_b_id'])); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-warning btn-action" href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['h_m_b_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="ion ion-information-circled"></i></a>
				<a class="btn btn-danger btn-action" href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['h_m_b_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="ion ion-trash-b"></i></a>
				
				
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
			<a href="<?php echo base_url('bmwinvoice/monthlybilllist'); ?>" type="button" class="close" >&times;</a>
			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <a href="<?php echo base_url('bmwinvoice/monthlybilllist'); ?>" type="button"  class="btn  blueBtn">Cancel</a>
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
	$(".popid").attr("href","<?php echo base_url('bmwinvoice/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('bmwinvoice/delete'); ?>"+"/"+id);
	
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