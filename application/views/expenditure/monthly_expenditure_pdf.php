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
	
		<tr style="border-bottom:none;padding:0;height:5mm;">
			<td colspan="3" style="border-bottom:none;padding:0;height:5mm">
				<h3 style="text-align:center;"><?php echo isset($month_name['dates'])?$month_name['dates']:''?></h3>
			</td>
		</tr>
	</table>
	
	<?php if(isset($monthly_wise_reports)&& count($monthly_wise_reports)>0){?>
	<table width="100%" >
		
		<tr>		
			<th>Sno</th>
			<th>Date</th>
			<th>Particulars</th>
			<th>District</th>
			<th>Amount</th>
			<th>Received By  </th>
			<th>Payment Type</th>
			<th>Transaction Number</th>
			<th>Cheque Number</th>
            <th>Image </th>

		</tr>
		<?php $cnt=1; foreach($monthly_wise_reports as $list){?>
		<tr>
			<td style="text-align:center"><?php echo $cnt;?></td>
			<td style="text-align:center"><?php echo isset($list['date'])?$list['date']:'' ?></td>
			<td style="text-align:center"><?php echo isset($list['particulars'])?$list['particulars']:'' ?></td>
			<td style="text-align:center"><?php echo isset($list['name'])?$list['name']:'' ?></td>
			<td style="text-align:center"><?php echo isset($list['amount'])?$list['amount']:'' ?></td>
			<td style="text-align:center"><?php echo isset($list['received_by'])?$list['received_by']:'' ?></td>
			<td style="text-align:center"><?php echo isset($list['payment_type'])?$list['payment_type']:'' ?></td>
			<td style="text-align:center"><?php echo isset($list['trans_action_no'])?$list['trans_action_no']:'' ?></td>
			<td style="text-align:center"><?php echo isset($list['cheque_no'])?$list['cheque_no']:'' ?></td>
           <td><img src="<?php echo base_url('assets/expenditure_images/'.$list['image']); ?>" height="100px;" width="auto;"></td>

		</tr>
		
		<?php $cnt++;}?>
		<tr>		
			<th></th>
			<th> </th>
			<th></th>
			<th>Amount=<?php echo isset($month_name['total'])?$month_name['total']:'' ?></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			
		</tr>
	</table>
	<?php }?>
</div>
</div>
</div>