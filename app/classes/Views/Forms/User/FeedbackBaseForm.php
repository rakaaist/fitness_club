<?php


namespace App\Views\Forms\User;


use Core\Views\Form;

class FeedbackBaseForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'comment' => [
                    'label' => 'Your feedback is welcome!',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_feedback_length'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Type your feedback...',
                            'class' => 'input-field',
                        ],
                    ],
                ],
            ]
        ]);
    }
}