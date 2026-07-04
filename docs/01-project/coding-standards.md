📋 Is document me kya hoga?

1. Naming Convention
   Controllers

AuthController

RideController

DriverController

Services

AuthService

RideService

DriverService

Repositories

UserRepository

RideRepository

OTPRepository

Interfaces

UserRepositoryInterface

RideServiceInterface

Actions

SendOtpAction

AcceptRideAction

CompleteRideAction

Enums

UserStatus

RideStatus

PaymentStatus

Requests

SendOtpRequest

CreateRideRequest

Resources

UserResource

RideResource

DriverResource
📋 Rule 2
Folder Naming
Singular

User

Ride

Driver

Not

Users

Drivers

Rides
📋 Rule 3
Method Naming
create()

update()

delete()

findById()

Not

createUser()

deleteUser()

updateUser()

Kyuki repository already User ki hai.

📋 Rule 4
Controller Size

Maximum

30 lines

Usse bada

↓

Refactor.

📋 Rule 5
Service Size

Maximum

300 lines

Uske baad split.

📋 Rule 6
Repository

Repository

↓

Database only.

No business.

📋 Rule 7
Action

One Action

↓

One Use Case.

📋 Rule 8
Validation

Kabhi Controller me nahi.

Sirf FormRequest.

📋 Rule 9
API Resource

Model kabhi direct return nahi.

Always Resource.

📋 Rule 10
Database

Every FK

↓

Constraint.

Every lookup

↓

Index.

📋 Rule 11
Transactions

2+ Tables

↓

Transaction Mandatory.

📋 Rule 12
Config

Hardcoded values

↓

Forbidden.

📋 Rule 13
Enums

Status

Type

Provider

↓

Always Enum.

📋 Rule 14
API Response

Always

{
"success": true,
"message": "",
"data": {},
"errors": null
}
📋 Rule 15
Git

One feature

↓

One PR

↓

One Merge
