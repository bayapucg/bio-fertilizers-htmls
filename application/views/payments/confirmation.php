

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Payment</div>
        </h1>
        <div class="section-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payment</h4>
							
                        </div>
                        <div class="card-body">
          <a  href="<?php echo base_url('payments/deletes/'.base64_encode($s_detail['p_id'])); ?>"  class="btn btn-info btn-rounded pull-right">Delete</a>
                            
							<br><br>
							<div class="row">
                              
                                <div class="col-md-7">
                                    <div class="mb-2">
                                        <b class="mr-1">Hospital name</b> : <span class="ml-1"><?php echo isset($s_detail['hospital_name'])?$s_detail['hospital_name']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Month</b> : <span class="ml-1"><td>
				<?php if($s_detail['month']==1){ echo "January";}else if($s_detail['month']==2){ echo "February"; }else if($s_detail['month']==3){ echo "March";}else if($s_detail['month']==4){ echo "April";}else if($s_detail['month']==5){ echo "May";}else if($s_detail['month']==6){ echo "June";}else if($s_detail['month']==7){ echo "July";}else if($s_detail['month']==8){ echo "August";}else if($s_detail['month']==9){ echo "September";}else if($s_detail['month']==10){ echo "October";}else if($s_detail['month']==11){ echo "November";}else if($s_detail['month']==12){ echo "December";}?>
				
				</td></span>
                                    </div>
									 <div class="mb-2">
                                        <b class="mr-1">Year</b> : <span class="ml-1"><?php echo isset($s_detail['years'])?$s_detail['years']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Sales Person</b> : <span class="ml-1"><?php echo isset($s_detail['sales_person'])?$s_detail['sales_person']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Total Amount</b> : <span class="ml-1"><?php echo isset($s_detail['total_amount'])?$s_detail['total_amount']:''?></span>
                                    </div>
                                    <div class="mb-2">
                                        <b class="mr-1">Received Amount</b> : <span class="ml-1"><?php echo isset($s_detail['paid_amount'])?$s_detail['paid_amount']:''?></span>
                                    </div> 
									<div class="mb-2">
                                        <b class="mr-1">Discount</b> : <span class="ml-1"><?php echo isset($s_detail['discount'])?$s_detail['discount']:''?></span>
                                    </div>
									<div class="mb-2">
                                        <b class="mr-1">Payment Type</b> : <span class="ml-1"><?php if($s_detail['payment_type']==1){ echo "Cash";}else if($s_detail['payment_type']==2){ echo "Online"; }else if($s_detail['payment_type']==3){ echo "Cheque"; } ?></span>                
                                      
                                    </div>
                                 <div class="mb-2">
                                        <b class="mr-1">Transaction Number</b> : <span class="ml-1"><?php echo isset($s_detail['trans_action_no'])?$s_detail['trans_action_no']:''?></span>
                                    </div>
									<div class="mb-2">
                                        <b class="mr-1">Cheque Number</b> : <span class="ml-1"><?php echo isset($s_detail['cheque_no'])?$s_detail['cheque_no']:''?></span>
                                    </div>
									<div class="mb-2">
                                        <b class="mr-1">Date</b> : <span class="ml-1"><?php echo isset($s_detail['created_at'])?$s_detail['created_at']:''?></span>
                                    </div>
									
									<br><br>
									<a href="<?php echo base_url('payments/update/'.base64_encode($s_detail['s_id'])); ?>" type="submit" class="btn btn-primary ">Continue</a>
                                    <a href="<?php echo base_url('payments/lists'); ?>" type="submit" class="btn btn-primary ">Exit</a>
                                        
                                   
                                  
								
								
								
                                </div>
								 
                            </div>
                        </div>
                    </div>
                </div>

                
            







            </div>
        </div>
    </section>
</div>

