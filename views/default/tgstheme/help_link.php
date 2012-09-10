<?php
/**
 * TGS Theme 2 Help Link
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 */

$guid = elgg_get_plugin_setting('help_group', 'tgstheme');
$help_group = get_entity($guid);

if (elgg_instanceof($help_group, 'group')) {
	$help_label = elgg_get_plugin_setting('help_label', 'tgstheme');
	
	$icon_location = elgg_get_site_url() . "mod/tgstheme/_graphics/question-white.png";

	$help_icon = "<img src='$icon_location' class='help-icon'>&nbsp;</img>";

	$help_link = elgg_view('output/url', array(
		'text' => $help_label,
		'href' => $help_group->getURL(),
		'target' => '_blank' 
	));

	$content = <<<HTML
		<div class="help-link-wrapper">
			<div class="help-link-module">
				<div class="elgg-head">
					<h3>{$help_icon}{$help_link}</h3>
				</div>
			</div>
		</div>
HTML;
	echo $content;
}

