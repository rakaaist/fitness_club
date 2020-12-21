<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
                'attr' => [
                    'method' => 'POST',
                ],
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
                                'placeholder' => 'Enter your name...',
                                'class' => 'input-field',
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
                                'placeholder' => 'Enter your surname...',
                                'class' => 'input-field',
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
                                'placeholder' => 'Enter your email',
                                'class' => 'input-field',
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
                                'placeholder' => 'Enter your password...',
                                'class' => 'input-field',
                            ]
                        ]
                    ],
                    'password_repeat' => [
                        'label' => 'Repeat password',
                        'type' => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ]
                    ],
                    'phone' => [
                        'label' => 'Phone number',
                        'type' => 'number',
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter your phone no...',
                                'class' => 'input-field',
                            ]
                        ]
                    ],
                    'address' => [
                        'label' => 'Home address',
                        'type' => 'text',
                        'extra' => [
                            'attr' => [
                                'placeholder' => 'Enter your home address...',
                                'class' => 'input-field',
                            ]
                        ]
                    ]
                ],
                'buttons' => [
                    'send' => [
                        'title' => 'REGISTER',
                        'type' => 'submit',
                        'extra' => [
                            'attr' => [
                                'class' => 'btn',
                            ]
                        ]
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