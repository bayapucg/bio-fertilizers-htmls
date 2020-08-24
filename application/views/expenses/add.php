
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>SE / ST’s EXPENSES STATEMENT</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add  SE / ST’s EXPENSES STATEMENT</h4>
                        </div>
                        <div class="card-body">
	<form id="add_group" method="post" action="<?php echo base_url('expenses/addpost');?>" enctype="multipart/form-data">
                <div class="row">
				
				<div class="col-md-6">
						<div class="form-group">
							<label>Name of ABM/TM</label>
							
							
							<select onchange="get_se_st_expenses_list(this.value);" id="abm_tm_name" name="abm_tm_name"  class="form-control" >
							<option value="">Select</option>
							<?php foreach ($abm_list as $list){ ?>
							<option value="<?php echo $list['manager_id']; ?>"><?php echo $list['name']; ?></option>
							<?php }?>
							</select>
							
							</div>
						</div>
				
				
				
				
				
				
				
						<div class="col-md-6">
						<div class="form-group">
							<label>Name of the ST/SE </label>							
							<select id="st_se_name" name="st_se_name"  class="form-control" >
							<option value="">Select</option>
							</select>
							</div>
						</div>
						
						
						
						
						
						<div class="col-md-6">
						<div class="form-group">
							<label>Month</label>
							<input type="date" class="form-control"   name="month" >
							</div>
						</div>
						
						
						<div class="col-md-6">
						<div class="form-group">
							<label>Branch</label>
							<input type="text" class="form-control"   name="branch" >
							</div>
						</div>
						
						
					</div>
						
		<div class="row">
		
			<div class="col-md-12 col-md-offset-12">
					<table class="table table-bordered table-hover table-responsive" id="tab_logic" width="100%">
				<thead>
					<tr >
						
						<th class="text-center" >
							Date
						</th>
						<th class="text-center">
							Amount Received
						</th>
						<th class="text-center">
							Cumulative Amount
						</th>
						
						
						<th class="text-center">
							Sign of received person
						</th>
						
						
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						
						<td class="form-group">
						<input type="date" name='date[]'   class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='received_amount[]' class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='cumulative_amount[]'  class="form-control"/>
						</td>
						
						<td class="form-group">
						<input type="file" name='sign[]'  class="form-control"/>
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
function get_se_st_expenses_list(abm_tm_name){
	if(abm_tm_name !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('expenses/get_se_st_expenses_list');?>",
   			data: {
				abm_tm_name: abm_tm_name,
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
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><input type='date' name='date[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='received_amount[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='cumulative_amount[]' id='name"+i+"'  class='form-control' /></td><td><input type='file' name='sign[]' id='name"+i+"'  class='form-control' /></td>");

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
						message: 'Name of the ST/SE  is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			abm_tm_name: {
                validators: {
					notEmpty: {
						message: 'Name of ABM/TM is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			month: {
                validators: {
					notEmpty: {
								message: 'Month  is required'
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
			
			'received_amount[]': {
                validators: {
					notEmpty: {
						message: 'Amount Received is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Amount Received must be digits'
   					}
				}
            },
			 'cumulative_amount[]': {
                validators: {
					notEmpty: {
						message: 'Cumulative Amount  is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Cumulative Amount  must be digits'
   					}
				}
            },
            'sign[]': {
                validators: {
					notEmpty: {
						message: 'Sign of received person is required'
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
