<?php

namespace Mysoleas\PackageSopay;

use Mysoleas\PackageSopay\Commands\PackageSopayCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
