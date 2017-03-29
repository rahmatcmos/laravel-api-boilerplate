---
title: emsearch

language_tabs:
- bash
- javascript

includes:
- errors

search: true

toc_footers:
---
<!-- START_INFO -->
#Developer Api Documentation

Welcome to the <b>emsearch</b> API reference.

<b>emsearch</b> API use [OAuth2](https://oauth.net/2/) authentication.

Try out our API with this [postman collection](collection.json)
<aside class="notice">Don't forget to provide a personal authentication token header for every request, like this : <code>Authentication: Bearer xxx</code></aside>
<!-- END_INFO -->


#Me
<!-- START_01138559f486b5b7c062a19b1c0412fe -->
## Get curent user

> Example request:

```bash
curl -X GET "http://emsearch.ryan.ems-dev.net/api/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/me",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "41abdec2-1389-11e7-93ae-92361f002671",
        "name": "John Doe",
        "email": "john.doe@domain.tld",
        "created_at": "2017-03-28 14:46:13",
        "updated_at": "2017-03-28 14:46:13"
    }
}
```

### HTTP Request
`GET /api/me`

`HEAD /api/me`


<!-- END_01138559f486b5b7c062a19b1c0412fe -->

#Project
<!-- START_0244828c4ebed3e3aa5d2acc7f432f35 -->
## Project list

> Example request:

```bash
curl -X GET "http://emsearch.ryan.ems-dev.net/api/project" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/project",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": "1bcc7efc-138c-11e7-93ae-92361f002671",
            "search_engine_id": "ee87e3b2-1388-11e7-93ae-92361f002671",
            "data_stream_id": null,
            "name": "John Smith Sample Project 1",
            "created_at": "2017-03-28 14:46:13",
            "updated_at": "2017-03-28 14:46:13"
        },
        {
            "id": "b6860dd2-138c-11e7-93ae-92361f002671",
            "search_engine_id": "ee87e3b2-1388-11e7-93ae-92361f002671",
            "data_stream_id": null,
            "name": "John Smith Sample Project 2",
            "created_at": "2017-03-28 14:46:13",
            "updated_at": "2017-03-28 14:46:13"
        },
        {
            "id": "c4b5d93c-138c-11e7-93ae-92361f002671",
            "search_engine_id": "ee87e3b2-1388-11e7-93ae-92361f002671",
            "data_stream_id": null,
            "name": "Mickey Mouse Sample Project",
            "created_at": "2017-03-28 14:46:13",
            "updated_at": "2017-03-28 14:46:13"
        }
    ],
    "meta": {
        "pagination": {
            "total": 3,
            "count": 3,
            "per_page": 20,
            "current_page": 1,
            "total_pages": 1,
            "links": []
        }
    }
}
```

### HTTP Request
`GET /api/project`

`HEAD /api/project`


<!-- END_0244828c4ebed3e3aa5d2acc7f432f35 -->

<!-- START_f77a6ccd588d420cab2180c05580e7ef -->
## Create and store new project

> Example request:

```bash
curl -X POST "http://emsearch.ryan.ems-dev.net/api/project" \
-H "Accept: application/json" \
    -d "search_engine_id"="minus" \
    -d "data_stream_id"="minus" \
    -d "name"="minus" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/project",
    "method": "POST",
    "data": {
        "search_engine_id": "minus",
        "data_stream_id": "minus",
        "name": "minus"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/project`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    search_engine_id | string |  required  | Valid search_engine id
    data_stream_id | string |  optional  | Valid data_stream id
    name | string |  required  | Maximum: `100`

<!-- END_f77a6ccd588d420cab2180c05580e7ef -->

<!-- START_48295e905557186718bbf92bca1f48e5 -->
## Get specified user project

> Example request:

```bash
curl -X GET "http://emsearch.ryan.ems-dev.net/api/project/{project}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/project/{project}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/project/{project}`

`HEAD /api/project/{project}`


<!-- END_48295e905557186718bbf92bca1f48e5 -->

<!-- START_4fbe95cf853ec486b09c7dd34f550fea -->
## Update a specified user project

> Example request:

```bash
curl -X PUT "http://emsearch.ryan.ems-dev.net/api/project/{project}" \
-H "Accept: application/json" \
    -d "search_engine_id"="vel" \
    -d "data_stream_id"="vel" \
    -d "name"="vel" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/project/{project}",
    "method": "PUT",
    "data": {
        "search_engine_id": "vel",
        "data_stream_id": "vel",
        "name": "vel"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/project/{project}`

`PATCH /api/project/{project}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    search_engine_id | string |  required  | Valid search_engine id
    data_stream_id | string |  optional  | Valid data_stream id
    name | string |  required  | Maximum: `100`

<!-- END_4fbe95cf853ec486b09c7dd34f550fea -->

#User
<!-- START_79bbe09b8f53b0948351390dffb959af -->
## User list

> Example request:

```bash
curl -X GET "http://emsearch.ryan.ems-dev.net/api/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/user",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": "41abdec2-1389-11e7-93ae-92361f002671",
            "name": "John Doe",
            "email": "john.doe@domain.tld",
            "created_at": "2017-03-28 14:46:13",
            "updated_at": "2017-03-28 14:46:13"
        },
        {
            "id": "509dd5c0-1389-11e7-93ae-92361f002671",
            "name": "Alan Smithee",
            "email": "alan.smithee@domain.tld",
            "created_at": "2017-03-28 14:46:13",
            "updated_at": "2017-03-28 14:46:13"
        },
        {
            "id": "605c7610-1389-11e7-93ae-92361f002671",
            "name": "John Smith",
            "email": "john.smith@domain.tld",
            "created_at": "2017-03-28 14:46:13",
            "updated_at": "2017-03-28 14:46:13"
        },
        {
            "id": "82b5da82-138c-11e7-93ae-92361f002671",
            "name": "Mickey Mouse",
            "email": "mickey.mouse@domain.tld",
            "created_at": "2017-03-28 14:46:13",
            "updated_at": "2017-03-28 14:46:13"
        }
    ],
    "meta": {
        "pagination": {
            "total": 4,
            "count": 4,
            "per_page": 20,
            "current_page": 1,
            "total_pages": 1,
            "links": []
        }
    }
}
```

### HTTP Request
`GET /api/user`

`HEAD /api/user`


<!-- END_79bbe09b8f53b0948351390dffb959af -->

<!-- START_ddfe841311822ba91babd6d2eb588875 -->
## Create and store new user

> Example request:

```bash
curl -X POST "http://emsearch.ryan.ems-dev.net/api/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/user",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/user`


<!-- END_ddfe841311822ba91babd6d2eb588875 -->

<!-- START_58a7597d78a515df314a48b0125a0b5b -->
## Get specified user

> Example request:

```bash
curl -X GET "http://emsearch.ryan.ems-dev.net/api/user/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/user/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/user/{user}`

`HEAD /api/user/{user}`


<!-- END_58a7597d78a515df314a48b0125a0b5b -->

#User Project
<!-- START_aa8a35d90f07e0338dcd98a913a63c76 -->
## User project list

> Example request:

```bash
curl -X GET "http://emsearch.ryan.ems-dev.net/api/user/{userId}/project" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/user/{userId}/project",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/user/{userId}/project`

`HEAD /api/user/{userId}/project`


<!-- END_aa8a35d90f07e0338dcd98a913a63c76 -->

<!-- START_28964cc27ab9afa6ce7f99c0bf0dc46b -->
## Get specified user project

> Example request:

```bash
curl -X GET "http://emsearch.ryan.ems-dev.net/api/user/{userId}/project/{projectId}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://emsearch.ryan.ems-dev.net//api/user/{userId}/project/{projectId}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/user/{userId}/project/{projectId}`

`HEAD /api/user/{userId}/project/{projectId}`


<!-- END_28964cc27ab9afa6ce7f99c0bf0dc46b -->
