# receipt-code-date
- How to
1. Select last receipt code from yours database.
2. Call function runReceiptCode('prefix', $last_code)

-Example
```
  $last_code_query = $conn->query("SELECT rcp_code FROM receipt ORDER BY rcp_code DESC LIMIT 1");
  $last_code = $last_code_query->fetch_assoc();
  $rcp_code = runReceiptCode('SE', $last_code['rcp_code']);
```
