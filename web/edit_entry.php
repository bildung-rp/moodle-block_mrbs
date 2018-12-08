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
global $PAGE, $DB;
include "config.inc.php";
include "functions.php";
require_once "mrbs_rlp_auth.php";

global $twentyfourhour_format, $morningstarts;

$day = optional_param('day', 0, PARAM_INT);
$month = optional_param('month', 0, PARAM_INT);
$year = optional_param('year', 0, PARAM_INT);
$area = optional_param('area', 0, PARAM_INT);
$edit_type = optional_param('edit_type', '', PARAM_ALPHA);
$id = optional_param('id', 0, PARAM_INT);
$room = optional_param('room', 0, PARAM_INT);
$hour = optional_param('hour', '', PARAM_INT);
$minute = optional_param('minute', '', PARAM_INT);
$force = optional_param('force', false, PARAM_BOOL);
$period = optional_param('period', 0, PARAM_INT);
$all_day = optional_param('all_day', false, PARAM_BOOL);

//If we dont know the right date then make it up
if (($day == 0) or ($month == 0) or ($year == 0)) {
    $day = date("d");
    $month = date("m");
    $year = date("Y");
}

$thisurl = new moodle_url('/blocks/mrbs_rlp/web/edit_entry.php', ['day' => $day, 'month' => $month, 'year' => $year]);

if ($area) {
    $thisurl->param('area', $area);
} else {
    $area = get_default_area();
}
if ($id) {
    $thisurl->param('id', $id);
}
if ($force) {
    $thisurl->param('force', $force);
}
if ($room) {
    $thisurl->param('room', $room);
}
if (!empty($edit_type)) {
    $thisurl->param('edit_type', $edit_type);
}
if (!empty($hour)) {
    $thisurl->param('hour', $hour);
}
if (!empty($minute)) {
    $thisurl->param('minute', $minute);
}

$PAGE->set_url($thisurl);
require_login();

if (!getAuthorised(1)) {
    showAccessDenied($day, $month, $year, $area);
    exit;
}

if (!isset($HTTP_REFERER)) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $HTTP_REFERER = $_SERVER['HTTP_REFERER'];
    } else {
        $HTTP_REFERER = "";
    }
}

// This page will either add or modify a booking
// We need to know:
//  Name of booker
//  Description of meeting
//  Date (option select box for day, month, year)
//  Time
//  Duration
//  Internal/External
// Firstly we need to know if this is a new booking or modifying an old one
// and if it's a modification we need to get all the old data from the db.
// If we had $id passed in then it's a modification.
if ($id > 0) {
    $entry = $DB->get_record('block_mrbs_rlp_entry', ['id' => $id], '*', MUST_EXIST);
    // Note: Removed stripslashes() calls from name and description. Previous
    // versions of MRBS mistakenly had the backslash-escapes in the actual database
    // records because of an extra addslashes going on. Fix your database and
    // leave this code alone, please.
    $name = $entry->name;
    $create_by = $entry->create_by;
    $description = $entry->description;
    $start_time = $entry->start_time;
    $start_day = userdate($entry->start_time, '%d');
    $start_month = userdate($entry->start_time, '%m');
    $start_year = userdate($entry->start_time, '%Y');
    $start_hour = userdate($entry->start_time, '%H');
    $start_min = userdate($entry->start_time, '%M');
    $end_time = $entry->end_time;
    $duration = $entry->end_time - $entry->start_time - cross_dst($entry->start_time, $entry->end_time);
    $type = $entry->type;
    $room_id = $entry->room_id;
    $last_change = userdate($entry->timestamp, '%d.%m.%Y %H:%M');
    $create_by_user = getRealName($entry->create_by);
    //put this here so that a move can be coded into the get data
    if (!empty($room)) {
        $room_id = $room;
    }
    $entry_type = $entry->entry_type;
    $rep_id = $entry->repeat_id;

    if ($entry_type >= 1) {
        $repeat = $DB->get_record('block_mrbs_rlp_repeat', ['id' => $rep_id], '*', MUST_EXIST);
        $rep_type = $repeat->rep_type;

        if ($edit_type == "series") {
            $start_day = (int) userdate($repeat->start_time, '%d');
            $start_month = (int) userdate($repeat->start_time, '%m');
            $start_year = (int) userdate($repeat->start_time, '%Y');

            $rep_end_day = (int) userdate($repeat->end_date, '%d');
            $rep_end_month = (int) userdate($repeat->end_date, '%m');
            $rep_end_year = (int) userdate($repeat->end_date, '%Y');

            switch ($rep_type) {
                case 2:
                case 6:
                    $rep_day[0] = $repeat->rep_opt[0] != "0";
                    $rep_day[1] = $repeat->rep_opt[1] != "0";
                    $rep_day[2] = $repeat->rep_opt[2] != "0";
                    $rep_day[3] = $repeat->rep_opt[3] != "0";
                    $rep_day[4] = $repeat->rep_opt[4] != "0";
                    $rep_day[5] = $repeat->rep_opt[5] != "0";
                    $rep_day[6] = $repeat->rep_opt[6] != "0";

                    if ($rep_type == 6) {
                        $rep_num_weeks = $repeat->rep_num_weeks;
                    }

                    break;

                default:
                    $rep_day = [0, 0, 0, 0, 0, 0, 0];
            }
        } else {
            $rep_type = $repeat->rep_type;
            $rep_end_date = userdate($repeat->end_date, '%A %d %B %Y');
            $rep_opt = $repeat->rep_opt;
        }
    }
} else { // It is a new booking. The data comes from whichever button the user clicked
    $edit_type = "series";
    $name = getUserName();
    $create_by = getUserName();
    $description = '';
    $start_day = $day;
    $start_month = $month;
    $start_year = $year;
    // Avoid notices for $hour and $minute if periods is enabled
    $start_hour = $hour;
    $start_min = $minute;
    $duration = ($enable_periods ? 60 : 60 * 60);
    $type = "I";
    $room_id = $room;
    $start_time = mktime(12, $period, 00, $start_month, $start_day, $start_year);
    $end_time = $start_time;
    $rep_id = 0;
    $rep_type = 0;
    $rep_end_day = $day;
    $rep_end_month = $month;
    $rep_end_year = $year;
    $rep_day = [0, 0, 0, 0, 0, 0, 0];
}

// These next 4 if statements handle the situation where
// this page has been accessed directly and no arguments have
// been passed to it.
// If we have not been provided with a room_id

if ($room_id == 0) {
    $dbroom = $DB->get_records('block_mrbs_rlp_room', null, 'room_name', 'id', 0, 1);
    if ($dbroom) {
        $dbroom = reset($dbroom);
        $room_id = $dbroom->id;
    }
}

// If we have not been provided with starting time
if (empty($start_hour) && $morningstarts < 10) {
    $start_hour = "0$morningstarts";
}

if (empty($start_hour)) {
    $start_hour = "$morningstarts";
}

if (empty($start_min)) {
    $start_min = "00";
}

// Remove "Undefined variable" notice
if (empty($rep_num_weeks)) {
    $rep_num_weeks = "";
}

$enable_periods ? toPeriodString($start_min, $duration, $dur_units) : toTimeString($duration, $dur_units);

//now that we know all the data to fill the form with we start drawing it

$context = context_system::instance();

$roomadmin = false;
if (!getWritable($create_by, getUserName())) {
    if (has_capability('block/mrbs_rlp:editmrbs_rlpunconfirmed', $context, null, false)) {
        if ($room_id) {
            $dbroom = $DB->get_record('block_mrbs_rlp_room', ['id' => $room_id]);
            if ($dbroom->room_admin_email == $USER->email) {
                $roomadmin = true;
            }
        }
    }

    if (!$roomadmin) {
        showAccessDenied($day, $month, $year, $area);
        exit;
    }
}

$PAGE->requires->js('/blocks/mrbs_rlp/web/updatefreerooms.js', true);

print_header_mrbs_rlp($day, $month, $year, $area);
?>
<script language="javascript">

<?php
echo 'var currentroom=' . $room_id . ';';
if (has_capability("block/mrbs_rlp:forcebook", $context)) {
    echo 'var canforcebook=true;';
} else {
    echo 'var canforcebook=false;';
}
?>
// do a little form verifying
    function validate_and_submit()
    {
        // null strings and spaces only strings not allowed
        if (/(^$)|(^\s+$)/.test(document.forms["main"].name.value)) {
            alert("<?php echo get_string('you_have_not_entered', 'block_mrbs_rlp') . '\n' . get_string('name') ?>");
            return false;
        }
        // null strings and spaces only strings not allowed
        if (/(^$)|(^\s+$)/.test(document.forms["main"].description.value)) {
            alert("<?php echo get_string('you_have_not_entered', 'block_mrbs_rlp') . '\n' . get_string('description') ?>");
            return false;
        }
<?php if (!$enable_periods) {
    ?>

            h = parseInt(document.forms["main"].hour.value);
            m = parseInt(document.forms["main"].minute.value);

            if (h > 23 || m > 59) {
                alert("<?php echo get_string('you_have_not_entered', 'block_mrbs_rlp') . '\n' . get_string('valid_time_of_day', 'block_mrbs_rlp') ?>");
                return false;
            }
<?php
} ?>

        // check form element exist before trying to access it
        if (document.forms["main"].id)
            i1 = parseInt(document.forms["main"].id.value);
        else
            i1 = 0;

        i2 = parseInt(document.forms["main"].rep_id.value);
        if (document.forms["main"].rep_num_weeks) {
            n = parseInt(document.forms["main"].rep_num_weeks.value);
        }
        if ((!i1 || (i1 && i2)) && document.forms["main"].rep_type && document.forms["main"].rep_type[6].checked && (!n || n < 2)) {
            alert("<?php echo get_string('you_have_not_entered', 'block_mrbs_rlp') . '\n' . get_string('useful_n-weekly_value', 'block_mrbs_rlp') ?>");
            return false;
        }

        // check that a room(s) has been selected
        // this is needed as edit_entry_handler does not check that a room(s)
        // has been chosen
        if (document.forms["main"].elements['rooms[]'].selectedIndex == -1) {
            alert("<?php echo get_string('you_have_not_selected', 'block_mrbs_rlp') . '\n' . get_string('valid_room', 'block_mrbs_rlp') ?>");
            return false;
        }

        // Form submit can take some times, especially if mails are enabled and
        // there are more than one recipient. To avoid users doing weird things
        // like clicking more than one time on submit button, we hide it as soon
        // it is clicked.
        document.forms["main"].save_button.disabled = "true";

        // would be nice to also check date to not allow Feb 31, etc...
        document.forms["main"].submit();

        return true;
    }

    function OnAllDayClick() { // Executed when the user clicks on the all_day checkbox.
        allday = document.getElementById('all_day');
        form = document.forms["main"];
        if (allday.checked) { // If checking the box...
<?php if (!$enable_periods) {
        ?>
                form.hour.value = "00";
                form.minute.value = "00";
<?php
    } ?>
            if (form.dur_units.value != "days") { // Don't change it if the user already did.
                form.duration.value = "1";
                form.dur_units.value = "days";
            }
        }
        updateFreeRooms()
    }
</script>

<h2><?php echo $id ? ($edit_type == "series" ? get_string('editseries', 'block_mrbs_rlp') : get_string('editentry', 'block_mrbs_rlp')) : get_string('addentry', 'block_mrbs_rlp'); ?></h2>

<form name="main" action="edit_entry_handler.php" method="get">
    <input type="hidden" name="sesskey" value="<?php echo sesskey(); ?>">

    <table border=0>

        <?php if ($edit_type != 'series' && $rep_id) {
        ?>
            <tr><td colspan="2"><b><?php
                        $editseriesurl = new moodle_url('/blocks/mrbs_rlp/web/edit_entry.php', ['id' => $id, 'edit_type' => 'series']);
        echo get_string('editingserieswarning', 'block_mrbs_rlp');
        echo html_writer::link($editseriesurl, get_string('editseries', 'block_mrbs_rlp')); ?>
                    </b></td></tr>
        <?php
    } ?>

        <tr><td class="CR"><label for="name"><?php echo get_string('namebooker', 'block_mrbs_rlp') ?></label></td>
            <td class="CL"><input name="name" size=40 value="<?php echo htmlspecialchars($name, ENT_NOQUOTES) ?>"></td></tr>

        <tr><td class="TR"><label for="description"><?php echo get_string('fulldescription', 'block_mrbs_rlp') ?></label></td>
            <td class="TL"><textarea name="description" rows=8 cols=40><?php
                    echo htmlspecialchars($description);
                    ?></textarea></td></tr>

        <tr><td class="CR"><label for="date"><?php echo get_string('date') ?>: </label></td>
            <td class="CL">
                <?php genDateSelector("", $start_day, $start_month, $start_year, true) ?>
                <script language="javascript">ChangeOptionDays(document.main, '');</script>
            </td>
        </tr>

        <?php if (!$enable_periods) {
                        ?>
            <tr><td class="CR"><label for="time"><?php echo get_string('time') ?>: </label></td>
                <td class="CL"><input name="hour" size=2 value="<?php
                    if (!$twentyfourhour_format && ($start_hour > 12)) {
                        echo($start_hour - 12);
                    } else {
                        echo $start_hour;
                    } ?>" maxlength=2 onchange="updateFreeRooms()">:<input name="minute" size=2 value="<?php echo $start_min; ?>" maxlength=2 onchange="updateFreeRooms()">
                                      <?php
                                      if (!$twentyfourhour_format) {
                                          $checked = ($start_hour < 12) ? "checked" : "";
                                          echo "<input name=\"ampm\" type=\"radio\" value=\"am\" $checked>" . userdate(mktime(1, 0, 0, 1, 1, 2000), "%p");
                                          $checked = ($start_hour >= 12) ? "checked" : "";
                                          echo "<input name=\"ampm\" type=\"radio\" value=\"pm\" $checked>" . userdate(mktime(13, 0, 0, 1, 1, 2000), "%p");
                                      } ?>
                </td></tr>
        <?php
                    } else {
                        ?>
            <tr><td class="CR"><label for="period"><?php echo get_string('period', 'block_mrbs_rlp') ?>: </label></td>
                <td class="CL">
                    <select name="period" onchange="updateFreeRooms()">
                        <?php
                        foreach ($periods as $p_num => $p_val) {
                            echo "<option value=$p_num";
                            if ((isset($period) && $period == $p_num) || $p_num == $start_min) {
                                echo " selected";
                            }
                            echo ">$p_val";
                        } ?>
                    </select>

                </td></tr>

        <?php
                    } ?>
        <tr><td class="CR"><label for="duration"><?php echo get_string('duration', 'block_mrbs_rlp'); ?></label></td>
            <td class="CL"><input name="duration" size=7 value="<?php echo $duration; ?>" onchange="updateFreeRooms()">
                <select name="dur_units" onchange="updateFreeRooms()">
                    <?php
                    if ($enable_periods) {
                        $units = ["periods", "days"];
                    } else {
                        $units = ["minutes", "hours", "days", "weeks"];
                    }

                    while (list(, $unit) = each($units)) {
                        echo "<option value=$unit";
                        if ($dur_units == get_string($unit, 'block_mrbs_rlp')) {
                            echo " selected";
                        }
                        echo " onchange=\"updateFreeRooms()\">" . get_string($unit, 'block_mrbs_rlp');
                    }
                    ?>
                </select>
                <input name="all_day" type="checkbox" value="yes" id="all_day" <?php if ($all_day) {
                        echo 'checked ';
                    } ?>onclick="OnAllDayClick()"> <?php
                echo get_string('all_day', 'block_mrbs_rlp');
                if ($all_day) {
                    echo '<body onload = "OnAllDayClick()"></body>';
                }
                ?>
            </td></tr>


        <?php
        // Determine the area id of the room in question first
        $area_id = $DB->get_field('block_mrbs_rlp_room', 'area_id', ['id' => $room_id], MUST_EXIST);
// determine if there is more than one area
        $areas = $DB->get_records('block_mrbs_rlp_area', null, 'area_name');
// if there is more than one area then give the option
// to choose areas.
        if (count($areas) > 1) {
            ?>
            <script language="javascript">
                // create area selector if javascript is enabled as this is required
                // if the room selector is to be updated.
                this.document.writeln("<tr><td class="CR"><label for='areas'><?php echo get_string('areas', 'block_mrbs_rlp') ?>:</label></td><td class="CL" valign=top>");
                        this.document.writeln("          <select name=\"areas\" onchange=\"updateFreeRooms()\">");
    <?php
// get list of areas

    foreach ($areas as $dbarea) {
        $selected = "";
        if ($dbarea->id == $area_id) {
            $selected = "selected";
        }
        print "this.document.writeln(\"            <option $selected value=\\\"" . $dbarea->id . "\\\">" . $dbarea->area_name . "\")\n";
    }

            print "this.document.writeln(\"            <option  value=\\\"IT\\\">" . get_string('computerrooms', 'block_mrbs_rlp') . "\")\n"; ?>
                this.document.writeln("          </select>");
                this.document.writeln("</td></tr>");
            </script>
            <?php
        } // if $num_areas
        ?>
        <tr>
            <td class="TR"><label for="rooms"><?php echo get_string('rooms', 'block_mrbs_rlp') ?>:</label></td>
            <td class="TL" valign=top>
                <table>
                    <tr>
                        <td><select name="rooms[]" multiple="yes">
                                <?php
// select the rooms in the area determined above
//$sql = "select id, room_name from $tbl_room where area_id=$area_id order by room_name";
                                $rooms = $DB->get_records('block_mrbs_rlp_room', ['area_id' => $area_id], 'room_name');

                                $i = 0;
                                foreach ($rooms as $dbroom) {
                                    if (!allowed_to_book($USER, $dbroom)) {
                                        continue;
                                    }
                                    $selected = "";
                                    if ($dbroom->id == $room_id) {
                                        $selected = "selected";
                                    }
                                    echo "<option $selected value=\"" . $dbroom->id . "\">" . s($dbroom->room_name) . " (" . s($dbroom->description) . " Capacity:$dbroom->capacity)";
                                    // store room names for emails
                                    $room_names[$i] = $dbroom->room_name;
                                    $i++;
                                }
                                ?>
                            </select>
                        </td>
                        <td><?php echo get_string('ctrl_click', 'block_mrbs_rlp') ?></td>
                    </tr>
                    <tr>
                        <td><label for="nooccupied"><?php echo get_string('dontshowoccupied', 'block_mrbs_rlp') ?></label>
                            <input name="nooccupied" id="nooccupied" type="checkbox" checked="checked" onclick="updateFreeRooms()" /></td>
                        <td></td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr><td class="CR"><label for="type"><?php echo get_string('type', 'block_mrbs_rlp') ?></label></td>
            <td class="CL"><select name="type">
                    <?php
//if this is an imported booking, forcably mark it as edited so that changes are not overridden on next import
                    if (($type == 'K') or ($type == 'L')) {
                        echo '<option value="L" selected >' . $typel['L'] . '</option>\n';
                    } else {
                        $unconfirmed = false;
                        $unconfirmedonly = false;
                        if (has_capability('block/mrbs_rlp:editmrbs_rlpunconfirmed', $context, null, false)) {
                            $unconfirmed = true;
                        }
                        if (authGetUserLevel(getUserName()) < 2 && $unconfirmed) {
                            if ($USER->email != $rooms[$room_id]->room_admin_email) {
                                $type = 'U';
                                $unconfirmedonly = true;
                            }
                        }
                        if (!$unconfirmedonly) {
                            for ($c = "A"; $c <= "J"; $c++) {
                                if (!empty($typel[$c])) {
                                    echo "<option value=$c" . ($type == $c ? " selected" : "") . ">$typel[$c]\n";
                                }
                            }
                        }
                        if ($unconfirmed) {
                            echo '<option value="U" ' . ($type == 'U' ? 'selected="selected"' : '') . ' >' . $typel['U'] . '</option>\n';
                        }
                    }
                    ?></select></td></tr>
        <tr><td>
                <?php
                if (has_capability("block/mrbs_rlp:forcebook", $context)) {
                    echo'<label for="mrbs_rlpforcebook">' . get_string('forciblybook2', 'block_mrbs_rlp') . ': </label></td><td><input id="mrbs_rlpforcebook" type="checkbox" name="forcebook" value="true"';
                    if ($force) {
                        echo ' checked="checked"';
                    }
                    echo' onclick="document.getElementById(\'nooccupied\').checked=!this.checked; updateFreeRooms();">';
                }
                ?>

            </td></tr>
        <?php if ($edit_type == "series") {
                    ?>

            <tr>
                <td class="CR"><label for="radiorepeat"><?php echo get_string('rep_type', 'block_mrbs_rlp') ?>: </label></td>
                <td class="CL">
                    <?php
                    for ($i = 0; $i < 7; $i++) { //manually setting this to 7 since that is how many repetition types there are -arb quick and dirty hack
                        echo "<input id=\"radiorepeat" . $i . "\" name=\"rep_type\" type=\"radio\" value=\"" . $i . "\"";

                        if ($i == $rep_type) {
                            echo " checked";
                        }

                        echo '><label for="radiorepeat' . $i . '">' . get_string('rep_type_' . $i, 'block_mrbs_rlp') . "</label>\n";
                    } ?>
                </td>
            </tr>

            <tr>
                <td class="CR"><label for="rep_end_date"><?php echo get_string('rep_end_date', 'block_mrbs_rlp') ?></label></td>
                <td class="CL"><?php genDateSelector("rep_end_", $rep_end_day, $rep_end_month, $rep_end_year) ?></td>
            </tr>

            <tr>
                <td class="CR"><label for="rep_rep_day"><?php echo get_string('rep_rep_day', 'block_mrbs_rlp') ?></label> </td>
                <td class="CL"><em><?php echo get_string('rep_for_weekly', 'block_mrbs_rlp') ?></em>
                    <?php
// Display day name checkboxes according to language and preferred weekday start.
                    for ($i = 0; $i < 7; $i++) {
                        $wday = ($i + $weekstarts) % 7;
                        echo "<input id=\"chkrepeatday" . $i . "\" name=\"rep_day[$wday]\" type=checkbox";
                        if ($rep_day[$wday]) {
                            echo " checked";
                        }
                        echo '><label for="chkrepeatday' . $i . '">' . day_name($wday) . "</label>\n";
                    } ?>
                </td>
            </tr>

            <?php
                } else {
                    $key = "rep_type_" . (isset($rep_type) ? $rep_type : "0"); ?>

            <tr><td class="CR"><label for="rep_type"><?php echo get_string('rep_type', 'block_mrbs_rlp') ?>: </label></td>
                <td class="CL"><?php echo get_string($key, 'block_mrbs_rlp') ?></td></tr>

            <?php
            if (isset($rep_type) && ($rep_type != 0)) {
                $opt = "";
                if ($rep_type == 2) {
                    // Display day names according to language and preferred weekday start.
                    for ($i = 0; $i < 7; $i++) {
                        $wday = ($i + $weekstarts) % 7;
                        if ($rep_opt[$wday]) {
                            $opt .= day_name($wday) . " ";
                        }
                    }
                }
                if ($opt) {
                    ?>
                    <tr><td class="CR"><label for="rep_rep_day"><?php echo get_string('rep_rep_day', 'block_mrbs_rlp') ?></label></td>
                        <td class="CL"><?php echo $opt ?></td></tr>
                    <?php
                } ?>
                <tr><td class="CR"><label for="rep_end_date"><?php echo get_string('rep_end_date', 'block_mrbs_rlp') ?></label></td>
                    <td class="CL"><?php echo $rep_end_date ?></td></tr>
                <?php
            }
                }
        /* we display the rep_num_weeks box only if:
          - this is a new entry ($id is not set)
          xor
          - we are editing an existing repeating entry ($rep_type is set and
          $rep_type != 0 and $edit_type == "series" )
         */
        if ((($id == 0)) xor (isset($rep_type) && ($rep_type != 0) && ("series" == $edit_type))) {
            ?>
            <tr>
                <td class="CR"><label for="rep_num_weeks"><?php echo get_string('rep_num_weeks', 'block_mrbs_rlp') ?></label></td>
                <td class="CL"><input type="text" name="rep_num_weeks" value="<?php echo $rep_num_weeks ?>"><em><?php echo get_string('rep_for_nweekly', 'block_mrbs_rlp') ?></em></td>
            </tr>
        <?php
        } ?>

        <?php if ($id != 0) {
            ?>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td class="CR"><label for="mrbs_rlproomchange"><?php print_string('roomchange', 'block_mrbs_rlp'); ?>: </label></td>
                <td><input type="checkbox" checked="checked" name="roomchange" id="mrbs_rlproomchange" /></td>
            </tr>
            <tr>
                <td class="CR"><label for="mrbs_rlpcreatedby"><?php print_string('createdby', 'block_mrbs_rlp'); ?></label></td>
                <td><?php echo $create_by_user->firstname . ' ' . $create_by_user->lastname ?></td>
            </tr>
            <td class="CR"><label for="mrbs_rlplastchanged"><?php print_string('last_change', 'block_mrbs_rlp'); ?></label></td>
            <td><?php echo $last_change ?></td>
            </tr>                                        
        <?php
        } ?>

        <tr>
            <td colspan="2" id="saverow">
                <script language="javascript">
                    document.writeln('<input type="button" class="btn btn-primary" name="save_button" value="<?php echo get_string('savechanges') ?>" onclick="validate_and_submit()">');
                    window.onload = updateFreeRooms();
                </script>
                <noscript>
                <input type="submit" value="<?php echo get_string('savechanges') ?>">
                </noscript>

                <?php
                if ($id) { //always be able to delete entry and if part of a series then add option to delete entire series.
                    $delurl = new moodle_url('/blocks/mrbs_rlp/web/del_entry.php', ['id' => $id, 'series' => 0, 'sesskey' => sesskey()]);
                    echo "<noscript><a id=\"dellink\" href=\"" . $delurl . "\">" . get_string('deleteentry', 'block_mrbs_rlp') . "</a></noscript>"
                    . "<script language=\"javascript\">
                    document.writeln('<input type=\"button\" class=\"btn btn-danger\" value=\"" . get_string('deleteentry', 'block_mrbs_rlp') . "\" onclick=\"if(confirm(\'" . get_string('confirmdel', 'block_mrbs_rlp') . "\')){document.location=\'" . $delurl . "\';}\" />');
                 </script>";
                    if ($rep_id) {
                        $delurl = new moodle_url('/blocks/mrbs_rlp/web/del_entry.php', ['id' => $id, 'series' => 1, 'sesskey' => sesskey(),
                            'day' => $day, 'month' => $month, 'year' => $year]);
                        echo " - ";
                        echo "<noscript><a id=\"dellink\" href=\"" . $delurl . "\">" . get_string('deleteentry', 'block_mrbs_rlp') . "</a></noscript>"
                        . "<script language=\"javascript\">
                    document.writeln('<input type=\"button\" class=\"btn btn-danger\" value=\"" . get_string('deleteseries', 'block_mrbs_rlp') . "\" onclick=\"if(confirm(\'" . get_string('confirmdel', 'block_mrbs_rlp') . "\')){document.location=\'" . $delurl . "\';}\" />');
                 </script>";
                    }
                }
                ?>
            </td></tr>
    </table>

    <input type=hidden name="returl" value="<?php echo $HTTP_REFERER ?>">
    <input type=hidden name="room_id" value="<?php echo $room_id ?>">
    <input type=hidden name="create_by" value="<?php echo $create_by ?>">
    <input type=hidden name="rep_id"    value="<?php echo $rep_id ?>">
    <input type=hidden name="edit_type" value="<?php echo $edit_type ?>">
    <?php
    if (isset($id)) {
        echo "<input type='hidden' name='id' value='" . $id . "'>\n";
    }
    ?>

</form>

<?php include "trailer.php" ?>
