<?php

class Users extends Controller
{
    public function __construct()
    {
        # code...
    }

    public function register()
    {
        // check for posted data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form
        } else {
            // load form

            // Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }
}
