<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Applicant Detail</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Applicant All Detail</li>
    </ul>
</div>
<?php //print_r($enqDet); ?>
<!-- Breadcubs Area End Here -->
  <?php if($this->session->flashdata('msg')!="") {?>  
    <strong><?php echo $this->session->flashdata('msg');?></strong>
  <?php } //  print_r($enqDet); exit();  ?>
<!-- Teacher Table Area Start Here -->

                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <form class="new-added-form" method="post" action="<?php echo base_url()."superadmindashbord/banifitoryUpdate"; ?>" >

                        <input type="hidden" name="fid" value="<?php echo $eqndet->fid; ?>">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>1. जानकारी भरने वाले का विवरण</h3>
                            </div> 
                        </div>                        
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>नाम*</label>
                                    <input required="" type="text" name="fname" value="<?php echo $eqndet->fname; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>सम्पर्क नम्बर*</label>
                                    <input required="" type="text" name="sampark_number" value="<?php echo $eqndet->sampark_number; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>आधार कार्ड नम्बर  </label>
                                    <input type="text" name="sampark_adhar" value="<?php echo $eqndet->sampark_adhar; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>पद/कार्यालय*</label>
                                    <select class="select2" name="padh_karyalay"> 
                                        <option value=""></option> 
                             <option value="सामाजिक कार्यकर्ता"<?php if ($eqndet->padh_karyalay=="सामाजिक कार्यकर्ता"){ echo 'selected'; } ?>>सामाजिक कार्यकर्ता, </option>
                             <option value="एसएचजी/ग्राम संगठन"<?php if ($eqndet->padh_karyalay=="एसएचजी/ग्राम संगठन"){ echo 'selected'; } ?>>एसएचजी/ग्राम संगठन</option>
                             <option value="वार्ड पंच"<?php if ($eqndet->padh_karyalay=="वार्ड पंच"){ echo 'selected'; } ?>>वार्ड पंच, </option>
                             <option value="सरपंच"<?php if ($eqndet->padh_karyalay=="सरपंच"){ echo 'selected'; } ?>>सरपंच,</option>
                             <option value="आ0बा0 कार्यकर्ता"<?php if ($eqndet->padh_karyalay=="आ0बा0 कार्यकर्ता"){ echo 'selected'; } ?>>आ0बा0 कार्यकर्ता, </option>
                             <option value="आशा / मितानीन"<?php if ($eqndet->padh_karyalay=="आशा / मितानीन"){ echo 'selected'; } ?>>आशा / मितानीन</option>
                             <option value="सचिव"<?php if ($eqndet->padh_karyalay=="सचिव"){ echo 'selected'; } ?>>सचिव</option>
                             <option value="रोजगार सहायक"<?php if ($eqndet->padh_karyalay=="रोजगार सहायक"){ echo 'selected'; } ?>>रोजगार सहायक</option>
                             <option value="स्वयं"<?php if ($eqndet->padh_karyalay=="स्वयं"){ echo 'selected'; } ?>>स्वयं</option>
                             <option value="शिक्षक"<?php if ($eqndet->padh_karyalay=="शिक्षक"){ echo 'selected'; } ?>>शिक्षक</option>
                                    </select>

                                </div>
                                
                            </div>
                        
                    </div>

                    <hr>

                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>2. हितग्राही की सामान्य जानकारी</h3>
                            </div>
                        </div>
                        
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>नाम*</label>
                                    <input type="text" name="hitgrahi_name" value="<?php echo $eqndet->hitgrahi_name; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>पिता/पति</label>
                                    <input type="text" name="pati_patni" value="<?php echo $eqndet->pati_patni; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>राज्य</label>
                                    <select class="select2" name="rajya"><?php echo rajya_dropdown($eqndet->rajya); ?>
                                    </select>

                          
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>जिला</label>
                                    <select class="select2" name="jila"> 
                              <?php echo distric_dropdown($eqndet->jila,$eqndet->rajya);?> 
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>विकासखण्ड</label> 
                                    <select class="select2" name="vikaskhand"> 
                              <?php echo block_dropdown($eqndet->vikaskhand,$eqndet->jila);?> 
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>ग्राम*</label>
                                    <select class="select2" name="gram"> 
                              <?php echo village_dropdown($eqndet->gram,$eqndet->vikaskhand);?> 
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>ग्राम पंचायत*</label>
                                    <input type="text" name="gram_panch" value="<?php echo $eqndet->gram_panch; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>लिंग*</label>
                                    <select class="select2" name="gender">
                                        <option value=""></option>
                                        <option value="पुरूष"<?php if($eqndet->gender=="पुरूष"){ echo 'selected'; } ?>>पुरूष </option>
                                        <option value="महिला"<?php if($eqndet->gender=="महिला"){ echo 'selected'; } ?>>महिला </option>
                                        <option value="अन्य"<?php if($eqndet->gender=="अन्य"){ echo 'selected'; } ?>>अन्य</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>अन्य</label>
                                    <input type="text" name="gender_other" value="<?php echo $eqndet->gender_other; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>उम्र</label>
                                    <input type="text" name="age" value="<?php echo $eqndet->age; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>हितग्राही सम्पर्क नम्बर</label>
                                    <input type="text" name="hitgrahi_sampark" value="<?php echo $eqndet->hitgrahi_sampark; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label></label>
                                    <select class="select2" name="samagik_warg">
                                        <option value=""></option> 
                            <option value="अनुसूचित जाति"<?php if($eqndet->samagik_warg=="अनुसूचित जाति"){ echo 'selected'; } ?>>अनुसूचित जाति, </option>
                            <option value="अनुसूचित जनजाति"<?php if($eqndet->samagik_warg=="अनुसूचित जनजाति"){ echo 'selected'; } ?>>अनुसूचित जनजाति, </option>
                            <option value="अन्य पिछड़ा वर्ग"<?php if($eqndet->samagik_warg=="अन्य पिछड़ा वर्ग"){ echo 'selected'; } ?>>अन्य पिछड़ा वर्ग, </option>
                            <option value="सामान्य"<?php if($eqndet->samagik_warg=="सामान्य"){ echo 'selected'; } ?>>सामान्य,</option>
                                    </select> 
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>आर्थिक श्रेणी</label>
                                    <select class="select2" name="arthik_shreni">
                                        <option value=""></option>
                                        <option value="APL"<?php if($eqndet->arthik_shreni=="APL"){ echo 'selected'; } ?>>APL</option>
                                        <option value="BPL"<?php if($eqndet->arthik_shreni=="BPL"){ echo 'selected'; } ?>>BPL</option>
                                        <option value="Other"<?php if($eqndet->arthik_shreni=="Other"){ echo 'selected'; } ?>>Other (please specify)</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>मुखिया वर्गीकरण</label>
                                    <select class="select2" name="mukhiya_vivran">
                                        <option value=""></option>
                                         <option value="महिला मुखिया"<?php if($eqndet->mukhiya_vivran=="महिला मुखिया"){ echo 'selected'; } ?>>महिला मुखिया,</option>
                             <option value="दिव्यांग मुखिया"<?php if($eqndet->mukhiya_vivran=="दिव्यांग मुखिया"){ echo 'selected'; } ?>>दिव्यांग मुखिया, </option>
                             <option value="भूमिहीन"<?php if($eqndet->mukhiya_vivran=="भूमिहीन"){ echo 'selected'; } ?>>भूमिहीन,</option>
                             <option value="वन अधिकार पट्टाधारी"<?php if($eqndet->mukhiya_vivran=="वन अधिकार पट्टाधारी"){ echo 'selected'; } ?>>वन अधिकार पट्टाधारी, </option>
                             <option value="विशेष संरक्षित पिछड़ी जन जाति"<?php if($eqndet->mukhiya_vivran=="विशेष संरक्षित पिछड़ी जन जाति"){ echo 'selected'; } ?>>विशेष संरक्षित पिछड़ी जन जाति,</option>
                             <option value="उपरोक्त मेें शामिल नही"<?php if($eqndet->mukhiya_vivran=="उपरोक्त मेें शामिल नही"){ echo 'selected'; } ?>>उपरोक्त मेें शामिल नही</option>
                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-12 form-group">
                                    <label>एस.ई.सी.सी. 2011 के सर्वेक्षण अनुसार डिप्रिवेशन श्रेणी में शामिल है।</label>
                                    <select class="select2" name="s_e_c_c">
                                        <option value=""></option>
                    <option value="Yes"<?php if($eqndet->s_e_c_c=="Yes"){ echo 'selected'; } ?>>Yes</option>
                    <option value="No"<?php if($eqndet->s_e_c_c=="No"){ echo 'selected'; } ?>>No</option>
                    <option value="None"<?php if($eqndet->s_e_c_c=="None"){ echo 'selected'; } ?>>पता नही</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>एस.ई.सी.सी. 2011 के सर्वेक्षण अनुसार वर्गीकरण</label>

                    <select class="select2"  name="s_e_c_c_servekshan" style="width: auto;"><option value=""></option><option value="डी 1: कच्चों दिवारों और कच्ची छत के साथ केवल 01 कमरे में रहने वाला परिवार"<?php if($eqndet->s_e_c_c_servekshan=="डी 1: कच्चों दिवारों और कच्ची छत के साथ केवल 01 कमरे में रहने वाला परिवार"){ echo 'selected'; } ?>>डी 1: कच्चों दिवारों और कच्ची छत के साथ केवल 01 कमरे में रहने वाला परिवार,</option><option value="डी 2: घर में 16 से 59 उम्र के सदस्य घर में नही हो"<?php if($eqndet->s_e_c_c_servekshan=="डी 2: घर में 16 से 59 उम्र के सदस्य घर में नही हो"){ echo 'selected'; } ?>>डी 2: घर में 16 से 59 उम्र के सदस्य घर में नही हो,</option><option value="डी 3: महिला मुखिया परिवार जिनके घर में 16 से 59 उम्र के बीच का वयस्क पुरूष नही हो"<?php if($eqndet->s_e_c_c_servekshan=="डी 3: महिला मुखिया परिवार जिनके घर में 16 से 59 उम्र के बीच का वयस्क पुरूष नही हो"){ echo 'selected'; } ?>>डी 3: महिला मुखिया परिवार जिनके घर में 16 से 59 उम्र के बीच का वयस्क पुरूष नही हो,</option><option value="डी 4: निशक्त व्यक्ति वाले परिवार जिनके घर में वयस्क व्यक्ति नही हो"<?php if($eqndet->s_e_c_c_servekshan=="डी 4: निशक्त व्यक्ति वाले परिवार जिनके घर में वयस्क व्यक्ति नही हो"){ echo 'selected'; } ?>>डी 4: निशक्त व्यक्ति वाले परिवार जिनके घर में वयस्क व्यक्ति नही हो</option></select>

                                </div>
                                <div class="col-xl-8 col-lg-6 col-12 form-check">
                                    <h6 style="margin-bottom: 5px;">हितग्राही के पास उपलब्ध दस्तावेज</h6>
                                    <input type="checkbox" name="hitgrahi_adhar" <?php if($eqndet->hitgrahi_adhar=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">आधार कार्ड</label>


                                    <input type="checkbox" <?php if($eqndet->hitgrahi_voter_id=="मतदाता आई.डी."){ echo 'checked';} ?> class="form-check-input" value="मतदाता आई.डी." name="hitgrahi_voter_id" id="hitgrahi_voter_id"><label class="form-check-label">मतदाता आई.डी.
                                    </label>


                                    <input type="checkbox" <?php if($eqndet->hitgrahi_rashan=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">राशन कार्ड</label>
                                    <input type="checkbox" <?php if($eqndet->hitgrahi_jati_praman=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">जाति प्रमाण पत्र</label>
                                    <input type="checkbox" <?php if($eqndet->hitgrahi_nivas_praman=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">निवास प्रमाण पत्र</label>
                                    <input type="checkbox" <?php //if($eqndet->hitgrahi_nivas_praman=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">जन्म प्रमाण पत्र</label><br>
                                    <input type="checkbox" <?php if($eqndet->hitgrahi_janam=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">मनरेगा जॉब कार्ड</label>
                                    <input type="checkbox" <?php if($eqndet->hitgrahi_manrega=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">समग्र आई.डी.</label>
                                    <input type="checkbox" <?php if($eqndet->hitgrahi_samagra=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">बैंक खाता</label>
                                    <input type="checkbox" <?php if($eqndet->hitgrahi_bank=="1"){ echo 'checked';} ?> class="form-check-input">
                                    <label class="form-check-label">हितग्राही के कृषि भूमि दस्तावेज</label>
                                    <input type="checkbox"  type="checkbox" <?php if($eqndet->hitgrahi_krishi_bhumi=="1"){ echo 'checked';} ?> class="form-check-input">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>क्रमांक</label>
                                    <input type="text" name="pahechan_patra_kramank" value="<?php echo $eqndet->pahechan_patra_kramank; ?>" placeholder="" >
                                </div>

                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <h6 style="margin-bottom: 5px;">आपके पास निम्नलिखित सुविधायें है ?</h6>
                                    <input name="pani_ki_suvidha_hetu_jal" value="1" <?php if ($eqndet->pani_ki_suvidha_hetu_jal=="1"){echo'checked';} ?> type="checkbox" class="form-check-input">
                                    <label class="form-check-label">पानी की सुविधा हेतु घर में नल जल कनेक्शन,</label>
                                    <input name="pani_ki_suvidha_hetu_ghar" value="1" <?php if ($eqndet->pani_ki_suvidha_hetu_ghar=="1"){echo'checked';} ?> type="checkbox" class="form-check-input">
                                    <label class="form-check-label">पानी की सुविधा हेतु घर में स्वयं का बोर /टयुबवेल</label>
                                    <input <?php if ($eqndet->upyogi_shochalay=="1"){echo'checked';} ?> type="checkbox" class="form-check-input" value="1" name="upyogi_shochalay" >
                                    <label class="form-check-label">उपयोगी शौचालय</label>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>क्या आप प्रवासी मजदूर है ?</label>
                                    <select class="select2" name="pravasi_majdoor">
                                        <option value=""></option>
                            <option value="Yes" <?php if ($eqndet->pravasi_majdoor=="Yes"){ echo 'selected'; } ?> >Yes</option>
                            <option value="No" <?php if ($eqndet->pravasi_majdoor=="No"){ echo 'selected'; } ?> >No</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>पलायन का स्वरूप</label>
                          <select name="pechan_ka_svaroop" id="pechan_ka_svaroop"  >
                              <option value=""></option>
                              <option value="सिजनल/मौसमी"<?php if ($eqndet->pechan_ka_svaroop=="सिजनल/मौसमी") { echo 'selected'; } ?>>सिजनल/मौसमी</option>
                              <option value="हमेशा के लिये"<?php if ($eqndet->pechan_ka_svaroop=="हमेशा के लिये") { echo 'selected'; } ?>>हमेशा के लिये</option>
                            </select>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>पलायन की अवधि ?</label>
                                    <select class="select2"  name="palayan_ki_awdhi1" onchange="palayan_ki_awdhi1(this.value);" style="width: auto;"><option value=""></option>
                                      <option value="3 माह"<?php if ($eqndet->palayan_ki_awdhi1=="3 माह"){echo'selected';} ?>>3 माह </option>
                                      <option value="6 माह"<?php if ($eqndet->palayan_ki_awdhi1=="6 माह"){echo'selected';} ?>>6 माह </option>
                                      <option value="9 माह"<?php if ($eqndet->palayan_ki_awdhi1=="9 माह से अधिक"){echo'selected';} ?>>9 माह </option>
                                      <option value="9 माह से अधिक"<?php if ($eqndet->palayan_ki_awdhi1=="9 माह से अधिक"){echo'selected';} ?>>9 माह से अधिक</option>
                                      <option value="other"<?php if ($eqndet->palayan_ki_awdhi1=="other"){echo'selected';} ?>>Other (please specify)</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>पलायन का स्थान</label>
                                    
                        <select  name="palayan_ka_sthan"   >
                          <option value=""></option>
                          <option value="जिले के अंदर"<?php if ($eqndet->palayan_ka_sthan=="जिले के अंदर") { echo 'selected';
                          } ?>>जिले के अंदर</option>
                          <option value="जिले के बाहर"<?php if ($eqndet->palayan_ka_sthan=="जिले के बाहर") { echo 'selected';
                          } ?>>जिले के बाहर </option>
                          <option value="राज्य के बाहर"<?php if ($eqndet->palayan_ka_sthan=="राज्य के बाहर") { echo 'selected';
                          } ?>>राज्य के बाहर</option>
                          <option value="Other"<?php if($eqndet->palayan_ka_sthan=="Other"){ echo 'selected';} ?>>Other (please specify)</option></select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>पलायन की अवधि ?</label>
                                    <select class="select2" name="palayan_ki_awdhi">
                                        <option value=""></option>
                                        <option value="3 माह"<?php if ($eqndet->palayan_ki_awdhi=="3 माह") { echo 'selected';} ?>>3 माह </option>
                                        <option value="6 माह"<?php if ($eqndet->palayan_ki_awdhi=="6 माह") { echo 'selected';} ?>>6 माह </option>
                                        <option value="9 माह"<?php if ($eqndet->palayan_ki_awdhi=="9 माह") { echo 'selected';} ?>>9 माह </option>
                                        <option value="9 माह से अधिक"<?php if ($eqndet->palayan_ki_awdhi=="9 माह से अधिक") { echo 'selected';} ?>>9 माह से अधिक</option>
                                        <option value="other"<?php if ($eqndet->palayan_ki_awdhi=="other") { echo 'selected';} ?>>Other (please specify)</option>
                                     </select>
                                </div>
                                
                            </div>
                        
                    </div>

                    <hr>

                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>3. कौन सी योजना का लाभ नही मिला</h3>
                            </div>
                        </div>
                        
                            <div class="row" style="margin-bottom: 30px;">
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox"  value="1" name="shram_vibhag" <?php if ($eqndet->shram_vibhag=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">श्रम विभाग की योजना</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" name="kisan_samany" value="1"  <?php if ($eqndet->kisan_samany=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">किसान सम्मान निधि</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" value="1" name="rajiv_gandhi_kisan"  <?php if ($eqndet->rajiv_gandhi_kisan=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">राजीव गांधी किसान न्याय योजना (CG)</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" value="1" name="pds"  <?php if ($eqndet->pds=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">PDS से राशन सामग्री</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" value="1" name="manrega_k_antargat" <?php if ($eqndet->manrega_k_antargat=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">मनरेगा के अन्तर्गत काम / निजी भूमि पर कार्य</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" value="1" name="pension_yojna"  <?php if ($eqndet->pension_yojna=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">पेंशन योजना</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" value="1" name="pradhan_mantri_aawas"  <?php if ($eqndet->pradhan_mantri_aawas=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">प्रधान मंत्री आवास योजना</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" value="1" name="dr_khubchand" <?php if ($eqndet->dr_khubchand=="1") {echo 'checked'; } ?> class="form-check-input">
                                    <label class="form-check-label">डॉ. खुबचंद बघेल स्वास्थ्य सहायता योजना (CG)</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-check">
                                    <input type="checkbox" value="1"  <?php if ($eqndet->mukhya_mantri=="1") {echo 'checked'; } ?> name="mukhya_mantri" class="form-check-input">
                                    <label class="form-check-label">मुख्य मंत्री विशेष स्वास्थ्य सहायता योजना (CG)</label>
                                </div>   

                                <div class="col-xl-12 col-lg-12 col-12" style="border-top: 2px solid #fff; margin-bottom: 20px; margin-top: 10px;"></div>





                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h5>1.श्रम विभाग की योजना</h5>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">  <label>श्रम पंजीयन पत्र</label>
                                      <select class="select2" name="shrm_panjiyan_star" onchange="shram1(this.value);">
                                        <option value=""></option>
                                        <option value="Yes"<?php if ($eqndet->shrm_panjiyan_star=="Yes") { echo 'selected'; } ?>>Yes</option>
                                        <option value="No"<?php if ($eqndet->shrm_panjiyan_star=="No") { echo 'selected'; } ?>>No</option>
                                      </select>
                                </div> 
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>क्या आपने श्रम विभाग की योजना में आवेदन किया है ?</label>
                                    <select class="select2" name="shrm_vibhag_ki_yojna_me_nivedan_kiya_he">
                                        <option value=""></option>
                                        <option value="Yes"<?php if ($eqndet->shrm_vibhag_ki_yojna_me_nivedan_kiya_he=="Yes") { echo 'selected'; } ?>>Yes</option>
                                        <option value="No"<?php if ($eqndet->shrm_vibhag_ki_yojna_me_nivedan_kiya_he=="No") { echo 'selected'; } ?>>No</option>
                                    </select>
                                </div>                      
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>श्रम पंजीयन पत्र क्यों नही है ?</label>
                                    <select name="shrm_panjiyan_star_kyo_nahi" class="select2" > 
                                        <option value=""></option>
                                        <option value="श्रम पंजीयन हेतु आवेदन किया है परन्तु अप्राप्त"<?php if ($eqndet->shrm_panjiyan_star_kyo_nahi=="श्रम पंजीयन हेतु आवेदन किया है परन्तु अप्राप्त") { echo 'selected'; } ?> >श्रम पंजीयन हेतु आवेदन किया है परन्तु अप्राप्त</option><option value="कार्यो की पात्रता है परन्तु कार्य प्रमाण पत्र नही"<?php if ($eqndet->shrm_panjiyan_star_kyo_nahi=="कार्यो की पात्रता है परन्तु कार्य प्रमाण पत्र नही") { echo 'selected'; } ?> >कार्यो की पात्रता है परन्तु कार्य प्रमाण पत्र नही</option><option value="कार्य प्रमाण पत्र है परन्तु पंजीयन हेतु आवेदन नही किया गया है"<?php if ($eqndet->shrm_panjiyan_star_kyo_nahi=="कार्य प्रमाण पत्र है परन्तु पंजीयन हेतु आवेदन नही किया गया है") { echo 'selected'; } ?> >कार्य प्रमाण पत्र है परन्तु पंजीयन हेतु आवेदन नही किया गया है</option> 
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <h6 style="margin-bottom: 5px;">श्रम विभाग में कौन सी योजना के लिये आवदेन किया ?</h6>
                      
                                  <label class="form-check-label" >
                                    <input type="checkbox" class="form-check-input" id="y1" name="suraksha_samagri" value="1" <?php if ($eqndet->suraksha_samagri=="1"){ echo 'checked'; } ?> >सुरक्षा सामग्री
                                  </label>
                                  <label class="form-check-label" >
                                    <input type="checkbox" class="form-check-input" name="sahayak_samagri" value="1" <?php if ($eqndet->sahayak_samagri =="1"){ echo 'checked'; } ?> >सहायक सामग्री
                                  </label>
                                  <div class="clearfix"></div>
                                  <label class="form-check-label" >
                                    <input type="checkbox" class="form-check-input" name="baccho_ko_schlorship" value="1" <?php if ($eqndet->baccho_ko_schlorship=="1"){ echo 'checked'; } ?> >बच्चों को स्कॉलरशिप
                                  </label>
                                  <label class="form-check-label" >
                                    <input type="checkbox" class="form-check-input" name="cycle" value="1" <?php if($eqndet->cycle=="1"){ echo 'checked'; } ?> >साइकिल
                                  </label>
                                  <label class="form-check-label" >
                                    <input type="checkbox" class="form-check-input" name="durghatna_bima" value="1" <?php if ($eqndet->durghatna_bima =="1"){ echo 'checked'; } ?> >दुर्घटना बिमा
                                  </label>
                                  <div class="clearfix"></div>
                                  
                                  <label class="form-check-label" >
                                    <input type="checkbox" class="form-check-input" name="mrittu_rahat_rashi" value="1" <?php if ($eqndet->mrittu_rahat_rashi=="1"){ echo 'checked'; } ?> >मृत्यु राहत राशि
                                  </label>
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="shram_vibhag_other" id="shram_vibhag_other" value="1" <?php if ($eqndet->shram_vibhag_other=="1"){ echo 'checked'; } ?>  >Other (please specify)
                                  </label>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-6 col-12 row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Other (please specify)</label>
                                    <input type="text" name="shram_vibhag_other_value" value="<?php echo $eqndet->shram_vibhag_other_value; ?>" placeholder="" >
                                </div>
 
                                <div class="col-xl-3 col-lg-12 col-12 form-group">
                                    <label>आवेदन का दिनांक</label>
                                    <input type="text" name="aawedan_ki_dinank" value="<?php if($eqndet->aawedan_ki_dinank!='1970-01-01' && $eqndet->aawedan_ki_dinank!='' && $eqndet->aawedan_ki_dinank!=null){ echo date('d-m-Y',strtotime($eqndet->aawedan_ki_dinank)); } ?>"  class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                                    <i class="far fa-calendar-alt"></i>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>आवेदन कहा प्रस्तुत किया ?</label>
                                    <input type="text" name="aawedan_kaha_prastut_kiya" value="<?php echo $eqndet->aawedan_kaha_prastut_kiya; ?>" placeholder="" >
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>योजना से अब तक लाभ क्यों नही मिला ?</label>
                                    <textarea class="textarea form-control" name="yojna_se_ab_tk_labh_kyo_nhi_mila" cols="6" rows="3" autocomplete="off"><?php echo $eqndet->yojna_se_ab_tk_labh_kyo_nhi_mila; ?></textarea>
                                </div>
                            </div>



                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h5>2.किसान सम्मान निधि</h5>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>किसान सम्मान निधि पोर्टल पर पंजीकृत है ?</label>
                                       
                                    <select name="kisan_samany_nidhi_portal" class="select2" ><option value=""></option>
                                    <option value="हॉ"<?php if ($eqndet->kisan_samany_nidhi_portal=="हॉ"){ echo 'selected';
                                    } ?>>हॉ </option><option value="नही"<?php if ($eqndet->kisan_samany_nidhi_portal=="नही"){ echo 'selected';
                                    } ?>>नही </option><option value="पंजीयन हेतु आवदेन किया गया है"<?php if ($eqndet->kisan_samany_nidhi_portal=="पंजीयन हेतु आवदेन किया गया है"){ echo 'selected'; } ?>>पंजीयन हेतु आवदेन किया गया है</option></select>
                                </div><!-- 
                                <div class="col-xl-3 col-lg-6 col-12"> </div>
                                <div class="col-xl-3 col-lg-6 col-12"> </div>  -->
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                           <table class="table" style="border-collapse: separate;"><thead>
                                            <tr><th colspan="2" style="text-align: center;"><label>किसान सम्मान निधि अन्तर्गत किस्त प्राप्ति की स्थिति (2000 प्रत्येक किश्त)</label></th></tr>
                                            <tr> <th>प्रथम किस्त</th><th>द्वितीय किस्त </th><th>तृतीय किस्त</th></tr></thead><tbody><tr>
                                            <td>
                                            <select class="select2" name="kisan_samman_nidhi_antargat1" style="width: auto;"><option value=""></option><option value="पूर्ण प्राप्त"<?php if ($eqndet->kisan_samman_nidhi_antargat1=="पूर्ण प्राप्त"){echo 'selected'; } ?>>पूर्ण प्राप्त</option><option value="कम प्राप्त"<?php if ($eqndet->kisan_samman_nidhi_antargat1=="कम प्राप्त"){echo 'selected'; } ?>>कम प्राप्त</option><option value="प्राप्त नही"<?php if ($eqndet->kisan_samman_nidhi_antargat1=="प्राप्त नही"){echo 'selected'; } ?>>प्राप्त नही </option></select>
                                          </td>
                                            <td>
                                            <select class="select2" name="kisan_samman_nidhi_antargat2" style="width: auto;"><option value=""></option><option value="पूर्ण प्राप्त">पूर्ण प्राप्त</option><option value="कम प्राप्त" <?php if ($eqndet->kisan_samman_nidhi_antargat2=="कम प्राप्त"){echo'selected';} ?>>कम प्राप्त</option><option value="प्राप्त नही" <?php if ($eqndet->kisan_samman_nidhi_antargat2=="प्राप्त नही"){echo'selected';} ?>>प्राप्त नही </option></select>
                                          </td>
                                          <td>
                                            <select class="select2" name="kisan_samman_nidhi_antargat3" style="width: auto;"><option value=""></option><option value="पूर्ण प्राप्त" <?php if ($eqndet->kisan_samman_nidhi_antargat3=="पूर्ण प्राप्त"){echo'selected';} ?>>पूर्ण प्राप्त</option><option value="कम प्राप्त" <?php if ($eqndet->kisan_samman_nidhi_antargat3=="कम प्राप्त"){echo'selected';} ?>>कम प्राप्त</option><option value="प्राप्त नही" <?php if ($eqndet->kisan_samman_nidhi_antargat3=="प्राप्त नही"){echo'selected';} ?>>प्राप्त नही </option></select>
                                          </td>
                                          </tr>
                                          <tr><td colspan="3">
                                          <label>किसान सम्मान निधि अन्तर्गत किस्त क्यों प्राप्त नही हुर्ई</label> <input type="text" name="kisan_samman_nidhi_antargat_kist_kyo_prapt_nhi_hui" value="<?php echo $eqndet->kisan_samman_nidhi_antargat_kist_kyo_prapt_nhi_hui; ?>" > </td></tr>
                                      </tbody>
                                      </table>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row"> 
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>पंजीकरण हेतु आवेदन का विवरण</label> <table class="table" style="border-collapse: separate;"><thead><tr><th></th><th>आवेदन का दिनांक</th><th>आवेदन कहा प्रस्तुत किया ?</th></tr></thead><tbody><tr><td><label></label></td><td> <input type="text" name="aavedan_pranstut_ki_date" value="<?php if($eqndet->aavedan_pranstut_ki_date!='' && $eqndet->aavedan_pranstut_ki_date!='1970-01-01' && $eqndet->aavedan_pranstut_ki_date!=null){ echo date('d-m-Y',strtotime($eqndet->aavedan_pranstut_ki_date)); } ?>" class="form-control air-datepicker" >  </td><td><input type="text"  value="<?php echo $eqndet->aavedan_pranstut_kb_kiya; ?>" name="aavedan_pranstut_kb_kiya" placeholder="  आवेदन कहा प्रस्तुत किया ? "></td></tr></tbody></table> 
                                </div>
                            </div>


                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h5>3.राजीव गांधी किसान न्याय योजना (CG)</h5>
                                </div>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-6 col-lg-6 col-12 form-group"><label>विभाग के पोर्टल पर फसल क्षेत्र एवं फसल का नाम पंजीकृत किया है ?</label> 
                                    <select class="select2" name="vibhag_k_portal_pr_fasal" >
                                        <option value=""></option><option value="हॉ" <?php if ($eqndet->vibhag_k_portal_pr_fasal=="हॉ"){echo'selected';} ?>>हॉ</option><option value="नही" <?php if ($eqndet->vibhag_k_portal_pr_fasal=="नही"){echo'selected';} ?>>नही</option><option value="पंजीकरण हेतु आवेदन किया गया है" <?php if ($eqndet->vibhag_k_portal_pr_fasal=="पंजीकरण हेतु आवेदन किया गया है"){echo'selected';} ?>>पंजीकरण हेतु आवेदन किया गया है</option>
                                    </select>
                                </div><!-- 
                                <div class="col-xl-3 col-lg-6 col-12"> </div>
                                <div class="col-xl-3 col-lg-6 col-12"> </div>  -->
                            </div>


                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group"><label>पंजीकृत फसल  व क्षेत्रफल (Acre)  का विवरण</label>  
                                </div> 
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <table class="table" style="border-collapse: separate;">
                                        <tbody>
                                        <tr><th>धान, </th>
                                          <th>मक्का, </th>
                                          <th>सोयाबिन, </th>
                                          <th>मूंगफली,</th>
                                          <th>तिल </th>
                                          <th>अरहर, </th>
                                          <th>मूंग, </th> 
                                          <th>उड़द, </th> 
                                        </tr>
                                        <tr> <td><input type="number" name="dhan"  lang="en" value="<?php echo $eqndet->dhan; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="makka"  lang="en" value="<?php echo $eqndet->makka; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="soyabeen"  lang="en" value="<?php echo $eqndet->soyabeen; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="mongfali"  lang="en" value="<?php echo $eqndet->mongfali; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="till"  lang="en" value="<?php echo $eqndet->till; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="arhar"  lang="en" value="<?php echo $eqndet->arhar; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="mong"  lang="en" value="<?php echo $eqndet->mong; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="udadh"  lang="en" value="<?php echo $eqndet->udadh; ?>" style="width: 5em;"></td>
                                        </tr>
                                     
                                        <tr> 
                                          <th>कुल्थी</th> 
                                          <th>रामतिल, </th>        
                                          <th>कोदो, </th> 
                                          <th>कुटकी, </th>
                                          <th>रागी </th>
                                          <th>गन्ना</th>
                                        </tr>
                                        <tr>
                                          <td><input type="number" name="kulthi"  lang="en" value="<?php echo $eqndet->kulthi; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="ramtil"  lang="en" value="<?php echo $eqndet->ramtil; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="kodo"  lang="en" value="<?php echo $eqndet->kodo; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="kutki"  lang="en" value="<?php echo $eqndet->kutki; ?>" style="width: 5em;"></td>
                                           <td><input type="number" name="raagi"  lang="en" value="<?php echo $eqndet->raagi; ?>" style="width: 5em;"></td> 
                                           <td><input type="number" name="ganna"  lang="en" value="<?php echo $eqndet->ganna; ?>" style="width: 5em;"></td>
                                        </tr>
                                     </tbody>
                                    </table>
                                </div> 
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group"><label>किस्त प्राप्ति की स्थिति</label>  
                                </div> 
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <table class="table" style="border-collapse: separate;"><thead><tr><th></th><th>प्रथम किस्त</th><th>द्वितीय किस्त </th><th>तृतीय किस्त</th></tr></thead><tbody><tr><td><label></label></td><td><select class="select2" name="vibhag_k_portal_pr_fasal_1_kisht" style="width: auto;"><option value=""></option><option value="पूर्ण प्राप्त"<?php if ($eqndet->vibhag_k_portal_pr_fasal_1_kisht=="पूर्ण प्राप्त"){echo'selected';} ?>>पूर्ण प्राप्त</option><option value="कम प्राप्त"<?php if ($eqndet->vibhag_k_portal_pr_fasal_1_kisht=="कम प्राप्त"){echo'selected';} ?>>कम प्राप्त</option><option value="कम प्राप्त"<?php if ($eqndet->vibhag_k_portal_pr_fasal_1_kisht=="प्राप्त नही"){echo'selected';} ?>>प्राप्त नही </option></select></td><td><select class="select2" name="vibhag_k_portal_pr_fasal_2_kisht" style="width: auto;"><option value=""></option><option value="पूर्ण प्राप्त"<?php if ($eqndet->vibhag_k_portal_pr_fasal_2_kisht=="पूर्ण प्राप्त"){echo'selected';} ?>>पूर्ण प्राप्त</option><option value="कम प्राप्त"<?php if ($eqndet->vibhag_k_portal_pr_fasal_2_kisht=="कम प्राप्त"){echo'selected';} ?>>कम प्राप्त</option><option value="प्राप्त नही"<?php if ($eqndet->vibhag_k_portal_pr_fasal_2_kisht=="प्राप्त नही"){echo'selected';} ?>>प्राप्त नही </option>></select></td><td><select class="select2" name="vibhag_k_portal_pr_fasal_3_kisht" style="width: auto;"><option value=""></option><option value="पूर्ण प्राप्त"<?php if ($eqndet->vibhag_k_portal_pr_fasal_3_kisht=="पूर्ण प्राप्त"){echo'selected';} ?>>पूर्ण प्राप्त</option><option value="कम प्राप्त"<?php if ($eqndet->vibhag_k_portal_pr_fasal_3_kisht=="कम प्राप्त"){echo'selected';} ?>>कम प्राप्त</option><option value="प्राप्त नही"<?php if ($eqndet->vibhag_k_portal_pr_fasal_3_kisht=="प्राप्त नही"){echo'selected';} ?>>प्राप्त नही </option></select></td></tr></tbody></table>
                                </div> 
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group"><label>किस्त क्यों प्राप्त नही हुर्ई</label>  
                                </div> 
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group"> 
                                    <input type="text"  name="vibhag_k_portal_pr_fasal_kisht_prapt_kyo_nhi_hui" id="vibhag_k_portal_pr_fasal_kisht_prapt_kyo_nhi_hui" value="<?php echo $eqndet->vibhag_k_portal_pr_fasal_kisht_prapt_kyo_nhi_hui; ?>">
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group"><label>पंजीकरण हेतु आवेदन का विवरण</label>  
                                </div> 
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group"> 
                                    <table class="table" style="border-collapse: separate;"><thead><tr> <th>आवेदन का दिनांक</th><th>आवेदन कहा प्रस्तुत किया ?</th></tr></thead><tbody><tr> <td><input type="text" name="fasal_aavedan_pranstut_ki_date" class="form-control air-datepicker" placeholder="dd-mm-YY" value="<?php if($eqndet->fasal_aavedan_pranstut_ki_date!='' && $eqndet->fasal_aavedan_pranstut_ki_date!='1970-01-01' && $eqndet->fasal_aavedan_pranstut_ki_date!=null){ echo date('d-m-Y',strtotime($eqndet->fasal_aavedan_pranstut_ki_date)); } ?>"  ></td><td><input type="text"  value="<?php echo $eqndet->fasal_aavedan_pranstut_kb_kiya; ?>" name="fasal_aavedan_pranstut_kb_kiya" placeholder="आवेदन कहा प्रस्तुत किया ? "></td></tr></tbody></table>                      
                                </div> 
                            </div>
 
 



                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h5>4.पेंशन योजना </h5>
                                </div>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-6 col-lg-6 col-12 form-group"><label>विभाग के पोर्टल पर फसल क्षेत्र एवं फसल का नाम पंजीकृत किया है ?</label> 
                                </div><!-- 
                                <div class="col-xl-3 col-lg-6 col-12"> </div>
                                <div class="col-xl-3 col-lg-6 col-12"> </div>  -->
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group">  
                                    <table class="table">
                                        <tr><th>विधवा पेंशन</th></tr>
                                        <tr>  
                                            <td><label>विधवा पेंशन हेतु पंजीकरण ?</label>
                                                <select name="vidhva_pension_hetu_panjikaran" class="select2" style="width: auto;" onchange="pension_yojna_radio_BTN_DIV1_SELECT(this.value);"><option value=""></option><option value="Yes">Yes</option><option value="No" <?php if ($eqndet->vidhva_pension_hetu_panjikaran=="No"){ echo'selected'; } ?> >No</option><option value="विधवा पेंशन हेतु आवेदन किया है ?" <?php if ($eqndet->vidhva_pension_hetu_panjikaran=="विधवा पेंशन हेतु आवेदन किया है ?"){ echo'selected'; } ?> >विधवा पेंशन हेतु आवेदन किया है ?</option></select>
                                            </td>
                                            <td><label>विधवा पेंशन कब से नही मिल रही है ?</label>
                                                <select name="vidhva_pension_kabse_nhi_mili" class="select2" style="width: auto;"><option value=""></option>
                                                    <option value="1 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="1 माह"){echo'selected';} ?>>1 माह</option><option value="2 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="2 माह"){echo'selected';} ?>>2 माह</option><option value="3 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="3 माह"){echo'selected';} ?>>3 माह</option><option value="4 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="4 माह"){echo'selected';} ?>>4 माह</option><option value="5 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="5 माह"){echo'selected';} ?>>5 माह</option><option value="6 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="6 माह"){echo'selected';} ?>>6 माह</option><option value="7 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="7 माह"){echo'selected';} ?>>7 माह</option><option value="8 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="8 माह"){echo'selected';} ?>>8 माह</option><option value="9 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="9 माह"){echo'selected';} ?>>9 माह</option><option value="10 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="10 माह"){echo'selected';} ?>>10 माह</option><option value="11 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="11 माह"){echo'selected';} ?>>11 माह</option><option value="12 माह"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="12 माह"){echo'selected';} ?>>12 माह</option><option value="1 वर्ष से अधिक"<?php if ($eqndet->vidhva_pension_kabse_nhi_mili=="1 वर्ष से अधिक"){echo'selected';
                                                } ?>>1 वर्ष से अधिक</option></select>
                                            </td>
                                            <td><label>विधवा पेंशन क्यों नही मिल रही है ?</label>
                                                <textarea name="vidhva_pension_kyo_nhi_mil_rhi_he"  rows="5"><?php echo $eqndet->vidhva_pension_kyo_nhi_mil_rhi_he; ?></textarea>
                                            </td>
                                       </tr>
                                       <tr>
                                           <td><label>आवेदन का दिनांक</label> <input type="text"  name="vidhva_pension_hetu_avedan_ki_date" placeholder="dd-mm-YY" value="<?php if($eqndet->vidhva_pension_hetu_avedan_ki_date!='' && $eqndet->vidhva_pension_hetu_avedan_ki_date!='1970-01-01' && $eqndet->vidhva_pension_hetu_avedan_ki_date!=null){ echo date('d-m-Y',strtotime($eqndet->vidhva_pension_hetu_avedan_ki_date)); } ?>"> </td>
                                           <td><label>आवेदन कहा प्रस्तुत किया ?</label><input name="vidhva_pension_hetu_avedan_kha_prastut_kiya" type="text"  value="<?php echo $eqndet->vidhva_pension_hetu_avedan_kha_prastut_kiya; ?>" placeholder="आवेदन कहा प्रस्तुत किया ?"></td>
                                       </tr>
                                    </table>
                                </div> 
                            </div>

                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group">  
                                    <table class="table">
                                        <tr><th>वृद्धावस्था पेंशन</th></tr>
                                        <tr>  
                                            <td><label>वृद्धावस्था पेंशन हेतु पंजीकरण ?</label>
                                                <select name="vidhva_pension_hetu_panjikaran_1" class="select2"  ><option value=""></option><option value="Yes"<?php if ($eqndet->vidhva_pension_hetu_panjikaran_1==""){echo'selected';} ?>>Yes</option><option value="No"<?php if ($eqndet->vidhva_pension_hetu_panjikaran_1==""){echo'selected';} ?>>No</option><option value="विधवा पेंशन हेतु आवेदन किया है ?"<?php if ($eqndet->vidhva_pension_hetu_panjikaran_1==""){echo'selected';} ?>>विधवा पेंशन हेतु आवेदन किया है ?</option></select>
                                            </td>
                                            <td><label>वृद्धावस्था पेंशन कब से नही मिल रही है ?</label>
                                                <select name="vradhawastha_pension_kbse_nhi_mil_rhi_he" class="select2" style="width: auto;"><option value=""></option>
                                                    <option value="1 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="1 माह"){echo'selected';} ?>>1 माह</option><option value="2 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="2 माह"){echo'selected';} ?>>2 माह</option><option value="3 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="3 माह"){echo'selected';} ?>>3 माह</option><option value="4 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="4 माह"){echo'selected';} ?>>4 माह</option><option value="5 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="5 माह"){echo'selected';} ?>>5 माह</option><option value="6 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="6 माह"){echo'selected';} ?>>6 माह</option><option value="7 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="7 माह"){echo'selected';} ?>>7 माह</option><option value="8 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="8 माह"){echo'selected';} ?>>8 माह</option><option value="9 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="9 माह"){echo'selected';} ?>>9 माह</option><option value="10 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="10 माह"){echo'selected';} ?>>10 माह</option><option value="11 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="11 माह"){echo'selected';} ?>>11 माह</option><option value="12 माह"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="12 माह"){echo'selected';} ?>>12 माह</option><option value="1 वर्ष से अधिक"<?php if ($eqndet->vradhawastha_pension_kbse_nhi_mil_rhi_he=="1 वर्ष से अधिक"){echo'selected';
                                                } ?>>1 वर्ष से अधिक</option></select>
                                            </td>
                                            <td><label>वृद्धावस्था पेंशन  क्यों नही मिल रही है ?</label>
                                                <textarea name="vradhawastha_pension_kyo_nhi_mil_rhi_he"  rows="5"><?php echo $eqndet->vradhawastha_pension_kyo_nhi_mil_rhi_he; ?></textarea>
                                            </td>
                                       </tr>
                                       <tr>
                                           <td><label>आवेदन का दिनांक</label> <input type="text"  name="vradhawastha_pension_ki_date" placeholder="dd-mm-YY" value="<?php if($eqndet->vradhawastha_pension_ki_date!='' && $eqndet->vradhawastha_pension_ki_date!='1970-01-01' && $eqndet->vradhawastha_pension_ki_date!=null){ echo date('d-m-Y',strtotime($eqndet->vradhawastha_pension_ki_date)); } ?>"> </td>
                                           <td><label>आवेदन कहा प्रस्तुत किया ?</label><input name="vradhawastha_pension_hetu_avedan_kha_prastut_kiya" type="text"  value="<?php echo $eqndet->vradhawastha_pension_hetu_avedan_kha_prastut_kiya; ?>" placeholder="आवेदन कहा प्रस्तुत किया ?"></td>
                                       </tr>
                                    </table>
                                </div> 
                            </div>
                             <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-12 col-lg-12 col-12 form-group">  
                                    <table class="table">
                                        <tr><th>दिव्यांग पेंशन हेतु  पंजीकरण ?</th></tr>
                                        <tr>  
                                            <td><label>दिव्यांग पेंशन हेतु  पंजीकरण ?</label>
                                                <select name="vidhva_pension_hetu_panjikaran_2" class="select2"  ><option value=""></option><option value="हॉ" <?php if ($eqndet->vidhva_pension_hetu_panjikaran_2=="हॉ"){echo'selected';} ?>>हॉ</option><option value="नही" <?php if ($eqndet->vidhva_pension_hetu_panjikaran_2=="नही"){echo'selected';} ?>>नही</option></select>
                                            </td>
                                            <td><label>दिव्यांग पेंशन कब से नही मिल रही है ?</label>
                                                <select name="divyaang_pension_kbse_nhi_mil_rhi_he_1" class="select2" style="width: auto;"><option value=""></option><option value="1 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="1 माह"){echo'selected';} ?>>1 माह</option><option value="2 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="2 माह"){echo'selected';} ?>>2 माह</option><option value="3 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="3 माह"){echo'selected';} ?>>3 माह</option><option value="4 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="4 माह"){echo'selected';} ?>>4 माह</option><option value="5 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="5 माह"){echo'selected';} ?>>5 माह</option><option value="6 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="6 माह"){echo'selected';} ?>>6 माह</option><option value="7 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="7 माह"){echo'selected';} ?>>7 माह</option><option value="8 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="8 माह"){echo'selected';} ?>>8 माह</option><option value="9 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="9 माह"){echo'selected';} ?>>9 माह</option><option value="10 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="10 माह"){echo'selected';} ?>>10 माह</option><option value="11 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="11 माह"){echo'selected';} ?>>11 माह</option><option value="12 माह"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="12 माह"){echo'selected';} ?>>12 माह</option><option value="1 वर्ष से अधिक"<?php if ($eqndet->divyaang_pension_kbse_nhi_mil_rhi_he_1=="1 वर्ष से अधिक"){echo'selected';
                                                } ?>>1 वर्ष से अधिक</option></select>
                                            </td>
                                            <td><label>दिव्यांग पेंशन क्यों नही मिल रही है ?</label>
                                                <textarea name="divyaang_pension_kyo_nhi_mil_rhi_he"  rows="5"><?php echo $eqndet->divyaang_pension_kyo_nhi_mil_rhi_he; ?></textarea>
                                            </td>
                                            <td><label>क्या आपके पास 40 % दिव्यांगता का प्रमाण पत्र है ?</label>
                                                <select name="kya_aapke_paas_divyang_ka_praman_patra_hai" class="select2" id="kya_aapke_paas_divyang_ka_praman_patra_hai" ><option value=""></option><option value="Yes"<?php if ($eqndet->kya_aapke_paas_divyang_ka_praman_patra_hai==""){echo'selected';} ?>>Yes</option><option value="No"<?php if ($eqndet->kya_aapke_paas_divyang_ka_praman_patra_hai==""){echo'selected';} ?>>No</option></select>
                                            </td>
                                       </tr>
                                       <tr>
                                       <td><label>दिव्यांग पेंशन हेतु आवेदन किया है ?</label>  <select name="kya_aapke_paas_divyang_patra_hetu_aavedan_kiya_hai" class="select2" style="width: auto;"><option value=""></option><option value="Yes"<?php if ($eqndet->kya_aapke_paas_divyang_patra_hetu_aavedan_kiya_hai==""){echo'selected';} ?>>Yes</option><option value="No"<?php if ($eqndet->kya_aapke_paas_divyang_patra_hetu_aavedan_kiya_hai==""){echo'selected';} ?>>No</option></select>
                                       </td>
                                           <td><label>आवेदन का दिनांक</label> <input type="text"  name="kya_aapke_paas_divyang_ka_praman_patra_prastut_ki_date" placeholder="dd-mm-YY" value="<?php if($eqndet->kya_aapke_paas_divyang_ka_praman_patra_prastut_ki_date!='1970-01-01' && $eqndet->kya_aapke_paas_divyang_ka_praman_patra_prastut_ki_date!=null && $eqndet->kya_aapke_paas_divyang_ka_praman_patra_prastut_ki_date!=''){ echo date('d-m-Y',strtotime($eqndet->kya_aapke_paas_divyang_ka_praman_patra_prastut_ki_date)); } ?>"> </td>
                                           <td><label>आवेदन कहा प्रस्तुत किया ?</label><input name="divyang_pension_k_liye_awedan_kb_kiya" type="text"  value="<?php echo $eqndet->divyang_pension_k_liye_awedan_kb_kiya; ?>" placeholder="आवेदन कहा प्रस्तुत किया ?"></td>
                                       </tr>
                                    </table>
                                </div> 
                            </div>


                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h5>5.प्रधान मंत्री आवास योजना </h5>
                                </div>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-3 col-lg-6 col-12 form-group"><label>प्रधान मंत्री आवास की स्वीकृति ?</label> 
                                    <select name="pradhan_mantri_aawas_kiswikrati" class="select2"><option value=""></option><option value="प्रतिक्षा सूची में है परन्तु स्वीकृत नही"<?php if ($eqndet->pradhan_mantri_aawas_kiswikrati=="प्रतिक्षा सूची में है परन्तु स्वीकृत नही"){echo'selected';} ?> >प्रतिक्षा सूची में है परन्तु स्वीकृत नही</option><option value="स्वीकृत है"<?php if ($eqndet->pradhan_mantri_aawas_kiswikrati=="स्वीकृत है"){echo'selected';} ?> >स्वीकृत है</option></select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12"> <table>
                                    <tr><th colspan="3">कौन सी किस्त प्राप्त नही हुई</th></tr>
                                    <tr><td><label class="choice touch-checkbox"> <input type="checkbox" class="hai" value="1" name="paling" id="paling"<?php if ($eqndet->paling=='1'){echo'selected';} ?>>  प्लिंथ : प्रथम किस्त</label></td> <td><label onclick="hai_check();" class="choice touch-checkbox"> <input type="checkbox" class="hai" name="chatt" value="1" id="chatt"<?php if ($eqndet->chatt=='1'){echo'selected';
                                    } ?>>  छत : द्वितीय किस्त</label></td> <td><label onclick="hai_check();" class="choice touch-checkbox"> <input type="checkbox" class="hai" value="1" name="makan" id="makan"<?php if ($eqndet->makan=='1'){echo'selected';
                                    } ?>>  मकान पूर्ण : तृतीय किस्त</label></td></tr>
                                </table>  </div>
 
                                <div class="col-xl-3 col-lg-6 col-12"> <label>किस्त क्यों प्राप्त नही हुई ?</label><select name="pradhan_mantri_aawas_kisht_prapt_hui" class="select2" ><option value=""></option><option value="पूर्णत: प्रमाण पत्र नही"<?php if ($eqndet->pradhan_mantri_aawas_kisht_prapt_hui=="पूर्णत: प्रमाण पत्र नही"){echo'selected';} ?>>पूर्णत: प्रमाण पत्र नही</option><option value="Other"<?php if ($eqndet->pradhan_mantri_aawas_kisht_prapt_hui=="Other"){echo'selected';} ?>>Other (please specify)</option></select> </div> 

                            </div>

                            <div class="col-xl-12 col-lg-12 col-12">

                                <div class="col-xl-12 col-lg-6 col-12">
                                      <textarea  id="input" name="pradhan_mantri_aawas_kisht_prapt_hui_other" rows="5"><?php echo $eqndet->pradhan_mantri_aawas_kisht_prapt_hui_other; ?></textarea> 
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <label>आवास प्रतिक्षा सूची में नाम है परन्तु स्वीकृत क्यों नही हुआ है ?</label>
                                <div class="col-xl-12 col-lg-6 col-12">
                                    <textarea name="pradhan_mantri_aawas_suchi_me_name_hai" class="form-group" id="input" rows="5"><?php echo $eqndet->pradhan_mantri_aawas_suchi_me_name_hai; ?></textarea>
                                </div>
                            </div>

                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h5>6. डॉ. खुबचंद बघेल स्वास्थ्य सहायता योजना (CG) </h5>
                                </div>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12 row"> 
                                <div class="col-xl-12 col-lg-12 col-12 form-group"> 
                                        <input type="text"  name="dr_khubchand_bghel_swastye_DIV_NO" value="<?php echo $eqndet->dr_khubchand_bghel_swastye_DIV_NO; ?>" >
                                </div>
                            </div>

 



                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h5>7.मुख्य मंत्री विशेष स्वास्थ्य सहायता योजना (CG) </h5>
                                </div>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-12 row">  
                                <div class="col-xl-3 col-lg-3 col-12 form-group"><label>दुर्लभ बिमारी इलाज हेतु क्या आपने आवेदन किया है ?</label> 
                                    <select name="mukhya_mantri_durlabh_ilaj_k_liye_aapne_avwdan_kiya_hai"   class="select2"><option value=""></option><option value="Yes"<?php if ($eqndet->mukhya_mantri_durlabh_ilaj_k_liye_aapne_avwdan_kiya_hai==""){echo'selected';} ?>>Yes</option><option value="No"<?php if ($eqndet->mukhya_mantri_durlabh_ilaj_k_liye_aapne_avwdan_kiya_hai==""){echo'selected';} ?>>No</option></select>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-12 row">
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <table class="table">
                                        <tr> <td colspan="3"><label>इलाज हेतु आवेदन का विवरण</label></td> </tr> 
                                        <tr><th>आवेदन का दिनांक</th><th>आवेदन कहा प्रस्तुत किया ?</th> <th>अभी तक इलाज क्यों नही हुआ ? </th>  </tr></thead><tbody><tr><td><input name="mukhya_mantri_aawedan_ki_date" type="text"  class="form-control air-datepicker" data-position="bottom right" autocomplete="off" value="<?php if($eqndet->mukhya_mantri_aawedan_ki_date!='' && $eqndet->mukhya_mantri_aawedan_ki_date!='1970-01-01' && $eqndet->mukhya_mantri_aawedan_ki_date!=null){ echo date('d-m-Y',strtotime($eqndet->mukhya_mantri_aawedan_ki_date)); } ?>" ></td><td><input name="mukhya_mantri_aawedan_kiya_vivran" type="text"  value="<?php echo $eqndet->mukhya_mantri_aawedan_kiya_vivran; ?>"></td> <td><textarea  id="" name="mukhya_mantri_abi_tak_ilaj_kyo_nhi_hua" rows="5"><?php echo $eqndet->mukhya_mantri_abi_tak_ilaj_kyo_nhi_hua; ?></textarea></td> </tr></tbody>
                                    </table>
 
 
                                    <table style="border-collapse: separate;"><thead></table>


                                </div>
                            </div>
                                <div class="col-xl-3 col-lg-6 col-12"> </div>  
                            </div>


                            <div class="col-xl-12 col-lg-12 col-12" style="border-top: 2px solid #fff; margin-bottom: 20px;"></div>




                                <div class="col-xl-12 col-lg-12 col-12 row">
                                    <div class="col-xl-4 col-lg-6 col-12">
                                        <label>Status</label>
                                        <select class="select2" name="status">
                                            <option value="0"<?php if ($eqndet->status=="0"){ echo 'selected'; } ?>>Filled</option>
                                            <option value="1"<?php if ($eqndet->status=="1"){ echo 'selected'; } ?>>In Process</option>
                                            <option value="2"<?php if ($eqndet->status=="2"){ echo 'selected'; } ?>>Completed</option>
                                            <option value="3"<?php if ($eqndet->status=="3"){ echo 'selected'; } ?>>Reject</option>
                                        </select>
                                    </div>



                                    <div class="col-xl-3 col-lg-6 col-12">
                                        <label>Update Date</label>
                                        <input type="text" readonly="" name="update_date" value="<?php echo date("d-m-Y"); ?>" placeholder="" >
                                    </div>

 


                                </div>

   
<br><br><br>

 

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                                
                            </div>
                    </div>
                </form>

                </div>
                <!-- Admit Form Area End Here -->

<!-- Teacher Table Area End Here -->
