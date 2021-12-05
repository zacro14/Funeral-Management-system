<div class="modal fade" id="view-service">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title">Service Package - <b><span class="service"></span></b></h5>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="delete-work.php">
            		<input type="hidden" class="work-id" name="work_id">
            		<div class="text-center">
	                	<b><h3 class="work"></h3></b>
	                	
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="btn-delete-work"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>