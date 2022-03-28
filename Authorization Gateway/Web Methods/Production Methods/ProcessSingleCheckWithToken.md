**Input**:  
- Accepts an XML string called a data packet that must conform to the new terminal application schema.
  
**Output**:  
- Outputs an XML string.

# SOAP 1.1
## Request:
**Header Information:**  
POST /webservices/AuthGateway.asmx HTTP/1.1
Host: demo.eftchecks.com
Content-Type: text/xml; charset=utf-8
Content-Length: length
SOAPAction: "http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway/ProcessSingleCheckWithToken"


```XML
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthGatewayHeader xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway" />
  </soap:Header>
  <soap:Body>
    <ProcessSingleCheckWithToken xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <DataPacket>string</DataPacket>
    </ProcessSingleCheckWithToken>
  </soap:Body>
</soap:Envelope>
```


## Response:
**Header Information:**  
HTTP/1.1 200 OK  
Content-Type: text/xml; charset=utf-8  
Content-Length: length  

```XML
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <ProcessSingleCheckWithTokenResponse xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <ProcessSingleCheckWithTokenResult>string</ProcessSingleCheckWithTokenResult>
    </ProcessSingleCheckWithTokenResponse>
  </soap:Body>
</soap:Envelope>
```

# SOAP 1.2

## Request:
**Header Information:**  
POST /webservices/AuthGateway.asmx HTTP/1.1
Host: demo.eftchecks.com
Content-Type: application/soap+xml; charset=utf-8
Content-Length: length
 
```XML
<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthGatewayHeader xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway" />
  </soap12:Header>
  <soap12:Body>
    <ProcessSingleCheckWithToken xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <DataPacket>string</DataPacket>
    </ProcessSingleCheckWithToken>
  </soap12:Body>
</soap12:Envelope>
```

## Response:
**Header Information:**  
HTTP/1.1 200 OK  
Content-Type: text/xml; charset=utf-8  
Content-Length: length  

```XML
<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Body>
    <ProcessSingleCheckWithTokenResponse xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <ProcessSingleCheckWithTokenResult>string</ProcessSingleCheckWithTokenResult>
    </ProcessSingleCheckWithTokenResponse>
  </soap12:Body>
</soap12:Envelope>
```
