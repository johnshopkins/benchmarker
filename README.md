# Benchmarker

A PHP class used to benchmark PHP code.

### Usage

```php
// initialize logger (https://github.com/johnshopkins/logger)
$logger = new Logger\CommandLine();

// initialize benchmarker
$benchmarker = new Benchmarker($logger, "my script");

// do some stuff

// log some stuff
$benchmarker->log("Did some stuff");

// do some stuff

$benchmarker->end();
```
