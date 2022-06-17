# **Overview**

Our Application Gateway is designed to accommodate various input requirements, allowing development of a single interface configured to handle many different scenarios.

The Application Gateway uses web services to present distributed methods for integration into client applications, and an interface can be developed with any programming language that can consume a web service.

We use Extensible Markup Language (XML), to send data packet requests and receive responses from the Authorization Gateway.  Simple Object Access Protocol (SOAP) is used for XML message exchange over HTTPS, we also employ a custom SOAP header for authentication information. 

### **Table of Contents**
1. [Connection Method](Process.md#connection-method)
2. [Support Electronic Applications](Process.md#supported-electronic-applications)
3. [Submissions](Process.md#submissions)
     - [SOAP Header](Process.md#soap-header)
4. [Web Methods](Process.md#web-methods)
     - [Certification](Process.md#certification-methods)
     	- [ACH Certification Methods](Process.md#ach-certification-methods)
     	- [Check21 Certification Methods](Process.md#check21-certification-methods)
     	- [Gift Certification Methods](Process.md#gift-certification-methods)
     	- [Other Certification Methods](Process.md#other-certification-methods)
     - [Production](Process.md#production-methods)
     	- [ACH Production Methods](Process.md#ach-certification-methods)
     	- [Check21 Producation Methods](Process.md#check21-production-methods)
     	- [Gift Production Methods](Process.md#gift-production-methods)
     	- [Other Producations Methods](Process.md#other-productions-methods)
5. [Data Packet - XML Specification](Process.md#data-packet--xml-specification)
     - [Merchant Application XML Example](Process.md#merchant-application-xml-example)
     - [XML Samples](Process.md#xml-samples)
6. [Data Types](Process.md#data-types)
7. [How to determine which XSD to Use](Process.md#how-to-determine-which-xsd-to-use)
     - [ACH Schema](Process.md#ach-schema)
     - [Check21 Schema](Process.md#check21-schema)
     - [Gift Schema](Process.md#gift-schema)
     - [Other Schema](Process.md#other-schema)

8. [Response](Process.md#response)
     - [Response Messages - Example of Success Response](Process.md#response-message--example-success-response)
9. [Exceptions](Process.md#exceptions)
10. [Sample Code](Process.md#sample-code)
11. [Contact Information](Process.md#contact-information)

# **Connection Method**
Paya Services supports connection via secure (https) webservice using SOAP.  SOAP is a simple XML-based protocol to let applications exchange information over HTTP.  The webservice address used for certification and testing is as follows:

https://demo.eftchecks.com/webservices/AppGateway.asmx

A username and password for certification will be provided upon request.

_NOTE:  A live webservice address, username, and password will be supplied upon successful certification._

# **Supported Electronic Applications**

The following SEC Codes are supported for an electronic application:

 - Telephone Initiated Entry (TEL)
 - Internet Initiated Entry (WEB)
 - Prearranged Payment and Deposit Entry (PPD)
 - Corporate Credit or Debit (CCD)
 - Point-of-Purchase Entry (POP)
 - Check 21 (C21) 
 - Gift Card

# **Submissions**
The Application Gateway has been designed for fast and easy integration with your existing system.  Simply create an xml data packet that conforms to the NewMerchApp xsd for the appropriate SEC Code and pass it to the Application Gateway for processing. To accomplish this the Application Gateway provides 2 web methods; one for certification and one for production.  In addition, each web method contains a custom SOAP header used for authentication.

### **SOAP Header**

The SOAP header will need the following fields:
|     Field       |   Data Type   |     Description                                                |
|:---  |:---  |:---  |
|     UserName    |     String    |     Username   provided by Paya Services for authorization.    |
|     Password    |     String    |     Password   provided by Paya Services for authorization.    |


Example:

```XML 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
  <soapenv:Header>
    <app:RemoteAccessHeader>
      <app:UserName>GATEWAYUserName</app:UserName>
      <app:Password>GATEWAYPassword</app:Password>
     </app:RemoteAccessHeader>
  </soapenv:Header>
```


# **Web Methods**

A definition of the web methods can be found below. Each web method contains a hyperlink to a sample SOAP request and response.

_NOTE: Board Location and Board Terminal will use the Data from Board Merchant._

## **Certification Methods**

Before you are able to go into production, Paya Services requires that you cerify your solution using the follow web methods. These methods do not create live transactions with in the banking system but allow you to setup your solution for testing and ceritifying purposes.

### **ACH Certification Methods**

- [**BoardCertificationMerchant_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationMerchant_ACH.md)

  - **Description**:  This method will process an ACH merchant application and return a detail success or failure response.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationMerchant_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationMerchant_ACH.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationMerchant_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationMerchant_ACH.md#response-1)

- [**BoardCertificationLocation_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationLocation_ACH.md)
  - **Description**:  This method will process an ACH location application and return a detail success or failure response.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationLocation_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationLocation_ACH.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationLocation_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationLocation_ACH.md#response-1)

- [**BoardCertificationTerminal_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationTerminal_ACH.md)
  - **Description**:  This method will process an ACH terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response.  This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationTerminal_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationTerminal_ACH.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationTerminal_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationTerminal_ACH.md#response-1)

- [**CreateCertificationTerminal_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/CreateCertificationTerminal_ACH.md)
  - **Description**:  This method will process an ACH terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response. It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program. This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/CreateCertificationTerminal_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/CreateCertificationTerminal_ACH.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/CreateCertificationTerminal_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/CreateCertificationTerminal_ACH.md#response-1)

### **Check21 Certification Methods**

- [**BoardCertificationMerchant_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationMerchant_Check21.md)
  - **Description**:  This method will process a Check21 merchant application and return a detail success or failure response.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationMerchant_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationMerchant_Check21.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationMerchant_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationMerchant_Check21.md#response-1)


- [**BoardCertificationLocation_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationLocation_Check21.md)

  - **Description**:  This method will process a Check21 location application and return a detail success or failure response.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationLocation_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationLocation_Check21.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationLocation_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationLocation_Check21.md#response-1)

- [**BoardCertificationTerminal_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationTerminal_Check21.md)

  - **Description**:  This method will process a Check21 terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response.  This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationTerminal_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationTerminal_Check21.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationTerminal_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationTerminal_Check21.md#response-1)

- [**CreateCertificationTerminal_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/CreateCertificationTerminal_Check21.md)

  - **Description**:  This method will process a Check21 terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response. It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program. This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/CreateCertificationTerminal_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/CreateCertificationTerminal_Check21.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/CreateCertificationTerminal_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/CreateCertificationTerminal_Check21.md#response-1)

### **Gift Certification Methods**

- [**BoardCertificationMerchant_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationMerchant_Gift.md)

  - **Description**:  This method will process a Gift merchant application and return a detail success or failure response.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationMerchant_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationMerchant_Gift.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationMerchant_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationMerchant_Gift.md#response-1)

- [**BoardCertificationLocation_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationLocation_Gift.md)

  - **Description**:  This method will process a Gift location application and return a detail success or failure response.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationLocation_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationLocation_Gift.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationLocation_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationLocation_Gift.md#response-1)

- [**BoardCertificationTerminal_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationTerminal_Gift.md)

  - **Description**:  This method will process a Gift terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response.  This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationTerminal_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationTerminal_Gift.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationTerminal_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationTerminal_Gift.md#response-1)

- [**CreateCertificationTerminal_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/CreateCertificationTerminal_Gift.md)

  - **Description**:  This method will process a Gift terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response. It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program.  This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/CreateCertificationTerminal_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/CreateCertificationTerminal_Gift.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/CreateCertificationTerminal_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/CreateCertificationTerminal_Gift.md#response-1)

### **Other Certification Methods**

- [**UploadCertificationSupportingDocs**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md)

  - **Description**:  This method will upload a PDF as a byte array of the signed merchant application as well as other supporting documents that need to be attached.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#response-1)

- [**UploadCertificationSupportingDocs2**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs2.md)

  - **Description**:  This method will upload a file as a byte array of the signed merchant application as well as other supporting documents that need to be attached. This method is used during interface testing and certification.    
  - Supported file extensions include DOC, DOCX, XLS, XLSX, TIFF, JPEG, PSD, AI, EPS, PDF, PNG, JPG, GIF, & BMP 
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs2.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs2.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs2.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs2.md#response-1)

- [**RetrieveCertificationMerchantStatus**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RetrieveCertificationMerchantStatus.md)

  - **Description**:  This method will process a merchant id and return a detailed merchant status.  This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RetrieveCertificationMerchantStatus.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RetrieveCertificationMerchantStatus.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RetrieveCertificationMerchantStatus.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RetrieveCertificationMerchantStatus.md#response-1)

- [**RequestCertificationCheckLimitIncrease**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationCheckLimitIncrease.md)

  - **Description**:  This method will request a check limit increase for a specified terminal id.  This method is used during interface testing and certification.
  - **Usage**: After request, use [RetrieveCertificationMerchantStatus](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RetrieveCertificationMerchantStatus.md) to see if the check limit increase was approved and to retrieve your new MID number to input into the physical terminal.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationCheckLimitIncrease.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationCheckLimitIncrease.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationCheckLimitIncrease.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationCheckLimitIncrease.md#response-1)

- [**RequestCertificationBankAccountChange**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationBankAccountChange.md)

  - **Description**:  This method will request a bank account change for a location id.  This method is used during interface testing and certification.
  - **Usage**:  After request, use [UploadCertificationIssueSupportingDocs](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md) to upload signed merchant bank change request as PDF.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationBankAccountChange.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationBankAccountChange.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationBankAccountChange.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationBankAccountChange.md#response-1)

- [**UploadCertificationIssueSupportingDocs**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md)

  - **Description**:  This method will upload a PDF as a byte array of the signed merchant bank change request as well as other supporting documents that need to be attached.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md#response-1)

- [**UploadCertificationIssueSupportingDocs2**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationIssueSupportingDocs2.md)

  - **Description**:  This method will upload a file as a byte array of the signed merchant bank change request as well as other supporting documents that need to be attached.  This method is used during interface testing and certification. 
  - Supported file extensions include DOC, DOCX, XLS, XLSX, TIFF, JPEG, PSD, AI, EPS, PDF, PNG, JPG, GIF, & BMP
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationIssueSupportingDocs2.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationIssueSupportingDocs2.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationIssueSupportingDocs2.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationIssueSupportingDocs2.md#response-1)

- [**RequestCertificationMerchantCancellation**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationMerchantCancellation.md)

  - **Description**:  This method will request a merchant cancellation.  This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationMerchantCancellation.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationMerchantCancellation.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationMerchantCancellation.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationMerchantCancellation.md#response-1)

- [**BoardCertificationMerchants**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationMerchants.md)

  - **Description**:  This method will process an ACH and Check21 merchant application and return a detail success or failure response.  This method is used during interface testing and certification.  
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationMerchants.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationMerchants.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationMerchants.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationMerchants.md#response-1)

- [**BoardCertificationLocations**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationLocations.md)

  - **Description**:  This method will process an ACH and Check21 location application and return a detail success or failure response.  This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationLocations.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationLocations.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationLocations.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationLocations.md#response-1)

- [**CreateCertificationTerminals**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/CreateCertificationTerminals.md)

  - **Description**:  This method will process an ACH and Check21 terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response. It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program. This method is used during interface testing and certification.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/CreateCertificationTerminals.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/CreateCertificationTerminals.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/CreateCertificationTerminals.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/CreateCertificationTerminals.md#response-1)

## Production Methods

Once you have **certified** with our Paya Services team you will need to used the Production Methods listed below to create live transaction within the banking system.

### **ACH Production Methods**

- [**BoardMerchant_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardMerchant_ACH.md)

   - **Replaces**:  [**BoardCertificationMerchant_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationMerchant_ACH.md)
   - **Description**:  This method will process an ACH merchant application and return a detail success or failure response.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardMerchant_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardMerchant_ACH.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardMerchant_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardMerchant_ACH.md#response-1)

- [**BoardLocation_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardLocation_ACH.md)

   - **Replaces**:  [**BoardCertificationLocation_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationLocation_ACH.md)
   - **Description**:  This method will process an ACH location application to add a location to an EXISTING merchant and return a detail success or failure response.  
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardLocation_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardLocation_ACH.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardLocation_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardLocation_ACH.md#response-1)

- [**BoardTerminal_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardTerminal_ACH.md)
  
  - **Replaces**:  [**BoardCertificationTerminal_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/BoardCertificationTerminal_ACH.md)
  - **Description**:  This method will process an ACH terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response.  
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardTerminal_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardTerminal_ACH.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardTerminal_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/BoardTerminal_ACH.md#response-1)

- [**CreateTerminal_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/CreateTerminal_ACH.md)
   
   - **Replaces**:  [**CreateCertificationTerminal_ACH**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/ACH/CreateCertificationTerminal_ACH.md)
   - **Description**:  This method will process an ACH terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response. It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/CreateTerminal_ACH.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/CreateTerminal_ACH.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/CreateTerminal_ACH.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/ACH/CreateTerminal_ACH.md#response-1)
 
### **Check21 Production Methods**
- [**BoardMerchant_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardMerchant_Check21.md)

   - **Replaces**:  [**BoardCertificationMerchant_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationMerchant_Check21.md)
   - **Description**:  This method will process a Check21 merchant application and return a detail success or failure response.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardMerchant_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardMerchant_Check21.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardMerchant_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardMerchant_Check21.md#response-1)
  
- [**BoardLocation_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardLocation_Check21.md)

   - **Replaces**:  [**BoardCertificationLocation_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationLocation_Check21.md)
   - **Description**:  This method will process a Check21 location application to add a location to an EXISTING merchant and return a detail success or failure response. 
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardLocation_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardLocation_Check21.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardLocation_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardLocation_Check21.md#response-1)

- [**BoardTerminal_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardTerminal_Check21.md)

   - **Replaces**: [**BoardCertificationTerminal_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/BoardCertificationTerminal_Check21.md)
   - **Description**:  This method will process a Check21 terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response.  
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardTerminal_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardTerminal_Check21.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardTerminal_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/BoardTerminal_Check21.md#response-1)

- [**CreateTerminal_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/CreateTerminal_Check21.md)

   - **Replaces**:  [**CreateCertificationTerminal_Check21**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Check21/CreateCertificationTerminal_Check21.md)
   - **Description**:  This method will process a Check21 terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response. It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/CreateTerminal_Check21.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/CreateTerminal_Check21.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/CreateTerminal_Check21.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Check21/CreateTerminal_Check21.md#response-1)

### **Gift Production Methods**

- [**BoardMerchant_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardMerchant_Gift.md)

   - **Replaces**:  [**BoardCertificationMerchant_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationMerchant_Gift.md)
   - **Description**:  This method will process a Gift merchant application and return a detail success or failure response.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardMerchant_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardMerchant_Gift.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardMerchant_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardMerchant_Gift.md#response-1)
 
- [**BoardLocation_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardLocation_Gift.md)

   - **Replaces**:  [**BoardCertificationLocation_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationLocation_Gift.md)
   - **Description:  This method will process a Gift location application to add a location to an EXISTING merchant and return a detail success or failure response.  
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardLocation_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardLocation_Gift.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardLocation_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardLocation_Gift.md#response-1)
 
- [**BoardTerminal_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardTerminal_Gift.md)

   - **Replaces**:  [**BoardCertificationTerminal_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/BoardCertificationTerminal_Gift.md)
   - **Description**:  This method will process a Gift terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardTerminal_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardTerminal_Gift.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardTerminal_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/BoardTerminal_Gift.md#response-1)
 
- [**CreateTerminal_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/CreateTerminal_Gift.md)

     - **Replaces**:  [**CreateCertificationTerminal_Gift**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/Gift/CreateCertificationTerminal_Gift.md)
     - **Description**:  This method will process a Gift terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response.  It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program.
	 - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/CreateTerminal_Gift.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/CreateTerminal_Gift.md#request-1)
	 - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/CreateTerminal_Gift.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/Gift/CreateTerminal_Gift.md#response-1)

### **Other Productions Methods**

- [**UploadSupportingDocs**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md)

  - **Replaces**:  [**UploadCertificationSupportingDocs**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md)
  - **Description**:  This method will upload a PDF as a byte array of the signed merchant application as well as other supporting documents that need to be attached.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#response-1)  

- [**UploadSupportingDocs2**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs2.md)

  - **Replaces**:  [**UploadCertificationSupportingDocs2**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs2.md)
  - **Description**:  This method will upload a file as a byte array of the signed merchant application as well as other supporting documents that need to be attached.
  - Supported file extensions include DOC, DOCX, XLS, XLSX, TIFF, JPEG, PSD, AI, EPS, PDF, PNG, JPG, GIF, & BMP
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs2.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs2.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs2.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs2.md#response-1)

- [**RetrieveMerchantStatus**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RetrieveMerchantStatus.md)

   - **Replaces**:  [**RetrieveCertificationMerchantStatus**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RetrieveCertificationMerchantStatus.md)
   - **Description**:  This method will process a merchant id and return a detailed merchant status. NOTE: The Output will return a more detailed XML if the Merchant is approved.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RetrieveMerchantStatus.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RetrieveMerchantStatus.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RetrieveMerchantStatus.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RetrieveMerchantStatus.md#response-1)
- [**RequestCheckLimitIncrease**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestCheckLimitIncrease.md)

   - **Replaces**:  [**RequestCertificationCheckLimitIncrease**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationCheckLimitIncrease.md)
   - **Description**:  This method will request a check limit increase for a specified terminal id.  
   - **Usage**: After request, use [RetrieveMerchantStatus](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RetrieveMerchantStatus.md) to see if the check limit increase was approved and to retrieve your new MID number to input into the physical terminal.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestCheckLimitIncrease.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestCheckLimitIncrease.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestCheckLimitIncrease.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestCheckLimitIncrease.md#response-1)

- [**RequestBankAccountChange**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestBankAccountChange.md)

  - **Replaces**:  [**RequestCertificationBankAccountChange**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationBankAccountChange.md)
  - **Description**:  This method will request a bank account change for a location id.  
  - **Usage**:  After request, use [UploadIssueSupportingDocs](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadIssueSupportingDocs.md) to upload signed merchant bank change request as PDF.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestBankAccountChange.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestBankAccountChange.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestBankAccountChange.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestBankAccountChange.md#response-1)

- [**UploadIssueSupportingDocs**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadIssueSupportingDocs.md)

   - **Replaces**:  [**UploadCertificationIssueSupportingDocs**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationSupportingDocs.md)
   - **Description**:  This method will upload a PDF as a byte array of the signed merchant bank change request as well as other supporting documents that need to be attached.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadSupportingDocs.md#response-1)   

- [**UploadIssueSupportingDocs2**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadIssueSupportingDocs2.md)
 
  - **Replaces**:  [**UploadCertificationIssueSupportingDocs2**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/UploadCertificationIssueSupportingDocs2.md)
  - **Description**:  This method will upload a file as a byte array of the signed merchant bank change request as well as other supporting documents that need to be attached. Supported file extensions include DOC, DOCX, XLS, XLSX, TIFF, JPEG, PSD, AI, EPS, PDF, PNG, JPG, GIF, & BMP
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadIssueSupportingDocs2.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadIssueSupportingDocs2.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadIssueSupportingDocs2.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/UploadIssueSupportingDocs2.md#response-1)

- [**RequestMerchantCancellation**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestMerchantCancellation.md)

  - **Replaces**:  [**RequestCertificationMerchantCancellation**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/RequestCertificationMerchantCancellation.md)
  - **Description**:  This method will request a merchant cancellation.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestMerchantCancellation.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestMerchantCancellation.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestMerchantCancellation.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/RequestMerchantCancellation.md#response-1)  

- [**BoardMerchants**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardMerchants.md)

   - **Replaces**:  [**BoardCertificationMerchants**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationMerchants.md)
   - **Description**:  This method will process an ACH and Check21 merchant application and return a detail success or failure response.
   - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardMerchants.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardMerchants.md#request-1)
   - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardMerchants.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardMerchants.md#response-1)
  
- [**BoardLocations**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardLocations.md)

  - **Replaces**:  [**BoardCertificationLocations**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/BoardCertificationLocations.md)
  - **Description**:  This method will process an ACH and Check21 location application to add a location to an EXISTING merchant and return a detail success or failure response.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardLocations.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardLocations.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardLocations.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/BoardLocations.md#response-1)  

- [**CreateTerminals**](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/CreateTerminals.md)

  - **Replaces**:  [**CreateCertificationTerminals**](/Merchant%20Application%20Gateway/Web%20Methods/Certification%20Methods/CreateCertificationTerminals.md)
  - **Description**:  This method will process an ACH and Check21 terminal application to add a terminal to an EXISTING merchant location and return a detail success or failure response. It does not require a terminal to clone. The method also allows a terminal to be boarded for a new Program.
  - **Request**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/CreateTerminals.md#request) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/CreateTerminals.md#request-1)
  - **Response**: [SOAP 1.1](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/CreateTerminals.md#response) | [SOAP 1.2](/Merchant%20Application%20Gateway/Web%20Methods/Production%20Methods/CreateTerminals.md#response-1)

# **Data Packet – XML Specification**
The data packet is an XML string sent using the BoardCertificationMerchant_X and BoardMerchant_X web methods.  The XML data packet must conform to the XSD specified for the transaction type.

***Note about Special Characters:** Because the Data packet is XML, the following special characters must be escaped to be included in the data. 

|     Special Character    |     Symbol    |     Escaped Form     |
|--------------------------|---------------|----------------------|
|     Ampersand            |     &         |     \&amp;           |
|     Less-than            |     <         |     \&lt;            |
|     Greater-than         |     >         |     \&gt;            |
|     Quotes               |     “         |     \&quot;          |
|     Apostrophe           |     ‘         |     \&apos;          |

## **Merchant Application XML Example**

```XML
<Envelope>
	<Body 
	          FileName="261407_28_May_2009_12_05_00_590.xml" 
	          FileDate="2009-05-28T12:05:00.590">
	<NewMerchant 
		isoID="9999" 
		merchCrossRefID="261407" 
		merchName="Test Merchant ACH 1" 
		merchTypeID="49" 
		merchServiceType="GOLD" 
		merchAddress1="123 Main Street" 
		merchCity="Destin" 
		merchState="FL" 
		merchZip="32541" 
		merchPhone="1231231234" 
		merchAchFlatFee="0.29" 
		merchNonAchFlatFee="0.29" 
		merchPercentFee="1.89" 
		merchComments="Food market" 
		merchReturnFee="1.00">
		     <BusinessInfo 
			merchOwnership="3" 
			merchAvgCheckAmount="50.00" 
			merchMaxCheckAmount="200.00" 
			merchTotalTimeInBusiness="456"/>
		     <NewLocation 
			locName="Test Merchant" 
			locCrossRefID="261407" 
			locAddress1="123 Main Street" 
			locCity="Destin" 
			locState="FL" 
			locZip="32541" 
			locPhone="1231231234" 
			locStatementFee="10.00" 
			locMinimumFee="25.00" 
			locFeesRoutingNum="490000018" 
			locFeesAccountNum="123456789">
			locTaxPayerID="123456789">
			locTaxPayerName="Test">
			     <Statement 
				locStatementAddress1="PO Box 1234" 
				locStatementCity="Destin" 
				locStatementState="FL" 
				locStatementZip="32541" 
				locStatementAttn="John Doe"/>
			     <NewPOC 
				pocPrimary="1" 
				pocFirstName="John" 
				pocLastName="Doe" 
				pocTitle="Owner" 
				pocComments="" 
				pocAddress="123 Main Street" 
				pocCity="Destin" 
				pocState="FL" 
				pocZip="32541" 
				pocDOB="1945-10-26" 
				pocSSN="123121111"/>
			     <NewTerminal 
				termCrossRefID="41680" 
				termCheckLimit="500.00" 
				termPeripheral="63" 
				termTypeID="16" 
				termVerificationOnly="0"/>
			     <NewTerminal 
				termCrossRefID="53317" 
				termCheckLimit="500.00" 
				termPeripheral="63" 
				termTypeID="172"
				termVerificationOnly="0"/>
			     <NewTerminal 
				termCrossRefID="296223"
				termCheckLimit="500.00" 
				termPeripheral="63" 
				termTypeID="637" 
				termVerificationOnly="0"/>
			     <NewTerminal 
				termCrossRefID="296228"
				termCheckLimit="500.00" 
				termPeripheral="63" 
				termTypeID="16"
				termVerificationOnly="0"/>
			     <NewTerminal 
				termCrossRefID="296225" 
				termCheckLimit="500.00" 
				termPeripheral="63" 
				termTypeID="637" 
				termVerificationOnly="0"/>
			</NewLocation>
		</NewMerchant>
	</Body>
</Envelope>
```

## **The Application Gateway XML data packet may contain the following elements:**
|Field|Description|
|:---|:---|
| ENVELOPE | Is the parent element and contains all other elements within the New Merchant XML document. | 
| BODY | Contains all of the elements for a given application. |
| FILE NAME | Contains the unique file name for each merchant application. The [File Name] can contain up to 50 alpha-numeric characters. |
| FILE DATE | Contains the date the merchant application file is submitted. The File Date should be in the following format: yyyy-MM-dd HH:mm:ss |
| NEW MERCHANT | Contains all of the elements for the merchant. |
| ISO ID | Contains the ID for the ISO. The ISO ID will be numeric and five digits or less. |
| MERCH CROSS REF ID | Contains the bankcard merchant #. The [Cross Ref ID] can be up to 50 alpha-numeric characters and can include the following: #,-,:, ;, ‘ |
| MERCH NAME | Contains the name of the merchant. The [Merchant Name] can be up to 100 alpha-numeric characters and can include the following: #,-,:, ;, ‘ |
| MERCH TYPE ID | Contains the value that identifies the [type of merchant]. |
| MERCH SERVICE TYPE | Contains the value that identifies the level of [merchant service]. |
| MERCH GIFT SERVICE TYPE | Contains the value that identifies the gift merchant service type. |
| MERCH ADDRESS 1 | Contains the first line of the merchant’s address. The [Address1] can be up to 200 alpha-numeric characters and can include the following: #, -, :, ; |
| MERCH ADDRESS 2 | Contains the second line of the merchant’s address. The [Address2] can be up to 200 alpha-numeric characters and can include the following: #, -, :, ; |
| MERCH CITY | Contains the city of the merchant’s address. The [City] can be up to 50 alpha characters. |
| MERCH STATE | Contains the state or province of the merchant’s address. Valid state and province codes can be found [here]. |
| MERCH ZIP | Contains the [zip code] of the merchant. |
| MERCH PHONE | Contains the merchant phone number. The [Phone Number] is expected as a 10-digit number without a – or ( ). |
| MERCH ACH FLAT FEE | Contains the transaction fee [amount]. |
| MERCH NON ACH FLAT FEE | Contains the transaction fee [amount]. |
| MERCH PERCENT FEE | Contains the discount rate [amount]. |
| MERCH CHECK21 FLAT FEE | Contains the transaction fee [amount]. |
| MERCH CHECK21 NON FLAT FEE | Contains the transaction fee [amount]. |
| MERCH CHECK21 PERCENT FEE | Contains the discount rate [amount]. |
| MERCH CHECK21 PREMIUM FEE | (Optional) (C21 ONLY) Contains the premium discount rate [amount]. |
| MERCH GIFT TRANS FEE | Contains the transaction fee [amount]. |
| MERCH COST PER CARD | Contains the reorder cost [amount]. per card. |
| MERCH GIFT PERCENT FEE | Contains the discount rate [amount]. |
| MERCH RETURN FEE | Contains the return fee [amount]. |
| MERCH COMMENTS | This is an optional element that can contain up to 200 alpha-numeric characters. |
| MERCH MRDC IMAGE FEE | (Optional) Contains the transaction fee [amount]. |
| MERCH ANNUAL FEE | (Optional) Contains the annual fee [amount]. |
| MERCH CHARGEBACK FEE | (Optional) Contains the chargeback fee [amount]. |
| MERCH INVALID TIN FEE | (Optional) Contains the invalid TIN fee [amount]. |
| MERCH NET COMPLIANCE FEE | (Optional) Contains the network compliance fee [amount]. |
| MERCH CANCELLATION FEE | (Optional) Contains the cancellation fee [amount]. |
| MERCH VT TERM FEE | (Optional) Contains the virtual terminal fee [amount]. |
| MERCH PREMIUM PRECENT FEE | (Optional) Contains the premium discount rate [amount]. |
| MERCH READER REPLACEMENT FEE | (Optional) Contains the reader replacement fee [amount]. |
| MERCH MONTHLY SERVICE FEE | (Optional) (C21 ONLY) Contains the monthly service fee [amount]. |
| MERCH MONTHLY MINIMUM FEE | (Optional) (C21 ONLY) Contains the monthly minimum fee [amount]. |
| MERCH REVERSAL FEE | (Optional) Contains the reversal fee [amount]. |
| MERCH BATCH FEE | (Optional) Contains the batch fee [amount]. |
| MERCH URL | (Optional) Website address |
| MERCH SALES REP | (Optional) sales rep name or sales rep ID# |
| PROMO CODE | (Optional) PAYA given PROMO code (NOTE: For C21 this is a separate element. Please check your schema) |
| BUSINESS INFO | Contains all the elements for business info. |
| MERCH OWNERSHIP | Contains the value that identifies the [merchant ownership level]. |
| MERCH AVG CHECK AMOUNT | Contains the merchant’s average check [amount]. |
| MERCH MAX CHECK AMOUNT | Contains the merchant’s max check [amount]. |
| MERCH TOTAL TIME IN BUSINESS | Contains the total number of months the merchant has been in business. |
| GIFT LOYALTY | Contains all of the elements for gift and loyalty. |
| TIME ZONE | Contains the value that identifies the [time zone] of the gift merchant’s location. |
| BUSINESS TYPE | Contains the value that identifies the gift merchant’s [business type]. |
| NEW LOCATION | Contains all of the elements for the location. |
| LOC NAME | Contains the name of the location. The [Location Name] can be up to 100 alpha-numeric characters and can include the following: #,-,:, ;, ‘ |
| LOC CROSS REF ID | Same as the Merch Cross Ref ID unless the location has a different cross ref id. The [Cross Ref ID] can be up to 50 alpha-numeric characters and can include the following: #,-,:, ;, ‘ |
| LOC ADDRESS 1 | Contains the first line of the location’s address. The [Address1] can be up to 200 alpha-numeric characters and can include the following: #, -, :, ; |
| LOC ADDRESS 2 | Contains the second line of the location’s address. The [Address2] can be up to 200 alpha-numeric characters and can include the following: #, -, :, ; |
| LOC CITY | Contains the city of the location’s address. The [City] can be up to 50 alpha characters. |
| LOC STATE | Contains the state or province of the location’s address. Valid state and province codes can be found [here]. |
| LOC ZIP | Contains the [zip code] of the location. |
| LOC PHONE | Contains the location phone number. The [Phone Number] is expected as a 10 digit number without a – or ( ). |
| LOC STATEMENT FEE | Contains the monthly fee [amount]. |
| LOC MINIMUM FEE | Contains the monthly minimum [amount]. |
| LOC FEES ROUTING NUM | Contains the 9-digit [routing number] for location fees. |
| LOC FEES ACCOUNT NUM | Contains the [account number] for the location fees. Valid account numbers should be between 3 and 18 numeric characters. |
| LOC TAX PAYER ID | This is an optional element that can contain up to 9 numeric characters. |
| LOC TAX PAYER NAME | This is an optional element that can contain up to 100 alpha-numeric characters and can include the following: #,-,:, ;, ‘ |
| LOC ACH DESCRIPTOR | (Optional) Contains the name of the location. Can be up to 16 alpha-numeric characters and can include the following: #,-,:, ;, ‘ |
| LOC ACH CODATA | (Optional) Contains the location phone number. The [Phone Number] is expected as a 10 digit number with – and without () |
| CONSUMER CONVENIENCE | (Optional) Contains all the elements for Consumer Convenience Fee. |
| CHARGE CCF | (Optional) Indicate if merchant will charge a consumer convenience fee: 1 for yes, 0 for no. |
| FEE AMOUNT | (Optional) Contains consumer convenience fee amount. |
| FEE INCLUDED IN TRANS | (Optional) Indicate if the convenience fee is included in the transaction: 1 for yes, 0 for no. |
| FEE IS PERCENT | (Optional) Indicate if consumer convenience fee is percent of fee: 1 for yes, 0 for no. |
| FEE PERCENT MINIMUM AMOUNT | (Optional) The minimum fee that would be charged for Convenience to customer even if the % based fee is lower than this threshold. |
| FEE PERCENT MAXIMUM AMOUNT | (Optional) The maximum fee that would be charged for Convenience to the customer even if the % based fee is higher than this threshold. |
| STATEMENT | Contains all the elements for the location statement. |
| LOC STATEMENT ADDRESS 1 | Contains the first line of the statement address. The [Address1] can be up to 200 alpha-numeric characters and can include the following: #, -, :, ; |
| LOC STATEMENT ADDRESS 2 | Contains the second line of the statement address. The [Address2] can be up to 200 alpha-numeric characters and can include the following: #, -, :, ; |
| LOC STATEMENT CITY | Contains the city of the statement address. The [City] can be up to 50 alpha characters. |
| LOC STATEMENT STATE | Contains the state or province of the statement address. Valid state and province codes can be found [here]. |
| LOC STATEMENT ZIP | Contains the [zip code] of the statement address. |
| LOC STATEMENT ATTN | This is an optional element that can contain up to 200 alpha-numeric characters. |
| NEW POC | Contains all of the elements for the POC. |
| POC PRIMARY | Indicate if point of contact is the primary point of contact: 1 for yes, 0 for no. |
| POC FIRST NAME | Contains the first name of the point of contact. The [First Name] can be up to 100 alpha characters. |
| POC LAST NAME | Contains the last name of the point of contact. The [Last Name] can be up to 100 alpha characters. |
| POC TITLE | Contains the title of the point of contact. The [Title] can be up to 100 alpha characters. |
| POC COMMENTS | This is an optional element that can contain up to 200 alpha-numeric characters. |
| POC ADDRESS | Contains the point of contact’s address. The [Address] can be up to 200 alpha-numeric characters and can include the following: #, -, :, ; |
| POC CITY | Contains the city of the point of contact’s address. The [City] can be up to 50 alpha characters. |
| POC STATE | Contains the state or province of the point of contact’s address. Valid state and province codes can be found [here]. |
| POC ZIP | Contains the [zip code] of the point of contact. |
| POC DOB | Contains the date of birth of the point of contact. The Date of Birth should be in the following format: yyyy-MM-dd |
| POC SSN | Contains the point of contact’s social security number. The [SSN] much be 9 numeric characters. |
| POC Email | (Optional) Contains the point of contact’s Email Address. |
| POC Role | (Optional) Contains the point of contact’s Role which can be found in AppGatewayTypes.xsd in the Data Types section. |
| NEW TERMINAL | Contains all the elements for the terminal. |
| TERM CROSS REF ID | Same as the Merch Cross Ref ID unless the terminal has a different cross ref id. The [Cross Ref ID] can be up to 50 alpha-numeric characters and can include the following: #,-,:, ;, ‘ |
| TERM CHECK LIMIT | Contains the max check limit [amount] accepted by the merchant. |
| TERM PERIPHERAL | Contains the value that identifies the [peripheral] used with the terminal. |
| TERM TYPE ID | Contains the value that identifies the [terminal type]. |
| TERM VERIFICATION ONLY | Indicate if the terminal should be a verification only terminal: 1 for yes, 0 for no. |
| TERM LVL2 VERIFICAITON | (Optional) Indicate if the terminal should be level 2 – advanced account verification terminal: 1 for yes, 0 for no. |
| TERM LVL3 VERIFICATION | (Optional) Indicate if the terminal should be level 3 – Identity verification terminal: 1 for yes, 0 for no. |
| TERM SWIFT SETTLE CONSUMER DEBIT | (Optional) Indicate if the terminal wants Swift Settle for consumer debits: 1 for yes, 0 for no. |
| TERM SWIFT SETTLE CONSUMER CREDIT | (Optional) (ACH ONLY) Indicate if the terminal wants Swift Settle for consumer credits: 1 for yes, 0 for no. |
| TERM SWIFT SETTLE MERCHANT DEBIT | (Optional) (ACH ONLY) Indicate if the terminal wants Swift Settle for merchant debits: 1 for yes, 0 for no. |
| TERM OCR | (Optional) Indicate if the terminal is OCR: 1 for yes, 0 for no. |
| TERM MRDC | (Optional) Indicate if the terminal is MRDC: 1 for yes, 0 for no. |
| TERM CLONE FROM TERMINAL ID | Contains the ID for the terminal to copy. The [Terminal ID] is expected as a numeric value. |                                                                                            |

## **XML Samples**

_NOTE: Terminal IDs may change based on the data created._

**Application Samples**:
  - ACH Application Sample:  [NewMerchAppSample_ACH](/Merchant%20Application%20Gateway/XML%20Samples/NewMerchAppSample_ACH.xml)
  - Check21 Application Sample:  [NewMerchAppSample_Check21](/Merchant%20Application%20Gateway/XML%20Samples/NewMerchAppSample_Check21.xml)
  - Gift Application Sample:  [NewMerchAppSample_Gift](/Merchant%20Application%20Gateway/XML%20Samples/NewMerchAppSample_Gift.xml)

**Location Aplication Samples**:
  - ACH Location Application Sample:  [NewLocAppSample_ACH](/Merchant%20Application%20Gateway/XML%20Samples/NewLocAppSample_ACH.xml)
  - Check21 Location Application Sample:  [NewLocAppSample_Check21](/Merchant%20Application%20Gateway/XML%20Samples/NewLocAppSample_Check21.xml)
  - Gift Location Application Sample:  [NewLocAppSample_Gift](/Merchant%20Application%20Gateway/XML%20Samples/NewLocAppSample_Gift.xml)

**Terminal Aplication Samples**:
  - ACH Terminal Application Sample: [NewTermAppSample_ACH](/Merchant%20Application%20Gateway/XML%20Samples/NewTermAppSample_ACH.xml)
  - Check21 Terminal Application Sample:  [NewTermAppSample_Check21](/Merchant%20Application%20Gateway/XML%20Samples/NewTermAppSample_Check21.xml)
  - Gift Terminal Application Sample:  [NewTermAppSample_Gift](/Merchant%20Application%20Gateway/XML%20Samples/NewTermAppSample_Gift.xml)

**Create Terminal Application Samples**:
  - ACH Create Terminal Application Sample:  [NewTermCreateAppSample_ACH](/Merchant%20Application%20Gateway/XML%20Samples/NewTermCreateAppSample_ACH.xml)
  - Check21 Create Terminal Application Sample:  [NewTermCreateAppSample_Check21](/Merchant%20Application%20Gateway/XML%20Samples/NewTermCreateAppSample_Check21.xml)
  - Gift Create Terminal Application Sample:  [NewTermCreateAppSample_Gift](/Merchant%20Application%20Gateway/XML%20Samples/NewTermCreateAppSample_Gift.xml)

**Other Samples**:
  - Board Merchant with multiple SEC Codes Sample:  [NewMerchantsAppSample](/Merchant%20Application%20Gateway/XML%20Samples/NewMerchantsAppSample.xml)
  - Board Location with multiple SEC Codes Sample:  [NewLocationsAppSample](/Merchant%20Application%20Gateway/XML%20Samples/NewLocationsAppSample.xml)
  - Create Terminals with multiple SEC Codes Sample:  [NewTerminalsAppSample](/Merchant%20Application%20Gateway/XML%20Samples/NewTerminalsAppSample.xml)



## **Data Types**
Each element in the XML data packet that is sent to the Application Gateway has a data type that defines the format of the data contained within the element.  The XSD defines which elements are of what data type.  A list and links to the available data types is located below.

  - [Application Gateway Types](/Merchant%20Application%20Gateway/Data%20Types/AppGatewayTypes.xsd)

  - [Merchant Simple Types](/Merchant%20Application%20Gateway/Data%20Types/MerchantSimpleTypes.xsd)

  - [Terminal Simple Types](/Merchant%20Application%20Gateway/Data%20Types/TerminalSimpleTypes.xsd)

  - [States and Provinces](/Merchant%20Application%20Gateway/Data%20Types/StatesAndProvincesSimpleType.xsd)

 <!-- ### **Supporting Documents**

|     SEC Code          |     Document                                                                            |
|-----------------------|-----------------------------------------------------------------------------------------|
|     PPD,   CCD        |                                                                                         |
|                       |     Merchant Application                                                                |
|                       |     Merchant Information Form                                                           |
|                       |     Voided Check w/Business Name                                                        |
|                       |     Business License/Tax License                                                        |
|                       |     One Month Bank Statements                                                           |
|                       |     Copy of Written Authorization   form to be used                                     |
|     WEB               |                                                                                         |
|                       |     Merchant Application                                                                |
|                       |     Merchant Information Form                                                           |
|                       |     Voided Check w/Business Name                                                        |
|                       |     Business License/Tax License                                                        |
|                       |     Previous year’s financials or 3   most recent bank statements                       |
|                       |     Articles of Incorporation                                                           |
|                       |     IRS document verifying TIN#(SS-4)   or most recent tax return signed by preparer    |
|                       |     Copy of Merchant’s   Refund/Warranty Policy                                         |
|                       |     Website address with valid   Security Certificate                                   |
|     TEL               |                                                                                         |
|                       |     Merchant Application                                                                |
|                       |     Merchant Information Form                                                           |
|                       |     Voided Check w/Business Name                                                        |
|                       |     Business License/Tax License                                                        |
|                       |     Copy of Authorization to be used   (written or verbal script)                       |
|                       |     Sample of Merchant’s Sales   material                                               |
|                       |     One Month Bank Statements                                                           |
|                       |     Copy of Merchant’s   Refund/Warranty Policy                                         |
|                       |     Recording Service Setup Form (if   applicable)                                      |
|     Check21,   POP    |                                                                                         |
|                       |     Merchant Application                                                                |
|                       |     Voided Check w/Business Name                                                        | -->

## How to determine which XSD to Use

The example Schema file paths would be as follows:

### **ACH Schema** 

 - ACH Application Schema:  [NewMerchApp_ACH](/Merchant%20Application%20Gateway/XSD%20to%20Use/ACH%20Schema/NewMerchApp_ACH.xsd)
 - New Location Application Schema: [NewLocApp_ACH](/Merchant%20Application%20Gateway/XSD%20to%20Use/ACH%20Schema/newlocapp_ach.xsd)
 - New Terminal Application Schema: [NewTermApp_ACH](/Merchant%20Application%20Gateway/XSD%20to%20Use/ACH%20Schema/newtermapp_ach.xsd) 
 - New Create Terminal Application Schema: [NewTermCreateApp_ACH](/Merchant%20Application%20Gateway/XSD%20to%20Use/ACH%20Schema/newtermCreateapp_ach.xsd)

<sub>For the latest ACH XSD Schemas see: [ACH XDS Schema](/Merchant%20Application%20Gateway/XSD%20to%20Use/ACH%20Schema)</sub>

### **Check21 Schema**

  - Check21 Application Schema: [NewMerchApp_Check21](/Merchant%20Application%20Gateway/XSD%20to%20Use/Check21%20Schema/NewMerchApp_Check21.xsd)  
  - New Location Application Schema: [NewLocApp_Check21](/Merchant%20Application%20Gateway/XSD%20to%20Use/Check21%20Schema/newlocapp_check21.xsd) 
  - New Terminal Application Schema: [NewTermApp_Check21](/Merchant%20Application%20Gateway/XSD%20to%20Use/Check21%20Schema/newtermapp_Check21.xsd)  
  - New Create Terminal Application Schema: [NewTermCreateApp_Check21](/Merchant%20Application%20Gateway/XSD%20to%20Use/Check21%20Schema/newtermCreateapp_Check21.xsd)
   
<sub>For the latest Check21 XSD Schemas see: [Check21 XDS Schema](/Merchant%20Application%20Gateway/XSD%20to%20Use/Check21%20Schema)</sub>
 
### **Gift Schema**

 - Gift Application Schema: [NewMerchApp_Gift](/Merchant%20Application%20Gateway/XSD%20to%20Use/Gift%20Schema/NewMerchApp_Gift.xsd)  
 - New Location Application Schema: [NewLocApp_Gift](/Merchant%20Application%20Gateway/XSD%20to%20Use/Gift%20Schema/newlocapp_gift.xsd)
 - New Terminal Application Schema: [NewTermApp_Gift](/Merchant%20Application%20Gateway/XSD%20to%20Use/Gift%20Schema/newTermapp_gift.xsd)
 - New Create Terminal Application Schema: [NewTermCreateApp_Gift](/Merchant%20Application%20Gateway/XSD%20to%20Use/Gift%20Schema/newTermCreateapp_gift.xsd)

<sub>For the latest Gift XSD Schemas see: [Gift XDS Schema](/Merchant%20Application%20Gateway/XSD%20to%20Use/Gift%20Schema)</sub>

### **Other Schema** 

  - Board Merchant Application Schema: [NewMerchantApp](/Merchant%20Application%20Gateway/XSD%20to%20Use/Other%20Schema/NewMerchantsApp.xsd)
  - Board Location Application Schema: [NewLocationsApp](/Merchant%20Application%20Gateway/XSD%20to%20Use/Other%20Schema/NewLocationsApp.xsd)
  - Create Terminal Application Schema: [NewTerminalsApp](/Merchant%20Application%20Gateway/XSD%20to%20Use/Other%20Schema/NewTerminalsApp.xsd)

<sub>For the latest Other XSD Schemas see: [Check21 XDS Schema](/Merchant%20Application%20Gateway/XSD%20to%20Use/Other%20Schema)</sub>


## **Response**
Each web method in the Application Gateway will return an XML string and detail the success or failure of the submission.  If the application is accepted the following is a sample of an XML response that will be returned.

### **Response Message – Example Success Response**

```XML
<?xml version="1.0" encoding="utf-8"?>
	<RESPONSE xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
	<STATUS>Approved</STATUS>
<MESSAGE>1 merchant(s) created.
0 merchant(s) not created due to errors.

-----------------------
Merchants Created:
Test Merchant ACH 1 (ISO ID: 9999, CrossRef: 261407, Status: AppApprovedandActivated)

</MESSAGE>
  <APP_DATA>
    <Merchant 
		ID="20" 
		Name="Test Merchant ACH 1" 
		Type="Merchant" 
		Active="1" 
		CrossRefID="261407">
		<POC1 
			  FirstName="John" 
			  LastName="Doe" 
			  UserName="JDoe" 
			  Password="6E550E2V" />
		<Location 
			  ID="31" 
			  Name="Test Merchant " 
			  Type="Location" 
			  Active="1" 
			  CrossRefID="261407" 
			  ACHName="TESTMERCHANT">
			<Terminal 
				ID="111163" 
				Name="Lipman Nurit 3000-01 (111163) " 
				Type="Terminal" 
				Active="1" 
				CrossRefID="41680" 
				ManualEntry="N" 
                                         MID="101-111163-609" />
			<Terminal 
				ID="111164" 
				Name="Hypercom T7+-02 (111164) " 
				Type="Terminal" 
				Active="1" 
				CrossRefID="53317" 
				ManualEntry="N" 
				MID="101-111164-609" />
			<Terminal 
				ID="111165" 
				Name="Hypercom T4100-03 (111165) " 
				Type="Terminal" 
				Active="1" 
				CrossRefID="296223" 
				ManualEntry="N" 
				MID="101-111165-609" />
			<Terminal 
				ID="111166" 
				Name="Lipman Nurit 3000-04 (111166) " 
				Type="Terminal" 
				Active="1" 
				CrossRefID="296228" 
				ManualEntry="N" 
				MID="101-111166-609" />
			<Terminal 
				ID="111167" 
				Name="Hypercom T4100-05 (111167) " 
				Type="Terminal" 
				Active="1" 
				CrossRefID="296225" 
				ManualEntry="N" 
				MID="101-111167-609" />
		</Location>
    </Merchant>
  </APP_DATA>
	<VALIDATION_MESSAGE>
		<RESULT>Passed</RESULT>
		<SCHEMA_FILE_PATH />
	</VALIDATION_MESSAGE>
</RESPONSE>
```

### The Application Gateway XML response may contain the following elements:

|     STATUS:         |     Will contain a   text description of the overall status for the application. Status will   either be “Approved” or “Failed”.                                                                                                                                                                                              |
|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     MESSAGE:        |     Will contain a   summary of the success or failure of the merchant application.                                                                                                                                                                                                                                           |
|     APP_DATA:       |     Contains the detailed   Merchant, Location, and Terminal elements.                                                                                                                                                                                                                                                        |
|     Merchant:       |     Contains the   following attributes:                                                                                                                                                                                                                                                                                      |
|                     |     ID:   Contains   the numerical ID for the merchant.     Name:   Contains   the text name of the merchant.     Type:   Contains   the element type. (Merchant)     Active:   Contains   a 1; Indicating that the merchant is active.     CrossRefID:  Contains a user defined ID for cross   referencing the merchant.     |
|     Location:       |     Contains the   following attributes:                                                                                                                                                                                                                                                                                      |
|                     |     ID:   Contains   the numerical ID for the location     Name:   Contains   the text name of the location.     Type:   Contains   the element type. (Location)     Active:   Contains   a 1; Indicating that the merchant is active.     CrossRefID:   Contains   a user defined ID for cross referencing the location.     |
|     Terminal:       |     Contains the   following attributes:                                                                                                                                                                                                                                                                                      |
|                     |     ID:   Contains   the numerical ID for the terminal.     Name:   Contains   the text name of the terminal.     Type:   Contains   the element type. (Terminal)     Active:   Contains   a 1; Indicating that the merchant is active.     CrossRefID:   Contains   a user defined ID for cross referencing the terminal.    |
|     ManualEntry:    |      Contains a type used for internal purposes.                                                                                                                                                                                                                                                                              |

## **Exceptions**

If an error occurs within the Application Gateway the XML string response will detail the reason for the error within an Exception element. The Exception element will NOT be present if an error did not occur. 

EXCEPTION Element – Example as a child of the RESPONSE element

```XML
<?xml version="1.0" encoding="utf-8"?>
<RESPONSE xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
	<VALIDATION_MESSAGE>
		<RESULT>Failed</RESULT>		
		<SCHEMA_FILE_PATH>http://localhost/GETI.eMagnus.WebServices/schemas/app/NewMerchApp_ACH.xsd</SCHEMA_FILE_PATH>
		<VALIDATION_ERROR LINE_NUMBER="1" LINE_POSITION="138">
			<SEVERITY>Error</SEVERITY>
			<MESSAGE>The required attribute 'merchReturnFee' is missing.</MESSAGE>
		</VALIDATION_ERROR>
	</VALIDATION_MESSAGE>
</RESPONSE>
```
 The Exception element will contain the following elements:
-  **MESSAGE** or **VALIDATION_MESSAGE**: Contains text information about the exception.

## **Sample Code**

### **Sample SOAP Message**

```XML
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:app="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
  <soapenv:Header>
    <app:RemoteAccessHeader>
      <app:UserName> GATEWAYUserName </app:UserName>
      <app:Password> GATEWAYPassword</app:Password>
     </app:RemoteAccessHeader>
  </soapenv:Header>
  <soapenv:Body>
    <app:BoardCertificationMerchant_ACH>
      <app:DataPacket>
&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot; ?&gt;
&lt;Envelope&gt;
&lt;Body 
                                    FileName=&quot;261407_28_May_2009_12_05_00_590.xml&quot; 
FileDate=&quot;2009-05-28T12:05:00.590&quot;&gt;
&lt;NewMerchant 
isoID=&quot;9999&quot; 
merchCrossRefID=&quot;261407&quot; 
merchName=&quot;Test Merchant ACH 1&quot; 
merchTypeID=&quot;49&quot; 
merchServiceType=&quot;GOLD&quot; 
merchAddress1=&quot;123 Main Street&quot; 
merchCity=&quot;Destin&quot; 
merchState=&quot;FL&quot; 
merchZip=&quot;32541&quot; 
merchPhone=&quot;1231231234&quot; 
merchAchFlatFee=&quot;0.29&quot; 
merchNonAchFlatFee=&quot;0.29&quot; 
merchPercentFee=&quot;1.89&quot; 
merchComments=&quot;Food market&quot; 
merchReturnFee=&quot;1.00&quot;/&gt;
&lt;BusinessInfo 
merchOwnership=&quot;3&quot; 
merchAvgCheckAmount=&quot;50.00&quot; 
merchMaxCheckAmount=&quot;200.00&quot; 
merchTotalTimeInBusiness=&quot;456&quot; /&gt;
&lt;NewLocation 
locName=&quot;Test Merchant&quot; 
locCrossRefID=&quot;261407&quot; 
locAddress1=&quot;123 Main Street&quot; 
locCity=&quot;Destin&quot; 
locState=&quot;FL&quot; 
locZip=&quot;32541&quot; 
locPhone=&quot;1231231234&quot; 
locStatementFee=&quot;10.00&quot; 
locMinimumFee=&quot;25.00&quot; 
locFeesRoutingNum=&quot;490000018&quot; 
locFeesAccountNum=&quot;123456789&quot;&gt;
locTaxPayerID=&quot;123456789&quot; 
locTaxPayerName=&quot;Test&quot;&gt;
&lt;Statement 
locStatementAddress1=&quot;PO Box 1234&quot; 
locStatementCity=&quot;Destin&quot; 
locStatementState=&quot;FL&quot; 
locStatementZip=&quot;32541&quot; 
locStatementAttn=&quot;Garey Larrabee&quot; /&gt;
&lt;NewPOC 
pocPrimary=&quot;1&quot; 
pocFirstName=&quot;John&quot; 
pocLastName=&quot;Doe&quot; 
pocTitle=&quot;Owner&quot; 
pocComments=&quot;&quot; 
pocAddress=&quot;123 Main Street&quot; 
pocCity=&quot;Destin&quot; 
pocState=&quot;FL&quot; 
pocZip=&quot;32541&quot; 
pocDOB=&quot;1945-10-26&quot; 
pocSSN=&quot;123121111&quot; /&gt;
&lt;NewTerminal 
termCrossRefID=&quot;41680&quot; 
termCheckLimit=&quot;500.00&quot; 
termPeripheral=&quot;63&quot; 
termTypeID=&quot;16&quot; 
termVerificationOnly=&quot;0&quot; /&gt;
&lt;/NewLocation&gt;
&lt;/NewMerchant&gt;
&lt;/Body&gt;
&lt;/Envelope&gt;
</app:DataPacket>
    </app:BoardCertificationMerchant_ACH>
  </soapenv:Body>
</soapenv:Envelope>
```

## **Contact Information**
For questions or to receive certification and live username/passwords and URLs please contact:

Integration Department
integration@eftsupport.com
