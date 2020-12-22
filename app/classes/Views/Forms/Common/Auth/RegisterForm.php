<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
                'fields' => [
                    'name' => [
                        'label' => 'Name',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_text_no_numbers',
                            'validate_text_length_40'
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter your name...'
                            ]
                        ]
                    ],
                    'surname' => [
                        'label' => 'Surname',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_text_no_numbers',
                            'validate_text_length_40'
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter your surname...'
                            ]
                        ]
                    ],
                    'email' => [
                        'label' => 'Email',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_email',
                            'validate_user_unique'
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter your email'
                            ]
                        ]
                    ],
                    'password' => [
                        'label' => 'Password',
                        'type' => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter your password...'
                            ]
                        ]
                    ],
                    'password_repeat' => [
                        'label' => 'Repeat password',
                        'type' => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ],
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Repeat your password...'
                            ]
                        ]
                    ],
                    'phone' => [
                        'label' => 'Phone number',
                        'type' => 'number',
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter phone no. 370 645 12345'
                            ]
                        ]
                    ],
                    'address' => [
                        'label' => 'Home address',
                        'type' => 'text',
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter your home address...'
                            ]
                        ]
                    ]
                ],
                'buttons' => [
                    'send' => [
                        'title' => 'Register',
                        'type' => 'submit'
                    ]
                ],
                'validators' => [
                    'validate_fields_match' => [
                        'password',
                        'password_repeat'
                    ]
                ]
            ]
        );
    }
}