<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Employee </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Employee List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Employee name</th>
                <th>Role</th>
                <th>Email ID</th>
                <th>Age</th>
                <th>Mobile Num</th>
                <th>Alt Mobile Num</th>
                <th>Experience</th>
                <th>Locations</th>
                <th>DOB</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bayapureddy</td>
                <td>BMW</td>
                <td>bayapureddy004@gmail.com</td>
                <td>30</td>
                <td>8500226782</td>
                <td>6301555863</td>
                <td>4</td>
                <td>Kukkatpalli, jntu</td>
                <td>01-7-2020</td>
                
					
                <td>
				<a href="edit-employee.php" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="Delete"><i class="ion ion-trash-b"></i></a>
				</td>
            </tr>
           
        </tbody>
        
    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include("footer.php"); ?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>