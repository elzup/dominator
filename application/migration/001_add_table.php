<?php

class Miguration_Add_table extends CI_Migration {

    function __construct() {
        parent::__construct();
    }

    public function up() {
        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'twitter_user_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
            ),
            'pre_score' => array(
                'type' => 'MEDIUMINT',
                'unsigned' => TRUE,
            ),
            'max_score' => array(
                'type' => 'MEDIUMINT',
                'unsigned' => TRUE,
            ),
            'last_update' => array(
                'type' => 'TIMESTAMP',
            ),
        ));
        $this->dbforge->add_key('user_id', true);
        $this->dbforge->create_table('user');
    }

    public function down() {
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

