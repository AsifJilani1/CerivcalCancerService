<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Register_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('');
    }

    public function Registration_get($id=0) {
             
        $user = $this->RegisterModel->Registertion_fetchdata($id);
        if (!empty($user)) {
           
            print_r(json_encode($user));
      } 
      else {
        
            print_r(json_encode($user));
        }
    }

    public function Registration_post() {
        $postDataJsonObject = file_get_contents("php://input");
        $postDataArray = json_decode($postDataJsonObject, TRUE);
        $user = array();
        $user['Full_Name'] = $postDataArray['Full_Name'];
        $user['Age'] = $postDataArray['Age'];
        $user['Mob_No'] = $postDataArray['Mobile_Number'];
        $user['Address'] = $postDataArray['Address'];
        $user['Qualification'] = $postDataArray['Qualification'];
        $user['Occupation'] = $postDataArray['Occupation'];
        $user['Per_Capital_Income'] = $postDataArray['Per_Capital_Income'];
        $user['Martial_Status'] = $postDataArray['Martial_Status'];
        $user['IMEI'] = $postDataArray['IMEI_Number'];
        $insert = $this->RegisterModel->user_insertdata($user);
        if ($insert) {
            $response_array = array();
            $response_array['status'] = TRUE;
            $response_array['message'] = "Registration has been  successfully!";
            print_r(json_encode($response_array));
//            $this->response([
//                'insertData' => $insert,
//                'status' => TRUE,
//                'message' => 'Registration hass been successfully',
//                    ], REST_Controller::HTTP_OK
//            );
        } else {
            $response_array = array();
            $response_array['status'] = FALSE;
            $response_array['message'] = "any column empty or worng!";
            print_r(json_encode($response_array));
        }
    }

//    public function result_post() {
//
//        $r = $this->RegisterModel->fetch_Data();
////        print_r($r['user_id']);
//        $user = array();
////        $id = $this->put('Mob_no');
//        $user['user_id'] = $this->post('user_id');
//        $user['pre_score'] = $this->post('pre_score');
//        $user['post_score'] = $this->post('post_score');
//        $user['test_date'] = $this->post('test_date');
//        $user['result'] = $this->post('result');
//        $user['expiry/recheck'] = $this->post('expiry/recheck');
//
//        $insert = $this->RegisterModel->result_insertdata($user, $id);
//        if ($insert) {
//            $this->response([
//                'insertData' => $insert,
//                'status' => TRUE,
//                'message' => 'Result Submit  successfully',
//                    ], REST_Controller::HTTP_OK
//            );
//        } else {
//            $this->response([
//                'status' => FALSE,
//                'message' => 'any column empty'
//                    ], REST_Controller :: HTTP_BAD_REQUEST);
//        }
//    }

    /*
     * 
     * 
     * 
     */

    public function getUserPrePost_post() {

        $postDataJsonObject = file_get_contents("php://input");
        $postDataArray = json_decode($postDataJsonObject, TRUE);
        $insertObject = array();
        $insertObject['user_id'] = $this->RegisterModel->getUserIdByMobileNumber($postDataArray['Mobile_Number']);
        $insertObject['pre_score'] = $postDataArray['PreResult'];
        $insertObject['post_score'] = $postDataArray['PostResult'];
        $insertObject['test_date'] = $postDataArray['Test_Date'];
        $insertObject['result'] = $postDataArray['Result'];
        $insertObject['expiry/recheck'] = $postDataArray['Expiry/Recheck_Date'];
        if ($insertObject['user_id']) {
            $datainsert = array();
            $datainsert['user_id'] = $insertObject['user_id'];
            $datainsert['pre_score'] = $insertObject['pre_score'];
            $datainsert['post_score'] = $insertObject['post_score'];
            $datainsert['test_date'] = $insertObject['test_date'];
            $datainsert['result'] = $insertObject['result'];
            $datainsert['expiry/recheck'] = $insertObject['expiry/recheck'];
            $insertquery = $this->RegisterModel->result_insertdata($datainsert);
            if ($insertquery) {
                $response_array = array();
                $response_array['status'] = TRUE;
                $response_array['message'] = "Prepost hass been successfully!";
                print_r(json_encode($response_array));
//                $this->response([
//                    'insertData' => $insertquery,
//                    'status' => TRUE,
//                    'message' => 'Prepost submit  successfully',
//                        ], REST_Controller::HTTP_OK
//                );
            } else {
                $response_array = array();
                $response_array['status'] = FALSE;
                $response_array['message'] = "any column empty or worng!";
                print_r(json_encode($response_array));
//                $this->response([
//                    'status' => FALSE,
//                    'message' => 'Erorr',
//                        ], REST_Controller :: HTTP_BAD_REQUEST);
            }
        } else {

            $response_array = array();
            $response_array['status'] = FALSE;
            $response_array['message'] = "any column empty or worng!";
            print_r(json_encode($response_array));
        }
    }

    /*     * *
     * 
     * 
     * 
     * 
     * 
     * 
     */

    function withoutRegistration_post() {
        $postDataJosnObject = file_get_contents("php://input");
        $postDataArray = json_decode($postDataJosnObject, TRUE);
        $insertData = array();
        $insertData['Age'] = $postDataArray['Age'];
        $insertData['paptest'] = $postDataArray['Paptest'];
        $insertData['check_date'] = $postDataArray['Check_Date'];
        $insertData['what_was_result'] = $postDataArray['What_was_Result'];
        $insertData['negative_Result_Status'] = $postDataArray['Negative_Result_Status'];
        $insertquery = $this->RegisterModel->withOutRagistartionInsertData($insertData);
        if ($insertquery) {
            $response_array = array();
            $response_array['status'] = TRUE;
            $response_array['message'] = "withoutRegistration hass been successfully!";
            print_r(json_encode($response_array));
//            $this->response([
//                'insertData' => $insertquery,
//                'status' => TRUE,
//                'message' => 'withoutRegistration submit successfully',
//                    ], REST_Controller::HTTP_OK
//            );
        } else {
            $response_array = array();
            $response_array['status'] = FALSE;
            $response_array['message'] = "any column empty or worng!";
            print_r(json_encode($response_array));
        }
    }

    function pre_test_post() {
        $postDataJosnObject = file_get_contents("php://input");
        $postDataArray = json_decode($postDataJosnObject, TRUE);
        $insertData = array();
        $insertData['question'] = $postDataArray['Question'];
        $insertData['user_id'] = $this->RegisterModel->getUserIdByMobileNumber($postDataArray['Mobile_Number']);
        $insertquery = $this->RegisterModel->pre_test_insertData($insertData);
        if ($insertquery) {
            $response_array = array();
            $response_array['status'] = TRUE;
            $response_array['message'] = "Pretest hass been successfully!";
            print_r(json_encode($response_array));

//            $this->response([
//                'insertData' => $insertquery,
//                'status' => TRUE,
//                'message' => 'Pretest submit successfully',
//                    ], REST_Controller::HTTP_OK
//            );
        } else {
            $response_array = array();
            $response_array['status'] = FALSE;
            $response_array['message'] = "any column empty or worng!";
            print_r(json_encode($response_array));
        }
    }

    function pos_test_post() {
        $postDataJosnObject = file_get_contents("php://input");
        $postDataArray = json_decode($postDataJosnObject, TRUE);
        $insertData = array();
        $insertData['postTestQuestion'] = $postDataArray['Question'];
        $insertData['user_id'] = $this->RegisterModel->getUserIdByMobileNumber($postDataArray['Mobile_Number']);
        $insertquery = $this->RegisterModel->post_test_insertData($insertData);
        if ($insertquery) {
            $response_array = array();
            $response_array['status'] = TRUE;
            $response_array['message'] = "PostTest hass been successfully!";
            print_r(json_encode($response_array));
//            $this->response([
//                'insertData' => $insertquery,
//                'status' => TRUE,
//                'message' => 'PostTest submit successfully',
//                    ], REST_Controller::HTTP_OK
//            );
        } else {
            $response_array = array();
            $response_array['status'] = FALSE;
            $response_array['message'] = "any column empty or worng!";
            print_r(json_encode($response_array));
        }
    }

    function preQuestion_post() {
        $postDataJosnObject = file_get_contents("php://input");
        $postDataArray = json_decode($postDataJosnObject, TRUE);
        $insertData = array();
        $insertData['question'] = $postDataArray['Question'];
        $insertData['user_id'] = $this->RegisterModel->getUserIdByMobileNumber($postDataArray['Mobile_Number']);
        $insertquery = $this->RegisterModel->questioninsertData($insertData);
        if ($insertquery) {
            $insertData['subquestion'] = $postDataArray['Subquestion'];
            $insertData['question_id'] = $this->RegisterModel->getUserQuestionid($postDataArray['Mobile_Number']);
            $subinsertquery = $this->RegisterModel->subQuestioninsertData($insertData);

            if ($subinsertquery) {
                $insertData['answer'] = $postDataArray['Answer'];
                $insertData['sub_question_id'] = $this->RegisterModel->getUserAnswerid($postDataArray['Mobile_Number']);
                $ansinsertquery = $this->RegisterModel->subAnswerinsertData($insertData);
                if ($ansinsertquery) {
                    $response_array = array();
                    $response_array['status'] = TRUE;
                    $response_array['message'] = "preQuestion hass been successfully!";
                    print_r(json_encode($response_array));
//                    $this->response([
//                        'insertData' => $ansinsertquery,
//                        'status' => TRUE,
//                        'message' => 'preQuestion submit successfully',
//                            ], REST_Controller::HTTP_OK
//                    );
                } else {
                    $response_array = array();
                    $response_array['status'] = FALSE;
                    $response_array['message'] = "any column empty or worng!";
                    print_r(json_encode($response_array));
                }
            } else {
                $response_array = array();
                $response_array['status'] = FALSE;
                $response_array['message'] = "any column empty or worng!";
                print_r(json_encode($response_array));
            }
        } else {
            $response_array = array();
            $response_array['status'] = FALSE;
            $response_array['message'] = "any column empty or worng!";
            print_r(json_encode($response_array));
        }
    }

}
