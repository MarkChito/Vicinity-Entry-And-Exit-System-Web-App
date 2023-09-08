<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
//Grade constant
define('PENDING',	'pending');
define('REJECT',	'reject');
define('APPROVE',	'approve');
define('CHANGES',	'changes');
define('TEMPLATE',	'template');
define('NEWADD',	'new');
define('CANCEL',	'cancel');
define('EDITTEMPLATE',	'EDITTEMPLATE');
define('GET',	'get');
define('SEND',	'SEND'); // SJ 02/02/2015 added to make status send by the department
//added for edit catcher in gradesdashboardview.php
define('EDITCATCHER', 'edit');
// action of forms
define('CREATEMETRIC', 'createmetric');
define('SHOWGRADE', 'showgrade');
define('REQUESTSCHEDULE', 'REQUESTSCHEDULE');
define('CREATEMPLATE', 'CREATEMPLATE');
define('IFR', 'IFR');
//type of forms
define('GRADES', 'GRADES');
define('DEPARTMENT', 'DEPARTMENT');
define('MASTERADMIN', 'MASTERADMIN');
define('EXAM', 'EXAM');
define('PEXAM', 'PEXAM');
define('INTERVIEW', 'INTERVIEW');
define('EVALUATOR', 'EVALUATOR');
define('STUDENT', 'STUDENT');
define('LIBRARY', 'LIBRARY');
define('LIBRARYADMIN', 'LIBRARYADMIN');
define('FA', 'FA'); #added for Final Approver
define('SA', 'SA'); #added for Super admin
define('CASHIER', 'CASHIER'); #added for Cashier

/* Virtual class */
define('MYCLASSTEACHER', 'MYCLASSTEACHER');
define('MYCLASSSTUDENT', 'MYCLASSSTUDENT');
/* parent */
define('PARENTSTUDENT', 'PARENTSTUDENT');
define('PARENTSTUDENTMYCLASS', 'PARENTSTUDENTMYCLASS');
define('PARENTSTUDENTCLASSSTANDING', 'PARENTSTUDENTCLASSSTANDING');

//Registration constant
define('REGISTRATION', 'registration');

//DASHBOARD
define('DASHBOARD', 'DASHBOARD');


//Resources Center
define('RESOURCES', 'RESOURCES');
//Subjects in Resource Center
define('MATHEMATICS', 'mathematics');
define('ENGLISH', 'english');
define('SCIENCE', 'science');
define('LIBRARYTYPE', 'library');
define('LIBRARYTYPE_RESERVE', 'Library-Reserve');


//Admin maintenance 8/22/14
define('ADMINISTRATOR', 'ADMINISTRATOR');
define('ADDMETRIC', 'ADDMETRIC');
define('EDITMETRIC', 'EDITMETRIC');
define('ADDPOLICY', 'ADDPOLICY');
define('EDITPOLICY', 'EDITPOLICY');
define('ADDPERIOD', 'ADDPERIOD');
define('EDITPERIOD', 'EDITPERIOD');
define('ADDTAGS', 'ADDTAGS');
define('EDITTAGS', 'EDITTAGS');
define('ADDSTATUS', 'ADDSTATUS');
define('EDITSTATUS', 'EDITSTATUS');
define('ADDGROUP', 'ADDGROUP');
define('EDITGROUP', 'EDITGROUP');
define('GLOBAL_PARAMETER','GLOBAL_PARAMETER');


//Profile
define('STUDENTPROFILE','STUDENTPROFILE');

//LIBRARY TYPE
define('BOOK','0');
define('ITEM','1');

//LIBRARY TYPE
define('PAGESTART','0');
define('PAGEEND','15');
define('PAGINGCOUNT','20');

/* SJ 01/30/2015 constant for grades admin  */
define('GRADESADMIN', 'GRADESADMIN');

/* End of file constants.php */
/* Location: ./application/config/constants.php */