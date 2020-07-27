<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>GL payment </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>GL List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center" width="20%">
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
						<th class="text-center">
							Action
						</th>
					</tr>
				</thead>
				<tbody>
					<tr >
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td><td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
				<a href="#" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="Delete"><i class="ion ion-trash-b"></i></a>
				</td>
					</tr>
					<tr >
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td><td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
				<a href="#" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="Delete"><i class="ion ion-trash-b"></i></a>
				</td>
					</tr>
					<tr >
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td><td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
				<a href="#" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="Delete"><i class="ion ion-trash-b"></i></a>
				</td>
					</tr><tr >
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td><td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
				<a href="#" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
				<a class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="Delete"><i class="ion ion-trash-b"></i></a>
				</td>
					</tr>
					<tr >
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td><td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
						xxxxxxxxxxxx
						</td>
						<td>
				<a href="#" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="Edit"><i class="ion ion-edit"></i></a>
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