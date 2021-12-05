<div class="modal fade" id="delete-service">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">Are you sure you want to delete?</h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="delete-service.php">
            		<input type="text" class="service-id" name="service_id">
            		<div class="text-center">
	                	<b><h3 class="service"></h3></b>
	                	
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="btn-delete-service"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-service">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">EDIT - <b><span class="service"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="edit-service.php" method="POST">
                    <input type="hidden" class="service-id" name="service_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Service">Type of Service</label>
                                <input type="text" class="form-control" id="service" name="service">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Service Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount">
                            </div>
                        </div>
                    <br><br><br><br><br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn-edit-service"><i class="fa fa-check-square-o"></i> UPDATE</button>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>

