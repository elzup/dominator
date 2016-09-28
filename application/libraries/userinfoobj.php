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
        $this->support_user($obj);
        $this->text = "";
        $this->count = 0;
        $this->score = 0;
        $this->pre_score = 0;
        $this->max_score = 0;
    }

    public function set_user($obj) {
        $this->user_id = $obj->twitter_user_id;
        $this->screen_name = $obj->twitter_screen_name;
        $this->score = $this->pre_score = $obj->pre_score / PS_DB_SHIFT;
        $this->max_score = $obj->max_score / PS_DB_SHIFT;
        $this->timestamp = strtotime($obj->last_update);
        $this->img_path = $obj->img_url;
        return $this;
    }

    public function support_user($obj) {
        $this->screen_name = $obj->screen_name;
        $this->name = $obj->name;
        $this->user_id = $obj->id;
        $this->img_path = Userinfoobj::extract_image_hash($obj->profile_image_url);
    }

    /**
     * 新鮮な記録かどうか
     * 前回の記録から5分以内
     * @return type
     */
    public function is_recent() {
        return time() - $this->timestamp <= 60 * PS_CACHE_TIME_MINITS;
    }

    public function add_str($text) {
        $this->count++;
        $this->text .= $text;
    }

    public function set_point($point) {
//        $len = mb_strlen($this->text);
//        echo "<p>c:{$this->count} p: {$point} len: {$len}<br></p>";
//        echo "[$point]";
        $this->score = round($point / max(1, $this->count), 1);
        $this->pre_score = $this->score;
        $this->max_score = max($this->max_score, $this->score);
    }

    public function reflect_recent(Userinfoobj $user) {
        $this->pre_score = $user->score;
        $this->max_score = max($this->max_score, $user->score);
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

    public function get_image_url() {
        if ($this->user_id == ADMIN_TWITTER_ID) {
            return base_url(PATH_IMG_ARZZUP);
        }
        if ("" === $this->img_path) {
            return base_url(PATH_IMG_NOTFOUND);
        }
        if (in_array($this->img_path, str_split("0123456"))) {
            return "https://abs.twimg.com/sticky/default_profile_images/default_profile_{$this->img_path}_normal.png";
        }
        return "https://pbs.twimg.com/profile_images/{$this->img_path}";
    }

    public static function extract_image_hash($url) {
        if (!preg_match('#profile_images/(?|(\d+/.*)|default_profile_([0-9]).*)$#', $url, $m)) {
            return '';
        }
        return $m[1];
    }

}
