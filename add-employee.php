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
            <div>Employee </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Employee</h4>
                        </div>
                        <div class="card-body">
						 <form method="" id="add_category" action="">
                            <div class="row ">
                                
                              
                                   
                                        <div class="form-group col-md-4">
                                            <label>Employee name </label>
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group  col-md-4">
                                            <label>Role </label>
                                           <div>
											<select class="selectpicker form-control"  data-live-search="true">
												<option>Select</option>
												<option>DSM </option>
												<option>DDSM</option>
												<option>BM</option>
												<option>DBM/ABM </option>
												<option>TM/GL  </option>
												<option>ST/SE</option>
											</select>
										   </div>
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Email ID </label>
                                            <input id="image" type="email" class="form-control" name="name">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Age </label>
                                            <input id="image" type="email" class="form-control" name="name">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Mobile Num </label>
                                            <input id="image" type="text" class="form-control" name="name">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Alt Mobile Num </label>
                                            <input id="image" type="text" class="form-control" name="image">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Experience</label>
                                            <input  type="text" class="form-control" name="name">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Locations</label>
                                            <input  type="text" class="form-control" name="name">
                                        </div>
										<div class="form-group  col-md-4">
                                            <label>Date of Birth</label>
                                            <input id="image" type="date" class="form-control" name="image">
                                        </div>	
										
										
									
										<div class="col-md-2 col-offset-md-3">
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
