# Authorization Gateway Specification & Implementation

# Introduction 

The Authorization Gateway is designed to accommodate various input requirements based on a given terminal’s settings. You can use this single interface to handle many scenarios. Our Authorization Gateway uses web services and can be developed with any programming language that can consume a web service.

We process using SOAP via. XML. Extensible Markup Language (XML) is used to send data packet requests to the Authorization Gateway and to receive a response back. Simple Object Access Protocol (SOAP) is used for XML message exchange over HTTPS. The Authorization Gateway also employs a custom SOAP header for authentication information. 

XML Schema Definitions (XSDs) are used by the Authorization Gateway to validate data packet requests sent by the client. Each terminal will be assigned a published XSD based on the terminal settings. If a data packet request does not conform to its assigned XSD a failed Validation Message response will be returned, otherwise the data packet will be processed as requested.
We do provide sample code in VB.NET and C#. In addition, a complete Authorization Gateway sample solution is available to help further illustrate how to create an interface that uses the Authorization Gateway.

# Overview

The workflow consists of four distinct phases, with each phase culminating in a major milestone
 

Each phase is marked with a single major milestone that represents the successful culmination of all the activities of the phase. In addition to this major event, each phase may also have intermediate milestones leading up to the major milestone. They represent points in time when all team members synchronize the integration effort, and members of the project team agree that they have achieved the objectives of that particular phase.
The individual phases are outlined below and include a table that defines the milestones and can also be used by your team to chart the progress of the integration effort.

## Phase 1:  Preparation

Preparation Phase Milestones:

- Obtain a User Name and Password for Certification:  
This user name and password will be unique to your team and will only allow you to invoke web methods used for certification. _These will be separate from the production credentials you will receive once your certification is complete. 

- Determine your SEC Code(s):  The SEC Codes are defined later in this document and are the main factor in determining what XML Template and Schema to use.

- Determine your XML Template(s):  Once you have determined your SEC Code you can determine which XML Template to use.  The [How to determine which XML Template to Use](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md#how-to-determine-which-xml-template-to-use) section in the [Process](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md) document explains the purpose of the XML templates and will assist you in determining which Template(s) to use.

- Determine your XML Schema(s): Once you have determined your SEC Code you can also determine which XSD will be used to validate your data packet submission.  The [How to determine which XSD to Use](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md#how-to-determine-which-xsd-to-use) section of the [Process](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md) document explains the purpose of the XSDs and will assist you in determining which XSD(s) to use.

- Determine your Certification Terminal IDs: Once you have determined your XSD(s), you can easily find the corresponding Certification Terminal ID listed in the same row as the XSD URL. 

- Establish Connectivity: Create a web reference to the URL defined in the “Connection Method” section. This URL is only good for testing and certification.  A production URL will be provided during the final phase of the integration effort.

- Request Certification Terminal Settings: Successfully invoke the GetCertificationTerminalSettings web method for each Certification Terminal ID previously identified.


### Where Do I Start?
There are several milestones in the Preparation Phase that need to be completed prior to beginning development. These milestones were detailed in the section above, but your first step would be to obtain a user name and password.

It is assumed that you are familiar with working with XML, consuming web services, and with adding SOAP headers. Sample code is provided at the end of this document, and the “Submission” section of this document defines the SOAP header. If you have any questions or need any guidance, please feel free to contact us at the email provided in the “Contact Information” section.

Once you have successfully connected to the Authorization Gateway and are comfortable with adding the SOAP header, the Preparation Phase culminates with the major milestone of invoking the GetCertificationTerminalSettings web method.

The GetCertificationTerminalSettings web method is defined in the “Terminal Settings – XML Specification” section, but essentially this web method can be invoked to request information about a specific certification terminal. This web method does not need to be invoked on a continuous basis, but can be invoked if your implementation team determines that the host system needs to acquire information about the Authorization Gateway Terminal. The invocation of this web method is made part of the Preparation Phase because it is the simplest web method and requires no input parameters.

It is important to note that the GetCertificationTerminalSettings has a sister web method called GetTerminalSettings that performs the same function for production terminals, but we will go into this in more detail during the Production Phase.

### What are the different Standard Entry Class (SEC) Codes?

The Authorization Gateway uses the Standard Entry Class (SEC) codes to determine what information is required to be sent in the submission. The National Automated Clearing House Association (NACHA) requires the use of SEC Codes for each transaction settled through the Automated Clearing House (ACH). Each code identifies what type of transaction occurred. In addition, the SEC_CODE element in the response XML Data Packet form the GetCertificationTerminalSettings web method will include the SEC code used from the terminal ID provided. A definition of each of the SEC codes used by the Authorization Gateway can be found below.
- **Prearranged Payment and Deposit Entry (PPD):** A prearranged payment and deposit entry is either a standing or single entry authorization where the funds are transferred to or from a consumers account.
- **Corporate Credit or Debit (CCD):** A prearranged payment and deposit entry is either a standing or single entry authorization where the funds are transferred to or from a business account.
- **Internet Initiated Entry (WEB):** An internet initiated entry is a method of payment for goods or services made via the internet.
- **Telephone Initiated Entry (TEL):** A telephone initiated entry is a payment for goods or services made with a single entry debit with oral authorization obtained from the consumer via the telephone.
- **Point-of-Purchase Entry (POP):** The Point-of-Purchase method of payment is for purchases made for goods or services in person by the consumer. These are non-recurring debit entries. A check reading device must be used to capture the routing number, account number, and check number from the source document (check). The source document cannot be previously used for any prior POP entry, and the source document must be voided and returned to the customer at the point-of-purchase. In addition, a signed receipt must be obtained at the point-of-purchase and retained for 2 years from the settlement date. The “Authorization Requirements” section in the Authorization Gateway Specification document contains additional information on the receipt requirements.
- **Check 21 (C21):** Although not an SEC Code C21 is used to denote Check 21 transactions. Check 21 requires a check reading device capture the routing number, account number, and check number from the source document (Check) as well as capture images of both the front and back of the source document.
- **Back Office Conversion Entry (BOC):** A single debit entry to an account for in-person purchases or payments made at the point-of-purchase.


## Phase 2: Development

During this phase the integration team will be responsible for ensuring the host application can properly handle **Authorizations**, **Declines**, **Voids**, **Reversals** and in some cases **Credits**, **Represented Checks** and **Manager Overrides**. 

The section [Process](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md) document, entitled [Interfacing with the Authorization Gateway](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md#phase-2-development), details the business logic necessary to complete each milestone in this phase. The completion of this phase marks the opportunity to begin the Certification Phase.


Development Phase Milestones

- Validation Handling: Successfully validate a request Data Packet against your published XSD(s) and have the host system be able to handle failed validation messages.
Process Single Certification Check:
Authorization: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate an Authorization response.

- Check Limit Exceeded: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate a Check Limit Exceed response.

- Decline: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate a Decline response.

- Void: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate a Void response for a previously authorized check.

- Reversal: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate a Reversal response.

- Credit: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate an Authorization response.  

- Manager Needed: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate a Manager Needed response, and successfully perform an override.

- Represented Check: Successfully invoke the ProcessSingleCertificationCheck web method and send a data packet with the necessary information to generate a Represented Check Response, and successfully perform an override.

- Exception Handling: Include exception handling in the host system.

- Request a Certification Script: Upon successful completion of the above milestones you can request a certification script.  

### Interfacing with the Authorization Gateway

The best place to start is to determine your application architecture for interfacing with the Authorization Gateway.  You will choose which published XSD(s) your XML data packets will be validated against, and you also know the URL for the corresponding XML template(s) for your schema(s).  
This leaves you with the following possibilities for creating your XML data packets that are sent to the Authorization Gateway:

1.	XML Schema Definition Tool (such as Xsd.exe for .Net or Svcutil.exe) to generate a class based on the published XSD, populate the class properties, and then serialize the object.
2.	LINQ to XML to build your xml and populate the elements and attributes.
3.	You can load the XML template into an XML document object and use Xpath to populate the elements and attributes.
4.	You can build your own XML document and use Xpath to populate the elements and attributes.

We recommend you leverage the published [XSDs](https://github.com/TKESuperDave/PayaServices/tree/XML/Authorization%20Gateway/XDS) and [XML](https://github.com/TKESuperDave/PayaServices/tree/XML/Authorization%20Gateway/XML) templates and use either the first or second options when creating the data packets to be sent. All these methods use the .NET platform however other languages have successfully been used. 

We have provided example request XML Data Packets to assist your integration team with getting started. A link to these examples can be found at the end of the “How to determine which XML Template to Use” section above.


Once you have determined how you will create your XML data packets in your system; we recommend reviewing each element and attribute and when they are best used. The Data Packet – XML Specification(#DataPacketXMLSpecification) provides links to XML templates, and text description of the regular expressions, data types, or enumerations that control the allowed data formats for each element.



###  **Data Identification**
The specification for the Authorization Gateway XML Data Packet allows you to optionally identify your data in two distinct ways. The **REQUEST_ID** attribute contained within the AUTH_GATEWAY element and the **TRANSACTION_ID** element. These are built in so your host system can match a response from the Authorization Gateway with the original request. 

These identifiers are not inherently unique, rather the Authorization Gateway leaves the responsibility of determining if an identifier is unique to the host system. It is not required that optional identifiers are unique, but it is strongly recommended. If an identifier is not unique it may become difficult for your host system to match responses or retrieve archived responses.  In the examples we have provided, GUIDs have been used as optional identifiers. The use of GUIDs ensures uniqueness, but any value can be used as an identifier, including database identity column values. It is also important to note that if the implementation team determines an identifier needs to be unique, that it only needs to be unique for a specific terminal ID, but it can be unique across all terminal IDs for a given user. 
 

**The REQUEST_ID** attribute should be a unique identifier that is used to identify the overall data packet. When your data packet is received by the Authorization Gateway it is processed, and asynchronously stored along with the response. This is done so the host system can invoke the GetArchivedResponse web method to request a previous response. 

The GetArchivedResponse web method accepts the REQUEST_ID as an input parameter and will return the corresponding response.  It is important to note that the GetArchivedResponse is a production only web method and can only be effectively used if the host system keeps track of and submits values in the REQUEST_ID attribute.  The value in the REQUEST_ID attribute of the request data packet is also returned in the response data packet in the REQUEST_ID attribute of the RESPONSE element.

**The TRANSACTION_ID** element should be a unique identifier that is used to identify a specific transaction.  The value contained in the TRANSACTION_ID element is recorded by the Authorization Gateway but is not used internally and cannot be used to request a specific transaction. The value in the TRANSACTION_ID element is however returned in the response data packet in the TRANSACTION_ID element within the parent AUTHORIZATION_MESSAGE element. This was done so that your host system can match the response for a specific transaction to an internal record in the host system. 

### **Valid Identifiers**
Each request XML Data Packet must contain a valid identifier for its schema. The identifier you use will change depending on the context of the transaction being sent. Your integration team will become more familiar with the different identifiers as you begin to work on each milestone. However, a list of all the valid identifiers can be found below.  

|                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |
|----------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     Authorize (A)    |     This   is used in schemas for POP, TEL, WEB, and Check 21 to indicate that an   authorization is requested for the XML Data Packet being sent.  It is also used to process credit   transactions.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         |
|     Recurring (R)    |     This   is used in schemas for PPD, CCD, TEL and WEB to indicate that an   authorization is requested for a single or reoccurring transaction.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             |
|     Void (V)         |     This   is used in schemas for PPD, CCD, POP, TEL, WEB, and Check 21 to void a   previously authorized transaction. However, it should be noted that   transactions can only be voided on the same calendar day they were   authorized.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    |
|     Override (O)     |     This   is used in schemas for POP, TEL, and Check 21 when the host system receives a   manager needed message to void the previous transaction and input a new   transaction in its place.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                |
|     Payroll (P)      |     This   is used in schemas for POP and Check 21 for business and payroll checks. What   this does is NOT link the driver’s license to the routing/ account numbers   since the person writing/cashing the check is usually not the business.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |
|     Update (U)       |     This   is used in schemas for POP and Check 21 for OCR transactions that already   have complete data in the data packet. It forces the transaction to run as a   normal POP or Check 21 transaction on an OCR terminal. This is normally done   when a change is needed to a transaction that was submitted under a normal   OCR transaction. Example: A transaction is sent through using the OCR engine.   The data that is returned does not match the image. If the transaction was   still successful and a change is warranted, a Void Transaction is sent. Then   another transaction with updated data (from the response and corrected from   user) is sent back through the system with a complete data packet and “U” as   the identifier. If the transaction failed, other actions will need to be taken.    |

### **Verification Only**
If the gateway terminal is setup as verification only or the VERIFICATION_ONLY element is set to true, then the transaction will be processed as verification only. This means that an authorization will be run, but that the check **_will not_** undergo Electronic Check Conversion (ECC) and will have to be taken to the bank for deposit. 
Depending on the merchant’s program, the funds may or may not be guaranteed.

### **Account Section Data**
All PPD, CCD, TEL and WEB schemas define that the ACCOUNT child elements must contain values.  The child elements within the ACCOUNT element for POP and Check 21 (C21) schemas define what ACCOUNT child elements must contain values and what ACCOUNT child elements can be left empty.  All of the child elements within the ACCOUNT element for POP and Check 21 (C21), except the ACCOUNT_TYPE for POP schemas, define the data as optional. This is because for these SEC codes you can either provide the swiped MICR data or provide the routing, account, and check numbers.   If the MICR_DATA, ROUTING_NUMBER, ACCOUNT_NUMBER, and CHECK_NUMBER are all left empty in the request data packet then the transaction cannot be processed. Either the MICR_DATA or the ROUTING_NUMBER, ACCOUNT_NUMBER, and CHECK_NUMBER elements must contain values. 

It is important to note that for POP transactions, that if the swiped MICR data in the MICR_DATA element is missing, but the ROUTING_NUMBER, ACCOUNT_NUMBER, and CHECK_NUMBER elements contain values then the transaction will be processed as verification only; even if the CONTROL_CHAR indicates that the information was retrieved from a check reader. In addition, if the MICR_DATA, ROUTING_NUMBER, ACCOUNT_NUMBER, and CHECK_NUMBER elements all contain values, then the Authorization Gateway will only use the information in the MICR_DATA element and will parse it out overwriting any values sent in the ROUTING_NUMBER, ACCOUNT_NUMBER, and CHECK_NUMBER elements.

### **Identity information**
Identity information needs to be included when the terminal is setup to do identity verification. There are schemas that will handle the validation for terminals that are setup to do identity verification, and the GetCertificationTerminalSettings web method will return a response of “true” in the RUN_IDENTITY_VERIFICATION element. If a terminal is setup to do identity verification, then the host system is required to send either the last 4 of the check writers social security number OR their birth year (not both). 


## Phase 3: Certification
During this phase the integration team will be responsible for sequentially completing the objectives outlined in a “Certification Script” that will be provided. Our integration team will closely monitor each transaction to ensure it is valid, and that the host system is properly configured to handle the various responses. The completion of this phase marks the opportunity to begin the Production Phase. However, if it is determined that the host system needs further refinements, it may be necessary to revert back to the Development Phase to make the necessary changes. 


Certification Phase Milestones:
- Request Certification Script:  Request a certification script from the Integration department.

- Complete the Certification Script:  Successfully complete each objective defined in the certification script.

_You can reach our team by email at integration@eftsupport.com._


### Requesting a Certification Script
Requesting a certification script is the major milestone of the Development Phase. It signifies that your integration team has completed the integration effort and alerts our software team that the host system is ready to undergo certification. It is important that your integration team contact us to request a certification script. If a certification script is not requested, but you begin the Certification Phase, our software team will not be able to properly certify your host system and your team will have to rerun the certification script prior to moving to the Production Phase.

### Beginning Certification
During the certification phase your integration team will be responsible for sequentially completing the objectives in the certification script provided. Your team should now be intimately familiar with the Authorization Gateway and the host system should now be able to handle the completion of these objectives without any problems. During the certification phase our software team will closely monitor each transaction to ensure it is valid, and that the host system is properly configured. We will alert you to the status of the transaction in our system, and advise you if there are any modifications that need to be made to the host system. The successful completion of each objective outlined in the certification script signifies the completion of the major milestone for the Certification Phase and marks the opportunity to begin the Production Phase.

## Phase 4:  Production
The Production Phase is the final phase of the integration effort.  During this phase the integration team will be responsible for configuring the host application for production. This includes obtaining the production URL and authorization credentials as well as completing the milestones listed below.  


Production Phase Milestones:

- Request a User Name and Password for Production:  Obtain a new unique user name and password that is authorized to invoke the production web methods.

- Request the Production URL: Obtain the URL that will be used to reference the production web methods. 

- Request a Production Terminal ID: Obtain a Terminal ID for use in production. These will be given out upon Merchant Approval.

- Redirect the Host Application: Redirect the host application to use the production URL and web methods with the provided production User Name, Password, and Terminal ID.

- Request a “Go Live” Date: This will be sent with the Production Credentials and will be the date that the credentials are active.

### Migrating to Production 
The Production Phase is the final phase of the integration effort. During this phase you will have to make some minimal changes to the host system in order to use the Authorization Gateway in a production environment. This includes the following:
- You will need to request a user name and password for production. This user name and password will be different from the user name and password provided for certification
Page 64 of 75
and will only be valid for production. The host system will then need to be modified to include this user name and password in the authentication header when invoking a production web method.
- You will need to request the production URL for the Authorization Gateway. This URL will be different then the URL used for certification, however it will contain identical web methods. The host system will need to be modified to invoke web methods on the production URL.
- You will also need to change the certification web methods listed below to their sister production web methods.

| Certification Web Method         | Producation Web Method |
|----------------------------------|------------------------|
| GetCertificationTerminalSettings | GetTerminalSettings    |
| ProcessSingleCertificationCheck  | ProcessSingleCheck     |

- Once the host system has been modified to include these changes for processing transactions in a production environment you will need to request a “Go Live” date. Requesting a “Go Live” date signifies completion of the last major milestone of the integration effort and indicates to our software team that the host system is ready for production.
