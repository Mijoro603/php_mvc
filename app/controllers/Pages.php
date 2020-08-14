<?php

class Pages extends Controller
{
    public function __construct()
    {
        // echo 'pages loaded';
    }

    public function index()
    {
        $this->view('this is the index display by view');
    }

    public function about($id)
    {
        echo "this is about id $id";
    }
}
