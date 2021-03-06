<?php
/**
 * Elgg owner block
 * Displays page ownership information
 *
 * OVERRIDE:
 * - Owner block always displayed if page owner is a user/group
 * 
 * @package Elgg
 * @subpackage Core
 *
 */

elgg_push_context('owner_block');

// groups and other users get owner block
$owner = elgg_get_page_owner_entity();
if (($owner instanceof ElggGroup || $owner instanceof ElggUser) && !get_input('owner_block_force_hidden')) {
	
	$class = 'elgg-owner-block';

	if (elgg_in_context('profile') || elgg_in_context('groups') || $owner instanceof ElggGroup) {
		$size = 'large';
		$class .= ' elgg-owner-block-profile';
	}

	$header = elgg_view_entity($owner, array(
		'full_view' => false,
		'size' => $size,
	));

	$body = elgg_view_menu('owner_block', array('entity' => $owner));

	$body .= elgg_view('page/elements/owner_block/extend', $vars);

	echo elgg_view('page/components/module', array(
		'header' => $header,
		'body' => $body,
		'id' => 'badge',
		'class' => $class
	));
}

elgg_pop_context();