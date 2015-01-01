<?php

class Userinfoobj {

    public $user_id;
    public $screen_name;
    public $name;
    public $img_path;
    public $score;
    public $count;
    public $text;
    public $pre_score;
    public $max_score;

    public $timestamp;

	function __construct($obj = NULL) {
        if (!isset($obj)) {
            return;
        }
        $this->name = $obj->name;
        $this->screen_name = $obj->screen_name;
        $this->user_id = $obj->id;
        $this->img_path = $obj->profile_image_url;
        $this->text = "";
        $this->count = 0;
        $this->max_score = 0;
	}

    public function set_user($obj) {
        $this->user_id = $obj->twitter_user_id;
        $this->score = $this->pre_score = $obj->pre_score / 100;
        $this->max_score = $obj->max_score / 100;
        $this->timestamp = strtotime($obj->last_update);
    }

    /**
     * 新鮮な記録かどうか
     * 前回の記録から5分以内
     * @return type
     */
    public function is_recent() {
        return time() - $this->timestamp <= 60 * 5;
    }

    public function add_str($text) {
        $this->count++;
        $this->text .= $text;
    }

    public function set_point($point) {
        $len = mb_strlen($this->text);
//        echo "<p>c:{$this->count} p: {$point} len: {$len}<br></p>";
        $this->score = round($point / max(1, $this->count), 1);
        $this->pre_score = $this->score;
        $this->max_score = max($this->max_score, $this->score);
    }

    public function get_point_level() {
        $p = minmax($this->score, 0, 1000);
        return floor($p / 10);
    }

    public function compact() {
        unset($this->text);
        unset($this->name);
        unset($this->img_path);
        unset($this->count);
    }

}
