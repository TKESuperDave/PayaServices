**Input**:  
- Accepts an XML string called a data packet that must conform to the schema provided in this [Link](https://demo.eftchecks.com/webservices/Schemas/other/parsemicr.xsd).
  
**Output**:  
- Outputs an XML string.

# SOAP 1.1
## Request:
**Header Information:**  
POST /webservices/AuthGateway.asmx HTTP/1.1  
Host: demo.eftchecks.com  
Content-Type: text/xml; charset=utf-8  
Content-Length: length  
SOAPAction: "http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway/ParseMICR"


```XML
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthGatewayHeader xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway" />
  </soap:Header>
  <soap:Body>
    <ParseMICR xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <DataPacket>string</DataPacket>
    </ParseMICR>
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
    <ParseMICRResponse xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <ParseMICRResult>string</ParseMICRResult>
    </ParseMICRResponse>
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
    <ParseMICR xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <DataPacket>string</DataPacket>
    </ParseMICR>
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
    <ParseMICRResponse xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AuthGateway">
      <ParseMICRResult>string</ParseMICRResult>
    </ParseMICRResponse>
  </soap12:Body>
</soap12:Envelope>
```
