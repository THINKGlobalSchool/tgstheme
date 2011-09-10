<?php
/**
 * User Picker.  Sends an array of user guids.
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['value'] The current value, if any
 * @uses $vars['internalname'] The name of the input field
 *
 *
 * pops up defaulted to lazy load friends lists in paginated alphabetical order.
 * upon
 *
 * As users are checked they move down to a "users" box.
 * When this happens, a hidden input is created also.
 * 	{$internalnal}[] with the value th GUID.
 *
 */

global $user_picker_js_sent;

function user_picker_add_user($user_id, $name) {
	$user = get_entity($user_id);
	if (!$user || !($user instanceof ElggUser)) {
		return FALSE;
	}
	
	$icon = $user->getIconURL('tiny');
	
	$code = '<li class="user-picker-entry">';
	$code .= "<img class=\"livesearch_icon\" src=\"$icon\" />";
	$code .= "$user->name - $user->username";
	$code .= '<ul class="elgg-menu elgg-menu-entity"><li style="border-top: 0px;">';
	$code .= "<a onclick=\"userPickerRemoveUser(this, $user_id)\"><span class='elgg-icon elgg-icon-delete'></span></a>";
	$code .= '</li></ul>';
	$code .= "<input type=\"hidden\" name=\"{$name}[]\" value=\"$user_id\">";
	$code .= '</li>';
	
	return $code;
}

// loop over all values and prepare them so that "in" will work in javascript
$values = array();
if (!is_array($vars['value'])) {
	$vars['value'] = array($vars['value']);
}
foreach ($vars['value'] as $value) {
	$values[$value] = TRUE;
}

// convert the values to a json-encoded list
$json_values = json_encode($values);

if (!$user_picker_js_sent) {
?>
<!-- User picker JS -->
<script type="text/javascript" src="<?php echo elgg_get_site_url(); ?>vendors/jquery/jquery.autocomplete.min.js"></script>
<script type="text/javascript">
// set up a few required variables
userPickerURL = '<?php echo elgg_get_site_url() ?>livesearch';
userList = <?php echo $json_values ?>;

function userPickerBindEvents() {
	// binding autocomplete.
	// doing this as an each so we can past this to functions.
	$('.user-picker .search').each(function (i, e) {
		userPickerBindAutocomplete(e);
	});

	// changing friends vs all users.
	$('.user-picker .all_users').click(function() {
		// update the extra params for the autocomplete.
		var e = $(this).parents('.user-picker').find('.search');
		var params = userPickerGetSearchParams(e);
		e.setOptions({extraParams: params});
		e.flushCache();
	});

	// hitting enter on the text field
//	$('.user-picker .search').bind($.browser.opera ? "keypress" : "keydown", function(event) {
//		if(event.keyCode == 13) {
////			console.log($(this).val());
//			userPickerAddUser(this);
//		}
//	});
}

function userPickerBindAutocomplete(e) {
	var params = userPickerGetSearchParams(e);

	$(e).autocomplete(userPickerURL, {
		extraParams: params,
		max: 25,
		minChars: 2,
		matchContains: false,
		autoFill: false,
		formatItem: userPickerFormatItem,
		formatResult: function (row, i, max) {
			eval("var info = " + row + ";");
			// returning the just name
			return info.name;
		}
	});

	// add users when a result is picked.
	$(e).result(userPickerAddUser);
}

function userPickerFormatItem(row, i, max, term) {
	eval("var info = " + row + ";");
	var r = '';
	var name = info.name.replace(new RegExp("(" + term + ")", "gi"), "<span class=\"user-picker_highlight\">$1</b>");
	var desc = info.desc.replace(new RegExp("(" + term + ")", "gi"), "<span class=\"user-picker_highlight\">$1</b>");

	switch (info.type) {
		case 'user':
		case 'group':
			r = info.icon + name + ' - ' + desc;
			break;

		default:
			r = name + ' - ' + desc;
			break;
	}
	return r;
	//return r.replace(new RegExp("(" + term + ")", "gi"), "<span class=\"user-picker_highlight\">$1</b>");
}

function userPickerAddUser(event, data, formatted) {
	eval("var info = " + data + ";");
	
	// do not allow users to be added multiple times
	if (!(info.guid in userList)) {
		userList[info.guid] = true;
	
		var picker = $(this).parent('.user-picker');
		var users = picker.find('.users');
		var internalName = picker.find('input.internalname').val();
		// not sure why formatted isn't.
		var formatted = userPickerFormatItem(data);

		// add guid as hidden input and to list.
		var li = formatted + ' <ul class="elgg-menu elgg-menu-entity"><li style="border-top: 0px;"><a onclick="userPickerRemoveUser(this, ' + info.guid + ')"><span class="elgg-icon elgg-icon-delete"></span></a></li></ul>'
		+ '<input type="hidden" name="' + internalName + '[]" value="' + info.guid + '" />';
		$('<li class="user-picker-entry">').html(li).appendTo(users);

		$(this).val('');
	}
}

function userPickerRemoveUser(link, guid) {
	$(link).parents('.user-picker-entry').remove();
}

function userPickerGetSearchParams(e) {
	if ($(e).parent().find('.all_users').attr('checked')) {
		return {'match_on[]': 'friends'};
	} else {
		return {'match_on[]': 'users'};
	}
}

$(document).ready(function() {
	userPickerBindEvents();
});
</script>
<?php
	$user_picker_js_sent = true;
}

// create an HTML list of users
$user_list = '';
foreach ($vars['value'] as $user_id) {
	$user_list .= user_picker_add_user($user_id, $vars['internalname']);
} 

?>
<style type='text/css'>
.user_picker .user_picker_entry {
	clear:both;
	height:25px;
	padding:5px;
	margin-top:5px;
	border-bottom:1px solid #cccccc;
}
.user_picker_entry .delete_button {
	margin-right:10px;
}
.livesearch_icon {
	float:left;
	padding-right:10px;
}

/* autocomplete / live search */
.ac_results {
	background-color:white;
	border:1px solid #cccccc;
	overflow:hidden;
	padding:0;
	z-index:99999;
	-webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	-moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45); 
}
.ac_results ul {
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin:0;
	padding:0;
	width:100%;
}
.ac_results li {
	cursor:default;
	display:block;
	line-height:16px;
	margin:0;
	overflow:hidden;
	padding:2px 5px;
	font: menu;
	font-size: 12px;
}
.ac_loading {
	background:transparent url("<?php echo $vars['url']; ?>mod/shared_access/graphics/indicator.gif") no-repeat scroll right center;
}
.ac_odd {
	background-color:white;
}
.ac_over {
	background-color: #333333;
	color: white;	
}
.autocomplete {
	width:300px;
}
.livesearch_icon {
	float:left;
	padding-right:10px;
}
ul.users {
	list-style: none;
	margin:0;
	padding:0;
}
ul.users li:first-child {
	border-top:1px solid #cccccc;
}
.ac_input {
	width: 200px;
}
.ac_results strong {
	color:#1EADE6;
	font-weight:bold;
}
</style>
<div class="user-picker">
	<input class="internalname" type="hidden" name="internalname" value="<?php echo $vars['internalname']; ?>" />
	<input type="hidden" name="<?php echo $vars['internalname']; ?>" />
	<input class="search" type="text" name="user_search" size="30"/>
	<span class="controls">
		<label><input class="all_users" type="checkbox" name="match_on" value="true" /><?php echo elgg_echo('userpicker:only_friends'); ?></label>
	</span>
	<div class="results">
		<!-- This space will be filled with users, checkboxes and magic. -->
	</div>
	<ul class="users"><?php echo $user_list; ?></ul>
</div>