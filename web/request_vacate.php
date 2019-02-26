<?php

// This file is part of the MRBS block for Moodle
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
<<<<<<< HEAD
global $USER;
=======
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

$messagelang = new stdClass();
$messagelang->user = $USER->firstname . ' ' . $USER->lastname;
if (empty($description)) {
    $messagelang->description = $name;
} else {
    $messagelang->description = $description;
}
$messagelang->room = $room_name;
$messagelang->datetime = $start_date;
$url = new moodle_url('/blocks/mrbs_rlp/web/edit_entry.php', ['id' => $id]);
$messagelang->href = $url->out();
$message = "$USER->firstname $USER->lastname requests that you move $description from room $room_name, $start_date. Please contact them to discuss this.\n\n[Give a reason]";
$context = context_system::instance();
<<<<<<< HEAD
if (has_capability('block/mrbs_rlp:editmrbs_rlp', $context) or has_capability('block/mrbs_rlp:administermrbs_rlp', $context)) {
    echo '<br><br><a href=# onClick="requestVacate.style.visibility=\'visible\';">' . get_string('requestvacate', 'block_mrbs_rlp') . '</a>
=======

if (has_capability('block/mrbs:editmrbs', $context) or has_capability('block/mrbs:administermrbs', $context)) {
    echo'<br><br><a href=# onClick="requestVacate.style.visibility=\'visible\';">' . get_string('requestvacate', 'block_mrbs') . '</a>
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
        <form id="editing" method="post" action="request_vacate_send.php">
        <div id="request_vacate">
        <input type="hidden" name="id" value="' . $booking->userid . '" />
        <input type="hidden" name="sesskey" value="' . sesskey() . '" />';
<<<<<<< HEAD
    print_textarea(true, 15, 350, 0, 0, 'message', get_string('requestvacatemessage_html', 'block_mrbs_rlp', $messagelang));
    echo '<input type="hidden" name="format" value="' . FORMAT_HTML . '" />';
    //<textarea name = "message" cols=50 rows=10>'.get_string('requestvacatemessage','block_mrbs_rlp',$messagelang).'</textarea>
    echo '<input type="hidden" name="format" value="' . FORMAT_MOODLE . '" />
=======
//    $usehtmleditor = (can_use_html_editor());
//    if ($usehtmleditor) {
//        print_textarea($usehtmleditor, 15, 350, 0, 0, 'message', get_string('requestvacatemessage_html', 'block_mrbs', $messagelang));
//        echo '<input type="hidden" name="format" value="' . FORMAT_HTML . '" />';
//    } else {
//        print_textarea(false, 5, 34, 0, 0, 'message', get_string('requestvacatemessage', 'block_mrbs', $messagelang));
//        echo '<input type="hidden" name="format" value="' . FORMAT_MOODLE . '" />';
//    }

    print_textarea(true, 15, 350, 0, 0, 'message', get_string('requestvacatemessage_html', 'block_mrbs', $messagelang));
    echo '<input type="hidden" name="format" value="' . FORMAT_HTML . '" />';

    //<textarea name = "message" cols=50 rows=10>'.get_string('requestvacatemessage','block_mrbs',$messagelang).'</textarea>
    echo'<input type="hidden" name="format" value="' . FORMAT_MOODLE . '" />
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
        <br /><input type="submit" value="' . get_string('sendmessage', 'message') . '" />
        </div>
        </form>
        <SCRIPT LANGUAGE="JavaScript">
        requestVacate=document.getElementById(\'request_vacate\');
        requestVacate.style.visibility=\'hidden\';
        </SCRIPT>';
}
