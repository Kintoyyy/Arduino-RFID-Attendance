
> ## attendance mode

```http
api/devices/send_card?card=xxxxx&api_key=xxxxxx
```
> card login

```json
 {
	api_status: "success",
	api_event: "time_in",
	api_text: "Logged in",
	data: [
		student_name: "Kent A. Rato",
		student_section: "ST12P1",
		student_room: "A2-301",
		student_status: "arrived on time",
		student_message: "Welcome Kent",
		event_time: "03:03:03",
		event_date: "03/03/23"
	 ]
}
``` 
> card logout

```json
 {
	api_status: "success",
	api_event: "time_out",
	api_text: "Logged out",
	data: [
		student_name: "Kent A. Rato",
		student_section: "ST12P1",
		student_room: "A2-301",
		student_status: "logging out",
		student_message: "bye Kent",
		event_time: "03:03:03",
		event_date: "03/03/23"
	 ]
}
``` 
> errors: card not found

```json
 {
	api_status: "card_error",
	api_event: "invalid_card",
	api_text: "Card is not Enrolled"
}
``` 




> ## enrollment mode

> ```http
> api/devices/check_card?card=xxxxx&api_key=xxxxxx
> ```

> card is available

```json
 {
	api_status: "card_success",
	api_event: "check_card",
	api_text: "Card is available to enroll"
}
``` 
> card is not available

```json
 {
	api_status: "card_is_used",
	api_event: "check_card",
	api_text: "Card is already registered",
	data: [
		student_name: "kintoyyy"
	]
}
```

> ## hallpass mode
> ```http
> api/devices/hall_pass?card=xxxxx&destination=x&api_key=xxxxxx
> ```

```json
 {
	api_status: "hallpass_success",
	api_event: "hallpass",
	api_text: "distination -> faculty",
	data: [
		student_name: "Kent A. Rato",
		student_section: "ST12P1",
		student_room: "A2-301",
		student_status: "hallpass",
		student_distination: "faculty",
		student_message: "30 min time limit",
		event_time: "03:03:03",
		event_date: "03/03/23"
	 ]
 }

```

> ## global errors
>  invalid api_key
 
```json
 {
	api_status: "api_error",
	api_event: "invalid",
	api_text: "invalid api key"
}
``` 