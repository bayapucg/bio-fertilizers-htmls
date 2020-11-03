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
			
				<div><strong>District</strong><span style="margin-left:1mm"> : <?php echo isset($month_name['name'])?$month_name['name']:''?></span></div>
				<div><strong>Month-Year</strong><span style="margin-left:1mm"> :<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['years'])?$month_name['years']:'' ?></span></div>
			</td>
			<td style="border-left:none;">
		    <div><strong>Town</strong><span style="margin-left:1.4mm">:<?php echo isset($month_name['town_name'])?$month_name['town_name']:''?> </span></div>
			</td>
		</tr>
	</table>
	
	
	<?php if(isset($monthly_wise_reports)&& count($monthly_wise_reports)>0){?>
	<table width="100%" >
		
		<tr>		
			   <th>Hospital name</th>
			   <th>Date</th>
			    <th>Month</th>
                <th>Year</th>
                <th>Sales Person</th>
                <th>Total Amount</th>
                <th>Received Amount</th>
                <th>Discount</th>
                <th>Payment Type</th>
                <th>Transaction Number</th>
                <th>Cheque Number</th>
                
		</tr>
		<?php $cnt=1; foreach($monthly_wise_reports as $list){?>
		<tr>
			<td style="text-align:center">&nbsp;<?php echo isset($list['hospitals_name'])?$list['hospitals_name']:'' ?></td>
			<td style="text-align:center">&nbsp;<?php echo date('d-m-Y',strtotime(htmlentities($list['created_at'])));?></td>
			<td style="text-align:center">&nbsp; 
				
				<?php if($list['months_names']==1){ echo "January";}else if($list['months_names']==2){ echo "February"; }else if($list['months_names']==3){ echo "March";}else if($list['months_names']==4){ echo "April";}else if($list['months_names']==5){ echo "May";}else if($list['months_names']==6){ echo "June";}else if($list['months_names']==7){ echo "July";}else if($list['months_names']==8){ echo "August";}else if($list['months_names']==9){ echo "September";}else if($list['months_names']==10){ echo "October";}else if($list['months_names']==11){ echo "November";}else if($list['months_names']==12){ echo "December";}?>
				
				</td>
			<td style="text-align:center">&nbsp;
			
				<?php echo isset($list['year_name'])?$list['year_name']:''?>
				
			</td>
			<td style="text-align:center">&nbsp;
			<?php echo isset($list['sales_person'])?$list['sales_person']:'' ?>
			</td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['total_amount'])?$list['total_amount']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['paid_amount'])?$list['paid_amount']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['discount'])?$list['discount']:'0' ?></td>
			<td style="text-align:center">&nbsp;
			 <?php if($list['payment_type']==1){ echo "Cash";}else if($list['payment_type']==2){ echo "Online"; }else if($list['payment_type']==3){ echo "Cheque"; } ?>

			</td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['trans_action_no'])?$list['trans_action_no']:'' ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($list['cheque_no'])?$list['cheque_no']:'' ?></td>
			
			
		</tr>
		<?php $cnt++;}?>
		
		
		<tr>		
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th>
			Total Amount=<?php  echo isset($total_amount)?$total_amount:'0'?>
		   </th>
			<th>
			Received Amount=<?php echo isset($paid_amount['paid'])?$paid_amount['paid']:'' ?>
			</th>
			<th>
			Discount Amount=<?php echo isset($discount_amount['discount_amounts'])?$discount_amount['discount_amounts']:'' ?>
			</th>
			<th>
			Pending Amount=<?php echo (isset($total_amount)?$total_amount:'' )-((isset($paid_amount['paid'])?$paid_amount['paid']:'')+(isset($discount_amount['discount_amounts'])?$discount_amount['discount_amounts']:''))?>
			
			</th>
			
		</tr>
		
		
		
		
	</table>
	<?php }?>
	
	
	
	
	
	<br><br>
	<table width="100%" >
		
		<tr>		
			<th>Cash Amount</th>
			<th>Online Amount</th>
			<th>Cheque  Amount</th>
		</tr>
		<tr>
			<td style="text-align:center"><?php echo isset($cash_amount['cash_paid'])?$cash_amount['cash_paid']:'0' ?></td>
			<td style="text-align:center"><?php echo isset($online_amount['online_paid'])?$online_amount['online_paid']:'0' ?></td>
			<td style="text-align:center"><?php echo isset($cheque_amount['cheque_paid'])?$cheque_amount['cheque_paid']:'0' ?></td>
			
			
		</tr>
		
		
		
		
		
		
	</table>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>
</div>
</div>