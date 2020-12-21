<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class LoginForm extends Form
{
public function __construct()
{
    parent::__construct([
        'attr' => [
            'method' => 'POST',
        ],
        'fields' => [
            'email' => [
                'label' => 'Email',
                'type' => 'text',
                'validators' => [
                    'validate_field_not_empty',
                    'validate_email',
                    'validate_user_exists'
                ],
                'extra' => [
                    'attr' => [
                        'placeholder' => 'Type your email...',
                        'class' => 'input-field',
                    ],
                ],
            ],
            'password' => [
                'label' => 'Password',
                'type' => 'password',
                'validators' => [
                    'validate_field_not_empty',
                ],
                'extra' => [
                    'attr' => [
                        'placeholder' => 'Type your password...',
                        'class' => 'input-field',
                    ],
                ],
            ],
        ],
        'buttons' => [
            'send' => [
                'title' => 'Login',
                'type' => 'submit',
                'extra' => [
                    'attr' => [
                        'class' => 'btn',
                    ],
                ],
            ],
        ],
        'validators' => [
            'validate_login' => [
                'email',
                'password',
            ]
        ]
    ]);
}
}