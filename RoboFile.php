<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    /**
     * Runs tests suite of the project
     */
    public function test()
    {
        $cmd = [];
        array_push($cmd, './vendor/phpunit/phpunit/phpunit src');
        array_push($cmd, '--coverage-html coverage/report/html');
        array_push($cmd, '--coverage-xml coverage/report/xml');
        array_push($cmd, '--whitelist ./src');
        $this->_exec(implode(' ', $cmd));
    }
}
