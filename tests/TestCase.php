<?php

namespace Tests;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear permisos comunes si no existen
        if (Permission::count() === 0) {
            //Spectator
            Role::create(["name" => "spectator", 'guard_name' => 'web']);
            Permission::create(["name" => "spectator", 'guard_name' => 'web']);

            //User
            Role::create(["name" => "user", 'guard_name' => 'web']);
            Permission::create(["name" => "user", 'guard_name' => 'web']);
            
            Role::create(["name" => "admin", 'guard_name' => 'web']);
            Role::create(["name" => "editor", 'guard_name' => 'web']);

            //Permissions Roles
            Permission::create(["name" => "create roles", 'guard_name' => 'web']);
            Permission::create(["name" => "read roles", 'guard_name' => 'web']);
            Permission::create(["name" => "update roles", 'guard_name' => 'web']);
            Permission::create(["name" => "delete roles", 'guard_name' => 'web']);

            //Permissions Lessons
            Permission::create(["name" => "create lessons", 'guard_name' => 'web']);
            Permission::create(["name" => "read lessons", 'guard_name' => 'web']);
            Permission::create(["name" => "update lessons", 'guard_name' => 'web']);
            Permission::create(["name" => "delete lessons", 'guard_name' => 'web']);

            //Permissions Categories
            Permission::create(["name" => "create categories", 'guard_name' => 'web']);
            Permission::create(["name" => "read categories", 'guard_name' => 'web']);
            Permission::create(["name" => "update categories", 'guard_name' => 'web']);
            Permission::create(["name" => "delete categories", 'guard_name' => 'web']);
        }
    }
}
