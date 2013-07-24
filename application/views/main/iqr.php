<section id="content" class="container clearfix">
	<?php foreach($query->result() as $row):?>

		<header class="page-header">

			<h1><?=$row->name;?> Hiring</h1>
		</header><!-- end .page-header -->

		<div class="span12 rowfluid">
			<ul class="unstyled">
				<li class="span3">
					<img src="<?=base_url('images/'.$row->image);?>">
					<p><h6> <?=$row->name;?></h6></p>
				</li>

				<li class="span3">
					<p><i class="splashy-marker_rounded_grey_3"></i> <?=$row->location;?></p>
					<p> </p>
				</li>

				<li class="span5">
					Other Details
				</li>
			</ul>
		</div>

		<div class="span12 rowfluid clearfix">
			<ul class="unstyled">
				<li class="span5">
					<p> Time Span </p>
					<p>
						<div class="span3">
								<div class="input-append date" id="dp_start">
									<input class="span6" type="text" readonly="readonly" /><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
								</div>
								<span class="help-block">Daterange - date start</span>
							</div>
							<div class="span3">
								<div class="input-append date" id="dp_end">
									<input class="span6" type="text" readonly="readonly" /><span class="add-on"><i class="splashy-calendar_day_down"></i></span>
								</div>
								<span class="help-block">Daterange - date end</span>
							</div>
						</p>
				</li>

				<li class="span6">
					related info
				</li>
			</li>

			</div>

	<?php endforeach;?>
</section><!-- end #content -->
