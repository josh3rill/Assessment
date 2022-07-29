<?php

require_once './vendor/autoload.php';
use App\Services\LogUploadService;
use Symfony\Component\DependencyInjection\ContainerBuilder;

// init service container
$containerBuilder = new ContainerBuilder();
// add service into the service container
$containerBuilder->register('LogUpload.service', LogUploadService::class);
// fetch service from the service container
$demoService = $containerBuilder->get('LogUpload.service');
echo $logUpload->upload();