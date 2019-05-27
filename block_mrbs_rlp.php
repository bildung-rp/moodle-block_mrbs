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

class block_mrbs_rlp extends block_base
{
    public function init()
    {
        $this->title = get_string('blockname', 'block_mrbs_rlp');
        $this->content_type = BLOCK_TYPE_TEXT;
    }

    public function has_config()
    {
        return true;
    }

    public function applicable_formats()
    {
        return ['all' => true];
    }

    public function get_content()
    {
        global $CFG, $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        $cfg_mrbs_rlp = get_config('block/mrbs_rlp');

        $context = context_system::instance();

        if (has_capability('block/mrbs_rlp:viewmrbs', $context) or has_capability('block/mrbs_rlp:editmrbs', $context) or has_capability('block/mrbs_rlp:administermrbs', $context)) {
            if (isset($CFG->block_mrbs_rlp_serverpath)) {
                $serverpath = $CFG->block_mrbs_rlp_serverpath;
            } else {
                $serverpath = $CFG->wwwroot . '/blocks/mrbs_rlp/web';
            }
            $go = get_string('accessmrbs_rlp', 'block_mrbs_rlp');
            $icon = '<img src="' . $OUTPUT->image_url('web', 'block_mrbs_rlp') . '" height="16" width="16" alt="" />';
            $target = '';
            if ($cfg_mrbs_rlp->newwindow) {
                $target = ' target="_blank" ';
            }
            $this->content = new stdClass();
            $this->content->text = '<a href="' . $serverpath . '/index.php" ' . $target . '>' . $icon . ' &nbsp;' . $go . '</a>';
            $this->content->footer = '';
            return $this->content;
        }

        return null;
    }

    public function cron()
    {
        global $CFG;
        include($CFG->dirroot . '/blocks/mrbs_rlp/import.php');

        return true;
    }
}
