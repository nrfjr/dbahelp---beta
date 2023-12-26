<?php

interface DBInterface {
  public function getConnection($dbname);
  public function getOption();
  public function query($sql);
  public function execute();
  public function single();
  public function resultSet();
}