<?php

class Produto extends Connect{

    public function insert($query){
        $this->connect();
        $this->query = $this->mysqli->query($query);
        $this->disconnect();
    }
}