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
            <div>Order cum invoice  </div>
        </h1>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order cum invoice  List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
							   <thead>
					<tr >
						<th class="text-center">
							S.no
						</th>
						<th class="text-center">
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
						<th class="text-center">
							Action
						
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