<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;



$client = new Client(['base_uri' => 'https://www.alura.com.br']); # base da url
# todas as requisicoes terao como base a uri informada

$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/formacoes');

foreach ($cursos as $curso){
   echo exibeMensagem($curso);
}

# Para resolver o erro que estava ocorrendo antes relacionado ao DOM
# https://cursos.alura.com.br/forum/topico-uncaught-error-class-domdocument-122314