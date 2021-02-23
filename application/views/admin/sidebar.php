<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url('dashboard');?>">ROMA</a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
			<?php if(isset($user_details['profile_pic']) && $user_details['profile_pic']!=''){ ?>
                <img alt="image" src="<?php echo base_url('assets/admin_profile_pic/'.$user_details['profile_pic']); ?>">
			<?php }else{?>
                <img alt="image" src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpeg">
				<?php }?>
            </div>
            <div class="sidebar-user-details">
                <div class="user-name"><?php echo isset($user_details['name'])?$user_details['name']:''?></div>
                
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?php echo base_url('dashboard');?>"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>
			
			<!--<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				D</i><span>District</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('district/add');?>"><i class="ion ion-ios-circle-outline"></i>Add District</a></li>
                    <li><a href="<?php echo base_url('district/lists');?>"><i class="ion ion-ios-circle-outline"></i>District List</a></li>
                    
                </ul>
            </li>-->
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				D</i><span>District Wise Towns</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('town/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Town</a></li>
                    <li><a href="<?php echo base_url('town/lists');?>"><i class="ion ion-ios-circle-outline"></i>Town List</a></li>
                    
                </ul>
            </li>
			
			
            <li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>Sales </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('salespersons/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Sales Person</a></li>
                    <li><a href="<?php echo base_url('salespersons/lists');?>"><i class="ion ion-ios-circle-outline"></i> Sales Person List </a></li>
                    
                </ul>
            </li> 
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				H</i><span>Hospital</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('hospital/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Hospital</a></li>
                    <li><a href="<?php echo base_url('hospital/lists');?>"><i class="ion ion-ios-circle-outline"></i>Hospital List</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>BMW invoice </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('bmwinvoice/monthlybill');?>"><i class="ion ion-ios-circle-outline"></i>Monthly Bill</a></li>
                    <li><a href="<?php echo base_url('bmwinvoice/monthlybilllist');?>"><i class="ion ion-ios-circle-outline"></i>Monthly Bill List</a></li>
                </ul>
            </li> 
			<li>
                <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Certification </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('certification/add');?>"><i class="ion ion-ios-circle-outline"></i>Add</a></li>
                    <li><a href="<?php echo base_url('certification/index');?>"><i class="ion ion-ios-circle-outline"></i>List</a></li>
                </ul>
            </li>
			
			<li class="">
                <a href="<?php echo base_url('bmwinvoice/bill');?>"><i class="ion ">M</i><span>Monthly BMW Generation Bill</span></a>
            </li>
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>BMW Bills </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('bmwinvoice/pendingbilllist');?>"><i class="ion ion-ios-circle-outline"></i>Pending Bill List</a></li>
                    <li><a href="<?php echo base_url('bmwinvoice/paidbilllist');?>"><i class="ion ion-ios-circle-outline"></i>Paid Bill List</a></li>
                </ul>
            </li>
			
			    <li>
                <a href="#" class="has-dropdown"><i class="ion ">₹</i><span>Payments</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('payments');?>"><i class="ion ion-ios-circle-outline"></i>Update payment</a></li>
                    <li><a href="<?php echo base_url('payments/lists');?>"><i class="ion ion-ios-circle-outline"></i>Payment List</a></li>
                    
                </ul>
            </li>
            
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">E</i><span>Expenditure </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('expenditure/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Expenditure </a></li>
                    <li><a href="<?php echo base_url('expenditure/lists');?>"><i class="ion ion-ios-circle-outline"></i>Expenditure List</a></li>
                    <li><a href="<?php echo base_url('expenditure/monthlywise');?>"><i class="ion ion-ios-circle-outline"></i>Monthly wise Expenditure</a></li>
                    <li><a href="<?php echo base_url('expenditure/districtwise');?>"><i class="ion ion-ios-circle-outline"></i>District wise Expenditure</a></li>
                    
                </ul>
            </li>
			
			
			 <li class="">
                <a href="<?php echo base_url('income');?>"><i class="ion ">M</i><span>Monthly income report</span></a>
            </li>
			
			 <li class="">
                <a href="<?php echo base_url('income/district_wise');?>"><i class="ion ">D</i><span>District Wise Monthly income report</span></a>
            </li>
			
			<li class="">
                <a href="<?php echo base_url('income/pending');?>"><i class="ion ">D</i><span>District Wise Pending Bill</span></a>
            </li>
			
			<!--<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				N</i><span>Notification</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('notification/salespersonlist');?>"><i class="ion ion-ios-circle-outline"></i> Sales Person List </a></li>
                    <li><a href="<?php echo base_url('notification/hospitallist');?>"><i class="ion ion-ios-circle-outline"></i>Hospital List </a></li>
                    <li><a href="<?php echo base_url('notification/bmwinvoicelist');?>"><i class="ion ion-ios-circle-outline"></i> BMW invoice List </a></li>
                    <li><a href="<?php echo base_url('notification/paymentslist');?>"><i class="ion ion-ios-circle-outline"></i> Payments List </a></li>
                    <li><a href="<?php echo base_url('notification/expenditurelist');?>"><i class="ion ion-ios-circle-outline"></i> Expenditure List </a></li>
                    
                </ul>
            </li>--> 
			
			
			
			
        </ul>
    </aside>
</div>