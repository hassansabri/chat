<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Hassan
 */
class login extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
//        $this->utils->getLanguageParam();
//        $lng = $this->utils->getLanguageParamVal();
//        if ($lng == "ar") {
//            $sessionid = "2";
//        } else {
//            $sessionid = "1";
//        }
//        $this->session->set_userdata('language_frontid', $sessionid);
        $this->load->model("users/m_login", "model_login");
    }

    public function index() {
        $userlogin = $this->session->userdata('chat_logged_in');
        $website = $this->session->userdata('chat_website');
        if ($userlogin && $website == 'chating') {
            redirect(site_url() . 'home');
        } else {
            $this->load->view("users/loginscreen");
        }
    }

    public function verify() {
        $userlogin = $this->session->userdata('chat_logged_in');
        $website = $this->session->userdata('chat_website');
        if ($userlogin && $website != 'chating') {
            redirect(site_url() . 'home');
        } else {

            $email = $this->input->post("email");
            $password = $this->input->post("password");
            if ($email != "" && $password != "") {
                $newpassword = md5($password);
                $reutn = $this->model_login->checkLogin($email, $newpassword);
                if (sizeof($reutn) > 0) {
                    $newdata = array(
                        'chat_name' => $reutn["name"],
                        'chat_email' => $reutn["email"],
                        'chat_uid' => $reutn["users_id"],
                        'chat_user_type' => $reutn["user_type"],
                        'chat_logged_in' => TRUE,
                        'chat_entity_id' => $reutn["entity_id"],
                        'chat_website' => 'chating'
                    );
                    $this->session->set_userdata($newdata);
                    redirect(site_url() . 'home');
                } else {
                    $this->data["message"] = array(
                        "error" => "yes",
                        "msg" => "Invalid username or password",
                    );
                    $this->load->view("users/loginscreen", $this->data);
                }
            } else {
                $this->data["message"] = array(
                    "error" => "yes",
                    "msg" => "Invalid username or password",
                );
                $this->load->view("users/loginscreen", $this->data);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('chat_name');
        $this->session->unset_userdata('chat_email');
        $this->session->unset_userdata('v');
        $this->session->unset_userdata('chat_user_type');
        $this->session->unset_userdata('chat_logged_in');
        $this->session->unset_userdata('chat_entity_id');
        $this->session->unset_userdata('chat_website');
        redirect(site_url() . 'login');
    }

    public function checkemail() {
        $email = $this->input->post("email");
        if ($email) {
            $this->load->model("users/m_users", "model_users");
            $email_data = $this->model_users->checkemail($email);
            if (sizeof($email_data) > 0) {
                $dat["update"] = "yes";
                $dat["error"] = "yes";
                $dat["msg"] = "Email Already Exist";
            } else {
                $dat["update"] = "yes";
                $dat["error"] = "no";
                $dat["msg"] = "Email not Found";
            }
        } else {
            $dat["update"] = "yes";
            $dat["error"] = "yes";
            $dat["msg"] = $this->lang->line("SomethingWentWrong");
        }
        echo json_encode($dat);
    }

}
