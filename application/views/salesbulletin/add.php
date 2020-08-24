
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>sales bulletin</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Stock at Camp / Roomsales bulletin</h4>
                        </div>
                        <div class="card-body">
	<form id="add_group" method="post" action="<?php echo base_url('salesbulletin/addpost');?>" enctype="multipart/form-data">
               
		<div class="row">
		
			<div class="col-md-12 col-md-offset-12">
					<table class="table table-bordered table-hover table-responsive" id="tab_logic" width="100%">
				<thead>
				<tr >
					<th class="text-center" colspan="15">Selling Product wise Units</th>
					</tr>
					   <tr>
						<th class="text-center" >
							Name of GL/TM
						</th>
						<th class="text-center">
							Grovin
						</th>
						<th class="text-center">
							Free
						</th>
						<th class="text-center">
							3G
						</th>
						<th class="text-center">
							Neem
						</th>
						<th class="text-center">
							Neem Oil
						</th>
						<th class="text-center">
							SS
						</th>
						<th class="text-center">
							Mic
						</th>
						<th class="text-center">
							Action
						</th>
						<th class="text-center">
							Corax
						</th>
						<th class="text-center">
							Bkts
						</th>
						<th class="text-center">
							Fatra
						</th>
						<th class="text-center">
							Terror
						</th>
						<th class="text-center">
							Total Units
						</th>
						
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						
						<td class="form-group">
						<select id="name_of_gl" name="name_of_gl[]"  class="form-control" >
						<option value="">Select</option>
						<?php foreach ($group_leaders_list as $list){ ?>
						<option value="<?php echo $list['e_id']; ?>"><?php echo $list['name']; ?></option>
						<?php }?>
						</select>
						</td>
						<td class="form-group">
						<input type="text" name='grovin[]' class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='free[]'  class="form-control"/>
						</td><td class="form-group">
						<input type="text" name='3g[]'  class="form-control"/>
						</td><td class="form-group">
						<input type="text" name='neem[]'  class="form-control"/>
						</td><td class="form-group">
						<input type="text" name='neem_oil[]'  class="form-control"/>
						</td><td class="form-group">
						<input type="text" name='ss[]'  class="form-control"/>
						</td><td class="form-group">
						<input type="text" name='mic[]'  class="form-control"/>
						</td><td class="form-group">
						<input type="text" name='action[]'  class="form-control"/>
						</td>
						
						<td class="form-group">
						<input type="text" name='corax[]'  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='bkts[]'  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='fatra[]'  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='terror[]'  class="form-control"/>
						</td>
						<td class="form-group">
						<input type="text" name='total_units[]'  class="form-control"/>
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
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><select   name='name_of_gl[]' id='name"+i+"'  class='form-control'  ><option value=''>Select </option><?php foreach ($group_leaders_list as $list){ ?><option value='<?php echo $list['e_id']; ?>'><?php echo $list['name']; ?></option><?php }?></select> </td><td><input type='text' name='grovin[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='free[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='3g[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='neem[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='neem_oil[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='ss[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='mic[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='action[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='corax[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='bkts[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='fatra[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='terror[]' id='name"+i+"'  class='form-control' /></td><td><input type='text' name='total_units[]' id='name"+i+"'  class='form-control' /></td>");

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
             'name_of_gl[]': {
                validators: {
					notEmpty: {
						message: 'Name of GL/TM	 is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
			
			'grovin[]': {
                validators: {
					notEmpty: {
						message: 'Grovin  is required'
					}
				}
            },
			'free[]': {
                validators: {
					notEmpty: {
						message: 'Free is required'
					}
				}
            },
			'3g[]': {
                validators: {
					notEmpty: {
						message: '3G is required'
					}
				}
            },
			'neem[]': {
                validators: {
					notEmpty: {
						message: 'Neem is required'
					}
				}
            },
			'neem_oil[]': {
                validators: {
					notEmpty: {
						message: 'Neem Oil is required'
					}
				}
            },
			'ss[]': {
                validators: {
					notEmpty: {
						message: 'SS is required'
					}
				}
            },
			'mic[]': {
                validators: {
					notEmpty: {
						message: 'Mic is required'
					}
				}
            },
			'action[]': {
                validators: {
					notEmpty: {
						message: 'Action is required'
					}
				}
            },
			
			'corax[]': {
                validators: {
					notEmpty: {
						message: 'Corax is required'
					}
				}
            },
			'bkts[]': {
                validators: {
					notEmpty: {
						message: 'Bkts is required'
					}
				}
            },
			'fatra[]': {
                validators: {
					notEmpty: {
						message: 'Fatra is required'
					}
				}
            },
			
			'terror[]': {
                validators: {
					notEmpty: {
						message: 'Terror is required'
					}
				}
            },
			
			
			
			'total_units[]': {
                validators: {
					notEmpty: {
						message: 'Total Units is required'
					}
				}
            },
			
			
			
			
			
			
			
			
			
			
			
            }
        })
     
});

</script>
