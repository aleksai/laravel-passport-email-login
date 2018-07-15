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

	'tokenModel' => env( 'GoogleApplicationName', \App\Models\EmailToken::class )
];