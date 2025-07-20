<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Symfony\Component\HttpFoundation\Response;

class AdminSessionMiddleware
{
    protected $sessionManager;

    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Configure the session for admin routes
        $config = config('session.admin');

        // Set the session configuration for admin routes
        config(['session.driver' => $config['driver']]);
        config(['session.lifetime' => $config['lifetime']]);
        config(['session.expire_on_close' => $config['expire_on_close']]);
        config(['session.encrypt' => $config['encrypt']]);
        config(['session.files' => $config['files']]);
        config(['session.connection' => $config['connection']]);
        config(['session.table' => $config['table']]);
        config(['session.store' => $config['store']]);
        config(['session.cookie' => $config['cookie']]);
        config(['session.path' => $config['path']]);
        config(['session.domain' => $config['domain']]);
        config(['session.secure' => $config['secure']]);
        config(['session.http_only' => $config['http_only']]);
        config(['session.same_site' => $config['same_site']]);
        config(['session.partitioned' => $config['partitioned']]);

        // Start the admin session
        $session = $this->sessionManager->driver('admin');
        $session->start();

        // Bind the session to the request
        $request->setLaravelSession($session);

        return $next($request);
    }
}
