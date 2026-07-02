# Driver Module

Document ID: GT-DRV-001

Version: 1.0.0

Status: Draft

Project: GoTaxi

---

# 1. Purpose

The Driver Module enables verified users to earn money by accepting ride requests, completing trips, managing vehicles, tracking earnings, and maintaining their driver profile using the same GoTaxi mobile application.

The Driver Module becomes available only after successful driver verification and approval by the GoTaxi administration.

---

# 2. Driver Journey

Customer Account

↓

Apply as Driver

↓

Complete Driver Profile

↓

Upload Documents

↓

Upload Vehicle Details

↓

Admin Verification

↓

Approval

↓

Driver Mode Enabled

↓

Go Online

↓

Accept Ride

↓

Complete Ride

↓

Receive Earnings

---

# 3. Driver Dashboard

The Driver Dashboard shall display:

• Driver Status

• Online / Offline Switch

• Current Earnings

• Today's Trips

• Wallet Balance

• Ride Requests

• Driver Rating

• Vehicle Information

• Performance Statistics

• Notifications

• Support

---

# 4. Driver Profile

The profile shall contain:

Driver Photo

First Name

Last Name

Phone Number

Email

Date of Birth

Gender

Emergency Contact

Languages

Driver Rating

Experience

Account Status

Verification Status

Referral Code

---

# 5. Driver Documents

Mandatory Documents

Driving Licence

Aadhaar Card

PAN Card

Vehicle Registration Certificate (RC)

Insurance

PUC Certificate

Vehicle Permit (if required)

Driver Selfie

Vehicle Photos

Bank Account Details

Cancelled Cheque (Optional)

Future

Police Verification

Background Verification

Driving Test Certificate

---

# 6. Vehicle Management

A driver may register multiple vehicles.

Vehicle Types

Bike

Auto

Mini Cab

Sedan

SUV

Luxury

Electric Vehicle

Parcel Vehicle

Rental Vehicle

Each vehicle contains

Vehicle Number

Vehicle Brand

Vehicle Model

Vehicle Color

Manufacturing Year

Vehicle Type

Insurance

RC

Fitness Certificate

Permit

Status

---

# 7. Vehicle Switching

Driver can switch vehicles.

Example

Morning

Bike

↓

Evening

Sedan

↓

Night

SUV

Only one vehicle can remain Active at a time.

---

# 8. Driver Availability

Available Status

Online

Offline

Busy

On Break

Emergency

Invisible (Future)

Admin can force a driver Offline if required.

---

# 9. Ride Requests

Each request displays

Pickup Location

Destination

Estimated Distance

Estimated Time

Estimated Fare

Payment Method

Ride Type

Customer Rating

Special Instructions

Driver may

Accept

Reject

Ignore

---

# 10. Navigation

Google Maps Navigation

Live Route

Traffic

Alternative Routes

Estimated Arrival

Voice Navigation

Future

Offline Maps

---

# 11. Ride Lifecycle

Receive Request

↓

Accept

↓

Navigate to Pickup

↓

Arrived

↓

OTP Verification

↓

Ride Started

↓

Navigation

↓

Destination Reached

↓

Ride Completed

↓

Payment Confirmation

↓

Rating

---

# 12. Earnings

Today's Earnings

Weekly Earnings

Monthly Earnings

Yearly Earnings

Bonus

Referral Earnings

Incentives

Cancellation Charges

Tips

Net Earnings

Company Commission

---

# 13. Driver Wallet

Wallet Balance

Pending Amount

Completed Payments

Refund

Bonus

Referral

Withdrawal History

Transaction History

---

# 14. Withdrawals

Supported Methods

UPI

Bank Transfer

Wallet

Future

Instant Withdrawal

Scheduled Withdrawal

Minimum withdrawal amount will be configurable.

---

# 15. Driver Performance

Acceptance Rate

Cancellation Rate

Average Rating

Completed Trips

Online Hours

Revenue

Leaderboard (Future)

---

# 16. Ratings

Customer Rating

Average Rating

Rating Breakdown

Reviews

Complaints

Badges

Top Driver

Safe Driver

Elite Driver

Future

AI Driver Score

---

# 17. Notifications

Ride Request

Ride Cancelled

Wallet Update

Bonus

System Notification

Document Expiry

Vehicle Expiry

App Update

Emergency

---

# 18. Safety

Emergency SOS

Customer Verification Badge

Trip Monitoring

Emergency Contacts

Audio Recording (Future)

Video Recording (Future)

Accident Reporting

---

# 19. Driver Support

Help Center

Chat Support

Call Support

Raise Ticket

Document Help

Payment Help

Complaint Management

---

# 20. Driver Settings

Language

Theme

Notification Settings

Navigation Preference

Privacy

Security

Logout

Switch to Customer Mode

---

# 21. Business Rules

Driver must complete profile before approval.

All mandatory documents must be uploaded.

Only approved drivers can go Online.

Only one active vehicle at a time.

Driver cannot accept multiple active rides unless Pool Ride is enabled in the future.

Driver earnings shall be calculated automatically.

Wallet deductions shall be logged.

All ride activities shall be audited.

---

# 22. Validation Rules

Phone verification required.

Email verification required.

Valid Driving Licence required.

Vehicle documents must not be expired.

Insurance must be valid.

Bank account verification required before withdrawals.

---

# 23. API Dependencies

Authentication API

Driver Profile API

Vehicle API

Ride API

Wallet API

Notification API

Payment API

Location API

Support API

---

# 24. Database Modules

drivers

driver_documents

driver_vehicles

driver_wallets

driver_earnings

driver_withdrawals

driver_ratings

driver_locations

driver_online_status

driver_statistics

---

# 25. Future Features

Fleet Owner

Vehicle Leasing

Driver Subscription

AI Driver Assistant

Voice Commands

Fuel Tracking

EV Battery Monitoring

Dash Camera Integration

Insurance Marketplace

Loan Marketplace

Driver Rewards Program

---

End of Document
