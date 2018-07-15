<?php

namespace LenyaPugachev\PassportEmailLogin\Providers;


use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Bridge\UserRepository;
use Laravel\Passport\Passport;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use LenyaPugachev\PassportEmailLogin\EmailLoginRequestGrant;

class EmailLoginServiceProvider extends ServiceProvider {
	public function register() {
	}

	public function boot() {
		if ( file_exists( storage_path( 'oauth-private.key' ) ) ) {
			app( AuthorizationServer::class )->enableGrantType( $this->makeRequestGrant(), Passport::tokensExpireIn() );
		}
	}

	/**
	 * Create and configure a Password grant instance.
	 *
	 * @return PasswordGrant
	 */
	protected function makeRequestGrant() {
		$grant = new EmailLoginRequestGrant(
			$this->app->make( UserRepository::class ),
			$this->app->make( RefreshTokenRepository::class )
		);

		$grant->setRefreshTokenTTL( Passport::refreshTokensExpireIn() );

		return $grant;
	}
}
