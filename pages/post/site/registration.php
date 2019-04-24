<?

    $_SESSION['vars']['registration']['email'] = $_POST['email'];

    if( !isset($_POST['email']) || $_POST['email'] == '' ) {
        $msg->error('Email не может быть пустым'); 
    } else {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $user = $db->from('users')->find_by(['email' => $_POST['email']])->execute()->result();
            if( $user ) $msg->error('Email уже занят'); 
        }else{
            $msg->error('Email не валидный'); 
        }
    }
    
    if( !isset($_POST['password']) || $_POST['password'] == '' ){
        $msg->error('Пароль не может быть пустым');
    }else{
        if(strlen($_POST['password']) < 6) {
            $msg->error('Пароль не менее 6 символов');
        }else{
            if( $_POST['password_confirmation'] != $_POST['password'] ) $msg->error('Пароли должны совпадать');
        }        
    }
    if ( $msg->ok() ){
        $hashed_password = md5($_POST['email'].$_POST['password']);
        $db->insert('users')->params(
            [
                'email' => $_POST['email'],
                'password' => $hashed_password
            
            ]
        )->execute();
        if ( !$db->ok() ) $msg->error($db->get_error());
    }

    if( $msg->ok() ){
        clear_session('registration');
        redirect(page_url('login'));
    }else{
        redirect(page_url('registration'));
    }