			<div class="span2">
				<div class="email-nav well">
					<ul class="nav nav-list">
						<li class="nav-header">
							Inbox
						</li>

						<li <?php if($this->uri->segment(3) == Null | $this->uri->segment('3') == 'inbox'){ echo 'class="active"';};?> >
							<a href="<?=base_url('lunar/mail/inbox');?>"><i class="splashy-mail_light_down"></i> Inbox</a>
						</li>

						<li <?php if($this->uri->segment('3') == 'system'){ echo 'class="active"';};?>>
							<a href="<?=base_url('lunar/mail/system');?>"><i class="splashy-mail_light_stuffed"></i> System Mail</a>
						</li>

						<li <?php if($this->uri->segment('3') == 'notifications'){ echo 'class="active"';};?>>
							<a href="<?=base_url('lunar/mail/notifications');?>"><i class="splashy-mail_light_new_2"></i> Notifications</a>
						</li>

						<li class="nav-header">
							Outbox
						</li>

						<li <?php if($this->uri->segment('3') == 'outbox'){ echo 'class="active"';};?>>
							<a href="<?=base_url('lunar/mail/outbox');?>"><i class="splashy-mail_light_up"></i> Sent mail</a>
						</li>

						<li class="divider"></li>

						<li <?php if($this->uri->segment('3') == 'drafts'){ echo 'class="active"';};?>>
							<a href="#"><i class="splashy-documents_add"></i> Drafts</a>
						</li>

						<li class="divider"></li>

						<li <?php if($this->uri->segment('3') == 'archive'){ echo 'class="active"';};?>>
							<a href="<?=base_url('lunar/mail/archive');?>"><i class="splashy-folder_classic_opened_stuffed"></i> Archive</a>
						</li>

						<li <?php if($this->uri->segment('3') == 'trash'){ echo 'class="active"';};?>>
							<a href="<?=base_url('lunar/mail/trash');?>"><i class="eco-trashcan"></i> Trash</a>
						</li>

					</ul>
				</div><!-- End .email-nav-->
			</div><!-- End .span2-->
