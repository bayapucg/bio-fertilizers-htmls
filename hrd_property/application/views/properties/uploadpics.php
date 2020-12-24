
<style>
	table {
		width:3000px !important;
	}
</style>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Property Upload Pics</div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Upload Pics</h4>
                        </div>
                        <div class="card-body">
	<form id="add_group" method="post" action="<?php echo base_url('properties/uploadpicspost');?>" enctype="multipart/form-data">
     <input type="hidden" name="p_id" value="<?php echo isset($p_list['p_id'])?$p_list['p_id']:'' ?>" >
					
        
          <?php if(isset($p_img) && count($p_img)>0){ ?>
							<div class="row">
							<div class="col-md-12">
							<?php $cnt=1;foreach($p_img as $li){ ?>
								<div class="form-group col-md-6" id="img_id<?php echo isset($li['p_i_id'])?$li['p_i_id']:''; ?>">
								<input type="hidden" id="p_i_id" name="p_i_id[]" value="<?php echo isset($li['p_i_id'])?$li['p_i_id']:''; ?>">
									<label class=" control-label">Image <?php echo $cnt; ?></label>
									<a href="javascript:void(0);" onclick="remove_img('<?php echo isset($li['p_i_id'])?$li['p_i_id']:''; ?>')">X</a>
									<div class="">
										<img src="<?php echo base_url('assets/properties_imgs/'.$li['pics']); ?>" style="width:60px;height:50px" alt="<?php echo isset($li['pics'])?$li['pics']:''; ?>" >
									</div>
								</div>
							<?php $cnt++;} ?>
							</div>
							</div>
							<?php } ?>
					
		<div class="row">
		
			<div class="col-md-6 col-md-offset-6">
					<table class="table table-bordered table-hover table-responsive" id="tab_logic" width="100%">
				<thead>
					<tr >
						
						
						
						<th class="text-center">
							Upload Pics
						</th>
						
						
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						
						
						
						<td class="form-group col-md-6">
						<input type="file" name='pics[]'  class="form-control"/>
						</td>
						
						
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
						<a id="add_row" class="btn btn-primary float-left text-white">Add Row</a>
						<a id='delete_row' class="float-right btn btn-danger text-white">Delete Row</a>
					</div>
					
					
					
					
        </div>
		
		
		<br><br><br><br><br>
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
      $('#addr'+i).html("<td><input type='file' name='pics[]' id='name"+i+"'  class='form-control' /></td>");

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
<script>
function remove_img(id){
	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('properties/remove_imgs');?>",
					data: {
						img_id: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#img_id'+id).hide();
					}
				 }
				});
			}
	
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#add_group').bootstrapValidator({
        
        fields: {
            pics: {
                validators: {
					notEmpty: {
						message: 'Upload Pics is required'
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
