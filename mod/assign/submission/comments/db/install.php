<?php
// This file is part of Moodle - http://moodle.org/
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

/**
 * Post-install code for the submission_comments module.
 *
 * @package    mod_assign
 * @subpackage submission_comments
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 * Code run after the module database tables have been created.
 */
function xmldb_submission_comments_install() {
    global $CFG, $DB, $OUTPUT;

    // do the install

    require_once($CFG->dirroot . '/mod/assign/locallib.php');
    // set the correct initial order for the plugins
    $assignment = new assignment();
    $plugin = $assignment->get_submission_plugin_by_type('comments');
    if ($plugin) {
        $plugin->move('down');
        $plugin->move('down');
    }
        
    // do the upgrades
    return true;
}

