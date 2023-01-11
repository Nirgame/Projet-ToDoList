<?php

interface task_int {
    public function getTask ();
    public function getAllTask ();
    public function createTask ();
    public function ModifTask();
    public function delTask();
    public function giveTask();
    public function remove_givenTask();
    public function getTeamTask();
    public function getAllUserTask();
    public function getAllTeamTask();
}