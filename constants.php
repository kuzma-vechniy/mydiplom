<?

    $GUEST = 'guest';
    $USER = 'user';
    $ADMIN = 'admin';

    function get_constant($param){
        global $$param;
        return $$param;
    }

    $PAGELIST = [
        'post' => [
            'registration' => [$GUEST],
            'login' => [$GUEST],
            'admin_edit_brand' => [$ADMIN],
            'admin_new_brand' => [$ADMIN]
        ],
        'get' => [
            'main' => [$GUEST, $USER, $ADMIN],
            'category' => [$GUEST, $USER, $ADMIN],
            'basket' =>[$GUEST, $USER, $ADMIN],
            'registration' => [$GUEST],
            'login' => [$GUEST],
            'product' => [$GUEST, $USER, $ADMIN],
            'help' => [$GUEST, $USER, $ADMIN],
            'popular' => [$GUEST, $USER, $ADMIN],
            'discounts' => [$GUEST, $USER, $ADMIN],
            'news' => [$GUEST, $USER, $ADMIN],
            'delivery' => [$GUEST, $USER, $ADMIN],
            'logout' => [$USER, $ADMIN],
            'admin_main' => [$ADMIN],
            'admin_brands' => [$ADMIN],
            'admin_categories' => [$ADMIN],
            'admin_products' => [$ADMIN],
            'admin_comments' => [$ADMIN],
            'admin_order_items' => [$ADMIN],
            'admin_orders' => [$ADMIN],
            'admin_questions' => [$ADMIN],
            'admin_users' => [$ADMIN],
            'admin_edit_brand' => [$ADMIN],
            'admin_new_brand' => [$ADMIN],
            'admin_delete_brand' => [$ADMIN]
        ]
    ];

    $MAINPAGE = 'main';

    $CLEARSESSIONVARS = [
        'registration' => [
            'email' => ''
        ],
        'login' => [
            'email' => ''
        ]
    ];