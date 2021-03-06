<?php

namespace Nuntius;

use r;

class NuntiusRethinkdb {

  /**
   * @var r\Connection
   */
  protected $connection;

  /**
   * The DB name.
   *
   * @var string
   */
  protected $db;

  function __construct($info) {
    $this->db = $info['db'];
    try {
      $this->connection = \r\connect($info['host'], $info['port'], $info['db'], $info['api_key'], $info['timeout']);
    } catch (\Exception $e) {
      print($e->getMessage() . "\n");
    }
  }

  /**
   * Getting the connect object.
   *
   * @return r\Connection
   */
  public function getConnection() {
    return $this->connection;
  }

  /**
   * Create a table in the DB.
   *
   * @param $table
   *   The table name.
   */
  public function createTable($table) {
    try {
      r\db($this->db)->tableCreate($table)->run($this->connection);
    } catch (\Exception $e) {
      print($e->getMessage() . "\n");
    }
  }

  /**
   * Creating a DB.
   *
   * @param $db
   *   The DB name.
   */
  public function createDB($db) {
    try {
      r\dbCreate($db)->run($this->connection);
    } catch (\Exception $e) {
      print($e->getMessage() . "\n");
    }
  }

  /**
   * Adding entry to a table.
   *
   * @param $string
   *   The table name.
   * @param $array
   *   The record.
   */
  public function addEntry($string, $array) {
    r\db($this->db)
      ->table($string)
      ->insert($array)
      ->run($this->connection);
  }

  /**
   * Get a table object.
   *
   * @param $table
   *   The name of the table.
   *
   * @return r\Queries\Tables\Table
   */
  public function getTable($table) {
    return r\db($this->db)
      ->table($table);
  }

}
