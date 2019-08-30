<?php

defined('BASEPATH') OR exit('No direct script access allowed!');

class News extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['result'] = NULL;
    }

    public function index() {
        $this->data['title'] = "Все новости";
        $this->data['news'] = $this->news_model->getNews();

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $this->data['news_item'] = $this->news_model->getNews($slug);

        if (empty($this->data['news_item'])) {
            show_404();
        }

        $this->data['title'] = $this->data['news_item']['title'];
        $this->data['content'] = $this->data['news_item']['text'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/view', $this->data);
        $this->load->view('templates/footer');
    }

    public function create() {

        $this->data['title'] = "Создание новости";

        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
            //Здесь должны быть проверки передаваемых через форму данных.
            //В этом примере считаем, что данные валидны.

            $slug = $this->input->post('slug');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            $this->data['slug'] = $slug;
            $this->data['result'] = "Ошибка создания ".$title;
            
            if ($this->news_model->setNews($slug, $title, $text)) {
                $this->data['result'] = $title." добавлена!";
                $this->data['news'] = $this->news_model->getNews(); //Обновляем массив новостей
            }
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/create', $this->data);
        $this->load->view('templates/footer');
        
    }

    public function edit($slug = NULL) {
        $this->data['title'] = "Редактирование новости";

        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
            //Здесь должны быть проверки передаваемых через форму данных.
            //В этом примере считаем, что данные валидны.

            $slug = $this->input->post('slug');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            $this->data['result'] = "Ошибка редактирования ".$title;            
            
            if ($this->news_model->editNews($slug, $title, $text)) {
                $this->data['result'] = $title." успешно отредактирована!";
            }

            $slug = NULL;
        } 

        $this->load->view('templates/header', $this->data);

        if ($slug) {
            $this->data['news_item'] = $this->news_model->getNews($slug);

            if (empty($this->data['news_item'])) {
                show_404();
            }

            $this->data['title_news'] = $this->data['news_item']['title'];
            $this->data['content_news'] = $this->data['news_item']['text'];
            $this->data['slug_news'] = $this->data['news_item']['slug'];

            $this->load->view('news/edit', $this->data);
        } else {
            $this->data['news'] = $this->news_model->getNews();
            $this->load->view('news/index', $this->data);
        }
        
        $this->load->view('templates/footer');
    }

    public function delete($slug = NULL) {
        $this->data['title'] = "Удаление новости";
        $this->data['news_item'] = $this->news_model->getNews($slug);

        if (empty($this->data['news_item'])) {
            show_404();
        }

        $this->data['result'] = "Ошибка удаления ".$this->data['news_item']['title'];

        if ($this->news_model->deleteNews($slug)) {
            $this->data['result'] = $this->data['news_item']['title']." успешно удалена";
            $this->data['news'] = $this->news_model->getNews();
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/index', $this->data);
        $this->load->view('templates/footer');
    }
}