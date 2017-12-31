<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 10:16
 */

namespace App\Command;

use App\Tools\SendMail;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ContactStudentCommand extends Command
{
    private $mail;

    public function __construct(SendMail $mail)
    {
        parent::__construct();
        $this->mail = $mail;
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:contact-student')

            // the short description shown while running "php bin/console list"
            ->setDescription('Send a email to students from file.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to students from a file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->mail->sendMail();
        $output->writeln('Whoa!');
    }
}