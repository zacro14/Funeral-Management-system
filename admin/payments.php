<?php include 'includes/header.php' ?>
<body>

<div id="wrapper">
    <?php include 'includes/nav.php' ?>

    <!-- SIDEBAR -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li>
                <li>
                    <a href="homepage.php" class=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Client Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="reservations.php" class="">Reservations</a>
                        </li>
                        
                        <li>
                            <a href="#" class="">Manage<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="view-client.php" class=""><i class="fa fa-eye"></i> View Client</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-user-plus"></i> Add Client</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Employee Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li>
                            <a href="view-employee.php">View Employee</a>
                        </li>
                        <li>
                            <a href="add-employee.php">Add Employee</a>
                        </li>
                        <li>
                            <a href="work-schedule.php">Work Schedule</a>
                        </li>
                        <li>
                            <a href="work-type.php" class="">Work Type</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contract.php"><i class="fa fa-edit"></i> Contract</a>
                </li>
                <li>
                    <a href="payments.php" class="active"><i class="fa fa-money"></i> Payments</a>
                </li>
                <li>
                    <a href="deceased.php" class=""><i class="fa fa-list fa-fw"></i> Deceased</a>
                </li>
                <li>
                    <a href="services.php" class=""><i class="fa fa-file fa-fw"></i> Services</a>
                </li>
                <li>
                    <a href="casket.php" class=""><i class="fa fa-columns fa-fw"></i> Casket</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-pdf-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="reservation-report.php">Reservation</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
    
    <!-- END SIDEBAR -->
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Payments</h3>
                </div>
            </div>
            
            <br>

<div class="row">
    <div class="col-md-3">
            <div class="form-group">
                <select name="status" id="status" class="form-control">                          
                <option value="NOT FULLY PAID" >NOT FULLY PAID</option>
                <option value="FULLY PAID" >FULLY PAID</option>
                          
                </select>
        </div>
    </div>
</div>

            <div class="row">
                <div class="col-lg-12">
                    <?php include 'includes/payment-alert-message.php' ?>
                   
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Casket Amount</th>
                                        <th>Payment Amount</th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                        <th>Contract</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            // $fetch_payment = "SELECT payments.payment_id, payments.payment_amount, payments.balance, payments.status, contract.contract_unique_id, client.client_firstname, client.client_middlename, client.client_lastname, branches.branch_name, branches.branch_address FROM (((payments
                                            //     INNER JOIN client ON payments.client_id = client.client_id)
                                            //     INNER JOIN contract ON payments.payment_id = contract.contract_id)
                                            //     INNER JOIN branches ON branches.branch_id = branches.branch_id) WHERE branches.branch_id = '".$user['branch_id']."'";

                                            $fetch_payment ="SELECT * FROM payments 
                                                            INNER JOIN contract ON contract.contract_unique_id = payments.contract_id 
                                                            INNER JOIN client ON client.client_id = payments.client_id 
                                                            INNER JOIN casket ON casket.casket_id = payments.casket_id
                                                            INNER JOIN branches ON branches.branch_id = payments.branch_id
                                                            WHERE status = 'NOT FULLY PAID' ";

                                            
                    
                                            $query_payments = $conn->query($fetch_payment);
                                            $no = 1;
                                            while($row_payments = $query_payments->fetch_assoc())
                                             { $status = ($row_payments['status'] == 'FULLY PAID') ? '<span class="label label-success pull-left">FULLY PAID</span>':'<span class="label label-warning pull-left">NOT FULLY PAID</span>';?>      
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td class="text-capitalize"><?php echo $row_payments['client_firstname']. ' ' . $row_payments['client_middlename']. ' ' . $row_payments['client_lastname'];?></td>
                                                    <td>&#8369; <?php echo number_format($row_payments['amount'], 2) ?></td>
                                                    <td>&#8369; <?php echo number_format($row_payments['payment_amount'], 2); ?></td>
                                                    <td>&#8369; <?php echo number_format($row_payments['balance'], 2);?> </td>
                                                    <td><?php echo $status;?> </td>
                                                    <td><button class="view btn btn-secondary btn-sm" data-id="<?php echo $row_payments['contract_unique_id']; ?>"><i class="fa fa-eye"></i> View Contract Details</button></td>
                                                    <td>
														<div class="btn-group btn-group-sm">
                                                        
                                                            <button class="edit-payment btn btn-primary btn-sm" data-id="<?php echo $row_payments['payment_id']; ?>"><i class="fa fa-edit"></i> </button>
                                                           
														</div>
													</td>
                                                </tr>

                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-service">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title">Add Service</h5>
                </div>
                <div class="modal-body">
                    <form action="add-service.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Service">Type of Service</label>
                                    <input type="text" class="form-control" name="service" placeholder="Enter here..." required>
                                </div>
                            </div>
                            
                        <br><br><br><br><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="btn-add-service"><i class="fa fa-plus"></i> Submit</button>
                    </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include 'includes/modal-contract.php' ?>
<?php include 'includes/modals.php' ?>
<?php include 'includes/scripts.php' ?>

<script src="./js/simple-mask-money.js"></script>
<script>


    $("#status").on('change', function(){
        var value = $(this).val();
            //alert(value);

        $.ajax({
                url: "payment-filter.php",
                type: "POST",
                data: "status=" + value,
                beforeSend:function(){
                    $(".panel-body").html("<center><img class='' src='img/loader.gif' /></center>");
                },
                success:function(data){
                    
                    $(".panel-body").html(data);
                }
        });
    });

$(function(){
   $('.view').click(function(e)
   {
       e.preventDefault();
       $('#view').modal('show');
       var id = $(this).data('id');
       ViewContract(id);
   });

   $('.edit-payment').click(function(e)
    {
        e.preventDefault();
        $('#edit-payment').modal('show');
        var id = $(this).data('id');
        fetchData(id);
    });

});

function fetchData(id){
    $.ajax({
        type: 'POST',
        url: 'fetch-payment.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){   
            $('.name').html(response.client_firstname+' '+response.client_middlename+' '+response.client_lastname);
            $('.payment-id').val(response.payment_id);
            $('.total-amount').val(response.amount);
            $('.balance').val(response.balance);
           
            const formatNumber = (number) => {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(number);
            }
            //const balance  = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'PHP' }).format(response.balance);
            $('.balance').html(formatNumber(response.balance));
            $('.total-amount').html(formatNumber(response.amount));
        }
    });
}

function ViewContract(id){
    $.ajax({
        type: 'POST',
        url: 'fetch-contract.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){   
            $('.contract').html(response.contract_unique_id);
            $('.date').html(response.date);
            $('.name').html(response.client_firstname+' '+response.client_middlename+' '+response.client_lastname);
            $('.contact').html(response.client_phone);
            $('.relation').html(response.relation_to_deceased);
            $('.d_name').html(response.deceased_fname+' '+response.deceased_mname+' '+response.deceased_lname);
            $('.born').html(response.date_of_birth);
            $('.age').html(response.age);
            $('.died').html(response.date_died);
            $('.religion').html(response.religion);
            $('.service').html(response.service);
            $('.casket').html(response.casket_type);
            $('.charges').html(response.other_charges);
            $('.amount').html(response.amount);
            $('.payment').html(response.payment_amount);
            $('.balance').html(response.balance);
            $('.chapel').html(response.chapel_name);
        }
    });
}

/*
*
https://github.com/codermarcos/simple-mask-money
*
*/

// config
const options = {
        allowNegative: false,
        negativeSignAfter: false,
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: '.',
        thousandsSeparator: ',',
        cursor: 'move'
      };

      let input = SimpleMaskMoney.setMask('#paymentamount', options);

      send = (e) => {
        if (e.key !== "Enter") return;
        // This method return value of your input in format number to save in your database
        console.log( input.formatToNumber() );
      }


</script>

<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>


</body>
</html>
