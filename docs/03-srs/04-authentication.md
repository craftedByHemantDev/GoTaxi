# Authentication Module

Document ID: GT-AUTH-001

Version: 1.0.0

Status: Draft

---

# Purpose

The Authentication Module is responsible for securely identifying users, validating their identity, managing sessions, protecting user accounts, and controlling access to every GoTaxi service.

This module supports Customers, Driver Applicants, Drivers, Admins, and Super Admins.

---

# Supported Login Methods

The platform shall support:

- Mobile Number + OTP

- Email + Password

- Google Sign-In

- Apple Sign-In (iOS)

Future:

- Aadhaar Verification

- DigiLocker

---

# Registration Flow

Guest

↓

Choose Login Method

↓

Enter Mobile Number

↓

Receive OTP

↓

Verify OTP

↓

Enter Email

↓

Verify Email

↓

Complete Profile

↓

Account Created

---

# Required Profile Information

Customer

- First Name

- Last Name

- Mobile Number

- Email Address

- Profile Photo

- Gender

- Date of Birth

- Preferred Language

---

Driver

Everything from Customer plus

Driving Licence

Vehicle Details

Vehicle Documents

Insurance

RC

Vehicle Photos

Selfie Verification

Police Verification (Future)

---

# Email Verification

After OTP verification:

↓

Verification Email

↓

User Clicks Link

↓

Email Verified

---

# OTP Rules

OTP Length

6 Digits

Expiry

5 Minutes

Maximum Attempts

5

Resend OTP

30 Seconds

Maximum Daily OTP

Configurable by Admin

---

# Password Rules

Minimum 8 Characters

Uppercase Required

Lowercase Required

Number Required

Special Character Required

Passwords are always encrypted.

---

# Login Security

Every login records

Device

Browser

Operating System

IP Address

Country

City

Time

---

# Session Management

Users can

View Active Devices

Logout from Other Devices

Logout from All Devices

---

# Device Management

Each login creates a device session.

Admin can revoke sessions.

Users can remove trusted devices.

---

# JWT Authentication

Every authenticated request must include:

Bearer Token

↓

Middleware

↓

Role Validation

↓

Permission Validation

↓

API Access

---

# Multi Device Support

Customer

Allowed

Driver

Allowed

Admin

Configurable

---

# Role Switching

A Customer can become a Driver.

After approval,

the mobile application will show

Switch to Driver Mode

Switch to Customer Mode

without creating another account.

---

# Account Status

Pending

Active

Email Pending

Phone Pending

Profile Incomplete

Driver Verification Pending

Suspended

Blocked

Deleted

---

# Logout

Single Device

All Devices

Automatic Logout (Future)

---

# Security

Rate Limiting

Encrypted Password

JWT

HTTPS Only

CSRF Protection

API Validation

Role Validation

Permission Validation

Activity Logging

---

# Audit Logs

The system shall log:

Registration

Login

Logout

Password Change

Email Verification

OTP Verification

Profile Update

Driver Application

Role Switching

Blocked Login

---

# Future Features

Biometric Login

Face ID

Fingerprint

Passkeys

AI Fraud Detection

Device Trust Score

---

End of Document
