<?php

return [
	/**
	 * Trakt client id
	 */
	'client_id' => env('TRAKT_CLIENT_ID'),
	
	/**
	 * The base URL for the Trakt API endpoints
	 * Production: https://api.trakt.tv/
	 * Sandbox: https://api-staging.trakt.tv/
	 */
	'api_base_url' => env('TRAKT_BASE_URL', 'https://api.trakt.tv/'),
	'api_version' => env('TRAKT_API_VERSION', 2),

	/**
	 * The URL for oauth authentication via the trakt.tv website. This differs from the api link.
	 */
	'oauth_url' => env('TRAKT_OAUTH_URL', 'https://trakt.tv/oauth/authorize'),
];