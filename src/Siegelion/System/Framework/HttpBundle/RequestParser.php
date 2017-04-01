<?php
namespace Siegelion\System\Framework\HttpBundle;

class RequestParser
{
    public $aRequest;

    public function parse()
	{
        $this->parseHeader();
        $this->parseHost();
        $this->parseUrl();
		return $this->aRequest;
    }

    public function parseHeader()
	{
        $this->aRequest['uid'] = isset($_SERVER['UNIQUE_ID']) ? $_SERVER['UNIQUE_ID'] : '';
		$this->aRequest['lang'] = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
		$this->aRequest['method'] = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';
		$this->aRequest['remoteAddress'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		$this->aRequest['userAgent'] = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    }

    public function parseHost()
	{
        $aHost = explode('.', $_SERVER['HTTP_HOST']);
		$sRootDomain = array_pop($aHost);
		$sMainDomain = array_pop($aHost);
		$this->aRequest['domain'] = $sMainDomain.'.'.$sRootDomain;
        $this->aRequest['subdomain'] = $aHost;
    }

    public function parseUrl()
	{
		$aUrl = parse_url($_SERVER['REQUEST_URI']);

        $this->aRequest['path'] = array();

		$aPath = explode('/', $aUrl['path']);

		//remove first empty element
		array_shift($aPath);

		//remove last empty element
		if (end($aPath) == '') {
			array_pop($aPath);
		}

		$this->aRequest['path'] = $aPath;
		$this->aRequest['url'] = '/'.implode('/', $aPath);

		$this->aRequest['query'] = array();
		if (isset($aUrl['query'])) {
			$this->aRequest['query'] = $_GET;
		}

		$this->aRequest['post'] = array();
		if (isset($_POST)) {
			$this->aRequest['post'] = $_POST;
		}

		$this->aRequest['input'] = file_get_contents('php://input');
	}
}
