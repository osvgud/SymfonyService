<?php

namespace App\Command;

use App\Age\AgeCommandManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AgeCalculatorCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';

    private $manager;

    public function __construct(AgeCommandManager $ageCommandManager)
    {
        $this->manager = $ageCommandManager;

        // you *must* call the parent constructor
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Birthday date')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'Adult check');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->manager->execute($input, $output);
    }
}
