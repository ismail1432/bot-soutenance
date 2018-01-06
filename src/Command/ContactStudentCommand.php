<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 10:16
 */

namespace App\Command;

use App\Service\ReadCsvFile;
use App\Tools\ContactStudent;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ContactStudentCommand
 *
 * Contact the students by mail
 *
 * @package App\Command
 */
class ContactStudentCommand extends Command
{
    /**
     * @var ContactStudent
     */
    private $contactStudent;

    public function __construct(ContactStudent $contactStudent)
    {
        parent::__construct();
        $this->contactStudent = $contactStudent;
    }

    /**
     * Configuration
     */
    protected function configure() :void
    {
        $this
            ->setName('contact:student')

            ->setDescription('Send a email to students from file.')

            ->setHelp('This command allows you to students from a file')
        ;
        $this
            ->addArgument('fileName', InputArgument::REQUIRED, 'Please give me the filename ');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('fileName');
        $path =__DIR__.'/../../import/';

        $pathFile = $path.'/'.$file;
        $readFile = new ReadCsvFile();

        $readFile->setPathFile($pathFile);
        $this->contactStudent->contactStudent($readFile);

        rename($pathFile, $path.'/contacted/'.$file);

        $output->writeln('All students were contacted !');
    }
}