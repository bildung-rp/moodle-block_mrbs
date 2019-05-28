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

defined('MOODLE_INTERNAL') || die();

function xmldb_block_mrbs_rlp_install()
{
    global $DB;

    // Get system context.
    $context = context_system::instance();    
    $pluginname = 'mrbs_rlp';                 

    // Create the viewer role.
    if (!$DB->record_exists('role', ['shortname' => 'mrbs_rlpviewer'])) {
        $mrbs_rlpviewerid = create_role(
            get_string('mrbs_rlpviewer', 'block_mrbs_rlp'),
            'mrbs_rlpviewer',get_string('mrbs_rlpviewer_desc', 'block_mrbs_rlp')
        );        
        $set_role = set_role_contextlevels($mrbs_rlpviewerid, [CONTEXT_SYSTEM]);
        $capability = 'block/' . $pluginname . ':viewmrbs';
        $viewerid = $DB->get_field('role', 'id', array('shortname' => 'mrbs_rlpviewer'));
        $ret = update_capability($capability, CAP_ALLOW, $viewerid, $context->id, true);       
    }

    // Create the editor role.
    if (!$DB->record_exists('role', ['shortname' => 'mrbs_rlpeditor'])) {
        $mrbs_rlpeditorid = create_role(
            get_string('mrbs_rlpeditor', 'block_mrbs_rlp'),
            'mrbs_rlpeditor',get_string('mrbs_rlpeditor_desc', 'block_mrbs_rlp')
        );
        $set_role = set_role_contextlevels($mrbs_rlpeditorid, [CONTEXT_SYSTEM]);
        $view_capability = 'block/' . $pluginname . ':viewmrbs';
        $edit_capability = 'block/' . $pluginname . ':editmrbs';
        $editorid = $DB->get_field('role', 'id', array('shortname' => 'mrbs_rlpeditor'));        
        $ret = update_capability($view_capability, CAP_ALLOW, $editorid, $context->id, true);
        $ret = update_capability($edit_capability, CAP_ALLOW, $editorid, $context->id, true);
    }

    // Create the admin role.
    if (!$DB->record_exists('role', ['shortname' => 'mrbs_rlpadmin'])) {
        $mrbs_rlpadminid = create_role(
            get_string('mrbs_rlpadmin', 'block_mrbs_rlp'),
            'mrbs_rlpadmin',get_string('mrbs_rlpadmin_desc', 'block_mrbs_rlp')
        );
        $set_role = set_role_contextlevels($mrbs_rlpadminid, [CONTEXT_SYSTEM]);
        $view_capability = 'block/' . $pluginname . ':viewmrbs';
        $edit_capability = 'block/' . $pluginname . ':editmrbs';
        $admin_capability = 'block/' . $pluginname . ':administermrbs';
        $viewall_capability = 'block/' . $pluginname . ':viewalltt';
        $forcebook_capability = 'block/' . $pluginname . ':forcebook';
        $doublebook_capability = 'block/' . $pluginname . ':doublebook'; 
        $adminid = $DB->get_field('role', 'id', array('shortname' => 'mrbs_rlpadmin'));      
        
        $ret = update_capability($view_capability, CAP_ALLOW, $adminid, $context->id, true);
        $ret = update_capability($edit_capability, CAP_ALLOW, $adminid, $context->id, true);
        $ret = update_capability($admin_capability, CAP_ALLOW, $adminid, $context->id, true);
        $ret = update_capability($viewall_capability, CAP_ALLOW, $adminid, $context->id, true);
        $ret = update_capability($forcebook_capability, CAP_ALLOW, $adminid, $context->id, true);
        $ret = update_capability($doublebook_capability, CAP_ALLOW, $adminid, $context->id, true);
    }

    // Clear any capability caches
    $context->mark_dirty();
}

function update_capability($capability, $permission, $roleid, $contextid, $overwrite = false) {
    global $USER, $DB;

    if ($contextid instanceof context) {
        $context = $contextid;
    } else {
        $context = context::instance_by_id($contextid);
    }

    $existing = $DB->get_record('role_capabilities', array('contextid'=>$context->id, 'roleid'=>$roleid, 'capability'=>$capability));

    if ($existing and !$overwrite) {   // We want to keep whatever is there already
        return true;
    }

    $cap = new stdClass();
    $cap->contextid    = $context->id;
    $cap->roleid       = $roleid;
    $cap->capability   = $capability;
    $cap->permission   = $permission;
    $cap->timemodified = time();
    $cap->modifierid   = empty($USER->id) ? 0 : $USER->id;

    if ($existing) {
        $cap->id = $existing->id;
        $DB->update_record('role_capabilities', $cap);
    } else {
        if ($DB->record_exists('context', array('id'=>$context->id))) {
            $DB->insert_record('role_capabilities', $cap);
        }
    }

    // Reset any cache of this role, including MUC.
    accesslib_clear_role_cache($roleid);
    
    return true;
}