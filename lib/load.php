<?php
session_start();
require('config.php');
require('class/database-class.php');
require('class/view-class.php');
require('class/helper-class.php');
require('class/session-class.php');
require('class/action-class.php');

$action = new Action;

// // $action->db->insert('demo','name,age,email',['krish',14,'mymail@gmail.com']);
// echo "<pre>";
// // print_r($action->db->delete("demo","id>2"));
// print_r($action->db->update("demo","age,email",[18,"krish18@gmail.com"],"id=2"));
// // echo "<pre>";
// // print_r($action->db->read("demo","id,name,email","WHERE id>2"));
// $action->session->set("name","sahil");
//  $action->session->set("name","aasdf");
// echo $action->session->get("name");