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
	<table width="100%" >
		<tr style="border:none;">
			<td rowspan="5" style="max-width:30mm;min-width:30mm;border:none;overflow:hidden"><img style="height:18mm" src="https://medarogya.com/assets/logo/logo-n.png">
			<div style="font-size:10px;text-align:center">Regd No. 78/2020</div>
			</td>
			<td style="border:none;text-align:center;padding: 5mm">
				<h3 style="text-align:center;font-size:20px;">SRIVEN ENVIRON TECHNOLOGIES</h3>
				<div style="font-size:18px;">6/1/691 Kovur nagar, Anantapur,515002.</div>
				<div>Email: tashok106@gmail.com</div>
			</td>
			<td rowspan="1" style="max-width:39mm;min-width:39mm;border:none;overflow:hidden">
				<div>Cell : 9573489997</div>
				<div>Cell : 8500226782</div>
				<div>PAN  : PAN000ER</div>
			</td>
		</tr>
		<tr>
			<td>
				<h3 style="text-align:center">BMW Invoice </h3><br>
				<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['years'])?$month_name['years']:'' ?>
			</td>
			<td style="border-left:none;border-top:none">
				&nbsp;
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>Hospital Name</strong><span style="margin-left:1mm"> : <?php echo isset($month_name['hospital_name'])?$month_name['hospital_name']:''?></span></div>
				<div><strong>Hospital Type</strong><span style="margin-left:1mm"> : <?php echo isset($month_name['hospital_types'])?$month_name['hospital_types']:''?></span></div>
				<div><strong>Address </strong><span style="margin-left:14mm"> : <?php echo isset($month_name['hospital_address'])?$month_name['hospital_address']:''?></span></div>
			</td>
			<td style="border-left:none;">
			<div><strong>Month-Year </strong> <span style="margin-left:13mm">: <?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['years'])?$month_name['years']:'' ?>
</span></div>
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>Total Amount</strong><span style="margin-left:1mm"> :&nbsp;&nbsp;<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?></span></div>
				
			</td>
			<td style="border-left:none;">
			<div><strong>Pending Amount</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px">&nbsp; &nbsp;<?php echo isset($month_name['pending'])?$month_name['pending']:''?></span></span></div>
			
			</td>
		</tr>
	</table>
	
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			<td >
				<div><strong>In Words</strong><span style="margin-left:1mm">&nbsp;&nbsp;<?php   echo $this->livemumtowordclsconvert->mycustom_convert_num(isset($month_name['total_amount'])?$month_name['total_amount']:'')?>&nbsp;Rupees Only</span></div>
			</td>
		</tr>
		
		<tr>
			<td >
				<div><strong>Info</strong><span style="margin-left:1mm">Account summery from &nbsp;<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['years'])?$month_name['years']:''?></span></div>
			</td>
		</tr>
	</table>
	<br>
<?php if(isset($paid_bill)&& count($paid_bill)>0){?>
	<table width="100%" >
		<tr>
			<th>
				Month-Year			
			</th>
			<th>
				Total Amount			
			</th>
			<th>
				Received Amount
			</th>
			
			<th>
				Discount		
			</th>
			<th>
				Sales Person		
			</th>
			<th>
				Payment Type		
			</th>
			<th>
				Transaction Number		
			</th>
			<th>
				Cheque Number		
			</th>
			<th>
				Date		
			</th>
		</tr>
		<?php foreach($paid_bill as $list){?>
		<tr>
		    <td style="text-align:center">				<?php if($list['month']==1){ echo "January";}else if($list['month']==2){ echo "February"; }else if($list['month']==3){ echo "March";}else if($list['month']==4){ echo "April";}else if($list['month']==5){ echo "May";}else if($list['month']==6){ echo "June";}else if($list['month']==7){ echo "July";}else if($list['month']==8){ echo "August";}else if($list['month']==9){ echo "September";}else if($list['month']==10){ echo "October";}else if($list['month']==11){ echo "November";}else if($list['month']==12){ echo "December";}?>
-<?php echo isset($list['years'])?$list['years']:''?></td>
			<td style="text-align:center"><?php echo isset($list['total_amount'])?$list['total_amount']:''?></td>
			<td style="text-align:center"><?php echo isset($list['paid_amount'])?$list['paid_amount']:''?></td>
			<td style="text-align:center"><?php echo isset($list['discount'])?$list['discount']:''?></td>
			<td style="text-align:center"><?php echo isset($list['sales_person'])?$list['sales_person']:''?></td>
			<td style="text-align:center"><?php if($list['payment_type']==1){ echo "Cash";}else if($list['payment_type']==2){ echo "Online"; }else if($list['payment_type']==3){ echo "Cheque"; } ?></td>
			<td style="text-align:center"><?php echo isset($list['trans_action_no'])?$list['trans_action_no']:''?></td>
			<td style="text-align:center"><?php echo isset($list['cheque_no'])?$list['cheque_no']:''?></td>
			<td style="text-align:center"><?php echo isset($list['created_at'])?$list['created_at']:''?></td>
		</tr>
		<?php }?>
		<tr>
			<th>
							
			</th>
			<th>
				Total Amount=<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?>			
			</th>
			<th>
				Received Amount=<?php echo isset($month_name['paid'])?$month_name['paid']:''?>
			</th>
			
			<th>
				Pending Amount=	<?php echo isset($month_name['pending'])?$month_name['pending']:''?>
			</th>
			
			
		</tr>
		
	</table>
	<?php }?>
	
<br><br>
       Previous Months:
	   	<?php if(isset($paid_bills_previous_month)&& count($paid_bills_previous_month)>0){?>

	<table width="100%" >
		<tr>
			<th>
				Month-Year			
			</th>
			<th>
				Total Amount			
			</th>
			
			<th>
				Received Amount	
			</th>
			
			<th>
				Pending Amount		
			</th>
			
		</tr>
		<?php foreach($paid_bills_previous_month as $list){?>
		<tr>
			<td style="text-align:center">				<?php if($list['month']==1){ echo "January";}else if($list['month']==2){ echo "February"; }else if($list['month']==3){ echo "March";}else if($list['month']==4){ echo "April";}else if($list['month']==5){ echo "May";}else if($list['month']==6){ echo "June";}else if($list['month']==7){ echo "July";}else if($list['month']==8){ echo "August";}else if($list['month']==9){ echo "September";}else if($list['month']==10){ echo "October";}else if($list['month']==11){ echo "November";}else if($list['month']==12){ echo "December";}?>
-<?php echo isset($list['years'])?$list['years']:''?></td>
			
			<td style="text-align:center"><?php echo isset($list['total_amount'])?$list['total_amount']:''?></td>
			<?php if($list['month_wise_amount']==array()){?>
			<td style="text-align:center">0</td>
			
		   <td style="text-align:center"><?php echo (isset($list['total_amount'])?$list['total_amount']:'')?></td>
		   
		   
          <?php }else{?>
			
			<?php foreach($list['month_wise_amount'] as $lis){?>
			<td style="text-align:center"><?php echo isset($lis['paid_amount'])?$lis['paid_amount']:'0'?></td>
			<?php }?>
			
			<?php foreach($list['month_wise_amount'] as $lis){?>
			<td style="text-align:center"><?php echo (isset($list['total_amount'])?$list['total_amount']:'')-(isset($lis['paid_amount'])?$lis['paid_amount']:'0')?></td>
			<?php }?>
			<?php }?>
		</tr>
		<?php }?>
		<tr>
		    <th>
							
			</th>
			<th>
				Total Amount=<?php echo isset($total_previous_month['total'])?$total_previous_month['total']:''?>			
			</th>
			
			<th>
				Received Amount=<?php echo isset($paid_previous_month['paid'])?$paid_previous_month['paid']:''?>	
			</th>
			
			<th>
				Pending Amount=<?php echo (isset($total_previous_month['total'])?$total_previous_month['total']:'')-(isset($paid_previous_month['paid'])?$paid_previous_month['paid']:'')?>	
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