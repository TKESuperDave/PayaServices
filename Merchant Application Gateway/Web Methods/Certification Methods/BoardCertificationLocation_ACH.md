## Request:
```
POST /webservices/AppGateway.asmx HTTP/1.1
Host: demo.eftchecks.com
Content-Type: text/xml; charset=utf-8
Content-Length: length
SOAPAction: "http://tempuri.org/GETI.eMagnus.WebServices/AppGateway/BoardCertificationMerchant_ACH"


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
    <BoardCertificationMerchant_ACH xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <DataPacket>string</DataPacket>
    </BoardCertificationMerchant_ACH>
  </soap:Body>
</soap:Envelope>
```


## Response:
```
HTTP/1.1 200 OK
Content-Type: text/xml; charset=utf-8
Content-Length: length


<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <BoardCertificationMerchant_ACHResponse xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <BoardCertificationMerchant_ACHResult>string</BoardCertificationMerchant_ACHResult>
    </BoardCertificationMerchant_ACHResponse>
  </soap:Body>
</soap:Envelope>
```
