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
     * URL base da API
     *
     * @var [string]
     */
    protected $baseUri = 'http://api.sefaz.al.gov.br';
    
    /**
     * Instância de GuzzleHttp\Client
     *
     * @var [\GuzzleHttp\Client]
     */
    protected $httpClient;

    /**
     * __construct
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Retorna a instância de \GuzzleHttp\Client
     *
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient(): \GuzzleHttp\Client
    {
        return $this->httpClient ?? $this->httpClient = new GuzzleClient();
    }
}
