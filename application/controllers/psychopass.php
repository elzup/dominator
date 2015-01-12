<?php

class Psychopass extends CI_Controller {

    /** @var User_model */
    public $user;

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->user->set_check_login(MODE_PSYCHOPASS);
        $this->load->model('Twitter_user_model', 'userdb', TRUE);
    }

    public function index() {
        redirect(base_url());
    }

    public function p_pre($screen_name = NULL, $arg2 = "") {
        $user = $this->user->get_user(MODE_PSYCHOPASS);
        if (!isset($user)) {
            redirect(base_url());
        }
        $meta = new Metaobj();
        $meta->set_title('ロード中');
        $this->load->view('head', array('meta' => $meta, 'main_css' => 'ps'));
        $this->load->view('navbar', array('meta' => $meta, 'user' => $user));
        $this->load->view('loading');
        $this->load->view('foot', array('meta' => $meta, 'is_foundationl' => TRUE, 'redirect_url' => base_url(PATH_P . $screen_name . '/' . $arg2)));
    }

    public function p($screen_name = NULL, $arg2 = "") {
        if (!isset($screen_name)) {
            redirect(base_url());
        }
        if (($rsn = $this->input->get('sn'))) {
            redirect(base_url(PATH_P_PRE . $rsn));
        }
        if (isset($screen_name) && 'sync_point' === $screen_name && isset($arg2)) {
            $this->sync_point($arg2);
        }
        $user = $this->user->get_user(MODE_PSYCHOPASS);
        if (!isset($user)) {
            redirect(base_url(PATH_P_PRE . $rsn));
        }
        $meta = new Metaobj();
        $meta->setup_psychopass();
        $messages = $this->_get_messages();

        $this->load->view('head', array('meta' => $meta, 'main_css' => 'ps'));
        $this->load->view('navbar', array('meta' => $meta, 'user' => $user));
        $this->load->view('alert', array('messages' => $messages));
        if (isset($user)) {
            $u = $this->get_twitter_user($user, $screen_name, TRUE);
            $this->load->view('psychopassuser', array('user' => $u));
        } else {
            $this->load->view('psychopasslogin');
        }
        $this->load->view('foot', array('meta' => $meta, 'is_foundationl' => TRUE));
    }

    /** @var Twitter_user_Model */
    public $userdb;

    public function sync_point($user_id) {
        if (!$user = $this->user->get_user(MODE_PSYCHOPASS)) {
            $val = array();
            $val['errors'] = 'no login error';
            $this->load->view('json_value', array('value' => $val));
            exit;
        }
        $u = $this->get_twitter_user($user, $user_id);
        $u->compact();
        $this->load->view('json_value', array('value' => array($u)));
    }

    public function get_point() {
        
    }

    /**
     * 
     * @param type $user_id
     * @param type $is_screen_name
     * @return Userinfoobj
     */
    private function get_twitter_user(Userobj $user, $user_id, $is_screen_name = FALSE) {
        if ($is_screen_name) {
            $statuses = $user->get_user_timeline($user_id, TRUE);
//            var_dump($statuses);
            if ($statuses === FALSE) {
                return NULL;
            }
            $user_id = $statuses[0]->user->id;
        }
        $reco = $this->userdb->load_user($user_id);
        if (!$reco) {
            // no user
            if (!isset($statuses)) {
                $statuses = $user->get_user_timeline($user_id);
            }
            $u = $this->_analize_one($statuses);
            $this->userdb->regist_user($u);
        } else {
            $u = new Userinfoobj();
            $u->set_user($reco);
            if (!$u->is_recent()) {
                if (!isset($statuses)) {
                    $statuses = $user->get_user_timeline($user_id);
                }
                $u_pre = $u;
                $u = $this->_analize_one($statuses);
                $u->reflect_recent($u_pre);
                $this->userdb->update_user($u);
            }
        }
        if ($is_screen_name) {
            $u->support_user($statuses[0]->user);
        }
        return $u;
    }

    private function _analize_one($statuses) {
        $user = NULL;
        $igo = new Igo(PATH_LIB_IGO_DICT);

        $words = array();
        foreach ($statuses as $st) {
            if (!isset($user)) {
                $user = new Userinfoobj($st->user);
                if ($user->user_id == '1106631758') {
                    return $user;
                }
            }
            $words = array_merge($words, $igo->wakati($st->text));
        }

        $p = $this->negaposi($words);
        $user->set_point($p);
        return $user;
    }

    private $lib;

    private function negaposi($words) {

        if (!isset($this->lib)) {
            $this->load_lib();
        }

        $p_sum = 0;
//        var_dump($words);
//        var_dump($this->lib);
        foreach ($words as $w) {
            if (isset($this->lib[$w])) {
//                echo $w . ':' .  $this->lib[$w];
//                echo PHP_EOL;
                $p_sum += $this->lib[$w];
            }
        }

        $fix = max(0, $p_sum - 500) * 2;
        $fix = $p_sum;
        $fix = max (20, $p_sum - 500) / 2 + rand(100, 1000) / 100;
        if ($fix > 50) {
            $fix = 50 + ($fix - 50) * 3 / 4;
        }
        if ($fix > 100) {
            $fix = 100 + ($fix - 100) * 3 / 4;
        }
        if ($fix > 200) {
            $fix = 200 + ($fix - 200) * 2 / 3;
        }
        return $fix;
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

    public function migrate($version) {
        $this->load->library('migration');

        if ($this->migration->version($version)) {
            log_message('error', 'Migration Success.');
        } else {
            log_message('error', $this->migration->error_string());
        }
    }

}
