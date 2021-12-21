<!-- CLIENT MODALS -->
<div class="modal fade" id="edit-employee">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">EDIT - <b><span class="employee-name"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="employee-edit-query.php" method="POST">
                    <input type="hidden" class="client-id" id="employee-id" name="employee_id">
                    <input type="hidden" class="branch-id" id="branch" name="branch">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control text-capitalize" id="employee-firstname" name="employee_firstname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middlename">Middlename</label>
                                <input type="text" class="form-control text-capitalize" id="employee-middlename" name="employee_middlename">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control text-capitalize" id="employee-lastname" name="employee_lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="phone">Phone</label>
                            <input type="number" name="employee_phone" id="employee-phone" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="phone">Work Type</label>
                            <select class="form-control" id="worktype" name="work-type" required>
                                                <option value="" disabled selected>-Select Work Type-</option>
                                                <?php
                                                    $type = "SELECT * FROM work_type";
                                                    $query = $conn->query($type);
                                                    while($row = $query->fetch_assoc())
                                                    {
                                                        echo "<option value='".$row['work_type_id']."'>".$row['description']."</option>";
                                                    }
                                                ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn-edit-employee"><i class="fa fa-check-square-o"></i> UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-employee">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">DELETE - <b><span class="employee-name"></span></b></h5>
            </div>
            <div class="modal-body">
                <form action="employee-delete-query.php" method="POST">
                    <input type="hidden" class="client-id" id="employee-id" name="employee_id">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-center"> Are you sure to delete this  employee? </h3>
                        </div>
                        <div class="row align-items-center">
                            <small class="text-danger"><i class="text-center">this will delete permanently*</i></small>
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat text-uppercase" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger text-uppercase" name="btn-delete-employee">delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


