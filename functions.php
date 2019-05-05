<?php 

    $current_user;

    function page_url($param, $get_params = []){
        global $MAINPAGE;
        $sub_url = '?';
        if($param != $MAINPAGE) $sub_url .= 'page='.$param.'&';
        foreach($get_params as $key => $value){
            $sub_url .= $key.'='.$value.'&';
        }
        $sub_url = substr($sub_url, 0, -1);
        return 'http://'.$_SERVER['HTTP_HOST'].$sub_url;
    }

    function redirect($param){
        header('Location: '.$param);
        exit;
    }

    function template($template, $params = []){
        foreach($params as $name => $value){
            $$name = $value;
        }

        require 'pages/templates/'.$template.'.php';
    }

    function clear_session($param){
        global $CLEARSESSIONVARS;
        $_SESSION['vars'][$param] = $CLEARSESSIONVARS[$param];
    }

    function current_user(){
        global $db;
        global $current_user;
        if(!isset($current_user)){
            if (isset($_SESSION['id'])){
                $result = $db->from('users')->find_by(['id' => $_SESSION['id']])->execute()->result();
            }else{
                $result = null;
            }
            $current_user = $result;
        }
        return $current_user;
    }

    function user_type(){
        global $ADMIN;
        global $USER;
        global $GUEST;

        $user = current_user();
        if($user){
            if($user->is_admin){
                return $ADMIN;
            }else{
                return $USER;
            }
        }else{
            return $GUEST;
        }
    }

    function isolate($array, $field){
        $result = [];
        foreach($array as $element){
            $result[] = $element->$field;
        }
        return $result;
    }

    function map($array, $field){
        $result = [];
        foreach($array as $element){
            $result[$element->$field] = $element;
        }
        return $result;
    }