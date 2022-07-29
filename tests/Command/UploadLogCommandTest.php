<?php
namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class UploadLogCommandTest extends KernelTestCase
{
  public function testExecute()
  {
    $kernel = self::bootKernel();
    $application = new Application($kernel);
    $command = $application->find('app:upload-data');
    $commandTester = new CommandTester($command);
    $commandTester->execute([
      'FilePath' => 'C:/logs.txt',
    ]);
    $commandTester->assertCommandIsSuccessful();
    $output = $commandTester->getDisplay();
    $this->assertStringContainsString('Uploading Logs to Database', $output);
    $this->assertStringContainsString('Successful 100%', $output);
    $this->assertStringContainsString('Thank you', $output);
  }
}
