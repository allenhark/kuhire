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

<h2>Contact Us</h2>
                <img src="https://maps.googleapis.com/maps/api/staticmap?center=Bishop Magua, Ngong Road&amp;zoom=12&amp;size=288x200&amp;markers=Bishop Magua, Ngong Road Nairobi Kenya&amp;sensor=false" height="200" width="288" />
	<form method="post">
       <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput3">
                            Name
                        </label>
                        <input name="name" id="textinput3" placeholder="Your name" value="" type="text" />
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
                        <label for="textarea1">
                            Message
                        </label>
                        <textarea name="msg" id="textarea1">
                        </textarea>
                    </fieldset>
                </div>
                <input data-theme="b" data-icon="info" data-iconpos="left" value="Contact Us" type="submit" />
           
	</form>
