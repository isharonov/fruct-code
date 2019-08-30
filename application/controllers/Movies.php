<?php

defined('BASEPATH') OR exit('No direct script access allowed!');

class Movies extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
    }

    public function type($slug = NULL) {

        $this->data['movie_data'] = null;

        $offset = (int) $this->uri->segment(4);

        $row_count = 2;
        $count = 0;

        if ($slug == "films") {
            $count = count($this->films_model->getFilms(0, 1));
            $p_config['base_url'] = '/movies/type/films/';
            $this->data['title'] = "Фильмы";
            $this->data['movie_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 1);
        }
        if ($slug == "serials") {
            $count = count($this->films_model->getFilms(0, 2));
            $p_config['base_url'] = '/movies/type/serials/';
            $this->data['title'] = "Сериалы";
            $this->data['movie_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 2);
        }

        if ($this->data['movie_data'] == null) {
            show_404();
        }

        // Pagination config
        $p_config['total_rows'] = $count;
        $p_config['per_page'] = $row_count;

        $p_config['full_tag_open'] = "<ul class='pagination'>";
		$p_config['full_tag_close'] ="</ul>";
		$p_config['num_tag_open'] = '<li>';
		$p_config['num_tag_close'] = '</li>';
		$p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$p_config['next_tag_open'] = "<li>";
		$p_config['next_tagl_close'] = "</li>";
		$p_config['prev_tag_open'] = "<li>";
		$p_config['prev_tagl_close'] = "</li>";
		$p_config['first_tag_open'] = "<li>";
		$p_config['first_tagl_close'] = "</li>";
		$p_config['last_tag_open'] = "<li>";
		$p_config['last_tagl_close'] = "</li>";

        // Init pagination
        $this->pagination->initialize($p_config);

        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/type', $this->data);
        $this->load->view('templates/footer');
    }

    public function rating() {
        $offset = (int) $this->uri->segment(3);
        $row_count = 2;
        $count = count($this->films_model->getFilms(0, 1));

        $this->data['title'] = "Рейтинг фильмов";
        $this->data['films_rating'] = $this->films_model->getMoviesOnPage($row_count, $offset, 1);

        // Pagination config
        $p_config['base_url'] = '/movies/rating/';
        $p_config['total_rows'] = $count;
        $p_config['per_page'] = $row_count;

        $p_config['full_tag_open'] = "<ul class='pagination'>";
		$p_config['full_tag_close'] ="</ul>";
		$p_config['num_tag_open'] = '<li>';
		$p_config['num_tag_close'] = '</li>';
		$p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$p_config['next_tag_open'] = "<li>";
		$p_config['next_tagl_close'] = "</li>";
		$p_config['prev_tag_open'] = "<li>";
		$p_config['prev_tagl_close'] = "</li>";
		$p_config['first_tag_open'] = "<li>";
		$p_config['first_tagl_close'] = "</li>";
		$p_config['last_tag_open'] = "<li>";
		$p_config['last_tagl_close'] = "</li>";

        // Init pagination
        $this->pagination->initialize($p_config);

        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/rating', $this->data);
        $this->load->view('templates/footer');
    }

    public function view($slug = FALSE) {
        $movie_slug = $this->films_model->getFilms($slug, false, false);

        if (empty($movie_slug)) {
            show_404();
        }

        $this->data['title'] = $movie_slug['name'];
        $this->data['year'] = $movie_slug['year'];
        $this->data['rating'] = $movie_slug['rating'];
        $this->data['descriptions_movie'] = $movie_slug['descriptions'];
        $this->data['player_code'] = $movie_slug['player_code'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('movies/view', $this->data);
        $this->load->view('templates/footer');
    }

    
}