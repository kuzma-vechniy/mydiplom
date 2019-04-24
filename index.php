<?
    require 'constants.php';
    require 'functions.php';
    require 'message.php';
    require 'database.php';
    require 'config.php';         

    session_start();

    if(!isset($_SESSION['vars'])) $_SESSION['vars'] = $CLEARSESSIONVARS;

    $msg = new Message();
    $config = new Config();
    require 'vars.php';
    $db = new Database([
        'host' => $config->database_host,
        'user' => $config->database_user,
        'password' => $config->database_password,
        'database' => $config->database_name
    ]);

    $method = strtolower($_SERVER['REQUEST_METHOD']);
    $dir = 'site';
    if (isset($_GET['page'])) $page_param = $_GET['page'];
    $page = $MAINPAGE;
    if (isset($page_param)){
        if (strstr($page_param, 'admin_') != false){
            $dir = 'admin';
        }else{
            if ($page_param == $MAINPAGE) redirect(page_url('main'));
        }
        $page = $page_param;
    }else{

    }
    if (!isset($page)) $page = $MAINPAGE;
    if (!isset($PAGELIST[$method][$page])){
        template('404');
        exit();
    }elseif ( !in_array(user_type(),$PAGELIST[$method][$page]) ) {
        template('403');
        exit();
    }else{
        require 'pages/'.$method.'/'.$dir.'/'.$page.'.php';
    }