<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class netsuite extends SoapClient{

	// private $guid = "b6058a2a-52aa-45bf-95c4-386ba872533a"; 
	 private $guid = "2a211f46-663b-49f9-bba7-3aa0fdfba6af"; 
	
	public function __construct()
    {
		$params = array(
			'soap_version' => SOAP_1_1,
			'exceptions' => true,
			'trace' => 1,
			'cache_wsdl' => WSDL_CACHE_NONE
		);
		parent::__construct('https://webservices.netsuite.com/wsdl/v2016_2_0/netsuite.wsdl', $params);
    }
	
	function checkPONo($OrderTransNo)
	{
		$params = new stdClass();
		/* $params->searchString				= $abn;
		$params->includeHistoricalDetails	= $historical;
		$params->authenticationGuid			= $this->guid; */
		$params->internalId = 'location';
		$params->type = 'select';
		
		$params->searchRecord = $OrderTransNo;
		//$baseref->baseRef = $params;
		return $this->getList($baseref);
	}
    
}