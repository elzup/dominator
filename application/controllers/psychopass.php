<?php

class Psychopass extends CI_Controller {

    /** @var User_model */
    public $user;

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->user->set_check_login(MODE_PSYCHOPASS);
    }

    public function index() {
        $user = $this->user->get_user(MODE_PSYCHOPASS);
        $meta = new Metaobj();
        $meta->setup_psychopass();
        $messages = $this->_get_messages();

        $this->load->view('head_f', array('meta' => $meta, 'main_css' => 'ps'));
        $this->load->view('navbar_f', array('meta' => $meta, 'user' => $user));
        $this->load->view('alert', array('messages' => $messages));
        if (isset($user)) {
            $statuses = $user->get_timeline();
            $users = $this->_analize($statuses);
            $this->load->view('psychopassbody', array('users' => $users));
        } else {
            $this->load->view('psychopasslogin');
        }
        $this->load->view('foot', array('meta' => $meta, 'is_foundationl' => TRUE));
    }

    public function p($screen_name = NULL) {
        if (($rsn = $this->input->get('sn'))) {
            redirect(base_url(MODE_PSYCHOPASS . '/' . $rsn));
        }
        $user = $this->user->get_user(MODE_PSYCHOPASS);
        $meta = new Metaobj();
        $meta->setup_psychopass();
        $messages = $this->_get_messages();

        $this->load->view('head_f', array('meta' => $meta, 'main_css' => 'ps'));
        $this->load->view('navbar_f', array('meta' => $meta, 'user' => $user));
        $this->load->view('alert', array('messages' => $messages));
        if (isset($user)) {
            $statuses = $user->get_user_timeline($screen_name);
            $user = array_pop($this->_analize($statuses));
            $this->load->view('psychopassuser', array('user' => $user));
        } else {
            $this->load->view('psychopasslogin');
        }
        $this->load->view('foot', array('meta' => $meta, 'is_foundationl' => TRUE));
    }

    private function _analize($statuses) {
        $users = array();
        foreach ($statuses as $st) {
            if (!isset($users[$st->user->id])) {
                $users[$st->user->id] = new Userinfoobj($st->user);
            }
            $users[$st->user->id]->add_str($st->text);
        }

        foreach ($users as $k => &$user) {
            if ($user->count <= 5) {
                unset($users[$k]);
                continue;
            }
            $user->set_point($this->negaposi($user->text));
        }
        return $users;
    }

    private $lib;

    private function negaposi($text) {
        if (!isset($this->lib)) {
            $this->load_lib();
        }
        $p_sum = 0;
        foreach ($this->lib as $k => $p) {
            if (empty($k)) {
                continue;
            }
            $p_sum += mb_substr_count($text, $k, 'UTF-8');
        }
        return $p_sum * (40 + rand(-10, 10));
    }

    private function load_lib() {
        $lib = array();
        foreach (explode("\n", trim(file_get_contents(base_url(PATH_LIB_PN_JP_N)))) as $line) {
            list ($name, $name_kana, $p, $point) = explode(':', $line);
            $lib[$name] = $point;
            if ($name == $name_kana) {
                continue;
            }
            $lib[$name_kana] = $point;
        }
        foreach (explode("\n", trim(file_get_contents(base_url(PATH_LIB_PN_EN_N)))) as $line) {
            list ($name, $p, $point) = explode(':', $line);
            $lib[$name] = $point;
            if ($name == $name_kana) {
                continue;
            }
            $lib[$name_kana] = $point;
        }
        $this->lib = $lib;
    }

    private function _get_messages() {
        $messages = array();
        if (($err = $this->session->userdata('err'))) {
            $this->session->unset_userdata('err');
            $messages[] = $err;
        }
        if (($posted = $this->session->userdata('posted'))) {
            $this->session->unset_userdata('posted');
            $messages[] = $posted;
        }
        return $messages;
    }

}
