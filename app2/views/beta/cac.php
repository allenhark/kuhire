<div class="content">
	<form>
		<input type="text" name="a" /> <br>
		<input type="text" name="b" /> <br>
		<input type="text" name="c" />
		<hr>
		<button type="submit" class="btn"> Calculate</button>
	</form>
	<hr>
	<?php 
		if($_GET):
		
		$t = $_GET['a']. $_GET['b']. $_GET['c'];
			echo $t;
		?>
		
	<?php endif;?>
</div>
