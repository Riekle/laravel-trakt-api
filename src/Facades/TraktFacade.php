<?php
/**
 * User: Riekle
 * Date: 25-12-2019
 */

namespace DucksCode\Trakt\Facades;

use Illuminate\Support\Facades\Facade;

class Trakt extends Facade {
	protected static function getFacadeAccessor()
	{
		return 'trakt';
	}
}