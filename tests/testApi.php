<?php
class testApi extends PHPUnit_Framework_TestCase
{
    public function testInvalidLogin() {
        $response = exec('curl http://54.203.112.16/circle/api/validate_login.php');
        $response = json_decode($response);
        $this->assertEquals(0, $response->status, 'Response 0 should indicate invalid login.');
    }
    public function testInvalidLoginCredentials() {
        $response = exec('curl -F username=admin -F password=admi http://54.203.112.16/circle/api/validate_login.php');
        $response = json_decode($response);
        $this->assertEquals(0, $response->status, 'Response 0 should indicate invalid login.');
        }
    public function testValidLogin() {
        $response = exec('curl -F username=admin -F password=admin http://54.203.112.16/circle/api/validate_login.php');
        $response = json_decode($response);
        $this->assertEquals(1, $response->status, 'Response 1 should indicate valid login.');
        $this->assertEquals('admin', $response->fields->first_name);
        $this->assertEquals('admin', $response->fields->username);
    }
    public function testInvalidAccountActivation() {
        $response = exec('curl http://54.203.112.16/circle/api/activate_account.php');
        $response = json_decode($response);
        $this->assertEquals(0, $response->status, 'Response 0 should indicate invalid code.');
    }
    public function testAccountAlreadyActivated() {
        $response = exec('curl http://54.203.112.16/circle/api/activate_account.php?code=' . md5('admin@example.com'));
        $response = json_decode($response);
        $this->assertEquals(1, $response->status, 'Response 1 should indicate correct code.');
        $this->assertEquals(0, $response->success, 'Response 0 should indicate that account is already activated.');
    }
}
?>
