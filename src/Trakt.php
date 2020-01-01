<?php
/**
 * User: Riekle
 * Date: 25-12-2019
 */

namespace DucksCode\Trakt;

class Trakt {
	public function __construct() {
    }

    /**
     * Get the currently set URI path for the trakt package
     *
     * @return string
     */
    public function path() {
        return config('trakt.path');
    }
}