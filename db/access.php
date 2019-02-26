<?php

//
// Capability definitions for the links block.
//
// The capabilities are loaded into the database table when the block is
// installed or updated. Whenever the capability definitions are updated,
// the module version number should be bumped up.
//
// The system has four possible values for a capability:
// CAP_ALLOW, CAP_PREVENT, CAP_PROHIBIT, and inherit (not set).
//
//
// CAPABILITY NAMING CONVENTION
//
// It is important that capability names are unique. The naming convention
// for capabilities that are specific to modules and blocks is as follows:
//   [mod/block]/<component_name>:<capabilityname>
//
// component_name should be the same as the directory name of the mod or block.
//
// Core moodle capabilities are defined thus:
//    moodle/<capabilityclass>:<capabilityname>
//
// Examples: mod/forum:viewpost
//           block/recent_activity:view
//           moodle/site:deleteuser
//
// The variable name for the capability definitions array follows the format
//   $<componenttype>_<component_name>_capabilities
//
// For the core capabilities, the variable is $moodle_capabilities.


defined('MOODLE_INTERNAL') || die();

<<<<<<< HEAD
$capabilities = [
    'block/mrbs_rlp:viewmrbs_rlp' => [
=======
<<<<<<< HEAD
$capabilities = [
    'block/mrbs_rlp:viewmrbs_rlp' => [
=======
$capabilities = array(
    'block/mrbs:viewmrbs' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:editmrbs_rlp' => [
=======
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:editmrbs_rlp' => [
=======
        )
    ),
    'block/mrbs:editmrbs' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:administermrbs_rlp' => [
=======
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:administermrbs_rlp' => [
=======
        )
    ),
    'block/mrbs:administermrbs' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:viewalltt' => [
=======
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:viewalltt' => [
=======
        )
    ),
    'block/mrbs:viewalltt' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        'captype' => 'view',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:forcebook' => [
=======
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:forcebook' => [
=======
        )
    ),
    'block/mrbs:forcebook' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:doublebook' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW
        ]
    ],
    // Limits users to only creating 'unconfirmed' bookings
    // (unless they are the room administrator)
    'block/mrbs_rlp:editmrbs_rlpunconfirmed' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => []
    ],
    'block/mrbs_rlp:myaddinstance' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'user' => CAP_ALLOW
        ],
        'clonepermissionsfrom' => 'moodle/my:manageblocks'
    ],
    'block/mrbs_rlp:addinstance' => [
=======
<<<<<<< HEAD
        ]
    ],
    'block/mrbs_rlp:doublebook' => [
=======
        )
    ),
    'block/mrbs:doublebook' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW
<<<<<<< HEAD
        ]
    ],
    // Limits users to only creating 'unconfirmed' bookings
    // (unless they are the room administrator)
    'block/mrbs_rlp:editmrbs_rlpunconfirmed' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => []
    ],
    'block/mrbs_rlp:myaddinstance' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'user' => CAP_ALLOW
        ],
        'clonepermissionsfrom' => 'moodle/my:manageblocks'
    ],
    'block/mrbs_rlp:addinstance' => [
=======
        )
    ),
    // Limits users to only creating 'unconfirmed' bookings
    // (unless they are the room administrator)
    'block/mrbs:editmrbsunconfirmed' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array()
    ),
    'block/mrbs:myaddinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'moodle/my:manageblocks'
    ),
    'block/mrbs:addinstance' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => [
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        ],
        'clonepermissionsfrom' => 'moodle/site:manageblocks'
    ],
    'block/mrbs_rlp:ignoremaxadvancedays' => [
<<<<<<< HEAD
=======
=======
        ),
        'clonepermissionsfrom' => 'moodle/site:manageblocks'
    ),
    'block/mrbs:ignoremaxadvancedays' => array(
>>>>>>> dd4841aea9b085df546a67ad05e7819b2b70b3e4
>>>>>>> 1cc615bb4b7d24c455d09a0e2dfaa3f4bb1e92e0
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW
        ],
        'clonepermissionsfrom' => 'block/mrbs_rlp:administermrbs_rlp',
    ],
];
