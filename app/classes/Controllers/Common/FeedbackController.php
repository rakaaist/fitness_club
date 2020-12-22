<?php


namespace App\Controllers\Common;


use App\App;
use App\Views\BasePage;
use App\Views\Forms\User\FeedbackCreateForm;
use App\Views\Tables\FeedbackTable;
use Core\View;
use Core\Views\Link;

class FeedbackController
{
    protected $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Feedback',
            'js' => ['/media/js/feedback.js'],
            'main-class' => 'feedback-main',
            'body-class' => 'feedback-body'
        ]);
    }

    /**
     * Home Controller Index
     *
     * @return string|null
     * @throws \Exception
     */
    public function index(): ?string
    {
        $user = App::$session->getUser();

        if ($user) {
            $forms = [
                'create' => (new FeedbackCreateForm())->render()
            ];
        } else {
            $message = 'Do You want to write a comment?';
            $links = [
                'register' => (new Link([
                    'url' => App::$router::getUrl('register'),
                    'text' => 'Register',
                    'class' => 'feedback-link'
                ]))->render()
            ];
        }

        $table = new FeedbackTable;

        $content = (new View([
            'title' => 'Feedback',
            'table' => $table->render(),
            'message' => $message ?? [],
            'forms' => $forms ?? [],
            'links' => $links ?? []
        ]))->render(ROOT . '/app/templates/content/table.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}