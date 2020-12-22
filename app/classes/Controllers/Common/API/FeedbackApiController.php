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

        $rows = $this->buildRows($feedback);

        $response->setData($rows);

        return $response->toJson();
    }

    private function buildRows($feedback)
    {
        foreach ($feedback as $id => &$row) {
            $user = App::$db->getRowById('users', $row['user_id']);

            $row = [
                'id' => $id,
                'name' => $user['name'],
                'comment' => $row['comment'],
                'date' => $row['date']
            ];
        }

        return $feedback;
    }
}