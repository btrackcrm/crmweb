<?php
	require_once "assets/lib/xmlseclibs/xmlseclibs.php";
	require_once "assets/lib/phpqrcode/phpqrcode.php";
	
	use RobRichards\XMLSecLibs\XMLSecurityDSig;
	use RobRichards\XMLSecLibs\XMLSecurityKey;
	
	// official documentation at
	// http://www.datoteke.fu.gov.si/dpr/index.html
	class InvoiceManager
	{
		public $data;
		
		private $xmlMessage = '';
		private $certsPath;
		private $myCertificatePathPem;
		private $myCertificatePathP12;
		private $myCertificatePassword;
		private $fursCertificatePath;
		private $url2post;
		private $urlPostHeader;
		private $fursResponse;
		private $content2SignIdentifier;
		private $companyTaxNum;
		private $softwareSupplierTaxNum;
		private $msgIdentifier;
		private $zoi;
		private $eor;
		private $qrDirPath;
		private $testXMLPath;
		private $serverPath = "/home/appdevsi/track.appdev.si/Web";
		
		public function __construct($cert_name_pem = "", $cert_name_p12 = "", $cert_password = "", $company_taxnumber = "")
		{
			$this->qrDirPath							= $this->serverPath . '/assets/qr/';
			$this->testXMLPath							= $this->serverPath . '/assets/test_xml/';
			$this->certsPath							= $this->serverPath . '/assets/certs/';
			$this->myCertificatePathPem					= $this->serverPath . '/assets/certs/' . $cert_name_pem;
			$this->myCertificatePathP12					= $this->serverPath . '/assets/certs/' . $cert_name_p12;
			$this->myCertificatePassword				= $cert_password;
			$this->fursCertificatePath					= $this->certsPath.'sigov-ca.pem';
			$this->companyTaxNum 						= $company_taxnumber;
			$this->softwareSupplierTaxNum 				= '69838046';
			$this->url2post 							= 'https://blagajne.fu.gov.si:9003/v1/cash_registers';
		}
		
		public function __construct1(){
		    $this->qrDirPath							= $this->serverPath . '/assets/qr/';
			$this->testXMLPath							= $this->serverPath . '/assets/test_xml/';
			$this->certsPath							= $this->serverPath . '/assets/certs/';
			$this->softwareSupplierTaxNum 				= '69838046';
		}
		
		public function setTestMode()
		{
			$this->myCertificatePathPem					= $this->certsPath . 'blagajna.pem';
			$this->myCertificatePathP12					= $this->certsPath . '10457895-1.p12';
			$this->myCertificatePassword				= '23LOC6RR5RHN';
			$this->fursCertificatePath					= $this->certsPath . 'fursserver.pem';
			$this->companyTaxNum 						= '10457895';
			$this->url2post 							= 'https://blagajne-test.fu.gov.si:9002/v1/cash_registers';
		}
		
		public function createEchoMsg()
		{
			$this->content2SignIdentifier = '';
			
			$this->urlPostHeader = array(
				'Content-Type: text/xml; charset=utf-8',
				'Cache-Control: no-cache',
				'Pragma: no-cache',
				'SOAPAction: /echo'
			);
			$dataArray = array(
				'name' => 'soapenv:Envelope',
				'attributes' => array(
					'xmlns:soapenv' => 'http://schemas.xmlsoap.org/soap/envelope/',
					'xmlns:fu' => 'http://www.fu.gov.si/'
				),
				'childs' => array(
					0 => array(
						'name' => 'soapenv:Header'
					),
					1 => array(
						'name' => 'soapenv:Body',
						'childs' => array(
							0 => array(
								'name' => 'fu:EchoRequest',
								'value' => 'vrni x'
							)
						)
					)
				)
			);
			$this->createXMLMessage($dataArray);
		}
		
		public function createMovablePremiseMsg($premise_mark, $premise_type, $premise_validitydate){
			$this->msgIdentifier = 'data';
			$this->content2SignIdentifier = 'fu:BusinessPremiseRequest';
			
			$this->urlPostHeader = array(
				'Content-Type: text/xml; charset=utf-8',
				'Cache-Control: no-cache',
				'Pragma: no-cache',
				'SOAPAction: /invoices/register'
			);
			// generate data
			
			$this->data['businessID'] = $premise_mark;
			$this->data['businessValidityDate'] = $premise_validitydate;
		
			$messageID = $this->returnUUID();
			$dateTime = str_replace(' ', 'T', date('Y-m-d H:i:s'));
			$businessID = $this->data['businessID'];
			$businessValidityDate = $this->data['businessValidityDate'];
			
			// create substructures
			
			$headerArray = array(
				'name' => 'fu:Header',
				'childs' => array(
					0 => array(
						'name' => 'fu:MessageID',
						'value' => $messageID
					),
					1 => array(
						'name' => 'fu:DateTime',
						'value' => $dateTime
					),
				)
			);
			
			$businessPremiseArray = array(
				'name' => 'fu:BusinessPremise',
				'childs' => array(
					0 => array(
						'name' => 'fu:TaxNumber',
						'value' => $this->companyTaxNum
					),
					1 => array(
						'name' => 'fu:BusinessPremiseID',
						'value' => $businessID
					),
					2 => array(
						'name' => 'fu:BPIdentifier',
						'childs' => array(
							0 => array(
								'name' => 'fu:PremiseType',
								'value' => $premise_type
							)
						)
					),
					3 => array(
						'name' => 'fu:ValidityDate',
						'value' => $businessValidityDate
					),
					4 => array(
						'name' => 'fu:SoftwareSupplier',
						'childs' => array(
							0 => array(
								'name' => 'fu:TaxNumber',
								'value' => $this->softwareSupplierTaxNum
							)
						)
					)
				)
			);
			
			// create main structure
			// create array structure
				
			$dataArray = array(
				'name' => 'SOAP-ENV:Envelope',
				'attributes' => array(
					'xmlns:SOAP-ENV' => 'http://schemas.xmlsoap.org/soap/envelope/',
					'xmlns:fu' => 'http://www.fu.gov.si/',
					'xmlns:xd' => 'http://www.w3.org/2000/09/xmldsig#'
				),
				'childs' => array(
					0 => array(
						'name' => 'SOAP-ENV:Body',
						'childs' => array(
							0 => array(
								'name' => 'fu:BusinessPremiseRequest',
								'attributes' => array(
									'Id' => $this->msgIdentifier
								),
								'childs' => array(
									0 => $headerArray,
									1 => $businessPremiseArray
								)
							)
						)
					)
				)
			);
			
			$this->createXMLMessage($dataArray);
		}
		
		public function createImmovablePremiseMsg($premise_mark, $premise_cadastralnr, $premise_buildingnr, $premise_buildingsectionnr, $premise_street, $premise_housenr, $premise_housenradditional, $premise_city, $premise_post, $premise_postalcode, $premise_validitydate){
			$this->msgIdentifier = 'data';
			$this->content2SignIdentifier = 'fu:BusinessPremiseRequest';
			
			$this->urlPostHeader = array(
				'Content-Type: text/xml; charset=utf-8',
				'Cache-Control: no-cache',
				'Pragma: no-cache',
				'SOAPAction: /invoices/register'
			);
			// generate data
			
			$this->data['businessID'] = $premise_mark;
			$this->data['businessValidityDate'] = $premise_validitydate;
		
			$messageID = $this->returnUUID();
			$dateTime = str_replace(' ', 'T', date('Y-m-d H:i:s'));
			$businessID = $this->data['businessID'];
			$businessValidityDate = $this->data['businessValidityDate'];
			
			// create substructures
			
			$headerArray = array(
				'name' => 'fu:Header',
				'childs' => array(
					0 => array(
						'name' => 'fu:MessageID',
						'value' => $messageID
					),
					1 => array(
						'name' => 'fu:DateTime',
						'value' => $dateTime
					),
				)
			);
			
			$businessPremiseArray = array(
				'name' => 'fu:BusinessPremise',
				'childs' => array(
					0 => array(
						'name' => 'fu:TaxNumber',
						'value' => $this->companyTaxNum
					),
					1 => array(
						'name' => 'fu:BusinessPremiseID',
						'value' => $businessID
					),
					2 => array(
						'name' => 'fu:BPIdentifier',
						'childs' => array(
						        0 => array('name' => 'fu:RealEstateBP', 'childs' => array(
								0 => array('name' => 'fu:PropertyID', 'childs' => array(
            								0 => array(
            								    'name' => 'fu:CadastralNumber',
            								    'value' => $premise_cadastralnr
            								),
            								1 => array(
                                                'name' => 'fu:BuildingNumber',
                                                'value' => $premise_buildingnr
            								),
            								2 => array(
            								    'name' => 'fu:BuildingSectionNumber',
            								    'value' => $premise_buildingsectionnr
            								)
            							)
            						), 1 => array('name' => 'fu:Address', 'childs' => array(
            						        0 => array(
            						            'name' => 'fu:Street',
            						            'value' => $premise_street
            						        ),
            						        1 => array(
            						            'name' => 'fu:HouseNumber',
            						            'value' => $premise_housenr
            						        ),
            						        2 => array(
            						            'name' => 'fu:HouseNumberAdditional',
            						            'value' => $premise_housenradditional
            						        ),
            								3 => array(
            								    'name' => 'fu:Community',
            								    'value' => $premise_city
            								),
            								4 => array(
            								    'name' => 'fu:City',
            								    'value' => $premise_post
            								),
            								5 => array(
            								    'name' => 'fu:PostalCode',
            								    'value' => $premise_postalcode
            								)
            						    )
								    )
							    )
						    )
					    )
					),
					3 => array(
						'name' => 'fu:ValidityDate',
						'value' => $businessValidityDate
					),
					4 => array(
						'name' => 'fu:SoftwareSupplier',
						'childs' => array(
							0 => array(
								'name' => 'fu:TaxNumber',
								'value' => $this->softwareSupplierTaxNum
							)
						)
					)
				)
			);
			
			// create main structure
			// create array structure
				
			$dataArray = array(
				'name' => 'SOAP-ENV:Envelope',
				'attributes' => array(
					'xmlns:SOAP-ENV' => 'http://schemas.xmlsoap.org/soap/envelope/',
					'xmlns:fu' => 'http://www.fu.gov.si/',
					'xmlns:xd' => 'http://www.w3.org/2000/09/xmldsig#'
				),
				'childs' => array(
					0 => array(
						'name' => 'SOAP-ENV:Body',
						'childs' => array(
							0 => array(
								'name' => 'fu:BusinessPremiseRequest',
								'attributes' => array(
									'Id' => $this->msgIdentifier
								),
								'childs' => array(
									0 => $headerArray,
									1 => $businessPremiseArray
								)
							)
						)
					)
				)
			);
			
			$this->createXMLMessage($dataArray);
		}
		
		public function createMovablePremiseClosureMsg($premise_mark, $premise_type, $premise_validitydate)
		{
			$this->msgIdentifier = 'data';
			$this->content2SignIdentifier = 'fu:BusinessPremiseRequest';
			
			$this->urlPostHeader = array(
				'Content-Type: text/xml; charset=utf-8',
				'Cache-Control: no-cache',
				'Pragma: no-cache',
				'SOAPAction: /invoices/register'
			);
			// generate data
			
			$this->data['businessID'] = $premise_mark;
			$this->data['businessValidityDate'] = $premise_validitydate;
		
			$messageID = $this->returnUUID();
			$dateTime = str_replace(' ', 'T', date('Y-m-d H:i:s'));
			$businessID = $this->data['businessID'];
			$businessValidityDate = $this->data['businessValidityDate'];
			
			// create substructures
			
			$headerArray = array(
				'name' => 'fu:Header',
				'childs' => array(
					0 => array(
						'name' => 'fu:MessageID',
						'value' => $messageID
					),
					1 => array(
						'name' => 'fu:DateTime',
						'value' => $dateTime
					),
				)
			);
			
			$businessPremiseArray = array(
				'name' => 'fu:BusinessPremise',
				'childs' => array(
					0 => array(
						'name' => 'fu:TaxNumber',
						'value' => $this->companyTaxNum
					),
					1 => array(
						'name' => 'fu:BusinessPremiseID',
						'value' => $businessID
					),
					2 => array(
						'name' => 'fu:BPIdentifier',
						'childs' => array(
							0 => array(
								'name' => 'fu:PremiseType',
								'value' => $premise_type
							)
						)
					),
					3 => array(
						'name' => 'fu:ValidityDate',
						'value' => $businessValidityDate
					),
					4 => array(
					    'name' => 'fu:ClosingTag',
					    'value' => 'Z'
					),
					5 => array(
						'name' => 'fu:SoftwareSupplier',
						'childs' => array(
							0 => array(
								'name' => 'fu:TaxNumber',
								'value' => $this->softwareSupplierTaxNum
							)
						)
					)
				)
			);
			
			// create main structure
			// create array structure
				
			$dataArray = array(
				'name' => 'SOAP-ENV:Envelope',
				'attributes' => array(
					'xmlns:SOAP-ENV' => 'http://schemas.xmlsoap.org/soap/envelope/',
					'xmlns:fu' => 'http://www.fu.gov.si/',
					'xmlns:xd' => 'http://www.w3.org/2000/09/xmldsig#'
				),
				'childs' => array(
					0 => array(
						'name' => 'SOAP-ENV:Body',
						'childs' => array(
							0 => array(
								'name' => 'fu:BusinessPremiseRequest',
								'attributes' => array(
									'Id' => $this->msgIdentifier
								),
								'childs' => array(
									0 => $headerArray,
									1 => $businessPremiseArray
								)
							)
						)
					)
				)
			);
			
			$this->createXMLMessage($dataArray);
		}
		
		public function createImmovablePremiseClosureMsg($premise_mark, $premise_cadastralnr, $premise_buildingnr, $premise_buildingsectionnr, $premise_street, $premise_housenr, $premise_housenradditional, $premise_city, $premise_post, $premise_postalcode, $premise_validitydate){
			$this->msgIdentifier = 'data';
			$this->content2SignIdentifier = 'fu:BusinessPremiseRequest';
			
			$this->urlPostHeader = array(
				'Content-Type: text/xml; charset=utf-8',
				'Cache-Control: no-cache',
				'Pragma: no-cache',
				'SOAPAction: /invoices/register'
			);
			// generate data
			
			$this->data['businessID'] = $premise_mark;
			$this->data['businessValidityDate'] = $premise_validitydate;
		
			$messageID = $this->returnUUID();
			$dateTime = str_replace(' ', 'T', date('Y-m-d H:i:s'));
			$businessID = $this->data['businessID'];
			$businessValidityDate = $this->data['businessValidityDate'];
			
			// create substructures
			
			$headerArray = array(
				'name' => 'fu:Header',
				'childs' => array(
					0 => array(
						'name' => 'fu:MessageID',
						'value' => $messageID
					),
					1 => array(
						'name' => 'fu:DateTime',
						'value' => $dateTime
					),
				)
			);
			
			$businessPremiseArray = array(
				'name' => 'fu:BusinessPremise',
				'childs' => array(
					0 => array(
						'name' => 'fu:TaxNumber',
						'value' => $this->companyTaxNum
					),
					1 => array(
						'name' => 'fu:BusinessPremiseID',
						'value' => $businessID
					),
					2 => array(
						'name' => 'fu:BPIdentifier',
						'childs' => array('name' => 'fu:RealEstateBP', 'childs' => array(
								    'name' => 'fu:PropertyID', 'childs' => array(
            								0 => array(
            								    'name' => 'fu:CadastralNumber',
            								    'value' => $premise_cadastralnr
            								),
            								1 => array(
                                                'name' => 'fu:BuildingNumber',
                                                'value' => $premise_buildingnr
            								),
            								2 => array(
            								    'name' => 'fu:BuildingSectionNumber',
            								    'value' => $premise_buildingsectionnr
            								)
            							), array('name' => 'fu:Address', 'childs' => array(
            								0 => array(
            								    'name' => 'fu:Community',
            								    'value' => $premise_city
            								),
            								1 => array(
            								    'name' => 'fu:City',
            								    'value' => $premise_post
            								),
            								2 => array(
            								    'name' => 'fu:PostalCode',
            								    'value' => $premise_postalcode
            								)
            						    )
            						)
								)
							)
					),
					3 => array(
						'name' => 'fu:ValidityDate',
						'value' => $businessValidityDate
					),
					4 => array(
					    'name' => 'fu:ClosingTag',
					    'value' => 'Z'
					),
					5 => array(
						'name' => 'fu:SoftwareSupplier',
						'childs' => array(
							0 => array(
								'name' => 'fu:TaxNumber',
								'value' => $this->softwareSupplierTaxNum
							)
						)
					)
				)
			);
			
			// create main structure
			// create array structure
				
			$dataArray = array(
				'name' => 'SOAP-ENV:Envelope',
				'attributes' => array(
					'xmlns:SOAP-ENV' => 'http://schemas.xmlsoap.org/soap/envelope/',
					'xmlns:fu' => 'http://www.fu.gov.si/',
					'xmlns:xd' => 'http://www.w3.org/2000/09/xmldsig#'
				),
				'childs' => array(
					0 => array(
						'name' => 'SOAP-ENV:Body',
						'childs' => array(
							0 => array(
								'name' => 'fu:BusinessPremiseRequest',
								'attributes' => array(
									'Id' => $this->msgIdentifier
								),
								'childs' => array(
									0 => $headerArray,
									1 => $businessPremiseArray
								)
							)
						)
					)
				)
			);
			
			$this->createXMLMessage($dataArray);
		}
		
		public function createInvoiceMsg($invoice_amount, $invoiceNr, $operatorTaxNumber, $invoice_date)
		{
			// set data
			// set data
			
			$messageID = $this->returnUUID();
			$dateTime = str_replace(' ', 'T', $invoice_date);
			// $this->data['subsequent_submit'] => edina možnost je 1
			if(isset($this->data['SubsequentSubmit'])) $subsequentSubmitArray = array('name' => 'fu:SubsequentSubmit', 'value' => $this->data['SubsequentSubmit']);
			else $subsequentSubmitArray = array();
			
			// get ZOI
			// get ZOI
			
			$this->data['InvoiceAmount'] = $invoice_amount;
			$this->data['IssueDateTime'] = $dateTime;
			$this->data['InvoiceNumber'] = $invoiceNr;
			$this->data['OperatorTaxNumber'] = $operatorTaxNumber;
			
			$this->zoi = $this->generateZOI();
			
			// set parameters
			// set parameters
			
			$this->msgIdentifier = $this->data['InvoiceNumber'];
			$this->content2SignIdentifier = 'fu:InvoiceRequest';
			
			$this->urlPostHeader = array(
				'Content-Type: text/xml; charset=utf-8',
				'Cache-Control: no-cache',
				'Pragma: no-cache',
				'SOAPAction: /invoices'
			);
			
			// invoice amount
			// invoice amount
			
			$headerInvoice = array(
				'name' => 'fu:Header',
				'childs' => array(
					0 => array(
						'name' => 'fu:MessageID',
						'value' => $messageID
					),
					1 => array(
						'name' => 'fu:DateTime',
						'value' => $dateTime
					),
				)
			);
			$bodyInvoice = array(
				'name' => 'fu:Invoice',
				'childs' => array(
					0 => array(
						'name' => 'fu:TaxNumber',
						'value' => $this->companyTaxNum
					),
					1 => array(
						'name' => 'fu:IssueDateTime',
						'value' => $this->data['IssueDateTime']
					),
					2 => array(
						'name' => 'fu:NumberingStructure',
						'value' => 'B'
					),
					3 => array(
						'name' => 'fu:InvoiceIdentifier',
						'childs' => array(
							0 => array(
								'name' => 'fu:BusinessPremiseID',
								'value' => "P001"
							),
							1 => array(
								'name' => 'fu:ElectronicDeviceID',
								'value' => "N2"
							),
							2 => array(
								'name' => 'fu:InvoiceNumber',
								'value' => $this->data['InvoiceNumber']
							)
						)
					),
					4 => array(
						'name' => 'fu:InvoiceAmount',
						'value' => $this->data['InvoiceAmount']
					),
					5 => array(
						'name' => 'fu:PaymentAmount',
						'value' => $this->data['InvoiceAmount']
					),
					6 => array(
						'name' => 'fu:TaxesPerSeller',
						
						'childs' => array(
							0 => array(
								'name' => 'fu:VAT',
								'childs' => array(
									0 => array(
										'name' => 'fu:TaxRate',
										'value' => '0.0'
									),
									1 => array(
										'name' => 'fu:TaxableAmount',
										'value' => $this->data['InvoiceAmount']
									),
									2 => array(
										'name' => 'fu:TaxAmount',
										'value' => '0.0'
									)
								)
							)
						)
					),
					7 => array(
						'name' => 'fu:OperatorTaxNumber',
						'value' => $this->data['OperatorTaxNumber']
					),
					8 => array(
						'name' => 'fu:ProtectedID',
						'value' => $this->zoi
					),
					9 => $subsequentSubmitArray
				)
			);
							
			// set msg header & body
			// set msg header & body
			
			$headerArray = array(
				'name' => 'soapenv:Header'
			);
			$headerBody = array(
				'name' => 'soapenv:Body',
				'childs' => array(
					0 => array(
						'name' => 'fu:InvoiceRequest',
						'attributes' => array(
							'Id' => $this->msgIdentifier
						),
						'childs' => array(
							0 => $headerInvoice,
							1 => $bodyInvoice
						)
					)
				)
			);
			
			// create msg
			// create msg
			
			$dataArray = array(
				'name' => 'soapenv:Envelope',
				'attributes' => array(
					'xmlns:soapenv'	=> 'http://schemas.xmlsoap.org/soap/envelope/',
					'xmlns:fu' 		=> 'http://www.fu.gov.si/',
					'xmlns:xd' 		=> 'http://www.w3.org/2000/09/xmldsig#',
					'xmlns:xsi'		=> 'http://www.w3.org/2001/XMLSchema-instance'
				),
				'childs' => array(
					0 => $headerArray,
					1 => $headerBody
				)
			);
			
			$this->createXMLMessage($dataArray);
			// override with test xml
			// override with test xml
			// $this->xmlMessage = file_get_contents($this->testXMLPath.'invoice.xml');
		}
		
		public function createInvoiceCancelationMsg($referenceInvoiceAmount, $referenceInvoiceNr, $referenceInvoiceIssueDateTime, $invoiceNr, $operatorTaxNumber)
		{
			// set data
			// set data
			
			$messageID = $this->returnUUID();
			$dateTime = str_replace(' ', 'T', date('Y-m-d H:i:s'));
			// $this->data['subsequent_submit'] => edina možnost je 1
			if(isset($this->data['SubsequentSubmit'])) $subsequentSubmitArray = array('name' => 'fu:SubsequentSubmit', 'value' => $this->data['SubsequentSubmit']);
			else $subsequentSubmitArray = array();
			
			// get ZOI
			// get ZOI
			
			$this->data['InvoiceAmount'] = -$referenceInvoiceAmount;
			$this->data['IssueDateTime'] = $dateTime;
			$this->data['ReferenceInvoiceIssueDatetime'] = $referenceInvoiceIssueDateTime;
			$this->data['InvoiceNumber'] = $invoiceNr;
			$this->data["ReferenceInvoiceNumber"] = $referenceInvoiceNr;
			$this->data['OperatorTaxNumber'] = $operatorTaxNumber;
			
			$this->zoi = $this->generateZOI();
			
			// set parameters
			// set parameters
			
			$this->msgIdentifier = $this->data['InvoiceNumber'];
			$this->content2SignIdentifier = 'fu:InvoiceRequest';
			
			$this->urlPostHeader = array(
				'Content-Type: text/xml; charset=utf-8',
				'Cache-Control: no-cache',
				'Pragma: no-cache',
				'SOAPAction: /invoices'
			);
			
			// invoice amount
			// invoice amount
			
			$headerInvoice = array(
				'name' => 'fu:Header',
				'childs' => array(
					0 => array(
						'name' => 'fu:MessageID',
						'value' => $messageID
					),
					1 => array(
						'name' => 'fu:DateTime',
						'value' => $dateTime
					),
				)
			);
			$bodyInvoice = array(
				'name' => 'fu:Invoice',
				'childs' => array(
					0 => array(
						'name' => 'fu:TaxNumber',
						'value' => $this->companyTaxNum
					),
					1 => array(
						'name' => 'fu:IssueDateTime',
						'value' => $this->data['IssueDateTime']
					),
					2 => array(
						'name' => 'fu:NumberingStructure',
						'value' => 'B'
					),
					3 => array(
						'name' => 'fu:InvoiceIdentifier',
						'childs' => array(
							0 => array(
								'name' => 'fu:BusinessPremiseID',
								'value' => "P001"
							),
							1 => array(
								'name' => 'fu:ElectronicDeviceID',
								'value' => "N2"
							),
							2 => array(
								'name' => 'fu:InvoiceNumber',
								'value' => $this->data['InvoiceNumber']
							)
						)
					),
					4 => array(
						'name' => 'fu:InvoiceAmount',
						'value' => $this->data['InvoiceAmount']
					),
					5 => array(
						'name' => 'fu:PaymentAmount',
						'value' => $this->data['InvoiceAmount']
					),
					6 => array(
						'name' => 'fu:TaxesPerSeller',
						'childs' => array(
							0 => array(
								'name' => 'fu:VAT',
								'childs' => array(
									0 => array(
										'name' => 'fu:TaxRate',
										'value' => '0.0'
									),
									1 => array(
										'name' => 'fu:TaxableAmount',
										'value' => $this->data['InvoiceAmount']
									),
									2 => array(
										'name' => 'fu:TaxAmount',
										'value' => '0.0'
									)
								)
							)
						)
					),
					7 => array(
						'name' => 'fu:OperatorTaxNumber',
						'value' => $this->data['OperatorTaxNumber']
					),
					8 => array(
						'name' => 'fu:ProtectedID',
						'value' => $this->zoi
					),
					9 => array(
					    'name' => 'fu:ReferenceInvoice',
					    'childs' => array(
							0 => array(
								'name' => 'fu:ReferenceInvoiceIdentifier',
								'childs' => array(
        							0 => array(
        								'name' => 'fu:BusinessPremiseID',
        								'value' => "P001"
        							),
        							1 => array(
        								'name' => 'fu:ElectronicDeviceID',
        								'value' => "N2"
        							),
        							2 => array(
        								'name' => 'fu:InvoiceNumber',
        								'value' => $this->data['ReferenceInvoiceNumber']
        							)
        						)
							),
							1 => array(
							    'name' => 'fu:ReferenceInvoiceIssueDateTime',
							    'value' => $this->data['ReferenceInvoiceIssueDatetime']
						    )
						)
					),
					10 => $subsequentSubmitArray
				)
			);
							
			// set msg header & body
			// set msg header & body
			
			$headerArray = array(
				'name' => 'soapenv:Header'
			);
			$headerBody = array(
				'name' => 'soapenv:Body',
				'childs' => array(
					0 => array(
						'name' => 'fu:InvoiceRequest',
						'attributes' => array(
							'Id' => $this->msgIdentifier
						),
						'childs' => array(
							0 => $headerInvoice,
							1 => $bodyInvoice
						)
					)
				)
			);
			
			// create msg
			// create msg
			
			$dataArray = array(
				'name' => 'soapenv:Envelope',
				'attributes' => array(
					'xmlns:soapenv'	=> 'http://schemas.xmlsoap.org/soap/envelope/',
					'xmlns:fu' 		=> 'http://www.fu.gov.si/',
					'xmlns:xd' 		=> 'http://www.w3.org/2000/09/xmldsig#',
					'xmlns:xsi'		=> 'http://www.w3.org/2001/XMLSchema-instance'
				),
				'childs' => array(
					0 => $headerArray,
					1 => $headerBody
				)
			);
			
			$this->createXMLMessage($dataArray);
			// override with test xml
			// override with test xml
			// $this->xmlMessage = file_get_contents($this->testXMLPath.'invoice.xml');
		}
		
		private function createXMLMessage($dataArray)
		{
			$dom = new DOMDocument('1.0', 'UTF-8');
			$child = $this->generateXMLMessageFromArray($dom, $dataArray);
			if($child) $dom->appendChild($child);
			$dom->formatOutput = true;
			$this->xmlMessage = $dom->saveXML();
		}
		
		private function generateXMLMessageFromArray($dom, $dataArray)
		{
			if(empty($dataArray['name'])) return false;
			
			// Create the element
			// Create the element
			
			$element_value = (!empty( $dataArray['value'] ) ) ? $dataArray['value'] : null;
			$element = $dom->createElement($dataArray['name'], $element_value);
			
			// Add any attributes
			// Add any attributes
			
			if (!empty($dataArray['attributes']) && is_array($dataArray['attributes']))
			{
				foreach ($dataArray['attributes'] as $attribute_key => $attribute_value)
				{
					$element->setAttribute($attribute_key, $attribute_value);
				}
			}
			
			// Any other items in the data array should be child elements
			// Any other items in the data array should be child elements
			
			if(isset($dataArray['childs']))
			{
				foreach ($dataArray['childs'] as $data_key => $child_data)
				{
					if (!is_numeric($data_key)) continue;
						
					$child = $this->generateXMLMessageFromArray($dom, $child_data);
					if($child) $element->appendChild( $child );
				}
			}
			
			
			return $element;
		}
		
		public function generateZOI()
		{
			// set data
			// set data
			
			// IssueDateTime in xml scheme is	YYYY-MM-DDTHH:MM:SS
			// IssueDateTime in zoi is 			DD.MM.YYYY HH:MM:SS
			
			$businessPremiseID = 'P001';
			$electronicDeviceID = 'N2';
			$newIssueDateTime = date("d.m.Y H:i:s", strtotime($this->data['IssueDateTime']));
			$signData = $this->companyTaxNum . $newIssueDateTime . $this->data['InvoiceNumber'] . $businessPremiseID . $electronicDeviceID . $this->data['InvoiceAmount'];
			
			// create signature
			// create signature
			
			$key = openssl_pkey_get_private('file://'.$this->myCertificatePathPem, $this->myCertificatePassword);
			openssl_sign($signData, $signature, $key, OPENSSL_ALGO_SHA256);
			openssl_free_key($key);
			
			return md5($signature);
		}
		
		function returnUUID()
		{
			// in case of PHP 7 use random_bytes
			// $data = random_bytes(16);
			$data = openssl_random_pseudo_bytes(16);
			assert(strlen($data) == 16);
		
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
		
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}
		
		// alternative UUID generation :: mt_srand is a simulation of a random generated numbers - though good enough for fiscal confirmation purposes
		// alternative UUID generation :: mt_srand is a simulation of a random generated numbers - though good enough for fiscal confirmation purposes
		
		private function returnUUID2()
		{
			mt_srand(crc32(serialize(microtime(true))));
				
			return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
				// 32 bits for "time_low"
				mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
	
				// 16 bits for "time_mid"
				mt_rand( 0, 0xffff ),
	
				// 16 bits for "time_hi_and_version",
				// four most significant bits holds version number 4
				mt_rand( 0, 0x0fff ) | 0x4000,
	
				// 16 bits, 8 bits for "clk_seq_hi_res",
				// 8 bits for "clk_seq_low",
				// two most significant bits holds zero and one for variant DCE1.1
				mt_rand( 0, 0x3fff ) | 0x8000,
	
				// 48 bits for "node"
				mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
			);
		}
		
		public function signDocument()
		{
			if(strlen($this->content2SignIdentifier) == 0) return;
			// get content to sign
			// get content to sign
			
			$doc = new DOMDocument('1.0', 'UTF-8');
			$doc->loadXML($this->xmlMessage);
			$xpath = new DOMXPath($doc);
			$nodeset = $xpath->query("//$this->content2SignIdentifier")->item(0);
			
			// sign
			// sign
			$objXMLSecDSig = new XMLSecurityDSig('');
			$objXMLSecDSig->setCanonicalMethod(XMLSecurityDSig::C14N);
			$objXMLSecDSig->addReference($nodeset,
					XMLSecurityDSig::SHA256,
					array('http://www.w3.org/2000/09/xmldsig#enveloped-signature'),
					array('id_name' => 'Id', 'uri' => $this->msgIdentifier, 'overwrite' => false)
			);
			
			openssl_pkcs12_read(file_get_contents($this->myCertificatePathP12), $raw, $this->myCertificatePassword);
			
			$objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, array('type' => 'private'));
			$objKey->loadKey($raw['pkey']);
			$objXMLSecDSig->sign($objKey, $nodeset);
			$objXMLSecDSig->add509Cert($raw['cert'], true, false,
					array('issuerSerial' => true, 'subjectName' => true, 'issuerCertificate' => false)
			);
			
			$this->xmlMessage = $doc->saveXML();
		}
		
		public function postXML2Furs()
		{
		    $response = array();
			$this->signDocument();
			
			$conn = curl_init();
			$settings = array(
				CURLOPT_URL => $this->url2post,
				CURLOPT_FRESH_CONNECT => true,
				CURLOPT_CONNECTTIMEOUT_MS => 3000,
				CURLOPT_TIMEOUT_MS => 3000,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => 1,
				CURLOPT_HTTPHEADER => $this->urlPostHeader,
				CURLOPT_POSTFIELDS => $this->xmlMessage,
				CURLOPT_SSL_VERIFYHOST => 2,
				CURLOPT_SSL_VERIFYPEER => true,
				CURLOPT_SSLCERT => $this->myCertificatePathPem,
				CURLOPT_SSLCERTPASSWD => $this->myCertificatePassword,
				CURLOPT_CAINFO => $this->fursCertificatePath
			);
			
			curl_setopt_array($conn, $settings);
			$this->fursResponse = curl_exec($conn);
			
			if ($this->fursResponse){
				// only in case of sending the invoice
				// only in case of sending the invoice
				
				if(isset($this->data['InvoiceNumber'])){
					$doc = new DOMDocument('1.0', 'UTF-8');
					$doc->loadXML($this->fursResponse);
						
					$xpath = new DOMXPath($doc);
					$errorMsg = $xpath->query("//fu:ErrorCode");
					if ($errorMsg->length == 0){
    					$nodeset = $xpath->query("//fu:UniqueInvoiceID")->item(0);
    					$this->eor = $nodeset->nodeValue;
    					$response["error"] = false;
    					$response["eor"] = $this->eor;
    					$response["zoi"] = $this->zoi;
					}else{
					    $response["error"] = true;
					    $response["errorMsg"] = $xpath->query("//fu:ErrorMessage")->item(0)->nodeValue;
					}
				}else if (isset($this->data["businessID"])){
				    $doc = new DOMDocument('1.0', 'UTF-8');
					$doc->loadXML($this->fursResponse);
						
					$xpath = new DOMXPath($doc);
					$errorMsg = $xpath->query("//fu:ErrorCode");
					if ($errorMsg->length == 0){
					    $response["error"] = false;
					}else{
					    $response["error"] = true;
					    $response["errorMsg"] = $xpath->query("//fu:ErrorMessage")->item(0)->nodeValue;
					}
				}
				return $response;
			}
			else{ 
			    $response["error"] = true;
				return $response;
			};
			curl_close($conn);
		}
		
		private function md52dec($hex)
		{
			$dec = 0;
			$len = strlen($hex);
			for ($i = 1; $i <= $len; $i++) {
				$dec = bcadd($dec, bcmul(strval(hexdec($hex[$i - 1])), bcpow('16', strval($len - $i))));
			}
			return $dec;
		}
		
		public function generateQR()
		{
			// generate only in case of invoice declaration
			// generate only in case of invoice declaration
			
			if(!isset($this->data['IssueDateTime'])) return;
			
			// QR code is made of:
			// 39 chars of decimal ZOI code
			// 8  chars of company's tax num
			// 12 chars of invoice's date & time
			// 1  char is a control number
			// ZOI decimal number
			// ZOI decimal number
			
			$zoiDecimal = $this->md52dec($this->zoi);
			
			//if shorter than 39 chars add zeros
			//if shorter than 39 chars add zeros
			
			$zeros2Add = 39 - strlen($zoiDecimal);
			for($i = 0; $i < $zeros2Add; $i++) $zoiDecimal = '0'.$zoiDecimal;
			
			// DATETIME number
			// DATETIME number
			
			$tmpNum = explode('T', $this->data['IssueDateTime']);
			$tmpDate = explode('-', $tmpNum[0]);
			
			$dateTimeNumber = substr($tmpDate[0], 2);
			$dateTimeNumber .= $tmpDate[1];
			$dateTimeNumber .= $tmpDate[2];
			$dateTimeNumber .= $tmpNum[1];
			$dateTimeNumber = str_replace(':', '', $dateTimeNumber);
			
			$invoice_year = $tmpDate[0];
			// calculate controll number
			// calculate controll number
			
			$qrCode = $zoiDecimal.$this->companyTaxNum.$dateTimeNumber;
			$controlChar =  array_sum(str_split($qrCode)) % 10;
			
			// get QR code
			// get QR code
			
			$qrCode = $qrCode.$controlChar;
			QRcode::png($qrCode, $this->qrDirPath.'qr-'.$invoice_year.'-'.$this->data['InvoiceNumber'].'.png');
		}
		
		/*
		 * QR manipulation, for testing purposes; as it is called from outside it can be arbitrarily changed
		 */
		
		public function generateQRTest($id_invoice)
		{
			/*
			$this->zoi = ...;
			$dateTime = ...;
			$invoiceNumber = ...;
			$this->data = array('IssueDateTime' => $dateTime, 'InvoiceNumber' => $invoiceNumber);
			$this->generateQR();
			*/
		}
		
		public function getZOI()
		{
			return $this->zoi;
		}
		
		public function getEOR()
		{
			return $this->eor;
		}
		
		public function getFURSResponse()
		{
			return $this->fursResponse;
		}
		
		public function echoXML()
		{
			$this->signDocument();
			
			header('Content-Type: text/xml; charset=utf-8', true);
			echo $this->xmlMessage;
		}
	}
?>