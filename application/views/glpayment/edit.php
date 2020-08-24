
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>GL payment</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit GL payment</h4>
                        </div>
                        <div class="card-body">
	<form id="add_group" method="post" action="<?php echo base_url('glpayment/editpost');?>" enctype="multipart/form-data">
	    <input type="hidden" name="g_id" id="g_id" value="<?php echo isset($edit_glpayment['g_id'])?$edit_glpayment['g_id']:''?>" >  

                <div class="row">
				
				  <div class="col-md-6">
						<div class="form-group">
							 <label>Name of GL/TM</label>
							 <select onchange="get_se_st_expenses_list(this.value);" id="gm_tm_name" name="gm_tm_name"  class="form-control" >
							<option value="">Select</option>
							<?php foreach ($gl_list as $list){ ?>
								<?php if($list['group_leader']==$edit_glpayment['gm_tm_name']){ ?>
								<option selected value="<?php echo $list['group_leader']; ?>"><?php echo $list['name']; ?></option>
								<?php }else{ ?>
								<option value="<?php echo $list['group_leader']; ?>"><?php echo $list['name']; ?></option>
								 <?php } ?>
				                  <?php }?>
							</select>
							</div>
						</div>
				
				
					<div class="col-md-6">
						<div class="form-group">
							<label>Name of the ST/SE </label>
							  <select id="st_se_name" name="st_se_name"  class="form-control" >
							<option value="">Select</option>
							<?php foreach ($se_st_list as $list){ ?>
								<?php if($list['e_id']==$edit_glpayment['st_se_name']){ ?>
								<option selected value="<?php echo $list['e_id']; ?>"><?php echo $list['name']; ?></option>
								<?php }else{ ?>
								<option value="<?php echo $list['e_id']; ?>"><?php echo $list['name']; ?></option>
								 <?php } ?>
				                  <?php }?>
							
							
							</select>
							</div>
						</div>
						
						
						
						<div class="col-md-6">
						<div class="form-group">
							<label>Camp</label>
                             <input  type="text" class="form-control" name="camp" value="<?php echo isset($edit_glpayment['camp'])?$edit_glpayment['camp']:''?>">
							</div>
						</div>
						
						
						
						<div class="col-md-6">
						<div class="form-group">
							<label>Date</label>
                            <input  type="date" class="form-control" name="date" value="<?php echo isset($edit_glpayment['date'])?$edit_glpayment['date']:''?>">
							</div>
						</div>
						
						<div class="col-md-6">
						<div class="form-group">
							 <label>Branch</label>
                              <input  type="text" class="form-control" name="branch_name" value="<?php echo isset($edit_glpayment['branch_name'])?$edit_glpayment['branch_name']:''?>">
							</div>
						</div>
						
						
						
						
					</div>
						
		<div class="row">
		
			<div class="col-md-12 col-md-offset-12">
					<table class="table table-bordered table-hover table-responsive" id="tab_logic" width="100%">
				<thead>
					<tr >
						<th class="text-center">
							Name of the customer
						</th>
						<th class="text-center">
							Order No
						</th>
						<th class="text-center">
							Booking Date
						</th>
						<th class="text-center">
							Advanced received
						</th>
						<th class="text-center">
							Signature of SR/GL/TM
						</th>
						<th class="text-center">
							Village
						</th>
						<th class="text-center">
							Branch (Mandal/Dist)
						</th>
						<th class="text-center">
							Cell
						</th>
						<th class="text-center">
							Units
						</th>
					</tr>
				</thead>
				<tbody>
					<?php $cnt=1;foreach($edit_glpayment['glpayment_details'] as $lis){ ?>
						<tr id="oldid<?php echo $cnt; ?>">
						<td class="form-group">
						<input type="text" name='customer_name[]'  disabled="disabled"  class="form-control"  value="<?php echo isset($lis['customer_name'])?$lis['customer_name']:''?>"/>
						</td>
						<td class="form-group">
						<input type="text" name='order_no[]'  disabled="disabled" value="<?php echo isset($lis['order_no'])?$lis['order_no']:''?>"  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="date" name='booking_date[]' disabled="disabled" value="<?php echo isset($lis['booking_date'])?$lis['booking_date']:''?>"  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='advance[]' disabled="disabled" value="<?php echo isset($lis['advance'])?$lis['advance']:''?>" class="form-control"/>
						</td>
						<td class="form-group">
						<input type="file" name='signature[]' disabled="disabled" value="<?php echo isset($lis['signature'])?$lis['signature']:''?>"  class="form-control"/>
						</td>
						
						<td class="form-group">
						<input type="text" name='village[]' disabled="disabled" value="<?php echo isset($lis['village'])?$lis['village']:''?>"  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='branch[]' disabled="disabled" value="<?php echo isset($lis['branch'])?$lis['branch']:''?>"  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='cell[]' disabled="disabled" value="<?php echo isset($lis['cell'])?$lis['cell']:''?>"  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='units[]' disabled="disabled" value="<?php echo isset($lis['units'])?$lis['units']:''?>"  class="form-control"/>
						</td>
					<td class="text-center" valign="center"><a href="javascript:void(0);" onclick="remove_img('<?php echo $lis['g_d_id']; ?>','<?php echo $cnt; ?>')">X</a></td>	

					</tr>
                    <?php $cnt++;}?>
					<tr id='addr1'></tr>
				</tbody>
			</table>
						<a id="add_row" class="btn btn-primary float-left text-white">Add Row</a>
						<a id='delete_row' class="float-right btn btn-danger text-white">Delete Row</a>
					</div>
					
					
					
					
        </div>
		
		
		
          <div class="m-t-50 text-center">
			<button type="submit" class="btn  btn-primary" name="signup" value="Sign up">Submit</button>
			</div>
		</form>
		
    	
     </div>
	 
					
					
					
					
					
					
					
					
                </div>
            </div>
        </div>
    </section>
</div>
<script>
function get_se_st_expenses_list(gm_tm_name){
	if(gm_tm_name !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('glpayment/get_se_st_expenses_list');?>",
   			data: {
				gm_tm_name: gm_tm_name,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#st_se_name').empty();
							$('#st_se_name').append("<option value=''>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#st_se_name').append("<option value="+parsedData.list[i].e_id+">"+parsedData.list[i].name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>
<script>
 function remove_img(p_id,id){
	if(p_id!=''){
		 jQuery.ajax({
					url: "<?php echo base_url('glpayment/img_remove');?>",
					data: {
						p_id: p_id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#oldid'+id).remove();
						jQuery('#oldid'+id).hide();
					}
				 }
				});
			}
	
}
</script>
<script>
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><input type='text' name='customer_name[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='order_no[]' id='name"+i+"'  class='form-control' /></td><td><input type='date' name='booking_date[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='advance[]' id='name"+i+"'  class='form-control' /></td><td><input type='file' name='signature[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='village[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='branch[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='cell[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='units[]' id='name"+i+"'  class='form-control' /></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#add_group').bootstrapValidator({
        
        fields: {
             st_se_name: {
                validators: {
					notEmpty: {
						message: 'Name of the ST/SE is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			gm_tm_name: {
                validators: {
					notEmpty: {
						message: 'Name of GM/TM is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
		     camp: {
                validators: {
					notEmpty: {
						message: 'Camp is required'
					}
				}
            },
			date: {
                validators: {
					notEmpty: {
								message: 'Date  is required'
						},
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
			branch: {
                validators: {
					notEmpty: {
						message: 'Branch is required'
					}
				}
            },
			'customer_name[]': {
                validators: {
					notEmpty: {
						message: 'Name of the customer is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			'booking_date[]': {
                validators: {
					notEmpty: {
						message: 'Booking Date  is required'
						},
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
			'order_no[]': {
                validators: {
					notEmpty: {
						message: 'Order No is required'
					}
				}
            },
			'units[]': {
                validators: {
					notEmpty: {
						message: 'Units is required'
					}
				}
            },
			
			'village[]': {
                validators: {
					notEmpty: {
						message: 'Village is required'
					}
				}
            },
			 'cell[]': {
                validators: {
					notEmpty: {
						message: 'Cell is required'
					}
				}
            },
			'advance[]': {
                validators: {
					notEmpty: {
						message: 'Advance is required'
					}
				}
            },
			'branch[]': {
                validators: {
					notEmpty: {
						message: 'Branch is required'
					}
				}
            },
            'signature[]': {
                validators: {
					notEmpty: {
						message: 'Signature of SR/GL/TM is required'
					},
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            },
			
			
			
			
            }
        })
     
});

</script>