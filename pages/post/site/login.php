<?

    $_SESSION['vars']['login']['email'] = $_POST['email'];

    if( !isset($_POST['email']) || $_POST['email'] == '' ) {
        $msg->error('Email не может быть пустым'); 
    }

    if ( $msg->ok() ){
        $hashed_password = md5($_POST['email'].$_POST['password']);
        $user = $db->from('users')->find_by(['email' => $_POST['email'], 'password' => $hashed_password])->execute()->result();
        if (!$user) $msg->error('Неправильный email или пароль'); 
    }

    if( $msg->ok() ){
        clear_session('login');
        $_SESSION['id'] = $user->id;
        redirect(page_url('main'));
    }else{
        redirect(page_url('login'));
    }