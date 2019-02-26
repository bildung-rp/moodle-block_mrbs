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
if ($pview != 1) {
<<<<<<< HEAD
    echo "<P><HR><B>" . get_string('viewday', 'block_mrbs_rlp') . ":</B>\n";
=======

    echo "<P><HR><B>" . get_string('viewday', 'block_mrbs') . ":</B>\n";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

    if (!isset($year))
        $year = strftime("%Y");

    if (!isset($month))
        $month = strftime("%m");

    if (!isset($day))
        $day = strftime("%d");

<<<<<<< HEAD
    if (empty($area)) {
        $params = [];
    } else {
        $params = ['area' => $area];
    }
=======
    if (empty($area))
        $params = array();
    else
        $params = array('area' => $area);
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

    for ($i = -6; $i <= 7; $i++) {
        $ctime = mktime(0, 0, 0, $month, $day + $i, $year);

        $str = userdate($ctime, empty($dateformat) ? "%b %d" : "%d %b");

        $cyear = date("Y", $ctime);
        $cmonth = date("m", $ctime);
        $cday = date("d", $ctime);
        if ($i != -6)
            echo " | ";
<<<<<<< HEAD
        }
        if ($i == 0) {
            echo '<b class="active">[ ';
        }
        $url = new moodle_url('/blocks/mrbs_rlp/web/day.php', array_merge(['year' => $cyear, 'month' => $cmonth, 'day' => $cday], $params));
        echo "<a href=\"" . $url . "\">$str</a>\n";
        if ($i == 0) {
=======
        if ($i == 0)
            echo '<b class="active">[ ';
        $url = new moodle_url('/blocks/mrbs/web/day.php', array_merge(array('year' => $cyear, 'month' => $cmonth, 'day' => $cday), $params));
        echo "<a href=\"" . $url . "\">$str</a>\n";
        if ($i == 0)
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
            echo ']</b> ';
    }

<<<<<<< HEAD
    echo "<BR><B>" . get_string('viewweek', 'block_mrbs_rlp') . ":</B>\n";
=======
    echo "<BR><B>" . get_string('viewweek', 'block_mrbs') . ":</B>\n";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

    if (!empty($room)) {
        if (is_object($room)) {
            $params['room'] = $room->id;
        } else {
            $params['room'] = $room;
        }
    }

    $ctime = mktime(0, 0, 0, $month, $day, $year);
// How many days to skip back to first day of week:
    $skipback = (date("w", $ctime) - $weekstarts + 7) % 7;

    for ($i = -4; $i <= 4; $i++) {
        $ctime = mktime(0, 0, 0, $month, $day + 7 * $i - $skipback, $year);

        $cweek = date("W", $ctime);
        $cday = date("d", $ctime);
        $cmonth = date("m", $ctime);
        $cyear = date("Y", $ctime);
        if ($i != -4)
            echo " | ";

        if ($view_week_number) {
            $str = $cweek;
        } else {
            $str = userdate($ctime, empty($dateformat) ? "%b %d" : "%d %b");
        }
<<<<<<< HEAD
        if ($i == 0) {
            echo '<b class="active">[ ';
        }
        $url = new moodle_url('/blocks/mrbs_rlp/web/week.php', array_merge(['year' => $cyear, 'month' => $cmonth, 'day' => $cday], $params));
        echo "<a href=\"" . $url . "\">$str</a>\n";
        if ($i == 0) {
=======
        if ($i == 0)
            echo '<b class="active">[ ';
        $url = new moodle_url('/blocks/mrbs/web/week.php', array_merge(array('year' => $cyear, 'month' => $cmonth, 'day' => $cday), $params));
        echo "<a href=\"" . $url . "\">$str</a>\n";
        if ($i == 0)
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
            echo ']</b> ';
    }

<<<<<<< HEAD
    echo "<BR><B>" . get_string('viewmonth', 'block_mrbs_rlp') . ":</B>\n";
=======
    echo "<BR><B>" . get_string('viewmonth', 'block_mrbs') . ":</B>\n";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
    for ($i = -2; $i <= 6; $i++) {
        $ctime = mktime(0, 0, 0, $month + $i, 1, $year);
        $str = userdate($ctime, "%b %Y");

        $cmonth = date("m", $ctime);
        $cyear = date("Y", $ctime);
        if ($i != -2)
            echo " | ";
<<<<<<< HEAD
        }
        if ($i == 0) {
            echo '<b class="active">[ ';
        }
        $url = new moodle_url('/blocks/mrbs_rlp/web/month.php', array_merge(['year' => $cyear, 'month' => $cmonth], $params));
        echo "<a href=\"" . $url . "\">$str</a>\n";
        if ($i == 0) {
=======
        if ($i == 0)
            echo '<b class="active">[ ';
        $url = new moodle_url('/blocks/mrbs/web/month.php', array_merge(array('year' => $cyear, 'month' => $cmonth), $params));
        echo "<a href=\"" . $url . "\">$str</a>\n";
        if ($i == 0)
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
            echo ']</b> ';
    }

    echo "<HR>";
<<<<<<< HEAD
    $thisurl = new moodle_url($PAGE->url, ['pview' => 1]);
    echo '<p><center><a href="' . $thisurl . '">' . get_string('ppreview', 'block_mrbs_rlp') . '</a></center><p>';
=======
    $thisurl = new moodle_url($PAGE->url, array('pview' => 1));
    echo '<p><center><a href="' . $thisurl . '">' . get_string('ppreview', 'block_mrbs') . '</a></center><p>';
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
}

echo '</div>';  // Close 'mrbs_rlpcontainer'

echo $OUTPUT->footer();
