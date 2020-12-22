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
            $users = App::$db->getRowsWhere('users');
            $session_user = App::$session->getUser();

            foreach ($users as $id => $user) {
                if ($session_user['email'] === $user['email']) {
                    $user_id = $id;
                }
            }


            $feedback = $form->values();
            $feedback['id'] = App::$db->insertRow('feedback', $form->values() + [
                    'user_id' => $user_id,
                    'date' => date('Y-m-d')
                ]);

            $feedback = $this->buildRow($session_user, $feedback);

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
     * @param $session_user
     * @param $feedback
     * @return array
     */
    private function buildRow($session_user, $feedback): array
    {
        return $row = [
            'id' => $feedback['id'],
            'name' => $session_user['name'],
            'comment' => $feedback['comment'],
            'date' => date('Y-m-d')
        ];
    }


}