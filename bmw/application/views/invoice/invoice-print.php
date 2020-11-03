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
			<td rowspan="5" style="max-width:30mm;min-width:30mm;border:none;overflow:hidden"><img style="height:18mm" src="https://medarogya.com/assets/front/img/logo.png">
			<div style="font-size:10px;text-align:center">Regd No. 78/2020</div>
			</td>
			<td style="border:none;text-align:center;padding: 5mm">
				<h3 style="text-align:center;font-size:20px;">Medical Waste Treatment Facility-(2019-20)</h3>
				<div style="font-size:18px;">Survey no 277-1a , Dumpetla village ,<br> Battala pali Mandala Ananthapur  515661 A.P</div>
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
				<h3 style="text-align:center">BMW Invoice </h3>
			</td>
			<td style="border-left:none;border-top:none">
				&nbsp;
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>Hospital Name</strong><span style="margin-left:1mm"> : <?php echo isset($hospital_details['hospital_name'])?$hospital_details['hospital_name']:''?></span></div>
				<div><strong>Address </strong><span style="margin-left:14mm"> : <?php echo isset($hospital_details['hospital_address'])?$hospital_details['hospital_address']:''?></span></div>
			</td>
			<td style="border-left:none;">
			<!--<div><strong>Invoice No </strong><span style="margin-left:1.4mm">: 2849</span></div>-->
			<div><strong>Date </strong> <span style="margin-left:13mm">: <?php echo date('d-m-Y',strtotime(htmlentities($hospital_details['created_at'])));?></span></div>
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>BMW charges per month</strong><span style="margin-left:1mm"> :<?php echo isset($hospital_details['cost_per_month'])?$hospital_details['cost_per_month']:''?></span></div>
				
			</td>
			<td style="border-left:none;">
			<div><strong>Billed Amount</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> <?php echo isset($hospital_details['total_amount'])?$hospital_details['total_amount']:''?></span></span></div>
			
			</td>
		</tr>
	</table>
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			<td style="border-right:none;">
			
				<div><strong>No of Beds</strong><span style="margin-left:1mm"> <span style="border:1px solid #ddd;padding:4px"><?php echo isset($hospital_details['no_beds'])?$hospital_details['no_beds']:''?></span></span></div>
				
			</td>
			<!--<td style="border-left:none;border-right:none">
			<div><strong>No of Labs</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> 2849</span></span></div>
			
			</td>
			<td style="border-left:none;">
			<div><strong>No of Blood banks</strong><span style="margin-left:1.4mm">:<span style="border:1px solid #ddd;padding:4px"> 2</span></span></div>
			
			</td>-->
		</tr>
	</table>
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			<!--<td >
				<div><strong>In Words</strong><span style="margin-left:1mm">livemumtowordclsconvert  One lakh Eight Thousand five hundred rupees only</span></div>
			</td>-->
		</tr>
		<tr>
			<td>
				<div><strong>Narrition</strong><span style="margin-left:1mm">BMW Charges for <?php echo isset($hospital_details['no_beds'])?$hospital_details['no_beds']:''?> Beds@<?php echo isset($hospital_details['cost_per_month'])?$hospital_details['cost_per_month']:''?> per month</span></div>
			</td>
		</tr>
		<!--<tr>
			<td >
				<div><strong>Info</strong><span style="margin-left:1mm">Account summery from 1-aug-2019 to 31-Aug-2019</span></div>
			</td>
		</tr>-->
	</table>
	<table width="100%" style="border:none;padding:10px;">
		<tr>
			
			<th>
				Total Amount		
			</th>
			<th>
				Paid Amount		
			</th>
			<th>
				Payment Type		
			</th>
			<th>
				Date		
			</th>
			<th>
				Sales Person		
			</th>
			
		</tr>
		<?php if(isset($payments_details)&& count($payments_details)>0){?>
		<?php foreach($payments_details as $list){?>
		<tr>
		
			<td style="text-align:center"><?php echo isset($list['total_amount'])?$list['total_amount']:''?></td>
			<td style="text-align:center"><?php echo isset($list['paid_amount'])?$list['paid_amount']:''?></td>
			<td style="text-align:center"><?php if($list['payment_type']==1){ echo "Cash";}else if($list['payment_type']==2){ echo "Online"; }else if($list['payment_type']==3){ echo "Cheque"; }?></td>
			<td style="text-align:center"><?php echo date('d-m-Y',strtotime(htmlentities($list['created_at'])));?></td>
			<td style="text-align:center"><?php echo isset($list['name'])?$list['name']:''?></td>
		</tr>
		<?php }?>
		<?php }?>
		               <?php if(isset($mothlybill_list)&& count($mothlybill_list)>0){?>
		<?php foreach($mothlybill_list as $list){?>
		                  <tr>							
								<th>Total Amount =<?php echo isset($hospital_details['total_amount'])?$hospital_details['total_amount']:''?></th>
								<th>Paid Amount =<?php echo isset($list['paid'])?$list['paid']:''?></th>
								<th>Pending Amount =<?php echo (isset($hospital_details['total_amount'])?$hospital_details['total_amount']:'')-(isset($list['paid'])?$list['paid']:'')?></th>
								
							  </tr>	
							  <?php }?>
		<?php }?>
	</table>
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