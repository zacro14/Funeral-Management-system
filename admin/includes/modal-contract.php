<?php include "includes/db-connection.php" ?>

<?php   

    // $fetch_contract = "SELECT *
    // FROM (((((contract
    // INNER JOIN client ON contract.client_id = client.client_id)
    // INNER JOIN casket ON contract.casket_id = casket.casket_id)
    // INNER JOIN service ON contract.service_id = service.service_id)
    // INNER JOIN deceased ON contract.deceased_id = deceased.deceased_id)
    // INNER JOIN payments ON contract.payment_id = payments.payment_id)
    // WHERE contract.client_id = 18";
    // $query_payments = $conn->query($fetch_contract);
    // $payment = $query_payments->fetch_assoc();
?>


<!-- VIEW CONTRACT MODAL -->
<div class="modal fade" id="view">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title text-info"><b><span class="contract"></span></b></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center"><b>FUNERARIA STA. RITA DE CASIA</b></h3>
                        <h4 class="text-center">FUNERAL SERVICE CONTRACT</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <b>Contract Code: </b><span class="contract"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right"><b>Date: </b><span class="date"></span></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-center">Contracting Party</h4>
                        <b>Name: </b><span class="name"></span><br>
                        <b>Address: </b><span class="address"></span><br>
                        <b>Contact #: </b><span class="contact"></span><br>
                        <b>Relation to deceased: </b><span class="relation"></span>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-center">Deceased Details</h4>
                        <b>Name: </b><span class="d_name"></span><br>
                        <b>Born: </b><span class="born"></span><br>
                        <b>Age: </b><span class="age"></span><br>
                        <b>Died: </b><span class="died"></span><br>
                        <b>Religion: </b><span class="religion"></span>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr><td style="width:35%;"><b>Type Of Service: </b></td><td><span class="service"></span></td></tr>
                                <tr><td style="width:35%;"><b>Casket Type: </b></td><td><span class="casket"><?php echo $payment['casket_type'];?></span></td></tr>
                                <tr><td style="width:35%;"><b>Chandeliers and Vigil Equip: </b></td><td><span class="chandeliers"></span></td></tr>
                                <tr><td style="width:35%;"><b>Chapel Viewing: </b></td><td><span class="chapel"></span></td></tr>
                                <tr><td style="width:35%;"><b>Transport of body/remains: </b></td><td><span class="transport"></span></td></tr>
                                <tr><td style="width:35%;"><b>Other Charges(pls. specify): </b></td><td><span class="charges"></span></td></tr>
                                <tr><td style="width:35%;"></td><td><span class=""></span></td></tr>
                                <tr><td style="width:35%;"></td><td><span class=""></span></td></tr>
                                <tr><td style="width:35%;"><b>Total Amount: </b></td><td><span class="amount"></span></td></tr>
                                <tr><td style="width:35%;"></td><td><span class=""></span></td></tr>
                                <tr><td style="width:35%;"><b>Partial Payment: </b></td><td><span class="payment"></span></td></tr>
                                <tr><td style="width:35%;"><b>Balance: </b></td><td><span class="balance"></span></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
