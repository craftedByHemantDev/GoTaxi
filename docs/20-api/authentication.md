# Authentication API

## POST /api/v1/auth/send-otp

Purpose:
Send OTP to user's mobile number.

Request:

{
"country_code": "+91",
"mobile": "9876543210"
}

Response:

{
"success": true,
"message": "OTP sent successfully",
"data": {}
}
