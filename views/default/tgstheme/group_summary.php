<?php
/**
 * Owner block extension
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

$page_owner = elgg_get_page_owner_entity();

if (elgg_instanceof($page_owner, 'group') && elgg_in_context('groups')) {
	$group_owner = $page_owner->getOwnerEntity();

?>
	<hr />
	<div class='elgg-subtext'>
		<?php echo elgg_echo("groups:owner"); ?>:
		<?php
			echo elgg_view('output/url', array(
				'text' => $group_owner->name,
				'value' => $group_owner->getURL(),
				'is_trusted' => true,
			));
		?>
	</div>
	<div class='elgg-subtext'>
	<?php
		echo elgg_echo('groups:members') . ": " . $page_owner->getMembers(0, 0, TRUE);
	?>
	</div>
<?php
}
