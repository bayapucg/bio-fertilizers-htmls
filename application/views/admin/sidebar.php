<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.php">Bio Fertilizers</a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
			<?php  if($user_details['profile_pic']!=''){?>
                <img alt="image" src="<?php echo base_url('assets/profile_pics/'.$user_details['profile_pic']); ?>">
            <?php }else{?>
		<img alt="image" src="<?php echo base_url();?>assets/img/avatar/avatar-1.jpeg">
          <?php  }?>
			</div>
            <div class="sidebar-user-details">
                <div class="user-name"><?php echo isset($user_details['name'])?$user_details['name']:''?></div>
                <div class="user-role">
                    <?php echo isset($user_details['role_name'])?$user_details['role_name']:''?>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
		
		<?php  if($user_details['role_id']==3){?>

		<li class="">
         <a href="<?php echo base_url('dashboard');?>"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
         </li>
          
        	
		       <li>
                <a href="#" class="has-dropdown"><i class="ion ">
				E</i><span>Employees </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('employee/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Employee</a></li>
                    <li><a href="<?php echo base_url('employee/lists');?>"><i class="ion ion-ios-circle-outline"></i> Employee List </a></li>
                    
                </ul>
            </li> 
        	
                   <li>
                <a href="#" class="has-dropdown"><i class="ion ">
				O</i><span>Order cum invoice</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('ordercuminvoice/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Order cum invoice</a></li>
                    <li><a href="<?php echo base_url('ordercuminvoice/lists');?>"><i class="ion ion-ios-circle-outline"></i> Order cum invoice List </a></li>
                    
                </ul>
            </li> 

          <li class="">
         <a href="<?php echo base_url('glpayment/lists');?>"><i class="ion ">G</i><span>GL payment List</span></a>
         </li>

         <li class="">
         <a href="<?php echo base_url('expenses/lists');?>"><i class="ion ">S</i><span>SE/ST Expenses   List</span></a>
         </li>
		 <li class="">
         <a href="<?php echo base_url('salesbulletin/lists');?>"><i class="ion ">S</i><span>Sales Bulletin List</span></a>
         </li>
		 
		  <li class="">
         <a href="<?php echo base_url('transfer_to_other_camps/lists');?>"><i class="ion ">T</i><span>Transfer to Other Camps List</span></a>
         </li>
		 
		  <li class="">
         <a href="<?php echo base_url('godownstock/lists');?>"><i class="ion ">G</i><span>Godown Stock Point List</span></a>
         </li>
		  <li class="">
         <a href="<?php echo base_url('stock/lists');?>"><i class="ion ">S</i><span>Stock at Camp / Room List</span></a>
         </li>
			<!--<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				G</i><span>GL Payment  </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('glpayment/add');?>"><i class="ion ion-ios-circle-outline"></i>Add GL Payment</a></li>
                    <li><a href="<?php echo base_url('glpayment/lists');?>"><i class="ion ion-ios-circle-outline"></i> GL payment List </a></li>
                    
                </ul>
            </li> 
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>SE/ST Expenses    </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('expenses/add');?>"><i class="ion ion-ios-circle-outline"></i>Add SE/ST Expenses  </a></li>
                    <li><a href="<?php echo base_url('expenses/lists');?>"><i class="ion ion-ios-circle-outline"></i> SE/ST Expenses   List </a></li>
                    
                </ul>
            </li>-->
			<!--<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				G</i><span>Group wise Reconciliation & bulletin   </span></a>
                <ul class="menu-dropdown">
                    <li><a href="add-godown-stock-point.php"><i class="ion ion-ios-circle-outline"></i>Add  Godown Stock Point  </a></li>
                    <li><a href="transfer-to-other-camps.php"><i class="ion ion-ios-circle-outline"></i> Transfer to Other Camps</a></li>
                    <li><a href="stock-at-camp-room.php"><i class="ion ion-ios-circle-outline"></i> Stock at Camp / Room</a></li>
                    <li><a href="sales-bulletin.php"><i class="ion ion-ios-circle-outline"></i> Sales Bulletin</a></li>
                    
                </ul>
            </li> -->
		<?php }else  if($user_details['role_id']==1){?>
		<li class="">
         <a href="<?php echo base_url('dashboard');?>"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
         </li>
		 <li>
                <a href="#" class="has-dropdown"><i class="ion ">
				E</i><span>Employees </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('employee/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Employee</a></li>
                    <li><a href="<?php echo base_url('employee/lists');?>"><i class="ion ion-ios-circle-outline"></i> Employee List </a></li>
                    
                </ul>
            </li> 
		
		<li class="">
         <a href="<?php echo base_url('glpayment/lists');?>"><i class="ion ">G</i><span>GL payment List</span></a>
         </li>
		
		<li class="">
         <a href="<?php echo base_url('ordercuminvoice/lists');?>"><i class="ion ">O</i><span>Order cum invoice List</span></a>
         </li>
		
		<li class="">
         <a href="<?php echo base_url('expenses/lists');?>"><i class="ion ">S</i><span>SE/ST Expenses List</span></a>
         </li>
		 
		 
		 
		 <li class="">
         <a href="<?php echo base_url('salesbulletin/lists');?>"><i class="ion ">S</i><span>Sales Bulletin List</span></a>
         </li>
		 
		  <li class="">
         <a href="<?php echo base_url('transfer_to_other_camps/lists');?>"><i class="ion ">T</i><span>Transfer to Other Camps List</span></a>
         </li>
		 
		  <li class="">
         <a href="<?php echo base_url('godownstock/lists');?>"><i class="ion ">G</i><span>Godown Stock Point List</span></a>
         </li>
		  <li class="">
         <a href="<?php echo base_url('stock/lists');?>"><i class="ion ">S</i><span>Stock at Camp / Room List</span></a>
         </li>
		 <?php }else  if($user_details['role_id']==2){?>
		 <li class="">
         <a href="<?php echo base_url('dashboard');?>"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
         </li>
		  <li>
                <a href="#" class="has-dropdown"><i class="ion ">
				E</i><span>Employees </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('employee/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Employee</a></li>
                    <li><a href="<?php echo base_url('employee/lists');?>"><i class="ion ion-ios-circle-outline"></i> Employee List </a></li>
                    
                </ul>
            </li> 
		
		<li class="">
         <a href="<?php echo base_url('glpayment/lists');?>"><i class="ion ">G</i><span>GL payment List</span></a>
         </li>
		
		<li class="">
         <a href="<?php echo base_url('ordercuminvoice/lists');?>"><i class="ion ">O</i><span>Order cum invoice List</span></a>
         </li>
		
		<li class="">
         <a href="<?php echo base_url('expenses/lists');?>"><i class="ion ">S</i><span>SE/ST Expenses List</span></a>
         </li>
		 
		 <li class="">
         <a href="<?php echo base_url('salesbulletin/lists');?>"><i class="ion ">S</i><span>Sales Bulletin List</span></a>
         </li>
		 
		  <li class="">
         <a href="<?php echo base_url('transfer_to_other_camps/lists');?>"><i class="ion ">T</i><span>Transfer to Other Camps List</span></a>
         </li>
		 
		  <li class="">
         <a href="<?php echo base_url('godownstock/lists');?>"><i class="ion ">G</i><span>Godown Stock Point List</span></a>
         </li>
		  <li class="">
         <a href="<?php echo base_url('stock/lists');?>"><i class="ion ">S</i><span>Stock at Camp / Room List</span></a>
         </li>
		 <?php }else  if($user_details['role_id']==4){?>
		 <li class="">
         <a href="<?php echo base_url('dashboard');?>"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
         </li>
		  <li>
                <a href="#" class="has-dropdown"><i class="ion ">
				E</i><span>Employees </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('employee/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Employee</a></li>
                    <li><a href="<?php echo base_url('employee/lists');?>"><i class="ion ion-ios-circle-outline"></i> Employee List </a></li>
                    
                </ul>
            </li> 
        	


			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				G</i><span>GL Payment  </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('glpayment/add');?>"><i class="ion ion-ios-circle-outline"></i>Add GL Payment</a></li>
                    <li><a href="<?php echo base_url('glpayment/lists');?>"><i class="ion ion-ios-circle-outline"></i> GL payment List </a></li>
                    
                </ul>
            </li> 
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				O</i><span>Order cum invoice   </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('ordercuminvoice/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Order cum invoice</a></li>
                    <li><a href="<?php echo base_url('ordercuminvoice/lists');?>"><i class="ion ion-ios-circle-outline"></i> Order cum invoice List </a></li>
                    
                </ul>
            </li> 
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>SE/ST Expenses    </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('expenses/add');?>"><i class="ion ion-ios-circle-outline"></i>Add SE/ST Expenses  </a></li>
                    <li><a href="<?php echo base_url('expenses/lists');?>"><i class="ion ion-ios-circle-outline"></i> SE/ST Expenses   List </a></li>
                    
                </ul>
            </li>
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>Sales Bulletin</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('salesbulletin/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Sales Bulletin</a></li>
                    <li><a href="<?php echo base_url('salesbulletin/lists');?>"><i class="ion ion-ios-circle-outline"></i>Sales Bulletin List </a></li>
                    
                </ul>
            </li>
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion">
				T</i><span>Transfer to Other Camps</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('transfer_to_other_camps/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Transfer to Other Camps</a></li>
                    <li><a href="<?php echo base_url('transfer_to_other_camps/lists');?>"><i class="ion ion-ios-circle-outline"></i>Transfer to Other Camps List </a></li>
                    
                </ul>
            </li>
			
			
			
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				G</i><span>Godown Stock Point</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('godownstock/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Godown Stock Point</a></li>
                    <li><a href="<?php echo base_url('godownstock/lists');?>"><i class="ion ion-ios-circle-outline"></i>Godown Stock Point List </a></li>
                    
                </ul>
            </li>
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>Stock at Camp/Room</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('stock/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Stock at Camp/Room</a></li>
                    <li><a href="<?php echo base_url('stock/lists');?>"><i class="ion ion-ios-circle-outline"></i>Stock at Camp / Room List </a></li>
                    
                </ul>
            </li>
			
			
		  <?php }else  if($user_details['role_id']==5){?>
		  <li class="">
         <a href="<?php echo base_url('dashboard');?>"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
         </li>
		 
		 <li class="">
         <a href="<?php echo base_url('employee/lists');?>"><i class="ion ">E</i><span>Employee List</span></a>
         </li>
		 
		 
		 <li>
                <a href="#" class="has-dropdown"><i class="ion ">
				G</i><span>GL Payment  </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('glpayment/add');?>"><i class="ion ion-ios-circle-outline"></i>Add GL Payment</a></li>
                    <li><a href="<?php echo base_url('glpayment/lists');?>"><i class="ion ion-ios-circle-outline"></i> GL payment List </a></li>
                    
                </ul>
            </li> 
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				O</i><span>Order cum invoice   </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('ordercuminvoice/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Order cum invoice</a></li>
                    <li><a href="<?php echo base_url('ordercuminvoice/lists');?>"><i class="ion ion-ios-circle-outline"></i> Order cum invoice List </a></li>
                    
                </ul>
            </li> 
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>SE/ST Expenses    </span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('expenses/add');?>"><i class="ion ion-ios-circle-outline"></i>Add SE/ST Expenses  </a></li>
                    <li><a href="<?php echo base_url('expenses/lists');?>"><i class="ion ion-ios-circle-outline"></i> SE/ST Expenses   List </a></li>
                    
                </ul>
            </li>
			
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>Sales Bulletin</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('salesbulletin/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Sales Bulletin</a></li>
                    <li><a href="<?php echo base_url('salesbulletin/lists');?>"><i class="ion ion-ios-circle-outline"></i>Sales Bulletin List </a></li>
                    
                </ul>
            </li>
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion">
				T</i><span>Transfer to Other Camps</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('transfer_to_other_camps/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Transfer to Other Camps</a></li>
                    <li><a href="<?php echo base_url('transfer_to_other_camps/lists');?>"><i class="ion ion-ios-circle-outline"></i>Transfer to Other Camps List </a></li>
                    
                </ul>
            </li>
			
			
			
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				G</i><span>Godown Stock Point</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('godownstock/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Godown Stock Point</a></li>
                    <li><a href="<?php echo base_url('godownstock/lists');?>"><i class="ion ion-ios-circle-outline"></i>Godown Stock Point List </a></li>
                    
                </ul>
            </li>
			
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				S</i><span>Stock at Camp/Room</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('stock/add');?>"><i class="ion ion-ios-circle-outline"></i>Add Stock at Camp/Room</a></li>
                    <li><a href="<?php echo base_url('stock/lists');?>"><i class="ion ion-ios-circle-outline"></i>Stock at Camp / Room List </a></li>
                    
                </ul>
            </li>
			
			
			
			
		 <?php } ?>
        </ul>
    </aside>
</div>