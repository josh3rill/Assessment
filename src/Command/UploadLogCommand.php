<?php 

 namespace App\Command;
use App\Repository\LogEntiresRepository;
use App\Services\LogUploadService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:upload-data')]
class UploadLogCommand extends Command // extends Command
{  
  public $doctrine;
  public $requirePath;
  public function __construct(?bool $requirePath , ManagerRegistry $doctrine, LogEntiresRepository $logEntiresRepository, LogUploadService $logUploadService)
  {
      $this->logUploadService = $logUploadService;
      $this->requirePath = $requirePath;
      $this->logEntiresRepository = $logEntiresRepository;
      $this->em = $doctrine->getManager();
      parent::__construct();
  }

  protected static $defaultName = 'app:create-user';
    protected function execute(InputInterface $input, OutputInterface $output ):Int
    {
      $output->writeln([
        'Uploading Logs to Database',
    ]);
       $this->logUploadService->upload($input->getArgument('FilePath'), $this->em );
        $output->writeln( 'Successful 100%');
        $output->writeln('Thank you');
        return Command::SUCCESS;
    }
    protected function configure(): void
    {
      $this->setHelp('This command allows you to upload a pre defined Log File to a database...');
      $this->addArgument('FilePath', $this->requirePath ? InputArgument::REQUIRED : InputArgument::REQUIRED, 'File Path');
    }

}