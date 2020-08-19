<?php
class Posts extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'posts',
            'description' => 'all posts',
            'posts' => $posts,
        ];

        $this->view('posts/index', $data);
    }
}
