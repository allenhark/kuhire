<?php
foreach ($user->result () as $udata):

?>
<div class="container container-twelve">
	<hr>
	<form accept-charset="utf-8" enctype="mmultipart/form-data" action="<?=base_url('beta/user/img/do_upload');?>" method="post">
		
		<h6> Choose New Profile Picture</h6>
		<input type="file" name="userfile" />
		
		<button type="submit" class="btn btn-primary"> Update</button>
	</form>
	<hr>
</div>

<?php endforeach;?>