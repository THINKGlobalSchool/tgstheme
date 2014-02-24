<?php 
/**
 * Group entity view 
 * 
 * OVERRIDE
 * 
 * @package ElggGroups
 */
  
$group = $vars['entity'];
  
$icon = elgg_view_entity_icon($group, 'large');
  
$metadata = elgg_view_menu('entity', array(
    'entity' => $group,
    'handler' => 'groups',
    'sort_by' => 'priority',
    'class' => 'elgg-menu-hz',
));
  
if (elgg_in_context('owner_block') || elgg_in_context('widgets')) {
    $metadata = '';
}
  
if ($vars['full_view']) {
    echo elgg_view('groups/profile/summary', $vars);
} else {
    // brief view
    $params = array(
        'entity' => $group,
        'metadata' => $metadata,
       // 'subtitle' => $group->briefdescription,
    );
    $params = $params + $vars;
    $list_body = elgg_view('group/elements/summary', $params);

    $vars['header'] = $list_body;
    $vars['image'] = $icon;
    //$vars['footer'] = elgg_view('tgstheme/group_summary');
    echo elgg_view('page/components/group_image_block', $vars);
}
