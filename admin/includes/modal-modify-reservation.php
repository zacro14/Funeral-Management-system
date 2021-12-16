
<!-- Modal -->
<div class="modal fade" id="modifyreservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-capitalize" id="exampleModalLabel"> reservation details</h4>
      </div>
    <form action="reservation-update-query.php" method="POST">
      <div class="modal-body">
      
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Reservation Date</label>
                        <input type="hidden" name="rescode" value="<?php echo $result_res['reservation_code'] ?>">
                        <input type="date" class="form-control" name="reservation_date" value="<?php echo $result_res['reservation_date']?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="service_type" class="form-label">Type of Service</label>
                        <select name="service_type" class="form-control"  onchange="fetchService(this.value)" required>   
                            <option value="<?php echo $result_res['service_id'] ?>" disabled selected><?php echo $result_res['service'] ?> </option>
                                <?php 
                                            $fetch_chapel = "SELECT * FROM service";
                                            $query_chapel = $conn->query($fetch_chapel);
                                        
                                            while($result_chapel = $query_chapel->fetch_assoc()){ ;?>
                                            <option value="<?php echo $result_chapel['service_id'] ?>"> <?php echo $result_chapel['service']; ?></option>

                                <?php  }; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="chapel_viewing" class="form-label">Chapel Viewing</label>
                        <select name="chapel" class="form-control" required>   
                            <option value="<?php echo $result_res['chapel_id'] ?>" selected><?php echo $result_res['chapel_name'] ?> </option>
                                <?php 
                                            $fetch_chapel = "SELECT * FROM chapel";
                                            $query_chapel = $conn->query($fetch_chapel);
                                        
                                            while($result_chapel = $query_chapel->fetch_assoc()){ ;?>
                                            <option value="<?php echo $result_chapel['chapel_id'] ?>"> <?php echo $result_chapel['chapel_name']; ?></option>

                                <?php  }; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-8">
                            <label for="casket_type" class="form-label">Casket Type</label>
                            <select id="casket" name="casket_type" class="form-control" required onchange="getCasketAmount(this.value)">   
                                <option value="<?php echo $result_res['casket_id'] ?>" disabled selected><?php echo $result_res['casket_type'] ?> </option>
                                    <?php 
                                                $service_id =$result_res['service_id'];
                                                $fetch_chapel = "SELECT * FROM casket WHERE casket.service_id = $service_id";
                                                $query_chapel = $conn->query($fetch_chapel);
                                            
                                                while($result_chapel = $query_chapel->fetch_assoc()){ ;?>
                                                <option value="<?php echo $result_chapel['casket_id'] ?>"> <?php echo $result_chapel['casket_type']; ?></option>

                                    <?php  }; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="casket_price" class="form-label">Price </label>
                            <input type="hidden" id="update_price" value="<?php echo $result_res['casket_id'], 2 ?>">
                            <b><p class="modify_amount" id="modify_amount"><?php echo number_format($result_res['amount'], 2) ?></p></b>
                    </div>
                </div>

                  
            </div>
       
     
     
      </div>
      <div class="modal-footer">  
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success text-capitalize" name="modify-reservation">update</button>
      </div>

      </form>
    </div>
  </div>
</div>