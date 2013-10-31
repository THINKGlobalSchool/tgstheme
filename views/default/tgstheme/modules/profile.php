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

$body = <<<HTML
	<table class='tgstheme-profile'> 
		<tr>
			<td class='profile-left'>
				<div class="tgstheme-profile-icon">
					{$icon}
				</div>
			</td>
			<td class='profile-right'>
				<div class='tgstheme-profile-details'>
					$stats
				</div>
			</td>
		</tr>
	</table>
HTML;

$body .= elgg_view('tgstheme/modules/publish');

$options = array(
	'class' => 'tgstheme-module tgstheme-profile-module',
);

echo elgg_view_module('', '', $body, $options);

