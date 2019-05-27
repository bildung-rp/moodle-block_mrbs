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
global $PAGE, $DB, $USER;

$dayurl = new moodle_url('/blocks/mrbs_rlp/web/day.php');
$PAGE->set_url($dayurl); // Hopefully will never be needed
require_login();

$context = context_system::instance();

$PAGE->set_context($context);

if (!has_capability('block/mrbs_rlp:editmrbs', $context) && !has_capability('block/mrbs_rlp:administermrbs', $context)) {
    redirect($dayurl);
}

$touser = required_param('id', PARAM_INT);
$message = required_param('message', PARAM_TEXT);

$touser = $DB->get_record('user', ['id' => $touser]);

require_sesskey();

email_to_user($touser, $USER, 'Request vacate room', $message);

redirect($dayurl);
