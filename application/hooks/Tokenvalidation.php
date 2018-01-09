<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tokenvalidation extends CI_Controller {

    public function tokenValidate(){
        $kunci = $this->config->item('thekey'); //secret key for encode and decode
        $headers = $this->input->get_request_header('Authorization'); //get token from request header

        try {
           $decoded = JWT::decode($headers, $kunci, array('HS256'));
           $decoded_array = (array) $decoded;
           $this->set_response($decoded, REST_Controller::HTTP_OK);
        } catch (Exception $e) {
            $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
             $this->set_response($invalid, REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}