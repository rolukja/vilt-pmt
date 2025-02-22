<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', ENV('APP_NAME', 'Laravel'));
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.site_links', []);
        $this->migrator->add('general.site_run', true);
    }
};
