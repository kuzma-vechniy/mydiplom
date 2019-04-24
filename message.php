<?
    class Message {

        function __construct(){
            if (!isset($_SESSION['messages'])) $_SESSION['messages'] = [];
        }

        public function messages(){
            $messages = $_SESSION['messages'];
            unset($_SESSION['messages']);
            $_SESSION['messages'] = [];
            return $messages;
        }

        public function ok(){
            if ($_SESSION['messages'] == []){
                return true;
            } else {
                return false;
            }
        }

        public function error($param){
            $_SESSION['messages'][]= $param;
        }
    }