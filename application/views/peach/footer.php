<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
        <h3 id="myModalLabel">Create account</h3>
        <span> Start hiring out today</span> <br>
        
    </div>
    
        <div class="modal-body">
            
             <form method="post" action="<?=base_url('join');?>">
                        <div class="control-group">
                            <label class="control-label" for="inputRegisterFirstName">
                                First name
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" name='first_name' id="inputRegisterFirstName">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterSurname">
                                Last Name
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterSurname" name="last_name">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterEmail">
                                E-mail
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterEmail" name="email">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterPassword">
                                Password
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="password" id="inputRegisterPassword" name="password">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->
        </div>
  
    <div class="modal-footer">
        <input type="submit" value="Register" class="btn btn-primary arrow-right">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <!-- button type="sumit" class="btn btn-primary">Update Info</button -->
    </div>
     </form>
</div>


<footer>
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span12 contact-info">
                <span class="span9">
                    +254 711 295 595 <a href="mailto:hi@scrobber.com"> hi@scrobber.com</a>
                </span>

                <ul class="span3 social-network">
                    <li><a href="http://www.twitter.com/Kuhire"><i class="icon-twitter-sign"></i></a></li>
                    <li><a href="http://www.facebook.com/Kuhire254"><i class="icon-facebook-sign"></i></a></li>
                </ul>

            </div>
            <div class="clearfix"></div>
        </div><!-- end .row-fluid -->
    </div> <!-- end .container-fluid -->
</footer>
<!-- end footer -->

<!--[if !lte IE 6]><!-->
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('peach'); ?>/js/libs/jquery.min.js"><\/script>')</script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>window.jQuery.ui || document.write('<script src="<?= base_url('peach'); ?>/js/libs/jquery.ui.min.js"><\/script>')</script>

<!-- RECOMMENDED: For (IE6 - IE8) CSS3 pseudo-classes and attribute selectors -->
<!--[if lt IE 9]> 
   <script src="<?= base_url('peach'); ?>/js/include/selectivizr.min.js"></script> 					
<![endif]-->

<script src="<?= base_url('peach'); ?>/js/libs/jquery.ui.touch-punch.min.js"></script>				<!-- REQUIRED:  A small hack that enables the use of touch events on mobile -->

<!-- Add 'http:' for testing locally -->
<script src="<?= base_url('peach'); ?>/http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>

<script src="<?= base_url('peach'); ?>/js/menu/jquery.ct.3LevelAccordion.min.js"></script>     		<!-- REQUIRED: Accordion Menu with filter-->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.responsivethumbnailgallery.min.js"></script>  <!-- REQUIRED: Responsive Gallery Plugin -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.onebyone.min.js"></script>     				<!-- REQUIRED: Slider Plugin -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.touchwipe.min.js"></script>    				<!-- REQUIRED: Plugin to make Slider Plugin work on Touch Devices -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.onebyone.min.js"></script>     				<!-- REQUIRED: Slider Plugin -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.touchwipe.min.js"></script>    				<!-- REQUIRED: Plugin to make Slider Plugin work on Touch Devices -->

<script src="<?= base_url('peach'); ?>/js/include/jquery.fitvids.min.js"></script>     		 		<!-- RECOMMENDED: Responsive videos -->			
<script src="<?= base_url('peach'); ?>/js/include/jquery.tweet.min.js"></script>     		 			<!-- OPTIONAL: Twitter display plugin -->
<script src="<?= base_url('peach'); ?>/js/include/jquery.equal-heights.min.js"></script> 	 			<!-- RECOMMENDED: Plugin to keep div heights consistant -->	
<script src="<?= base_url('peach'); ?>/js/include/jquery.todo.min.js"></script>					 	<!-- REQUIRED: Plugin to save "add to short list" items -->
<script src="<?= base_url('peach'); ?>/js/include/jquery.pubsub.min.js"></script>				 		<!-- REQUIRED: (If todo.js is in use) Dependent with todo.js -->
<script src="<?= base_url('peach'); ?>/js/include/jquery.select2.min.js"></script>			 		<!-- RECOMMENDED: Custom jQuery/searchable dropdowns -->	
<script src="<?= base_url('peach'); ?>/js/include/bootstrap.min.js"></script> 			 			<!-- REQUIRED: For BootStrap build -->

<script src="<?= base_url('peach'); ?>/js/config.js"></script>						 				<!-- DO NOT REMOVE: Contains major plugin initiations and functions -->
<!--<![endif]-->
<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('8094-740-10-8754');/*]]>*/</script><noscript><a href="https://www.olark.com/site/8094-740-10-8754/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->
</body>
</html>
