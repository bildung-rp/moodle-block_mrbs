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
include "config.inc.php";
include "functions.php";
//include "../version.php";

global $USER;

$pluginmanager = core_plugin_manager::instance();
$mrbs_rlp = $pluginmanager->get_plugin_info('block_mrbs_rlp');

if ($CFG->forcelogin) {
    require_login();
}

$day = optional_param('day', 0, PARAM_INT);
$month = optional_param('month', 0, PARAM_INT);
$year = optional_param('year', 0, PARAM_INT);
$area = optional_param('area', 0, PARAM_INT);

//If we dont know the right date then make it up
if (($day == 0) or ( $month == 0) or ( $year == 0)) {
    $day = date("d");
    $month = date("m");
    $year = date("Y");
}

$thisurl = new moodle_url('/blocks/mrbs_rlp/web/help.php', ['day' => $day, 'month' => $month, 'year' => $year]);
if ($area > 0) {
    $thisurl->param('area', $area);
} else {
    $area = get_default_area();
}

$PAGE->set_url($thisurl);
require_login();

print_header_mrbs_rlp($day, $month, $year, $area);

echo "<h3>" . get_string('about_mrbs_rlp', 'block_mrbs_rlp') . "</h3>\n";
echo "<p><strong>" . get_string('mrbs_rlp', 'block_mrbs_rlp') . "</strong>: " . $mrbs_rlp->release . "\n";
echo "<br><a href=\"https://github.com/bildung-rp/moodle-block_mrbs_rlp\">https://github.com/bildung-rp/moodle-block_mrbs_rlp</a>\n";

<<<<<<< HEAD
echo "<br /><br /><strong>" . get_string('system', 'block_mrbs_rlp') . "</strong> " . php_uname() . "\n";
echo "<br /><strong>PHP</strong>: " . phpversion() . "\n";

echo "<h3>" . get_string('help') . "</h3>";
echo get_string('please_contact', 'block_mrbs_rlp') . ' 
	<a href="mailto:' . $mrbs_rlp_admin_email . '">' . $mrbs_rlp_admin . "</a> " . get_string('for_any_questions', 'block_mrbs_rlp') . "\n";

$lang = current_language();
if (file_exists($CFG->dirroot . '/blocks/mrbs_rlp/lang/' . $lang . '/help/site_faq.html')) {
    include $CFG->dirroot . '/blocks/mrbs_rlp/lang/' . $lang . '/help/site_faq.html';
} else {
    include $CFG->dirroot . '/blocks/mrbs_rlp/lang/en/help/site_faq.html';
=======
echo "<H3>" . get_string('about_mrbs', 'block_mrbs') . "</H3>\n";
echo "<P><a href=\"http://mrbs.sourceforge.net\">" . get_string('mrbs', 'block_mrbs') . "</a> - " . get_mrbs_version() . "\n";
//echo "<BR>" . get_string('database','block_mrbs') . sql_version() . "\n";
echo "<BR>" . get_string('system', 'block_mrbs') . php_uname() . "\n";
echo "<BR>PHP: " . phpversion() . "\n";

echo "<H3>" . get_string('help') . "</H3>\n";
echo get_string('please_contact', 'block_mrbs') . '<a href="mailto:' . $mrbs_admin_email
 . '">' . $mrbs_admin
 . "</a> " . get_string('for_any_questions', 'block_mrbs') . "\n";

$lang = current_language();
if (file_exists($CFG->dirroot . '/blocks/mrbs/lang/' . $lang . '/help/site_faq.html')) {
    include $CFG->dirroot . '/blocks/mrbs/lang/' . $lang . '/help/site_faq.html';
} else {
    include $CFG->dirroot . '/blocks/mrbs/lang/en/help/site_faq.html';
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
}

include "trailer.php";
