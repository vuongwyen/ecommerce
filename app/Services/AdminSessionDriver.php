<?php

namespace App\Services;

use Illuminate\Session\DatabaseSessionHandler;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;

class AdminSessionDriver
{
    /**
     * Create a new admin session store instance
     */
    public function createStore($name, $config): Store
    {
        $connection = $config['connection'] ?? null;
        $table = $config['table'] ?? 'admin_sessions';
        $lifetime = $config['lifetime'] ?? 120;

        $handler = new DatabaseSessionHandler(
            DB::connection($connection),
            $table,
            $lifetime
        );

        return new Store($name, $handler);
    }
}
