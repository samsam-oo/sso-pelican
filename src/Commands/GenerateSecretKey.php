<?php

namespace Mcraft\Sso\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Kernel;
use App\Traits\EnvironmentWriterTrait;
use Illuminate\Support\Str;

class GenerateSecretKey extends Command
{
    use EnvironmentWriterTrait;

    protected $description = 'Generate new SSO secret key for Mcraft';

    protected $signature = 'mcraft:generate';

    /**
     * GenerateSecretKey constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle command execution.
     *
     * @throws \Pterodactyl\Exceptions\PterodactylException
     */
    public function handle(): int
    {
        $secret_key = $this->generate();
        $this->writeToEnvironment(['MCRAFT_SSO_SECRET' => $secret_key]);

        $this->info("Generated new secret key: $secret_key");
        return 0;
    }

    /**
     * Generate random secret key
     *
     * @return mixed
     */
    protected function generate()
    {
      return Str::random(48);
    }
}
