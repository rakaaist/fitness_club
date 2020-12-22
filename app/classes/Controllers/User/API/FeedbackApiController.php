<?php


namespace App\Controllers\User\API;


use App\App;
use App\Controllers\Base\GuestController;
use App\Controllers\Base\UserController;
use App\Views\Forms\User\FeedbackCreateForm;
use Core\Api\Response;

class FeedbackApiController
{
    public function create(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();
        $form = new FeedbackCreateForm();

        if ($form->validate()) {
            $user = App::$session->getUser();

            $feedback = $form->values();
            $feedback['id'] = App::$db->insertRow('feedback', $form->values() + [
                    'name' => $user['name'],
                    'date' => date('Y-m-d')
                ]);

            $feedback = $this->buildRow($user, $feedback);

            $response->setData($feedback);
        } else {
            $response->setErrors($form->getErrors());
        }

        // Returns json-encoded response
        return $response->toJson();
    }


    /**
     * Formats row for json to be put in the table in the same format.
     *
     * @param $user
     * @param $feedback
     * @return array
     */
    private function buildRow($user, $feedback): array
    {
        return $row = [
            'id' => $feedback['id'],
            'name' => $user['name'],
            'comment' => $feedback['comment'],
            'date' => date('Y-m-d')
        ];
    }


}