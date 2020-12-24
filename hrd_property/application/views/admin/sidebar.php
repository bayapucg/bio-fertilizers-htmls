<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url('dashboard'); ?>">HRD</a>
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
		
		<?php if($user_details['role_id']==1){?>
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
				C</i><span>City</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('city/add');?>"><i class="ion ion-ios-circle-outline"></i>Add</a></li>
                    <li><a href="<?php echo base_url('city/lists');?>"><i class="ion ion-ios-circle-outline"></i>List</a></li>
                    
                </ul>
            </li> 
			<li>
                <a href="#" class="has-dropdown"><i class="ion ">
				P</i><span>Property</span></a>
                <ul class="menu-dropdown">
                    <li><a href="<?php echo base_url('property/add');?>"><i class="ion ion-ios-circle-outline"></i>Add</a></li>
                    <li><a href="<?php echo base_url('property/lists');?>"><i class="ion ion-ios-circle-outline"></i>List</a></li>
                    
                </ul>
            </li> 
			<li class="">
         <a href="<?php echo base_url('properties/lists');?>"><i class="ion">P</i><span>Property List</span></a>
         </li>
		 <li class="">
         <a href="<?php echo base_url('citywise/propertylist');?>"><i class="ion">CW</i><span>City Wise Property’s list</span></a>
         </li>
		 <li class="">
         <a href="<?php echo base_url('citywise/managerlist');?>"><i class="ion">CW</i><span>City Wise Manager list </span></a>
         </li>
		 
		 
		 <li class="">
         <a href="<?php echo base_url('process/propertylist');?>"><i class="ion">P</i><span>On Process Property list </span></a>
         </li>
		 <li class="">
         <a href="<?php echo base_url('Sales/lists');?>"><i class="ion">S</i><span>Sale completed list</span></a>
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
         <a href="<?php echo base_url('properties/lists');?>"><i class="ion">P</i><span>Property List</span></a>
         </li>
		 <li class="">
         <a href="<?php echo base_url('process/propertylist');?>"><i class="ion">P</i><span>On Process Property list </span></a>
         </li>
		 
		 
		 
		  <li class="">
         <a href="<?php echo base_url('Sales/lists');?>"><i class="ion">S</i><span>Sale completed list</span></a>
         </li>
		 
		 
		  <li class="">
         <a href="<?php echo base_url('properties/verifiedlist');?>"><i class="ion">P</i><span>Property Verified List</span></a>
         </li>
		 
		<?php  }else if($user_details['role_id']==3){?>

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
         <a href="<?php echo base_url('properties/lists');?>"><i class="ion">P</i><span>Property list</span></a>
         </li> 
        		 
      <li class="">
         <a href="<?php echo base_url('Sales/lists');?>"><i class="ion">S</i><span>Sale completed list</span></a>
         </li>
		 <?php }else  if($user_details['role_id']==4){?>
		 <li class="">
         <a href="<?php echo base_url('dashboard');?>"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
         </li>
		  <li><a href="<?php echo base_url('employee/lists');?>"><i class="ion ">E</i> Employee List </a></li>

		
		 <li class="">
         <a href="<?php echo base_url('properties/lists');?>"><i class="ion">P</i><span>Property list</span></a>
         </li>
		<li class="">
         <a href="<?php echo base_url('Sales/lists');?>"><i class="ion">S</i><span>Sale completed list</span></a>
         </li>
		 <?php } ?>
        </ul>
    </aside>
</div>