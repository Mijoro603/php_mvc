<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // regsiter the user
  public function register($data)
  {
    $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');

    // bind values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    // execute
    return ($this->db->execute()) ? true : false;
  }

  // find user by email
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');

    // bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // check row
    return ($this->db->rowCount() > 0) ? true : false;
  }
}
