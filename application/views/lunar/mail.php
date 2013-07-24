<div id="masthead">

	<div class="container">

		<div class="masthead-pad">

			<div class="masthead-text">
				<h2>Mail</h2>
				<p>
					Check User Mail
				</p>
			</div>
			<!-- /.masthead-text -->

		</div>

	</div>
	<!-- /.container -->

</div>
<!-- /#masthead -->

<div id="content">

	<div class="container">

		<div class="row">
			<!-- Build page from here: -->
			<?php $this->load->view('lunar/side_nav');?>
			<div class="span9">

				<div class="email-content">

					<div class="email-header">

						<div class="btn-toolbar" style="margin: 0;">
							<div class="btn-group">
								<a href="<?= current_url(); ?>" class="btn tip" title="Refresh inbox"><span class="wpzoom-refresh"></span></a>
							</div>
						</div>

					</div><!-- End Email-header -->

					<div class="content noPad clearfix">
						<table cellpadding="0" cellspacing="0" border="0" class="emailTable display table" width="100%">
							<thead>
								<tr>
									<th class="checkAll">
									<input type="checkbox" id="selectall" value="all" class="nostyle tip" title="Select All" />
									</th>
									<th><span class="icon16 icomoon-icon-star-3"></span></th>
									<th></th>
									<th>From</th>
									<th>Subject</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($mail -> result () as $mdata):?>
								<tr>

									<td class="check">
									<input type="checkbox" id="checkbox" class="nostyle" value="1" />
									</td>
									<td class="star"><?php if($mdata->nb_status == 1):?><i class="splashy-star_boxed_full"></i> <?php else:?><span class="icon16 icomoon-icon-star"></span> <?php endif;?></td>
									<td class="star"><?php if($mdata->nb_status == 1):?><i class="splashy-mail_light"></i><?php else:?><i class="splashy-mail_light_new_1"></i> <?php endif;?></td>
									<td class="from"><a href="<?=base_url('lunar/mail/view/'.$mdata->nb_id.'?target=inbox&token='.$this->session->userdata('session_id'));?>" class="unread link"> <?=$mdata->nb_sender_name;?></a></td>
									<td class="subject"><a href="<?=base_url('lunar/mail/view/'.$mdata->nb_id.'?target=inbox&token='.$this->session->userdata('session_id'));?>" class="unread link"> <?=$mdata->nb_subject;?></a></td>
									<td class="date"><?=$mdata->nb_time;?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div><!-- End .box -->

			</div>

		</div>

	</div>

</div>