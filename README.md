<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://stackedit.io/style.css" />
</head>

<body class="stackedit">
  <div class="stackedit__html"><p align="center"><a href="https://symfony.com" target="_blank">
  <img src="https://legal.one/img/contact/logo.svg">
</a></p>
<h2 align="center">
  LegalOne Assessment Documentation
</h2>
<p align="center"><a href="https://symfony.com" target="_blank">
  <img src="https://symfony.com/logos/symfony_black_02.svg">
  </a></p><h3 align="center">
  Buit with Symfony Framework
</h3>
<p></p>
<h2 id="attribution"><a href="https://travis-ci.org/joemccann/dillinger"><img src="https://travis-ci.org/joemccann/dillinger.svg?branch=master" alt="Build Status"></a><br>
Attribution</h2>
<p>Based on requirements, this solution was built with the following attributes in view.</p>
<p>a. Made Sure the solution was Correct<br>
b.  keep to the principle of SOLID / DRY / KISS<br>
c. Created Tests<br>
d. Wrote Agnostic / Reusable Code<br>
e. Used the Design patterns paradigm<br>
f. this Documentation is comprehensive</p>
<p>The PHP version used is (PHP 8.1.6 (cli) (built: May 11 2022 08:55:59) (ZTS Visual C++ 2019 x64)).<br>
The Symfony Version that was used (Symfony CLI version 5.4.12 © 2017-2022)<br>
The Database Used was MariaDB</p>
<h2 id="installation">Installation</h2>
<ol>
<li>Clone or download repository</li>
</ol>
<pre><code>https://github.com/edlef/symfony-demo.git

</code></pre>
<ol start="2">
<li>Run composer</li>
</ol>
<pre><code>composer install

</code></pre>
<ol start="3">
<li>Run installation script to create database and load fixtures</li>
</ol>
<pre><code>sh bin/install.sh

</code></pre>
<h2 id="log-upload">Log Upload</h2>
<p><strong>Note</strong><br>
The Log file should be Accessed directly from the C:/ Directory or from within the project.<br>
–The default Log file in this project is Located in the Asset/Log Folder from the app root Directory.</p>
<h2 id="custom-command-line">Custom Command Line</h2>
<p>The command line will be used to parse the file and upload the data of the Log file to a database.</p>
<p>make sure you use a bash console</p>
<ol>
<li>Run the Following Command</li>
</ol>
<pre><code>bin/console app:upload-data

</code></pre>
<p>but you will get an error message requesting for file path</p>
<pre><code> Not enough arguments (missing: "FilePath"). 
</code></pre>
<ol start="2">
<li>Run with the inclusion of a  file part</li>
</ol>
<pre><code>bin/console app:upload-data C:/logs.txt

</code></pre>
<h2 id="starting-symfony-dev-server">Starting Symfony Dev Server</h2>
<p>After generating , serve it with the internal Symfony server comes default with the CLI:</p>
<pre class=" language-bash"><code class="prism  language-bash">$ symfony server:start
</code></pre>
<pre><code>Browse `http://127.0.0.1:8000` to Open in Browser
</code></pre>
<p>or use to following command to open the URL in a browser</p>
<pre><code>symfony open:local
</code></pre>
<h2 id="accessing-api-documentation-based-on-openapi-standard">Accessing API Documentation Based on OpenAPI Standard</h2>
<p>I built a RESTful service that implements the provided <code>api.yaml</code> OpenAPI specs using the API platform.<br>
Can be accessed by visiting the following link in your browser</p>
<pre><code>`http://127.0.0.1:8000/api`
</code></pre>
<h2 id="api-endpoint-count">API endpoint Count</h2>
<p>Implemented an API endpoint that counts the log entries in the database and return a sum.<br>
{<br>
“counter”: 21<br>
}</p>
<pre><code>`http://127.0.0.1:8000/api/count`
</code></pre>
<h2 id="filtering-the-api-endpoint-count">Filtering the API endpoint Count</h2>
<p>The api can be filtered by this Filters below</p>
<p>serviceNames   | -&gt;   you can specify a service name to fetch result based on that</p>
<p>statusCode   |      -&gt;     you can specify a status code to filter the count result based on result that meets the criteria</p>
<p>date[between]   | -&gt; Specify a range of date that the result will produce it for you  17/Aug/2021:09:21:56…18/Aug/2020:10:32:56<br>
TODO: optimize the search Filter for date</p>
<pre><code>`http://127.0.0.1:8000/api/count?serviceNames=INVOICE-SERVICE&amp;statusCode=201&amp;date%5Bbetween%5D=17%2FAug%2F2021%3A09%3A21%3A56..18%2FAug%2F2020%3A10%3A32%3A56`
</code></pre>
<h2 id="testing-the-console-command-and-the-count-api-with-phpunit-test">Testing the Console Command and the Count Api with PHPUnit Test</h2>
<p>first run the Console Command  test</p>
<pre><code>php bin/phpunit tests/Command/UploadLogCommandTest.php
</code></pre>
<p>run the Api Counter  test</p>
<pre><code>php bin/phpunit tests/api/QueryDatabaseTest.php
</code></pre>
<p>you can also make use bin/phpunit only to run all the test</p>
<pre><code>php bin/phpunit
</code></pre>
</div>
</body>

</html>
