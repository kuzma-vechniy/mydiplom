<?
    class Database{

        private $query;
        private $link;
        private $ok;
        private $error;
        private $result;
        private $answer_type;
        private $file;

        function __construct($array){

            $this->file = fopen("local/logs.txt", 'a+');
            fwrite($this->file, '========'.PHP_EOL);
            $this->mysqli = new mysqli($array['host'], $array['user'], $array['password'], $array['database']);
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            $this->query = '';
            $this->ok = true;
        }

        function insert($table){
            $this->query .= "INSERT INTO `".$table."` ";
            return $this;
        }

        function update($table){
            $this->query .= "UPDATE `".$table."` ";
            return $this;
        }

        function set($params){
            $this->query .= "SET ";
            foreach ($params as $field => $value) {
                $this->query .= "`".$field."` = '".$value."', ";
            }
            $this->query = substr($this->query, 0, -2).' ';
            return $this;
        }

        function params($params){

            $fields = '';
            $values = '';

            foreach ($params as $field => $value) {
                $fields .= $field.', ';
                $values .= "'".$value."', ";
            }

            $fields = substr($fields, 0, -2);
            $values = substr($values, 0, -2);
            $this->query .= '('.$fields.') VALUES ('.$values.')';
            return $this;
        }

        function from($table){
            $this->query .= "SELECT * FROM `".$table."` ";
            $this->answer_type = 'multiple';
            return $this;
        }

        function find_by($params){
            $this->answer_type = 'single';
            $this->query .= "WHERE ";
            foreach ($params as $field => $value) {
                if ($value == null) $this->query .= "`".$field."` is NULL and ";
                else $this->query .= "`".$field."` = '".$value."' and ";
            }
            $this->query = substr($this->query, 0, -5).' limit 1';
            return $this;
        }

        function query(){
            return $this->query;
        }

        function where($params){
            $this->answer_type = 'multiple';
            $this->query .= "WHERE ";
            foreach ($params as $field => $value) {
                if ($value == null) $this->query .= "`".$field."` is NULL and ";
                elseif (gettype($value) == 'array') $this->query .= "`".$field."` in ('".implode("','", $value)."') and ";
                else $this->query .= "`".$field."` = '".$value."' and ";
            }
            $this->query = substr($this->query, 0, -5);
            return $this;
        }

        function result(){
            if( $this->answer_type == 'single'){
                $result = mysqli_fetch_object($this->result);
            }else{
                $result = [];
                while ($object = mysqli_fetch_object($this->result)) {
                    $result[] = $object;
                }
            }
            return $result;
        }

        function execute(){
            if (!isset($this->answer_type)) $this->answer_type == 'multiple';
            fwrite($this->file, $this->query.PHP_EOL);
            $result = $this->mysqli->query($this->query);
            if($result){
                $this->ok = true;
            }else{
                fwrite($this->file, $this->mysqli->error.PHP_EOL);
                $this->set_error($this->mysqli->error);
                $this->ok = false;
            }
            $this->query = '';
            $this->result = $result;
            return $this;
        }

        function set_error($param){
            $this->error = $param;
        }

        function get_error(){
            return $this->error;
        }

        function ok(){
            return $this->ok;
        }
    }