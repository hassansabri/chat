<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_chat
 *
 * @author admin
 */
class m_chat extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getAllUsers() {
        $this->db->where('is_delete', '0');
        $this->db->where('is_active', '1');
        $this->db->where('users_id !=', $this->session->userdata('chat_uid'));
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function getUserGroups() {
        $this->db->select('chat_group_id_fk');
        $this->db->where('is_active', '1');
        $this->db->where('is_delete', '0');
        $this->db->where('user_id_fk', $this->session->userdata('chat_uid'));
        $this->db->group_by('chat_group_id_fk');
        $query = $this->db->get('user_group');
        return $query->result_array();
    }

    public function getGroupName($group_id = false) {
        $this->db->select('name');
        $this->db->where('chat_group_id', $group_id);
        $query = $this->db->get('chat_group');
        $result = $query->result_array();
        if (sizeof($result) > 0) {
            return $result[0]['name'];
        } else {
            return "N/A";
        }
    }

    public function createUserAndGroupArray() {
        $data = array();
        $group_id = array();
        $groups = array();
//        $groups = $this->getUserGroups();
        if (sizeof($groups) > 0) {
            foreach ($groups as $value) {
                $data[] = array(
                    "users_id" => $value['chat_group_id_fk'],
                    "name" => $this->getGroupName($value['chat_group_id_fk']),
                    "chat_type" => 'group',
                );
                $group_id[] = $value['chat_group_id_fk'];
            }
        }
        $users = $this->getAllUsers();
        if (sizeof($users) > 0) {
            foreach ($users as $value) {
                $data[] = array(
                    "users_id" => $value['users_id'],
                    "name" => $value["name"],
                    "chat_type" => 'single',
                );
            }
        }
        $my_data = array(
            "group_id" => $group_id,
            "data" => $data,
        );
        return $my_data;
    }

}
