<?php

class Pages
{
    public function __construct()
    {
        // echo 'pages loaded';
    }

    public function index()
    {
        echo "this is index";
    }

    public function about($id)
    {
        echo "this is about id $id";
    }
}
