<?php

namespace Mysoleas\PackageSopay;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mysoleas\PackageSopay\Commands\PackageSopayCommand;

class PackageSopayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('package-sopay')
            ->hasConfigFile('package-sopay')
            ->hasCommand(PackageSopayCommand::class);
    }
}
