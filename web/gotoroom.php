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
global $PAGE;
=======
<<<<<<< HEAD
global $PAGE;
=======
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
include "config.inc.php";
include "functions.php";
require_once('mrbs_rlp_auth.php');
include "mrbs_rlp_sql.php";

$room = required_param('room', PARAM_TEXT);
$day = optional_param('day', 0, PARAM_INT);
$month = optional_param('month', 0, PARAM_INT);
$year = optional_param('year', 0, PARAM_INT);

//If we dont know the right date then make it up
if (($day == 0) or ($month == 0) or ($year == 0)) {
    $day = date("d");
    $month = date("m");
    $year = date("Y");
} else {
    // Make the date valid if day is more then number of days in month
    while (!checkdate(intval($month), intval($day), intval($year))) {
        $day--;
    }
}

<<<<<<< HEAD
$thisurl = new moodle_url('/blocks/mrbs_rlp/web/gotoroom.php', ['day' => $day, 'month' => $month, 'year' => $year, 'room' => $room]);
=======
<<<<<<< HEAD
$thisurl = new moodle_url('/blocks/mrbs_rlp/web/gotoroom.php', ['day' => $day, 'month' => $month, 'year' => $year, 'room' => $room]);
=======
$thisurl = new moodle_url('/blocks/mrbs/web/gotoroom.php', array('day' => $day, 'month' => $month, 'year' => $year, 'room' => $room));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
$PAGE->set_url($thisurl);
require_login();

if (!getAuthorised(1)) {
    showAccessDenied($day, $month, $year, null);
    exit;
}

$sql = "SELECT area_id, area_name FROM {block_mrbs_rlp_room} AS r JOIN {block_mrbs_rlp_area} AS a ON a.id = r.area_id WHERE room_name = ? OR room_name = ?";


<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
$area = $DB->get_record_sql($sql, [$room, '0' . $room], IGNORE_MULTIPLE);
if ($area) {
    $areaurl = new moodle_url('/blocks/mrbs_rlp/web/day.php', ['day' => $day, 'month' => $month, 'year' => $year, 'area' => $area->area_id]);
    redirect($areaurl);
} else {
    $notfoundurl = new moodle_url('/blocks/mrbs_rlp/web/day.php', ['day' => $day, 'month' => $month, 'year' => $year, 'roomnotfound' => $room]);
<<<<<<< HEAD
=======
=======
$area = $DB->get_record_sql($sql, array($room, '0' . $room), IGNORE_MULTIPLE);
if ($area) {
    $areaurl = new moodle_url('/blocks/mrbs/web/day.php', array('day' => $day, 'month' => $month, 'year' => $year, 'area' => $area->area_id));
    redirect($areaurl);
} else {
    $notfoundurl = new moodle_url('/blocks/mrbs/web/day.php', array('day' => $day, 'month' => $month, 'year' => $year, 'roomnotfound' => $room));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
    redirect($notfoundurl);
}
