# Planni Housekeeping + Planni Screen API

# API

## Authentication

The Planni Screen API uses a header with the screen code to authenticate the request:

Set the `PlanniRequestCode` header to the code of the screen that's making the request to authenticate.
 
 ## Endpoints
 
 ### /screen
 
 This endpoint returns some information about the authenticated screen making the request: 
 
 ```json
{
  "id": 1,
  "name": "Kitchen Planni",
  "code": "123ABC",
  "type": 1,
  "created_at": "2017-01-15 02:41:20",
  "updated_at": "2017-01-15 02:41:20"
}
```
