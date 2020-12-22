<?php


namespace App\Views\Tables;


use Core\Views\Table;

class FeedbackTable extends Table
{
    public function __construct($feedback = [])
    {
        parent::__construct([
            'headers' => [
                'Id',
                'Name',
                'Comment',
                'Date'
            ],
            'rows' => $feedback
        ]);
    }
}