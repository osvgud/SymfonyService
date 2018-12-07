<?php
/**
 * Created by PhpStorm.
 * User: osvaldas
 * Date: 18.12.7
 * Time: 20.51
 */

namespace App\Age;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCommandManager
{

    private $ageCalculateService;
    private $adultCheckService;

    public function __construct(AgeCalculateService $ageCalculateService, AdultCheckService $adultCheckService)
    {
        $this->ageCalculateService = $ageCalculateService;
        $this->adultCheckService = $adultCheckService;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');
        $opt = $input->getOption('adult');

        $age = $this->ageCalculateService->calculate($arg1);

        if ($arg1) {
            $io->note(sprintf('I am %s years old', $age));
        }

        if($opt) {
            if ($this->adultCheckService->isAdult($age)) {
                $io->success('Am I an adult? ----- YES !!');
            } else {
                $io->warning('Am I an adult? ----- NO !!');
            }
        }
    }
}