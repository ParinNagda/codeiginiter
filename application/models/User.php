<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class User extends CI_Model{

        function getRows($id = ''){
            if(!empty($id)){
                $query = $this->db->get_where('users',array('id' => $id));
                return $query->row_array();
            }else{
                $query = $this->db->get('users');
                return $query->result_array();
            }
        }

        function delete($id){
            $delete = $this->db->delete('users',array('id'=> $id));
            return $delete ? true : false;
        }

        function insert($data = array()) {
            if(!array_key_exists('created_date',$data)){
                $data['created_date'] = date('Y-m-d H:i:s');
            }
           $a =  $this->db->insert('users',$data);
           if($a){
               return $this->db->insert_id();
           }else{
               return false;
           }

        }


        function update($data,$id){
           if(!empty($data) && !empty($id)){
                if(!array_key_exists('created_date',$data)){
                    $data['created_date'] = date('Y-m-d H:i:s');
                }

                 $a =  $this->db->update('users',$data,array('id' => $id));
           if($a){
               return $a ? true : false;
           }else{
               return false;
           }
           }
           
        }
        
    }
