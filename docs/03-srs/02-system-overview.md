# GoTaxi System Overview

Version: 1.0.0

---

# 1. Overview

GoTaxi is a complete ride-hailing ecosystem developed for India.

The platform consists of one mobile application supporting both Customer Mode and Driver Mode, one Laravel backend, one Admin Panel, one Website, and one centralized MySQL database.

The entire platform communicates through REST APIs.

---

# 2. Platform Components

The GoTaxi ecosystem contains the following major components.

## Mobile Application

Technology:
Flutter

Modes:

- Customer Mode
- Driver Mode

---

## Backend

Technology:

Laravel 12

Responsibilities:

Authentication

Ride Management

Driver Management

Customer Management

Payment

Wallet

Notifications

Admin APIs

Reports

Security

---

## Website

Technology:

Laravel

Purpose:

Landing Page

Driver Registration

Company Information

Blog

Support

Download App

Legal Pages

---

## Admin Panel

Technology:

Laravel

Purpose:

Manage the complete platform.

---

## Database

Technology:

MySQL

Stores all application data.

---

# 3. External Services

Google Maps API

Firebase Cloud Messaging

Email Service

SMS Gateway

WhatsApp API

Payment Gateway

Cloud Storage

---

# 4. User Types

Customer

Driver

Admin

Super Admin

Support Team

Finance Team

---

# 5. High Level Architecture

Flutter App

↓

Laravel API

↓

Business Logic

↓

MySQL Database

↓

Response

---

# 6. Customer Workflow

Customer opens app.

↓

Login.

↓

Select Pickup.

↓

Select Destination.

↓

Choose Vehicle.

↓

See Fare.

↓

Book Ride.

↓

Nearest Driver Search.

↓

Driver Accepts.

↓

Driver Arrives.

↓

Ride Starts.

↓

Ride Ends.

↓

Payment.

↓

Rating.

---

# 7. Driver Workflow

Driver Login.

↓

Switch Driver Mode.

↓

Go Online.

↓

Receive Ride Request.

↓

Accept Ride.

↓

Navigate to Customer.

↓

Pickup Customer.

↓

Complete Ride.

↓

Receive Earnings.

↓

Wallet Updated.

---

# 8. Admin Workflow

Manage Customers.

Manage Drivers.

Approve Drivers.

Manage Vehicles.

Manage Cities.

Manage Pricing.

Manage Coupons.

Manage Wallet.

Manage Reports.

Manage Notifications.

Manage Settings.

---

# 9. Ride Workflow

Ride Request

↓

Driver Search

↓

Driver Accept

↓

Driver Arrive

↓

OTP Verification

↓

Ride Start

↓

Live Tracking

↓

Ride Complete

↓

Payment

↓

Rating

---

# 10. Payment Workflow

Fare Calculation

↓

Payment Selection

↓

Payment Gateway

↓

Confirmation

↓

Invoice

↓

Wallet Update

↓

Commission Distribution

---

# 11. Notification Workflow

Ride Request

↓

Push Notification

↓

SMS (Optional)

↓

Email (Optional)

↓

WhatsApp (Future)

---

# 12. Driver Approval Workflow

Driver Registration

↓

Profile Completion

↓

Document Upload

↓

Vehicle Details

↓

Admin Verification

↓

Approval

↓

Driver Mode Enabled

---

# 13. Security Workflow

Phone Verification

↓

Email Verification

↓

JWT Authentication

↓

Role Validation

↓

API Validation

↓

Permission Check

↓

Activity Logging

---

# 14. Logging

Every important activity must be stored.

Login

Logout

Ride

Payment

Wallet

Driver Approval

Admin Actions

---

# 15. Scalability

The architecture must support:

100 Users

↓

1,000 Users

↓

10,000 Users

↓

100,000 Users

↓

1 Million Users

Without changing the application architecture.

---

# 16. Development Standards

Every feature must follow:

Requirement

↓

Documentation

↓

Database

↓

API

↓

Backend

↓

Flutter

↓

Testing

↓

Deployment

---

Status

Planning Phase

Version

1.0.0
