<style>
*{
	padding:0;
	margin:0;
	letter-spacing:0.4px;
}
table, td, th {
  border: 1px solid #ddd;
  height:12mm;
}

table {
  border-collapse: collapse;
  width: 100%;
  padding-top:10mm;
	padding-bottom:10mm;
}
td{
	padding-left:2mm;
}

</style>
<div style="width:210mm;height:297mm;background:#fff;overflow:hidden;border:1px solid #ddd">
<div>
<div style="padding:10px">
	<table width="100%" style="border-bottom:none">
		<tr style="border:none;">
			<td style="max-width:30mm;min-width:30mm;border:none;overflow:hidden"><img style="height:18mm" src="http://srivenenvirontechnologies.in/assets/img/logo-n.png">
			<div style="font-size:10px;text-align:center">Regd No. 78/2020</div>
			</td>
			<td style="border:none;text-align:center;padding: 5mm">
				<h3 style="text-align:center;font-size:30px;color:#307d54">SRIVEN ENVIRON TECHNOLOGIES</h3>
				<div style="font-size:18px;">6/1/691 Kovur nagar, Anantapur,515002.</div>
				<div>Cell : 9573489997 | Email: tashok106@gmail.com</div>
			</td>
		
		</tr>
	
		
	</table>
	
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>District</strong><span style="margin-left:1mm"> : <?php echo isset($district_name['name'])?$district_name['name']:''?></span></div>
				<div><strong>Month-Year</strong><span style="margin-left:1mm"> :<?php if($district_name['month']==1){ echo "January";}else if($district_name['month']==2){ echo "February"; }else if($district_name['month']==3){ echo "March";}else if($district_name['month']==4){ echo "April";}else if($district_name['month']==5){ echo "May";}else if($district_name['month']==6){ echo "June";}else if($district_name['month']==7){ echo "July";}else if($district_name['month']==8){ echo "August";}else if($district_name['month']==9){ echo "September";}else if($district_name['month']==10){ echo "October";}else if($district_name['month']==11){ echo "November";}else if($district_name['month']==12){ echo "December";}?>-<?php echo isset($district_name['year'])?$district_name['year']:'' ?></span></div>
			</td>
			<td style="border-left:none;">
		    <div><strong>Town</strong><span style="margin-left:1.4mm">:<?php echo isset($district_name['town_name'])?$district_name['town_name']:''?> </span></div>
			</td>
		</tr>
	</table>
	
	<?php if(isset($pending_reports)&& count($pending_reports)>0){?>
	<table width="100%" >
		
		<tr>		
			   <th>Hospital name</th>
			   <th>Hospital Type</th>
			    <th>Month</th>
                <th>Year</th>
                <th>Total Amount</th>
                <th>Received Amount</th>
				<th>Discount</th>
                <th>Pending Amount</th>
		</tr>
		<?php  foreach($pending_reports as $list){?>
		<?php  foreach($list['paid_amount']as $lis){ ?>
		<?php  if(($list['total_amount'])-($lis['paid_amount'])>'0'){ ?>

		<tr>
			<td style="text-align:center">&nbsp;<?php echo isset($list['hospital_name'])?$list['hospital_name']:''?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['hospital_types'])?$list['hospital_types']:''?></td>
			<td style="text-align:center">&nbsp;<?php if($list['month']==1){ echo "January";}else if($list['month']==2){ echo "February"; }else if($list['month']==3){ echo "March";}else if($list['month']==4){ echo "April";}else if($list['month']==5){ echo "May";}else if($list['month']==6){ echo "June";}else if($list['month']==7){ echo "July";}else if($list['month']==8){ echo "August";}else if($list['month']==9){ echo "September";}else if($list['month']==10){ echo "October";}else if($list['month']==11){ echo "November";}else if($list['month']==12){ echo "December";}?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['year'])?$list['year']:''?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['total_amount'])?$list['total_amount']:''?></td>
			<td style="text-align:center">&nbsp;
			<?php echo isset($lis['paid'])?$lis['paid']:'0'?>
			
			</td>
			<td style="text-align:center">&nbsp;
			<?php echo isset($lis['discounts'])?$lis['discounts']:'0'?>
			
			</td>
			<td style="text-align:center">&nbsp;
			<?php echo (isset($list['total_amount'])?$list['total_amount']:'0')-(isset($lis['paid_amount'])?$lis['paid_amount']:'0')?>
			
			</td>
			
			
			
		</tr>
		<?php }?>
		<?php }?>
		<?php }?>
		
		<tr>		
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<!--<th>
			Total Amount=<?php echo isset($bills_total_amounts['total'])?$bills_total_amounts['total']:''?>
		   </th>
			<th>
			Received Amount=<?php echo isset($bills_paid_amounts['recevied_amount'])?$bills_paid_amounts['recevied_amount']:''?>
			</th>
			<th>
			Discount Amount=<?php echo isset($bills_paid_amounts['discount_amount'])?$bills_paid_amounts['discount_amount']:''?>
			</th>-->
			<th>
			Pending Amount=<?php echo (isset($bills_total_amounts['total'])?$bills_total_amounts['total']:'')-(isset($bills_paid_amounts['paid_amount'])?$bills_paid_amounts['paid_amount']:'')?>
			
			</th>
			
		</tr>
		
		
		
		
	</table>
	
	<?php }?>
	<br><br>
       Previous Months:
	<?php if(isset($prevous_pending_reports)&& count($prevous_pending_reports)>0){?>

	<table width="100%" >
		
		<tr>		
			   <th>Hospital name</th>
			   <th>Hospital Type</th>
			    <th>Month</th>
                <th>Year</th>
                <th>Total Amount</th>
                <th>Received Amount</th>
				<th>Discount</th>
                <th>Pending Amount</th>
		</tr>
		<?php  foreach($prevous_pending_reports as $list){?>
		<?php  foreach($list['paid_amount']as $lis){ ?>
      	<?php  if(($list['total_amount'])-($lis['paid_amount'])>'0'){ ?>

		<tr>
			<td style="text-align:center">&nbsp;<?php echo isset($list['hospital_name'])?$list['hospital_name']:''?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['hospital_types'])?$list['hospital_types']:''?></td>
			<td style="text-align:center">&nbsp;<?php if($list['month']==1){ echo "January";}else if($list['month']==2){ echo "February"; }else if($list['month']==3){ echo "March";}else if($list['month']==4){ echo "April";}else if($list['month']==5){ echo "May";}else if($list['month']==6){ echo "June";}else if($list['month']==7){ echo "July";}else if($list['month']==8){ echo "August";}else if($list['month']==9){ echo "September";}else if($list['month']==10){ echo "October";}else if($list['month']==11){ echo "November";}else if($list['month']==12){ echo "December";}?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['year'])?$list['year']:''?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['total_amount'])?$list['total_amount']:''?></td>
			<td style="text-align:center">&nbsp;
			<?php echo isset($lis['paid'])?$lis['paid']:'0'?>
			
			</td>
			<td style="text-align:center">&nbsp;
			<?php echo isset($lis['discounts'])?$lis['discounts']:'0'?>
			
			</td>
			<td style="text-align:center">&nbsp;
			<?php echo (isset($list['total_amount'])?$list['total_amount']:'0')-(isset($lis['paid_amount'])?$lis['paid_amount']:'0')?>
			
			</td>
			
			
			
		</tr>
		
		<?php }?>
		<?php }?>
		<?php }?>
		
		
		
		<tr>		
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<!--<th>
			Total Amount=<?php echo isset($prevous_total_amount['total'])?$prevous_total_amount['total']:''?>
		   </th>
			<th>
			Received Amount=<?php echo isset($prevous_paid_amount['recevied_amount'])?$prevous_paid_amount['recevied_amount']:''?>
			</th>
			<th>
			Discount Amount=<?php echo isset($prevous_paid_amount['discount_amount'])?$prevous_paid_amount['discount_amount']:''?>
			</th>-->
			<th>
			Pending Amount=<?php echo (isset($prevous_total_amount['total'])?$prevous_total_amount['total']:'')-(isset($prevous_paid_amount['paid_amount'])?$prevous_paid_amount['paid_amount']:'')?>
			
			</th>
			
		</tr>
		
		
		
		
	</table>
	<?php }else{?>
	<div>no data payments</div>
	<?php }?>
	
	<table width="100%" style="padding:10px;">
		
		<tr>		
			<td style="text-align:left;border-right:none;padding-top:20mm;padding-bottom:5mm">Customer Signature</td>
			<td style="text-align:center;border-right:none;border-left:none;padding-top:20mm;20mm;padding-bottom:5mm">Subject to jurisdiction Only</td>
			<td style="text-align:right;border-right:none; border-left:none;padding-top:20mm;20mm;padding-bottom:5mm;padding-right:5mm">Authorised	 Signature</td>
		</tr>
		
	</table>
	
	
	
	
	
</div>
</div>
</div>