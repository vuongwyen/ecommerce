<?php

namespace App\Services;

use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Config;

class AdminSessionService
{
    protected $sessionManager;
    protected $config;

    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
        $this->config = Config::get('session.admin');
    }

    /**
     * Create a new admin session store
     */
    public function createSession(): Store
    {
        return $this->sessionManager->driver('admin');
    }

    /**
     * Get the admin session configuration
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Start a new admin session
     */
    public function startSession(): Store
    {
        $session = $this->createSession();
        $session->start();
        return $session;
    }

    /**
     * Regenerate the admin session
     */
    public function regenerateSession(): Store
    {
        $session = $this->createSession();
        $session->regenerate();
        return $session;
    }

    /**
     * Invalidate the admin session
     */
    public function invalidateSession(): void
    {
        $session = $this->createSession();
        $session->invalidate();
    }

    /**
     * Regenerate the admin session token
     */
    public function regenerateToken(): void
    {
        $session = $this->createSession();
        $session->regenerateToken();
    }
}
