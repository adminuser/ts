<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'account/default_controller';
$route['default_index'] = 'account/default_controller/index';
//$route['dashboard'] = 'dashboard/dashboard_controller/gotoDashboard';
$route['404_override'] = '';

// account

$route['account/login'] = 'account/Auth_Controller/login';
$route['account/logout'] = 'account/Auth_Controller/logout';
$route['account/signup'] = 'account/Register_Controller';
$route['account/candidatepresignup'] = 'account/Register_Controller/candidatePreSignUp';
$route['account/trainerpresignup'] = 'account/Register_Controller/trainerPreSignUp';
$route['account/candidatesignup'] = 'account/Register_Controller/signUp';
$route['account/trainersignup'] = 'account/Register_Controller/signUp';

$route['account/editprofile'] = 'account/Candidate_Controller/editProfile';



// account settings
$route['account/members'] = 'account/member_controller';
$route['customer/(:any)'] = 'dashboard/customer_controller/$1';

//static pages
$route['page/(:any)'] = 'page_controller/index/$1';

//dashboard
$route['dashboard'] = 'dashboard/Dashboard_Controller/goToDashBoard';

//management - users
$route['allcandidates'] = 'management/UserManagement_Controller/getAllUsers';
$route['alltrainers'] = 'management/UserManagement_Controller/getTrainers';
$route['user/add'] = 'management/UserManagement_Controller/addUser';
$route['user/filterusers'] = 'management/UserManagement_Controller/filterUsers';

//management - skill
$route['skill/add'] = 'management/Skill_Controller/addSkill';
$route['skill/viewall'] = 'management/Skill_Controller/getAllSkills';
$route['skill/view'] = 'management/Skill_Controller/getSkillById';
$route['skill/edit'] = 'management/Skill_Controller/editSkill';

//management - batch
$route['batch/add'] = 'management/Batch_Controller/addBatch';
$route['batch/viewall'] = 'management/Batch_Controller/getAllBatch';
$route['batch/view'] = 'management/Batch_Controller/getBatchById';
$route['batch/edit'] = 'management/Batch_Controller/editBatch';
$route['batch/allocate'] = 'management/Batch_Controller/allocateBatch';
$route['batch/getTrainersBySkill'] = 'management/Batch_Controller/getTrainersBySkill';
$route['batch/getReleasedBatchesBySkill'] = 'management/Batch_Controller/getReleasedBatchesBySkill';
$route['batch/getBatchCandBySkill'] = 'management/Batch_Controller/getBatchCandBySkill';

$route['batch/mail'] = 'management/Batch_Controller/testMail';

//forum
$route['forumlogin'] = 'account/Auth_Controller/forumLogin';
$route['forumlogout'] = 'account/Auth_Controller/forumLogout';
$route['forum'] = 'forum/Forum_Controller';
$route['forum/addpost'] = 'forum/Forum_Controller/addPost';
$route['forum/reply'] = 'forum/Forum_Controller/addReply';
$route['forum/allpost'] = 'forum/Forum_Controller/getAllPost';
$route['forum/viewpost'] = 'forum/Forum_Controller/getPost';
$route['forum/viewpostbyskill/(:any)'] = 'forum/Forum_Controller/getPostBySkill/$1';

//candidate
$route['profile'] = 'account/Candidate_Controller/editProfile';
$route['batch'] = 'account/Candidate_Controller/getAllBatchBySkill';
$route['resume'] = 'account/Candidate_Controller/resume';
$route['resumeupload'] = 'account/Candidate_Controller/resumeUpload';
$route['resumedownload'] = 'account/Candidate_Controller/resumeDownload';
$route['resumedelete'] = 'account/Candidate_Controller/resumeDelete';

$route['candidateresumes'] = 'account/Candidate_Controller/candidateResumes';

