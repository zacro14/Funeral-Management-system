
<!-- Modal -->
<div class="modal fade" id="deletereservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-capitalize" id="exampleModalLabel"> reservation details</h4>
      </div>
     
      <div class="modal-body">
      <form action="reservation-delete-query.php" method="POST">
            <div class="container-fluid">
            <dl class="dl-horizontal">
              <input type="hidden" name="rescode" value="<?php echo $result_res['reservation_code'] ?>"> </input>
                        <dt class="text-capitalize">reservation code</dt>
                        <dd name="rescode" > <?php echo $result_res['reservation_code'] ?></dd>
                        
                        <dt class="text-capitalize">reservation date</dt>
                        <dd> <?php echo $result_res['reservation_date'] ?></dd>

                        <dt class="text-capitalize">reservation status</dt>
                        <dd> <?php echo $result_res['reservation_status'] ?></dd>

                        <dt class="text-capitalize"> type of service</dt>
                        <dd> <?php echo $result_res['service'] ?></dd>

                        <dt class="text-capitalize">casket type</dt>
                        <dd><a href="casket.php?caskettype=<?php echo $result_res['casket_type'] ?>"> <?php echo $result_res['casket_type'] ?> </a></dd>

                        <dt class="text-capitalize">price</dt>
                        <dd>&#8369; <?php echo number_format($result_res['amount'], 2) ?></dd>

                        <dt class="text-capitalize">chapel viewing</dt>
                        <dd> <?php echo $result_res['chapel_name'] ?></dd>
               
                    </dl>
                </div>

        <div class="modal-footer">  
            <button type="submit" class="btn btn-danger text-capitalize" name="delete-reservation">delete </button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
      </form>

      </div>
      
    </div>
  </div>
</div>