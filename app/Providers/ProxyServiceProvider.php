<?php 
namespace App\Providers;



use Illuminate\Support\ServiceProvider;

class ProxyServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $request = $this->app['request'];
        $proxies = $this->app['config']->get('proxy.proxies');

        if( $proxies === '*' )
        {
            // Trust all proxies - proxy is whatever
            // the current client IP address is
            $proxies = array( $request->getClientIp() );
        }

        $request->setTrustedProxies( $proxies,1);

    }

}