<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '',
            'client_secret' => '',
            'scope'         => array(),
        ),
        'Linkedin' => array(
            'client_id'     => '77e3scl45rkt93',
            'client_secret' => 'lDXC3mk8ThJOz2SI',
            'redirectUri'   =>  url('loginLinkedIn'),
            'scope' => array('r_basicprofile','r_emailaddress','r_contactinfo','rw_nus','r_network'),
        ),

    )

);