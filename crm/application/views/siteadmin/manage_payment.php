



<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Payment</h4></div>
                    <div class="w-sm-100 mr-auto">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> 
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Payment</li>
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
                        <h5 class="card-title" style="color: #fff;">Payment List  &nbsp;&nbsp;<a href="<?php echo base_url()."superadmindashbord/entryPayment" ?>" class="" title="Entry Payment" style="color: #fff;"><i class="fas fa-folder-plus"></i> </a></h5> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          


                             <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr style="background: #9fd9f3; color: #1a2e52;">
                                        <th width="4%">S. No.</th>
                                        <th width="15%">Payment/Voucher No.</th>
                                        <th width="17%">Bill/Invoice No.</th>
                                        <th width="13%">Customer Name</th>

                                        <th width="11%">Pending Amount(<i class="fas fa-rupee-sign" style="font-size: 10px;"></i>)</th>

                                        <th width="11%">Received Amount(<i class="fas fa-rupee-sign" style="font-size: 10px;"></i>)</th>
                                        
                                        <th width="11%">TDS(<i class="fas fa-rupee-sign" style="font-size: 10px;"></i>)</th>
                                        <th width="8%" class="text-center">Payment Status</th>
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
                                          <span style="font-weight: bold;"> <?php  echo $row->paymentNo;?></span>
                                          <br> <a style="font-size: 11px; font-weight: 500;" class="text-primary">Payment Date: </a> <br>
                                          <?php if ($row->paymentDate) {
                                              ?> <a title="Payment Date: <?php  echo date("d-m-Y",strtotime($row->paymentDate));?> <?php  echo date("H:i A",strtotime($row->paymentTime));?>
                                              " class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;"><?php  echo date("d-m-Y",strtotime($row->paymentDate));  ?></a><?php
                                            }  ?>
                                            
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo billDetail($row->blid)->billNo ;?>
                                          <br> <a style="font-size: 11px; font-weight: 500;" class="text-primary">Bill Date: </a> <br>
                                          <?php if (billDetail($row->blid)->billDate) {
                                              ?> <a title="Bill Date: <?php  echo date("d-m-Y",strtotime(billDetail($row->blid)->billDate));?> <?php  echo date("H:i A",strtotime(billDetail($row->blid)->billTime));?>
                                              " class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;"><?php  echo date("d-m-Y",strtotime(billDetail($row->blid)->billDate));  ?><?php
                                            }  ?>
                                        </td>


                                        <td class="text-primary">
                                          <?php  echo customerDetail($row->cuid)->customerName ;?>
                                        </td>

                                        <td class="text-primary text-center font-w-600">
                                          <?php  echo number_format(billDetail($row->blid)->invoiceAmt,2);?>
                                        </td>

                                        <td class="text-primary text-center font-w-600">
                                          <?php  echo number_format($row->receivedAmt,2);?>
                                        </td>

                                        
                                        <td class="text-primary text-center font-w-600">
                                          <?php  echo number_format($row->tdsAmt,2);?>
                                        </td>

                                        <td style="text-transform: capitalize; text-align: center;"> <a style="font-size: 12px;margin: 0px; padding: 4px;" href="#!" <?php if ($row->status=='Pending') { echo 'class="badge outline-badge-warning ml-2" title="Pending"'; }else { echo 'class="badge outline-badge-success ml-2" title="Success"'; } ?> > 
                                            <?php if ($row->status=='Pending') { echo 'Pending'; } else{ echo 'Success'; } ?>  </a>
                                            

                                            <br> <a style="font-size: 11px; font-weight: 500; " title="Updated on: <?php  echo date("d-m-Y",strtotime($row->updatedDatePayment));  ?>" class="text-primary">Updated on: </a>
                                            <br>
                                            <?php if ($row->updatedDatePayment) {
                                              ?> <a title="Updated on: <?php  echo date("d-m-Y",strtotime($row->updatedDatePayment));  ?>" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;"><?php  echo date("d-m-Y",strtotime($row->updatedDatePayment));  ?> </a><?php
                                            } else{ ?><a title="Updated on:" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;">00-00-0000 </a> <?php } ?>
                                             

                                        </td>

                                        
                                        <td>
                                          <a href="<?php echo base_url(); ?>superadmindashbord/paymentEdit/<?php echo $row->pid; ?>" title="View/Edit"><button style="padding: 4px 10px;" class="btn btn-sm btn-outline-info"><i style=" font-weight: bold;" class="icon-pencil"></i></button> </a>
                                            <a href="<?php echo base_url(); ?>superadmindashbord/paymentDelete/<?php echo $row->pid; ?>" onclick="return confirm('Are you sure you want to delete it?')" title="Delete"><button style="padding: 4px 10px;"  class="btn btn-sm btn-outline-danger"><i style=" font-weight: bold;" class="icon-trash"></i></button></a>
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



  