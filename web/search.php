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

$day = optional_param('day', 0, PARAM_INT);
$month = optional_param('month', 0, PARAM_INT);
$year = optional_param('year', 0, PARAM_INT);
$area = optional_param('area', 0, PARAM_INT);
$advanced = optional_param('advanced', 0, PARAM_BOOL);
$search_str = optional_param('search_str', 0, PARAM_TEXT); //may break some searches due to over-checking -ab.
$total = optional_param('total', 0, PARAM_INT);
$search_pos = optional_param('search_pos', 0, PARAM_INT);

//If we dont know the right date then make it up
if (($day == 0) or ( $month == 0) or ( $year == 0)) {
    $day = date("d");
    $month = date("m");
    $year = date("Y");
}

$thisurl = new moodle_url('/blocks/mrbs_rlp/web/search.php', ['day' => $day, 'month' => $month, 'year' => $year]);
if ($area) {
    $thisurl->param('area', $area);
} else {
    $area = get_default_area();
}
if ($advanced) {
    $thisurl->param('advanced', $advanced);
}
if ($search_str) {
    $thisurl->param('searchstr', $search_str);
}
if ($search_pos) {
    $thisurl->param('search_pos', $search_pos);
}
$PAGE->set_url($thisurl);
require_login();

print_header_mrbs_rlp($day, $month, $year, $area);

if ($advanced) {
<<<<<<< HEAD
    echo "<H3>" . get_string('advanced_search', 'block_mrbs_rlp') . "</H3>";
    echo "<FORM METHOD=GET ACTION=\"search.php\">";
    echo get_string('search_for', 'block_mrbs_rlp') . " <INPUT TYPE=TEXT SIZE=25 NAME=\"search_str\"><br>";
=======
    echo "<H3>" . get_string('advanced_search', 'block_mrbs') . "</H3>";
    echo "<FORM METHOD=GET ACTION=\"search.php\">";
    echo get_string('search_for', 'block_mrbs') . " <INPUT TYPE=TEXT SIZE=25 NAME=\"search_str\"><br>";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
    echo get_string('from') . " ";
    genDateSelector("", $day, $month, $year);
    echo "<br><INPUT TYPE=SUBMIT VALUE=\"" . get_string('search') . "\">";
    include "trailer.php";
    echo "</BODY>";
    echo "</HTML>";
    exit;
}

if (!$search_str) {
<<<<<<< HEAD
    echo "<H3>" . get_string('invalid_search', 'block_mrbs_rlp') . "</H3>";
=======
    echo "<H3>" . get_string('invalid_search', 'block_mrbs') . "</H3>";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
    include "trailer.php";
    exit;
}

// now is used so that we only display entries newer than the current time
<<<<<<< HEAD
echo "<H3>" . get_string('search_results', 'block_mrbs_rlp') . " \"<font color=\"blue\">" . s($search_str) . "</font>\"</H3>\n";
=======
echo "<H3>" . get_string('search_results', 'block_mrbs') . " \"<font color=\"blue\">" . s($search_str) . "</font>\"</H3>\n";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

$now = mktime(0, 0, 0, $month, $day, $year);

// This is the main part of the query predicate, used in both queries:
$sql_pred = "( " . $DB->sql_like("create_by", '?', false)
        . " OR " . $DB->sql_like("name", '?', false)
        . " OR " . $DB->sql_like("description", '?', false)
        . ") AND end_time > ?";
<<<<<<< HEAD
$params = [$search_str, $search_str, $search_str, $now];

=======
$params = array($search_str, $search_str, $search_str, $now);
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4


// The first time the search is called, we get the total
// number of matches.  This is passed along to subsequent
// searches so that we don't have to run it for each page.
if (!$total) {
    $total = $DB->count_records_select('block_mrbs_rlp_entry', $sql_pred, $params);
    $thisurl->param('total', $total);
}

if ($total <= 0) {
    echo "<B>" . get_string('nothingtodisplay') . "</B>\n";
    include "trailer.php";
    exit;
}

if ($search_pos <= 0) {
    $search_pos = 0;
} elseif ($search_pos >= $total) {
    $search_pos = $total - ($total % $search["count"]);
}

<<<<<<< HEAD
$sql_pred = str_replace(['create_by', 'name', 'description'], ['e.create_by', 'e.name', 'e.description'], $sql_pred);
=======
$sql_pred = str_replace(array('create_by', 'name', 'description'), array('e.create_by', 'e.name', 'e.description'), $sql_pred);
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

// Now we set up the "real" query using LIMIT to just get the stuff we want.
$sql = "SELECT e.id, e.create_by, e.name, e.description, e.start_time, r.area_id, r.room_name
        FROM {block_mrbs_rlp_entry} e, {block_mrbs_rlp_room} r
        WHERE $sql_pred
        AND e.room_id = r.id
        ORDER BY e.start_time asc ";

// this is a flag to tell us not to display a "Next" link
$result = $DB->get_records_sql($sql, $params, $search_pos, $search['count']);
$num_records = count($result);

$has_prev = $search_pos > 0;
$has_next = $search_pos < ($total - $search["count"]);

if ($has_prev || $has_next) {
<<<<<<< HEAD
    echo "<B>" . get_string('records', 'block_mrbs_rlp') . ($search_pos + 1) . get_string('through', 'block_mrbs_rlp') . ($search_pos + $num_records) . get_string('of', 'block_mrbs_rlp') . $total . "</B><BR>";
=======
    echo "<B>" . get_string('records', 'block_mrbs') . ($search_pos + 1) . get_string('through', 'block_mrbs') . ($search_pos + $num_records) . get_string('of', 'block_mrbs') . $total . "</B><BR>";
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4

    // display a "Previous" button if necessary
    if ($has_prev) {
        $pos = max(0, $search_pos - $search["count"]);
<<<<<<< HEAD
        echo '<A HREF="' . $thisurl->out(true, ['search_pos', $pos]) . '">';
=======
        echo '<A HREF="' . $thisurl->out(true, array('search_pos', $pos)) . '">';
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
    }

    echo "<B>" . get_string('previous') . "</B>";

    if ($has_prev) {
        echo "</A>";
    }

    // print a separator for Next and Previous
    echo(" | ");

    // display a "Previous" button if necessary
    if ($has_next) {
        $pos = max(0, $search_pos + $search["count"]);
<<<<<<< HEAD
        echo '<a href="' . $pos->out(true, ['search_pos', $pos]) . '">';
=======
        echo '<a href="' . $pos->out(true, array('search_pos', $pos)) . '">';
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
    }

    echo "<B>" . get_string('next') . "</B>";

    if ($has_next) {
        echo "</A>";
    }
}
?>
<P>
<TABLE BORDER=2 CELLSPACING=0 CELLPADDING=3>
    <TR>
        <TH><?php echo get_string('entry', 'block_mrbs_rlp') ?></TH>
        <TH><?php echo get_string('createdby', 'block_mrbs_rlp') ?></TH>
        <TH><?php echo get_string('namebooker', 'block_mrbs_rlp') ?></TH>
        <TH><?php echo get_string('room', 'block_mrbs_rlp') ?></TH>
        <TH><?php echo get_string('description') ?></TH>
        <TH><?php echo get_string('start_date', 'block_mrbs_rlp') ?></TH>
    </TR>
    <?php
    foreach ($result as $entry) {
<<<<<<< HEAD
        $viewurl = new moodle_url('/blocks/mrbs_rlp/web/view_entry.php', ['id' => $entry->id]);
=======
        $viewurl = new moodle_url('/blocks/mrbs/web/view_entry.php', array('id' => $entry->id));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
        echo "<TR>";
        echo "<TD><A HREF=\"" . $viewurl . "\">" . get_string('view') . "</A></TD>\n";
        echo "<TD>" . s($entry->create_by) . "</TD>\n";
        echo "<TD>" . s($entry->name) . "</TD>\n";
        echo "<TD>" . s($entry->room_name) . "</TD>\n";
        echo "<TD>" . s($entry->description) . "</TD>\n";
        // generate a link to the day.php
        $link = getdate($entry->start_time);
<<<<<<< HEAD
        $dayurl = new moodle_url('/blocks/mrbs_rlp/web/day.php', ['day' => $link['mday'], 'month' => $link['mon'], 'year' => $link['year'],
            'area' => $entry->area_id]);
=======
        $dayurl = new moodle_url('/blocks/mrbs/web/day.php', array('day' => $link['mday'], 'month' => $link['mon'], 'year' => $link['year'],
            'area' => $entry->area_id));
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
        echo "<TD><A HREF=\"" . $dayurl . "\">";
        if (empty($enable_periods)) {
            $link_str = time_date_string($entry->start_time);
        } else {
            list(, $link_str) = period_date_string($entry->start_time);
        }
        echo "$link_str</A></TD>";
        echo "</TR>\n";
    }

    echo "</TABLE>\n";
    include "trailer.php";
<<<<<<< HEAD
=======
    
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
