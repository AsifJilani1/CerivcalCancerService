<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageVideo_controller
 *
 * @author zmq184
 */
class ImageVideo_controller extends CI_Controller {
public function __construct() {
parent::__construct();

$this->load->model('ImageVideo');
}
public function hello()
{
echo 'welcome';
}
function ImageInsert_post() {
$postDataJosnObject = file_get_contents("php://input");
$postDataArray = json_decode($postDataJosnObject, TRUE);
$insertData = array();
$insertData['Img'] = $postDataArray['cs.jpeg'];

$insertquery = $this->ImageVideo->ImageInserData($insertData);
if ($insertquery) {
$response_array = array();
$response_array['status'] = TRUE;
$response_array['message'] = "Image insert hass been successfully!";
print_r(json_encode($response_array));
} else {
$response_array = array();
$response_array['status'] = FALSE;
$response_array['message'] = "any column empty or worng!";
print_r(json_encode($response_array));
}
}
public function upload_img()
{
$postDataJosnObject = file_get_contents("php://input");
$postDataArray = json_decode($postDataJosnObject, TRUE);
$image =base64_decode($postDataArray["Img"]);
$image_name = md5(uniqid(rand(), true));
$filename = $image_name . '.' . 'jpeg';
//rename file name with random number
$path = "/var/www/html/CerivcalCancerService/Media/".$postDataArray["Img"];
//image uploading folder path
file_put_contents($path . $filename, $postDataArray["Img"]);
// image is bind and upload to respective folde

//$data_insert = array('front_img'=>$filename);

$data_insert = array('Img' => $filename);

$success = $this->ImageVideo->ImageInserData($data_insert);
if($success){
$b = "User Registered Successfully..";
}
else
{
$b = "Some Error Occured. Please Try Again..";
}
echo json_encode($b);
}

}
