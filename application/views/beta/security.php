<?php
foreach ($user->result () as $udata):

?>
<div class="container container-twelve">
	
	<div class="span12 row-fluid container-fluid clearfix">
		<div class="span2" >
			<ul>
				<li><a href="<?=base_url('r');?>"><i class="icomoon-icon-bars"></i> Dashboard </a></li>
				<li><a href="<?=base_url('add');?>"><i class="entypo-icon-plus"></i> Add new </a></li>
				<li><a href="<?=base_url("beta/user/inbox");?>"><i class="icomoon-icon-mail"></i> Inbox </a> </li>
				<li><a href="<?=base_url('beta/user/products');?>"><i class="brocco-icon-grid"></i> Products </a></li>								
				<li><a href="<?=base_url('beta/user/payment');?>"><i class="icomoon-icon-stats-up"></i> Payment History </a></li>
				<li><a href="<?=base_url("beta/user/security");?>" class="active"><i class="icomoon-icon-fire "></i> Security Settings</a> </li>
				<li><a href="<?=base_url("beta/user/profile");?>"><i class="wpzoom-settings"></i> Profile Settings</a> </li>
			</ul> 
		</div>
		
		<div class="span6">			
			<?php
			$this->db->where('user_id', $udata->user_id);
			$sec = $this->db->get('qsecurity');
			if ($sec -> num_rows() > 0):
				foreach ($sec->result () as $security):
			?>
			<p><i class="splashy-smiley_amused"></i> You have set your security crendetials.</p>
			<form action="<?=base_url('beta/user/pupdate');?>" method="post">
				<hr style="width: 45%">
				<h5><i class="brocco-icon-key"></i> Get a new Password</h5>
				<span class="help-block"> This might not work for facebook connect users.</span>
				
				<label><i class="wpzoom-unlocked"></i> Old Password</label>
				<input type="password" name="olp_p" style="height: 25px;"/>
				<span class="help-block"> Your old password</span>
				
				<label><i class="wpzoom-locked"></i> New Password</label>
				<input type="password" name="new_p" style="height: 25px;"/>
				<span class="help-block"> Your new password</span>
				
				<label><i class="wpzoom-locked"></i> New password Again</label>
				<input type="password" name="new_p_cnf" style="height: 25px;"/>
				<span class="help-block"> Your new password again</span>
				
				<hr style="width: 45%">
				
				<button type="submit" class="btn btn-info"><i class="wpzoom-lightning"></i> Update</button>
			</form>
			<p>
				If this is not nessecary, you may enjoy a cold <i class="wpzoom-drink-2"></i> with hot <i class="wpzoom-food"></i>, you are safe
			</p>
			<?php  
			endforeach; 
			else:
			?>
			<h5><i class="icomoon-icon-fire "></i> Security Settings</h5>
			<p>
				Enhance your account security. Fight off hackers. <a href="http://blog.scrobber.com/?s=security"> Learn more <i class="icomoon-icon-redo"></i></a>
			</p>
				<div class="container">
					<form action="<?=base_url('beta/user/supdate');?>" method="post">
						<hr style="width: 45%">
						<h5><i class="brocco-icon-wrench"></i> Security Options</h5>	
						
						<label> Security Question 1</label>					
						<select name="question1">
							<option> Select One </option>
							<option value="q1"> When was your mother born?</option>
							<option value="q2"> What was your childhood nickname?</option>
							<option value="q3"> What was the name of your highschool crush?</option>
							<option value="q4"> What was your first nickname?</option>
							<option value="q5"> Random String</option>
						</select>
						
						<label> Answer</label>
						<input type="text" name="a1" style="height: 25px;"/>
						
						<label> Security Question 2</label>					
						<select name="question2">
							<option> Select One </option>
							<option value="q1"> When was your mother born?</option>
							<option value="q2"> What was your childhood nickname?</option>
							<option value="q3"> What was the name of your highschool crush?</option>
							<option value="q4"> What was your first nickname?</option>
							<option value="q5"> Random String</option>
						</select>
						
						<label> Answer</label>
						<input type="text" name="a2" style="height: 25px;"/>
						
						<label> Security Question 3</label>					
						<select name="question3">
							<option> Select One </option>
							<option value="q1"> When was your mother born?</option>
							<option value="q2"> What was your childhood nickname?</option>
							<option value="q3"> What was the name of your highschool crush?</option>
							<option value="q4"> What was your first nickname?</option>
							<option value="q5"> Random String</option>
						</select>
						
						<label> Answer</label>
						<input type="text" name="a3" style="height: 25px;"/>
						
						<label> Security Question 4</label>					
						<select name="question4">
							<option> Select One </option>
							<option value="q1"> When was your mother born?</option>
							<option value="q2"> What was your childhood nickname?</option>
							<option value="q3"> What was the name of your highschool crush?</option>
							<option value="q4"> What was your first nickname?</option>
							<option value="q5"> Random String</option>
						</select>
						
						<label> Answer</label>
						<input type="text" name="a4" style="height: 25px;"/>
						<hr style="width: 45%">
						<button type="submit" class="btn btn-primary"><i class="icomoon-icon-key"></i> Protect.</button>						
					
				</form>
				<p> Answer atleast two. This will help you reset your password later. You cannot change your password till you have set this.</p>
				
					<div class="clear"></div>
				</div>
				<?php endif;?>
		</div>
		
		<?php $this->load->view('beta/userbar');?>
		
		
	</div>
		<hr>
	</div>
	
</div>

<?php endforeach;?>