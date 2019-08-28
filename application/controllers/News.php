<?php

defined('BASEPATH') OR exit('No direct script access allowed!');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index() {
        $data['title'] = "Все новости";
        $data['news'] = $this->news_model->getNews();

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['news_item'] = $this->news_model->getNews($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $data['content'] = $data['news_item']['text'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {

        $data['title'] = "Создание новости";
        $this->load->view('templates/header', $data);

        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
            //Здесь должны быть проверки передаваемых через форму данных.
            //В этом примере считаем, что данные валидны.

            $slug = $this->input->post('slug');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            $data['slug'] = $slug;
            
            $this->news_model->setNews($slug, $title, $text)
                ? $this->load->view('news/success', $data)
                : $this->load->view('errors/error_add_news', $data);
        }

        $this->load->view('news/create');
        $this->load->view('templates/footer');
        
    }

    public function edit($slug = NULL) {
        $data['title'] = "Редактирование новости";
        $this->load->view('templates/header', $data);

        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
            //Здесь должны быть проверки передаваемых через форму данных.
            //В этом примере считаем, что данные валидны.

            $slug = $this->input->post('slug');
            $title = $this->input->post('title');
            $text = $this->input->post('text');
            
            if ($this->news_model->editNews($slug, $title, $text)) {
                echo "Новость успешно отредактирована!";
                return;
            }
        } 

        if ($slug) {
            $data['news_item'] = $this->news_model->getNews($slug);

            if (empty($data['news_item'])) {
                show_404();
            }

            $data['title_news'] = $data['news_item']['title'];
            $data['content_news'] = $data['news_item']['text'];
            $data['slug_news'] = $data['news_item']['slug'];

            $this->load->view('news/edit', $data);
        } else {
            $data['news'] = $this->news_model->getNews();
            $this->load->view('news/index', $data);
        }
        

        $this->load->view('templates/footer');
    }

    public function delete($slug = NULL) {
        $data['title'] = "Удаление новости";
        $data['news'] = $this->news_model->getNews($slug);

        if (empty($data['news'])) {
            show_404();
        }

        $data['result'] = "Ошибка удаления ".$data['news']['title'];

        if ($this->news_model->deleteNews($slug)) {
            $data['result'] = $data['news']['title']." успешно удалена";
        }

        $this->load->view('templates/header', $data);
        $this->load->view('news/delete', $data);
        $this->load->view('templates/footer');
    }
}