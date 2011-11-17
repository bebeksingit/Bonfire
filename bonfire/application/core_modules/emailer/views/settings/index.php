<?php echo form_open(SITE_AREA .'/settings/emailer', 'class="constrained"'); ?>
	
<fieldset>
	<legend>General Settings</legend>

	<div class="clearfix <?php echo form_has_error('sender_email') ? 'error' : ''; ?>">
		<label for="sender_email"><?php echo lang('em_system_email'); ?></label>
		<div class="input">
			<input type="email" name="sender_email" class="medium" value="<?php echo isset($sender_email) ? $sender_email : set_value('sender_email') ?>" />
			<span class="help-inline"><?php echo form_error('sender_email') ? form_error('sender_email') : lang('em_system_email_note'); ?></span>
		</div>
	</div>
	
	<div class="clearfix">
		<label for="mailtype"><?php echo lang('em_email_type'); ?></label>
		<div class="input">
			<select name="mailtype">
				<option value="text" <?php echo isset($mailtype) && $mailtype == 'text' ? 'selected="selected"' : ''; ?>>Text</option>
				<option value="html" <?php echo isset($mailtype) && $mailtype == 'html' ? 'selected="selected"' : ''; ?>>HTML</option>
			</select>
		</div>
	</div>
	
	<div class="clearfix">
		<label for="protocol"><?php echo lang('em_email_server'); ?></label>
		<div class="input">
			<select name="protocol" id="server_type">
				<option <?php echo isset($protocol) && $protocol == 'mail' ? 'selected="selected"' : ''; ?>>mail</option>
				<option <?php echo isset($protocol) && $protocol == 'sendmail' ? 'selected="selected"' : ''; ?>>sendmail</option>
				<option <?php echo isset($protocol) && $protocol == 'smtp' ? 'selected="selected"' : ''; ?>>SMTP</option>
			</select>
		</div>
	</div>
</fieldset>
	
<fieldset>
	<legend><?php echo lang('em_settings'); ?></legend>
	<!-- PHP Mail -->
	<div id="mail" class="clearfix input">
		<p><?php echo lang('em_settings_note'); ?></p>
	</div>

	<!-- Sendmail -->
	<div id="sendmail" class="clearfix <?php echo form_has_error('mailpath') ? 'error' : ''; ?>">
		<label for="mailpath">Sendmail <?php echo lang('em_location'); ?></label>
		<div class="input">
			<input type="text" name="mailpath" class="medium" value="<?php echo isset($mailpath) ? $mailpath : '/usr/sbin/sendmail' ?>" />
			<span class="help-inline"><?php echo form_error('mailpath'); ?></span>
		</div>
	</div>
	
	<!-- SMTP -->
	<div id="smtp">
	
		<div class="clearfix <?php echo form_has_error('smtp_host') ? 'error' : ''; ?>">
			<label for="smtp_host">SMTP <?php echo lang('em_server_address'); ?></label>
			<div class="input">
				<input type="text" name="smtp_host" class="medium" value="<?php echo isset($smtp_host) ? $smtp_host : set_value('smtp_host') ?>" />
				<span class="help-inline"><?php echo form_error('smtp_host'); ?></span>
			</div>
		</div>

		<div class="clearfix <?php echo form_has_error('smtp_user') ? 'error' : ''; ?>">
			<label for="smtp_user">SMTP <?php echo lang('bf_username'); ?></label>
			<div class="input">
				<input type="text" name="smtp_user" class="medium" value="<?php echo isset($smtp_user) ? $smtp_user : set_value('smtp_user') ?>" />
				<span class="help-inline"><?php echo form_error('smtp_user'); ?></span>
			</div>
		</div>
		
		<div class="clearfix <?php echo form_has_error('smtp_pass') ? 'error' : ''; ?>">
			<label for="smtp_pass">SMTP <?php echo lang('bf_password'); ?></label>
			<div class="input">
				<input type="text" name="smtp_pass" class="medium" value="<?php echo isset($smtp_pass) ? $smtp_pass : set_value('smtp_pass') ?>" />
				<span class="help-inline"><?php echo form_error('smtp_pass'); ?></span>
			</div>
		</div>
		
		<div class="clearfix <?php echo form_has_error('smtp_port') ? 'error' : ''; ?>">
			<label for="smtp_port">SMTP <?php echo lang('em_port'); ?></label>
			<div class="input">
				<input type="text" name="smtp_port" class="medium" value="<?php echo isset($smtp_port) ? $smtp_port : set_value('smtp_port') ?>" />
				<span class="help-inline"><?php echo form_error('smtp_port'); ?></span>
			</div>
		</div>
		
		<div class="clearfix <?php echo form_has_error('smtp_timeout') ? 'error' : ''; ?>">
			<label for="smptp_timeout">SMTP <?php echo lang('em_timeout_secs'); ?></label>
			<div class="input">
				<input type="text" name="smtp_timeout" class="medium" value="<?php echo isset($smtp_timeout) ? $smtp_timeout : set_value('smtp_timeout') ?>" />
				<span class="help-inline"><?php echo form_error('smtp_timeout'); ?></span>
			</div>
		</div>
	</div>
</fieldset>

<div class="actions">
	<input type="submit" name="submit" class="btn primary" value="Save Settings" />
</div>

<?php echo form_close(); ?>

<!-- Test Settings -->
<h3><?php echo lang('em_test_header'); ?></h3>

<p><?php echo lang('em_test_intro'); ?></p>

<?php echo form_open(SITE_AREA .'/settings/emailer/test', array('class' => 'ajax-form', 'id'=>'test-form')); ?>
	
	<br/>
	<div class="clearfix">
		<label for="email"><?php echo lang('bf_email'); ?></label>
		<div class="input">
			<input type="email" name="test_email" id="test-email" value="<?php echo config_item('site.system_email') ?>" /> 
			<input type="submit" name="submit" class="btn" value="<?php echo lang('em_test_button'); ?>" />
		</div>
	</div>
	
	<div id="test-ajax"></div>

<?php echo form_close(); ?>
