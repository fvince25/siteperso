<?php


namespace App\Client;

use Symfony\Component\BrowserKit\AbstractBrowser;
use Symfony\Component\BrowserKit\Response;


class Client extends AbstractBrowser
{

    /**
     * @inheritDoc
     */
    protected function doRequest(object $request)
    {
        // TODO: Implement doRequest() method.
        return new Response($content, $status, $headers);
    }
}