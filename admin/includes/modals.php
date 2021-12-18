
<div class="modal fade" id="delete-work">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">Are you sure you want to delete?</h4>
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



<div class="modal fade" id="edit-payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">EDIT - <b><span class="name"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="edit-payment.php" method="POST">
                    <input type="hidden" class="payment-id" name="payment_id">
                    <input type="hidden" class="total-amount" name="total-amount">
                    <input type="hidden" class="balance" name="balance">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="modal-title">Amount to be paid - <b><span class="total-amount"></span></b></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Enter Amount</label>
                                <input type="number" class="form-control" name="amount" value=""  placeholder="Enter here..." required/>
                            </div>
                        </div>
                       
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn-edit-payment"><i class="fa fa-check-square-o"></i> UPDATE</button>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>


<!-- EDIT CASKET -->
<div class="modal fade" id="delete-casket">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">Are you sure you want to delete?</h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="delete-casket.php">
            		<input type="hidden" class="casket-id" name="id">
            		<div class="text-center">
	                	<b><h3 class="casket"></h3></b>
	                	
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="btn-delete-deceased"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-casket">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">Are you sure you want to delete?</h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="delete-deceased.php">
            		<input type="hidden" class="casket-id" name="id">
            		<div class="text-center">
	                	<b><h3 class="casket"></h3></b>
	                	
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="btn-delete-deceased"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-casket">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">EDIT - <b><span class="casket"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="edit-casket.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="casket-id" name="casket_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Casket Type</label>
                                <input type="text" class="form-control" id="casket" name="casket" value=""  placeholder="Enter here..." required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" value=""  placeholder="Enter here..." required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Package Type</label>
                                <select class="form-control" id="package-type" name="package-type"aria-label="Default select example" required>
                                    <option value=""disabled selected>--Select Package Type--</option>
                                    <?php
                                        $select = "SELECT * FROM service";
                                        $query = $conn->query($select);
                                        while($row = $query->fetch_assoc())
                                            {
                                                echo "<option value='".$row['service_id']."'>".$row['service'] ."</option>";
                                            }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Casket Image</label>
                                    <input type="file" class="form-control" id="casketimage" name="file"/>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn-edit-casket"><i class="fa fa-check-square-o"></i> UPDATE</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- EDIT DECEASED MODAL -->
<div class="modal fade" id="edit-deceased">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">EDIT - <b><span class="deceased"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="edit-deceased.php" method="POST">
                    <input type="hidden" class="deceased-id" name="deceased_id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control" id="deceased-fname" name="deceased_firstname" value=""  placeholder="Enter here..." required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Middlename</label>
                                    <input type="text" class="form-control" id="deceased-mname" name="deceased_middlename" value=""  placeholder="Enter here..." required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control" id="deceased-lname" name="deceased_lastname" value=""  placeholder="Enter here..." required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                    <input type="date" class="form-control" id="deceased-dob"name="date_of_birth" value=""  placeholder="Enter here..." />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date Died</label>
                                <input type="date" class="form-control" id="deceased-dd" name="date_died" value=""  placeholder="Enter here..." required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Cause of Death</label>
                                <input type="text" class="form-control" id="deceased-cod" name="cause_of_death" value=""  placeholder="Enter here..." />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Religion</label>
                                <input type="text" class="form-control" id="religion" name="religion" value=""  placeholder="Enter here..." />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Family</label>
                                <select name="family" class="form-control family" required>
                                    <option value="" id="family" disabled selected></option>
                                    <?php
                                        $select_client = "SELECT * FROM client";
                                        $query = $conn->query($select_client);
                                        while($row_client = $query->fetch_assoc())
                                        {
                                            echo "<option value='".$row_client['client_id']."'>".$row_client['client_firstname']. ' ' . $row_client['client_middlename']. ' ' .$row_client['client_lastname']. ' ' ."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn-edit-deceased"><i class="fa fa-check-square-o"></i> UPDATE</button>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-deceased">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">Are you sure you want to delete?</h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="delete-deceased.php">
            		<input type="hidden" class="deceased-id" name="id">
            		<div class="text-center">
	                	<b><h3 class="deceased"></h3></b>
	                	
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="btn-delete-deceased"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



<!-- CLIENT MODALS -->
<div class="modal fade" id="edit-client">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">EDIT - <b><span class="client-name"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="client-edit-query.php" method="POST">
                    <input type="hidden" class="client-id" name="client_id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="client-firstname" name="client_firstname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middlename">Middlename</label>
                                <input type="text" class="form-control" id="client-middlename" name="client_middlename">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="client-lastname" name="client_lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="client_email" id="client-email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <input type="number" name="client_phone" id="client-phone" class="form-control">
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn-edit"><i class="fa fa-check-square-o"></i> UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-client">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">Are you sure you want to delete?</h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="delete-client.php">
            		<input type="hidden" class="client-id" name="id">
            		<div class="text-center">
	                	<b><h3 class="client-name"></h3></b>
	                	
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="btn-delete-client"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- SERVICE MODALS -->

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
            		<input type="hidden" class="service-id" name="service_id">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">EDIT - <b><span class="service"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="edit-service.php" method="POST">
                    <input type="hidden" class="service-id" name="service_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Service">Type of Service</label>
                                <input type="text" class="form-control" id="service" name="service">
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




