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

### /messages

This endpoint returns all messages posted to the authenticated screen in json format:

```json
[
  {
    "id": 1,
    "created_at": "2017-01-19 17:47:30",
    "updated_at": "2017-01-19 17:56:13",
    "message": "Hello, this is a test message!",
    "signature": "Alex",
    "color": "0",
    "start": "2017-01-19 17:47:30",
    "end": "2017-01-20 17:47:30",
    "household_id": 1
  }
]
```

### /calendars

This endpoint returns all the calendars to be diplayed on the screen in the following JSON format:

```json
[
  {
    "id": 3,
    "created_at": "2017-01-19 23:04:12",
    "updated_at": "2017-01-19 23:04:12",
    "url": "http://mijnrooster.kdg.be/ical?5412cc20&eu=U1RVREVOVFwwMTA1MjUyLTA3&t=06e19128-26ff-499a-94b1-05c80d9414de",
    "household_id": 1,
    "name": "KdG personal timetable - STUDENT\\\\0105252-07",
    "description": " NT\\\\0105252-07",
    "events": [
      {
        "summary": "Sociale Innovatie - Senior Projects",
        "dtstart": "20161223T090000",
        "dtend": "20161223T120000",
        "duration": null,
        "dtstamp": "20170119T230650Z",
        "uid": "2016!D1A817EB0187F665A0890CCEF661BD99-20161223@timetable.kdg.be",
        "created": "20170119T230650Z",
        "lastmodified": null,
        "description": "Student set(s): 3 MT AV a\\, 3 MT AV b\\, 3 MT VP a\\, 3 MT VP b\\, 3 MT WP a\\, 3 MT WP b\\n\\nStaff: Claes Gert",
        "location": "HO-A136 / HO-A137",
        "sequence": null,
        "status": "CONFIRMED",
        "transp": "OPAQUE",
        "organizer": null,
        "attendee": null,
        "dtstamp_array": [
          [],
          "20170119T230650Z"
        ],
        "dtstart_array": [
          {
            "TZID": "Europe/Amsterdam"
          },
          "20161223T090000",
          1482480000
        ],
        "dtend_array": [
          {
            "TZID": "Europe/Amsterdam"
          },
          "20161223T120000",
          1482490800
        ],
        "summary_array": [
          [],
          "Sociale Innovatie - Senior Projects"
        ],
        "location_array": [
          [],
          "HO-A136 / HO-A137"
        ],
        "transp_array": [
          [],
          "OPAQUE"
        ],
        "status_array": [
          [],
          "CONFIRMED"
        ],
        "created_array": [
          [],
          "20170119T230650Z"
        ],
        "lastModified_array": [
          [],
          "20170119T230650Z"
        ],
        "lastModified": "20170119T230650Z",
        "uid_array": [
          [],
          "2016!D1A817EB0187F665A0890CCEF661BD99-20161223@timetable.kdg.be"
        ],
        "description_array": [
          [],
          "Student set(s): 3 MT AV a\\, 3 MT AV b\\, 3 MT VP a\\, 3 MT VP b",
          " \\, 3 MT WP a\\, 3 MT WP b\\n\\nStaff: Claes Gert"
        ],
        "dtstart_tz": "20161223T090000",
        "dtend_tz": "20161223T120000"
      }
    ]
  }
]
```
