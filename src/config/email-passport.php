<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Application
    |--------------------------------------------------------------------------
    |
    | The Google settings from the Google developer's page
    |
    */

	'tokenModel' => env( 'EMAIL_TOKEN_MODEL', \App\Models\EmailToken::class )
];