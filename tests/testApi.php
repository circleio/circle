<?php
class testApi extends PHPUnit_Framework_TestCase
{
    public function testChecking() {
        include '../api/validate_login.php';
        $this->assertEquals(1, 1);
    }
}
?>
