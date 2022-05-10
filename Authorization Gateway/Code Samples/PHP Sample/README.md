# PHP Sample

## Required files:
	
  - index.php
  - GETIECheckProcessor.php
  - SystemSettings.php
  - config.ini

## Configuration

### Config.ini

In order to have this sample to access the database you must update the config.ini with the following credentials:

- UserName  
- Password
- TerminalID
- Server
- NameSpace 

If you are attempting to use the demo server you will want to set the Server to https://demo.eftchecks.com/webservices/AuthGateway.asmx?WSDL and the NameSpace to http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway . The terminal ID will depend on the SEC Code you are conducting the transactions under, see the [Process.md](https://github.com/TKESuperDave/PayaServices/blob/XML/Authorization%20Gateway/Process.md) for more information.


GETIECheckProcessor.php
This sample gives you several options of different types of transactions that you may perform. 
