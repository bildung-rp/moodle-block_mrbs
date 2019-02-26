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
global $PAGE, $DB;

include "config.inc.php";
include "functions.php";
require_once "mrbs_rlp_auth.php";
<<<<<<< HEAD
=======
=======
include "config.inc.php";
include "functions.php";
require_once "mrbs_auth.php";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0

require_login();
$day = optional_param('day', 0, PARAM_INT);
$month = optional_param('month', 0, PARAM_INT);
$year = optional_param('year', 0, PARAM_INT);
$area = optional_param('area', 0, PARAM_INT);
$room = optional_param('room', 0, PARAM_INT);
$type = required_param('type', PARAM_ALPHA);
$confirm = optional_param('confirm', 0, PARAM_BOOL);

//If we dont know the right date then make it up
if (($day == 0) or ($month == 0) or ($year == 0)) {
    $day = date("d");
    $month = date("m");
    $year = date("Y");
}

$thisurl = new moodle_url('/blocks/mrbs_rlp/web/del.php', ['day' => $day, 'month' => $month, 'year' => $year, 'type' => $type]);
if ($area) {
    $thisurl->param('area', $area);
} else {
    $area = get_default_area();
}
if ($room) {
    $thisurl->param('room', $room);
}
if ($confirm) {
    $thisurl->param('confirm', $confirm);
}
$PAGE->set_url($thisurl);
require_login();

if (!getAuthorised(2)) {
    showAccessDenied($day, $month, $year, $area);
    exit();
}
require_sesskey();

$adminurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php');

// This is gonna blast away something. We want them to be really
// really sure that this is what they want to do.

if ($type == "room") {
    $adminurl->param('area', $area);

    // We are supposed to delete a room
    if ($confirm) {
        // Delete bookings
        $DB->delete_records('block_mrbs_rlp_entry', ['room_id' => $room]);

        // Delete the room
        $DB->delete_records('block_mrbs_rlp_room', ['id' => $room]);

        // Go back to the admin page
        redirect($adminurl);
    } else {
        print_header_mrbs_rlp($day, $month, $year, $area);

        // We tell them how bad what theyre about to do is
        // Find out how many appointments would be deleted

        $bookings = $DB->get_records('block_mrbs_rlp_entry', ['room_id' => $room]);
        if (!empty($bookings)) {
<<<<<<< HEAD
            echo get_string('deletefollowing', 'block_mrbs_rlp') . ":<ul>";
=======
<<<<<<< HEAD
            echo get_string('deletefollowing', 'block_mrbs_rlp') . ":<ul>";
=======
            echo get_string('deletefollowing', 'block_mrbs') . ":<ul>";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0

            foreach ($bookings as $booking) {
                echo '<li>' . s($booking->name) . ' (';
                echo time_date_string($booking->start_time) . " -> ";
                echo time_date_string($booking->end_time) . ")</li>";
            }

            echo "</ul>";
        }

        echo "<center>";
<<<<<<< HEAD
        echo "<H1>" . get_string('sure', 'block_mrbs_rlp') . "</h1>";
        echo '<H1><a href="' . $thisurl->out(true, ['confirm' => 'Y', 'sesskey' => sesskey()]) . '">' . get_string('yes') . "</a>";
=======
<<<<<<< HEAD
        echo "<H1>" . get_string('sure', 'block_mrbs_rlp') . "</h1>";
        echo '<H1><a href="' . $thisurl->out(true, ['confirm' => 'Y', 'sesskey' => sesskey()]) . '">' . get_string('yes') . "</a>";
=======
        echo "<H1>" . get_string('sure', 'block_mrbs') . "</h1>";
        echo '<H1><a href="' . $thisurl->out(true, array('confirm' => 'Y', 'sesskey' => sesskey())) . '">' . get_string('yes') . "</a>";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        echo '&nbsp;&nbsp;&nbsp; <a href="' . $adminurl . '">' . get_string('no') . "</a></h1>";
        echo "</center>";
        include "trailer.php";
    }
}

if ($type == "area") {
    // We are only going to let them delete an area if there are
    // no rooms. its easier
    $n = $DB->count_records('block_mrbs_rlp_room', ['area_id' => $area]);
    if ($n == 0) {
        // OK, nothing there, lets blast it away
        $DB->delete_records('block_mrbs_rlp_area', ['id' => $area]);

        // Redirect back to the admin page
        redirect($adminurl);
    } else {
        // There are rooms left in the area
        print_header_mrbs_rlp($day, $month, $year, $area);

<<<<<<< HEAD
        echo '<br/><p>' . get_string('delarea', 'block_mrbs_rlp') . '</p>';
        echo '<a href="' . $adminurl . '">' . get_string('backadmin', 'block_mrbs_rlp') . "</a>";
=======
<<<<<<< HEAD
        echo '<br/><p>' . get_string('delarea', 'block_mrbs_rlp') . '</p>';
        echo '<a href="' . $adminurl . '">' . get_string('backadmin', 'block_mrbs_rlp') . "</a>";
=======
        echo '<br/><p>' . get_string('delarea', 'block_mrbs') . '</p>';
        echo '<a href="' . $adminurl . '">' . get_string('backadmin', 'block_mrbs') . "</a>";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        include "trailer.php";
    }
}
