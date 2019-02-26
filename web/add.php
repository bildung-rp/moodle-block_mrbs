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
global $CFG, $PAGE, $DB;

require "config.inc.php";
require "functions.php";
require_once "mrbs_rlp_auth.php";
=======
require "config.inc.php";
require "functions.php";
require_once "mrbs_auth.php";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

$type = required_param('type', PARAM_ALPHA);
$name = required_param('name', PARAM_TEXT);
$description = optional_param('description', '', PARAM_TEXT);
$capacity = optional_param('capacity', 0, PARAM_INT);
$area = optional_param('area', 0, PARAM_INT);

$thisurl = new moodle_url('/blocks/mrbs_rlp/web/add.php', ['type' => $type, 'name' => $name]);
if (!empty($description)) {
    $thisurl->param('description', $description);
}
if ($capacity) {
    $thisurl->param('capacity', $capacity);
}
if ($area) {
    $thisurl->param('area', $area);
}
$PAGE->set_url($thisurl);

require_login();
if (!getAuthorised(2)) {
    showAccessDenied($day, $month, $year, $area);
    exit();
}
if (!confirm_sesskey()) {
    error('Invalid sesskey');
}

// This file is for adding new areas/rooms
// we need to do different things depending on if its a room
// or an area

if ($type == "area") {
    $newarea = new stdClass;
    $newarea->area_name = $name;
    $area = $DB->insert_record('block_mrbs_rlp_area', $newarea);
}

if ($type == "room") {
    $newroom = new stdClass;
    $newroom->room_name = $name;
    $newroom->description = $description;
    $newroom->capacity = $capacity;
    $newroom->area_id = $area;
    $DB->insert_record('block_mrbs_rlp_room', $newroom);
}

redirect(new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['area' => $area]));
