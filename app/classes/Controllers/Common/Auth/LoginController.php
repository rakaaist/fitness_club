<?php

namespace App\Controllers\Common\Auth;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Forms\Common\Auth\LoginForm;

class LoginController extends GuestController
{
    protected LoginForm $form;
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new LoginForm();
        $this->page = new BasePage([
            'title' => 'Login',
            'main-class' => 'login-main',
            'body-class' => 'login-body'
        ]);
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            return [App::$router::getUrl('login') => 'Login'];
        }

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$session->login($clean_inputs['email'], $clean_inputs['password']);
            if (App::$session->getUser()) {
                header('Location: /');
                exit();
            }
        }

        $this->page->setContent($this->form->render());
        return $this->page->render();
    }
}