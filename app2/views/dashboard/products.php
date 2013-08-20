<!-- main content -->
<div id="contentwrapper">
	<div class="main_content">

		<div class="row-fluid">
			<div class="span12">
				<div class="heading clearfix">
				<h3 class="pull-left">My items</h3><span class="pull-right"><i class="splashy-add"></i><small> <?=anchor('dashboard/add', 'Add new Item')?></small>
				</div>
				<table class="table table-bordered table-striped table_vam" id="dt_gal">
					<thead>
						<tr>
							<th class="table_checkbox">
							<input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_gal" />
							</th>
							<th>Image</th>
							<th>Name</th>
							<th>Status</th>
							<th>Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($query->result() as $row): ?>
							<?php $img = base_url() . 'images/' . $row -> image; ?>
						<tr>
							<td>
							<input type="checkbox" name="row_sel" class="row_sel" />
							</td>
							<td style="width:60px"><a href=" <?= $img; ?>" title="<?= $row -> name; ?>" class="cbox_single thumbnail"> <img alt="" src="<?= $img; ?>" style="height:50px;width:50px"> </a></td>
							<td><?= $row -> name; ?>
							<br/>
							<small><b>Tags:</b><?= $row -> tags; ?></small></td>
							
							<?php if ($row->status == "1"):?>
							<td><i class="splashy-star_boxed_full"></i> Featured </td>						
							
							<?php elseif ($row->status == "3"): ?>
							<td><i class="splashy-check"></i> Published </td>
							
							<?php elseif ($row->status == "2"): ?>
							<td><i class="splashy-error_small"></i> Pending </td>
							
							<?php elseif ($row->status == "4"): ?>
							<td><i class="splashy-information"></i> Hired </td>
							
							<?php endif; ?>
							<td><?=$row -> pub_time; ?></td>
							<td>
								<a href="#" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
								<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>
								<a href="#" data-tableid="dt_gal" title="Delete"><i class="icon-trash"></i></a>
								<?php if ($row->status =="1" | $row->status == "3"):?>
								<a href="#" title="Analyitcs"><img src="<?=base_url();?>legacy/v3/img/gCons/world.png"></a>
								<?php endif;?>
								<?php if ($row->status =="1" | $row->status == "3"):?>
								<a href="#" title="Hire out"><i class="splashy-group_blue"></i></a>
								<?php endif;?>
								<?php if ($row->status == "2"):?>
								<a href="#" title="activate"><i class="splashy-lock_large_unlocked"></i></a>
								<?php endif;?>
								<?php if ($row->status == "3"):?>
								<a href="#" title="Make Fetured"><i class="splashy-fish"></i></a>
								<?php endif;?>
								<?php if ($row->status == "4"):?>
								<a href="#" title="End Hire Session"><i class="splashy-refresh"></i></a>
								<?php endif;?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

			</div>
			<br>
			<div class="row-fluid">
				<div class="span12">
					<div class="heading clearfix">
				<h3 class="pull-left">Quick Help</h3><span class="pull-right"><i class="splashy-help"></i><small> <?=anchor('dashboard/support', 'Support')?></small>
				</div>
					<p>
						<h4> Icons and Meaning</h4>
						
					</p>
					<p>
						<ul class="unstyled">
							<li><i class="icon-pencil"></i> : Edit</li>
							<li><i class="icon-eye-open"></i> : View Selected Product</li>
							<li><i class="icon-trash"></i> : Delete <i class="splashy-warning_triangle"></i> <b>You are about to delete an Item</b></li>
							<li><img src="<?=base_url();?>legacy/v3/img/gCons/world.png">: Analytics for Published items </li>
							<li><i class="splashy-lock_large_unlocked"></i> : Publish Pending items </li>
							<li><i class="splashy-fish"></i> : Make a published item featured <i class="splashy-smiley_happy"></i> A small fee may apply</li>
							<li><i class="splashy-refresh"></i> : End item hire duration to show back if our main site</li>
							<li><i class="splashy-group_blue"></i> : Hire out an item</li>
						</ul>
						
						
					</p>
					<p>
						Got more questions?
							Contact customer support. <?=anchor("main/landing/contact/", "Contact us");?>
							or Visit our Knowledge base <a href="http://wiki.telekenya.com/scrobber" target="_new" title="knowledge base"><i class="icon-share-alt"></i></a>
					</p>
				</div>
				
			</div>
		</div>

	</div>
</div>