<?php

class Twitter_user_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function regist_user(Userinfoobj $user) {
        $this->insert_user($user);
    }

    private function insert_user(Userinfoobj $user) {
        $data = array(
            DB_CN_USERS_TWITTER_USER_ID => $user->user_id,
            DB_CN_USERS_PRE_SCORE => $user->score * PS_DB_SHIFT,
            DB_CN_USERS_MAX_SCORE => $user->score * PS_DB_SHIFT,
        );
        return $this->db->insert(DB_TN_USERS, $data);
    }

    public function update_user(Userinfoobj $user) {
        $this->db->set(DB_CN_USERS_PRE_SCORE, $user->score * PS_DB_SHIFT);
        $this->db->set(DB_CN_USERS_MAX_SCORE, $user->max_score * PS_DB_SHIFT);
        $this->db->where(DB_CN_USERS_TWITTER_USER_ID, $user->user_id);
        $this->db->update(DB_TN_USERS);
    }

    public function load_user($twitter_user_id) {
        $res = $this->select_user($twitter_user_id);
        return !empty($res) ? $res[0] : NULL;
    }

    private function select_user($twitter_user_id) {
        $this->db->where(DB_CN_USERS_TWITTER_USER_ID, $twitter_user_id);
        $this->db->limit(1);
        $query = $this->db->get(DB_TN_USERS);
        return $query->result();
    }

}
