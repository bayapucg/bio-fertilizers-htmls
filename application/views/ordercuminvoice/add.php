
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Order cum invoice  </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Order cum invoice</h4>
                        </div>
                        <div class="card-body">
	<form id="add_group" method="post" action="<?php echo base_url('ordercuminvoice/addpost');?>" enctype="multipart/form-data">
                <div class="row">
				
				<div class="col-md-6">
						<div class="form-group">
							<label>Name of TM/ABM</label>
							<select onchange="get_group_leader_list(this.value);"  id="name_of_abm" name="name_of_abm"  class="form-control" >
							<option value="">Select</option>
							<?php foreach ($abm_list as $list){ ?>
							<option value="<?php echo $list['manager_id']; ?>"><?php echo $list['name']; ?></option>
							<?php }?>
							</select>
							</div>
						</div>
				
				
						<div class="col-md-6">
						<div class="form-group">
							<label>Name of the GL/TM </label>
							<select id="name_of_gl" name="name_of_gl"  class="form-control" >
							<option value="">Select</option>
							</select>
							</div>
						</div>
						
						
						
						
					</div>
						
		<div class="row">
		
			<div class="col-md-12 col-md-offset-12">
					<table class="table table-bordered table-hover table-responsive" id="tab_logic" width="100%">
				<thead>
					<tr >
						<th class="text-center">
							Signature of GL/TM & ABM
						</th>
						<th class="text-center" >
							Date
						</th>
						<th class="text-center">
							Order No
						</th>
						<th class="text-center" width="20%">
							Name of the sales Executive
						</th>
						
						
						<th class="text-center">
							Issue invoice Doc. or Cancel
						</th>
						
						<th class="text-center">
							Units
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						<td class="form-group">
						<input type="file" name='signature_gl_abm[]'  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="date" name='date[]'   class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='order_no[]' class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='name_of_sales_executive[]'  class="form-control"/>
						</td>
						
						<td class="form-group">
						<input type="text" name='invoice_doc[]'  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='units[]'  class="form-control"/>
						</td>
						
					</tr>
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
function get_group_leader_list(name_of_abm){
	if(name_of_abm !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('ordercuminvoice/get_group_leader_list');?>",
   			data: {
				name_of_abm: name_of_abm,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#name_of_gl').empty();
							$('#name_of_gl').append("<option value=''>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#name_of_gl').append("<option value="+parsedData.list[i].e_id+">"+parsedData.list[i].name+"</option>");                      
                    
								
							 
							}
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
      $('#addr'+i).html("<td><input type='file' name='signature_gl_abm[]' id='name"+i+"'  class='form-control' placeholder='Enter Type'/></td><td><input type='date' name='date[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='order_no[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='name_of_sales_executive[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='invoice_doc[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='units[]' id='name"+i+"'  class='form-control' /></td>");

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
             name_of_gl: {
                validators: {
					notEmpty: {
						message: 'Name of the GL/TM is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			name_of_abm: {
                validators: {
					notEmpty: {
						message: 'Name of TM/ABM is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			'date[]': {
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
			'name_of_sales_executive[]': {
                validators: {
					notEmpty: {
						message: 'Name of the sales Executive is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			'invoice_doc[]': {
                validators: {
					notEmpty: {
						message: 'Issue invoice Doc. or Cancel is required'
					}
				}
            },
			 
            'signature_gl_abm[]': {
                validators: {
					notEmpty: {
						message: 'Signature of GL/TM & ABM is required'
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
