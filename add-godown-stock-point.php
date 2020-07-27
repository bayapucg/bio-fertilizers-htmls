<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div> Stock Issued from Godown Stock Point
 </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add  Stock Issued from Godown Stock Point
</h4>
                        </div>
                        <div class="card-body">
						 <form method="" id="add_category" action="">
                            <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-6">
                                            <label>Name of the GL/TM </label>
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>
										<div class="form-group col-md-6">
                                            <label>Month</label>
                                            <input id="name" type="date" class="form-control" name="name">
                                        </div>
										<div class="form-group col-md-6">
                                            <label>Branch</label>
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>
                               
                            </div>
							
    <div class="row clearfix">
		<div class="col-md-12 column">
		  <div class="table-responsive">
			<table class="table table-bordered table-hover " id="tab_logic" >
				<thead>
					<tr >
					<th class="text-center" colspan="14">Selling Product wise Units</th>
					</tr>
					<tr >
						<th class="text-center">
							S.no
						</th>
						<th class="text-center">
							Issue Date
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
						</th><th class="text-center">
							Terror
						</th>
						
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='name0'   class="form-control"/>
						</td>
						<td>
						<input type="text" name='mail0' class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td><td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						<td>
						<input type="text" name='mobile0'  class="form-control"/>
						</td>
						
						
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>
	<a id="add_row" class="btn btn-primary float-left text-white">Add Row</a><a id='delete_row' class="float-right btn btn-danger text-white">Delete Row</a>
	<div class="clearfix">&nbsp;
	</div>
	
	<div class="row mt-4">
	<div class="col-md-2 col-offset-md-4">
                                        <button type="submit" class="btn btn-primary ">
                                            Add
                                        </button>
										</div>
										</div>
							 </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include("footer.php"); ?>

<script type="text/javascript">
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text'  class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text'   class='form-control input-md'></td>");

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
    $('#add_category').bootstrapValidator({
        
        fields: {
             name: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Question wont allow <> [] = % '
					}
				}
            },
            image: {
                validators: {
					notEmpty: {
						message: 'Image is required'
					},
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            }
            }
        })
     
});

</script>
