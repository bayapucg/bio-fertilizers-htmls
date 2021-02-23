<style>
*{
	padding:0;
	margin:0;
	letter-spacing:0.4px;
}
table, td, th {
  border: 1px solid #ddd;
  height:8mm;
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
<div style="width:210mm;height:297mm;background:#fff;overflow:hidden;">
<div>
<div style="padding:5px 10px">
	<table width="100%" >
		<tr style="border:none;">
			<td rowspan="5" style="max-width:30mm;min-width:30mm;border:none;overflow:hidden"><img style="height:20mm" src="http://srivenenvirontechnologies.in/assets/img/logo-n.png">
			<div style="font-size:10px;text-align:center">Regd No. 78/2020</div>
			</td>
			<td style="border:none;text-align:center;padding: 2mm">
				<h3 style="text-align:center;font-size:15px;">SRIVEN ENVIRON TECHNOLOGIES</h3>
				<div style="font-size:16px;">6/1/691 Kovur nagar, Anantapur,515002.</div>
				<div>Email: tashok106@gmail.com</div>
			</td>
			<td rowspan="1" style="max-width:39mm;min-width:39mm;border:none;overflow:hidden">
				<div>Cell : 9573489997</div>
				<div>Cell : 9182726701</div>
				<div>PAN  : ACNFS7889L</div>
			</td>
		</tr>
		<tr>
			<td>
				<h3 style="text-align:center">BMW Invoice </h3>
				<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['year'])?$month_name['year']:''?>
			</td>
			<td style="border-left:none;border-top:none">
				For Hospital
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>Hospital Name</strong><span style="margin-left:1mm"> : <?php echo isset($month_name['hospital_name'])?$month_name['hospital_name']:''?></span></div>
				<div><strong>Hospital Type</strong><span style="margin-left:1mm"> : <?php echo isset($month_name['hospital_types'])?$month_name['hospital_types']:''?></span></div>
				<div><strong>Address </strong><span style="margin-left:14mm"> : <?php echo isset($month_name['hospital_address'])?$month_name['hospital_address']:''?></span></div>
			</td>
			<td style="border-left:none;">
		    <div><strong>Invoice No </strong><span style="margin-left:1.4mm">: <?php echo isset($month_name['year'])?$month_name['year']:''?>/<?php echo isset($month_name['month'])?$month_name['month']:''?>/<?php echo isset($cnts)?$cnts:''?></span></div>
			<div><strong>Date </strong> <span style="margin-left:13mm">:<?php echo isset($days)?$days:''?>-<?php echo isset($month_name['month'])?$month_name['month']:''?>-<?php echo isset($month_name['year'])?$month_name['year']:''?></span></div>
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
		<td style="border-right:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
             <?php }else{?>
			<?php }?>
			</td>
			<td style="border-right:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
				<div><strong>BMW charges per month</strong><span style="margin-left:1mm"> :
				<?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?>
				</span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1mm"> :
			<?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?>
			</span></div>
			<?php }else{?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1mm"> :
			<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?>
			</span></div>
			<?php }?>
			</td>
			<td style="border-left:none;">
			<div><strong>Billed Amount</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?></span></span></div>
			
			</td>
		</tr>
	</table>
	<!--<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<td style="border-right:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
             <?php }else{?>
			<?php }?>
			</td>
			
			<td style="border-left:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?></span></span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?></span></span></div>
			 <?php }else{?>
			 <div><strong>BMW charges per month</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?></span></span></div>
			<?php }?>
			</td>
		</tr>
	</table>-->
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<td >
				<div><strong>In Words:</strong><span style="margin-left:1mm">&nbsp;&nbsp;<?php   echo $this->livemumtowordclsconvert->mycustom_convert_num(isset($month_name['total_amount'])?$month_name['total_amount']:'')?>&nbsp;Rupees Only</span></div>
			</td>
		</tr>
		<tr>
			<td>
				<div><strong>Remarks:</strong></div>
			</td>
		</tr>
		<tr>
			<td >
				<div><strong>Info:</strong><span style="margin-left:1mm">Account summery for &nbsp;<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['year'])?$month_name['year']:''?></span></div>
			</td>
		</tr>
	</table>
	<?php if(isset($month_name)&& count($month_name)>0){?>
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<th>
				Hospital Name
			</th>
			<th>
				Prev Balance
			</th>
			<th>
				BMW charges			
			</th>
			<!--<th>Received Amount</th>
			<th>Discount  Amount</th>
			<th>pending Amount</th>-->
			<th>
				Total Amount		
			</th>
		</tr>
		<tr>
			<td style="text-align:center">&nbsp;<?php echo isset($month_name['hospital_name'])?$month_name['hospital_name']:'' ?></td>
			<td style="text-align:center">&nbsp;<?php echo (isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0') ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:'0' ?></td>
			<!--<td style="text-align:center">&nbsp;<?php echo isset($bill_paid_amount['recived_amount'])?$bill_paid_amount['recived_amount']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($bill_paid_amount['discount_amount'])?$bill_paid_amount['discount_amount']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo ((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0')) ?></td>-->
			<td style="text-align:center">&nbsp;<?php echo ((isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0'))+(((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0'))) ?></td>
		</tr>
		
		
	</table>
	<?php }?>
	<table width="100%" style="padding:5px 10px;">
		
		<tr style="background:#eee">
			<td colspan="3">Bank Details: AC:0659201002049 IFSC Code: CNRB0000659 | CFMS A/c no: 1000268011 | Anantapur Main Branch</td>
		</tr>	
		<tr>		
			<td style="text-align:left;border-right:none;padding-top:6mm;padding-bottom:5mm">Customer Signature</td>
			<td style="text-align:center;border-right:none;border-left:none;padding-top:6mm;padding-bottom:5mm">Subject to jurisdiction Only</td>
			<td style="text-align:right;border-right:none; border-left:none;padding-top:6mm;padding-bottom:5mm;padding-right:5mm">Authorised	 Signature</td>
		</tr>
		
	</table>
</div>


<div style="padding:5px 10px">
	<table width="100%" >
		<tr style="border:none;">
			<td rowspan="5" style="max-width:30mm;min-width:30mm;border:none;overflow:hidden"><img style="height:20mm" src="http://srivenenvirontechnologies.in/assets/img/logo-n.png">
			<div style="font-size:10px;text-align:center">Regd No. 78/2020</div>
			</td>
			<td style="border:none;text-align:center;padding: 2mm">
				<h3 style="text-align:center;font-size:15px;">SRIVEN ENVIRON TECHNOLOGIES</h3>
				<div style="font-size:16px;">6/1/691 Kovur nagar, Anantapur,515002.</div>
				<div>Email: tashok106@gmail.com</div>
			</td>
			<td rowspan="1" style="max-width:39mm;min-width:39mm;border:none;overflow:hidden">
				<div>Cell : 9573489997</div>
				<div>Cell : 9182726701</div>
				<div>PAN  : ACNFS7889L</div>
			</td>
		</tr>
		<tr>
			<td>
				<h3 style="text-align:center">BMW Invoice </h3>
				<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['year'])?$month_name['year']:''?>
			</td>
			<td style="border-left:none;border-top:none">
				For Office
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>Hospital Name</strong><span style="margin-left:1mm"> : <?php echo isset($month_name['hospital_name'])?$month_name['hospital_name']:''?></span></div>
				<div><strong>Address </strong><span style="margin-left:14mm"> : <?php echo isset($month_name['hospital_address'])?$month_name['hospital_address']:''?></span></div>
			</td>
			<td style="border-left:none;">
		    <div><strong>Invoice No </strong><span style="margin-left:1.4mm">: <?php echo isset($month_name['year'])?$month_name['year']:''?>/<?php echo isset($month_name['month'])?$month_name['month']:''?>/<?php echo isset($cnts)?$cnts:''?></span></div>
			<div><strong>Date </strong> <span style="margin-left:13mm">:<?php echo isset($days)?$days:''?>-<?php echo isset($month_name['month'])?$month_name['month']:''?>-<?php echo isset($month_name['year'])?$month_name['year']:''?></span></div>
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
		<td style="border-right:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
             <?php }else{?>
			<?php }?>
			</td>
			<td style="border-right:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
				<div><strong>BMW charges per month</strong><span style="margin-left:1mm"> :
				<?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?>
				</span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1mm"> :
			<?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?>
			</span></div>
			<?php }else{?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1mm"> :
			<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?>
			</span></div>
			<?php }?>
			</td>
			<td style="border-left:none;">
			<div><strong>Billed Amount</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?></span></span></div>
			
			</td>
		</tr>
	</table>
	<!--<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<td style="border-right:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
				<div><strong>No of Beds:</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($month_name['no_beds'])?$month_name['no_beds']:''?></span></span></div>
             <?php }else{?>
			<?php }?>
			</td>
			
			<td style="border-left:none;">
			<?php if($month_name['hospital_types']=='Bedded hospital'){?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?></span></span></div>
			<?php }else if($month_name['hospital_types']=='Nursing home'){?>
			<div><strong>BMW charges per month</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['cost_per_month'])?$month_name['cost_per_month']:''?></span></span></div>
			 <?php }else{?>
			 <div><strong>BMW charges per month</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($month_name['total_amount'])?$month_name['total_amount']:''?></span></span></div>
			<?php }?>
			</td>
		</tr>
	</table>-->
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<td >
				<div><strong>In Words:</strong><span style="margin-left:1mm">&nbsp;&nbsp;<?php   echo $this->livemumtowordclsconvert->mycustom_convert_num(isset($month_name['total_amount'])?$month_name['total_amount']:'')?>&nbsp;Rupees Only</span></div>
			</td>
		</tr>
		<tr>
			<td>
				<div><strong>Remarks:</strong></div>
			</td>
		</tr>
		<tr>
			<td >
				<div><strong>Info:</strong><span style="margin-left:1mm">Account summery for &nbsp;<?php if($month_name['month']==1){ echo "January";}else if($month_name['month']==2){ echo "February"; }else if($month_name['month']==3){ echo "March";}else if($month_name['month']==4){ echo "April";}else if($month_name['month']==5){ echo "May";}else if($month_name['month']==6){ echo "June";}else if($month_name['month']==7){ echo "July";}else if($month_name['month']==8){ echo "August";}else if($month_name['month']==9){ echo "September";}else if($month_name['month']==10){ echo "October";}else if($month_name['month']==11){ echo "November";}else if($month_name['month']==12){ echo "December";}?>-<?php echo isset($month_name['year'])?$month_name['year']:''?></span></div>
			</td>
		</tr>
	</table>
	<?php if(isset($month_name)&& count($month_name)>0){?>
	<table width="100%" style="border:none;padding:5px 10px;">
		<tr>
			<th>
				Hospital Name
			</th>
			<th>
				Prev Balance
			</th>
			<th>
				BMW charges			
			</th>
			<!--<th>Received Amount</th>
			<th>Discount  Amount</th>
			<th>pending Amount</th>-->
			<th>
				Total Amount		
			</th>
		</tr>
		<tr>
			<td style="text-align:center">&nbsp;<?php echo isset($month_name['hospital_name'])?$month_name['hospital_name']:'' ?></td>
			<td style="text-align:center">&nbsp;<?php echo (isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0') ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($month_name['total_amount'])?$month_name['total_amount']:'0' ?></td>
			<!--<<td style="text-align:center">&nbsp;<?php echo isset($bill_paid_amount['recived_amount'])?$bill_paid_amount['recived_amount']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo isset($bill_paid_amount['discount_amount'])?$bill_paid_amount['discount_amount']:'0' ?></td>
			<td style="text-align:center">&nbsp;<?php echo ((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0')) ?></td>-->
			<td style="text-align:center">&nbsp;<?php echo ((isset($previous_total_month_bill['total'])?$previous_total_month_bill['total']:'0')-(isset($previous_paid_month_bill['paid'])?$previous_paid_month_bill['paid']:'0'))+(((isset($month_name['total_amount'])?$month_name['total_amount']:'0')-(isset($bill_paid_amount['paid'])?$bill_paid_amount['paid']:'0'))) ?></td>
		</tr>
		
		
	</table>
	<?php }?>
	<table width="100%" style="padding:5px 10px;">
		<tr style="background:#eee">
			<td colspan="3">Bank Details: AC:  0659201002049 IFSC Code: CNRB0000659 | CFMS A/c no: 1000268011 | Anantapur Main Branch</td>
		</tr>
		<tr>		
			<td style="text-align:left;border-right:none;padding-top:6mm;padding-bottom:5mm">Customer Signature</td>
			<td style="text-align:center;border-right:none;border-left:none;padding-top:6mm;padding-bottom:5mm">Subject to jurisdiction Only</td>
			<td style="text-align:right;border-right:none; border-left:none;padding-top:6mm;padding-bottom:5mm;padding-right:5mm">Authorised Signature</td>
		</tr>
		
	</table>
</div>
</div>
</div>