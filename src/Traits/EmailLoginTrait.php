<?php

namespace LenyaPugachev\PassportEmailLogin\Traits;

use Illuminate\Http\Request;

trait EmailLoginTrait {

	/**
	 * Logs a App\User in using a Email token via Passport
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 * @throws \League\OAuth2\Server\Exception\OAuthServerException
	 */
	public function loginEmail( Request $request ) {
		try {
			/**
			 * Check if the 'goole_token' as passed.
			 */
			if ( $request->get( 'email_token' ) ) {
				
				

				return $user;
			}
		} catch ( \Exception $e ) {
			die( $e->getMessage() );
//			throw OAuthServerException::accessDenied( $e->getMessage() );
		}

		return null;
	}
	
}
