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
=======
<<<<<<< HEAD
global $PAGE, $DB, $USER;
=======
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0

$dayurl = new moodle_url('/blocks/mrbs_rlp/web/day.php');
$PAGE->set_url($dayurl); // Hopefully will never be needed
require_login();

$context = context_system::instance();

$PAGE->set_context($context);

<<<<<<< HEAD
if (!has_capability('block/mrbs_rlp:editmrbs_rlp', $context) && !has_capability('block/mrbs_rlp:administermrbs_rlp', $context)) {
=======
<<<<<<< HEAD
if (!has_capability('block/mrbs_rlp:editmrbs_rlp', $context) && !has_capability('block/mrbs_rlp:administermrbs_rlp', $context)) {
=======
if (!has_capability('block/mrbs:editmrbs', $context) && !has_capability('block/mrbs:administermrbs', $context)) {
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
    redirect($dayurl);
}

$touser = required_param('id', PARAM_INT);
$message = required_param('message', PARAM_TEXT);

$touser = $DB->get_record('user', ['id' => $touser]);

require_sesskey();

email_to_user($touser, $USER, 'Request vacate room', $message);

redirect($dayurl);
