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
                            <a href="reservations.php"><i class="fa fa-file-text"></i> Reservations</a>
                        </li>
                        
                        <li>
                            <a href="#">Manage<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="view-client.php" ><i class="fa fa-eye"></i> View Client</a>
                                </li>
                                <li>
                                    <a href="add-client.php"><i class="fa fa-user-plus"></i> Add Client</a>
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
                    <a href="contract.php" class="active"><i class="fa fa-edit"></i> Contract</a>
                </li>
                <li>
                    <a href="payments.php"><i class="fa fa-money"></i> Payments</a>
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
                    <h3 class="page-header">Contracts</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="create-contract.php" class="btn btn-sm  btn-primary" ><i class="fa fa-plus fa-fw"></i> Create Contract</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <?php include 'includes/contract-alert-message.php' ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contract Data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>#</th>
                                        <th>Contract ID</th>
                                        <th>Contracting Party</th>
                                        <th>Deceased</th>
                                        <th>Service</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $select_contract = "SELECT * FROM contract 
                                                                LEFT JOIN client ON contract.client_id = client.client_id 
                                                                LEFT JOIN service ON contract.service_id = service.service_id 
                                                                LEFT JOIN deceased ON deceased.deceased_id = contract.deceased_id 
                                                                LEFT JOIN branches ON branches.branch_id = contract.branch_id 
                                                                LEFT JOIN chapel USING (chapel_id)";
                                                                
                                            $query_contract = $conn->query($select_contract);
                                            $no=1;
                                            while($row_contract = $query_contract->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row_contract['contract_unique_id'];?></td>
                                                    <td class="text-capitalize"><?php echo $row_contract['client_firstname'].' '.$row_contract['client_middlename'].' '.$row_contract['client_lastname'];?></td>
                                                    <td class="text-capitalize"><?php echo $row_contract['deceased_fname'].' '.$row_contract['deceased_mname'].' '.$row_contract['deceased_lname'];?></td>
                                                    <td><?php echo $row_contract['service'];?></td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button class="view btn btn-success btn-sm" data-id="<?php echo $row_contract['contract_unique_id']; ?>"><i class="fa fa-eye"></i> </button>
                                                           
                                                            <a href="generate-contract.php?id=<?php echo $row_contract['contract_unique_id'] ?>" target="_blank" class="btn btn-sm  btn-primary" ><i class="fa fa-print fa-fw"></i></a>
														</div>
                                                    </td>
                                                </tr>
                                           <?php $no++; }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/modal-contract.php' ?>
    </div>
  
</div>

<?php include 'includes/scripts.php' ?>

<script>
function numberFormat (number) {
    return  new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(number);
}

$(function(){
   
   $('.view').click(function(e)
   {
       e.preventDefault();
       $('#view').modal('show');
       var id = $(this).attr('data-id');
       ViewContract(id);
   });
});

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
            $('.amount').html(numberFormat(response.amount));
            $('.casketAmount').html(numberFormat(response.amount));
            $('.payment').html(numberFormat(response.payment_amount));
            $('.balance').html(numberFormat(response.balance));
            $('.chapel').html(response.chapel_name);
            $('.address').html(response.address);
            document.getElementById("contract-code").value = response.contract_unique_id;
        }
    });
}



</script>

<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>

</body>
</html>
