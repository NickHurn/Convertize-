<?php
// src/AppBundle/Command/EuclideanCommand.php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Model\calculation;

class EuclideanCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:euclidean';
    private $calculation;

    public function __construct(calculation $calculation)
    {
        $this->calculation = $calculation;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Calculate euclidean distances between provided coordinates.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to calculate euclidean distances between provided coordinates')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Reading in.txt',
            '============',
            '',
        ]);

        $this->calculation->getInTxt();
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'results saved in out.txt',
            '============',
            '',
        ]);

    }

}
