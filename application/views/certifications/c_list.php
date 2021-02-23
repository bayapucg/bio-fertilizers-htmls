

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Certifications List</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Certifications List</h4>
                        </div>
                        <div class="card-body">
						<?php if(isset($c_list) && count($c_list)>0){ ?>
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Hospital Name</th>
                <th>Hospital type</th>
                <th>Total bed strength</th>
                <th>To date</th>
                <th>From date</th>
                <th>Registration no</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		 <?php $cnt=1; foreach($c_list as $list){ ?>
            <tr>
                <td><?php echo isset($list['hospital_name'])?$list['hospital_name']:''?></td>
                <td><?php echo isset($list['hospital_types'])?$list['hospital_types']:''?></td>
              
                <td><?php echo isset($list['total_bed_strength'])?$list['total_bed_strength']:''?></td>
                <td><?php echo isset($list['to_date'])?$list['to_date']:''?></td>
                <td><?php echo isset($list['from_date'])?$list['from_date']:''?></td>
			
                <td><?php echo isset($list['registration_no'])?$list['registration_no']:''?></td>
                <td><?php echo isset($list['created_at'])?$list['created_at']:''?></td>
				<td>
				<a  target="_blank" href="<?php echo base_url('certification/download/'.base64_encode($list['c_id'])); ?>" class="btn btn-success btn-action mr-1" data-toggle="tooltip" data-original-title="download">Download</a>
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

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>