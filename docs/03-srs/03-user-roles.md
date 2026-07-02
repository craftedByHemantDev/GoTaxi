# GoTaxi User Roles & Permissions

Document ID: GT-SRS-003

Version: 1.0.0

Status: Draft

---

# Purpose

This document defines every user role within the GoTaxi ecosystem along with their responsibilities and permissions.

The role-based permission system ensures security, scalability, and controlled access across the platform.

---

# User Roles

The GoTaxi platform consists of the following roles.

1. Guest

2. Customer

3. Driver Applicant

4. Driver

5. Support Executive

6. Finance Executive

7. Admin

8. Super Admin

---

# Guest

A guest is any visitor who has not logged in.

Permissions

✓ View Website

✓ Download App

✓ View Pricing

✓ View Terms & Conditions

✓ Register

✓ Login

Cannot

✗ Book Ride

✗ Become Driver

✗ Wallet

✗ Payments

---

# Customer

A customer can:

✓ Book Ride

✓ Schedule Ride

✓ Cancel Ride

✓ Live Track Ride

✓ Pay Online

✓ Cash Payment

✓ Wallet Payment

✓ View Ride History

✓ Save Favourite Places

✓ Save Favourite Drivers

✓ Refer Friends

✓ Contact Support

✓ Emergency SOS

✓ Rate Driver

✓ Download Invoice

✓ Switch to Driver Application

Cannot

✗ Accept Ride

✗ Manage Drivers

✗ Access Admin

---

# Driver Applicant

A user who wants to become a driver.

Permissions

✓ Submit Documents

✓ Upload Vehicle

✓ Upload Driving Licence

✓ Upload RC

✓ Upload Insurance

✓ Upload Selfie

✓ Edit Application

Cannot

✗ Accept Ride

✗ Earn Money

✗ Go Online

Until approved.

---

# Driver

Permissions

✓ Go Online

✓ Go Offline

✓ Accept Ride

✓ Reject Ride

✓ Start Ride

✓ End Ride

✓ Navigate

✓ View Earnings

✓ Withdraw Earnings

✓ View Wallet

✓ Manage Vehicles

✓ Switch Vehicle

✓ Contact Customer

✓ Contact Support

Cannot

✗ Approve Drivers

✗ Access Admin

---

# Support Executive

Permissions

✓ View Users

✓ View Rides

✓ Handle Complaints

✓ Refund Requests

✓ Chat Support

Cannot

✗ Delete Users

✗ Change Pricing

✗ Access Finance

---

# Finance Executive

Permissions

✓ View Transactions

✓ Wallet Management

✓ Refund Approval

✓ Driver Payout

✓ Revenue Reports

Cannot

✗ Manage Users

✗ Delete Data

---

# Admin

Permissions

✓ Manage Customers

✓ Manage Drivers

✓ Approve Drivers

✓ Reject Drivers

✓ Suspend Drivers

✓ Block Users

✓ Pricing

✓ Coupons

✓ Cities

✓ Vehicles

✓ Notifications

✓ Wallet

✓ Reports

✓ CMS

✓ Settings

Cannot

✗ Delete Super Admin

---

# Super Admin

Highest authority.

Permissions

✓ Full Platform Control

✓ Admin Management

✓ System Configuration

✓ Security

✓ Backup

✓ Server Settings

✓ API Keys

✓ Payment Gateway

✓ SMS Gateway

✓ Email Configuration

✓ Audit Logs

✓ Role Management

---

# Role Switching

One user account can have multiple roles.

Example

Customer

↓

Apply Driver

↓

Verification

↓

Approved

↓

Customer + Driver

The mobile application will provide a "Switch Mode" option after driver approval.

---

# Account Status

Pending

Active

Inactive

Suspended

Blocked

Deleted

---

# Driver Status

Application Started

Documents Pending

Documents Submitted

Under Verification

Interview Scheduled

Approved

Rejected

Suspended

Blocked

---

# Permission Strategy

Every API request must verify

Authentication

↓

Role

↓

Permission

↓

Ownership

↓

Response

---

# Future Roles

City Manager

Fleet Owner

Corporate Manager

Vendor

Marketing Executive

Call Center Agent

AI Assistant

---

End of Document
