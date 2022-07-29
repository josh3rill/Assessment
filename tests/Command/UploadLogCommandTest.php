<?php
namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use App\Utils\Utils;

class UploadLogCommandTest extends KernelTestCase
{

  protected $containerBag;



  public function testExecute()
  {


    $kernel = self::bootKernel();
    $application = new Application($kernel);
    $command = $application->find('app:upload-data');
    $commandTester = new CommandTester($command);
    $dir = Utils::getRootDir();

    $commandTester->execute([
      'FilePath' => $dir,
    ]);
    $commandTester->assertCommandIsSuccessful();
    $output = $commandTester->getDisplay();
    $this->assertStringContainsString('Uploading Logs to Database', $output);
    $this->assertStringContainsString('Successful 100%', $output);
    $this->assertStringContainsString('Thank you', $output);
  }
}
