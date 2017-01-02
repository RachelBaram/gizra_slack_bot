<?php

namespace Nuntius\Plugins;

use Nuntius\NuntiusPluginAbstract;
use Nuntius\NuntiusPluginInterface;

class Reminder extends NuntiusPluginAbstract implements NuntiusPluginInterface {

  public $formats = [
    '/Remind me when i\'m logging in to (.*)/' => [
      'callback' => 'RemindMe',
      'description' => '',
    ],
    '/when (.*) is logged in tell him to (.*)/' => [
      'callback' => 'RemindTo',
      'description' => '',
    ],
  ];

  /**
   * Adding a reminder for some one.
   *
   * @param $to
   * @param $remind
   */
  public function RemindTo($to, $remind) {

    $this->addEntry();

  }

}