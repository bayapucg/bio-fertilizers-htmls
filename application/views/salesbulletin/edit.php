
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
                            <h4>Edit Stock at Camp / Roomsales bulletin</h4>
                        </div>
                        <div class="card-body">
	<form id="add_group" method="post" action="<?php echo base_url('salesbulletin/editpost');?>" enctype="multipart/form-data">
      <input type="hidden" name="s_id" id="s_id" value="<?php echo isset($sales_bulletin_details['s_id'])?$sales_bulletin_details['s_id']:'' ?>" >   
		<div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-4">
                                            <label>Name of GL/TM</label>
       <select id="name_of_gl" name="name_of_gl"  class="form-control" >
						<option value="">Select</option>
						<?php foreach ($group_leaders_list as $list){ ?>
						<?php if($list['e_id']==$sales_bulletin_details['name_of_gl']){ ?>
						<option selected value="<?php echo $list['e_id']; ?>"><?php echo $list['name']; ?></option>
						<?php }else{ ?>
						<option value="<?php echo $list['e_id']; ?>"><?php echo $list['name']; ?></option>
						<?php } ?>
						<?php }?>
						</select>                                        </div>
                                      
										<div class="form-group  col-md-4">
                                            <label>Grovin </label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['grovin'])?$sales_bulletin_details['grovin']:'' ?>" name='grovin' class="form-control"/>
                                        </div>
										
										<div class="form-group  col-md-4">
                                            <label>Free </label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['free'])?$sales_bulletin_details['free']:'' ?>" name='free'  class="form-control"/>
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>3G</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['3g'])?$sales_bulletin_details['3g']:'' ?>" name='3g'  class="form-control"/>
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Neem</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['neem'])?$sales_bulletin_details['neem']:'' ?>" name='neem'  class="form-control"/>
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Neem Oil</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['neem_oil'])?$sales_bulletin_details['neem_oil']:'' ?>" name='neem_oil'  class="form-control"/>
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>SS</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['ss'])?$sales_bulletin_details['ss']:'' ?>" name='ss'  class="form-control"/>
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Mic</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['mic'])?$sales_bulletin_details['mic']:'' ?>" name='mic'  class="form-control"/>
                                        </div>	
										
										<div class="form-group  col-md-4">
                                            <label>Action</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['action'])?$sales_bulletin_details['action']:'' ?>" name='action'  class="form-control"/>
                                        </div>	
									    
										<div class="form-group  col-md-4">
                                            <label>Corax</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['corax'])?$sales_bulletin_details['corax']:'' ?>" name='corax'  class="form-control"/>
                                        </div>	
										
										<div class="form-group  col-md-4">
                                            <label>Bkts</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['bkts'])?$sales_bulletin_details['bkts']:'' ?>" name='bkts'  class="form-control"/>
                                        </div>	
										
										
										<div class="form-group  col-md-4">
                                            <label>Fatra</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['fatra'])?$sales_bulletin_details['fatra']:'' ?>" name='fatra'  class="form-control"/>
                                        </div>	
										
										<div class="form-group  col-md-4">
                                            <label>Terror</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['terror'])?$sales_bulletin_details['terror']:'' ?>" name='terror'  class="form-control"/>
                                        </div>
										
										<div class="form-group  col-md-4">
                                            <label>Total Units</label>
						<input type="text" value="<?php echo isset($sales_bulletin_details['total_units'])?$sales_bulletin_details['total_units']:'' ?>"  name='total_units'  class="form-control"/>
                                        </div>
										
										
										   </div>
										    <br>
										
                                   
		
		
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
             name_of_gl: {
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
			
			grovin: {
                validators: {
					notEmpty: {
						message: 'Grovin  is required'
					}
				}
            },
			free: {
                validators: {
					notEmpty: {
						message: 'Free is required'
					}
				}
            },
			'3g': {
                validators: {
					notEmpty: {
						message: '3G is required'
					}
				}
            },
			neem: {
                validators: {
					notEmpty: {
						message: 'Neem is required'
					}
				}
            },
			neem_oil: {
                validators: {
					notEmpty: {
						message: 'Neem Oil is required'
					}
				}
            },
			ss: {
                validators: {
					notEmpty: {
						message: 'SS is required'
					}
				}
            },
			mic: {
                validators: {
					notEmpty: {
						message: 'Mic is required'
					}
				}
            },
			action: {
                validators: {
					notEmpty: {
						message: 'Action is required'
					}
				}
            },
			
			corax: {
                validators: {
					notEmpty: {
						message: 'Corax is required'
					}
				}
            },
			bkts: {
                validators: {
					notEmpty: {
						message: 'Bkts is required'
					}
				}
            },
			fatra: {
                validators: {
					notEmpty: {
						message: 'Fatra is required'
					}
				}
            },
			
			terror: {
                validators: {
					notEmpty: {
						message: 'Terror is required'
					}
				}
            },
			
			
			
			total_units: {
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
