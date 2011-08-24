<?php
/**
 * TGS Theme 2 Profile Module
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */

$user = elgg_get_logged_in_user_entity();

$icon = elgg_view_entity_icon($user, 'medium');

$username = $user->username;

$stats = elgg_view('tgstheme/stats', $vars);

$view_label = elgg_echo('tgstheme:label:viewprofile');
$edit_label = elgg_echo('avatar:edit');
$edit_url = elgg_get_site_url() . 'avatar/edit/' . $user->username;

$body = <<<HTML
	<table class='tgstheme-profile'> 
		<tr>
			<td class='profile-left'>
				<div class="tgstheme-profile-icon">
					{$icon}
				</div>
				<p class='elgg-subtext'>{$user->briefdescription}</p>
			</td>
			<td class='profile-right'>
				<div class='tgstheme-profile-details'>
					$stats
				</div>
				<div class='tgstheme-profile-links'>
					<a href='{$user->getURL()}'>$view_label</a> | 
					<a href='$edit_url'>$edit_label</a>
				</div>
			</td>
		</tr>
	</table>
HTML;

$options = array(
	'class' => 'tgstheme-module',
);

echo elgg_view_module('featured', elgg_echo('tgstheme:label:welcome', array($user->name)), $body, $options);