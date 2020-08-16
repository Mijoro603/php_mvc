<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'welcome',
            'description' => 'php mvc solution',
            'posts' => $posts,
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'about',
            'description' => 'about the mvc',
        ];
        $this->view('pages/about', $data);
    }
}
