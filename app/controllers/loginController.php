<?php

/**
 * Controller for handling user login.
 */
class LoginController extends App {
    public function __construct() {
        parent::__construct();

        if ($this->requestMethod === 'GET') {
            $this->showLoginForm();
        } else if ($this->requestMethod === 'POST') {
            $this->processLogin();
        }
    }

    /**
     * Display the login form.
     */
    public function showLoginForm() {
        // Set the page title
        $this->title = 'Login - OKEBiling';
        // Render the login view with empty data

        $this->layout('loginLayout')->view('login', $data = []);
    }
    
    
    
    /**
     * Process the login form submission.
     */
    public function processLogin() {
        // TODO: Implement login logic here
        // You should handle user authentication, validation, and redirection on successful login.
    }
}
