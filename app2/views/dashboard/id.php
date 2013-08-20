<div class="span12" id="container">
<div class="hero-unit span11">
	<h1> Your Id number is a requirement </h1>
		<p><br>  </p>
	<form action="<?=base_url('dashboard/roadblock/iupdate');?>" method="post">
		<input type="text" placeholder="Your Id Number" name="id" calss="input xlarge">
		<span class="help-block"> Please enter your id number </span>
		<hr>
		<button type="submit" class="btn btn-success btn-large"> Update Id</button>
	</form>
</div>
<div class="alert span11">
<p> 
	You cannot skip this step.<br>
	We may call you randomly to validate this.

</p>
</div>
</div>	