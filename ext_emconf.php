<?php

########################################################################
# Extension Manager/Repository config file for ext: "bzd_staff_directory"
#
# Auto generated 27-02-2009 23:09
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'BZD Staff Directory',
	'description' => 'An extension to show your staff or club-members in different output styles (single persons, lists).',
	'category' => 'plugin',
	'shy' => 0,
	'dependencies' => 'cms,oelib',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author' => 'Mario Rimann',
	'author_email' => 'mario@screenteam.com',
	'author_company' => 'Screenteam GmbH',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'version' => '0.7.4',
	'_md5_values_when_last_written' => 'a:36:{s:9:"ChangeLog";s:4:"781d";s:40:"class.tx_bzdstaffdirectory_Exception.php";s:4:"a10d";s:42:"class.tx_bzdstaffdirectory_dbException.php";s:4:"b41f";s:43:"class.tx_bzdstaffdirectory_objectFromDb.php";s:4:"ee95";s:37:"class.tx_bzdstaffdirectory_person.php";s:4:"cc6f";s:35:"class.tx_bzdstaffdirectory_team.php";s:4:"eafb";s:21:"ext_conf_template.txt";s:4:"0bb0";s:12:"ext_icon.gif";s:4:"15b9";s:17:"ext_localconf.php";s:4:"4730";s:14:"ext_tables.php";s:4:"a0ce";s:14:"ext_tables.sql";s:4:"3305";s:24:"ext_typoscript_setup.txt";s:4:"da94";s:15:"flexform_ds.xml";s:4:"1820";s:36:"icon_tx_bzdstaffdirectory_groups.gif";s:4:"401f";s:39:"icon_tx_bzdstaffdirectory_locations.gif";s:4:"934b";s:37:"icon_tx_bzdstaffdirectory_persons.gif";s:4:"78eb";s:13:"locallang.xml";s:4:"0c99";s:16:"locallang_db.xml";s:4:"6784";s:7:"tca.php";s:4:"b30e";s:8:"todo.txt";s:4:"b6f5";s:14:"doc/manual.sxw";s:4:"dd6b";s:29:"media/bzd_staff_directory.css";s:4:"728a";s:27:"media/bzdstaff_template.htm";s:4:"37af";s:28:"media/dummyPictureFemale.jpg";s:4:"1361";s:26:"media/dummyPictureMale.jpg";s:4:"f1f4";s:15:"media/noimg.jpg";s:4:"4d3f";s:14:"pi1/ce_wiz.gif";s:4:"9322";s:38:"pi1/class.tx_bzdstaffdirectory_pi1.php";s:4:"c32a";s:46:"pi1/class.tx_bzdstaffdirectory_pi1_wizicon.php";s:4:"1d43";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"ab87";s:24:"pi1/static/editorcfg.txt";s:4:"92fe";s:52:"tests/tx_bzdstaffdirectory_objectFromDb_testcase.php";s:4:"91b1";s:46:"tests/tx_bzdstaffdirectory_person_testcase.php";s:4:"ded9";s:44:"tests/tx_bzdstaffdirectory_team_testcase.php";s:4:"c630";s:64:"tests/fixtures/class.tx_bzdstaffdirectory_objectFromDb_child.php";s:4:"e2a5";}',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'php' => '5.1.0-0.0.0',
			'typo3' => '4.1.0-4.3.99',
			'oelib' => '0.4.0-0.5.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
);

?>