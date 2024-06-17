<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-4 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Bill Master</h4></div>
                    <div class="w-sm-100 mr-auto">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> 
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Bill Master</li>
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
                        <h5 class="card-title" style="color: #fff;">BillBill Master List  &nbsp;&nbsp;<a href="<?php echo base_url()."superadmindashbord/entryBill" ?>" class="" title="Add Bill Master" style="color: #fff;"><i class="fas fa-folder-plus"></i> </a></h5> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                             <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr style="background: #FFC371; color: #1a2e52;">
                                        <th width="5%">S.No.</th>
                                        <th width="14%">Bill ID</th>
                                        <th width="30%">Customer Name</th>
                                        <th width="14%">Total Amount</th>
                                        <th width="8%">Payment Type</th>
                                        <th width="8%">Created Date</th>
                                        <th width="7%">Status</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $sn_count=1;
                                 if($fetch>0){ 
                                  foreach($fetch as $row){ ?>
                                    <tr>
                                        <td><?php echo $sn_count; ?> </td>

                                       <td class="text-primary">
                                          <?php  echo $row->billid;?>
                                       </td>
                                       <td class="text-primary">
                                          <?php echo showCustomerDetail($row->cid)->customerName;?>
                                       </td>
                                       <td class="text-primary">
                                          <?php  echo $row->totalAmount;?>
                                       </td>
                                       <td style="text-transform: capitalize; text-align: center;"> <a style="font-size: 12px;margin: 0px; padding: 4px;" href="#!" <?php if ($row->paymentType=='yes') { echo 'class="badge outline-badge-success ml-2" title="Cash"'; }else { echo 'class="badge outline-badge-danger ml-2" title="Credit"'; } ?> > 
                                            <?php if ($row->paymentType=='yes') { echo 'Cash'; } else{ echo 'Credit'; } ?>  </a>
                                        </td>

                                        <td class="text-primary">
                                          <?php if ($row->createdDate) {
                                              ?> <a title="Permit Renewal Date: <?php  echo date("d-m-Y",strtotime($row->createdDate));  ?>" class="badge outline-badge-success ml-2" style="color: #333; font-weight: 500;"><?php  echo date("d-m-Y",strtotime($row->createdDate));  ?> </a><?php
                                            } else{ ?><a class="badge outline-badge-warning ml-2" style="color: #333; font-weight: 500;">00-00-0000 </a> <?php } ?>
                                        </td>


                                        <td style="text-transform: capitalize; text-align: center;"> <a style="font-size: 12px;margin: 0px; padding: 4px;" href="#!" <?php if ($row->status=='Active') { echo 'class="badge outline-badge-success ml-2" title="Active"'; }else { echo 'class="badge outline-badge-danger ml-2" title="Deactive"'; } ?> > 
                                            <?php if ($row->status=='Active') { echo 'Active'; } else{ echo 'Deactive'; } ?>  </a>
                                        </td>

                                        
                                        <td>
                                          <a href="<?php echo base_url(); ?>makeprint/billPDF/<?php echo $row->bid; ?>/<?php echo $row->cid; ?>" title="Print/View PDF"><button style="padding: 4px 10px;"  class="btn btn-sm btn-outline-primary"><i style=" font-weight: bold; font-size: 20px;" class="far fa-file-pdf"></i></button></a>
                                          <a href="<?php echo base_url(); ?>superadmindashbord/billEdit/<?php echo $row->bid; ?>" title="View/Edit"><button style="padding: 4px 10px;" class="btn btn-sm btn-outline-info"><i style=" font-weight: bold;" class="icon-pencil"></i></button> </a>
                                            <a href="<?php echo base_url(); ?>superadmindashbord/billDelete/<?php echo $row->bid; ?>" onclick="return confirm('Are you sure you want to delete it?')" title="Delete"><button style="padding: 4px 10px;"  class="btn btn-sm btn-outline-danger"><i style=" font-weight: bold;" class="icon-trash"></i></button></a>
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




  