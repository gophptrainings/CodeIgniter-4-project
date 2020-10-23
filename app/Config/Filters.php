<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'datefilter' => \App\Filters\DateFilter::class,
		'isLoggedIn' => \App\Filters\LoginFilter::class,
		'ipblocker' => \App\Filters\IPBlocker::class,
		'apiblocker' => \App\Filters\APIBlocker::class,
		
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			//'honeypot'
			//'csrf',
                    //'datefilter'
                   
		],
		'after'  => [
			'toolbar',
			//'honeypot'
                    //'datefilter'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [
            //'post' => ['ipblocker'],
            //'get' => ['ipblocker'],
        ];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
            'ipblocker' => ['before' =>['signin','login']],
            'apiblocker' => ['before' =>['products/*']],
        ];
}
