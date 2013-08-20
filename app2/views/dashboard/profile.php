 <!-- main content -->
    <?php foreach ($query->result() as $row): ?>
    <div id="contentwrapper">
        <div class="main_content">
	        <div class="row-fluid">
						<div class="span12">
							<h3 class="heading">User Profile</h3>
							<div class="row-fluid">
								<div class="span8">
									
										<?php $atts = array('class' => 'form-horizontal' ); ?>
										<?php echo form_open_multipart('dashboard/profile/update', $atts);?>
										<fieldset>
											<div class="control-group formSep">
												<label class="control-label">Username</label>
												<div class="controls text_line">
													<strong><?=$row->username;?></strong>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="fileinput" class="control-label">User avatar</label>
												<div data-fileupload="image" class="fileupload fileupload-new"><input name="" value="" type="hidden"><input type="hidden">
									<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""></div>
									<div style="max-width: 200px; max-height: 150px; line-height: 0px;" class="fileupload-preview fileupload-exists thumbnail"></div>
									<div>
										<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="" type="file"></span>
										<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
									</div>
								</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_fname" class="control-label">First name</label>
												<div class="controls">
													<input type="text" id="u_fname" name='first_name' class="input-xlarge" value="<?=$row->first_name;?>" />
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_fname" class="control-label">Last name</label>
												<div class="controls">
													<input type="text" id="lname" class="input-xlarge" name="last_name" value="<?=$row->last_name;?>" />
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label">Email</label>
												<div class="controls">
													<input type="text" id="u_email" class="input-xlarge" name='email' value="<?=$row->email;?>" />
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Password</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="password" id="u_password" name='password' class="input-xlarge" value="" />
														<input type='hidden' value='<?=$row->password;?>' name="u_pdefault">
														<span class="help-block">Enter your <b> new </b>password, Leave <b>unchanged</b> to retain your existing password</span>
													</div>
													<input type="password" id="s_password_re" class="input-xlarge" />
													<span class="help-block">Repeat password</span>
												</div>
											</div>
											<div class="control-group formSep">
												<label class="control-label">I want to receive:</label>
												<div class="controls">
													<?php if ($row->subscriptions == '2'):?>
													<label class="checkbox inline">
														<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
														System messages
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
														System Notifications
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="other_messages" id="email_othermessages" name="email_receive" />
														Other messages
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="newsletter" id="email_newsletter" name="email_receive" />
														Newsletters
													</label>
													<?php elseif ($row->subscriptions == '3'):?>
													<label class="checkbox inline">
														<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
														System messages
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
														System Notifications
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="other_messages" id="email_othermessages" checked='checked' name="email_receive" />
														Other messages
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="newsletter" id="email_newsletter" name="email_receive" />
														Newsletters
													</label>
												<?php elseif ($row->subscriptions == '4'):?>
												<label class="checkbox inline">
														<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
														System messages
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
														System Notifications
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="other_messages" id="email_othermessages"  name="email_receive" checked="checked" />
														Other messages
													</label>
													<label class="checkbox inline">
														<input type="checkbox" value="newsletter" id="email_newsletter" name="email_receive" checked="checked" />
														Newsletters
													</label>
												<?php endif;?>

												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label">Base Currency</label>
												<div class="controls">
													<select>
														<option value='KES'> KES </option>
														<option value='USD'> USD </option>
													</select>
													<span class="help-block"> Your base currency is set to <b> <?=$row->currency;?></b> </span>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label">Location</label>
												<div class="controls">
													<input type='text' name='location' class="input-xlarge" placeholder='your location' value='<?=$row->location;?>' />
													<span class="help-block"> Your base Location is set to <b> <?=$row->location;?> </b></span>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label">Country</label>
												<div class="controls">
								<select name="country" data-placeholder="Choose a Country..." id="user_languages">
									<option value="current" selected='true'><?=$row->country;?></option> 
									<option value="DZ">Algeria</option><option value="AO">Angola</option><option value="BJ">Benin</option><option value="BW">Botswana</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CM">Cameroon</option><option value="CV">Cape Verde</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="KM">Comoros</option><option value="CD">Congo [DRC]</option><option value="CG">Congo [Republic]</option><option value="DJ">Djibouti</option><option value="EG">Egypt</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="ET">Ethiopia</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GH">Ghana</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="CI">Ivory Coast</option><option value="KE">Kenya</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="ML">Mali</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="RW">Rwanda</option><option value="RE">Réunion</option><option value="SH">Saint Helena</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="SD">Sudan</option><option value="SZ">Swaziland</option><option value="ST">São Tomé and Príncipe</option><option value="TZ">Tanzania</option><option value="TG">Togo</option><option value="TN">Tunisia</option><option value="UG">Uganda</option><option value="EH">Western Sahara</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option><option value="AQ">Antarctica</option><option value="BV">Bouvet Island</option><option value="TF">French Southern Territories</option><option value="HM">Heard Island and McDonald Island</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="AF">Afghanistan</option><option value="AM">Armenia</option><option value="AZ">Azerbaijan</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BT">Bhutan</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei</option><option value="KH">Cambodia</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos [Keeling] Islands</option><option value="GE">Georgia</option><option value="HK">Hong Kong</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IL">Israel</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LB">Lebanon</option><option value="MO">Macau</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="MN">Mongolia</option><option value="MM">Myanmar [Burma]</option><option value="NP">Nepal</option><option value="KP">North Korea</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territories</option><option value="PH">Philippines</option><option value="QA">Qatar</option><option value="SA">Saudi Arabia</option><option value="SG">Singapore</option><option value="KR">South Korea</option><option value="LK">Sri Lanka</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TH">Thailand</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="AE">United Arab Emirates</option><option value="UZ">Uzbekistan</option><option value="VN">Vietnam</option><option value="YE">Yemen</option><option value="AL">Albania</option><option value="AD">Andorra</option><option value="AT">Austria</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BA">Bosnia and Herzegovina</option><option value="BG">Bulgaria</option><option value="HR">Croatia</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="EE">Estonia</option><option value="FO">Faroe Islands</option><option value="FI">Finland</option><option value="FR">France</option><option value="DE">Germany</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GG">Guernsey</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IT">Italy</option><option value="JE">Jersey</option><option value="XK">Kosovo</option><option value="LV">Latvia</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MK">Macedonia</option><option value="MT">Malta</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="ME">Montenegro</option><option value="NL">Netherlands</option><option value="NO">Norway</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="SM">San Marino</option><option value="RS">Serbia</option><option value="CS">Serbia and Montenegro</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="ES">Spain</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="UA">Ukraine</option><option value="GB">United Kingdom</option><option value="VA">Vatican City</option><option value="AX">Åland Islands</option><option value="AI">Anguilla</option><option value="AG">Antigua and Barbuda</option><option value="AW">Aruba</option><option value="BS">Bahamas</option><option value="BB">Barbados</option><option value="BZ">Belize</option><option value="BM">Bermuda</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="VG">British Virgin Islands</option><option value="CA">Canada</option><option value="KY">Cayman Islands</option><option value="CR">Costa Rica</option><option value="CU">Cuba</option><option value="CW">Curacao</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="SV">El Salvador</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GT">Guatemala</option><option value="HT">Haiti</option><option value="HN">Honduras</option><option value="JM">Jamaica</option><option value="MQ">Martinique</option><option value="MX">Mexico</option><option value="MS">Montserrat</option><option value="AN">Netherlands Antilles</option><option value="NI">Nicaragua</option><option value="PA">Panama</option><option value="PR">Puerto Rico</option><option value="BL">Saint Barthélemy</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="SX">Sint Maarten</option><option value="TT">Trinidad and Tobago</option><option value="TC">Turks and Caicos Islands</option><option value="VI">U.S. Virgin Islands</option><option value="US">United States</option><option value="AR">Argentina</option><option value="BO">Bolivia</option><option value="BR">Brazil</option><option value="CL">Chile</option><option value="CO">Colombia</option><option value="EC">Ecuador</option><option value="FK">Falkland Islands</option><option value="GF">French Guiana</option><option value="GY">Guyana</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="SR">Suriname</option><option value="UY">Uruguay</option><option value="VE">Venezuela</option><option value="AS">American Samoa</option><option value="AU">Australia</option><option value="CK">Cook Islands</option><option value="TL">East Timor</option><option value="FJ">Fiji</option><option value="PF">French Polynesia</option><option value="GU">Guam</option><option value="KI">Kiribati</option><option value="MH">Marshall Islands</option><option value="FM">Micronesia</option><option value="NR">Nauru</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="PW">Palau</option><option value="PG">Papua New Guinea</option><option value="PN">Pitcairn Islands</option><option value="WS">Samoa</option><option value="SB">Solomon Islands</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TV">Tuvalu</option><option value="UM">U.S. Minor Outlying Islands</option><option value="VU">Vanuatu</option><option value="WF">Wallis and Futuna</option>  
								</select>													
								<span class="help-block"> Your base Country is set to <b> <?=$row->country;?> </b> </span>
												</div>
											</div>

											<div class="control-group formSep">
												<label class="control-label">Language(s)</label>
												<div class="controls">
													<select name="user_languages" id="user_languages">
														<option selected="selected">English</option>
														<option>French</option>
														<option>German</option>
														<option>Italian</option>
														<option>Chinese</option>
														<option>Spanish</option>
													</select>
													<span class="help-block"> Your Language is set to <b> <?=$row->lang;?></b> </span>
												</div>
											</div>
											<div class="control-group formSep">
												<label class="control-label">Gender</label>
												<div class="controls">
													<?php if ($row->gender == '1' | $row->gender == '0'):?>
													<label class="radio inline">
														<input type="radio" value="male" id="s_male" name="f_gender" checked="checked" />
														Male
													</label>
													<label class="radio inline">
														<input type="radio" value="female" id="s_female" name="f_gender" />
														Female
													</label>
												<?php elseif ($row->gender == '2'):?>
													<label class="radio inline">
														<input type="radio" value="male" id="s_male" name="f_gender" />
														Male
													</label>
													<label class="radio inline">
														<input type="radio" value="female" id="s_female" name="f_gender" checked="checked"  />
														Female
													</label>
												<?php endif;?>


												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_signature" class="control-label">Signature</label>
												<div class="controls">
													<textarea rows="4" id="u_signature" placeholder='Your Signature' class="input-xlarge"><?=$row->sign;?></textarea>
													<span class="help-block">Added to all your outgoing mails</span>
												</div>
											</div>
											<div class="control-group">
												<div class="controls">
													<button class="btn btn-gebo" type="submit">Save changes</button>
												<button class="btn">Cancel</button>
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
				</div>
                        
                </div>
            </div>
            
			<!-- sidebar -->
            
			
	
          <?php endforeach; ?>  
