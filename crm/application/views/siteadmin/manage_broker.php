



<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Broker Master</h4></div>
                    <div class="w-sm-100 mr-auto">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> 
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Broker Master</li>
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
                        <h5 class="card-title" style="color: #fff;">Broker Master List  &nbsp;&nbsp;<a href="<?php echo base_url()."superadmindashbord/addBroker" ?>" class="" title="Add Broker Master" style="color: #fff;"><i class="fas fa-folder-plus"></i> </a></h5> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          


                             <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr style="background: #9fd9f3; color: #1a2e52;">
                                        <th width="5%">S.No.</th>
                                        <th width="15%"> Broker Name</th>
                                        <th width="12%">City</th>
                                        <th width="13%">State</th>
                                        <th width="10%">Mobile Nos.</th>
                                        <th width="10%">Opening Balance</th>
                                        <th width="10%">Closing Balance</th>
                                        <th width="10%">Status</th>
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
                                          <?php  echo $row->brokerName;?>
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo $row->brokerCity;?> 
                                          <br>
                                          <?php if ($row->brokerPINCode) {
                                              ?> 
                                              <a style="font-size: 11px; font-weight: 500; " title="PIN Code: <?php  echo $row->brokerPINCode;  ?>" class="text-danger">PINCode: <?php  echo $row->brokerPINCode;  ?></a>
                                              <?php
                                            }?>
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo $row->brokerState;?>
                                          <br>
                                          <?php if ($row->brokerStateCode) {
                                              ?> 
                                              <a style="font-size: 11px; font-weight: 500; " title="State Code: <?php  echo $row->brokerStateCode;  ?>" class="text-danger">Code: <?php  echo $row->brokerStateCode;  ?></a>
                                            <?php
                                            }?>
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo $row->brokerMobileNo;?><br>
                                          <?php  echo $row->brokerMobileNo1;?>
                                        </td>
                                        <td class="text-primary">
                                          <?php  echo $row->brokerOpeningBalance;?>
                                        </td>
                                        <td class="text-primary">
                                          <?php  echo $row->brokerClosingBalance;?>
                                        </td>

                                        <td style="text-transform: capitalize; text-align: center;"> <a style="font-size: 12px;margin: 0px; padding: 4px;" href="#!" <?php if ($row->statusBroker=='Active') { echo 'class="badge outline-badge-success ml-2" title="Active"'; }else { echo 'class="badge outline-badge-danger ml-2" title="Deactive"'; } ?> > 
                                            <?php if ($row->statusBroker=='Active') { echo 'Active'; } else{ echo 'Deactive'; } ?>  </a>
                                            

                                            <br> <a style="font-size: 11px; font-weight: 500; " title="Created on: <?php  echo date("d-m-Y",strtotime($row->createdDateBroker));  ?>" class="text-primary">Created on: </a>
                                            <br>
                                            <?php if ($row->createdDateBroker) {
                                              ?> <a title="Created on: <?php  echo date("d-m-Y",strtotime($row->createdDateBroker));  ?>" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;"><?php  echo date("d-m-Y",strtotime($row->createdDateBroker));  ?> </a><?php
                                            } else{ ?><a title="Created on:" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;">00-00-0000 </a> <?php } ?>
                                             

                                        </td>

                                        
                                        <td>
                                          <a href="<?php echo base_url(); ?>superadmindashbord/brokerEdit/<?php echo $row->brid; ?>" title="View/Edit"><button style="padding: 4px 10px;" class="btn btn-sm btn-outline-info"><i style=" font-weight: bold;" class="icon-pencil"></i></button> </a>
                                            <a href="<?php echo base_url(); ?>superadmindashbord/brokerDelete/<?php echo $row->brid; ?>" onclick="return confirm('Are you sure you want to delete it?')" title="Delete"><button style="padding: 4px 10px;"  class="btn btn-sm btn-outline-danger"><i style=" font-weight: bold;" class="icon-trash"></i></button></a>
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



  