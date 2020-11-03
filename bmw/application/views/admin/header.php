<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>Sriven  environ technologies</title>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/summernote-lite.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/css/custom.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/select2.min.css">
</head>
<?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                 <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
                        
                    </ul>
                   
                </form>
                <ul class="navbar-nav navbar-right">
                    <!--<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="ion ion-ios-bell-outline"></i>0</a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content">
                               <?php if(isset($sales_person_list_data) && count($sales_person_list_data)>0){?>
                                <?php foreach($sales_person_list_data as $list){?>
                                <a href="<?php echo base_url('notification/salespersonlist_view/'.base64_encode($list['s_id'])); ?>" class="dropdown-item">
                                    <b>Sales Person List</b>
									<br><br>
                                    <div class="dropdown-item-desc">
                                        <b><?php echo isset($list['name'])?$list['name']:''?></b>
                                        <div class="time"><?php echo isset($list['updated_at'])?$list['updated_at']:''?></div>
                                    </div>
                                </a>
								<?php } ?>
							   <?php } ?>
							   <?php if(isset($hospital_list_data)&& count($hospital_list_data)>0){?>
							    <?php foreach($hospital_list_data as $lis){?>
                                <a href="<?php echo base_url('notification/hospitallist_view/'.base64_encode($lis['h_id'])); ?>" class="dropdown-item">
                                    <b>Hospital List</b>
									<br><br>
                                    <div class="dropdown-item-desc">
                                        <b><?php echo isset($lis['hospital_name'])?$lis['hospital_name']:''?></b>
                                        <div class="time"><?php echo isset($lis['updated_at'])?$lis['updated_at']:''?></div>
                                    </div>
                                </a>
								<?php } ?>
							   <?php } ?>
							   
							   
							   
							   <?php if(isset($expenditure_list_data)&& count($expenditure_list_data)>0){?>
							    <?php foreach($expenditure_list_data as $li){?>
                                <a href="<?php echo base_url('notification/expenditurelist_view/'.base64_encode($li['e_id'])); ?>" class="dropdown-item">
                                    <b>Expenditure List</b>
									<br><br>
                                    <div class="dropdown-item-desc">
                                        <b><?php echo isset($li['particulars'])?$li['particulars']:''?></b>
                                        <div class="time"><?php echo isset($li['updated_at'])?$li['updated_at']:''?></div>
                                    </div>
                                </a>
								<?php } ?>
							   <?php } ?>
							   
							   
							   <?php if(isset($bmw_invoice_list_data)&& count($bmw_invoice_list_data)>0){?>
							    <?php foreach($bmw_invoice_list_data as $los){?>
                                <a href="<?php echo base_url('notification/bmw_invoice_view/'.base64_encode($los['h_m_b_id'])); ?>" class="dropdown-item">
                                    <b>BMW Invoice List</b>
									<br><br>
                                    <div class="dropdown-item-desc">
                                        <b><?php echo isset($los['hospital_name'])?$los['hospital_name']:''?></b>
                                        <div class="time"><?php echo isset($los['updated_at'])?$los['updated_at']:''?></div>
                                    </div>
                                </a>
								<?php } ?>
							   <?php } ?>
							   
							   
							   
							    <?php if(isset($payments_list_data)&& count($payments_list_data)>0){?>
							    <?php foreach($payments_list_data as $lop){?>
                                <a href="<?php echo base_url('notification/payments_view/'.base64_encode($lop['p_id'])); ?>" class="dropdown-item">
                                    <b>Payment List</b>
									<br><br>
                                    <div class="dropdown-item-desc">
                                        <b><?php echo isset($lop['hospitals_name'])?$lop['hospitals_name']:''?></b>
                                        <div class="time"><?php echo isset($lop['updated_at'])?$lop['updated_at']:''?></div>
                                    </div>
                                </a>
								<?php } ?>
							   <?php } ?>
							   
							   
							   
                            </div>
                        </div>
                    </li>-->
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                            <i class="ion ion-android-person d-lg-none"></i>
                            <div class="d-sm-none d-lg-inline-block">Admin</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url('profile');?>" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Profile
                            </a>
                            <a href="<?php echo base_url('profile/changepassword');?>" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Change Password
                            </a>
                            <a href="<?php echo base_url('dashboard/logout');?>" class="dropdown-item has-icon">
                                <i class="ion ion-log-out"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
			
			
			
			<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
			
			<div style="padding:10px">
			<a href="<?php echo base_url('hospital/lists'); ?>" type="button" class="close" >&times;</a>
			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <a href="<?php echo base_url('hospital/lists'); ?>" type="button"  class="btn  blueBtn">Cancel</a>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>	