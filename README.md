
# Memory book app
## API

### Headers
```X-Requested-With: XMLHttpRequest```

### `GET /sanctum/csrf-cookie`

Put to headers:
```X-XSRF-TOKEN: {token}```

### `POST /register/`

#### Params
- name
- email
- password
- password_confirm


### `POST /login`

#### Params
- email
- password

#### Response
`
{
"id": 1,
"name": "vasya",
"email": "vasya@mail.com",
"email_verified_at": null,
"created_at": "2022-09-15T10:18:57.000000Z",
"updated_at": "2022-09-15T10:18:57.000000Z",
"two_factor_secret": null,
"two_factor_recovery_codes": null,
"two_factor_confirmed_at": null,
"token": {
"accessToken": {
"name": "default",
"abilities": [
"*"
],
"expires_at": null,
"tokenable_id": 1,
"tokenable_type": "App\\Models\\User",
"updated_at": "2022-09-15T10:30:23.000000Z",
"created_at": "2022-09-15T10:30:23.000000Z",
"id": 1
},
"plainTextToken": "1|jzqxgwJ8cxTVpbsRJlR7FlpAz2tnH7jHB7gKhRji"
}
}
`

### API Auth

#### Headers:
`Authorization: Bearer 1|jzqxgwJ8cxTVpbsRJlR7FlpAz2tnH7jHB7gKhRji` 

### `GET /people`
#### Query params

- `search_by_name` - filter result by name or lastname
- `search_by_dates` - filter result by birth_date or death_date

##### Example:
`GET /people?search_by_name=vasya&search_by_dates=01-01-1991`

#### Response

`{
"current_page": 1,
"data": [
{
"id": 3,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 4,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 5,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 6,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 7,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 8,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 9,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 10,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 11,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 12,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 13,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 14,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 15,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 16,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null
},
{
"id": 17,
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": "2020-02-01T00:00:00.000000Z",
"death_date": null
}
],
"first_page_url": "http://memorybook.test/api/people?page=1",
"from": 1,
"last_page": 2,
"last_page_url": "http://memorybook.test/api/people?page=2",
"links": [
{
"url": null,
"label": "&laquo; Previous",
"active": false
},
{
"url": "http://memorybook.test/api/people?page=1",
"label": "1",
"active": true
},
{
"url": "http://memorybook.test/api/people?page=2",
"label": "2",
"active": false
},
{
"url": "http://memorybook.test/api/people?page=2",
"label": "Next &raquo;",
"active": false
}
],
"next_page_url": "http://memorybook.test/api/people?page=2",
"path": "http://memorybook.test/api/people",
"per_page": 15,
"prev_page_url": null,
"to": 15,
"total": 16
}`

### `GET /people/{id}`

#### Response
`{
"id": 18,
"first_name": "vasya",
"last_name": "pupkin",
"middle_name": "asdfasdf",
"birth_date": "2020-02-01T00:00:00.000000Z",
"death_date": null,
"biography": "test",
"photo": null,
"created_at": "2022-09-15T11:01:47.000000Z",
"updated_at": "2022-09-15T11:01:47.000000Z"
}`


### `GET /user`

Profile information

#### Response
`{
"id": 1,
"name": "vasya",
"email": "vasya@mail.com",
"email_verified_at": null,
"created_at": "2022-09-15T10:18:57.000000Z",
"updated_at": "2022-09-15T10:18:57.000000Z",
"two_factor_secret": null,
"two_factor_recovery_codes": null,
"two_factor_confirmed_at": null
}`

### PUT user/password
Update user password


### `GET /user/people`
Get people user have created and have relations

#### Query Params
- `page` - integer


#### Response

`{
"current_page": 1,
"data": [
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 4,
"middle_name": null,
"biography": "test",
"photo": null,
"created_at": "2022-09-15T10:43:34.000000Z",
"updated_at": "2022-09-15T10:43:34.000000Z",
"pivot": {
"user_id": 1,
"person_id": 4,
"relation_type": "wife"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 5,
"middle_name": null,
"biography": "test",
"photo": null,
"created_at": "2022-09-15T10:51:10.000000Z",
"updated_at": "2022-09-15T10:51:10.000000Z",
"pivot": {
"user_id": 1,
"person_id": 5,
"relation_type": "wife"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 6,
"middle_name": null,
"biography": "test",
"photo": null,
"created_at": "2022-09-15T10:51:24.000000Z",
"updated_at": "2022-09-15T10:51:24.000000Z",
"pivot": {
"user_id": 1,
"person_id": 6,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 7,
"middle_name": null,
"biography": "test",
"photo": null,
"created_at": "2022-09-15T10:52:23.000000Z",
"updated_at": "2022-09-15T10:52:23.000000Z",
"pivot": {
"user_id": 1,
"person_id": 7,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 8,
"middle_name": null,
"biography": "test",
"photo": "images/TAO2U3SZApMIJaq2alS1PuKqdagvRNNDzrP2zt2J.gif",
"created_at": "2022-09-15T10:53:38.000000Z",
"updated_at": "2022-09-15T10:53:38.000000Z",
"pivot": {
"user_id": 1,
"person_id": 8,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 9,
"middle_name": null,
"biography": "test",
"photo": "images/8NrSp2qNAveHArnCHFxsQUmoanxn4Gd5fjiYz1mU.gif",
"created_at": "2022-09-15T10:55:03.000000Z",
"updated_at": "2022-09-15T10:55:03.000000Z",
"pivot": {
"user_id": 1,
"person_id": 9,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 10,
"middle_name": null,
"biography": "test",
"photo": "images/d7LZcd1z28EZrp0CNVP6AiyNSxhZe0BEEDiEPmKA.gif",
"created_at": "2022-09-15T10:56:05.000000Z",
"updated_at": "2022-09-15T10:56:05.000000Z",
"pivot": {
"user_id": 1,
"person_id": 10,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 11,
"middle_name": null,
"biography": "test",
"photo": "images/8QYvkKg2MIYLlfKVVZ9hGOFoqta7OANqt1DsDCL7.gif",
"created_at": "2022-09-15T10:56:14.000000Z",
"updated_at": "2022-09-15T10:56:14.000000Z",
"pivot": {
"user_id": 1,
"person_id": 11,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 12,
"middle_name": null,
"biography": "test",
"photo": "images/b96agzDmfXLKXZbPjTGxHmhEKJ8VVP2l1NUC8Zpx.gif",
"created_at": "2022-09-15T10:56:55.000000Z",
"updated_at": "2022-09-15T10:56:55.000000Z",
"pivot": {
"user_id": 1,
"person_id": 12,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 13,
"middle_name": null,
"biography": "test",
"photo": "images/S0OnRZyLNBk0EDuTcEH1yheI3KX2ctgMHziESjg0.gif",
"created_at": "2022-09-15T10:57:03.000000Z",
"updated_at": "2022-09-15T10:57:03.000000Z",
"pivot": {
"user_id": 1,
"person_id": 13,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 14,
"middle_name": null,
"biography": "test",
"photo": "images/UwE1o73GSgOYl5v29tTFNFRhOvX3AZGhCSMEBMrz.gif",
"created_at": "2022-09-15T10:57:19.000000Z",
"updated_at": "2022-09-15T10:57:19.000000Z",
"pivot": {
"user_id": 1,
"person_id": 14,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 15,
"middle_name": null,
"biography": "test",
"photo": "images/p0TwwZHLv9tZajFKf8Ly5I9QzSc1wAP1BdedXyYU.gif",
"created_at": "2022-09-15T10:58:42.000000Z",
"updated_at": "2022-09-15T10:58:42.000000Z",
"pivot": {
"user_id": 1,
"person_id": 15,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": null,
"death_date": null,
"id": 16,
"middle_name": null,
"biography": "test",
"photo": null,
"created_at": "2022-09-15T10:59:27.000000Z",
"updated_at": "2022-09-15T10:59:27.000000Z",
"pivot": {
"user_id": 1,
"person_id": 16,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": "2020-02-01T00:00:00.000000Z",
"death_date": null,
"id": 17,
"middle_name": null,
"biography": "test",
"photo": null,
"created_at": "2022-09-15T11:01:26.000000Z",
"updated_at": "2022-09-15T11:01:26.000000Z",
"pivot": {
"user_id": 1,
"person_id": 17,
"relation_type": "brother"
}
},
{
"first_name": "vasya",
"last_name": "pupkin",
"birth_date": "2020-02-01T00:00:00.000000Z",
"death_date": null,
"id": 18,
"middle_name": "asdfasdf",
"biography": "test",
"photo": null,
"created_at": "2022-09-15T11:01:47.000000Z",
"updated_at": "2022-09-15T11:01:47.000000Z",
"pivot": {
"user_id": 1,
"person_id": 18,
"relation_type": "brother"
}
}
],
"first_page_url": "http://memorybook.test/api/user/people?page=1",
"from": 1,
"last_page": 1,
"last_page_url": "http://memorybook.test/api/user/people?page=1",
"links": [
{
"url": null,
"label": "&laquo; Previous",
"active": false
},
{
"url": "http://memorybook.test/api/user/people?page=1",
"label": "1",
"active": true
},
{
"url": null,
"label": "Next &raquo;",
"active": false
}
],
"next_page_url": null,
"path": "http://memorybook.test/api/user/people",
"per_page": 15,
"prev_page_url": null,
"to": 15,
"total": 15
}`

### `GET /user/people/{id}`

Get person by id

#### Response
`{
"id": 14,
"first_name": "vasya",
"last_name": "pupkin",
"middle_name": null,
"birth_date": null,
"death_date": null,
"biography": "test",
"photo": "images/UwE1o73GSgOYl5v29tTFNFRhOvX3AZGhCSMEBMrz.gif",
"created_at": "2022-09-15T10:57:19.000000Z",
"updated_at": "2022-09-15T10:57:19.000000Z",
"photo_url": "/storage/images/UwE1o73GSgOYl5v29tTFNFRhOvX3AZGhCSMEBMrz.gif"
}`

### `POST /user/people/`
Add Person information

#### params
- `first_name` - required | string
- `last_name` - required | string
- `middle_name` - required | string
- `birth_date` - date
- `death_date` - date
- `biography` - text
- `photo` - image file
- `relation` - required | available vars: boyfriend, daughter, son, friend, father, mother, sister, brother, wife, husband

#### Response
Person model like get by id

### `PUT /user/people/{id}`

#### params
- `first_name` - required | string
- `last_name` - required | string
- `middle_name` - required | string
- `birth_date` - date
- `death_date` - date
- `biography` - text
- `photo` - image file
- `relation` - required | available vars: boyfriend, daughter, son, friend, father, mother, sister, brother, wife, husband

Update Person information
#### Response
Person model like get by id

### `DELETE /user/people/{id}`

#### Response
`1` - if success
