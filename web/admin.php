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

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php'); //for Moodle integration
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
global $PAGE, $CFG, $DB;

require "config.inc.php";
require "functions.php";
require_once "mrbs_rlp_auth.php";
<<<<<<< HEAD
=======
=======
require "config.inc.php";
require "functions.php";
require_once "mrbs_auth.php";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0

$day = optional_param('day', 0, PARAM_INT);
$month = optional_param('month', 0, PARAM_INT);
$year = optional_param('year', 0, PARAM_INT);
$area = optional_param('area', 0, PARAM_INT);
$area_name = optional_param('area_name', '', PARAM_TEXT);

if(!empty($area_name)) {
  $area_name =  urldecode($area_name);
}

//If we dont know the right date then make it up
if (($day == 0) or ($month == 0) or ($year == 0)) {
    $day = date("d");
    $month = date("m");
    $year = date("Y");
}

$thisurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['day' => $day, 'month' => $month, 'year' => $year]);
if ($area) {
    $thisurl->param('area', $area);
} else {
    $area = get_default_area();
}

$PAGE->set_url($thisurl);
require_login();

if (!getAuthorised(2)) {
    showAccessDenied($day, $month, $year, $area);
    exit();
}

print_header_mrbs_rlp($day, $month, $year, isset($area) ? $area : "");

// If area is set but area name is not known, get the name.
if ($area) {
    if (empty($area_name)) {
        $dbarea = $DB->get_record('block_mrbs_rlp_area', ['id' => $area], 'area_name', MUST_EXIST);
        $area_name = $dbarea->area_name;
    }
}
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0


echo '<h2>' . get_string('administration') . '</h2>';
echo '<table border=1>';
echo '<tr>';
echo '<th><center><b>' . get_string('areas', 'block_mrbs_rlp') . '</b></center></th>';
echo '<th><center><b>' . get_string('rooms', 'block_mrbs_rlp') . ' ';
if (isset($area_name)) {
    echo get_string('in', 'block_mrbs_rlp') . " " . s($area_name);
<<<<<<< HEAD
=======
=======
echo '<h2>' . get_string('administration') . '</h2>';
echo '<table border=1>';
echo '<tr>';
echo '<th><center><b>' . get_string('areas', 'block_mrbs') . '</b></center></th>';
echo '<th><center><b>' . get_string('rooms', 'block_mrbs') . ' ';
if (isset($area_name)) {
    echo get_string('in', 'block_mrbs') . " " . s($area_name);
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
}
echo '</b></center></th></tr><tr><td class="border">';

// This cell has the areas
$areas = $DB->get_records('block_mrbs_rlp_area', null, 'area_name');

if (empty($areas)) {
    echo get_string('noareas', 'block_mrbs_rlp');
} else {
    echo '<ul>';
    foreach ($areas as $dbarea) {
        $area_name_q = urlencode($dbarea->area_name);
<<<<<<< HEAD
        $adminurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['area' => $dbarea->id, 'area_name' => $area_name_q, 'sesskey' => sesskey()]);
        $editroomurl = new moodle_url('/blocks/mrbs_rlp/web/edit_area_room.php', ['area' => $dbarea->id, 'sesskey' => sesskey()]);
        $delareaurl = new moodle_url('/blocks/mrbs_rlp/web/del.php', ['area' => $dbarea->id, 'type' => 'area', 'sesskey' => sesskey()]);
=======
<<<<<<< HEAD
        $adminurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['area' => $dbarea->id, 'area_name' => $area_name_q, 'sesskey' => sesskey()]);
        $editroomurl = new moodle_url('/blocks/mrbs_rlp/web/edit_area_room.php', ['area' => $dbarea->id, 'sesskey' => sesskey()]);
        $delareaurl = new moodle_url('/blocks/mrbs_rlp/web/del.php', ['area' => $dbarea->id, 'type' => 'area', 'sesskey' => sesskey()]);
=======
        $adminurl = new moodle_url('/blocks/mrbs/web/admin.php', array('area' => $dbarea->id, 'area_name' => $area_name_q, 'sesskey' => sesskey()));
        $editroomurl = new moodle_url('/blocks/mrbs/web/edit_area_room.php', array('area' => $dbarea->id, 'sesskey' => sesskey()));
        $delareaurl = new moodle_url('/blocks/mrbs/web/del.php', array('area' => $dbarea->id, 'type' => 'area', 'sesskey' => sesskey()));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        echo '<li><a href="' . $adminurl . '">' . s($dbarea->area_name) . '</a> (<a href="' . $editroomurl . '">' . get_string('edit') . '</a>) (<a href="' . $delareaurl . '">' . get_string('delete') . "</a>)\n";
    }
    echo "</ul>";
}
echo '</td><td class="border">';

// This one has the rooms
if ($area) {
    $rooms = $DB->get_records('block_mrbs_rlp_room', ['area_id' => $area], 'room_name');
    if (empty($rooms)) {
        //    $res = sql_query("select id, room_name, description, capacity from $tbl_room where area_id=$area order by room_name");
        echo get_string('norooms', 'block_mrbs_rlp');
    } else {
        echo '<ul>';
        foreach ($rooms as $dbroom) {
<<<<<<< HEAD
            $editroomurl = new moodle_url('/blocks/mrbs_rlp/web/edit_area_room.php', ['room' => $dbroom->id, 'sesskey' => sesskey()]);
            $delroomurl = new moodle_url('/blocks/mrbs_rlp/web/del.php', ['area' => $area, 'room' => $dbroom->id, 'type' => 'room', 'sesskey' => sesskey()]);
=======
<<<<<<< HEAD
            $editroomurl = new moodle_url('/blocks/mrbs_rlp/web/edit_area_room.php', ['room' => $dbroom->id, 'sesskey' => sesskey()]);
            $delroomurl = new moodle_url('/blocks/mrbs_rlp/web/del.php', ['area' => $area, 'room' => $dbroom->id, 'type' => 'room', 'sesskey' => sesskey()]);
=======
            $editroomurl = new moodle_url('/blocks/mrbs/web/edit_area_room.php', array('room' => $dbroom->id, 'sesskey' => sesskey()));
            $delroomurl = new moodle_url('/blocks/mrbs/web/del.php', array('area' => $area, 'room' => $dbroom->id, 'type' => 'room', 'sesskey' => sesskey()));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
            echo '<li>' . s($dbroom->room_name) . ' (' . s($dbroom->description) . ', ' . $dbroom->capacity . ') (<a href="' . $editroomurl . '">' . get_string('edit') . '</a>) (<a href="' . $delroomurl . '">' . get_string('delete') . "</a>)\n";
        }
        echo '</ul>';
    }
} else {
    echo get_string('noarea', 'block_mrbs_rlp');
}

$addareaurl = new moodle_url('/blocks/mrbs_rlp/web/add.php', ['type' => 'area', 'sesskey' => sesskey()]);
$addroomurl = new moodle_url($addareaurl, ['type' => 'room', 'area' => $area]);

<<<<<<< HEAD
echo '</tr><tr><td class="border"><h3 ALIGN=CENTER>' . get_string('addarea', 'block_mrbs_rlp') . '</h3>';
=======
<<<<<<< HEAD
echo '</tr><tr><td class="border"><h3 ALIGN=CENTER>' . get_string('addarea', 'block_mrbs_rlp') . '</h3>';
echo '<form action="' . ($addareaurl->out_omit_querystring()) . '" method="post">';
echo html_writer::input_hidden_params($addareaurl);
echo '<table><tr><td>' . get_string('name') . '</td><td><input type=text name=name></td></tr></table>';
echo '<input type=submit value="' . get_string('addarea', 'block_mrbs_rlp') . '"></form></td><td class="border">';
if (0 != $area) {
    echo '<h3 align=center>' . get_string('addroom', 'block_mrbs_rlp') . '</h3>';
=======
echo '</tr><tr><td class="border"><h3 ALIGN=CENTER>' . get_string('addarea', 'block_mrbs') . '</h3>';
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
echo '<form action="' . ($addareaurl->out_omit_querystring()) . '" method="post">';
echo html_writer::input_hidden_params($addareaurl);
echo '<table><tr><td>' . get_string('name') . '</td><td><input type=text name=name></td></tr></table>';
echo '<input type=submit value="' . get_string('addarea', 'block_mrbs') . '"></form></td><td class="border">';
if (0 != $area) {
<<<<<<< HEAD
    echo '<h3 align=center>' . get_string('addroom', 'block_mrbs_rlp') . '</h3>';
=======
    echo '<h3 align=center>' . get_string('addroom', 'block_mrbs') . '</h3>';
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
    echo '<form action="' . $addroomurl->out_omit_querystring() . '" method="post">';
    echo html_writer::input_hidden_params($addroomurl);
    echo '<table><tr><td>' . get_string('name') . ': </td><td><input type="text" name="name"></td></tr>';
    echo '<tr><td>' . get_string('description') . ': </td><td><input type="text" name="description"></td></tr>';
<<<<<<< HEAD
    echo '<tr><td>' . get_string('capacity', 'block_mrbs_rlp') . ': </td><td><input type="text" name="capacity"></td></tr>';
    echo '</table><input type=submit value="' . get_string('addroom', 'block_mrbs_rlp') . '"></form>';
=======
<<<<<<< HEAD
    echo '<tr><td>' . get_string('capacity', 'block_mrbs_rlp') . ': </td><td><input type="text" name="capacity"></td></tr>';
    echo '</table><input type=submit value="' . get_string('addroom', 'block_mrbs_rlp') . '"></form>';
=======
    echo '<tr><td>' . get_string('capacity', 'block_mrbs') . ': </td><td><input type="text" name="capacity"></td></tr>';
    echo '</table><input type=submit value="' . get_string('addroom', 'block_mrbs') . '"></form>';
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
} else {
    echo "&nbsp;";
}
echo '</td></tr></table>';

<<<<<<< HEAD
$entries = $DB->get_records('block_mrbs_rlp_entry');
=======
<<<<<<< HEAD
$entries = $DB->get_records('block_mrbs_rlp_entry');
$id = 1;
echo '<br /><p><strong>Anzahl Einträge (gesamt):</strong> ' . count($entries) . '</p>';
$delurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['delete' => true, 'sesskey' => sesskey()]);
echo "<NOSCRIPT><a id=\"dellink\" HREF=\"" . $delurl . "\">Alle Einträge löschen?</A> <em>(Warnung: Dadurch gehen alle Einträge verloren!)</em></NOSCRIPT>"
 . "<script type=\"text/javascript\">document.writeln('<a href=\"#\" onClick=\"if(confirm(\'" . get_string('confirmdel', 'block_mrbs_rlp') . "\')){document.location=\'" . $delurl . "\';}\">Alle Einträge löschen?</a> <em>(<strong>Warnung:</strong> Dadurch gehen alle Einträge verloren!)</em>');
</script>";

$chkdelete = optional_param('delete', false, PARAM_BOOL);
if ($chkdelete === 1 || $chkdelete === true) {
    $DB->delete_records('block_mrbs_rlp_entry');
}

//echo '<br />'.get_string('browserlang','block_mrbs_rlp').' '.$HTTP_ACCEPT_LANGUAGE.' '.get_string('postbrowserlang','block_mrbs_rlp');
=======
$entries = $DB->get_records('block_mrbs_entry');
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
$id = 1;
echo '<br /><p><strong>Anzahl Einträge (gesamt):</strong> ' . count($entries) . '</p>';
$delurl = new moodle_url('/blocks/mrbs/web/admin.php', array('delete' => true, 'sesskey' => sesskey()));
echo "<NOSCRIPT><a id=\"dellink\" HREF=\"" . $delurl . "\">Alle Einträge löschen?</A> <em>(Warnung: Dadurch gehen alle Einträge verloren!)</em></NOSCRIPT>"
 . "<script type=\"text/javascript\">document.writeln('<a href=\"#\" onClick=\"if(confirm(\'" . get_string('confirmdel', 'block_mrbs') . "\')){document.location=\'" . $delurl . "\';}\">Alle Einträge löschen?</a> <em>(<strong>Warnung:</strong> Dadurch gehen alle Einträge verloren!)</em>');
</script>";

$chkdelete = optional_param('delete', false, PARAM_BOOL);
if($chkdelete === 1 || $chkdelete === true) {
    $DB->delete_records('block_mrbs_entry');    
}

<<<<<<< HEAD
//echo '<br />'.get_string('browserlang','block_mrbs_rlp').' '.$HTTP_ACCEPT_LANGUAGE.' '.get_string('postbrowserlang','block_mrbs_rlp');
=======
//echo '<br />'.get_string('browserlang','block_mrbs').' '.$HTTP_ACCEPT_LANGUAGE.' '.get_string('postbrowserlang','block_mrbs');
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
include 'trailer.php';
