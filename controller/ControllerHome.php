<?php

class ControllerHome{

    public function index(){
        $data =['name' =>'Marcos', 
                'welcome' => 'Hello',
                'greetings' => 'Bonne visite !'];
        twig::render("home-index.php", $data);
        /*
        $view = new View('home-index');
        $view->output('text_welcome', 'Welcome');
        $view->output('text_name', 'Peter');
        */
    }

    public function error(){
        // $view = new View('home-error');
        twig::render('home-error.php');
    }
}