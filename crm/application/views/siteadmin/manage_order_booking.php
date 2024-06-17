



<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order Booking</h4></div>
                    <div class="w-sm-100 mr-auto">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> 
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Order Booking</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header  justify-content-between align-items-center">                               
                        <h5 class="card-title" style="color: #fff;">Order Booking List  &nbsp;&nbsp;<a href="<?php echo base_url()."superadmindashbord/entryOrderBooking" ?>" class="" title="Entry Order Booking" style="color: #fff;"><i class="fas fa-folder-plus"></i> </a></h5> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          


                             <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr style="background: #9fd9f3; color: #1a2e52;">
                                        <th width="5%">S. No.</th>
                                        <th width="20%" class="text-center">Order Booking No.</th>
                                        <!-- <th width="12%">Vehicle No.</th>
                                        <th width="12%">Container No.</th> -->
                                        <th width="20%" class="text-center">Customer Name</th>
                                        <th width="20%" class="text-center">Booking Through</th>
                                        <th width="15%" class="text-center">Total Bill Amount(<i class="fas fa-rupee-sign" style="font-size: 12px;"></i>)</th>
                                        <th width="10%" class="text-center">Bill Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $sn_count=1;
                                 if($fetch>0){ 
                                  foreach($fetch as $row){ ?>
                                    <tr>
                                        <td><?php echo $sn_count; ?> </td>

                                        <td class="text-primary">
                                          <span style="font-weight: bold;"> <?php  echo $row->orderBookingNo;?></span>
                                          <br> <a style="font-size: 11px; font-weight: 500;" class="text-primary">Booking Date/Time: </a> <br>
                                          <?php if ($row->bookingDate) {
                                              ?> <a title="Booking Date/Time: <?php  echo date("d-m-Y",strtotime($row->bookingDate));  ?> <?php  echo date("H:i A",strtotime($row->bookingTime));?>" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;"><?php  echo date("d-m-Y",strtotime($row->bookingDate)); ?> <?php  echo date("H:i A",strtotime($row->bookingTime));?></a><?php
                                            }  ?>
                                            
                                        </td>

                                        <!-- <td class="text-primary">
                                          <?php  echo vehicleDetail($row->bhid)->vehicleNo ;?>
                                        </td> -->

                                        <!-- <td class="text-primary">
                                          <?php  echo $row->containerNo;?>
                                          <br>
                                          <?php if ($row->brokerStateCode) {
                                              ?> 
                                              <a style="font-size: 11px; font-weight: 500; " title="State Code: <?php  echo $row->brokerStateCode;  ?>" class="text-danger">Code: <?php  echo $row->brokerStateCode;  ?></a>
                                            <?php
                                            }?>
                                        </td> -->

                                        <td class="text-primary">
                                          <?php  echo customerDetail($row->cuid)->customerName ;?>
                                        </td>
                                        <td class="text-primary text-center">
                                          <?php  echo brokerDetail($row->brid)->brokerName ;?>
                                        </td>
                                        <td title="Total Bill Amount: <?php  echo number_format($row->totalBillAmt,2) ;?>" class="text-primary text-center font-w-600" style="font-size: 16px;">
                                           <?php  echo number_format($row->totalBillAmt,2) ;?>
                                        </td>

                                        <td style="text-transform: capitalize; text-align: center;"> <a style="font-size: 12px;margin: 0px; padding: 4px;" href="#!" <?php if ($row->statusBill=='Pending') { echo 'class="badge outline-badge-warning ml-2" title="Pending"'; }else { echo 'class="badge outline-badge-success ml-2" title="Bill Generated"'; } ?> > 
                                            <?php if ($row->statusBill=='Pending') { echo 'Pending'; } else{ echo 'Bill Generated'; } ?>  </a>
                                            

                                            <br> <a style="font-size: 11px; font-weight: 500; " title="Updated on: <?php  echo date("d-m-Y",strtotime($row->updatedDateBooking));  ?>" class="text-primary">Updated on: </a>
                                            <br>
                                            <?php if ($row->updatedDateBooking) {
                                              ?> <a title="Updated on: <?php  echo date("d-m-Y",strtotime($row->updatedDateBooking));  ?>" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;"><?php  echo date("d-m-Y",strtotime($row->updatedDateBooking));  ?> </a><?php
                                            } else{ ?><a title="Updated on:" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;">00-00-0000 </a> <?php } ?>
                                             

                                        </td>

                                        
                                        <td>
                                           <?php if ($row->statusBill=='Pending') {
                                              ?>
                                          <a href="<?php echo base_url(); ?>superadmindashbord/orderBookingEdit/<?php echo $row->obid; ?>" title="Edit"><button style="padding: 4px 10px;" class="btn btn-sm btn-outline-info"><i style=" font-weight: bold;" class="icon-pencil"></i></button> </a>
                                          <?php
                                            } else{ ?>
                                              <a href="<?php echo base_url(); ?>superadmindashbord/orderBookingBillGenerated/<?php echo $row->obid; ?>" title="View [For edit - please delete corresponding bill no.]"><button style="padding: 4px 10px;" class="btn btn-sm btn-outline-info"><i style=" font-weight: bold;" class="far fa-eye"></i></button> </a><?php
                                            }
                                              ?>
                                            <a href="<?php echo base_url(); ?>superadmindashbord/orderBookingDelete/<?php echo $row->obid; ?>" onclick="return confirm('Are you sure you want to delete it?')" title="Delete"><button style="padding: 4px 10px;"  class="btn btn-sm btn-outline-danger"><i style=" font-weight: bold;" class="icon-trash"></i></button></a>
                                          </td>
                                    </tr>
                                <?php $sn_count++; } } ?>
                                </tbody>
                            </table>
           
                        </div>
                    </div>
                </div> 

            </div>                  
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->


<!-- show-read-more-->



  