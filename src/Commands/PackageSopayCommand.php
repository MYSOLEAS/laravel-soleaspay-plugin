<?php

namespace Mysoleas\PackageSopay\Commands;

use Illuminate\Console\Command;

class PackageSopayCommand extends Command
{
    public $signature = 'package-sopay';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
