

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>BMW invoice</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      
						 <div class="card-header">
                            <h4>Pending BMW invoice &nbsp;&nbsp;<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['year'])?$month_name['year']:'' ?></h4>
                        </div>
						 <div class="card-header">
                            <a href="<?php echo base_url('bmwinvoice/pendingbilllist'); ?>" class="btn btn-primary">Back</a>
                        </div>
						<?php if(isset($month_name)&& count($month_name)>0){?>

						<div class="table-responsive">

						<table id="example" class="table table-striped table-bordered" style="width:100%">

						<thead>
                        
					<tr>		
					<th>Hospital Name</th>
					<th>Prev Month Balance</th>
					<th>Total Amount</th>
					<th>Paid Amount</th>
					<th>pending Amount</th>
					<th>Amount</th>
					<th>Action</th>
					</tr>
						</thead>
						
						<tbody>						
						<tr>
						<td style="text-align:center">&nbsp;<?php echo isset($month_name['hospital_name'])?$month_name['hospital_name']:'' ?></td>
						<td style="text-align:center">&nbsp;<?php echo (isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0') ?></td>
						<td style="text-align:center">&nbsp;<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:'0' ?></td>
						<td style="text-align:center">&nbsp;<?php echo isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0' ?></td>
						<td style="text-align:center">&nbsp;<?php echo ((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0')) ?></td>
						<td style="text-align:center">&nbsp;<?php echo ((isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0'))+(((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0'))) ?></td>
						
						<td>
					<a target="_blank" href="<?php echo base_url('bmwinvoice/prints/'.base64_encode($month_name['h_m_b_id'])); ?>" style="text-align:center"  class="btn btn-info">Print</a>
                     </td>
						
						</tr>
						
                       
						</tbody>

						</table>
						</div>

                     <?php }else{ ?>
                      <div>This Month BMW Generation Bill  no data</div>
                       <?php }?>

						
						
						
						
						
						
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
<script type="text/javascript">


$(document).ready(function() {
    $('#add_category').bootstrapValidator({
        
        fields: {
             hospital: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
            month: {
                validators: {
					notEmpty: {
						message: 'Month is required'
					}
					
				}
            },
			year: {
                validators: {
					notEmpty: {
						message: 'Year is required'
					}
					
				}
            },
			
			
			
			
			
            }
        })
     
});

</script>
