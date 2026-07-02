# GoTaxi Coding Standards

Document ID: GT-DEV-001

Version: 1.0.0

Status: Approved

---

# Purpose

This document defines the coding standards for the GoTaxi project.

Every developer must follow these standards.

---

# PHP Standard

Follow PSR-12

Use strict typing whenever possible.

Never write business logic inside Controllers.

---

# Controller Rules

Controllers should remain thin.

Maximum responsibility:

- Receive Request
- Call Service
- Return Response

Controllers must NOT:

- Query database
- Calculate business logic
- Handle transactions

---

# Service Rules

Services contain business logic.

Example:

Ride Booking

Fare Calculation

Wallet Update

Referral Bonus

Driver Assignment

---

# Repository Rules

Repositories only communicate with database.

No business logic allowed.

---

# Model Rules

Models define:

Relationships

Scopes

Accessors

Mutators

Nothing more.

---

# Validation

Always use Form Requests.

Never validate inside Controller.

---

# Route Rules

API routes only.

Version every API.

Example:

/api/v1/customer/profile

/api/v1/driver/profile

---

# Naming Convention

Controllers

CustomerController

DriverController

RideController

Services

RideService

WalletService

Repositories

RideRepository

WalletRepository

Models

Ride

Wallet

Driver

Enums

RideStatus

PaymentStatus

WalletType

Requests

StoreRideRequest

UpdateProfileRequest

---

# Database Rules

Every table

created_at

updated_at

deleted_at

where applicable.

---

# Logging

Errors

Warnings

Payments

Wallet

Ride

Admin Actions

must be logged.

---

# API Response

Always return JSON.

Standard format.

---

# Security

Never trust client input.

Always validate.

Always authorize.

Always sanitize.

---

# Git Rules

One feature

↓

One branch

↓

One Pull Request

---

End
