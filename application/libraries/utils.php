<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * @author Survey
 *
 * Purpose of this class is to provide all the utilities functions which can be used from any controller.
 *
 */

class utils {

    var $languages;
    var $arrStatus;
    var $CI;

    function __construct() {

        $this->CI = & get_instance();
        $this->arrStatus['Error'] = "";
        $this->arrStatus['Info'] = "";
        $this->arrStatus['Success'] = "";
      
    }

    public function getUserFullName($user_id = false) {
        $q = "SELECT
              name
              FROM users WHERE users_id ='" . $user_id . "' ";
        $query = $this->CI->db->query($q);
        $result = $query->result_array();
        if (isset($result[0]["name"]) && $result[0]["name"] != "") {
            return $result[0]["name"];
        } else {
            return "";
        }
    }

}
