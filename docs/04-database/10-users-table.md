# Users Table

Document ID: GT-DB-010

Version: 1.0.0

Status: Approved

---

# Purpose

Stores every user of the GoTaxi ecosystem.

Every account starts as a Customer.

After approval the same account can become a Driver.

Admins also use the same authentication system.

---

# Table Name

users

---

# Primary Key

id (BIGINT UNSIGNED)

Auto Increment

Primary Key

---

# Columns

id

UUID (Future Support)

first_name

last_name

full_name

mobile

email

password

google_id

apple_id

profile_photo

gender

date_of_birth

preferred_language

country_code

timezone

status

email_verified_at

mobile_verified_at

last_login_at

last_login_ip

remember_token

created_at

updated_at

deleted_at

---

# Account Status

pending

active

inactive

blocked

suspended

deleted

---

# Authentication Types

OTP

Email Password

Google

Apple

---

# Login Rules

One mobile number

↓

One account

↓

Multiple roles

↓

Mode switching

---

# Required Fields

first_name

mobile

country_code

status

---

# Optional Fields

email

password

google_id

apple_id

profile_photo

gender

date_of_birth

timezone

---

# Indexes

PRIMARY

mobile UNIQUE

email UNIQUE

status

created_at

last_login_at

---

# Relationships

users

↓

customer_profiles

↓

driver_profiles

↓

admin_profiles

↓

user_devices

↓

user_sessions

↓

otp_verifications

↓

notifications

↓

wallets

↓

rides

---

# Validation

Mobile Number

Unique

Email

Unique

Password

Encrypted

Google ID

Nullable

Apple ID

Nullable

---

# Soft Delete

Enabled

deleted_at

---

# Audit

Every update must be logged.

---

End
