<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\LogEntiresRepository;

class QueryDatabaseController extends AbstractController
{
  public function __construct(LogEntiresRepository $logEntiresRepository)
  {
    $this->logEntiresRepository = $logEntiresRepository;
  }

  public function __invoke($data)
  {
    $count = count($data);
    $list = [
      'data' => [
        'counter' => $count],
    ];
    return $list;

  }
}
