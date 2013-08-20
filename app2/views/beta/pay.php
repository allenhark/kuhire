<div id="pageinfo">

	<div class="container container-twelve">

		<div class="pagetitle eight columns">
			<h1> Payment Option</h1><h2>Finalise Your Product</h2>

		</div>

		<div class="clear"></div>

	</div>

</div><!-- //pageinfo -->
<div class="clear"></div>

<div class="container container-twelve">
	<hr>
	<?php if($this->uri->segment('2') != NULL):
	$this->db->where('item_id', $this->uri->segment('2'));
	$tm = $this->db->get('item');
	if ($tm -> num_rows() > 0):
	foreach($tm->result () as $items):
	if ($items -> status == "1" |  $items -> status == "3") :

	?>

	<h3 class="alert-success" style="font-size: 26px;"> Ooops! The item is already paid for. That was a misunderstanding. We will fix it shortly</h3>

	<?php else: ?>
	Payment Processor
	<div class="six columns">
		<h4> Got a coupon?</h4>
		<form action="<?= base_url('pay/' . $this -> uri -> segment('2')); ?>" method="get">
			<h5> Coupon Code</h5>
			<input type="text" name="coupon" placeholder="Coupon Code" style="height: 25px;">
			<span class="help-block"> Enter Coupon Code</span>
			<input type="hidden" name="return" value="<?= $this -> uri -> segment('2'); ?>">

			<br />
			<?php
			//Get Price Details

			$this->db->where('p_cat', $items->item_cat);
			$pr = $this->db->get('pricing');
			foreach($pr->result () as $price):
			?>
			<h5> Your are paying <?= $price -> p_price . '.00'; ?> <?= $price -> p_currency; ?> for <a href="<?= base_url($items -> slug); ?>" target="new"> <?= $items -> name; ?>. </a></h5>

			<h6> Select Duration</h6>

			<select name="duration">
				<option value="1"> One Month</option>
				<option value="2"> Two Months</option>
				<option value="3"> Three Months</option>
				<option value="6"> Six Months</option>
			</select>
			

			<hr>
			<button type="submit" class="btn btn-large btn-info">
				<i class="splashy-gem_options"></i> Update Price
			</button>
		</form>
	</div>
	<div class="six columns">
		
		<?php if($_GET != NULL):
		$d = $_GET['duration'];
		$total = $d * $price->p_price;
		
		?>
		<h4> Total: </h4>
	
		<?php 		
		if($_GET['coupon'] != NULL):
			//Compute Coupon
			$this->db->where('c_no', $_GET['coupon']);
			$this->db->where('c_status', '2');
			$cc = $this->db->get('coupons');
			if ($cc -> num_rows () > 0):
				foreach ($cc->result () as $cdata):
					$discount = $cdata->c_percent;
					$fl = $total * $discount / 100;
					$final = $total - $fl;
		?>
			<h6> You Got a <?=$cdata->c_percent;?> % Discount. </h6> 
			<?php if($final == '0'):?>
				<h5 style="color: #D33C14"> It seems today you got lucky! You ain't paying a dime.</h5>
			<?php endif;?>
			<h6>You will Be paying <?=$final.'.oo';?> KES Today</h6>
			
			<?php endforeach; else: ?>
				<div class="alert-warning"> Coupon not Found or has been used.</div>
				<h5> Total Today: <?= $total . '.00'; ?> KES</h5>
			<?php endif;?>
			
		<?php else:?>
			
		<h5> Total Today: <?= $total . '.00'; ?> KES</h5>
		<?php endif;?>
		
		<?php if($final == '0'):?>
			<a class="btn btn-info" href="<?=base_url('finalize/'.$this->uri->segment('2').'/?coupon='.$_GET['coupon'].'&return='.$_GET['return']);?>"><i class="wpzoom-lightning"></i> Complete Payment</a>
		<?php else:?>
		<h5> Choose a payment option</h5>
		
		<?php endif;?>
		
		<?php else:?>
		
		<h6><i class="wpzoom-pointer-2"></i>  Get started by updating your payment options.</h6>
		<?php endif; ?>
		
		
	</div>

	<?php endforeach; endif; endforeach; ?>

	<?php else: ?>
	<div class="alert-attention">
		<h3  style="font-size: 26px;"> We got a problem here jim! Wrong request or item doesn't exist</h3>

	</div>
	<?php endif;?>
	
	<?php else:?>
		
	<?php endif; ?>
	<hr>

</div>
</div>
