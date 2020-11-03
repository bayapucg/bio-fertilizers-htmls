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
			<td style="max-width:30mm;min-width:30mm;border:none;overflow:hidden"><img style="height:18mm" src="https://medarogya.com/assets/front/img/logo.png">
			<div style="font-size:10px;text-align:center">Regd No. 78/2020</div>
			</td>
			<td style="border:none;text-align:center;padding: 5mm">
				<h3 style="text-align:center;font-size:30px;color:#307d54">M/S Sriven  
				Environ Technologies</h3>
				<div style="font-size:18px;">Survey no 277-1a , Dumpetla village ,<br> Battala pali Mandala Ananthapur  515661 A.P</div>
				<div>Cell : 9573489997 | Email: tashok106@gmail.com</div>
			</td>
		
		</tr>
	
		<tr style="border-bottom:none;padding:0;height:5mm;">
			<td colspan="3" style="border-bottom:none;padding:0;height:5mm">
				<h3 style="text-align:center;"><?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['year'])?$month_name['year']:'' ?></h3>
			</td>
		</tr>
	</table>
	
	<?php if(isset($month_name)&& count($month_name)>0){?>
	<table width="100%" >
		
		<tr>		
			<th>Hospital Name</th>
			<th>Prev Month Balance</th>
			<th>Total Amount</th>
			<th>Paid Amount</th>
			<th>pending Amount</th>
			<th>Amount</th>
		</tr>
		<tr>
			<td style="text-align:center">&nbsp;<?php echo isset($month_name['hospital_name'])?$month_name['hospital_name']:'' ?></td>
			<td style="text-align:center">&nbsp;<?php echo (isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0') ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo ((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0')) ?></td>
			<td style="text-align:center">&nbsp;<?php echo ((isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0'))+(((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0'))) ?></td>
		</tr>
		
		
	</table>
	<?php }?>
</div>
</div>
</div>