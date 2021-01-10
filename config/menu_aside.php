<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Custom
        [
            'title' => 'Users',
            'bullet' => 'dot',
            'submenu' => [
              
                [
                    'title' => 'Add User',
                    'page' => '/add-user'
                ],
                [
                    'title' => 'All Users',
                    'page' => '/users'
                ],
            ]
        ],
        
        [
            'title' => 'Leave Request',
            'bullet' => 'dot',
            'page' => '/leave-requests',
            'new-tab' => false, 
        ],
        
          
        [
            'title' => 'Assign duty post',
            'bullet' => 'dot',
            'submenu' => [
              
                [
                    'title' => 'Assign Duty',
                    'page' => '/assign-duty-post',                
                ],
                [
                    'title' => 'All Assigned duties',
                    'page' => '/assigned-duties'
                ],
            ]

        ],
        
        [
            'title' => 'Duty post',
            'bullet' => 'dot',
            'submenu' => [
              
                [
                    'title' => 'Add post',
                    'page' => '/create-duty-post'
                ],
                [
                    'title' => 'All post',
                    'page' => '/duty-posts'
                ],
            ]
        ],
        
    ]

];
