<?php

namespace Kuvvu\Envexample\Commands;

use Illuminate\Console\Command;

class EnvExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:env.example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a env.example File based on the current .env File';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (config('envexample.create_bakup', true)) {
            @copy(base_path('.env.example'), base_path( config('envexample.backup_file_name', 'env.example.bak') ));
        }

        @unlink(base_path('.env.example'));

        $env = file_get_contents(base_path('.env'));

        foreach (explode(PHP_EOL, $env) as $line) {
            $arr = explode('=', $line);

            if (! in_array($arr[0], config('envexample.ignore', []))) {
                if (in_array($arr[0], config('envexample.keep', []))) {
                    file_put_contents(base_path('.env.example'), $line.PHP_EOL, FILE_APPEND);
                } else {
                    file_put_contents(base_path('.env.example'), str_contains($line, '=') ? $arr[0].'='.PHP_EOL : $line.PHP_EOL, FILE_APPEND);
                }
            }
        }

        $this->line('');
        $this->info(' .env.example file sucessfully updated 👍');

        return Command::SUCCESS;
    }
}
