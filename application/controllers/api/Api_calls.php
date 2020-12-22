<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


require(APPPATH.'libraries/REST_Controller.php');

class Api_calls extends Rest_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
    }

    public function user_get($id=0){
        $users = $this->user->getRows($id);
        if(!empty($users)){
            $this->response($users,REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No users found'
            ],REST_Controller::HTTP_NOT_FOUND);
        }
       
    }

    public function user_delete($id){
        if($id){
            $delete = $this->user->delete($id);
            if($delete){
                $this->response([
                    'status' => TRUE,
                    'message' => 'User deleted successfully'
                ],REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'User not deleted'
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No users found'
            ],REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function user_post(){
        $userData = array();
        $userData['first_name'] = $this->input->post('first_name');
        $userData['last_name'] = $this->input->post('last_name');
        $userData['role_type'] = $this->input->post('role');
        $userData['email'] = $this->input->post('email');
        $userData['password'] = $this->input->post('password');
        if(!empty( $userData)){
           
            $insert = $this->user->insert($userData);
            if($insert){
                $this->response([
                    'status' => TRUE,
                    'message' => 'User added successfully'
                ],REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'User not added'
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


    public function user_put(){
        $userData = array();
       
        $id = $this->put('id');
        $userData['first_name'] = $this->put('first_name');
        $userData['last_name'] = $this->put('last_name');
        $userData['role_type'] = $this->put('role');
        $userData['email'] = $this->put('email');
        $userData['password'] = $this->put('password');
        if(!empty( $userData)){
           
            $updatt = $this->user->update($userData,$id );
            if($updatt){
                $this->response([
                    'status' => TRUE,
                    'message' => 'User updated successfully'
                ],REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'User not update'
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    
}
