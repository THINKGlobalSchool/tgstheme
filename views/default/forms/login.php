<?php
/**
 * Elgg login form
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<div>
	<label><?php echo elgg_echo('loginusername'); ?></label>
	<?php echo elgg_view('input/text', array(
		'name' => 'username',
		'class' => 'autofocus',
		));
	?>
</div>
<div>
	<label><?php echo elgg_echo('password'); ?></label>
	<?php echo elgg_view('input/password', array('name' => 'password')); ?>
</div>

<?php echo elgg_view('login/extend', $vars); ?>

<div>
	<label>
		<input type="checkbox" name="persistent" value="true" />
		<?php echo elgg_echo('user:persistent'); ?>
	</label>
</div>
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('login'))); ?>
	
	<?php 
	if (isset($vars['returntoreferer'])) {
		echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
	}
	?>

	<ul class="elgg-menu elgg-menu-general float-alt" style='font-size: 11px; text-align: right;'>
	<?php
		if (elgg_get_config('allow_registration')) {
			echo '<li style="margin-top: -4px;"><a class="registration_link" href="' . elgg_get_site_url() . 'register">' . elgg_echo('register') . '</a></li>';
		} else {
			$forgot_style = "style='margin-top: 6px'";
		}
	?>
		<li <?php echo $forgot_style; ?>><a class="forgot_link" href="<?php echo elgg_get_site_url(); ?>forgotpassword">
			<?php echo elgg_echo('user:password:lost'); ?>
		</a></li>
	</ul>

