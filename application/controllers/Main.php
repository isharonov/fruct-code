<?php

defined('BASEPATH') OR exit('No direct script access allowed!');

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['title'] = "Главная страница";

        $this->data['movies'] = $this->films_model->getFilms(FALSE, 8, 1);
        $this->data['serials'] = $this->films_model->getFilms(FALSE, 8, 2);

        $this->load->view('templates/header', $this->data);
        $this->load->view('main/index', $this->data);
        $this->load->view('templates/footer');
    }
}