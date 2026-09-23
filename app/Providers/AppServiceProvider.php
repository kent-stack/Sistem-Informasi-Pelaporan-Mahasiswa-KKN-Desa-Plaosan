<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Trust all proxies when running behind tunnels (Expose, Ngrok, etc.)
        Request::setTrustedProxies(
            ['*'],
            Request::HEADER_X_FORWARDED_FOR |
            Request::HEADER_X_FORWARDED_HOST |
            Request::HEADER_X_FORWARDED_PORT |
            Request::HEADER_X_FORWARDED_PROTO
        );

        $request = app('request');
        $forwardedHost = null;
        $forwardedProto = null;
        $forwardedPort = null;

        if ($request->headers->has('forwarded')) {
            $forwardedHeader = $request->headers->get('forwarded');
            foreach (explode(',', $forwardedHeader) as $part) {
                $part = trim($part);
                foreach (explode(';', $part) as $item) {
                    [$name, $value] = array_map('trim', explode('=', $item, 2) + [1 => '']);
                    $value = trim($value, '"');
                    match (strtolower($name)) {
                        'host' => $forwardedHost = $value,
                        'proto' => $forwardedProto = $value,
                        default => null,
                    };
                }
            }
        }

        if ($request->headers->has('x-forwarded-host')) {
            $forwardedHost = trim(explode(',', $request->headers->get('x-forwarded-host'))[0]);
        }

        if ($request->headers->has('x-forwarded-proto')) {
            $forwardedProto = trim(explode(',', $request->headers->get('x-forwarded-proto'))[0]);
        }

        if ($request->headers->has('x-forwarded-port')) {
            $forwardedPort = trim(explode(',', $request->headers->get('x-forwarded-port'))[0]);
        }

        if ($forwardedHost) {
            $scheme = $forwardedProto ?: $request->getScheme();
            $host = $forwardedHost;
            if ($forwardedPort && !str_contains($host, ':')) {
                $host = sprintf('%s:%s', $host, $forwardedPort);
            }
            URL::forceScheme($scheme);
            URL::forceRootUrl($scheme.'://'.$host);
        }
    }
}
