<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterModel
 *
 * @author zmq184
 */
class RegisterModel extends CI_Model {

    public function __construct() {
        parent::__construct();
//        $this->load->database();
    }

    function Registertion_fetchdata($id) {
        if(!empty($id)){
        $this->db->select('*');
        $this->db->from('RegistrationTable');
        $this->db->where('Mob_no',$id);
        $query = $this->db->get();
        return $query->row_array();}
 else {
     $this->db->select('*');
        $this->db->from('RegistrationTable');
//        $this->db->where('Mob_no',$id);
        $query = $this->db->get();
        return $query->row_array();
 }
    }

    function user_insertdata($UserData = []) {
        $insert = $this->db->insert('RegistrationTable', $UserData);
        if ($insert) {
            return $insert;
        } else {
            return $insert;
        }
    }

    function result_insertdata($UserData = []) {

        $insert = $this->db->insert('ResultTable', $UserData);
//        print_r($insert);
        if ($insert) {
            return $insert;
        } else {
            return $insert;
        }
    }

    /**
     * 
     * 
     * 
     * 
     */
    public function getUserIdByMobileNumber($mobileNumner = NULL) {
        if ($mobileNumner != NULL) {
            $this->db->select('user_id');
            $this->db->from('RegistrationTable');
            $this->db->where('Mob_No', $mobileNumner);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result_array()[0]['user_id'];
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * 
     * 
     */
    public function getUserQuestionid($mobileNumner = NULL) {
        if ($mobileNumner != NULL) {
            $this->db->select('user_id');
            $this->db->from('RegistrationTable');
            $this->db->where('Mob_No', $mobileNumner);
            $query = $this->db->get();

// 
//          $id=$this->db->select('question_id');
//            $this->db->from('tb1Question');
//            $this->db->where('question', $data);
//            $query = $this->db->get();
////            $this->db->where('question_id',  $id);
////            $query = $this->db->get();
////            print_r($query->result_array());
            if ($query->num_rows() > 0) {
                return $query->result_array()[0]['user_id'];
            } else {
                return FALSE;
            }
        }
    }

    /**
     * 
     * 
     * 
     */
    public function getUserAnswerid($mobileNumner = NULL) {
        if ($mobileNumner != NULL) {
            $this->db->select('user_id');
            $this->db->from('RegistrationTable');
            $this->db->where('Mob_No', $mobileNumner);
            $query = $this->db->get();


//        if ($subquestion != NULL) {
//            $this->db->select('sub_question_id');
//            $this->db->from('tb2subquestion');
//            $this->db->where('subquestion', $subquestion);
////            $this->db->where('sub_question_id',  $this->input->post('sub_question_id'));
//
//            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result_array()[0]['user_id'];
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param type $dataArray
     * @return boolean
     * 
     * 
     * 
     */
    public function withOutRagistartionInsertData($dataArray = []) {
        $query = $this->db->insert('WithOutRegistrationTable', $dataArray);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function pre_test_insertData($dataArray = []) {
        $query = $this->db->insert('preTestQuestionTable', $dataArray);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function post_test_insertData($dataArray = []) {
        $query = $this->db->insert('postTestQuestiontable', $dataArray);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function questioninsertData($dataArray = []) {
        $query = $this->db->insert('tb1Question', $dataArray);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function subQuestioninsertData($dataArray = []) {
        $data = array('question_id' => $dataArray['question_id'], 'subquestion' => $dataArray['subquestion'], 'Question' => $dataArray['question']);

        $query = $this->db->insert('tb2subquestion', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function subAnswerinsertData($dataArray = []) {
        $data = array('sub_question_id' => $dataArray['sub_question_id'], 'answer' => $dataArray['answer'], 'Question' => $dataArray['question']);

        $query = $this->db->insert('tblAnswer', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
