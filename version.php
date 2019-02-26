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
// prevent direct access to this script
defined('MOODLE_INTERNAL') || die();

<<<<<<< HEAD
$plugin = new stdClass();
$plugin->version = 2019011701;
$plugin->requires = 2018051700; // Moodle 3.5+
=======
$plugin->version = 2018121200;
$plugin->requires = 2014051200; // Moodle 2.7+
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
$plugin->cron = 300;
$plugin->component = 'block_mrbs_rlp';
$plugin->maturity = MATURITY_STABLE;
<<<<<<< HEAD
$plugin->release = '1.4.1 (Build: 2019011000)';
=======
$plugin->release = '1.4.0 (Build: 2018121200)';
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
