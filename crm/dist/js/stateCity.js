/*<div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>State:</label>
                                             <select class="select2 form-control" name="customerState" required=""  id="state">
                                                <option value="" disabled="">---select---</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>State Code:</label>
                                             <select class="select2 form-control" name="customerStateCode" id="stateCode" required="" >
                                                <option value="" disabled="">---select---</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group col-sm-4 mb-2">
                                          <div class="form-group">
                                            <label>City:</label>
                                             <select class="select2 form-control" name="customerCity"  required="" id="stateCity">
                                                <option value="" disabled="">---select---</option>
                                            </select>
                                          </div>
                                        </div>*/



var lookup = {

   'Andhra Pradesh': ['Adoni', 'Amalapuram', 'Anakapalle', 'Anantapur', 'Bapatla', 'Bheemunipatnam', 'Bhimavaram', 'Bobbili', 'Chilakaluripet', 'Chirala', 'Chittoor', 'Dharmavaram', 'Eluru', 'Gooty', 'Gudivada', 'Gudur', 'Guntakal', 'Guntur', 'Hindupur', 'Jaggaiahpet', 'Jammalamadugu', 'Kadapa', 'Kadiri', 'Kakinada', 'Kandukur', 'Kavali', 'Kovvur', 'Kurnool', 'Macherla', 'Machilipatnam', 'Madanapalle', 'Mandapeta', 'Markapur', 'Nagari', 'Naidupet', 'Nandyal', 'Narasapuram', 'Narasaraopet','Narsipatnam', 'Nellore', 'Nidadavole', 'Nuzvid', 'Ongole', 'Palacole', 'Palasa Kasibugga', 'Parvathipuram', 'Pedana', 'Peddapuram', 'Pithapuram', 'Ponnur', 'Proddatur', 'Punganur', 'Puttur', 'Rajahmundry', 'Rajam', 'Rajampet', 'Ramachandrapuram', 'Rayachoti', 'Rayadurg', 'Renigunta', 'Repalle', 'Salur', 'Samalkot', 'Sattenapalle', 'Srikakulam', 'Srikalahasti', 'Srisailam Project (Right Flank Colony) Township', 'Sullurpeta', 'Tadepalligudem', 'Tadpatri', 'Tanuku', 'Tenali', 'Tirupati', 'Tiruvuru', 'Tuni', 'Uravakonda', 'Venkatagiri', 'Vijayawada', 'Vinukonda', 'Visakhapatnam', 'Vizianagaram', 'Yemmiganur', 'Yerraguntla', 'Other'],
   
   'Arunachal Pradesh': ['Naharlagun', 'Pasighat', 'Other'],

   'Assam': ['Bongaigaon City', 'Dhubri', 'Diphu', 'North', 'Lakhimpur', 'Tezpur', 'Karimganj', 'Sibsagar', 'Goalpara', 'Barpeta', 'Lanka', 'Lumding', 'Mankachar', 'Nalbari', 'Rangia', 'Margherita', 'Mangaldoi', 'Silapathar', 'Mariani', 'Marigaon', 'Other'],

   'Bihar': ['Araria', 'Arrah', 'Arwal', 'Asarganj', 'Begusarai', 'Bettiah', 'BhabUrban', 'Agglomeration', ' Bhagalpur', 'Buxar', 'Chhapra', 'Darbhanga', 'Dehri-on-Sone', 'Dumraon', 'Forbesganj', 'Gaya', 'Gopalganj',  'Hajipur', 'Jamalpur',  'Jamui', 'Jehanabad', 'Katihar', 'Kishanganj', 'Lakhisarai', 'Lalganj',' Madhepura', 'Madhubani', 'Maharajganj', 'Mahnar', 'Bazar', 'Makhdumpur', 'Maner', 'Manihari', 'Marhaura',' Masaurhi', 'Mirganj', 'Mokameh', 'Motihari', 'Motipur', 'Munger', 'Murliganj', 'Muzaffarpur', 'Narkatiaganj', 'Naugachhia', 'Nawada', 'Nokha', 'Patna', 'Piro', 'Purnia', 'Rafiganj', 'Rajgir', 'Ramnagar', 'Raxaul', 'Bazar', 'Revelganj', 'Rosera', 'Saharsa', 'Samastipur', 'Sasaram', 'Sheikhpura', 'Sheohar', 'Sherghati', 'Silao', 'Sitamarhi', 'Siwan', 'Sonepur', 'Sugauli', 'Sultanganj', 'Supaul', 'Warisaliganj', 'Other'],

   'Chhattisgarh': ['Ambikapur', 'Bhatapara', 'Bhilai', 'Nagar', 'Bilaspur', 'Chirmiri', 'Dalli-Rajhara', 'Dhamtari', 'Durg', 'Jagdalpur', 'Korba', 'Mahasamund', 'Manendragarh', 'Mungeli', 'Naila Janjgir', 'Raigarh', 'Raipur', 'Rajnandgaon', 'Sakti', 'Tilda Newra', 'Other'],

   'Delhi': ['Central Delhi', 'East Delhi', 'New Delhi', 'North Delhi', 'North East Delhi', 'North West Delhi', 'Shahdara', 'South Delhi', 'South East Delhi', 'South West Delhi', 'West Delhi', 'Other'],

   'Goa': ['Mapusa','Margao', 'Marmagao', 'Panaji', 'Other'],

   'Gujarat': ['Adalaj', 'Ahmedabad', 'Amreli', 'Anand', 'Anjar', 'Ankleshwar', 'Bharuch', 'Bhavnagar', 'Bhuj','Chhapra', 'Deesa', 'Dhoraji', 'Godhra', 'Jamnagar', 'Kadi', 'Kapadvanj', 'Keshod', 'Khambhat', 'Lathi', 'Limbdi', 'Lunawada', 'Mahemdabad', 'Mahesana', 'Mahuva', 'Manavadar', 'Mandvi', 'Mangrol', 'Mansa', 'Modasa', 'Morvi', 'Nadiad', 'Navsari', 'Padra', 'Palanpur', 'Palitana', 'Pardi', 'Patan', 'Petlad', 'Porbandar', 'Radhanpu', 'Rajkot', 'Rajpipla', 'Rajula', 'Ranavav', 'Rapar', 'Salaya', 'Sanand', 'Savarkundla', 'Sidhpur', 'Sihor', 'Songadh', 'Surat', 'Talaja', 'Thangadh', 'Tharad', 'Umbergaon', 'Umreth', 'Una', 'Unjha', 'Upleta', 'Vadnagar', 'Vadodara', 'Valsad', 'Vapi', 'Veraval', 'Vijapur', 'Viramgam', 'Visnagar', 'Vyara', 'Wadhwan', 'Wankaner', 'Other'],

   'Haryana': ['Bahadurgarh', 'Bhiwani', 'Charkhi', 'Dadri', 'Faridabad', 'Fatehabad', 'Gohana', 'Gurgaon', 'Hansi', 'Hisar', 'Jind', 'Kaithal', 'Karnal', 'Ladwa', 'Mahendragarh', 'Mandi Dabwali', 'Narnaul', 'Narwana','Panipat', 'Palwal', 'Pehowa', 'Pinjore', 'Rania', 'Ratia', 'Rewari', 'Rohtak', 'Safidon', 'Samalkha',  'Sirsa', 'Sohna', 'Sonipat', 'Taraori', 'Thanesar', 'Tohana', 'Yamunanagar', 'Other'],

   'Himachal Pradesh': ['Mandi', 'Nahan', 'Palampur', 'Shimla', 'Solan', 'Sundarnagar', 'Other'],

   'Jharkhand': ['Adityapur', 'Bokaro Steel City', 'Chaibasa', 'Chatra', 'Chirkunda', 'Deoghar', 'Dhanbad', 'Dumka', 'Giridih', 'Gumia', 'Hazaribag', 'Jamshedpur', 'Jhumri', 'Tilaiya', 'Lohardaga', 'Madhupur', 'Medininagar (Daltonganj)', 'Mihijam', 'Musabani', 'Pakaur', 'Patratu', 'Phusro', 'Ramgarh', 'Ranchi', 'Sahibganj', 'Saunda', 'Simdega', 'Tenu dam-cum-Kathhara', 'Other'],
    
   'Jammu and Kashmir':['Jammu', 'Kathua','Kishtwar','Kulgam','Kupwara','Poonch','Pulwama','Rajouri','Ramban','Reasi', 'Other'],

   'Karnataka': ['Adyar', 'Afzalpur', 'Arsikere', 'Athni', 'Ballari', 'Belagavi', 'Bengaluru', 'Chikkamagaluru', 'Davanagere', 'Gokak', 'Hubli-Dharwad Karwar', 'Kolar', 'Lakshmeshwar', 'Lingsugur', 'Maddur',  'Madikeri', 'Magadi', 'Mahalingapura', 'Malavalli', 'Malur', 'Mandya', 'Mangaluru', 'Manvi', 'Mudabidri', 'Mudalagi', 'Muddebihal', 'Mudhol', 'Mulbagal', 'Mundargi', 'Nanjangud', 'Nargund', 'Navalgund', 'Nelamangala', 'Pavagada', 'Piriyapatna', 'Puttur', 'Raayachuru', 'Rabkavi', 'Banhatti', 'Ramanagaram', 'Ramdurg', 'Ranebennuru', 'Ranibennur', 'Robertson Pet', 'Ron', 'Sadalagi', 'Sagara', 'Sakaleshapura', 'Sanduru', 'Sankeshwara', 'Saundatti-Yellamma', 'Savanur', 'Sedam', 'Shahabad', 'Shahpur', 'Shiggaon', 'Shikaripur', 'Shivamogga', 'Shrirangapattana', 'Sidlaghatta', 'Sindagi', 'Sindhagi', 'Sindhnur', 'Sira', 'Sirsi', 'Siruguppa', 'Srinivaspur', 'Surapura', 'Talikota', 'Tarikere', 'Tekkalakote', 'Terdal', 'Tiptur', 'Tumkur', 'Udupi','Vijayapura', 'Wadi', 'Yadgir', 'Other'],

   'Kerala': ['Adoor', 'Alappuzha', 'Attingal', 'Chalakudy', 'Changanassery', 'Cherthala', 'Chittur-Thathamangalam', 'Guruvayoor', 'Kanhangad', 'Kannur', 'Kasaragod', 'Kayamkulam', 'Kochi', 'Kodungallur', 'Kollam', 'Kottayam', 'Koyilandy', 'Kozhikode','Kunnamkulam', 'Malappuram', 'Mattannur', 'Mavelikkara', 'Mavoor', 'Muvattupuzha', 'Nedumangad', 'Neyyattinkara', 'Nilambur', 'Ottappalam', 'Palai', 'Palakkad', 'Panamattom', 'Panniyannur', 'Pappinisseri', 'Paravoor', 'Pathanamthitta', 'Peringathur', 'Perinthalmanna', 'Perumbavoor', 'Ponnani', 'Punalur', 'Puthuppally', 'Shoranur', 'Taliparamba', 'Thiruvalla', 'Thiruvananthapuram', 'Thodupuzha', 'Thrissur', 'Tirur', 'Vaikom', 'Varkala', 'Vatakara', 'Other'],

   'Madhya Pradesh': ['Alirajpur', 'Ashok Nagar', 'Balaghat', 'Bhopal', 'Ganjbasoda', 'Gwalior', 'Indore', 'Itarsi', 'Jabalpur', 'Lahar', 'Maharajpur', 'Mahidpur', 'Maihar', 'Malaj', 'Khand', 'Manasa', 'Manawar', 'Mandideep', 'Mandla', 'Mandsaur', 'Mauganj', 'Mhow Cantonment', 'Mhowgaon', 'Morena', 'Multai', 'Mundi', 'Murwara (Katni)', 'Nagda', 'Nainpur', 'Narsinghgarh', 'Narsinghgarh', 'Neemuch', 'Nepanagar', 'Niwari', 'Nowgong', 'Nowrozabad (Khodargama)', 'Pachore', 'Pali', 'Panagar', 'Pandhurna', 'Panna', 'Pasan', 'Pipariya', 'Pithampur', 'Porsa', 'Prithvipur', 'Raghogarh-Vijaypur', 'Rahatgarh', 'Raisen', 'Ratlam', 'Rau', 'Rehli', 'Rewa', 'Sabalgarh', 'Sagar', 'Sanawad', 'Sarangpur', 'Sarni', 'Satna', 'Sausar', 'Sehore', 'Sendhwa', 'Seoni', 'Seoni-Malwa', 'Shahdol', 'Shajapur', 'Shamgarh', 'Sheopur', 'Shivpuri', 'Shujalpur', 'Sidhi', 'Sihora', 'Singrauli', 'Sironj', 'Sohagpur', 'Tarana', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha', 'Vijaypur', 'Wara Seoni', 'Other'],

   'Maharashtra': ['Achalpur', 'Ahmednagar', 'Akola', 'Akot', 'Amalner', 'Ambejogai', 'Amravati', 'Anjangaon', 'Arvi', 'Aurangabad', 'Bhiwandi', 'Dhule', 'Ichalkaranji', 'Kalyan-Dombivali', 'Karjat', 'Latur', 'Loha', 'Lonar', 'Lonavla', 'Mahad', 'Malegaon', 'Malkapur', 'Mangalvedhe', 'Mangrulpir', 'Manjlegaon', 'Manmad', 'Manwath', 'Mehkar', 'Mhaswad', 'Mira-Bhayandar', 'Morshi', 'Mukhed', 'Mul', 'Mumbai', 'Murtijapur', 'Nagpur', 'Nanded-Waghala', 'Nandgaon', 'Nandura', 'Nandurbar', 'Narkhed', 'Nashik', 'Nawapur', 'Nilanga', 'Osmanabad', 'Ozar', 'Pachora', 'Paithan', 'Palghar', 'Pandharkaoda', 'Pandharpur', 'Panvel', 'Parbhani', 'Parli', 'Partur', 'Pathardi', 'Pathri', 'Patur', 'Pauni', 'Pen', 'Phaltan', 'Pulgaon', 'Pune', 'Purna', 'Pusad', 'Rahuri', 'Rajura', 'Ramtek', 'Ratnagiri', 'Raver', 'Risod', 'Sailu', 'Sangamner', 'Sangli', 'Sangole', 'Sasvad', 'Satana', 'Satara', 'Savner', 'Sawantwadi', 'Shahade', 'Shegaon', 'Shendurjana', 'Shirdi', 'Shirpur-Warwade', 'Shirur', 'Shrigonda', 'Shrirampur', 'Sillod', 'Sinnar', 'Solapur', 'Soyagaon', 'Talegaon', 'Dabhade', 'Talode', 'Tasgaon', 'Thane', 'Tirora', 'Tuljapur', 'Tumsar', 'Uchgaon', 'Udgir', 'Umarga', 'Umarkhed', 'Umred', 'Uran', 'Islampur', 'Vadgaon', 'Kasba', 'Vaijapur', 'Vasai-Virar', 'Wadgaon', 'Road', 'Wai', 'Wani', 'Wardha', 'Warora', 'Warud', 'Washim', 'Yavatmal', 'Yawal', 'Yevla', 'Other'],

   'Manipur': ['Imphal', 'Lilong', 'Mayang', 'Imphal', 'Thoubal', 'Other'],

   'Meghalaya': ['Nongstoin', 'Shillong', 'Tura', 'Other'],

   'Mizoram': ['Aizawl', 'Lunglei', 'Saiha', 'Other'],

   'Nagaland': ['Dimapur', 'Kohima', 'Mokokchung', 'Tuensang', 'Wokha', 'Zunheboto', 'Other'],

   'Odisha': ['Balangir', 'Baleshwar Town', 'Barbil', 'Bargarh', 'Baripada', 'Town', 'Bhadrak', 'Bhawanipatna', 'Bhubaneswar', 'Brahmapur', 'Byasanagar', 'Cuttack', 'Dhenkanal', 'Jatani', 'Jharsuguda', 'Kendrapara', 'Kendujhar', 'Malkangiri', 'Nabarangapur', 'Paradip', 'Parlakhemundi', 'Pattamundai', 'Phulabani', 'Puri', 'Rairangpur', 'Rajagangapur', 'Raurkela', 'Rayagada', 'Sambalpur', 'Soro', 'Sunabeda', 'Sundargarh', 'Talcher', 'Tarbha', 'Titlagarh', 'Other'],

   'Punjab': ['Amritsar', 'Barnala', 'Batala', 'Bathinda', 'Dhuri', 'Faridkot', 'Fazilka', 'Firozpur', 'Firozpur Cantt.', 'Gobindgarh', 'Gurdaspur', 'Hoshiarpur', 'Jagraon', 'Jalandhar', 'Jalandhar Cantt.', 'Kapurthala', 'Khanna', 'Kharar', 'Kot', 'Kapura', 'Longowal', 'Ludhiana', 'Malerkotla', 'Malout', 'Mansa', 'Moga', 'Mohali', 'Morinda India', 'Mukerian', 'Muktsar', 'Nabha', 'Nakodar', 'Nangal', 'Nawanshahr', 'Pathankot', 'Patiala', 'Patti', 'Pattran', 'Phagwara', 'Phillaur', 'Qadian', 'Raikot', 'Rajpura', 'Rampura', 'Phul', 'Rupnagar', 'Samana', 'Sangrur', 'Sirhind Fatehgarh Sahib', 'Sujanpur', 'Talwara', 'Tarn Taran', 'Urmar Tanda', 'Zira', 'Zirakpur', 'Other'],

   'Rajasthan': ['Ajmer', 'Alwar', 'Barmer', 'Bharatpur', 'Bhilwara', 'Bikaner', 'Jaipur', 'Jodhpur', 'Lachhmangarh', 'Ladnu', 'Lakheri', 'Lalsot', 'Losal', 'Makrana', 'Malpura', 'Mandalgarh', 'Mandawa', 'Mangrol', 'Merta City', 'Mount Abu', 'Nadbai', 'Nagar', 'Nagaur', 'Nasirabad', 'Nathdwara', 'Neem-Ka-Thana', 'Nimbahera', 'Nohar', 'Nokha', 'Pali', 'Phalodi', 'Phulera', 'Pilani', 'Pilibanga', 'Pindwara', 'Pipar City', 'Prantij', 'Pratapgarh', 'Raisinghnagar', 'Rajakhera', 'Rajaldesar', 'Rajgarh(Alwar)', 'Rajgarh (Churu)', 'Rajsamand', 'Ramganj Mandi', 'Ramngarh', 'Ratangarh', 'Rawatbhata', 'Rawatsar', 'Reengus', 'Sadri', 'Sadulpur', 'Sadulshahar', 'Sagwara', 'Sambhar', 'Sanchore', 'Sangaria', 'Sardarshahar', 'Sawai Madhopur', 'Shahpura', 'Shahpura', 'Sheoganj', 'Sikar', 'Sirohi', 'Sojat', 'Sri Madhopur', 'Sujangarh', 'Sumerpur', 'Suratgarh', 'Takhatgarh', 'Taranagar', 'Todabhim', 'Todaraisingh', 'Tonk', 'Udaipur', 'Udaipurwati','Vijainagar, Ajmer', 'Other'],

   'Sikkim': ['Gangtok', 'Gyalshing', 'Jorethang', 'Mangan', 'Namchi', 'Nayabazar', 'Rangpo', 'Rhenak', 'Singtam', 'Other'],

   'Tamil Nadu': ['Arakkonam', 'Aruppukkottai', 'Chennai', 'Coimbatore', 'Erode', 'Gobichettipalayam', 'Kancheepuram', 'Karur', 'Lalgudi', 'Madurai', 'Manachanallur', 'Nagapattinam', 'Nagercoil', 'Namagiripettai', 'Namakkal', 'Nandivaram-Guduvancheri', 'Nanjikottai', 'Natham', 'Nellikuppam', 'Neyveli (TS)', 'O Valley', 'Oddanchatram', 'P.N.Patti', 'Pacode', 'Padmanabhapuram', 'Palani', 'Paramakudi', 'Pallapatti', 'Pallikonda', 'Panagudi', 'Panruti', 'Paramakudi', 'Parangipettai', 'Pattukkottai', 'Perambalur', 'Peravurani', 'Periyakulam', 'Periyasemur', 'Pernampattu', 'Pollachi', 'Polur', 'Ponneri', 'Pudukkottai', 'Pudupattinam', 'Puliyankudi', 'Punjaipugalur', 'Rajapalayam', 'Ramanathapuram', 'Rameshwaram', 'Ranipet', 'Rasipuram', 'Salem', 'Sankarankovil', 'Sankari', 'Sathyamangalam', 'Sattur', 'Shenkottai', 'Sholavandan', 'Sholingur', 'Sirkali', 'Sivaganga', 'Sivagiri', 'Sivakasi', 'Srivilliputhur', 'Surandai', 'Suriyampalayam', 'Tenkasi', 'Thammampatti', 'Thanjavur', 'Tharamangalam', 'Tharangambadi', 'Theni', 'Allinagaram', 'Thirumangalam', 'Thirupuvanam', 'Thiruthuraipoondi', 'Thiruvallur', 'Thiruvarur', 'Thuraiyur', 'Tindivanam', 'Tiruchendur', 'Tiruchengode', 'Tiruchirappalli', 'Tirukalukundram', 'Tirukkoyilur', 'Tirunelveli', 'Tirupathur', 'Tirupathur', 'Tiruppur', 'Tiruttani', 'Tiruvannamalai', 'Tiruvethipuram', 'Tittakudi', 'Udhagamandalam', 'Udumalaipettai', 'Unnamalaikadai', 'Usilampatti', 'Uthamapalayam', 'Uthiramerur', 'Vadakkuvalliyur', 'Vadalur', 'Vadipatti', 'Valparai', 'Vandavasi', 'Vaniyambadi', 'Vedaranyam', 'Vellakoil', 'Vellore', 'Vikramasingapuram', 'Viluppuram', 'Virudhachalam', 'Virudhunagar', 'Viswanatham', 'Other'],

   'Telangana': ['Adilabad', 'Bellampalle', 'Bhadrachalam', 'Bhainsa', 'Bhongir', 'Bodhan', 'Farooqnagar', 'Gadwal', 'Hyderabad', 'Jagtial', 'Jangaon', 'Kagaznagar', 'Kamareddy', 'Karimnagar', 'Khammam', 'Koratla', 'Kothagudem', 'Kyathampalle', 'Mahbubnagar', 'Mancherial', 'Mandamarri', 'Manuguru', 'Medak', 'Miryalaguda', 'Nagarkurnool', 'Narayanpet', 'Nirmal', 'Nizamabad', 'Palwancha', 'Ramagundam', 'Sadasivpet', 'Sangareddy', 'Siddipet', 'Sircilla', 'Suryapet', 'Tandur', 'Vikarabad', 'Wanaparthy', 'Warangal', 'Yellandu', 'Other'],

   'Tripura': ['Agartala', 'Belonia', 'Dharmanagar', 'Kailasahar', 'Khowai', 'Pratapgarh', 'Udaipur', 'Other'],

   'Uttar Pradesh': ['Achhnera', 'Agra', 'Aligarh', 'Allahabad', 'Amroha', 'Azamgarh', 'Bahraich', 'Chandausi', 'Etawah', 'Fatehpur', 'Sikri', 'Firozabad', 'Hapur', 'Hardoi', 'Jhansi', 'Kalpi', 'Kanpur', 'Khair', 'Laharpur', 'Lakhimpur', 'Lal Gopalganj Nindaura', 'Lalganj', 'Lalitpur', 'Lar', 'Loni', 'Lucknow', 'Mathura', 'Meerut', 'Modinagar', 'Moradabad', 'Nagina', 'Najibabad', 'Nakur', 'Nanpara', 'Naraura', 'Naugawan',  'Nautanwa', 'Nawabganj', 'Nehtaur', 'Niwai', 'Noida', 'Noorpur', 'Obra', 'Orai', 'Padrauna', 'Palia', 'Kalan', 'Parasi', 'Phulpur', 'Pihani', 'Pilibhit', 'Pilkhuwa', 'Powayan', 'Pukhrayan', 'Puranpur', 'PurqUrban Agglomerationzi', 'Purwa', 'Rae Bareli', 'Rampur', 'Rampur Maniharan', 'Rasra', 'Rath', 'Renukoot', 'Reoti', 'Robertsganj', 'Rudauli', 'Rudrapur', 'Sadabad', 'Safipur', 'Saharanpur', 'Sahaspur', 'Sahaswan', 'Sahawar', 'Sahjanwa', 'Saidpur', 'Sambhal', 'Samdhan', 'Samthar', 'Sandi', 'Sandila', 'Sardhana', 'Seohara', 'Shahabad, Hardoi', 'Shahabad, Rampur', 'Shahganj', 'Shahjahanpur', 'Shamli', 'Shamsabad, Agra', 'Shamsabad, Farrukhabad', 'Shikarpur, Bulandshahr','Shikohabad', 'Shishgarh', 'Siana', 'Sikanderpur', 'Sikandra Rao', 'Sikandrabad', 'Sirsaganj', 'Sirsi', 'Sitapur', 'Soron', 'Sultanpur', 'Sumerpur', 'SUrban Agglomerationr', 'Tanda', 'Thakurdwara', 'Thana Bhawan', 'Tilhar', 'Tirwaganj', 'Tulsipur', 'Tundla', 'Ujhani', 'Unnao', 'Utraula', 'Varanasi', 'Vrindavan', 'Warhapur', 'Zaidpur', 'Zamania', 'Other'],

   'Uttarakhand': ['Bageshwar', 'Dehradun', 'Haldwani-cum-Kathgodam', 'Hardwar', 'Kashipur', 'Manglaur', 'Mussoorie', 'Nagla', 'Nainital', 'Pauri', 'Pithoragarh', 'Ramnagar', 'Rishikesh', 'Roorkee', 'Rudrapur', 'Sitarganj', 'Srinagar', 'Tehri', 'Other'],

   'West Bengal': ['Adra', 'AlipurdUrban', 'Agglomerationr', 'Arambagh', 'Asansol', 'Baharampur', 'Balurghat', 'Bankura', 'English', 'Bazar', 'Gangarampur', 'Habra', 'Hugli-Chinsurah', 'Jalpaiguri','Jhargram', 'Kalimpong', 'Kharagpur', 'Kolkata', 'Mainaguri', 'Malda', 'Mathabhanga', 'Medinipur', 'Memari', 'Monoharpur', 'Murshidabad','Nabadwip', 'Naihati','Panchla','PandUrban Agglomeration', 'Paschim Punropara', 'Purulia', 'Raghunathganj', 'Raghunathpur', 'Raiganj', 'Rampurhat', 'Ranaghat', 'Sainthia', 'Santipur', 'Siliguri', 'Sonamukhi', 'Srirampore', 'Suri', 'Taki', 'Tamluk', 'Tarakeswar', 'Other'],

};


var lookup1 = {

   'Andhra Pradesh': ['37'],
   'Arunachal Pradesh': ['12'],
   'Assam': ['18'],
   'Bihar': ['10'],
   'Chhattisgarh': ['22'],
   'Delhi': ['7'],
   'Goa': ['30'],
   'Gujarat': ['24'],
   'Haryana': ['06'],
   'Himachal Pradesh': ['02'],
   'Jharkhand': ['20'],
   'Jammu and Kashmir': ['01'],
   'Karnataka': ['29'],
   'Kerala': ['32'],
   'Madhya Pradesh': ['23'],
   'Maharashtra': ['27'],
   'Manipur': ['14'],
   'Meghalaya': ['17'],
   'Mizoram': ['15'],
   'Nagaland': ['13'],
   'Odisha': ['21'],
   'Punjab': ['03'],
   'Rajasthan': ['08'],
   'Sikkim': ['11'],
   'Tamil Nadu': ['33'],
   'Telangana': ['36'],
   'Tripura': ['16'],
   'Uttar Pradesh': ['09'],
   'Uttarakhand': ['05'],
   'West Bengal': ['19'],
};

// When an option is changed, search the above for matching choices
$('#state').on('change', function() {
   // Set selected option as variable
   var selectValue = $(this).val();

   // Empty the target field
   $('#stateCity').empty();
   
   // For each chocie in the selected option
   for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
      $('#stateCity').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
   }


   // Empty the target field
   $('#stateCode').empty();
   
   // For each chocie in the selected option
   for (i = 0; i < lookup1[selectValue].length; i++) {
      // Output choice in the target field
      $('#stateCode').append("<option value='" + lookup1[selectValue][i] + "'>" + lookup1[selectValue][i] + "</option>");
   }
});
