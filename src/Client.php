<?php

/**
 * Cliente PHP para acesso à API do projeto Economiza Alagoas
 *
 * PHP Version 7
 *
 * @category API
 * @package  Economizaalagoas
 * @author   Marcelo de Andrade <andrade.asmarcelo@gmail.com>
 * @license  https://opensource.org/licenses/mit MIT
 * @link     https://github.com/marcelodeandrade/economizaalagoas-api-php-client
 * Github
 */

namespace Economizaalagoas;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Cliente para acesso à API do projeto Economiza Alagoas
 *
 * @category API
 * @package  Economizaalagoas
 * @author   Marcelo de Andrade <andrade.asmarcelo@gmail.com>
 * @license  https://opensource.org/licenses/mit MIT
 * @link     https://github.com/marcelodeandrade/economizaalagoas-api-php-client
 * Github
 */
class Client
{
    /**
     * Token de acesso
     *
     * @var [string]
     */
    protected $token;

    /**
     * Instância de GuzzleHttp\Client
     *
     * @var [\GuzzleHttp\Client]
     */
    protected $httpClient;

    /**
     * URL base da API
     *
     * @var [string]
     */
    protected $baseUri = 'http://api.sefaz.al.gov.br';

    /**
     * Endpoints acessíveis
     *
     * @var array
     */
    protected $endpoint = [
        'nfce' => [
            'estabelecimento'   => 'sfz_nfce_api/api/public/consultarPrecoProdutoEmEstabelecimento',
            'ean'               => 'sfz_nfce_api/api/public/consultarPrecosPorCodigoDeBarras',
            'descricao'         => 'sfz_nfce_api/api/public/consultarPrecosPorDescricao'
        ]
    ];

    /**
     * __construct
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
        $this->setHttpClient();
    }

    /**
    * Define httpClient como uma instância de \GuzzleHttp\Client
    *
    * @return void
    */
    protected function setHttpClient(): void
    {
        $this->httpClient = new GuzzleClient([
            'base_uri'  => $this->baseUri,
            'headers'   => [
                'AppToken'      => $this->token,
                'Content-Type'  => 'application/json',
            ],
        ]);
    }

    /**
     * Retorna a instância de \GuzzleHttp\Client
     *
     * @return \GuzzleHttp\Client
     */
    protected function getHttpClient(): \GuzzleHttp\Client
    {
        return $this->httpClient;
    }

    /**
     * Responsável pelas requisições utilizando \GuzzleHttp\Client
     *
     * @param string $method
     * @param string $endpoint
     * @param array $body
     * @return void
     */
    protected function doRequest(string $method, string $endpoint, array $body): \GuzzleHttp\Psr7\Response
    {
        $response = ($this->getHttpClient())->request($method, $endpoint, [
            \GuzzleHttp\RequestOptions::JSON => $body
        ]);

        return $response;
    }

    /**
     * Retorna uma string JSON com a lista de preços do produto consultado
     *
     * @param array $body
     * @return string
     */
    public function consultarPrecosPorDescricao(array $body): string
    {
        return (string) ($this->doRequest('POST', $this->endpoint['nfce']['descricao'], $body))
            ->getBody();
    }
}
