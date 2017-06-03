<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_URI extends CI_URI {
	
	private $uri_parameters = array();
	
	public function load_uri_parameters($uri)
	{
		$this->uri_parameters = Route::get_parameters($uri);
	}
	
	// Now the URI->segment Method also searchs for 
	// named URIS in case we have declared them	
	public function segment($n, $no_result = null)
	{
		if ( ! is_numeric($n))
		{
			if (array_key_exists($n, $this->uri_parameters))
			{
				$n = $this->uri_parameters[$n];
			}
			else
			{
				return $no_result;
			}
		}

		return parent::segment($n, $no_result);
	}
	
	public function rsegment($n, $no_result = null)
	{
		if ( ! is_numeric($n))
		{
			if (array_key_exists($n, $this->uri_parameters))
			{
				$n = $this->uri_parameters[$n];
			}
			else
			{
				return $no_result;
			}
		}

		return parent::rsegment($n, $no_result);
	}

}

/* End of file MY_URI.php */
/* Location: ./application/core/MY_URI.php */