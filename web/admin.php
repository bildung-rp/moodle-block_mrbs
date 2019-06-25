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
global $PAGE, $CFG, $DB;

require "config.inc.php";
require "functions.php";
require_once "mrbs_rlp_auth.php";

$day = optional_param('day', 0, PARAM_INT);
$month = optional_param('month', 0, PARAM_INT);
$year = optional_param('year', 0, PARAM_INT);
$area = optional_param('area', 0, PARAM_INT);
$area_name = optional_param('area_name', '', PARAM_TEXT);

if (!empty($area_name)) {
    $area_name = urldecode($area_name);
}

//If we dont know the right date then make it up
if (($day == 0) or ($month == 0) or ($year == 0)) {
    $day = date("d");
    $month = date("m");
    $year = date("Y");
}

$thisurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['day' => $day, 'month' => $month, 'year' => $year]);
if ($area) {
    $thisurl->param('area', $area);
} else {
    $area = get_default_area();
}

$PAGE->set_url($thisurl);
require_login();

if (!getAuthorised(2)) {
    showAccessDenied($day, $month, $year, $area);
    exit();
}

print_header_mrbs_rlp($day, $month, $year, isset($area) ? $area : "");

// If area is set but area name is not known, get the name.
if ($area) {
    if (empty($area_name)) {
        $dbarea = $DB->get_record('block_mrbs_rlp_area', ['id' => $area], 'area_name', MUST_EXIST);
        $area_name = $dbarea->area_name;
    }
}

$addareaurl = new moodle_url('/blocks/mrbs_rlp/web/add.php', ['type' => 'area', 'sesskey' => sesskey()]);
$addroomurl = new moodle_url($addareaurl, ['type' => 'room', 'area' => $area]);
?>
<h2><?= get_string('administration') ?></h2>  

<div class="container">
    <div class="row">
        <div class="col border border-dark bg-light">
            <h3 align="center"><?= get_string('areas', 'block_mrbs_rlp') ?></h3>
        </div>
        <div class="col border border-dark bg-light">
            <h3 align="center"><?php
echo get_string('rooms', 'block_mrbs_rlp');
if (isset($area_name)) {
    echo "&nbsp;" . get_string('in', 'block_mrbs_rlp') . " " . s($area_name);
}
?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col border">
            <?php
            // This cell has the areas
            $areas = $DB->get_records('block_mrbs_rlp_area', null, 'area_name');

            if (empty($areas)) {
                echo get_string('noareas', 'block_mrbs_rlp');
            } else {
                echo '<ul class="list-group">';
                foreach ($areas as $dbarea) {
                    $area_name_q = urlencode($dbarea->area_name);
                    $adminurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['area' => $dbarea->id, 'area_name' => $area_name_q, 'sesskey' => sesskey()]);
                    $editroomurl = new moodle_url('/blocks/mrbs_rlp/web/edit_area_room.php', ['area' => $dbarea->id, 'sesskey' => sesskey()]);
                    $delareaurl = new moodle_url('/blocks/mrbs_rlp/web/del.php', ['area' => $dbarea->id, 'type' => 'area', 'sesskey' => sesskey()]);
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center border-0">';
                    echo '<a href="' . $adminurl . '">' . s($dbarea->area_name) . '</a>';

                    echo '<span class"badge badge-primary badge-pill">
        <a href="' . $editroomurl . '">' . get_string('edit') . '</a>&nbsp;|&nbsp;
        <a href="' . $delareaurl . '">' . get_string('delete') . '</a></span>';
                }
                echo "</ul>";
            }
            ?>
        </div>
        <div class="col border">
            <?php
// This one has the rooms
            if ($area) {
                $rooms = $DB->get_records('block_mrbs_rlp_room', ['area_id' => $area], 'room_name');
                if (empty($rooms)) {
                    //    $res = sql_query("select id, room_name, description, capacity from $tbl_room where area_id=$area order by room_name");
                    echo get_string('norooms', 'block_mrbs_rlp');
                } else {
                    echo '<ul class="list-group">';
                    foreach ($rooms as $dbroom) {
                        $editroomurl = new moodle_url('/blocks/mrbs_rlp/web/edit_area_room.php', ['room' => $dbroom->id, 'sesskey' => sesskey()]);
                        $delroomurl = new moodle_url('/blocks/mrbs_rlp/web/del.php', ['area' => $area, 'room' => $dbroom->id, 'type' => 'room', 'sesskey' => sesskey()]);
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center border-0">';
                        echo s($dbroom->room_name) . " <small>(";
                        if (!empty($dbroom->description)) {
                            echo s($dbroom->description) . ", ";
                        }
                        echo get_string('capacity', 'block_mrbs') . ": " . $dbroom->capacity . ")</small>";

                        echo '<span class"badge badge-primary badge-pill">
        <a href="' . $editroomurl . '">' . get_string('edit') . '</a>&nbsp;|&nbsp;
        <a href="' . $delroomurl . '">' . get_string('delete') . '</a></span>';
                    }
                    echo '</ul>';
                }
            } else {
                echo get_string('noarea', 'block_mrbs_rlp');
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col border">
            <h4 align="center"><?= get_string('addarea', 'block_mrbs_rlp') ?></h4>

            <form action="<?= ($addareaurl->out_omit_querystring()) ?>" method="post">
                <?= html_writer::input_hidden_params($addareaurl); ?>

                <div class="form-group">
                    <label for="name"><?= get_string('name') ?></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="<?= get_string('name') ?>">
                </div>         

                <button type="submit" class="btn btn-default"><?= get_string('addarea', 'block_mrbs_rlp') ?></button></form>

        </div>
        <div class="col border">
            <h4 align="center"><?= get_string('addroom', 'block_mrbs_rlp') ?></h4>
            <?php
            if (0 != $area) {
                ?>
                <form action="<?= $addroomurl->out_omit_querystring() ?>" method="post">
                    <?= html_writer::input_hidden_params($addroomurl); ?>

                    <div class="form-group">
                        <label for="name"><?= get_string('name') ?></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="<?= get_string('name') ?>">
                    </div>    

                    <div class="form-group">
                        <label for="description"><?= get_string('description') ?></label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="<?= get_string('description') ?>">
                    </div>   

                    <div class="form-group">
                        <label for="capacity"><?php echo get_string('capacity', 'block_mrbs') ?></label>
                        <input class="form-control" min="0" step="1" type="number" name="capacity" placeholder="<?= get_string('capacity', 'block_mrbs') ?>" maxlength="5" size="5" pattern="\d+">
                    </div>    

                    <button type="submit" class="btn btn-default"><?= get_string('addroom', 'block_mrbs_rlp') ?></button></form>
                <?php
            }
            ?>
            &nbsp;
        </div>
    </div>  
</div>

<?php
$id = 1;
$delurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['delete' => true, 'sesskey' => sesskey()]);
$delallurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['delete_all' => true, 'sesskey' => sesskey()]);
$migrateurl = new moodle_url('/blocks/mrbs_rlp/web/admin.php', ['migrate' => true, 'sesskey' => sesskey()]);

$old_mrbs_area = "block_mrbs_area";
$old_mrbs_entry = "block_mrbs_entry";
$old_mrbs_repeat = "block_mrbs_repeat";
$old_mrbs_room = "block_mrbs_room";

$mrbs_area = "block_mrbs_rlp_area";
$mrbs_entry = "block_mrbs_rlp_entry";
$mrbs_repeat = "block_mrbs_rlp_repeat";
$mrbs_room = "block_mrbs_rlp_room";

$cnt_old_areas = 0;
$cnt_old_entries = 0;
$cnt_old_repeats = 0;
$cnt_old_rooms = 0;

$cnt_areas = 0;
$cnt_entries = 0;
$cnt_repeats = 0;
$cnt_rooms = 0;

$dbman = $DB->get_manager();

if($dbman->table_exists($old_mrbs_area)) {
	$cnt_old_areas = $DB->count_records($old_mrbs_area);
}
if($dbman->table_exists($old_mrbs_entry)) {
	$cnt_old_entries = $DB->count_records($old_mrbs_entry);
}
if($dbman->table_exists($old_mrbs_repeat)) {
	$cnt_old_repeats = $DB->count_records($old_mrbs_repeat);
}
if($dbman->table_exists($old_mrbs_room)) {
	$cnt_old_rooms = $DB->count_records($old_mrbs_room);
}

if($dbman->table_exists($mrbs_area)) {
	$cnt_areas = $DB->count_records($mrbs_area);
}
if($dbman->table_exists($mrbs_entry)) {
	$cnt_entries = $DB->count_records($mrbs_entry);
}
if($dbman->table_exists($mrbs_repeat)) {
	$cnt_repeats = $DB->count_records($mrbs_repeat);
}
if($dbman->table_exists($mrbs_room)) {
	$cnt_rooms = $DB->count_records($mrbs_room);
}

if($cnt_old_entries >= 1 || $cnt_old_rooms >= 1 || $cnt_old_areas >= 1 || $cnt_old_repeats >= 1) {
?>
<hr />
<p><strong>Migration aus der alten MRBS Installation</strong> 
<br />Anzahl Bereiche (MRBS):&nbsp;<?= $cnt_old_entries ?> 
<br />Anzahl Ressourcen (MRBS):&nbsp;<?= $cnt_old_rooms ?>
<br />Anzahl Einträge (MRBS):&nbsp;<?= $cnt_old_areas ?>
<br />Anzahl Wiederholungen (MRBS):&nbsp;<?= $cnt_old_repeats ?>
</p>
<button type="button" class="btn btn-warning" 
        onclick="if (confirm('Migration starten?')) {
                    document.location = '<?= $migrateurl ?>';
                }" />Migration starten?</button>&nbsp;<em><strong>Warnung:</strong> Alle bisherigen Einträge werden überschrieben!</em>
<?php
 }

if($cnt_entries >= 1 || $cnt_rooms >= 1 || $cnt_areas >= 1 || $cnt_repeats >= 1) {
?>
<hr />
<p><strong>Anzahl Bereiche (MRBS RLP):</strong>&nbsp;<?= $cnt_areas ?><br />
<strong>Anzahl Ressourcen (MRBS RLP):</strong>&nbsp;<?= $cnt_rooms ?><br />
<strong>Anzahl Einträge (MRBS RLP):</strong>&nbsp;<?= $cnt_entries ?></p>

<button type="button" class="btn btn-danger" 
        onclick="if (confirm('<?= get_string('deleteseries', 'block_mrbs_rlp') ?>?')) {
                    document.location = '<?= $delurl ?>';
                }" />
<?= get_string('deleteseries', 'block_mrbs_rlp') ?>?</button>  <em><strong>Warnung:</strong> Dadurch gehen alle Einträge verloren!</em>

<br /><br />
<button type="button" class="btn btn-danger" 
        onclick="if (confirm('Komplett zurücksetzen?')) {
                    document.location = '<?= $delallurl ?>';
                }" />MRBS RLP komplett zurücksetzen?</button>  <em><strong>Warnung:</strong> Dadurch gehen alle Einträge/Bereiche/Ressourcen verloren!</em>

<?php
}

$chkdelete = optional_param('delete', false, PARAM_BOOL);
if ($chkdelete === 1 || $chkdelete === true) {
    $DB->delete_records('block_mrbs_rlp_entry');
}

$chkdelete_all = optional_param('delete_all', false, PARAM_BOOL);
if ($chkdelete_all === 1 || $chkdelete_all === true) {
    $DB->delete_records('block_mrbs_rlp_entry');
    $DB->delete_records('block_mrbs_rlp_area');
    $DB->delete_records('block_mrbs_rlp_room');
}

// Kopiert die Daten vom alten MRBS zum MRBS RLP (mit ID)
$migrate = optional_param('migrate', false, PARAM_BOOL);
if ($migrate === 1 || $migrate === true) {

  $old_entries = $DB->get_records('block_mrbs_entry');
  $old_rooms = $DB->get_records('block_mrbs_room');
  $old_areas = $DB->get_records('block_mrbs_area');
  $old_repeats = $DB->get_records('block_mrbs_repeat'); 
  
  try {
       $transaction = $DB->start_delegated_transaction();
       $ins_entry = $DB->insert_records('block_mrbs_rlp_entry', $old_entries);       
       $ins_area = $DB->insert_records('block_mrbs_rlp_area', $old_areas);                                                                           
       $ins_room = $DB->insert_records('block_mrbs_rlp_room', $old_rooms);       
       $ins_repeat = $DB->insert_records('block_mrbs_rlp_repeat', $old_repeats);      
   
       // Assuming the both inserts work, we get to the following line.
       $transaction->allow_commit();
   
  } catch(Exception $e) {
       $transaction->rollback($e);
       throw new moodle_exception('Migration failed!');
  }

}

//echo '<br />'.get_string('browserlang','block_mrbs_rlp').' '.$HTTP_ACCEPT_LANGUAGE.' '.get_string('postbrowserlang','block_mrbs_rlp');
include 'trailer.php';
