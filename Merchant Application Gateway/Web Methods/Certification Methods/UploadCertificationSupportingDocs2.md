**Input**:  
- Paya Services Merchant ID as Integer
- Accepts a document as a byte array
- File Extension as String 
  
**Output**:  
- None

# SOAP 1.1
## Request:
**Header Information:**  
POST /webservices/AppGateway.asmx HTTP/1.1  
Host: demo.eftchecks.com  
Content-Type: text/xml; charset=utf-8  
Content-Length: length  
SOAPAction: "http://tempuri.org/GETI.eMagnus.WebServices/AppGateway/UploadCertificationSupportingDocs2"


```XML
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <RemoteAccessHeader xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <UserName>string</UserName>
      <Password>string</Password>
      <TerminalID>int</TerminalID>
    </RemoteAccessHeader>
  </soap:Header>
  <soap:Body>
    <UploadCertificationSupportingDocs2 xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <MerchantID>int</MerchantID>
      <DataPacket>base64Binary</DataPacket>
      <FileType>string</FileType>
    </UploadCertificationSupportingDocs2>
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
    <UploadCertificationSupportingDocs2Response xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <UploadCertificationSupportingDocs2Result>string</UploadCertificationSupportingDocs2Result>
    </UploadCertificationSupportingDocs2Response>
  </soap:Body>
</soap:Envelope>
```

# SOAP 1.2

## Request:
**Header Information:**  
POST /webservices/AppGateway.asmx HTTP/1.1  
Host: demo.eftchecks.com  
Content-Type: application/soap+xml; charset=utf-8  
Content-Length: length  
```XML
<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <RemoteAccessHeader xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <UserName>string</UserName>
      <Password>string</Password>
      <TerminalID>int</TerminalID>
    </RemoteAccessHeader>
  </soap12:Header>
  <soap12:Body>
    <UploadCertificationSupportingDocs2 xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <MerchantID>int</MerchantID>
      <DataPacket>base64Binary</DataPacket>
      <FileType>string</FileType>
    </UploadCertificationSupportingDocs2>
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
    <UploadCertificationSupportingDocs2Response xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <UploadCertificationSupportingDocs2Result>string</UploadCertificationSupportingDocs2Result>
    </UploadCertificationSupportingDocs2Response>
  </soap12:Body>
</soap12:Envelope>
```

