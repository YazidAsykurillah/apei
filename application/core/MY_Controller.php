<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
}

/**
 *
 */
class BackendController extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}
    }
}

/**
 *
 */
class FrontendController extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }
}
