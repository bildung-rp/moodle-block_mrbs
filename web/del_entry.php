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
global $PAGE, $DB, $USER;
include "config.inc.php";
include "functions.php";
require_once "mrbs_rlp_auth.php";
include "mrbs_rlp_sql.php";
=======
include "config.inc.php";
include "functions.php";
require_once "mrbs_auth.php";
include "mrbs_sql.php";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

$id = required_param('id', PARAM_INT);
$series = optional_param('series', 0, PARAM_INT);

$PAGE->set_url('/blocks/mrbs_rlp/web/del_entry.php', ['id' => $id]);
require_login();

if (!confirm_sesskey()) {
    error('Invalid sesskey');
}

if (getAuthorised(1) && ($info = mrbs_rlpGetEntryInfo($id))) {
    $day = userdate($info->start_time, "%d");
    $month = userdate($info->start_time, "%m");
    $year = userdate($info->start_time, "%Y");
    $area = mrbs_rlpGetRoomArea($info->room_id);

    if (MAIL_ADMIN_ON_DELETE) { // Gather all fields values for use in emails.
        $mail_previous = getPreviousEntryData($id, $series);
    }
    $roomadmin = false;
    $context = context_system::instance();
<<<<<<< HEAD

    if (has_capability('block/mrbs_rlp:editmrbs_rlpunconfirmed', $context, null, false)) {
        $adminemail = $DB->get_field('block_mrbs_rlp_room', 'room_admin_email', ['id' => $info->room_id]);
=======
    
    if (has_capability('block/mrbs:editmrbsunconfirmed', $context, null, false)) {
        $adminemail = $DB->get_field('block_mrbs_room', 'room_admin_email', array('id' => $info->room_id));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
        if ($adminemail == $USER->email) {
            $roomadmin = true;
        }
    }
    $result = mrbs_rlpDelEntry(getUserName(), $id, $series, 1, $roomadmin);

    if ($result) {
        // Send a mail to the Administrator
        (MAIL_ADMIN_ON_DELETE) ? $result = notifyAdminOnDelete($mail_previous) : '';
<<<<<<< HEAD
        $desturl = new moodle_url('/blocks/mrbs_rlp/web/day.php', ['day' => $day, 'month' => $month, 'year' => $year, 'area' => $area]);
=======
        $desturl = new moodle_url('/blocks/mrbs/web/day.php', array('day' => $day, 'month' => $month, 'year' => $year, 'area' => $area));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
        redirect($desturl);
        exit();
    }
}

// If you got this far then we got an access denied.
showAccessDenied($day, $month, $year, $area);
