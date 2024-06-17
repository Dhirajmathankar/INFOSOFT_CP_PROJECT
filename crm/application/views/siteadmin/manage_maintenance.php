



<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Maintenance Master</h4></div>
                    <div class="w-sm-100 mr-auto">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> 
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Maintenance Master</li>
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
                        <h5 class="card-title" style="color: #fff;">Maintenance Master List  &nbsp;&nbsp;<a href="<?php echo base_url()."superadmindashbord/addmaintenance" ?>" class="" title="Add Customer Master" style="color: #fff;"><i class="fas fa-folder-plus"></i> </a></h5> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          


                             <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr style="background: #9fd9f3; color: #1a2e52;">
                                        <th width="5%">S.No.</th>
                                        <th width="13%"> Maintenance No.</th>
                                        <th width="12%">Date</th>
                                        <th width="13%">Vehicle No</th>
                                        <th width="10%">Maintenance Amount</th>
                                        <th width="11%">Remarks </th>
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

                                        <td class="text-primary font-w-600">
                                          <?php  echo $row->maintenanceNo;?>
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo date("d-m-Y", strtotime($row->maintenanceDate)) ;?>
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo vehicleDetail($row->bhid)->vehicleNo; ?>
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo number_format($row->maintenanceAmt,2) ;?>
                                        </td>

                                        <td class="text-primary">
                                          <?php  echo $row->remarks;?>
                                        </td>

                                        <td style="text-transform: capitalize; text-align: center;"> <a style="font-size: 12px;margin: 0px; padding: 4px;" href="#!" <?php if ($row->status=='Active') { echo 'class="badge outline-badge-success ml-2" title="Active"'; }else { echo 'class="badge outline-badge-danger ml-2" title="Deactive"'; } ?> > 
                                            <?php if ($row->status=='Active') { echo 'Active'; } else{ echo 'Deactive'; } ?>  </a>
                                            

                                        </td>

                                        
                                        <td>
                                          <a href="<?php echo base_url(); ?>superadmindashbord/maintenanceEdit/<?php echo $row->mid; ?>" title="View/Edit"><button style="padding: 4px 10px;" class="btn btn-sm btn-outline-info"><i style=" font-weight: bold;" class="icon-pencil"></i></button> </a>
                                            <a href="<?php echo base_url(); ?>superadmindashbord/maintenanceDelete/<?php echo $row->mid; ?>" onclick="return confirm('Are you sure you want to delete it?')" title="Delete"><button style="padding: 4px 10px;"  class="btn btn-sm btn-outline-danger"><i style=" font-weight: bold;" class="icon-trash"></i></button></a>
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



  