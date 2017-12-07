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
        $cmd[] = './vendor/phpunit/phpunit/phpunit tests';
        $cmd[] = '--coverage-html coverage/report/html';
        $cmd[] = '--coverage-xml coverage/report/xml';
        $cmd[] = '--whitelist ./src';
        $this->_exec(implode(' ', $cmd));
    }
}
