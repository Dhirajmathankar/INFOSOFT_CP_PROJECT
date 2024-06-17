



<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">City Master</h4></div>
                    <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color:green;">
                        <?php if($this->session->flashdata('msg')!="") {?>  
                            <?php echo $this->session->flashdata('msg');?>
                          <?php } ?> </h6>
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()."superadmindashbord"; ?>">Home</a></li>
                        <li class="breadcrumb-item active">City Master</li>
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
                        <h4 class="card-title" style="color: #fff;">City Master List</h4> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          <a href="<?php echo base_url()."superadmindashbord/addCity" ?>" class="btn" title="Add City Master" style="background-color: #ff0000; color: #fff;"><i class="far fa-plus-square" style="font-size: 15px;"></i> Add City Master</a>


                             <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr style="background: #9fd9f3; color: #1a2e52;">
                                        <th width="5%">S.No.</th>
                                        <th width="35%"> State Name</th>
                                        <th width="35%"> City Name</th>
                                        <th width="15%">Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $sn_count=1;
                                 if($dataret>0){ 
                                  foreach($dataret as $row){ ?>
                                    <tr>
                                        <td><?php echo $sn_count; ?> </td>

                                        <td class="text-primary" style=" font-weight: 600">
                                              <?php echo rajyaDetail($row->sid)->state_name; ?> 
                                        </td>

                                        <td class="text-primary">
                                           <?php echo $row->city_name; ?>
                                         </td>

                                        
                                        <td style="text-transform: capitalize; text-align: center;"> <a style="font-size: 12px;margin: 0px; padding: 4px;" href="#!" <?php if ($row->status=='Active') { echo 'class="badge outline-badge-success ml-2"'; }elseif ($row->status=='Deactive') { echo 'class="badge outline-badge-danger ml-2"'; }else{ echo 'class="btn btn-info'; } ?> > <?php if ($row->status=='Active') { echo 'Active'; }elseif ($row->status=='Deactive') { echo 'Deactive'; }else{ echo ''; } ?>  </a></td>
                                        
                                          
                                         
                                        <td>
                                          <a href="<?php echo base_url(); ?>superadmindashbord/cityEdit/<?php echo $row->cid; ?>" title="View/Edit"><button style="padding: 4px 10px;" class="btn btn-sm btn-outline-info"><i style=" font-weight: bold;" class="icon-pencil"></i></button> </a>
                                            <a href="<?php echo base_url(); ?>superadmindashbord/cityDelete/<?php echo $row->cid; ?>" onclick="return confirm('Are you sure you want to delete it?')" title="Delete"><button style="padding: 4px 10px;"  class="btn btn-sm btn-outline-danger"><i style=" font-weight: bold;" class="icon-trash"></i></button></a>
                                          </td>
                                    </tr>
                                <?php $sn_count++; } } ?>
                                </tbody>
                            </table>

                           <!-- <?php echo '<ul class="pagination" style="margin: 2px 0; white-space: nowrap; justify-content: flex-end; margin: 20px 0; ">'. $this->pagination->create_links().'</ul>';?> -->
           
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



  