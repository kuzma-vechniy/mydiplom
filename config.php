<? 
    class Config{

       private $vars;
       function __construct(){
        
        }

        function set_vars($array){
            $this->vars = $array;
        }

        function __get($name){
            return $this->vars[$name];
        }
    
    }
    