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
			if ( $request->get( 'email_token' ) ) {
				$tokenModel = config( 'email-passport.tokenModel' );
				$userModel = config( 'auth.providers.users.model' );

				$exp_token = explode("_", $request->get( 'email_token' ));
				if(count($exp_token) !== 2) throw new Exception('Email token is invalid.');
				
				$token = $tokenModel::find($exp_token[0]);
				if(!$token) throw new Exception('Email token id is invalid.');

				if($token->token !== $exp_token[1]) throw new Exception('Email token is wrong.');

				$user = $userModel::find($token->user_id)->first();
				if(!$user) throw new Exception('User doesn\'t found.');

				return $user;
			}
		} catch ( \Exception $e ) {
			// die( $e->getMessage() );
			throw OAuthServerException::accessDenied( $e->getMessage() );
		}

		return null;
	}

}
