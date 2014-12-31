<?php

class Userobj {

    public $twitter_connection;
    public $id_twitter;
    public $screen_name;
    public $img_url;

    function __construct($c = NULL, $id_twitter = NULL, $screen_name = NULL, $img = NULL) {
        $this->twitter_connection = $c;
        $this->id_twitter = $id_twitter;
        $this->screen_name = $screen_name;
        $this->img_url = $img;
    }

    public function post($text) {
        $data = array(
            'status' => $text,
        );

        return $this->twitter_connection->post('statuses/update', $data);
    }

    public function get_image($sn = '') {
        if (empty($sn) || $sn == $this->screen_name) {
            return $this->img_url;
        }
        return $this->_get_profile_image($sn);
    }

    private function _get_profile_image($sn) {
        $option = array(
            'screen_name' => $sn
        );
        $result = $this->twitter_connection->get('users/show', $option);
        return @$result->profile_image_url;
    }

    public function get_timeline() {
        $param = array(
            'count' => 200,
        );
        return $this->twitter_connection->get('statuses/home_timeline', $param);
    }

    public function get_user_timeline($sn) {
        $url = 'statuses/user_timeline';
//        $query = 'statuses/user_timeline';
        $params = array(
            'screen_name' => $sn,
            'count' => 200,
        );
        $res = $this->twitter_connection->get($url, $params);
        return $res;
    }

}
