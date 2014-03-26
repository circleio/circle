<?php
class testApi extends PHPUnit_Framework_TestCase
{
    public function testInvalidLogin() {
	        $response = shell_exec('bash test_invalid_login.sh');
	             $response = json_decode($response);
	             $this->assertEquals(0, $response->status, 'Response 0 should indicate invalid login.');
	       }
     public function testInvalidLoginCredentials() {
	          $response = shell_exec('bash test_api_invalid_credentials.sh');
	           $response = json_decode($response);
		            $this->assertEquals(0, $response->status, 'Response 0 should indicate invalid login.');
		         }
		          public function testValidLogin() {
			               $response = shell_exec('bash test_api_valid_credentials.sh');
			        	$response = json_decode($response);
				        $this->assertEquals(1, $response->status, 'Response 1 should indicate valid login.');
				         $this->assertEquals('admin', $response->fields->first_name);
				           $this->assertEquals('admin', $response->fields->username);
    }
}
?>
