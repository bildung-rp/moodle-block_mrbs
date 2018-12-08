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

    // Create the viewer role.
    if (!$DB->record_exists('role', ['shortname' => 'mrbs_rlpviewer'])) {
        $mrbs_rlpviewerid = create_role(
            get_string('mrbs_rlpviewer', 'block_mrbs_rlp'),
            'mrbs_rlpviewer',
                                    get_string('mrbs_rlpviewer_desc', 'block_mrbs_rlp')
        );
        set_role_contextlevels($mrbs_rlpviewerid, [CONTEXT_SYSTEM]);
        assign_capability('block/mrbs_rlp:viewmrbs_rlp', CAP_ALLOW, $mrbs_rlpviewerid, $context->id, true);
    }

    // Create the editor role.
    if (!$DB->record_exists('role', ['shortname' => 'mrbs_rlpeditor'])) {
        $mrbs_rlpeditorid = create_role(
            get_string('mrbs_rlpeditor', 'block_mrbs_rlp'),
            'mrbs_rlpeditor',
                                    get_string('mrbs_rlpeditor_desc', 'block_mrbs_rlp')
        );
        set_role_contextlevels($mrbs_rlpeditorid, [CONTEXT_SYSTEM]);
        assign_capability('block/mrbs_rlp:viewmrbs_rlp', CAP_ALLOW, $mrbs_rlpeditorid, $context->id, true);
        assign_capability('block/mrbs_rlp:editmrbs_rlp', CAP_ALLOW, $mrbs_rlpeditorid, $context->id, true);
    }

    // Create the admin role.
    if (!$DB->record_exists('role', ['shortname' => 'mrbs_rlpadmin'])) {
        $mrbs_rlpadminid = create_role(
            get_string('mrbs_rlpadmin', 'block_mrbs_rlp'),
            'mrbs_rlpadmin',
                                   get_string('mrbs_rlpadmin_desc', 'block_mrbs_rlp')
        );
        set_role_contextlevels($mrbs_rlpadminid, [CONTEXT_SYSTEM]);
        assign_capability('block/mrbs_rlp:viewmrbs_rlp', CAP_ALLOW, $mrbs_rlpadminid, $context->id, true);
        assign_capability('block/mrbs_rlp:editmrbs_rlp', CAP_ALLOW, $mrbs_rlpadminid, $context->id, true);
        assign_capability('block/mrbs_rlp:administermrbs_rlp', CAP_ALLOW, $mrbs_rlpadminid, $context->id, true);
        assign_capability('block/mrbs_rlp:viewalltt', CAP_ALLOW, $mrbs_rlpadminid, $context->id, true);
        assign_capability('block/mrbs_rlp:forcebook', CAP_ALLOW, $mrbs_rlpadminid, $context->id, true);
        assign_capability('block/mrbs_rlp:doublebook', CAP_ALLOW, $mrbs_rlpadminid, $context->id, true);
    }

    // Clear any capability caches
    $context->mark_dirty();
}
