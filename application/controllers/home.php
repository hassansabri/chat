<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author admin
 */
class home extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $userlogin = $this->session->userdata('chat_logged_in');
        $website = $this->session->userdata('chat_website');
        if (!$userlogin && $website != 'chating') {
            redirect(site_url() . 'login');
        }
        $this->load->model('m_chat', 'model_chat');
        $this->data = array();
    }

    public function index() {
        // get all users
        $return_val = $this->model_chat->createUserAndGroupArray();
        $this->data['users'] = $return_val['data'];

        $this->data['group_id'] = json_encode($return_val['group_id']);
        //     print_r( $this->data['group_id']);exit;
        // get all groups belong to this user
        $this->load->view('chating/index', $this->data);
    }

    public function save_info() {
        $name = $this->input->post('name');
        $message = $this->input->post('message');
        $uid_to = $this->input->post('uid_to');
        $chat_type = $this->input->post('chat_type');
        $message_type = $this->input->post('message_type');
        if ($message && $name) {
            $data = array(
                "name" => $name,
                "message" => $message,
                "user_id_from" => $this->session->userdata('chat_uid'),
                "user_id_to" => $uid_to,
                "message_type" => 'text',
                "chat_type" => $chat_type,
                "created_date" => time(),
                "modified_date" => time(),
            );
            if (isset($message_type) && $message_type == "file") {
                $data['message_type'] = "file";
            }
            $this->db->insert('message', $data);
            $dat = array(
                "error" => "no",
                "msg" => 'Success',
            );
        } else {
            $dat = array(
                "error" => "yes",
                "msg" => 'Something went wrong',
            );
        }
        echo json_encode($dat);
    }

    public function getAllMessages() {
        $html = '';
        $uid = $this->input->post('uid');
        $chat_type = $this->input->post('chat_type');
        $session_user_id = $this->session->userdata('chat_uid');
        if ($uid) {
            if ($chat_type == "group") {
                $where = '(user_id_to ="' . $uid . '")  and chat_type = "group"';
            } else {
                $where = '(user_id_from = "' . $uid . '" and  user_id_to ="' . $session_user_id . '") OR (user_id_to = "' . $uid . '" and  user_id_from ="' . $session_user_id . '")  and chat_type = "single"';
            }
            $this->db->where($where);
            $query = $this->db->get('message');
            //    echo $this->db->last_query();
            $result = $query->result_array();
            //  print_r($result);
            if (sizeof($result) > 0) {
                foreach ($result as $value) {
                    $msg = htmlspecialchars($value['message'], ENT_QUOTES);
                    if ($value['user_id_from'] == $session_user_id) {
                        if ($value['message_type'] == "text") {
                            $html .= '<div class="chatboxmessage reciever"><span class="chatboxmessagefrom reciever">&nbsp;&nbsp;: ' . $this->utils->getUserFullName($value['user_id_from']) . ' </span><span class="chatboxmessagecontent rec">' . $msg . '</span></div>';
                        } else {
                            $html .= '<div class="chatboxmessage reciever"><span class="chatboxmessagefrom reciever">&nbsp;&nbsp;: ' . $this->utils->getUserFullName($value['user_id_from']) . ' </span><span class="chatboxmessagecontent rec"><a target="_blank" href="' . site_url() . 'attachments/org/' . $value['message'] . '"><br/><img class="txtpng" src="' . site_url() . 'assets/images/txt.png"/> &nbsp;&nbsp; ' . $value['name'] . ' </a></span></div>';
                        }
                    } else {
                        if ($value['message_type'] == "text") {
                            $html .= '<div class="chatboxmessage sender"><span class="chatboxmessagefrom sender">' . $this->utils->getUserFullName($value['user_id_from']) . '&nbsp;&nbsp;</span><span class="chatboxmessagecontent">' . $msg . '</span></div>';
                        } else {
                            $html .= '<div class="chatboxmessage reciever"><span class="chatboxmessagefrom reciever">&nbsp;&nbsp;: ' . $this->utils->getUserFullName($value['user_id_from']) . ' </span><span class="chatboxmessagecontent rec"><a target="_blank" href="' . site_url() . 'attachments/org/' . $value['message'] . '"><br/><img class="txtpng" src="' . site_url() . 'assets/images/txt.png"/> &nbsp;&nbsp; ' . $value['name'] . ' </a></span></div>';
                        }
                    }
                }
                $dat = array(
                    "error" => "no",
                    "msg" => 'Success',
                    "html" => $html,
                );
            } else {
                $dat = array(
                    "error" => "yes",
                    "msg" => 'Something went wrong',
                    "html" => "",
                );
            }
        } else {
            $dat = array(
                "error" => "yes",
                "msg" => 'Something went wrong',
                "html" => "",
            );
        }
        echo json_encode($dat);
    }

}
