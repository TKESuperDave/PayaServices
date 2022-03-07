# Merchant Change Report

## Details

In the Merchant Change Report, there are two columns to pay close attention to; the Check Status and Funding Status. 

* Check Status – Consumer side of the transaction
* Funding Status – Merchant side of the transaction

### The following is a list of Check Statuses:

| Status       | Definition                                                                                       | Description                                                                                                         |
|--------------|--------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------|
| Debit Sent   | The transaction has processed through the ACH Network and the debit has been sent to the ODFI.   | This is the first status of a debit transaction. You will also see this status for any resubmissions.               |
| Credit Sent  | The transaction has processed through the ACH Network and the credit has been sent to the ODFI.  | This is the first status of a credit transaction.                                                                   |
| Cancelled    | The transaction has been cancelled.                                                              | This status will appear if the transaction has been returned and cannot be resubmitted.                             |
| Rejected     | The transaction has been rejected.                                                               | This status will appear when the transaction has been rejected by our system. A rejection reason will be provided.  |
| Pending      | The transaction is scheduled to be presented to the ACH Network.                                 | This status applies to transactions submitted via file only.                                                        |
| Unprocessed  | The transaction has been received but has not been scrubbed.                                     | This is a rare status. This is only seen if the report is generated within minutes of receiving the transaction.    |

### The following is a list of Funding Statuses:

| Status       | Definition                                                                                                    | Description                                                                                                                        |
|--------------|---------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------|
| Credit Sent  | The transaction has been processed through the ACH Network and the credit has been sent to the ODFI.          | This status will appear when the merchant credit has been paid.                                                                    |
| Debit Sent   | The transaction has been processed through the ACH Network and the debit has been sent to the ODFI.           | This status will appear when the merchant has been debited.                                                                        |
| Pending      | The transaction is scheduled to be presented to the ACH Network.                                              | This status will appear when the merchant credit is scheduled but not paid yet.                                                    |
| Cancelled    | The transaction was cancelled before it was completely processed by the ACH Network.                          | This status will appear when the merchant has not been paid and a return is received.                                              |
| Chargeback   | The merchant has been debited the amount of the returned consumer debit (if applicable).                      | This status will appear if the merchant has been paid and a return is received.                                                    |
| No Credit    | No credit is scheduled to be sent to the merchant.                                                            | This will appear when the transaction has been rejected or if a test routing number was used.                                      |
| To Reserve   | The merchant credit was paid to the reserve. Please contact our Finance Department for further information.   | This is a rare status. This status will appear when our Finance Department has marked the merchant credit as paid to the reserve.  |
| Returned     | The transaction was returned for any of the reasons allowed by the ACH Network.                               | This is a rare status. This status will appear if there is a problem with the merchants’ bank account information.                 |
| Unprocessed  | The transaction has been received but has not been scrubbed.                                                  | This is a rare status. This is only seen if the report is generated within minutes of receiving the transaction.                   |

## Most Common Status Combinations 

The following is a list of the most common combination’s of Check Status/Funding Status’s: 
* **Debit Sent / Pending** – This is usually the first combination you will see for a new transaction. This shows the consumer debit has been sent to the ODFI while the merchant credit is pending processing.  
* **Debit Sent/ Credit Sent** – You will see this combination when the transaction has completed the cycle. The consumer debit and merchant credit have both been processed at this point. 
* **Cancelled /Chargeback** – You will see this combination when a return is received for the consumer side of the transaction and the merchant has already been paid. 
* **Cancelled / Credit Sent** – You will see this combination on a guaranteed transaction that has received a return for the consumer side of the transaction. 
* **Rejected / No Credit** – You will see this combination when the transaction has been rejected.  
* **Cancelled / Cancelled** – You will see this combination when both sides of the transaction have been cancelled.

## Last Return Code 
During the life cycle of the consumer side of a transaction, multiple returns may occur. For example, a consumer debit may be originally returned as an R01 (insufficient funds), but the subsequent resubmission of the transaction may be returned as an R10 (consumer advised not authorized). In this report, the day the first return was received, the last return code would display as ‘R01’ and would remain associated with this transaction until the second return was received at which point the last return code would display ‘R10’.

## Last Adjustment Amount (applied to Check21 transactions only)
In some situations, the check amount submitted to us as part of the transaction data does not match the actual amount written on the check. This situation is usually caught by the ODFI, and they notify us to adjust the amount in our system to match what is written on the check. On the Merchant Change Report, the amount field will change to reflect the newly corrected amount (for example, the original amount may have been processed for $10, but is not changed to $100). The check amount in the report will not reflect $100 with the Last Adjusted Amount column displaying $90. The last adjusted amount will be displayed the day it occurred and remain on the report from then on. You can use the Current Check Status to determine how the change affected the overall check amount. A Debit Sent increases the check amount while the Credit Sent decreases the check amount. In the example above, the adjustment from $10 to $100 would be indicated by the current check status of Debit Sent.  

**You'll find a full list of Return Codes at [ReturnCodes.md](/Return%20Codes.md).**
