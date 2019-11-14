<?php

namespace LaravelEnso\Core\app\Commands\DatabaseUpgrades;

use LaravelEnso\Permissions\app\Models\Permission;

class TutorialUpgrade extends DatabaseUpgrade
{
    protected function isMigrated()
    {
        return Permission::whereName('system.tutorials.load')->exists();
    }

    protected function migrateTable()
    {
        Permission::whereName('system.tutorials.show')
            ->update(['name' => 'system.tutorials.load']);
    }
}