<?php


namespace App\Controllers\Common\API;


use App\App;
use Core\Api\Response;

class FeedbackApiController
{
    public function index(): string
    {
        $response = new Response();

        $feedback = App::$db->getRowsWhere('feedback');

        foreach ($feedback as $id => &$row) {
            $row = [
                'id' => $id,
                'name' => $row['name'],
                'comment' => $row['comment'],
                'date' => $row['date']
            ];
        }

        $response->setData($feedback);

        return $response->toJson();
    }
}