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
	padding-right:2mm;
}

</style>
<div style="width:210mm;height:297mm;background:#fff;overflow:hidden;">
<div>
<div style="padding:5px 10px">
	<table width="100%" >
		<tr style="border:none;">
			<td  style="max-width:30mm;min-width:30mm;border:none;overflow:hidden"><img style="height:20mm" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Biohazard_symbol.svg/1024px-Biohazard_symbol.svg.png">
			
			</td>
			<td style="border:none;text-align:center;padding:2mm">
				<h3 style="text-align:center;font-size:25px;">ROMA INDUSTIRES</h3>
				<div style="font-size:16px;">(Common Bio-Medical Waste Treatment Facility)</div>
				<div style="font-size:16px;">Authorised by T.S. Pollution Condrol Board</div>
			</td>
			<td rowspan="1" style="max-width:39mm;min-width:39mm;border:none;overflow:hidden">
				<div style="text-align:right">Cell : 9573489997</div>
				<div style="text-align:right"> 9182726701</div>
			</td>
		</tr>
		<tr>

			<td colspan="3" style="text-align:center;border:none">
					<div style="font-size:14px;">Off: 12-225, Adarsh Nagar, Opp:IDPL Colony, Quthbullapur, R.R.Dist-500037</div>
				<div style="font-size:14px;">E-mail: romaindustries9@gmail.com</div>
			</td>
		</tr>
		
	</table>
	<table>
		<tr style="">
			<td style="border:none"><strong>No.</strong> <?php echo isset($h_bill_d['h_m_b_id'])?$h_bill_d['h_m_b_id']:''; ?>-<?php echo $h_bill_d['month']; ?>-<?php echo isset($h_bill_d['created_at'])?date("Y ", strtotime($h_bill_d['created_at'])):''; ?></td>
			<td style="text-align:right;border-left:none"><strong>Date</strong><?php echo isset($h_bill_d['created_at'])?$h_bill_d['created_at']:''; ?></td>
		</tr>
	</table>
	<table>
		<tr style="">
			<td colspan="3"style="border:none"><strong>Hospital Name :</strong> <?php echo isset($h_bill_d['hospital_name'])?$h_bill_d['hospital_name']:''; ?></td>
		</tr>
		<tr style="">
			<td style="border:none"><strong>Address :</strong><?php echo isset($h_bill_d['hospital_address'])?$h_bill_d['hospital_address']:''; ?> </td>
			<td style="border:none"><strong>Town :</strong> <?php echo isset($h_bill_d['town_name'])?$h_bill_d['town_name']:''; ?></td>
			<td style="border:none"><strong>Dist :</strong> <?php echo isset($h_bill_d['d_name'])?$h_bill_d['d_name']:''; ?></td>
		</tr>
		<tr style="">
				<td colspan="3"style="border:none"><strong>Month :</strong>
				<?php if($h_bill_d['month']==1){ echo "January";}else if($h_bill_d['month']==2){ echo "February"; }else if($h_bill_d['month']==3){ echo "March";}else if($h_bill_d['month']==4){ echo "April";}else if($h_bill_d['month']==5){ echo "May";}else if($h_bill_d['month']==6){ echo "June";}else if($h_bill_d['month']==7){ echo "July";}else if($h_bill_d['month']==8){ echo "August";}else if($h_bill_d['month']==9){ echo "September";}else if($h_bill_d['month']==10){ echo "October";}else if($h_bill_d['month']==11){ echo "November";}else if($h_bill_d['month']==12){ echo "December";}?>
				

				</td>
		</tr>
	</table>
	<table >
		<tr style="">
			<th>S.no</th>
			<th style="width:50%">Hospital name</th>
			<th>Previous balance</th>
			<th>BMW charges</th>
			<th>Total <br>Amount</th>
		</tr>
		
		<?php if(isset($payment_list) && count($payment_list)>0){
		$amt_cnt=count($payment_list);
		$p_amt=$total=$h_name='';$cnt=1;foreach($payment_list as $pl){
				$h_name=isset($pl['hospital_name'])?$pl['hospital_name']:'';
				$total +=isset($pl['total_amount'])?$pl['total_amount']:'';
				if(($amt_cnt-1)<=$cnt){
					$p_amt +=isset($pl['total_amount'])?$pl['total_amount']:'';
				}
				$bmw_amt=isset($pl['total_amount'])?$pl['total_amount']:'';
		 $cnt++;} ?>
		<tr style="">
			<td>1</td>
			<td><?php echo isset($h_name)?$h_name:''; ?></td>
			<td><?php echo isset($p_amt)?$p_amt:''; ?></td>
			<td><?php echo isset($bmw_amt)?$bmw_amt:''; ?></td>
			<td><?php echo isset($total)?$total:''; ?></td>
		</tr>
		<?php } ?>
		
		<tr style="">
			<th>&nbsp;</th>
			<th style="width:50%;text-align:right;padding-right:30px;">Grand Total</th>
			<td><?php echo isset($p_amt)?$p_amt:''; ?></td>
			<td><?php echo isset($bmw_amt)?$bmw_amt:''; ?></td>
			<th><?php echo isset($total)?$total:''; ?></th>
		</tr>
		<tr style="">
			<th rowspan="2" colspan="2" style="text-align:left;padding-left:10px;">Rupees(in Words):
			<?php 
				$this->load->library('livemumtowordclsconvert');
				$word_amt=explode('.',$total);
				$www= $this->livemumtowordclsconvert->mycustom_convert_num($word_amt[0]);
				echo str_replace("-"," ",$www).'&nbsp;';
				
				?>
			</th>
			<th rowspan="6">
			
			
			</th>
		</tr>
		
	</table>
	<table>
		<tr style="">
			<td style="text-align:right;padding-right:10px;border:none"><br> <br> For <strong>ROMA INDUSTIRES</strong> </td>
		</tr>
		<tr style="margin-top:20px;">
		
			<td style="text-align:right;padding-right:30px;border:none">
			<br>
		<br>
		<br>
		<br>
		Authorised Signatory <br> <br></td>
		</tr>
		
	</table>
	
</div>



</div>
</div>