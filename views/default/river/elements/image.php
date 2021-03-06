<?php
/**
 * Elgg river image
 *
 * Displayed next to the body of each river item
 *
 * @uses $vars['item']
 */

$subject = $vars['item']->getSubjectEntity();

if (elgg_in_context('widgets')) {
	echo elgg_view_entity_icon($subject, 'tiny');
} else {
	if (elgg_instanceof($subject, 'user')) {
		echo elgg_view_entity_icon($subject, 'medium');
	} else {
		echo elgg_view_entity_icon($subject, 'small');
	}
}
