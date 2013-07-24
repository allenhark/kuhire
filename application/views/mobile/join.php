<h2>
                    Register
                </h2>
                <div style="width: 288px; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                    <img src="http://codiqa.com/static/images/v2/image.png" alt="image" style="position: absolute; top: 50%; left: 50%; margin-left: -16px; margin-top: -18px" />
                </div>
                <?=validation_errors('<li>', '</li>');?>
    <form method="post" >
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput3">
                            First Name
                        </label>
                        <input name="first_name" id="textinput3" placeholder="First Name" value="" type="text" />
                    </fieldset>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput4">
                            Last Name
                        </label>
                        <input name="last_name" id="textinput4" placeholder="Last Name" value="" type="text" />
                    </fieldset>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput5">
                            Email Address
                        </label>
                        <input name="email" id="textinput5" placeholder="Email Address" value="" type="email" />
                    </fieldset>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput6">
                            Phone Number
                        </label>
                        <input name="phone" id="textinput6" placeholder="Phone Number" value="" type="tel" />
                    </fieldset>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput1">
                            Username
                        </label>
                        <input name="username" id="textinput1" placeholder="Username" value="" type="text" />
                    </fieldset>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput2">
                            Password
                        </label>
                        <input name="password" id="textinput2" placeholder="password" value="" type="password" />
                    </fieldset>
                </div>
                <h5>
                    By clicking register you agree to our terms and condations
                </h5>
                <input data-theme="b" data-icon="check" data-iconpos="left" value="Register" type="submit" />
    </form>
                <div>
                    <a href="<?=base_url('mobile/login');?>" data-transition="fade">
                        or Login
                    </a>
                </div>