<div data-role="fieldcontain">
        <form method="get" action="<?=base_url('mobile/search/');?>" />
            <fieldset data-role="controlgroup">
                <label for="searchinput1"></label>
                <input type="hidden" name="location" value="" />
                <input type="hidden" name="price" value="" />
                <input name="s" id="searchinput1" placeholder="Looking to hire something?" value="" type="search" />
            </fieldset>
        </form>

</div>

<h2>
                    Login
                </h2>
                <div style="width: 288px; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                    <img src="http://codiqa.com/static/images/v2/image.png" alt="image" style="position: absolute; top: 50%; left: 50%; margin-left: -16px; margin-top: -18px" />
                </div>
            <?php
                if (validation_errors()) : echo '<h5> Okay Jim. We could not verify this. Mind having a look again?</h5>';
                endif;
                echo validation_errors('<li class="unstyled">', '</li>');
                
                
                if ($this->uri->segment('3')):
                    echo '<h3> Wrong username or password </h3>';
                endif;
            ?>

            <form method="post">
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput1">
                            Username or Email
                        </label>
                        <input name="login" id="textinput1" placeholder="Username / Email" value="" type="text" />
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
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="toggleswitch1">
                            Remember Me
                        </label>
                        <select name="toggleswitch1" id="toggleswitch1" data-theme="b" data-role="slider">
                            <option value="off">
                                Off
                            </option>
                            <option value="on">
                                Yes
                            </option>
                        </select>
                    </fieldset>
                </div>
                <input data-theme="b" data-icon="check" data-iconpos="left" value="Login" type="submit" />
            </form>
                <div>
                    <a href="<?=base_url('mobile/register');?>" data-transition="fade">
                        or Register
                    </a>
                </div>
