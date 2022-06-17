# Overview

The Authorization Gateway is designed to accommodate various input requirements based on a given terminal’s settings. This allows for the development of a single interface that can be easily configured to handle many different scenarios.

The Authorization Gateway uses web services to present distributed methods for integration into client applications, and an interface with the Authorization Gateway can be developed with any programming language that can consume a web service.

Extensible Markup Language (XML) is used to send data packet requests to the Authorization Gateway and to receive a response back. Simple Object Access Protocol (SOAP) is used for XML message exchange over HTTPS. The Authorization Gateway also employs a custom SOAP header for authentication information.

XML Schema Definitions (XSDs) are used by the Authorization Gateway to validate data packet requests sent by the client. Each terminal will be assigned a published XSD based on the terminal settings. If a data packet request does not conform to its assigned XSD a failed Validation Message response will be returned, otherwise the data packet will be processed as requested.

### **Table of Contents**
1. [Overview](Process.md#overview)	 
2. [Connection Method](Process.md#connection-method)
3. [Submission](Process.md#submissions)
     - [SOAP Header](Process.md#soap-header)
4. [Web Methods](Process.md#web-methods)
     - [Certification Methods](Process.md#certification-methods)
     	- [Certification Web Methods](Process.md#certification-methods)
      		- [GetCertificationTerminalSetttings](Process.md#getcertificationterminalsettings)
      		- [AuthGatewayCertification](Process.md#authgatewaycertification)
      		- [ProcessSingleCertificationCheck](Process.md#processsinglecertificationcheck)
     	- [Certification Web Methods when using Tokens](Process.md#certification-web-methods-when-using-tokens)
	      	- [GetCertificationTerminalSettings](Process.md#getcertificationterminalsettings-1)
	      	- [AuthGatewayCertification](Process.md#authgatewaycertification-1)
	      	- [ProcessSingleCertificationCheckWithToken](Process.md#processsinglecertificationcheckwithtoken)
	      	- [GetCertificationToken](Process.md#getcertificationtoken)
	      	- [ParseCertificationMICR](Process.md#parsecertificationmicr)
     - [Production Methods](Process.md#production-methods)
     	- [Production Web Methods](Process.md#production-web-methods)
	      	- [GetTerminalSettings](Process.md#getterminalsettings)
	      	- [ProcessSingleCheck](Process.md#processsinglecheck)
	      	- [GetArchivedResponse](Process.md#getarchivedresponse)
     	- [Production Web Methods when using Tokens](Process.md#production-web-methods-when-using-tokens)
	      	- [ProcessSingleCheckWithToken](Process.md#processsinglecheckwithtoken)
	      	- [GetToken](Process.md#gettoken)
	      	- [ParseMICR](Process.md#parsemicr)
5. [Data Packet - XML Specification](Process.md#data-packet--xml-specification)
     - [Terminal Settings - XML Specification](Process.md#terminal-settings---xml-specification)
     - [Authorization Gateway XML Data Packet Example](Process.md#authorization-gateway-xml-data-packet-example)
     - [Authorization Gateway XML Data Packet with Token Example](Process.md#authorization-gateway-xml-data-packet-with-token-example)
6. [How to determine which XML & XDS Template to Use](Process.md#how-to-determine-which-xml--xsd-template-to-use)
     - [Standard XML & XSD Templates](Process.md#standard-templates)  
		- [PPD Templates](Process.md#ppd-templates)  
		- [CCD Templates](Process.md#ccd-templates)  
		- [WEB Templates](Process.md#web-templates)  
		- [TEL Templates](Process.md#tel-templates)  
		- [POP Templates](Process.md#pop-templates)  
		- [Check21 Templates](Process.md#check21-templates)  
		- [BOC Templates](Process.md#boc-templates)  
     - [OCR XML Templates](Process.md#ocr-xml-templates)  
		- [POP Templates](Process.md#pop-xml-templates)  
		- [Check21 Templates](Process.md#check21-xml-templates)
		- [Templates for Mobile](Process.md#templates-for-mobile) 
			- [Pop Templates for Mobile](Process.md#pop-xml-teamplates-for-mobile)  
			- [Check21 Templates for Mobile](Process.md#check21-xml-templates-for-mobile)
7. [Data Types](Process.md#data-types)
8. [Validation Handling](Process.md#validation-handling)
9. [Responses](Process.md#responses)
     - [Validation Messages Response](Process.md#validation-message-response)
     	- [Validation Message Example - Success Response](Process.md#validation-message-response)
     	- [Validation Message Example - Failure Response](Process.md#validation-message-example--failure-response)
     - [Authorization Message Response](Process.md#authorization-message-response)
     	- [Authorization Message Example](Process.md#authorization-message-example)
     	- [Process Single Certification Check - Authorization](Process.md#process-single-certification-check--authorization)
     - [Authorization Message Response with Token](Process.md#authorization-message-response-with-token)
     	- [Authorization Message Example with Token](Process.md#authorization-message-example-with-token)
			
10. [Single Certification Check Types](Process.md#single-certification-check-types)		
     - [Process Single Certification Check - Check Limit Exceeded](Process.md#check-limit-exceeded)
     - [Process Single Certification Check - Decline](Process.md#decline)
     - [Process Single Certification Check - Void](Process.md#void)
     - [Process Single Certification Check - Reversal](Process.md#reversal)
     - [Process Single Certification Check - Credit](Process.md#credit)
     - [Process Single Certification Check - Manager Needed](Process.md#manager-needed)
     - [Process Single Certification Check - Represented Check](Process.md#represented-check)
     - [Process Single Certification Check - No ACH](Process.md#no-ach)
     - [Process Single Certification Check - MICR ERROR](Process.md#micr-error)
11. [Exception Handling](Process.md#exception-handling)
     - [EXCEPTION Element - Example as a child of the RESPONSE element](Process.md#exception-element--example-as-a-child-of-the-response-element)
12. [Request an Archived Response](Process.md#request-an-archived-response)
13. [Sample Code](Process.md#sample-code)     
	- [VB.NET](Process.md#vbnet)
	- [C#](Process.md#c)
	- [SOAP Message Sample](Process.md#soap-message-sample)
14. [Code Sample Kits](Process.md#code-sample-kits)
15. [Contact Information](Process.md#contact-information)


# **Connection Method**
Paya Services supports connection via secure (https) webservice using SOAP.  SOAP is a simple XML-based protocol to let applications exchange information over HTTP.  The webservice address used for certification and testing is as follows:

https://demo.eftchecks.com/webservices/AuthGateway.asmx

A username and password for certification will be provided.

NOTE: A production webservice address, user name, and password will be supplied upon successful certification.

# **Submissions**

The Authorization Gateway has been designed for fast and easy integration with your existing system. Simply request the Terminal Settings, complete the returned xml data packet template, and return it to the Authorization Gateway for processing. To accomplish this Authorization Gateway provides web methods for certification and for production. In addition, each web method contains a custom SOAP header used for authentication.

## **SOAP Header**
The SOAP header contains the following fields:
|                   |                |                                                                                                                                                                    |
|-------------------|----------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|    **UserName**      |     String     |     Username   provided by Paya Services for authorization.                                                                                                        |
|     **Password**      |     String     |     Password   provided by Paya Services for authorization.                                                                                                        |
|     **TerminalID**    |     Integer    |     Unique to   each terminal used.  Provided by Paya   Services at time of terminal approval.    Terminal IDs for certification are provided in this document.    |

**Example:** 
```XML
<soap:Header>
   <AuthGatewayHeader xmlns=”http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway”>
      <UserName>GATEWAYUserName</UserName>
      <Password>GATEWAYPassword</Password>
      <TerminalID>1210</TerminalID>
   </AuthGatewayHeader>
</soap:Header>
```

# **Web Methods**
A definition of the web methods can be found below. Each web method contains a hyperlink to a sample SOAP request and response.

## **Certification Methods**

Before you are able to go into production, Paya Services requires that you cerify your solution using the follow web methods. These methods do not create live transactions with in the banking system but allow you to setup your solution for testing and ceritifying purposes.

### **Certification Web Methods** 


- #### [**GetCertificationTerminalSettings**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationTerminalSettings.md)
  - **Description**: This method will return the Terminal Settings for a certification Terminal. This method is used during interface testing and certification.
   - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationTerminalSettings.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationTerminalSettings.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationTerminalSettings.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationTerminalSettings.md#response-1)

- #### [**AuthGatewayCertification**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md)	
  - **Description**:  This method will validate that the interface is sending a data packet that conforms to its schema and is used during interface testing and certification.
   - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods//AuthGatewayCertification.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#response-1)

- #### [**ProcessSingleCertificationCheck**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheck.md)
  - **Description**:  This method will run the authorization for a single certification check based on the settings for the provided certification terminal. A list of the valid certification routing numbers and their purpose is below.  This method is used during interface testing and certification.
  
  |     Routing   Number    |     Purpose                 |
  |-------------------------|-----------------------------|
  |     490000018           |     Authorization           |
  |     490000034           |     Decline                 |
  |     490000021           |     Manager   Needed        |
  |     490000047           |     Re-Presented   Check    |
  |     490000050           |     No   ACH                |
  |     490000015           |     MICR   ERROR            |

  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheck.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheck.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheck.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheck.md#response-1)

## **Certification Web Methods when using Tokens**
Definition using tokens and hyperlink to samples of SOAP request and response.

- #### [**GetCertificationTerminalSettings**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationTerminalSettings.md)
  - **Description**: This method will return the Terminal Settings for a certification Terminal. This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods//AuthGatewayCertification.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#response-1)

- #### [**AuthGatewayCertification**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md)
  - **Description**:  This method will validate that the interface is sending a data packet that conforms to its schema and is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods//AuthGatewayCertification.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/AuthGatewayCertification.md#response-1)

- #### [**ProcessSingleCertificationCheckWithToken**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheckWithToken.md)
  - **Description**:  This method will run the authorization for a single certification check based on the settings for the provided certification terminal using either, a given Token or the Account Type, Routing Number, and Account Number. A list of the valid certification routing numbers and their purpose is below.  This method is used during interface testing and certification.

  |     Routing Number    |     Token                               |     Purpose               |
  |-----------------------|-----------------------------------------|---------------------------|
  |     490000018         |     05944FB3E1DA4663868455AF630F45BE    |     Authorization         |
  |     490000034         |     15944FB3E1DA4663868455AF630F45BE    |     Decline               |
  |     490000021         |     25944FB3E1DA4663868455AF630F45BE    |     Manager Needed        |
  |     490000047         |     35944FB3E1DA4663868455AF630F45BE    |     Re-Presented Check    |

  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheckWithToken.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheckWithToken.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheck.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheckWithToken.md#response-1)

_NOTE: Using this method by passing the Account Type, Routing Number, and Account Number will create a TOKEN and pass it back in the Authorization Message Response. If a TOKEN already exists for the Account Type, Routing Number, and Account Number, the current TOKEN will be passed back in the Authorization Message Response._

- #### [**GetCertificationToken**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationToken.md)
  - **Description**: This method will return a Token for the Account Type, Routing Number, and Account Number.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationToken.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationToken.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationToken.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationToken.md#response-1)
  -  
- #### [**ParseCertificationMICR**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseCertificationMICR.md)
  - **Description**: This method will return an Account Type, Routing Number and Account Number.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseCertificationMICR.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseCertificationMICR.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseCertificationMICR.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseCertificationMICR.md#response-1)

## Production Methods

Once you have **certified** with our Paya Services team you will need to used the Production Methods listed below to create live transaction within the banking system.

### **Production Web Methods** 
Definition and hyperlink to sample SOAP request and response.

- #### [**GetTerminalSettings**](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetTerminalSettings.md)
  - **Replaces**: [**GetCertificationTerminalSettings**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationTerminalSettings.md)
  - **Description**: This method will return the Terminal Settings for a terminal.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetTerminalSettings.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetTerminalSettings.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetTerminalSettings.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetTerminalSettings.md#response-1)

- #### [**ProcessSingleCheck**](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheck.md)
  - **Replaces**: [**ProcessSingleCertificationCheck**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheck.md)
  - **Description**:  This method will run the authorization for a single check based on the settings for the terminal.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheck.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheck.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheck.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheck.md#response-1)

- #### [**GetArchivedResponse**](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetArchivedResponse.md)
  - **Description**:  This method will retrieve a response for a previously processed transaction.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetArchivedResponse.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetArchivedResponse.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetArchivedResponse.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetArchivedResponse.md#response-1)

## **Production Web Methods when using Tokens**
Definition using tokens and hyperlink to a sample SOAP request and response.

- #### [**ProcessSingleCheckWithToken**](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheckWithToken.md)
  - **Replaces**: [**ProcessSingleCertificationCheckWithToken**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ProcessSingleCertificationCheckWithToken.md)
  - **Description**:  This method will run the authorization for a single check based on the settings for the terminal using either, a given Token or the Account Type, Routing Number, and Account Number.
   - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheckWithToken.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheckWithToken.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheckWithToken.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ProcessSingleCheckWithToken.md#response-1)

_NOTE: Using this method by passing the Account Type, Routing Number, and Account Number will create a TOKEN and pass it back in the Authorization Message Response. If a TOKEN already exists for the Account Type, Routing Number, and Account Number, the current TOKEN will be passed back in the Authorization Message Response._


- #### [**GetToken**](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetToken.md)
  - **Replaces**: [**GetCertificationToken**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/GetCertificationToken.md)
  - **Description**:  This method will return a Token for the Account Type, Routing Number, and Account Number.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetToken.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetToken.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetToken.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Production%20Methods/GetToken.md#response-1)

- #### [**ParseMICR**](/Authorization%20Gateway/Web%20Methods/Production%20Methods/ParseMICR.md)
  - **Replaces**: [**ParseCertificationMICR**](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseCertificationMICR.md)
  - **Description**:  This method will return an Account Type, Routing Number and Account Number.
  - **Request**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseMICR.md#request) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseMICR.md#request-1)
  - **Response**: [SOAP 1.1](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseMICR.md#response) | [SOAP 1.2](/Authorization%20Gateway/Web%20Methods/Certification%20Methods/ParseMICR.md#response-1)

## **Terminal Settings - XML Specification**

The GetCertificationTerminalSettings and GetTerminalSettings web methods will return the following XML string.

```XML
<?xml version=”1.0” encoding=”utf-8”?>
<TERMINAL_SETTINGS xmlns:xsi=”http://www.w3.org/2001/XMLSchema-instance” xmlns:xsd=”http://www.w3.org/2001/XMLSchema”>
  <TERMINAL_ID>2318</TERMINAL_ID>
  <SEC_CODE>WEB</SEC_CODE>
  <IS_GATEWAY_TERMINAL>true</IS_GATEWAY_TERMINAL>
  <ALLOW_CNSMR_CREDITS>false</ALLOW_CNSMR_CREDITS>
  <DL_REQUIRED>false</DL_REQUIRED>
  <RUN_CHECK_VERIFICATION>false</RUN_CHECK_VERIFICATION>
  <RUN_IDENTITY_VERIFICATION>false</RUN_IDENTITY_VERIFICATION>
  <SCHEMA_FILE_PATH>http://localhost/geti.emagnus.webservices/Schemas/WEB/Ng_CheckNoVerificationDLOptional.xsd</SCHEMA_FILE_PATH>
  <XML_TEMPLATE_PATH>http://localhost/geti.emagnus.webservices/Schemas/WEB/Templates/CheckNoVerificationDLOptional.xml</XML_TEMPLATE_PATH>
</TERMINAL_SETTINGS>
```
The Terminal Settings XML will contain the following elements:
|                                  |                                                                                                                                                                        |
|----------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     TERMINAL_SETTINGS            |     Is the parent   element and contains all other elements within the Terminal Settings XML   document.                                                               |
|     TERMINAL_ID                  |     Contains the ID   for the terminal. The Terminal ID will be numeric value.                                                                                         |
|     SEC_CODE                     |     Contains the   Standard Entry Class. This will either be Ck21, PPD, CCD, POP, TEL, or WEB.                                                                         |
|     IS_GATEWAY_TERMINAL          |     Contains true or   false indicating if the Terminal is a gateway terminal or not.                                                                                  |
|     DL_REQUIRED                  |     Contains true or   false indicating if the terminal requires the driver’s license state and   number is to be included in the data packet request.                 |
|     RUN_CHECK_VERIFICATION       |     Contains true or   false indicating if the terminal is setup for check verification.                                                                               |
|     RUN_IDENTITY_VERIFICATION    |     Contains true or   false indicating if the terminal is setup for identity verification.                                                                            |
|     SCHEMA_FILE_PATH             |     Contains the   Uniform Resource Identifier (URI) specifying the published XML Schema Definition   (XSD) that the data packet request will be validated against.    |
|     XML_TEMPLATE_PATH            |     Contains the   Uniform Resource Identifier (URI) specifying the published XML template that   can be used as the basis for creating the data packet request.       |



## <a name="DataPacketXMLSpecification"></a>**Data Packet – XML Specification**
The data packet is an XML string sent using the AuthGatewayCertification, ProcessSingleCheck, and ProcessSingleCheckWithToken web methods. The XML data packet must conform to the XSD specified in the Terminal Settings. The XML Template provided in the Terminal Settings can be used as a basis to create the Data Packet.

_NOTE:  Methods with Token will operate the same as those without tokens. Tokens are used in place of Account Type, Routing Number, and Account Number._



### **Authorization Gateway XML Data Packet Example**:




This XML data packet example contains all available elements. The elements and data types that are required for a specific terminal are defined in that terminal’s XSD.
```XML
<?xml version=”1.0” encoding=”utf-8”?>
<AUTH_GATEWAY REQUEST_ID=”4654”>
  <TRANSACTION>
    <TRANSACTION_ID>0a4f529d-70fd-4ddb-b909-b5598dc07579</TRANSACTION_ID>
    <MERCHANT>
      <TERMINAL_ID>1113</TERMINAL_ID>
    </MERCHANT>
    <PACKET>
      <IDENTIFIER>A</IDENTIFIER>
      <CONTROL_CHAR>S</CONTROL_CHAR>
      <VERIFICATION_ONLY>false</VERIFICATION_ONLY>
      <ACCOUNT>
        <MICR_DATA>T490000018T 24413815O 4456</MICR_DATA>
        <ROUTING_NUMBER>490000018</ROUTING_NUMBER>
        <ACCOUNT_NUMBER>24413815</ACCOUNT_NUMBER>
        <CHECK_NUMBER>4456</CHECK_NUMBER>
        <ACCOUNT_TYPE>Checking</ACCOUNT_TYPE>
      </ACCOUNT>
      <CONSUMER>
        <FIRST_NAME>Test</FIRST_NAME>
        <LAST_NAME>Guy</LAST_NAME>
        <ADDRESS1>1001 Test Ave.</ADDRESS1>
        <ADDRESS2>#200</ADDRESS2>
        <CITY>Destin</CITY>
        <STATE>FL</STATE>
        <ZIP>32540</ZIP>
        <PHONE_NUMBER>2345678912</PHONE_NUMBER>
        <DL_STATE>FL</DL_STATE>
        <DL_NUMBER>D12346544</DL_NUMBER>
        <COURTESY_CARD_ID></COURTESY_CARD_ID>
        <IDENTITY>
	  <SSN></SSN>
          <DOB_YEAR>1961</DOB_YEAR>
        </IDENTITY>
      </CONSUMER>
      <CHECK>
        <CHECK_AMOUNT>1.25</CHECK_AMOUNT>
        <IMAGE_FRONT />
        <IMAGE_BACK />
      </CHECK>
      <CUSTOM>
        <CUSTOM1></CUSTOM1>
        <CUSTOM2></CUSTOM2>
        <CUSTOM3></CUSTOM3>
        <CUSTOM4></CUSTOM4>
      </CUSTOM>
    </PACKET>
  </TRANSACTION>
</AUTH_GATEWAY>
```
The Authorization Gateway XML data packet may contain the following elements:

|                            |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    |
|----------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     AUTH_GATEWAY:          |      Is the parent   element and contains all other elements within the Auth Gateway Request XML   document.                                                                                                                                                                                                                                                                                                                                                                       |
|     REQUEST_ID:            |      Is an optional   attribute that contains a unique user defined ID to identify the   authorization gateway request. The Request ID will be returned in the   Authorization Gateway response.  It   only persists with that specific connection and once the authorization is   returned it is gone.   The purpose of this attribute is to link the   authorization request with the returned response and to provide a “lookup”   value for the GetArchivedResponse method.    |
|     TRANSACTION:           |     Contains   all of the elements for a given transaction.                                                                                                                                                                                                                                                                                                                                                                                                                        |
|     TRANSACTION_ID:        |     Is   an optional element that contains a unique user defined ID to identify the   transaction. The Transaction ID will be returned in the Authorization Gateway   response.                                                                                                                                                                                                                                                                                                    |
|     MERCHANT:              |     Contains   all of the elements for the merchant.                                                                                                                                                                                                                                                                                                                                                                                                                               |
|     TERMINAL_ID:           |     Contains   the ID for the Terminal. The Terminal ID will be numeric value.                                                                                                                                                                                                                                                                                                                                                                                                     |
|     PACKET:                |     Contains   all of the elements for packet.                                                                                                                                                                                                                                                                                                                                                                                                                                     |
|     IDENTIFIER:            |     Contains   a value that identifies the packet being sent as an Authorization, Void,   Override, or Payroll transaction. The identifier is a single alpha character.   A list   of identifiers follows, but valid identifiers will vary by schema.   A=Authorize, R=Recurring, V=Void, F = Reversal, O=Override, P=Payroll,   U=Update                                                                                                                                          |
|     NOTE:                  |     Identifier   R (Recurring) is in name only. We will NOT run the transaction more than   once.                                                                                                                                                                                                                                                                                                                                                                                  |
|     CONTROL_CHAR:          |     Contains   a value that identifies the information in the packet as being entered   manually or retrieved from a check reader.    Valid   control characters are as follows: M=Manual, S=Swipe.                                                                                                                                                                                                                                                                                |
|     VERIFICATION_ONLY:     |     Contains   a true or false value identifying if the transaction should be processed as   verification only.  NOTE: The Boolean   data type in the XSD will require that true/false be all lower case.                                                                                                                                                                                                                                                                          |
|     ACCOUNT:               |     Contains   all of the elements for a given account.                                                                                                                                                                                                                                                                                                                                                                                                                            |
|     MICR_DATA:             |     Contains   the MICR data read from a check reader.    The MICR   Datacan be up to 200 characters including the following:  0-9, T, O, -, D, A, $, U, :, <, ;, =, b,   o, t.                                                                                                                                                                                                                                                                                                    |
|     ROUTING_NUMBER:        |      Contains the keyed   in 9 digit routing   number.                                                                                                                                                                                                                                                                                                                                                                                                                             |
|     ACCOUNT_NUMBER:        |     Contains   the keyed in account number. Valid account   numbers should be between 3 and 17 numeric characters.                                                                                                                                                                                                                                                                                                                                                                 |
|     CHECK_NUMBER:          |     Contains   the keyed in check number. Valid check   numbers should be between 1 and 15 characters.                                                                                                                                                                                                                                                                                                                                                                             |
|     ACCOUNT_TYPE:          |     Contains   the type of account. Valid   valuesare Checking or Savings.                                                                                                                                                                                                                                                                                                                                                                                                         |
|     CONSUMER:              |     Contains   all of the elements for a given consumer.                                                                                                                                                                                                                                                                                                                                                                                                                           |
|     FIRST_NAME:            |     Contains   the first name of the consumer.  The First   Namecan be up to 100 alpha characters.                                                                                                                                                                                                                                                                                                                                                                                 |
|     LAST_NAME:             |     Contains   the last name of the consumer. The Last   Namecan be up to 100 alpha characters.                                                                                                                                                                                                                                                                                                                                                                                    |
|     ADDRESS1:              |     Contains   the first line of the consumer’s address. The Address1   can be up to 200 alpha-numeric characters and can include the   following:  # , - , : , ;                                                                                                                                                                                                                                                                                                                  |
|     ADDRESS2:              |     Contains   the second line of the consumer’s address. The Address2   can be up to 200 alpha-numeric characters and can include the   following:  # , - , : , ;                                                                                                                                                                                                                                                                                                                 |
|     CITY:                  |     Contains   the city of the consumer’s address. The Citycan   be up to 50 alpha characters.                                                                                                                                                                                                                                                                                                                                                                                     |
|     STATE:                 |     Contains   the state or province of the consumer’s address. Valid state and province   codes can be found here.                                                                                                                                                                                                                                                                                                                                                                |
|     ZIP:                   |     Contains   the zip code of the consumer’s address.                                                                                                                                                                                                                                                                                                                                                                                                                             |
|     PHONE_NUMBER:          |      Contains the   consumer’s contact phone number. The phone   numberis expected as a 10 digit number without a – or ().                                                                                                                                                                                                                                                                                                                                                         |
|     DL_STATE:              |     Contains   the consumer’s driver’s license state or province code.  Valid state and province codes can be found   here.                                                                                                                                                                                                                                                                                                                                                        |
|     DL_NUMBER:             |     Contains   the consumer’s driver’s license number.    The driver’s   license numbercan be up to 50 alpha-numeric characters.                                                                                                                                                                                                                                                                                                                                                   |
|     COURTESY_CARD_ID:      |     Contains   the consumer’s courtesy card ID. The Courtesy   Card ID can be up to 50 alpha-numeric characters. This is a number   generated by the merchant for the specific customer.                                                                                                                                                                                                                                                                                           |
|     IDENTITY:              |     Contains   all of the possible elements available for identifying the consumer. The   IDENTITY element can only contain one child element. If the XML data packet   template provided in the terminal settings contains more than one child element,   than one element must be populated with a value and the other elements   removed from the XML data packet prior to submitting it to the Authorization   Gateway.                                                        |
|     SSN4:                  |     Contains   the last four digits of the consumer’s social security number. The SSN4   must be 4 numeric characters.                                                                                                                                                                                                                                                                                                                                                             |
|     DOB_YEAR:              |     Contains   the date of birth of the consumer. The date   of birthmust be 4 numeric characters begin with either 19 or 20.                                                                                                                                                                                                                                                                                                                                                      |
|     CHECK:                 |     Contains   all of the elements for the check.                                                                                                                                                                                                                                                                                                                                                                                                                                  |
|     CHECK_AMOUNT:          |     Contains   the amount of the check and should be between $0.01 and $999999.99.                                                                                                                                                                                                                                                                                                                                                                                                 |
|     IMAGE_FRONT:           |     Contains   the image data for the check front. Image data must be base64.                                                                                                                                                                                                                                                                                                                                                                                                      |
|     SIZE:                  |     The   size attribute contains the image size in bytes. The size can be expressed as   a decimal.                                                                                                                                                                                                                                                                                                                                                                               |
|     TYPE:                  |     The   type attribute contains the content type of the image. Valid   TYPE values are “tiff”.                                                                                                                                                                                                                                                                                                                                                                                   |
|     IMAGE_BACK:            |     Contains   the image data for the check back. Image data must be base64.                                                                                                                                                                                                                                                                                                                                                                                                       |
|     SIZE:                  |     The   size attribute contains the image size in bytes. The size can be expressed as   a decimal.                                                                                                                                                                                                                                                                                                                                                                               |
|     TYPE:                  |     The   type attribute contains the content type of the image. Valid   TYPE values are “tiff”.                                                                                                                                                                                                                                                                                                                                                                                   |
|     MRDCIMGCOUNT:          |     This   is an optional element for transactions that have an SEC code of POP or   Check21. NOTE:  Please view POP or Check21   XSD’s for implementation.                                                                                                                                                                                                                                                                                                                        |
|     CUSTOM1- CUSTOM4:      |     These   are optional elements that can contain up to 50 alpha numeric   characters.  We will return this in   reporting.                                                                                                                                                                                                                                                                                                                                                       |
### **Authorization Gateway XML Data Packet with Token Example**:

This XML data packet example contains all available elements. The elements and data types that are required for a specific terminal are defined in that terminal’s XSD.
```XML

<?xml version=”1.0” encoding=”utf-8”?>
<AUTH_GATEWAY REQUEST_ID=”4654”>
  <TRANSACTION>
    <TRANSACTION_ID>0a4f529d-70fd-4ddb-b909b5598dc07579</TRANSACTION_ID>
      <MERCHANT>
	  <TERMINAL_ID>1113</TERMINAL_ID>
      </MERCHANT>
      <PACKET>
	<IDENTIFIER>A</IDENTIFIER>
	<CONTROL_CHAR>S</CONTROL_CHAR>
	<VERIFICATION_ONLY>false</VERIFICATION_ONLY>
	<ACCOUNT>
    	  <TOKEN>05944FB3E1DA4663868455AF630F45BE</TOKEN>
    	  <CHECK_NUMBER>4456</CHECK_NUMBER>
	</ACCOUNT>
	<CONSUMER>
    	  <FIRST_NAME>Test</FIRST_NAME>
 	  <LAST_NAME>Guy</LAST_NAME>
 	  <ADDRESS1>1001 Test Ave.</ADDRESS1>
 	  <ADDRESS2>#200</ADDRESS2>
 	  <CITY>Destin</CITY>
 	  <STATE>FL</STATE>
 	  <ZIP>32540</ZIP>
 	  <PHONE_NUMBER>2345678912</PHONE_NUMBER>
 	  <DL_STATE>FL</DL_STATE>
 	  <DL_NUMBER>D12346544</DL_NUMBER>
 	  <COURTESY_CARD_ID></COURTESY_CARD_ID>
 	  <IDENTITY>
     	    <DOB_YEAR>1961</DOB_YEAR>
     	  </IDENTITY>
   	</CONSUMER>
   	<CHECK>
   	  <CHECK_AMOUNT>1.25</CHECK_AMOUNT>
   	  <IMAGE_FRONT />
   	  <IMAGE_BACK />
   	</CHECK>
	<CUSTOM>
          <CUSTOM1></CUSTOM1>
          <CUSTOM2></CUSTOM2>
          <CUSTOM3></CUSTOM3>
          <CUSTOM4></CUSTOM4>
       	</CUSTOM>
     </PACKET>
  </TRANSACTION>
 </AUTH_GATEWAY>
```
The Authorization Gateway XML data packet may contain the following elements:

|                            |                                                                                                                                                                                                                                                                                                                                                                                                                                |
|----------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     AUTH_GATEWAY:          |     Is   the parent element and contains all other elements within the Terminal   Settings XML document.                                                                                                                                                                                                                                                                                                                       |
|     REQUEST_ID:            |     Is   an optional attribute that contains a unique user defined ID to identify the   authorization gateway request. The Request ID will be returned in the   Authorization Gateway response.                                                                                                                                                                                                                                |
|     TRANSACTION:           |      Contains all of the   elements for a given transaction.                                                                                                                                                                                                                                                                                                                                                                   |
|     TRANSACTION_ID:        |     Is   an optional element that contains a unique user defined ID to identify the   transaction. The Transaction ID will be returned in the Authorization Gateway   response.                                                                                                                                                                                                                                                |
|     MERCHANT:              |     Contains   all of the elements for the merchant.                                                                                                                                                                                                                                                                                                                                                                           |
|     TERMINAL_ID:           |      Contains the ID for   the Terminal. The Terminal ID will be numeric value.                                                                                                                                                                                                                                                                                                                                                |
|     PACKET:                |     Contains   all of the elements for packet.                                                                                                                                                                                                                                                                                                                                                                                 |
|     IDENTIFIER:            |     Contains   a value that identifies the packet being sent as an Authorization, Void,   Override, or Payroll transaction. The identifier is a single alpha character.   A list   of identifiers follows, but valid identifiers will vary by schema.   A=Authorize, R=Recurring, V=Void, F = Reversal, O=Override, P=Payroll                                                                                                  |
|     NOTE:                  |     Identifier   R (Recurring) is in name only. We will NOT run the transaction more than   once.                                                                                                                                                                                                                                                                                                                              |
|     CONTROL_CHAR:          |     Contains   a value that identifies the information in the packet as being entered   manually or retrieved from a check reader.    Valid   control charactersare as follows: M=Manual, S=Swipe.                                                                                                                                                                                                                             |
|     VERIFICATION_ONLY:     |     Contains   a true or false value identifying if the transaction should be processed as   verification only.  NOTE: The Boolean   data type in the XSD will require that true/false be all lower case.                                                                                                                                                                                                                      |
|     ACCOUNT:               |     Contains   all of the elements for a given account.                                                                                                                                                                                                                                                                                                                                                                        |
|     TOKEN:                 |     Contains   a 32 character alphanumeric value all uppercase.  NOTE: This token replaces the account type,   routing number, and account number.                                                                                                                                                                                                                                                                             |
|     CHECK_NUMBER:          |     Contains   the keyed in check number. Valid check   numbers should be between 1 and 15 characters.                                                                                                                                                                                                                                                                                                                         |
|     CONSUMER:              |     Contains   all of the elements for a given consumer.                                                                                                                                                                                                                                                                                                                                                                       |
|     FIRST_NAME:            |     Contains   the first name of the consumer.  The First   Namecan be up to 100 alpha characters.                                                                                                                                                                                                                                                                                                                             |
|     LAST_NAME:             |     Contains   the last name of the consumer. The Last   Namecan be up to 100 alpha characters.                                                                                                                                                                                                                                                                                                                                |
|     ADDRESS1:              |     Contains   the first line of the consumer’s address. The Address1   can be up to 200 alpha-numeric characters and can include the   following:  # , - , : , ;                                                                                                                                                                                                                                                              |
|     ADDRESS2:              |     Contains   the second line of the consumer’s address. The Address2   can be up to 200 alpha-numeric characters and can include the   following:  # , - , : , ;                                                                                                                                                                                                                                                             |
|     CITY:                  |     Contains   the city of the consumer’s address. The City   can be up to 50 alpha characters.                                                                                                                                                                                                                                                                                                                                |
|     STATE:                 |     Contains   the state or province of the consumer’s address. Valid state and province   codes can be found here.                                                                                                                                                                                                                                                                                                            |
|     ZIP:                   |     Contains   the zip code of the consumer’s address.                                                                                                                                                                                                                                                                                                                                                                         |
|     PHONE_NUMBER:          |     Contains   the consumer’s contact phone number. The phone   numberis expected as a 10 digit number without a – or ().                                                                                                                                                                                                                                                                                                      |
|     DL_STATE:              |     Contains   the consumer’s driver’s license state or province code.  Valid state and province codes can be found   here.                                                                                                                                                                                                                                                                                                    |
|     DL_NUMBER:             |     Contains   the consumer’s driver’s license number.    The driver’s   license numbercan be up to 50 alpha-numeric characters.                                                                                                                                                                                                                                                                                               |
|     COURTSEY_CARD_ID:      |     Contains   the consumer’s courtesy card ID. The Courtesy   Card IDcan be up to 50 alpha-numeric characters. This is a number   generated by the merchant for the specific customer.                                                                                                                                                                                                                                        |
|     IDENTITY:              |     Contains   all of the possible elements available for identifying the consumer. The   IDENTITY element can only contain one child element. If the XML data packet   template provided in the terminal settings contains more than one child   element, than one element must be populated with a value and the other   elements removed from the XML data packet prior to submitting it to the   Authorization Gateway.    |
|     SSN4:                  |     Contains   the last four digits of the consumer’s social security number. The SSN4   must be 4 numeric characters.                                                                                                                                                                                                                                                                                                         |
|     DOB_YEAR:              |     Contains   the date of birth of the consumer. The date   of birthmust be 4 numeric characters begin with either 19 or 20.                                                                                                                                                                                                                                                                                                  |
|     CHECK:                 |     Contains   all of the elements for the check.                                                                                                                                                                                                                                                                                                                                                                              |
|     CHECK_AMOUNT:          |     Contains   the amount of the check and should be between $0.01 and $999999.99.                                                                                                                                                                                                                                                                                                                                             |
|     IMAGE_FRONT:           |     Contains   the image data for the check front. Image data must be base64.                                                                                                                                                                                                                                                                                                                                                  |
|     SIZE:                  |     The   size attribute contains the image size in bytes. The size can be expressed as   a decimal.                                                                                                                                                                                                                                                                                                                           |
|     TYPE:                  |     The   type attribute contains the content type of the image. Valid   TYPE values are “tiff”.                                                                                                                                                                                                                                                                                                                               |
|     IMAGE_BACK:            |     Contains   the image data for the check back. Image data must be base64.                                                                                                                                                                                                                                                                                                                                                   |
|     SIZE:                  |     The   size attribute contains the image size in bytes. The size can be expressed as   a decimal.                                                                                                                                                                                                                                                                                                                           |
|     TYPE:                  |     The   type attribute contains the content type of the image. Valid   TYPE valuesare “tiff”.                                                                                                                                                                                                                                                                                                                                |
|     MRDCIMGCOUNT:          |     This   is an optional element for transactions that have an SEC code of POP or   Check21. NOTE:  Please view POP or   Check21 XSD’s for implementation.                                                                                                                                                                                                                                                                    |
|     CUSTOM1- CUSTOM4:      |     These   are optional elements that can contain up to 50 alpha numeric   characters.  We will return this in   reporting.           

                                                                                                                 

# **How to determine which XML & XSD Template to use** 
When the AuthGatewayCertification web method receives a request it will first validate your request XML Data Packet against the published XSD for your terminal.

The XML data packet can be built from scratch by the web service consumer or one of the available XML templates can be used to build the XML data packet prior to submitting the data packet to the Authorization Gateway. The uniform resource identifier for the XML and it's corresponding XSD data packet for a given terminal can be retrieved from the Terminal Settings, but can also be determined by using the criteria below.

The root path for all XMLs is http://demo.eftchecks.com/webservices/Schemas followed by the SEC Code and Schema Name. The Schema Name (XSD) is determined by the following criteria:

 - If the Terminal requires the Driver’s License Information. 
 - If the Terminal is configured for Check Verification.
 - If the Terminal is configured for Identity Verification.
 - Additionally for PPD and CCD entries, If the Terminal is configured to allow Credit entries

A matrix of the available XML Templates followed by a matrix for their corresponding XSD Schemas for each SEC code can be found below, broken up by SEC code. Each grid contains links to the templates and the schema needed determined by your required criteria. The grids also includes the Terminal IDs that can be used for testing and certifying against the provided schema. The Terminal ID will be different for guaranteed transactions and Non-guaranteed transactions.

Guaranteed terminals are numbered 1xxx, and Non-guaranteed terminals are numbered 2xxx

An example of an XML and it's corresponding XSD file path for a PPD terminal that does not require the driver’s license information, is setup for check verification,  is setup for identity verification, and does not allow credits would be as follows: 

XML: [Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckVerificationIdentityVerificationDLOptional.xml](/Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)

XSD: [Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd)

***Note about Special Characters:** Because the Data packet is XML, some special characters must be escaped to be included in the data. Please see the examples in the table below.*

|     Special Character    |     Symbol    |     Escaped Form     |
|--------------------------|---------------|----------------------|
|     Ampersand            |     &         |     \&amp;           |
|     Less-than            |     <         |     \&lt;            |
|     Greater-than         |     >         |     \&gt;            |
|     Quotes               |     “         |     \&quot;          |
|     Apostrophe           |     ‘         |     \&apos;          |

## **Standard Templates**

### PPD Templates
XML Templates
| **PPD**                                                    | Certification Terminal ID                |             |              |           |             |                       |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|-------------|-----------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID | [XML Example](/Authorization%20Gateway/XML/Standard/PPD%20Templates) | [XML Example with Token](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates) |
| CheckNoVerificationDLOptional                          | 1010 / 2010                              |             |              |           | [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckNoVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/CheckNoVerificationDLWithTokenOptional.xml)                   |
| CheckNoVerificationDLRequired                          | 1011 / 2011                              |      X      |              |           | [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckNoVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/CheckNoVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationIdentityVerificationDLOptional       | 1012 / 2012                              |             |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/CheckVerificationIdentityVerificationDLWithTokenOptional.xml)                   |
| CheckVerificationIdentityVerificationDLRequired       | 1013 / 2013                              |      X      |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckVerificationIdentityVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/CheckVerificationIdentityVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationOnlyDLOptional                       | 1014 / 2014                              |             |       X      |           |  [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/CheckVerificationOnlyDLWithTokenOptional.xml)                   |
| CheckVerificationOnlyDLRequired                       | 1015 / 2015                              |      X      |       X      |           | [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/CheckVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/CheckVerificationOnlyDLWithTokenRequired.xml)                   |
| IdentityVerificationOnlyDLOptional                    | 1016 / 2016                              |             |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/IdentityVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/IdentityVerificationOnlyDLWithTokenOptional.xml)                   |
| IdentityVerificationOnlyDLRequired                    | 1017 / 2017                              |      X      |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/PPD%20Templates/IdentityVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/PPD%20Templates/IdentityVerificationOnlyDLWithTokenRequired.xml)                   |


Corresponding XDS Template

<sub>For the latest PPD XSD Schemas see: [PPD Schemas - Guaranteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed) and [PPD Schemas - Non-Guaranteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed)</sub>

| **PPD**                                                    | Certification Terminal ID                |             |              |           |     |    | Production  | Production  |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|----------------|---------------------|-|-|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID |[XSD Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed) | [XSD Non- Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed) |XSD Guarenteed | XSD Non- Guarenteed |
| **Debit Only Transactions**                                |                                          |             |              |           |             |                       | | |
| CheckNoVerificationDLOptional                          | 1010 / 2010                              |             |              |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CheckNoVerificationDLOptional.xsd)         | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CheckNoVerificationDLOptional.xsd)      | [XSD ](https://demo.eftchecks.com/webservices/Schemas/ppd/CheckNoVerificationDLOptional.xsd) |  [XSD ](https://demo.eftchecks.com/webservices/Schemas/ppd/Ng_CheckNoVerificationDLOptional.xsd) |
| CheckNoVerificationDLRequired                          | 1011 / 2011                              |      X      |              |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CheckNoVerificationDLRequired.xsd)                 | | |
| CheckVerificationIdentityVerificationDLOptional       | 1012 / 2012                              |             |       X      |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationIdentityVerificationDLOptional.xsd)                 | | |
| CheckVerificationIdentityVerificationDLRequired       | 1013 / 2013                              |      X      |       X      |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLRequired.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationIdentityVerificationDLRequired.xsd)                 | | |
| CheckVerificationOnlyDLOptional                       | 1014 / 2014                              |             |       X      |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CheckVerificationOnlyDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationOnlyDLOptional.xsd)                 | | |
| CheckVerificationOnlyDLRequired                       | 1015 / 2015                              |      X      |       X      |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditCheckNoVerificationDLRequired.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationOnlyDLRequired.xsd)                 | | |
| IdentityVerificationOnlyDLOptional                    | 1016 / 2016                              |             |              |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLOptional.xsd)                 | | |
| IdentityVerificationOnlyDLRequired                    | 1017 / 2017                              |      X      |              |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLRequired.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLRequired.xsd)                 | | |
|                                                            |                                          |             |              |           |             |                       | | |
| **Credit & Debit Transactions**                            |                                          |             |              |           |             |                       | | |
| CreditCheckNoVerificationDLOptional                    | 1810 / 2810                              |             |              |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditCheckNoVerificationDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckNoVerificationDLOptional.xsd)                 | | |
| CreditCheckNoVerificationDLRequired                     | 1811 / 2811                              |      X      |              |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditCheckNoVerificationDLRequired.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckNoVerificationDLRequired.xsd)                 | | |
| CreditCheckVerificationIdentityVerificationDLOptional | 1812 / 2812                              |             |       X      |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditCheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationIdentityVerificationDLOptional.xsd)                 | | |
| CreditCheckVerificationIdentityVerificationDLRequired | 1813 / 2813                              |      X      |       X      |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditCheckVerificationIdentityVerificationDLRequired.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationIdentityVerificationDLRequired.xsd)                 | | |
| CreditCheckVerificationOnlyDLOptional                 | 1814 / 2814                              |             |       X      |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditCheckVerificationOnlyDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationOnlyDLOptional.xsd)                 | | |
| CreditCheckVerificationOnlyDLRequired                  | 1815 / 2815                              |      X      |       X      |           | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditCheckVerificationOnlyDLRequired.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationOnlyDLRequired.xsd)                 | | |
| CreditIdentityVerificationOnlyDLOptional               | 1816 / 2816                              |             |              |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/CreditIdentityVerificationOnlyDLOptional.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLOptional.xsd)                 | | |
| CreditIdentityVerificationOnlyDLRequired               | 1817 / 2817                              |      X      |              |     X     | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLRequired.xsd)            | [XSD ](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/PPD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLRequired.xsd)                 | | |






### CCD Templates
XML Templates
| **CCD**                                                    | Certification Terminal ID                |             |              |           |             |                       |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|-------------|-----------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID | [XML Example](/Authorization%20Gateway/XML/Standard/CCD%20Templates) | [XML Example with Token](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates) |
| CheckNoVerificationDLOptional                          | 1710 / 2710                              |             |              |           | [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/CheckNoVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/CheckNoVerificationDLWithTokenOptional.xml)                   |
| CheckNoVerificationDLRequired                          | 1711 / 2711                              |      X      |              |           | [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/CheckNoVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/CheckNoVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationIdentityVerificationDLOptional       | 1712 / 2712                              |             |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/CheckVerificationIdentityVerificationDLWithTokenOptional.xml)                   |
| CheckVerificationIdentityVerificationDLRequired       | 1713 / 2713                              |      X      |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/CheckVerificationIdentityVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/CheckVerificationIdentityVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationOnlyDLOptional                       | 1714 / 2714                              |             |       X      |           |  [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/CheckVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/CheckVerificationOnlyDLWithTokenOptional.xml)                   |
| CheckVerificationOnlyDLRequired                       | 1715 / 2715                              |      X      |       X      |           | [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/CheckVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/CheckVerificationOnlyDLWithTokenRequired.xml)                   |
| IdentityVerificationOnlyDLOptional                    | 1716 / 2716                              |             |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/IdentityVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/IdentityVerificationOnlyDLWithTokenOptional.xml)                   |
| IdentityVerificationOnlyDLRequired                    | 1717 / 2717                              |      X      |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/CCD%20Templates/IdentityVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/CCD%20Templates/IdentityVerificationOnlyDLWithTokenRequired.xml)                   |


Corresponding XDS Template

<sub>For the latest CCD XSD Schemas see: [CCD Schemas - Guaranteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed) and [CCD Schemas - Non-Guaranteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed)</sub>

| **CCD**                                                    | Certification Terminal ID                |             |              |           |                |                     |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|----------------|---------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID |[XSD Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed) | [XSD Non- Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed) |
| **Debit Only Transactions**                                |                                          |             |              |           |             |                       |
| CheckNoVerificationDLOptional                          | 1910 / 2910                              |             |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CheckNoVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CheckNoVerificationDLOptional.xsd)                 |
| CheckNoVerificationDLRequired                          | 1911 / 2911                              |      X      |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CheckNoVerificationDLRequired.xsd)                 |
| CheckVerificationIdentityVerificationDLOptional       | 1912 / 2912                              |             |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationIdentityVerificationDLOptional.xsd)                 |
| CheckVerificationIdentityVerificationDLRequired       | 1913 / 2913                              |      X      |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationIdentityVerificationDLRequired.xsd)                 |
| CheckVerificationOnlyDLOptional                       | 1914 / 2914                              |             |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CheckVerificationOnlyDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationOnlyDLOptional.xsd)                 |
| CheckVerificationOnlyDLRequired                       | 1915 / 2915                              |      X      |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditCheckNoVerificationDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationOnlyDLRequired.xsd)                 |
| IdentityVerificationOnlyDLOptional                    | 1016 / 2016                              |             |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLOptional.xsd)                 |
| IdentityVerificationOnlyDLRequired                    | 1017 / 2017                              |      X      |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLRequired.xsd)                 |
|                                                            |                                          |             |              |           |             |                       |
| **Credit & Debit Transactions**                            |                                          |             |              |           |             |                       |
| CreditCheckNoVerificationDLOptional                    | 1810 / 2810                              |             |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditCheckNoVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckNoVerificationDLOptional.xsd)                 |
| CreditCheckNoVerificationDLRequired                     | 1811 / 2811                              |      X      |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditCheckNoVerificationDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckNoVerificationDLRequired.xsd)                 |
| CreditCheckVerificationIdentityVerificationDLOptional | 1812 / 2812                              |             |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditCheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationIdentityVerificationDLOptional.xsd)                 |
| CreditCheckVerificationIdentityVerificationDLRequired | 1813 / 2813                              |      X      |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditCheckVerificationIdentityVerificationDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationIdentityVerificationDLRequired.xsd)                 |
| CreditCheckVerificationOnlyDLOptional                 | 1814 / 2814                              |             |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditCheckVerificationOnlyDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationOnlyDLOptional.xsd)                 |
| CreditCheckVerificationOnlyDLRequired                  | 1815 / 2815                              |      X      |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditCheckVerificationOnlyDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_CreditCheckVerificationOnlyDLRequired.xsd)                 |
| CreditIdentityVerificationOnlyDLOptional               | 1816 / 2816                              |             |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/CreditIdentityVerificationOnlyDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLOptional.xsd)                 |
| CreditIdentityVerificationOnlyDLRequired               | 1817 / 2817                              |      X      |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/CCD%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLRequired.xsd)                 |

### WEB Templates
XML Templates
| **WEB**                                                    | Certification Terminal ID                |             |              |           |             |                       |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|-------------|-----------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID | [XML Example](/Authorization%20Gateway/XML/Standard/WEB%20Templates) | [XML Example with Token](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates) |
| CheckNoVerificationDLOptional                          | 2210                              |             |              |           | [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/CheckNoVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/CheckNoVerificationDLWithTokenOptional.xml)                   |
| CheckNoVerificationDLRequired                          | 2211                              |      X      |              |           | [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/CheckNoVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/CheckNoVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationIdentityVerificationDLOptional       | 2212                              |             |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/CheckVerificationIdentityVerificationDLWithTokenOptional.xml)                   |
| CheckVerificationIdentityVerificationDLRequired       | 2213                              |      X      |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/CheckVerificationIdentityVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/CheckVerificationIdentityVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationOnlyDLOptional                       | 2214                              |             |       X      |           |  [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/CheckVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/CheckVerificationOnlyDLWithTokenOptional.xml)                   |
| CheckVerificationOnlyDLRequired                       | 2215                              |      X      |       X      |           | [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/CheckVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/CheckVerificationOnlyDLWithTokenRequired.xml)                   |
| IdentityVerificationOnlyDLOptional                    | 2216                              |             |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/IdentityVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/IdentityVerificationOnlyDLWithTokenOptional.xml)                   |
| IdentityVerificationOnlyDLRequired                    | 2217                              |      X      |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/WEB%20Templates/IdentityVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/WEB%20Templates/IdentityVerificationOnlyDLWithTokenRequired.xml)                   |


Corresponding XDS Template

<sub>For the latest WEB XSD Schemas see: [WEB Schemas](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas)</sub>

| **WEB**                                                    | Certification Terminal ID                |             |              |           |                |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|----------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID |[XSD Non-Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas) |
| **Debit Only Transactions**                                |                                          |             |              |           |             |                       |
| Ng_CheckNoVerificationDLOptional                          | 2210                              |             |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_CheckNoVerificationDLOptional.xsd)                 |
| Ng_CheckNoVerificationDLRequired                          | 2211                              |      X      |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_CheckNoVerificationDLRequired.xsd)                 |
| Ng_CheckVerificationIdentityVerificationDLOptional       | 2212                              |             |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_CheckVerificationIdentityVerificationDLOptional.xsd)                 |
| Ng_CheckVerificationIdentityVerificationDLRequired       | 2213                              |      X      |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_CheckVerificationIdentityVerificationDLRequired.xsd)                 |
| Ng_CheckVerificationOnlyDLOptional                       | 2214                              |             |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_CheckVerificationOnlyDLOptional.xsd)                 |
| Ng_CheckVerificationOnlyDLRequired                       | 2215                              |      X      |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_CheckVerificationOnlyDLRequired.xsd)                 |
| Ng_IdentityVerificationOnlyDLOptional                    | 2216                              |             |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_IdentityVerificationOnlyDLOptional.xsd)                 |
| Ng_IdentityVerificationOnlyDLRequired                    | 2217                              |      X      |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/WEB%20Schemas/Ng_IdentityVerificationOnlyDLRequired.xsd)                 |



### TEL Templates
XML Templates
| **TEL**                                                    | Certification Terminal ID                |             |              |           |             |                       |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|-------------|-----------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID | [XML Example](/Authorization%20Gateway/XML/Standard/TEL%20Templates) | [XML Example with Token](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates) |
| CheckNoVerificationDLOptional                          | 1210 / 2210                              |             |              |           | [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/CheckNoVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/CheckNoVerificationDLWithTokenOptional.xml)                   |
| CheckNoVerificationDLRequired                          | 1211 / 2211                              |      X      |              |           | [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/CheckNoVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/CheckNoVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationIdentityVerificationDLOptional       | 1212 / 2212                              |             |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/CheckVerificationIdentityVerificationDLWithTokenOptional.xml)                   |
| CheckVerificationIdentityVerificationDLRequired       | 1213 / 2213                              |      X      |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/CheckVerificationIdentityVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/CheckVerificationIdentityVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationOnlyDLOptional                       | 1214 / 2214                              |             |       X      |           |  [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/CheckVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/CheckVerificationOnlyDLWithTokenOptional.xml)                   |
| CheckVerificationOnlyDLRequired                       | 1215 / 2215                              |      X      |       X      |           | [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/CheckVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/CheckVerificationOnlyDLWithTokenRequired.xml)                   |
| IdentityVerificationOnlyDLOptional                    | 1216 / 2216                              |             |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/IdentityVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/IdentityVerificationOnlyDLWithTokenOptional.xml)                   |
| IdentityVerificationOnlyDLRequired                    | 1217 / 2217                              |      X      |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/TEL%20Templates/IdentityVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/TEL%20Templates/IdentityVerificationOnlyDLWithTokenRequired.xml)                   |


Corresponding XDS Template

<sub>For the latest TEL XSD Schemas see: [TEL Schemas - Guaranteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed) and [TEL Schemas - Non-Guaranteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed)</sub>

| **TEL**                                                    | Certification Terminal ID                |             |              |           |                |                     |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|----------------|---------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID |[XSD Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed) | [XSD Non- Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed) |
| **Debit Only Transactions**                                |                                          |             |              |           |             |                       |
| CheckNoVerificationDLOptional                          | 1210 / 2210                              |             |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/CheckNoVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_CheckNoVerificationDLOptional.xsd)                 |
| CheckNoVerificationDLRequired                          | 1211 / 2211                              |      X      |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_CheckNoVerificationDLRequired.xsd)                 |
| CheckVerificationIdentityVerificationDLOptional       | 1212 / 2212                              |             |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationIdentityVerificationDLOptional.xsd)                 |
| CheckVerificationIdentityVerificationDLRequired       | 1213 / 2213                              |      X      |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/CheckVerificationIdentityVerificationDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationIdentityVerificationDLRequired.xsd)                 |
| CheckVerificationOnlyDLOptional                       | 1214 / 2214                              |             |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/CheckVerificationOnlyDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationOnlyDLOptional.xsd)                 |
| CheckVerificationOnlyDLRequired                       | 1215 / 2215                              |      X      |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/CreditCheckNoVerificationDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_CheckVerificationOnlyDLRequired.xsd)                 |
| IdentityVerificationOnlyDLOptional                    | 1216 / 2216                              |             |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLOptional.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLOptional.xsd)                 |
| IdentityVerificationOnlyDLRequired                    | 1217 / 2217                              |      X      |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Guaranteed/IdentityVerificationOnlyDLRequired.xsd)            | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/TEL%20Schemas%20-%20Non-Guaranteed/Ng_IdentityVerificationOnlyDLRequired.xsd)                 |


### POP Templates
XML Templates
| **POP**                                                    | Certification Terminal ID                |             |              |           |             |                       |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|-------------|-----------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID | [XML Example](/Authorization%20Gateway/XML/Standard/POP%20Templates) | [XML Example with Token](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates) |
| CheckNoVerificationDLOptional                          | 1110                              |             |              |           | [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/CheckNoVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/CheckNoVerificationDLWithTokenOptional.xml)                   |
| CheckNoVerificationDLRequired                          | 1111                              |      X      |              |           | [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/CheckNoVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/CheckNoVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationIdentityVerificationDLOptional       | 1112                              |             |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/CheckVerificationIdentityVerificationDLWithTokenOptional.xml)                   |
| CheckVerificationIdentityVerificationDLRequired       | 1113                              |      X      |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/CheckVerificationIdentityVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/CheckVerificationIdentityVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationOnlyDLOptional                       | 1114                              |             |       X      |           |  [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/CheckVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/CheckVerificationOnlyDLWithTokenOptional.xml)                   |
| CheckVerificationOnlyDLRequired                       | 1115                              |      X      |       X      |           | [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/CheckVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/CheckVerificationOnlyDLWithTokenRequired.xml)                   |
| IdentityVerificationOnlyDLOptional                    | 1116                              |             |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/IdentityVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/IdentityVerificationOnlyDLWithTokenOptional.xml)                   |
| IdentityVerificationOnlyDLRequired                    | 1117                              |      X      |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/POP%20Templates/IdentityVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/POP%20Templates/IdentityVerificationOnlyDLWithTokenRequired.xml)                   |


Corresponding XDS Template

<sub>For the latest POP XSD Schemas see: [POP Schemas](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas)</sub>

| **POP**                                                    | Certification Terminal ID                |             |              |           |                |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|----------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID |[XSD Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas) |
| **Debit Only Transactions**                                |                                          |             |              |           |             |                       |
| CheckNoVerificationDLOptional                          | 1110                              |             |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/CheckNoVerificationDLOptional.xsd)                 |
| CheckNoVerificationDLRequired                          | 1111                              |      X      |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/CheckNoVerificationDLRequired.xsd)                 |
| CheckVerificationIdentityVerificationDLOptional       | 1112                              |             |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/CheckVerificationIdentityVerificationDLOptional.xsd)                 |
| CheckVerificationIdentityVerificationDLRequired       | 1113                              |      X      |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/CheckVerificationIdentityVerificationDLRequired.xsd)                 |
| CheckVerificationOnlyDLOptional                       | 1114                              |             |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/CheckVerificationOnlyDLOptional.xsd)                 |
| CheckVerificationOnlyDLRequired                       | 1115                              |      X      |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/CheckVerificationOnlyDLRequired.xsd)                 |
| IdentityVerificationOnlyDLOptional                    | 1116                              |             |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/IdentityVerificationOnlyDLOptional.xsd)                 |
| IdentityVerificationOnlyDLRequired                    | 1117                              |      X      |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/POP%20Schemas/IdentityVerificationOnlyDLRequired.xsd)                 |


### Check21 Templates
XML Templates
| **Check21**                                                    | Certification Terminal ID                |             |              |           |             |                       |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|-------------|-----------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID | [XML Example](/Authorization%20Gateway/XML/Standard/Check21%20Templates) | [XML Example with Token](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates) |
| CheckNoVerificationDLOptional                          | 1610                              |             |              |           | [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/CheckNoVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/CheckNoVerificationDLWithTokenOptional.xml)                   |
| CheckNoVerificationDLRequired                          | 1611                              |      X      |              |           | [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/CheckNoVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/CheckNoVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationIdentityVerificationDLOptional       | 1612                              |             |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/CheckVerificationIdentityVerificationDLWithTokenOptional.xml)                   |
| CheckVerificationIdentityVerificationDLRequired       | 1613                              |      X      |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/CheckVerificationIdentityVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/CheckVerificationIdentityVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationOnlyDLOptional                       | 1614                              |             |       X      |           |  [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/CheckVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/CheckVerificationOnlyDLWithTokenOptional.xml)                   |
| CheckVerificationOnlyDLRequired                       | 1615                              |      X      |       X      |           | [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/CheckVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/CheckVerificationOnlyDLWithTokenRequired.xml)                   |
| IdentityVerificationOnlyDLOptional                    | 1616                              |             |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/IdentityVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/IdentityVerificationOnlyDLWithTokenOptional.xml)                   |
| IdentityVerificationOnlyDLRequired                    | 1617                              |      X      |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/Check21%20Templates/IdentityVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/Check21%20Templates/IdentityVerificationOnlyDLWithTokenRequired.xml)                   |


Corresponding XDS Template

<sub>For the latest Check21 XSD Schemas see: [Check21 Schemas](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas)</sub>

| **Check21**                                                    | Certification Terminal ID                |             |              |           |                |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|----------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID |[XSD Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas) |
| **Debit Only Transactions**                                |                                          |             |              |           |             |                       |
| CheckNoVerificationDLOptional                          | 1610                              |             |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/CheckNoVerificationDLOptional.xsd)                 |
| CheckNoVerificationDLRequired                          | 1611                              |      X      |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/CheckNoVerificationDLRequired.xsd)                 |
| CheckVerificationIdentityVerificationDLOptional       | 1612                              |             |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/CheckVerificationIdentityVerificationDLOptional.xsd)                 |
| CheckVerificationIdentityVerificationDLRequired       | 1613                              |      X      |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/CheckVerificationIdentityVerificationDLRequired.xsd)                 |
| CheckVerificationOnlyDLOptional                       | 1614                              |             |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/CheckVerificationOnlyDLOptional.xsd)                 |
| CheckVerificationOnlyDLRequired                       | 1615                              |      X      |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/CheckVerificationOnlyDLRequired.xsd)                 |
| IdentityVerificationOnlyDLOptional                    | 1616                              |             |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/IdentityVerificationOnlyDLOptional.xsd)                 |
| IdentityVerificationOnlyDLRequired                    | 1617                              |      X      |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/Check21%20Schemas/IdentityVerificationOnlyDLRequired.xsd)                 |


### BOC Templates
XML Templates
| **BOC**                                                    | Certification Terminal ID                |             |              |           |             |                       |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|-------------|-----------------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID | [XML Example](/Authorization%20Gateway/XML/Standard/BOC%20Templates) | [XML Example with Token](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates) |
| CheckNoVerificationDLOptional                          | 1510                              |             |              |           | [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/CheckNoVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/CheckNoVerificationDLWithTokenOptional.xml)                   |
| CheckNoVerificationDLRequired                          | 1511                              |      X      |              |           | [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/CheckNoVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/CheckNoVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationIdentityVerificationDLOptional       | 1512                              |             |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/CheckVerificationIdentityVerificationDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/CheckVerificationIdentityVerificationDLWithTokenOptional.xml)                   |
| CheckVerificationIdentityVerificationDLRequired       | 1513                              |      X      |       X      |     X     | [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/CheckVerificationIdentityVerificationDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/CheckVerificationIdentityVerificationDLWithTokenRequired.xml)                   |
| CheckVerificationOnlyDLOptional                       | 1514                              |             |       X      |           |  [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/CheckVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/CheckVerificationOnlyDLWithTokenOptional.xml)                   |
| CheckVerificationOnlyDLRequired                       | 1515                              |      X      |       X      |           | [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/CheckVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/CheckVerificationOnlyDLWithTokenRequired.xml)                   |
| IdentityVerificationOnlyDLOptional                    | 1516                              |             |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/IdentityVerificationOnlyDLOptional.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/IdentityVerificationOnlyDLWithTokenOptional.xml)                   |
| IdentityVerificationOnlyDLRequired                    | 1517                              |      X      |              |     X     | [XML](/Authorization%20Gateway/XML/Standard/BOC%20Templates/IdentityVerificationOnlyDLRequired.xml)         | [XML](/Authorization%20Gateway/XML/With%20Tokens/BOC%20Templates/IdentityVerificationOnlyDLWithTokenRequired.xml)                   |


Corresponding XDS Template

<sub>For the latest BOC XSD Schemas see: [BOC Schemas](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas)</sub>

| **BOC**                                                    | Certification Terminal ID                |             |              |           |                |
|------------------------------------------------------------|------------------------------------------|-------------|--------------|-----------|----------------|
|                                                            | Guarenteed 1000's  Non-Guarenteed 2000's | DL Required | Verify Check | Verify ID |[XSD Guarenteed](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas) |
| **Debit Only Transactions**                                |                                          |             |              |           |             |                       |
| CheckNoVerificationDLOptional                          | 1510                              |             |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/CheckNoVerificationDLOptional.xsd)                 |
| CheckNoVerificationDLRequired                          | 1511                              |      X      |              |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/CheckNoVerificationDLRequired.xsd)                 |
| CheckVerificationIdentityVerificationDLOptional       | 1512                              |             |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/CheckVerificationIdentityVerificationDLOptional.xsd)                 |
| CheckVerificationIdentityVerificationDLRequired       | 1513                              |      X      |       X      |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/CheckVerificationIdentityVerificationDLRequired.xsd)                 |
| CheckVerificationOnlyDLOptional                       | 1514                              |             |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/CheckVerificationOnlyDLOptional.xsd)                 |
| CheckVerificationOnlyDLRequired                       | 1515                              |      X      |       X      |           | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/CheckVerificationOnlyDLRequired.xsd)                 |
| IdentityVerificationOnlyDLOptional                    | 1516                              |             |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/IdentityVerificationOnlyDLOptional.xsd)                 |
| IdentityVerificationOnlyDLRequired                    | 1517                              |      X      |              |     X     | [XSD Documentation](/Authorization%20Gateway/XSD/Standard%20XSD%20Schemas/BOC%20Schemas/IdentityVerificationOnlyDLRequired.xsd)                 |


## **OCR XML Templates**

There are two different ways of processing images, one with OCR and one with Mobile OCR.  Images captured by a Mobile Device are handled differently (due to patent restrictions) than images captured via a desktop scanner, such as an RDM, Panini, Magtek or other peripheral device.  Images submitted via a mobile device must be submitted as a .JPG, while images submitted via a peripheral device must be submitted in a .TIFF format.  

Images submitted via a Mobile device, will have the MICR, Courtesy Amount, and Legal Amount recognized by the standard Mobile OCR function.  In order to submit for FULL OCR to receive the additional fields (Payee, Address, Endorsement, etc.), it will be necessary that you code for the full set of OCR responses.    

A matrix of the available XML Templates and XSD Schemas when using OCR for each SEC code can be found below. Each grid contains the name of the XML Template and XSD Schemas, based on the determining criteria, and a link to the actual XML Template and XSD Schema. The Trans Type will indicate what type of response you should receive. The grid also includes the Terminal IDs that can be used for testing and certifying against the provided schema. NOTE: Verify Check can be applied to any terminal. This will NOT impact the terminal schemas or template.

### Trans Type:
 -	P – Successful Transaction
 -	O -  Successful Transaction with failed optional fields (Fields that are not required to pass the transaction in the system. NOTE: Fields may not match image depending on how OCR translates the image).
 -	F – Failed Transaction
 - **Note:  Optional values submitted for OCR will be TRUSTED and not validated by OCR**

### **POP XML Templates**

|     Template            | Certification Terminal ID | Trans Type | DL Required | Verify ID | XML Template | XSD Template |
|-------------------------|---------------------------|------------|-------------|-----------|-------------|-------------|
| OCR                     | 4010                      | P          |             |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4020                      | O          |             |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4030                      | F          |             |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4011                      | P          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4021                      | O          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4031                      | F          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLRequired.xsd)     |
| OCRIdentityVerification | 4012                      | P          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4022                      | O          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4032                      | F          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4013                      | P          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4023                      | O          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4033                      | F          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |


### **Check21 XML Templates**
|     Template            | Certification Terminal ID | Trans Type | DL Required | Verify ID | XML Template | XSD Template |
|-------------------------|---------------------------|------------|-------------|-----------|-------------|-------------|
| OCR                     | 4010                      | P          |             |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4020                      | O          |             |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4030                      | F          |             |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4011                      | P          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4021                      | O          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4031                      | F          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLRequired.xsd)     |
| OCRIdentityVerification | 4012                      | P          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4022                      | O          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4032                      | F          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4013                      | P          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4023                      | O          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4033                      | F          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |

## **Templates for Mobile**

### **POP XML Teamplates for Mobile** 
|     Template            | Certification Terminal ID | Trans Type | DL Required | Verify ID | XML Template | XSD Template |
|-------------------------|---------------------------|------------|-------------|-----------|-------------|-------------|
| OCR                     | 4210                      | P          |             |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4220                      | O          |             |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4230                      | F          |             |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4211                      | P          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4221                      | O          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4231                      | F          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRDLRequired.xsd)     |
| OCRIdentityVerification | 4212                      | P          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4222                      | O          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4232                      | F          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4213                      | P          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4223                      | O          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4233                      | F          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/POP%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/POP%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |


### **Check21 XML Templates for Mobile** 
|     Template            | Certification Terminal ID | Trans Type | DL Required | Verify ID | XML Template | XSD Template |
|-------------------------|---------------------------|------------|-------------|-----------|-------------|-------------|
| OCR                     | 4310                      | P          |             |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4320                      | O          |             |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4330                      | F          |             |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLOptional.xsd)     |
| OCR                     | 4311                      | P          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4321                      | O          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLRequired.xsd)     |
| OCR                     | 4331                      | F          | X           |           | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCR.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRDLRequired.xsd)     |
| OCRIdentityVerification | 4312                      | P          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4322                      | O          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4332                      | F          |             |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLOptional.xsd)     |
| OCRIdentityVerification | 4313                      | P          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4323                      | O          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |
| OCRIdentityVerification | 4333                      | F          | X           |     X     | [XML](/Authorization%20Gateway/XML/OCR/Check21%20Templates%20for%20Mobile/OCRIdentityVerification.xml)     | [XSD Documentation](/Authorization%20Gateway/XSD/OCR%20XSD%20Schemas/Check21%20Schemas/OCRIdentityVerificationDLRequired.xsd)     |


## **Data Types**
Each element in the XML data packet that is sent to the Authorization Gateway has a data type that defines the format of the data contained within the element.  The Terminal’s XSD defines which elements are of what data type. A list and links to the available data types is located below.
 - States and Provinces
https://demo.eftchecks.com/Webservices/schemas/types/StatesAndProvincesSimpleType.xsd
 - Authorization Gateway Types
https://demo.eftchecks.com/Webservices/schemas/types/AuthGatewayTypes.xsd 
 - Authorization Gateway Response Types
https://demo.eftchecks.com/Webservices/schemas/types/AuthGatewayResponseTypes.xsd


# **Validation Handling**

When the AuthGatewayCertification web method receives a request it will first validate your request XML Data Packet against the published XSD for your terminal. Each returned response will include a VALIDATION_MESSAGE element.  If the request XML Data Packet successfully passes validation the RESULT child element of the VALIDATION_MESSAGE element will contain a value of “Passed”, but if the validation failed, the RESULT element will contain a value of “Failed”.  These values can be coded into your host system for determining if a request passed or failed validation. 

The VALIDATION_MESSAGE element will also contain a SCHEMA_FILE_PATH element. The SCHEMA_FILE_PATH element will be present regardless of if the request XML Data Packet passed or failed validation and will include the full URI for the XSD that was used for validating the request XML Data Packet. In addition, if the RESULT element contains “Passed” then only the RESULT and SCHEMA_FILE_PATH elements will be present as child elements of the VALIDATION_MESSAGE. However, if the request XML Data Packet fails validation, and the RESULT element contains a value of “Failed”, then the VALIDATION_MESSAGE will contain one or more VALIDATION_ERROR elements.  The VALIDATION_ERROR element will contain SEVERITY and MESSAGE elements that will detail exactly what failed in the request XML Data Packet as well as LINE_NUMBER and LINE_POSITION attributes that will define exactly where the validation error occurred.  

The host system should always check each response to make sure the RESULT child element of the VALIDATION_MESSAGE is set to “Passed”.  If it is not, then there are validation errors and the transaction was not processed. The host system will have to correct any validation errors outlined in the VALIDATION_ERROR element(s) and then resubmit the request XML Data Packet. 


## **Responses**
Each web method in the Authorization Gateway will return an XML string and detail the success or failure of the submission.  If the transaction is accepted (authorized) an authorization number will be returned at a minimum.

The Authorization Gateway XML response may contain the following elements:
 - **REQUEST_ID**:  Is an attribute that contains a unique user defined ID to identify the authorization gateway request. The Request ID contained in the Authorization Gateway Request is returned in the Authorization Gateway response.
 - **VALIDATION_MESSAGE**:  Contains all of the elements in the validation message. 
 - **AUTHORIZATION_MESSAGE**:  Contains all of the elements in the authorization message.
 
*NOTE: The AuthGatewayCertification web method response will not contain this element.*



### Validation Message Response
The AuthGatewayCertification, ProcessSingleCheck, and ProcessSingleCheckWithToken web methods will validate that the interface is sending a data packet that conforms to its schema. 
Validation Message Example – Success Response
```XML
<?xml version=”1.0” encoding=”utf-8”?>
<RESPONSE xmlns:xsi=”http://www.w3.org/2001/XMLSchema-instance” xmlns:xsd=”http://www.w3.org/2001/XMLSchema” REQUEST_ID=”4654”>
   <VALIDATION_MESSAGE>
      <RESULT>Passed</RESULT>
      <SCHEMA_FILE_PATH>http://demo.eftchecks.com/webservices/Schemas/WEB/CheckNoVerificationDLOptional.xsd</SCHEMA_FILE_PATH>
   </VALIDATION_MESSAGE>
</RESPONSE>
```

### **Validation Message Example – Failure Response**

This data packet failed validation because the Driver’s License Information is required by the XSD and was not provided in the data packet.
```XML
<?xml version=”1.0” encoding=”utf-8” ?>
<RESPONSE xmlns:xsd=”http://www.w3.org/2001/XMLSchema” xmlns:xsi=”http://www.w3.org/2001/XMLSchema-instance” REQUEST_ID=”4654”>>
   <VALIDATION_MESSAGE>
      <RESULT>Failed</RESULT> 
      <SCHEMA_FILE_PATH>http://localhost/GETI.eMagnus.WebServices/Schemas/PPD/CheckNoVerificationDLRequired.xsd</SCHEMA_FILE_PATH>
      <VALIDATION_ERROR LINE_NUMBER=”1” LINE_POSITION=”561” >
         <SEVERITY>Error</SEVERITY> 
	 <MESSAGE>The ‘DL_STATE’ element has an invalid value according to its data type. An error occurred at (1, 561).</MESSAGE> 
      </VALIDATION_ERROR>
      <VALIDATION_ERROR LINE_NUMBER=”1” LINE_POSITION=”583”>
         <SEVERITY>Error</SEVERITY> 
         <MESSAGE>The ‘IDENTIFIER’ element has an invalid value according to its data type.</MESSAGE> 
      </VALIDATION_ERROR>
   </VALIDATION_MESSAGE>
</RESPONSE>
```

## **The Validation Message may contain the following elements and attributes**:

|     RESULT              |     Contains Passed   or Failed indicating if the validation was successful or not.                                                                                           |
|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     SCHEMA_FILE_PATH    |     Contains the   Uniform Resource Identifier (URI) specifying the published XML Schema   Definition (XSD) that the data packet request will be validated against.           |
|     VALIDATION_ERROR    |     Contains all of   the elements in the validation error.                                                                                                                   |
|     LINE_NUMBER         |     Contains the line   the number where the validation error occurred.                                                                                                       |
|     LINE_POSITION       |     Contains the line   position where the validation error occurred.                                                                                                         |
|     SEVERITY            |     Contains warning   or error indicating the severity of the validation error.                                                                                              |
|     MESSAGE             |     Contains the   complete validation error message and will include the element that failed   the validation and may contain the location the validation error occurred.    |

## Authorization Message Response
The ProcessSingleCheck web method will process a valid XML data packet and return an Authorization Message within the response. An example of the Authorization message is below.

### Authorization Message Example 
```XML
<?xml version=”1.0” encoding=”utf-8” ?> 
<RESPONSE xmlns:xsd=”http://www.w3.org/2001/XMLSchema”xmlns:xsi=”http://www.w3.org/2001/XMLSchema-instance” REQUEST_ID=”4654”>
   <VALIDATION_MESSAGE>
      <RESULT>Passed</RESULT> 
      <SCHEMA_FILE_PATH>http://localhost/GETI.eMagnus.WebServices/Schemas/PPD/CheckVerificationIdentityVerificationDLRequired.xsd</SCHEMA_FILE_PATH> 
   </VALIDATION_MESSAGE>
   <AUTHORIZATION_MESSAGE>
      <TRANSACTION_ID>0a4f529d-70fd-4ddb-b909-b5598dc07579</TRANSACTION_ID> 
      <RESPONSE_TYPE>A</RESPONSE_TYPE> 
      <RESPONSE_TYPE_TEXT>APPROVED</RESPONSE_TYPE_TEXT> 
      <RESULT_CODE>0</RESULT_CODE> 
      <TYPE_CODE>4096</TYPE_CODE> 
      <CODE>AUTH NUM 272-172</CODE> 
      <MESSAGE>APPROVAL</MESSAGE> 
   </AUTHORIZATION_MESSAGE>
</RESPONSE>
```
### **The Authorization Message may contain the following elements**:

|     TRANSACTION_ID        |     Contains   the unique user defined ID to identify the packet. The Transaction ID   provided for a given transaction in the data packet is returned in the   authorization message in the response.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             |
|---------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     RESPONSE_TYPE         |     Contains   an identifier that will give your host system a general overview of the   processed transaction, and the RESPONSE_TYPE_TEXT element will contain the   full text description of the identifier contained in the RESPONSE_TYPE   element. The RESULT_CODE should be the primary driver for determining how the   host system should act in response to various responses from the   Authorization Gateway, but the values in the RESPONSE_TYPE can be used to   determine additional information for processing by the host system. This   includes determining if a transaction was processed as Verification   Only.  A complete list of response   types is located in the Authorization   Response Types XSD.    |
|     RESPONSE_TYPE_TEXT    |     Contains   the full text description of the response type identifier.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          |
|     RESULT_CODE           |     Contains   a numeric bit that indicates one or many result messages. Examples of result   messages are Approved, Decline, or Unpaid Check Limit Exceeded.  A complete list of result codes is located   in the Authorization   Response Types XSD.  The host system should conduct a bit   comparison of the RESULT_CODE to determine exactly how the transaction was   processed and from there can determine exactly what action to take if any.                                                                                                                                                                                                                                                                             |
|     TYPE_CODE             |     Contains   a numeric bit that indicates one or many type messages.  The host system should conduct a bit   comparison of the TYPE_CODE element to determine additional detailed   information about the transaction which can be provided to the user.  Examples of type messages are Personal   Check, Business Check, or Voided Check. A complete list of type codes is   located in the Authorization   Response Types XSD.                                                                                                                                                                                                                                                                                                 |
|     CODE                  |     Contains   the text message with the Authorization Number if the transaction was   approved or additional information if the transaction was not approved.  The CODE element should be used by the host   system to display and record any authorization numbers or additional   information.                                                                                                                                                                                                                                                                                                                                                                                                                                  |
|     MESSAGE               |     Contains   additional text and should be used by the host system to display and record   any additional information about the transaction.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |

### **Process Single Certification Check – Authorization**
When processing a single certification check for Authorization you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000018 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas.  If the request XML Data Packet is valid then this routing number will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  A
 - RESPONSE_TYPE_TEXT:  APPROVED
 - RESULT_CODE:  0
 - TYPE_CODE:  4096
 - CODE:  AUTH NUM 272-172
 - MESSAGE:   APPROVAL

Again, the host system should first check to make sure the RESULT child element of the VALIDATION_MESSAGE is set to “Passed”.  If the request XML Data Packet passed validation it was successfully processed, and the above elements will be present as child elements of the AUTHORIZATION_MESSAGE element.  The host system should store all of the returned data and at a minimum conduct a bit comparison of the value in the RESULT_CODE element. If the value in the RESULT_CODE is 0 then the transaction has been approved. The response Data Packet also contains a value of 4096 for the TYPE_CODE element which indicates an Internal Override which in this instance means that Authorization Gateway returned a predetermined fixed response.  

## **Authorization Message Response with Token**
The ProcessSingleCheckWithToken web method will process a valid XML data packet and return an Authorization Message within the response. An example of the Authorization message is below.

### **Authorization Message Example with Token**
```XML
<?xml version=”1.0” encoding=”utf-8” ?> 
<RESPONSE xmlns:xsd=”http://www.w3.org/2001/XMLSchema”xmlns:xsi=”http://www.w3.org/2001/XMLSchema-instance” REQUEST_ID=”4654”>
   <VALIDATION_MESSAGE>
      <RESULT>Passed</RESULT> 
      <SCHEMA_FILE_PATH>http://localhost/GETI.eMagnus.WebServices/Schemas/PPD/CheckVerificationIdentityVerificationDLRequired.xsd</SCHEMA_FILE_PATH> 
   </VALIDATION_MESSAGE>
   <AUTHORIZATION_MESSAGE>
      <TRANSACTION_ID>0a4f529d-70fd-4ddb-b909-b5598dc07579</TRANSACTION_ID> 
      <RESPONSE_TYPE>A</RESPONSE_TYPE> 
      <RESPONSE_TYPE_TEXT>APPROVED</RESPONSE_TYPE_TEXT> 
      <RESULT_CODE>0</RESULT_CODE> 
      <TYPE_CODE>4096</TYPE_CODE> 
      <CODE>AUTH NUM 272-172</CODE> 
      <MESSAGE>APPROVAL</MESSAGE>
      <TOKEN>C7E057491C4A4D67B617EE512D1300AE</TOKEN> 
   </AUTHORIZATION_MESSAGE>
</RESPONSE>
```
### **The Authorization Message may contain the following elements**:

|     TRANSACTION_ID:           |      Contains   the unique user defined ID to identify the packet. The Transaction ID   provided for a given transaction in the data packet is returned in the   authorization message in the response.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            |
|-------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     RESPONSE_TYPE:            |     contains an   identifier that will give your host system a general overview of the   processed transaction, and the RESPONSE_TYPE_TEXT element will contain the   full text description of the identifier contained in the RESPONSE_TYPE   element. The RESULT_CODE should be the primary driver for determining how the   host system should act in response to various responses from the   Authorization Gateway, but the values in the RESPONSE_TYPE can be used to   determine additional information for processing by the host system. This   includes determining if a transaction was processed as Verification   Only.  A complete list of response   types is located in the Authorization   Response Types XSD.    |
|     RESPONSE_TYPE_TEXT:       |     Contains the full   text description of the response type identifier.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          |
|     RESULT_CODE:              |     Contains a numeric   bit that indicates one or many result messages. Examples of result messages   are Approved, Decline, or Unpaid Check Limit Exceeded.  A complete list of result codes is located   in the Authorization   Response Types XSD.  The host system should conduct a bit   comparison of the RESULT_CODE to determine exactly how the transaction was   processed and from there can determine exactly what action to take if any.                                                                                                                                                                                                                                                                             |
|     TYPE_CODE:                |     Contains a numeric   bit that indicates one or many type messages.    The host system should conduct a bit comparison of the TYPE_CODE   element to determine additional detailed information about the transaction   which can be provided to the user.    Examples of type messages are Personal Check, Business Check, or   Voided Check. A complete list of type codes is located in the Authorization   Response Types XSD.                                                                                                                                                                                                                                                                                               |
|     CODE:                     |     Contains the text   message with the Authorization Number if the transaction was approved or   additional information if the transaction was not approved.  The CODE element should be used by the host   system to display and record any authorization numbers or additional   information.                                                                                                                                                                                                                                                                                                                                                                                                                                  |
|     MESSAGE:                  |     Contains   additional text and should be used by the host system to display and record   any additional information about the transaction.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |
|     TOKEN:                    |     Contains the   return Token that is used in place of the Account Type, Routing Number, and   Account Number. This token can then be used for future transactions.  NOTE: This is only available   when using a Token or when requesting a Token.                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |

## **Single Certification Check Types**

### **Check Limit Exceeded**
The check limit for processing single certification checks is $25. If a check amount in excess of $25 is sent to the Authorization Gateway during development or certification phases then the Authorization Gateway will return “Check Limit Exceeded – Decline”.

When processing a single certification check for Check Limit Exceeded you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000018 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas. Finally, you will need to include a check amount larger than $25 in the CHECK_AMOUNT element. If the request XML Data Packet is valid then this will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  D
 - RESPONSE_TYPE_TEXT:  DECLINED
 - RESULT_CODE:  136
 - TYPE_CODE:  256
 - CODE:  DECLINE CHECK LIMIT EXCEEDED
 - MESSAGE:   DECLINE CHECK LIMIT EXCEEDED

If a transaction is declined the Authorization Gateway will return an 8 in the RESULT_CODE element which indicates a Decline Message. In the returned response above the RESULT_CODE element has a value of 136. If the host system is setup to do a bit comparison of the value in the RESULT_CODE, you will discover that the 136 is made of an 8 indicating a Decline Message and 128 which indicates that the transaction limit has been exceeded.  The fixed decline response also contains a value of 256 in the TYPE_CODE element. This indicates that the host system was unable to determine if this was the first time the check was presented or if it is a representment.

### **Decline**
When processing a single certification check for Decline you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000034 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas.   If the request XML Data Packet is valid then this routing number will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  D
 - RESPONSE_TYPE_TEXT:  DECLINED
 - RESULT_CODE:  520
 - TYPE_CODE:  4100
 - CODE:  DECLINE CHECK 5 UNPAID (ALL) AMT=$5478 GLOBAL eTELECOM 888-481-0757
 - MESSAGE:   DECLINE CHECK 5 UNPAID (ALL) AMT=$5478 GLOBAL eTELECOM 888-481-0757

If a transaction is declined the Authorization Gateway will return an 8 in the RESULT_CODE element which indicates a Decline Message. In the returned response above the RESULT_CODE element has a value of 520. If the host system is setup to do a bit comparison of the value in the RESULT_CODE, you will discover that the 520 is made of an 8 indicating a Decline Message and 512 which indicates that the unpaid check Limit has been exceeded.  The fixed decline response also contains a value of 4100 in the TYPE_CODE element. This again indicates an internal override was done because the Authorization Gateway is returning a predetermined fixed response. However, if the host system is setup to conduct a bit comparison on the value of the TYPE_CODE element it can also be determined that TYPE_CODE also contains a 4, which indicates a Business Check was sent for processing.

### **Void**
When voiding a previously approved single certification check you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000018, 490000021, or 490000047 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “V”.  This milestone has been built into the development phase so that you can incorporate this functionality into your host system. If the request XML Data Packet is valid then a Void identifier for previously approved transaction with the routing numbers noted above will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  A
 - RESPONSE_TYPE_TEXT:  APPROVED
 - RESULT_CODE:  0
 - TYPE_CODE:  5120
 - CODE: VOID ACCEPTED
 - MESSAGE:  VOID ACCEPTED

You should note that the returned information for a voided transaction contains a RESULT_CODE of 0. This indicates that the void was approved, but it also illustrates the importance of examining the information contained with the TYPE_CODE. If the host systems interface with the Authorization Gateway was only set to interpret the RESULT_CODE, the full meaning of the overall response would be lost. In this case the TYPE_CODE returned in the response XML Data Packet contains 5120. A bit comparison of this value indicates that the value contains 1024 indicating a voided check, and 4096 indicating that there was an internal override due to a predetermined fixed response being returned.  

### **Reversal**
When reversing a previously approved single certification check you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000018, 490000021, or 490000047 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “F”.  This milestone has been built into the development phase so that you can incorporate this functionality into your host system. If the request XML Data Packet is valid then a Reversal identifier for previously approved transaction with the routing numbers noted above will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  A
 - RESPONSE_TYPE_TEXT:  APPROVED
 - RESULT_CODE:  0
 - TYPE_CODE:  5120
 - CODE: REVERSAL ACCEPTED
 - MESSAGE:  REVERSAL ACCEPTED

### **Credit**
When processing a single certification check for Authorization you will need to invoke the ProcessSingleCertificationCheck web method.  A credit transaction is processed with a negative sign in front of the amount.  Set the routing number to 490000018 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas.  If the request XML Data Packet is valid then this routing number will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  A
 - RESPONSE_TYPE_TEXT:  APPROVED
 - RESULT_CODE:  0
 - TYPE_CODE:  4096
 - CODE:  AUTH NUM 272-172
 - MESSAGE:   APPROVAL

### **Manager Needed**
When processing a single certification check for Manager Needed you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000021 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas.   If the request XML Data Packet is valid then this routing number will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  W
 - RESPONSE_TYPE_TEXT:  Warning
 - RESULT_CODE:  132
 - TYPE_CODE:  4100
 - CODE: MANAGER NEEDED CHECK TOO LARGE  
 - MESSAGE: MANAGER NEEDED CHECK TOO LARGE  

If a transaction is returned with a warning message, the RESULT_CODE element will contain a 4. In the above response message, a bit comparison will show that the RESULT_CODE element also contains a 128 which indicates that the transaction limit has been exceeded.  The host system should be setup to recognize warning messages and any other additional information contained within the RESULT_CODE element.  In this case the MESSAGE element indicates that the Manager is needed because the check is too large. The TYPE_CODE again shows that 4096 was returned indicating that there was an internal override due to a predetermined fixed response being returned as well as a 4 indicating a Business Check was sent for processing. 

If the host system receives a warning message back and indicates “MANAGER NEEDED” and you are not doing PPD, then you have the option of sending an override request packet back to the Authorization Gateway.  The override request is created by sending the same request XML Data Packet back to the Authorization Gateway. However, you must change the value of the IDENTIFIER element to “O”. You also have the option of changing the values of the TRANSACTION_ID element and REQUEST_ID attribute so that your host system can record and track the override request as a separate transaction. In this instance you also have the option of changing the value in the CHECK_AMOUNT element.  Again, identifying a request XML Data Packet as an override will void the previous transaction and input a new transaction in its place, and your host system will receive an authorization in return.

### **Represented Check**
When processing a single certification check for Re-Presented Check you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000047 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas.   If the request XML Data Packet is valid then this routing number will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  W
 - RESPONSE_TYPE_TEXT:  Warning
 - RESULT_CODE:  4
 - TYPE_CODE:  4228
 - CODE: MANAGER NEEDED REPRESENTED CHECK
 - MESSAGE: MANAGER NEEDED REPRESENTED CHECK  

If a transaction is returned with a warning message, the RESULT_CODE element will contain a 4.  In this case the MESSAGE element indicates that the Manager is needed because this is a represented check. The TYPE_CODE in this response contains a lot of information. A bit comparison will show that the value of 4228 in the TYPE_CODE element contains 128 which indicates a represented check as well as 4096 indicating that there was an internal override due to a predetermined fixed response being returned, and a 4 indicating a Business Check was sent for processing.  The host system should be able to recognize that a warning message was received from the Authorization Gateway and that it was a represented check. 

If the host system receives a warning message back and indicates “MANAGER NEEDED” and you are not doing PPD, then you have the option of sending an override request packet back to the Authorization Gateway.  The override request is created by sending the same request XML Data Packet back to the Authorization Gateway. However, you must change the value of the IDENTIFIER element to “O”. You also have the option of changing the values of the TRANSACTION_ID element and REQUEST_ID attribute so that your host system can record and track the override request as a separate transaction. Again, identifying a request XML Data Packet as an override will void the previous transaction and input a new transaction in its place, and your host system will receive an authorization in return.

### **No ACH**
When processing a single certification check for No ACH Check you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000050 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas.   If the request XML Data Packet is valid then this routing number will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  D, VA
 - RESPONSE_TYPE_TEXT:  Decline, Verification Approved
 - RESULT_CODE:  8,0
 - TYPE_CODE:  512, 768
 - CODE: DECLINE, NO ACH
 - MESSAGE: DECLINE, NO ACH

### **For SEC Codes (WEB, TEL, PPD, or CCD)**
If a transaction is returned with a Decline message, the RESULT_CODE element will contain an 8. In this case the MESSAGE element indicates that the transaction is Declined because of the type of SEC code assigned to the terminal. The TYPE_CODE in this response contains a lot of information. A bit comparison will show that the value of 512 in the TYPE_CODE element means that this is a Block for ACH transaction.  The host system should be able to recognize that a warning message was received from the Authorization Gateway and that it was a Decline with No ACH. 

### **For All Other SEC Codes.**
If a transaction is returned with a Verification Approved message, the RESULT_CODE element will contain a 0. In this case the MESSAGE element indicates that the transaction is Verification Approved. The TYPE_CODE in this response contains a lot of information. A bit comparison will show that the value of 768 in the TYPE_CODE element contains 512 which indicates a Block for ACH and a 256 which indicates it is also for an Unknown Presentment.

### **MICR ERROR**
When processing a single certification check for MICR ERROR Check you will need to invoke the ProcessSingleCertificationCheck web method and set the routing number to 490000015 in the ROUTING_NUMBER element of the request XML Data Packet. You will also have to set the value of the IDENTIFER element to “R” if you are using a PPD or CCD schema or “A” for all other schemas.   If the request XML Data Packet is valid then this routing number will trigger the Authorization Gateway to return a response with the following information to the host system:

 - RESPONSE_TYPE:  VE
 - RESPONSE_TYPE_TEXT: Verification Error
 - RESULT_CODE:  2
 - TYPE_CODE:  0
 - CODE: MICR ERROR
 - MESSAGE: MICR ERROR  

If a transaction is returned with a Verification Error message, the RESULT_CODE element will contain a 2. In this case the MESSAGE element indicates that the transaction is a MICR ERROR. The TYPE_CODE in this response contains a lot of information. A bit comparison will show that the value of 0 in the TYPE_CODE element means that this is Nothing other than an Error.  The host system should be able to recognize that a warning message was received from the Authorization Gateway and that it was a MICR ERROR and that no other information is provided. 

## **Exception Handling**
Incorporating exception handling into your host system for the Authorization Gateway interface is important so that the host system can check to ensure that nothing unexpected occurred during processing.  There are basically two reasons the Authorization Gateway may return an exception in the response XML Data Packet. 

Although the Authorization Gateway has been rigorously tested it is possible that an internal error may occur. If this happens the Authorization Gateway will return an EXCEPTION element with a message of “An internal error occurred. The Transaction was NOT processed”. If this exception is return to the host system our software team will be immediately notified with detailed information about the problem and will work to correct the issue. We work hard to ensure these types of exceptions do not occur, but your integration team should understand what internal errors mean, how they are handled, and configure the host system to take appropriate action.

 The Authorization Gateway may also return exception messages if there are authentication, authorization, or data related errors. The message for these types of exceptions will vary, but the host system will receive a detailed message within the EXCEPTION element that outlines exactly what the problem was. These types of exceptions are built into the Authorization Gateway by design and the Authorization Gateway relies on the host system to resolve the issue.

We expect that your integration team has included at least a minimal level of exception handling into your host system prior to beginning the Certification Phase.

If an error occurs within the Authorization Gateway, the XML string response will detail the reason for the error within an Exception element. The Exception element will NOT be present if an error did not occur. However, should an error occur, the Exception element may be found as a child element of either the Response element, or the Transaction element.

### EXCEPTION **Element – Example as a child of the RESPONSE element**
```XML
<? Xml version=”1.0” encoding=”utf-8” ?> 
<RESPONSE xmlns:xsd=”http://www.w3.org/2001/XMLSchema” xmlns:xsi=”http://www.w3.org/2001/XMLSchema-instance” REQUEST_ID=””>
   <EXCEPTION>
	<MESSAGE>An internal error occurred. The transaction was NOT Processed.</MESSAGE> 
   </EXCEPTION>
</RESPONSE>
```

### **The Exception element will contain the following elements.**

| MESSAGE: | Contains text information about the exception |
|----------|-----------------------------------------------|

### **Request an Archived Response**
Each time a valid data packet request is processed the Authorization Message that is returned is archived. To maintain a high level of performance Authorization Messages are archived asynchronously while the original Authorization Message is returned to the requestor.

If needed an Authorization Message for a previously processed transaction can be requested again by invoking the GetArchivedResponse web method.  It is important to note that the transaction is not processed again, only the original Authorization Message that was archived is returned. Each Authorization Message is archived along with the unique user defined Request ID and Terminal ID that was provided in the data packet request. The GetArchivedResponse web method accepts the Request ID as an input parameter and will return the original Authorization Message for the given Request ID and Terminal ID.
 
_NOTE: If Authorization Gateway Request IDs are duplicated for a given Terminal, only the last Authorization Message for the pairing will be returned._ 


# **Sample Code**

The first step is to add a Web Reference to the web service URL below in your project called com.eftchecks.demo. 

https://demo.eftchecks.com/Webservices/AuthGateway.asmx

## **VB.NET**

**Example Code – GetCertificationTerminalSettings()**
```VB
Public Function GetCertificationTerminalSettings() As String
        ‘This function will get the Certification Terminal Settings for Terminal 1010.

        ‘Create variable to hold Authorization Gateway Response
        Dim myAuthGatewayResponse As String

        ‘Create an instance of the Authorization Gateway
        Dim myAuthGateway As New com.eftchecks.demo.AuthGateway

        ‘Create an instance of the Authorization Header
        Dim myAuthHeader As New com.eftchecks.demo.AuthGatewayHeader

        ‘Populate the Auth Header with the User Name, Password, and Terminal ID
        With myAuthHeader
            .UserName = “myUserNameGoesHere”
            .Password = “myPasswordGoesHere”
            .TerminalID = 1010
        End With

        ‘Apply the Auth Header to the Auth Gateway
        myAuthGateway.AuthGatewayHeaderValue = myAuthHeader

        ‘Get the Certification Terminal Settings from the Authorization Gateway
        myAuthGatewayResponse = myAuthGateway.GetCertificationTerminalSettings()

        ‘Create a new XML Document for the Certification Terminal Settings
        Dim myTerminalSettings As New System.Xml.XmlDocument

        ‘Load the Certification Terminal Settings XML into an XML Document
        myTerminalSettings.LoadXml(myAuthGatewayResponse)

        ‘Return the Certification Terminal Settings
        Return myTerminalSettings.OuterXml.ToString

    End Function
```

## **C#**
```CSharp
public string GetCertificationTerminalSettings() 
{ 
  //This function will get the Certification Terminal Settings for Terminal 1010. 
    
  //Create variable to hold Authorization Gateway Response 
  string myAuthGatewayResponse; 
    
  //Create an instance of the Authorization Gateway 
  com.eftchecks.demo.AuthGateway myAuthGateway = new com.eftchecks.demo.AuthGateway(); 
    
  //Create an instance of the Authorization Header   
  com.eftchecks.demo.AuthGatewayHeader myAuthHeader = new    
  com.eftchecks.demo.AuthGatewayHeader(); 
    
  //Populate the Auth Header with the User Name, Password, and Terminal ID 
	{ 
	   myAuthHeader.UserName = “myUserNameGoesHere”; 
	   myAuthHeader.Password = “myPasswordGoesHere”; 
	   myAuthHeader.TerminalID = 1010; 
	} 
    
  //Apply the Auth Header to the Auth Gateway 
  myAuthGateway.AuthGatewayHeaderValue = myAuthHeader; 
    
  //Get the Certification Terminal Settings from the Authorization Gateway 
  myAuthGatewayResponse = myAuthGateway.GetCertificationTerminalSettings(); 
    
  //Create a new XML Document for the Certification Terminal Settings 
  System.Xml.XmlDocument myTerminalSettings = new System.Xml.XmlDocument(); 
    
  //Load the Certification Terminal Settings XML into an XML Document 
  myTerminalSettings.LoadXml(myAuthGatewayResponse); 
    
  //Return the Certification Terminal Settings 
  return myTerminalSettings.OuterXml.ToString; 
    
}
```


## **SOAP Message Sample**
```XML
<?xml version=”1.0” encoding=”utf-8”?>
<soap:Envelope xmlns:xsi=”http://www.w3.org/2001/XMLSchema-instance” xmlns:xsd=”http://www.w3.org/2001/XMLSchema” xmlns:soap=”http://schemas.xmlsoap.org/soap/envelope/”>
  <soap:Header>
    <AuthGatewayHeader xmlns=”http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway”>
      <UserName>GATEWAYUserName</UserName>
      <Password>GATEWAYPassword</Password>
      <TerminalID>1210</TerminalID>
    </AuthGatewayHeader>
  </soap:Header>
  <soap:Body>
    <ProcessSingleCertificationCheck xmlns=”http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway”>
      <DataPacket>&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot; standalone=&quot;no&quot;?&gt;
        &lt;AUTH_GATEWAY REQUEST_ID=&quot;8949a6093fbc414b871eb65e019a8f08&quot;&gt;
        &lt;TRANSACTION&gt;
        &lt;TRANSACTION_ID&gt;&lt;/TRANSACTION_ID&gt;
        &lt;MERCHANT&gt;
        &lt;TERMINAL_ID&gt;1210&lt;/TERMINAL_ID&gt;
        &lt;/MERCHANT&gt;
        &lt;PACKET&gt;
        &lt;IDENTIFIER&gt;A&lt;/IDENTIFIER&gt;
        &lt;ACCOUNT&gt;
        &lt;ROUTING_NUMBER&gt;490000018&lt;/ROUTING_NUMBER&gt;
        &lt;ACCOUNT_NUMBER&gt;999999&lt;/ACCOUNT_NUMBER&gt;
        &lt;CHECK_NUMBER&gt;9999&lt;/CHECK_NUMBER&gt;
        &lt;ACCOUNT_TYPE&gt;Checking&lt;/ACCOUNT_TYPE&gt;
        &lt;/ACCOUNT&gt; &lt;CONSUMER&gt;
        &lt;FIRST_NAME&gt;Doug&lt;/FIRST_NAME&gt;
        &lt;LAST_NAME&gt;Fresh&lt;/LAST_NAME&gt;
        &lt;ADDRESS1&gt;22 West Way&lt;/ADDRESS1&gt;
        &lt;ADDRESS2&gt;&lt;/ADDRESS2&gt;
        &lt;CITY&gt;Los Angls Afb&lt;/CITY&gt;
        &lt;STATE&gt;CA&lt;/STATE&gt;
        &lt;ZIP&gt;90009&lt;/ZIP&gt;
        &lt;PHONE_NUMBER&gt;2073331234&lt;/PHONE_NUMBER&gt;
        &lt;DL_STATE&gt;&lt;/DL_STATE&gt;
        &lt;DL_NUMBER&gt;&lt;/DL_NUMBER&gt;
        &lt;COURTESY_CARD_ID&gt;&lt;/COURTESY_CARD_ID&gt;
        &lt;/CONSUMER&gt;
        &lt;CHECK&gt;
        &lt;CHECK_AMOUNT&gt;24.55&lt;/CHECK_AMOUNT&gt;
        &lt;/CHECK&gt;
        &lt;/PACKET&gt;
        &lt;/TRANSACTION&gt;
        &lt;/AUTH_GATEWAY&gt;
      </DataPacket>
    </ProcessSingleCertificationCheck>
  </soap:Body>
</soap:Envelope>
```


## **Code Sample Kits**

Java, VB.Net and PHP Sample Kits are available via FTP.

FTP: 		sftp.eftchecks.com

UserID:     	SampleKits

Password:   	60cJSK13%0ymgzab

## **Contact Information**
For questions or to receive certification and live username/passwords and URLs please contact:

Integration Department
integration@eftsupport.com
