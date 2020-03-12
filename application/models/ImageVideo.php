<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageVideo
 *
 * @author zmq184
 */
class ImageVideo extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function ImageInserData($UserData = []) {
        $insert = $this->db->insert('Image', $UserData);
        if ($insert) {
            return $insert;
        } else {
            return $insert;
        }
    }

    public function FetchImage() {
        $this->db->select('*');
        $this->db->from('Image');
        $q = $this->db->get()->result();
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

}
