<?php
require('lib/load.php');

// by Default route url
$action->helper->route('/', function () {
  global $action;
  $data['title'] = 'CV Builder - Build & Share Online';
  $action->view->load('header', $data);
  $action->view->load('navbar');
  $action->view->load('login-page');
  $action->view->load('footer');
});


// for LogOut function
$action->helper->route('action/logout', function () {
  global $action;
  $action->session->delete('Auth');
  $action->session->set('success', 'Logged Out !');
  $action->helper->redirect('login');
});

// To delete resume 
$action->helper->route('action/deleteresume/$url', function ($data) {
  global $action;
  $url = $data['url'];

  $action->db->delete('resumes', "url='$url'");

  $action->session->set('success', 'Resume Deleted !');
  $action->helper->redirect('home');
});

//to display signup page
$action->helper->route('signup', function () {
  global $action;
  $action->onlyForUnauthUser();
  $data['title'] = 'SignUp - CV Builder';
  $data['signup'] = 'active';
  $action->view->load('header', $data);
  $action->view->load('navbar', $data);
  $action->view->load('signup-page');
  $action->view->load('footer');
});

//for action signup
$action->helper->route('action/signup', function () {
  global $action;
  $error = $action->helper->isAnyEmpty($_POST);
  if ($error) {
    $action->session->set('error', "$error is empty !");
    $action->helper->redirect('signup');
  } else {
    $signup_data[0] = $action->db->clean($_POST['full_name']);
    $signup_data[1] = $action->db->clean($_POST['email_id']);
    $signup_data[2] = $action->db->clean($_POST['password']);
    $user = $action->db->read('users', 'email_id', "WHERE email_id ='$signup_data[1]'");
    if (count($user) > 0) {
      $action->session->set('error', $signup_data[1] . " is already Register !");
      $action->helper->redirect('signup');
    } else {

      $action->db->insert('users', 'full_name,email_id,password', $signup_data);
      $action->session->set('success', 'Account Created');
      $action->helper->redirect('login');
    }
  }
});


// to display login page 

$action->helper->route('login', function () {
  global $action;
  $action->onlyForUnauthUser();
  $data['title'] = 'Login to - CV Builder';
  $data['login'] = 'active';
  $action->view->load('header', $data);
  $action->view->load('navbar', $data);
  $action->view->load('login-page');
  $action->view->load('footer');
});


//Login function
$action->helper->route('action/login', function () {
  global $action;
  $error = $action->helper->isAnyEmpty($_POST);
  if ($error) {
    $action->session->set('error', "$error is empty !");
  } else {
    $email = $action->db->clean($_POST['email_id']);
    $password = $action->db->clean($_POST['password']);
    $user = $action->db->read('users', 'id,email_id', "WHERE email_id ='$email' AND password ='$password'");
    if (count($user) > 0) {
      $action->session->set('Auth', ['status' => true, 'data' => $user[0]]);
      $action->session->set('success', 'Logged In !');
      $action->helper->redirect('home');
    } else {
      $action->session->set('error', "incorrect email/password !");
      $action->helper->redirect('login');
    }
  }
});


// To display HomePage
$action->helper->route('home', function () {
  global $action;
  $action->onlyForAuthUser();
  $data['title'] = 'Welcome User - CV Builder';
  $data['myresume'] = 'active';
  $data['resumes'] = $action->db->read('resumes', '*', 'WHERE user_id =' . $action->user_id());
  $data['demo'] = $action->db->read('demo','*', 'WHERE id = 1');
  $action->view->load('header', $data);
  $action->view->load('navbar', $data);
  $action->view->load('home-page', $data);
  $action->view->load('footer');
});

// To display resume in defferent template 
$action->helper->route('resume/$cvtemp/$url', function ($data) { 
  global $action;
  if($data['url'] == 1){
  $resumedata = $action->db->read("demo", "*", "WHERE id = 1");
  }else{

    $resumedata = $action->db->read("resumes", "*", "WHERE url='" . $data['url']. "'");
  }
  if (!$resumedata) {
    $action->helper->redirect('home');
  }
  $resumedata = $resumedata[0];
  $data['title'] = $resumedata['name'];
  $data['resume'] = $resumedata;

  if ($data['cvtemp'] == 1) {
   $action->view->load('cv-template-1', $data);
  }elseif($data['cvtemp'] == 2){
    $action->view->load('cv-template-2', $data);
  }  else {
    $action->helper->redirect('home');
  }
});

// To display Update Page 
$action->helper->route('update/$url', function ($data) {
  global $action;
  $resumedata = $action->db->read("resumes", "*", "WHERE url='" . $data['url'] . "'");
  if (!$resumedata) {
    $action->helper->redirect('home');
  }
  $resumedata = $resumedata[0];

  $data['title'] = "Updating/" . $resumedata['name'];
  $data['resume'] = $resumedata;
  $action->view->load('header', $data);
  $action->view->load('navbar', $data);
  $action->view->load('update-cv-form', $data);
  $action->view->load('footer');
});

//To Display resume template 
$action->helper->route('select-template/$url', function ($data) {
  global $action;
  $action->onlyForAuthUser();
  $data['title'] = 'Select CV Template';
  $data['myresume'] = 'active';
  $action->view->load('header', $data);
  $action->view->load('navbar', $data);
  $action->view->load('select-template', $data);
  $action->view->load('footer');
});




// to load cv form
$action->helper->route('cv-form', function () {
    global $action;
    $action->onlyForAuthUser();
    $data['title'] = 'Feed CV Details';
    $data['myresume'] = 'active';
    $action->view->load('header', $data);
    $action->view->load('navbar', $data);
    $action->view->load('cv-form');
    $action->view->load('footer');
});

  // for resume data insertion

$action->helper->route('action/createresume', function () {
  global $action;
  $action->onlyForAuthUser();
  $resume_data[0] = $action->session->get('Auth')['data']['id'];
  $resume_data[1] = $action->db->clean($_POST['name']);
  $resume_data[2] = $action->db->clean($_POST['headline']);
  $resume_data[3] = $action->db->clean($_POST['objective']);
  $contact['email'] = $action->db->clean($_POST['email']);
  $contact['mobile'] = $action->db->clean($_POST['mobile']);
  $contact['address'] = $action->db->clean($_POST['address']);
  $contact['linkedin'] = $action->db->clean($_POST['linkedin-url']);

  $resume_data[4] = json_encode($contact);
  $resume_data[5] = json_encode($_POST['skill']);
  $education = array();
  $work = array();
  foreach ($_POST['course'] as $key => $value) {
    $education[$key]['course'] = $value;
    $education[$key]['collage'] = $_POST['collage'][$key];
    $education[$key]['branch'] = $_POST['branch'][$key];
    $education[$key]['e_duration'] = $_POST['e_duration'][$key];
    $education[$key]['percentage'] = $_POST['percentage'][$key];
  }
  foreach ($_POST['company'] as $key => $value) {
    $work[$key]['company'] = $value;
    $work[$key]['jobrole'] = $_POST['jobrole'][$key];
    $work[$key]['w_duration'] = $_POST['w_duration'][$key];
    $work[$key]['work_desc'] = $_POST['work_desc'][$key];
  }
  $resume_data[6] = json_encode($education);
  $resume_data[7] = json_encode($work);
  $resume_data[8] = $action->helper->uid();
  $resume_data[9] = $_FILES["profilepic"]["name"];
  // for Profile Photo Upload
  $tempname = $_FILES["profilepic"]["tmp_name"];  

  $folder = "assets/profilepics/".$resume_data[9];
  move_uploaded_file($tempname, $folder);
  $run = $action->db->insert('resumes', 'user_id,name,headline,objective,contact,skills,education,experience,url,profilepic', $resume_data);

  if ($run == null) {
    $action->session->set('success', 'Resume Created');
    $action->helper->redirect('home');
  } else {
    $action->session->set('error', 'Something Went Wrong! try again after  sometime.');
    $action->helper->redirect('home');
  }
});


// for Upated data Insertion 
$action->helper->route('action/updateresume', function () {
  global $action;
  $action->onlyForAuthUser();
  $resume_data[0] = $action->db->clean($_POST['name']);
  $resume_data[1] = $action->db->clean($_POST['headline']);
  $resume_data[2] = $_POST['objective'];
  $contact['email'] = $action->db->clean($_POST['email']);
  $contact['mobile'] = $action->db->clean($_POST['mobile']);
  $contact['address'] = $action->db->clean($_POST['address']);
  $contact['linkedin'] = $action->db->clean($_POST['linkedin-url']);

  $resume_data[3] = json_encode($contact);
  $resume_data[4] = json_encode($_POST['skill']);
  $education = array();
  $work = array();
  foreach ($_POST['course'] as $key => $value) {
    $education[$key]['course'] = $value;
    $education[$key]['collage'] = $_POST['collage'][$key];
    $education[$key]['branch'] = $_POST['branch'][$key];
    $education[$key]['e_duration'] = $_POST['e_duration'][$key];
    $education[$key]['percentage'] = $_POST['percentage'][$key];
  }
  foreach ($_POST['company'] as $key => $value) {
    $work[$key]['company'] = $value;
    $work[$key]['jobrole'] = $_POST['jobrole'][$key];
    $work[$key]['w_duration'] = $_POST['w_duration'][$key];
    $work[$key]['work_desc'] = $_POST['work_desc'][$key];
  }
  $resume_data[5] = json_encode($education);
  $resume_data[6] = json_encode($work);

  $resume_data[7] = $_FILES["profilepic"]["name"];
  // for Profile Photo Upload
  $tempname = $_FILES["profilepic"]["tmp_name"];

  $folder = "assets/profilepics/".$resume_data[7];
  move_uploaded_file($tempname, $folder);
  $uid =  $_POST['uid'];


 

  $update = $action->db->update("resumes","name,headline,objective,contact,skills,education,experience,profilepic", $resume_data," id = {$uid}");

  
  if ($update == null) {
    $action->session->set('success', 'Resume Updated');
    $action->helper->redirect('home');
  } else {
    $action->session->set('error', 'Something Went Wrong! try again after  sometime.');
    $action->helper->redirect('home');
  }
});

// for No Page found
if (!Helper::$isPageIsAvailable) {
  $data['title'] = '404 - Page Not Found';
  $action->view->load('header', $data);
  $action->view->load('navbar', $data);
  $action->view->load('not-found');
  $action->view->load('footer');
}
