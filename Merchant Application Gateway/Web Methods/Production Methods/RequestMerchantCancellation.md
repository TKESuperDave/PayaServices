# SOAP 1.1
## Request:
**Header Information:**  
POST /webservices/AppGateway.asmx HTTP/1.1  
Host: demo.eftchecks.com  
Content-Type: text/xml; charset=utf-8  
Content-Length: length  
SOAPAction: "http://tempuri.org/GETI.eMagnus.WebServices/AppGateway/RequestCertificationMerchantCancellation"


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
    <RequestCertificationMerchantCancellation xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <MerchantID>int</MerchantID>
      <CancellationReason>Business_Closing or Never_Received_Equipment or No_Reason_Given or Decline_Denied_Svc_per_ISO or Disgruntled_with_GETI or Equipment_Problems or ISO_Requested or No_Need_For_Service or Was_Not_Aware_of_Svc or Equipment_Not_Compatible or All_Fees_Too_High or Sold_Business_Or_Unknown_Owner or Business_Not_Open or Sales_Partner_Issue</CancellationReason>
    </RequestCertificationMerchantCancellation>
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
    <RequestCertificationMerchantCancellationResponse xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <RequestCertificationMerchantCancellationResult>string</RequestCertificationMerchantCancellationResult>
    </RequestCertificationMerchantCancellationResponse>
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
    <RequestCertificationMerchantCancellation xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <MerchantID>int</MerchantID>
      <CancellationReason>Business_Closing or Never_Received_Equipment or No_Reason_Given or Decline_Denied_Svc_per_ISO or Disgruntled_with_GETI or Equipment_Problems or ISO_Requested or No_Need_For_Service or Was_Not_Aware_of_Svc or Equipment_Not_Compatible or All_Fees_Too_High or Sold_Business_Or_Unknown_Owner or Business_Not_Open or Sales_Partner_Issue</CancellationReason>
    </RequestCertificationMerchantCancellation>
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
    <RequestCertificationMerchantCancellationResponse xmlns="http://tempuri.org/GETI.eMagnus.WebServices/AppGateway">
      <RequestCertificationMerchantCancellationResult>string</RequestCertificationMerchantCancellationResult>
    </RequestCertificationMerchantCancellationResponse>
  </soap12:Body>
</soap12:Envelope>
```

