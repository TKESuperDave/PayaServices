# Authorization Gateway Specification & Implementation

# Introduction 

The Authorization Gateway is designed to accommodate various input requirements based on a given terminal’s settings. You can use this single interface to handle many scenarios. Our Authorization Gateway uses web services and can be developed with any programming language that can consume a web service.

Extensible Markup Language (XML) is used to send data packet requests to the Authorization Gateway and to receive a response back. Simple Object Access Protocol (SOAP) is used for XML message exchange over HTTPS. The Authorization Gateway also employs a custom SOAP header for authentication information. 

XML Schema Definitions (XSDs) are used by the Authorization Gateway to validate data packet requests sent by the client. Each terminal will be assigned a published XSD based on the terminal settings. If a data packet request does not conform to its assigned XSD a failed Validation Message response will be returned, otherwise the data packet will be processed as requested.

# Overview

This document will provide a high level overview of a full lifecycle workflow for integrating the authorization gateway into your host system. This workflow was designed to make the gateway integration process as simple as possible and will be used to guide your team throughout the integration effort and to keep the project on track.

The workflow consists of four distinct phases, with each phase culminating in a major milestone. The four distinct phases of the workflow are Preparation, Development, Certification, and Production. These four distinct phases identify the critical planning, assessment, and coordination of activities between the integration team and Paya Services’ software development team.

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

## Phase 2: Development

During this phase the integration team will be responsible for ensuring the host application can properly handle **Authorizations**, **Declines**, **Voids**, **Reversals** and in some cases **Credits**, **Represented Checks** and **Manager Overrides**. 

The section [Process](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md) document, entitled [Interfacing with the Authorization Gateway](https://github.com/kcskw/PayaServices/blob/patch-1/Authorization%20Gateway/Process.md#phase-2-development), details the business logic necessary to complete each milestone in this phase. The completion of this phase marks the opportunity to begin the Certification Phase.


Development Phase Milestones:

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


## Phase 3: Certification
During this phase the integration team will be responsible for sequentially completing the objectives outlined in a “Certification Script” that will be provided. Our integration team will closely monitor each transaction to ensure it is valid, and that the host system is properly configured to handle the various responses. The completion of this phase marks the opportunity to begin the Production Phase. However, if it is determined that the host system needs further refinements, it may be necessary to revert back to the Development Phase to make the necessary changes. 


Certification Phase Milestones:
- Request Certification Script:  Request a certification script from the Integration department.

- Complete the Certification Script:  Successfully complete each objective defined in the certification script.

_You can reach our team by email at integration@eftsupport.com._


## Phase 4:  Production
The Production Phase is the final phase of the integration effort.  During this phase the integration team will be responsible for configuring the host application for production. This includes obtaining the production URL and authorization credentials as well as completing the milestones listed below.  


Production Phase Milestones:

- Request a User Name and Password for Production:  Obtain a new unique user name and password that is authorized to invoke the production web methods.

- Request the Production URL: Obtain the URL that will be used to reference the production web methods. 

- Request a Production Terminal ID: Obtain a Terminal ID for use in production. These will be given out upon Merchant Approval.

- Redirect the Host Application: Redirect the host application to use the production URL and web methods with the provided production User Name, Password, and Terminal ID.

- Request a “Go Live” Date: This will be sent with the Production Credentials and will be the date that the credentials are active.

Please Navagate to the Process portion :tada:
