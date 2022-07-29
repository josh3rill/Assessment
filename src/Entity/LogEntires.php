<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LogEntiresRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\QueryDatabaseController;
use ApiPlatform\Core\Bridge\Doctrine\MongoDbOdm\Filter\RangeFilter;

#[ORM\Entity(repositoryClass: LogEntiresRepository::class)]


#[ApiResource(paginationEnabled: false, collectionOperations: [
  
    'get_count' => [
        "get",
        'method' => 'GET',
        'path' => '/count',
        'controller' => QueryDatabaseController::class,
        
    ],
])]
#[ApiFilter(
    SearchFilter::class,
    properties:[
        'serviceNames' => SearchFilter::STRATEGY_EXACT,
        'statusCode' => SearchFilter::STRATEGY_PARTIAL,
    ]),]
#[ApiFilter(RangeFilter::class,
 properties: [ 'date' => RangeFilter::PARAMETER_GREATER_THAN,

 
],
 
 )]

    

class LogEntires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $serviceNames = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $date = null;

    #[ORM\Column(length: 255, type: 'string' )]
    private ?string $GMT = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $method = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $endpoint = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $protocol = null;

    #[ORM\Column(length: 255, type: 'string')]
    private ?string $statusCode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function setId(string $date): self
    {
        $this->date = $date;

        return $this;
    }


    public function getServiceName(): ?string
    {
        return $this->serviceNames;
    }


   
    public function setServiceName(string $serviceNames): self
    {
        $this->serviceNames = $serviceNames;

        return $this;
    }

    public function getdate(): ?string
    {
        return $this->date;
    }

    public function setdate(string $date): self
    {
        $this->date = $date;

        return $this;
    }
    


    

    public function getGMT(): ?string
    {
        return $this->GMT;
    }

    public function setGMT(string $GMT): self
    {
        $this->GMT = $GMT;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function setProtocol(string $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }

    public function getRequestStatus(): ?string
    {
        return $this->statusCode;
    }

    public function setRequestStatus(string $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    
}
