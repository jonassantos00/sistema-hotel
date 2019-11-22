<?php

namespace App\Console\Commands;

use App\Imports\ClientImport;
use Illuminate\Console\Command;

class ImportClients extends Command
{
    protected $signature = 'import:clients {file : Nome do arquivo que será importado}';

    protected $description = 'Importação de clientes via arquivo Excel';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
		$this->output->title(trans('import.starting'));
		(new ClientImport())->withOutput($this->output)->import($this->argument('file'));
		$this->output->success(trans('import.success'));
    }
}
