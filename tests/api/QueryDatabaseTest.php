<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\LogEntires;

class QueryDatabaseTest extends ApiTestCase
{

    public function testCountWithFilter(): void
    {
        $response = static::createClient()->request('GET', 'api/count', ['json' => [
                'serviceNames' => 'INVOICE-SERVICE',
                'statusCode' => '201',
            ]]);

        $this->assertResponseStatusCodeSame(200);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        $this->assertJsonContains([
            '@context' => '/api/contexts/LogEntires',
            "@id" => '/api/count',
            "@type" => "hydra:Collection",
            'hydra:member' => [],
            'hydra:totalItems' => 1,
            'hydra:search' => [],
        ]
        );
        $this->assertCount(1, $response->toArray()['hydra:member']);
        $this->assertMatchesResourceCollectionJsonSchema(LogEntires::class);
    }









}
