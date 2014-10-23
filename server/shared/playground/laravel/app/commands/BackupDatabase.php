<?php

use Illuminate\Console\Command;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Zip as Adapter;

class BackupDatabase extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'BackupDatabase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup The Current Football Manager Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        //backup the currently saved
        //todo add ZipArchive backup (use FlySystem if poss)

        //trigger the shell script for backing up files
        shell_exec('/bin/bash /var/www/playground/scripts/backup.sh');
    }
}
