<?php

namespace Benchmarker;

class Benchmarker
{
  /**
   * Instance of logger adapter
   * https://github.com/johnshopkins/logger-exchange
   * @var object
   */
  protected $logger;

  /**
   * This benchmarker's label
   * @var string
   */
  protected $label;

  /**
   * Start time of the script
   * @var float
   */
  protected $start;

  public function __construct($logger, $label = null)
  {
    $this->logger = $logger;
    $this->label = $label;
    $this->start = $this->current = microtime(true);
  }

  /**
   * Log a benchmark
   * @param  string  $task  Label of the benchmark
   * @param  boolean $start Use starting time instead of last recorded
   * @return null
   */
  public function log($task, $start = false)
  {
    $new = microtime(true);

    $starting = $start ? $this->start : $this->current;
    $time = number_format($new - $starting, 10);

    $log = $this->label ? "{$this->label}: " : "";
    $log .= "{$task} took {$time} seconds";

    $this->logger->addInfo($log);

    $this->current = microtime(true);
  }

  /**
   * Log the total amount of time a process took
   * @return null
   */
  public function end()
  {
    $this->log("Entire process", true);
  }
}
