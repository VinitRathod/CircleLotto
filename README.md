# CircleLotto

A backend platform and admin dashboard for a group-based lottery ("syndicate") mobile app. Users form **circles**, pick or auto-generate lottery numbers, pay their entry via card, and receive draw results and reminders through push notifications and email. This repository contains the **Laravel REST API** that powers the mobile client and the **web admin panel** used to manage the platform.

> **Role:** Freelance backend developer — designed and built the API, payment integration, notification system, scheduled jobs, and admin dashboard.

---

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Architecture](#architecture)
- [Data Model](#data-model)
- [API Overview](#api-overview)
- [Scheduled Jobs](#scheduled-jobs)
- [Admin Panel](#admin-panel)
- [Getting Started](#getting-started)
- [Environment Variables](#environment-variables)
- [Project Structure](#project-structure)
- [Security Notes](#security-notes)

---

## Features

**Mobile API**
- Token-based authentication (Laravel Passport / OAuth) with registration, login, and logout
- Email + OTP verification and password recovery
- **Circles (syndicates):** create, join, search, verify members, remove members, list owned/joined circles
- **Number management:** lucky-dip random generation, add new numbers, save/edit/delete saved number sets
- **Draws & winners:** run draws, fetch winning numbers, query winners by date range, per-circle results
- **Payments:** save card, charge, and complete payment via JudoPay
- **Notifications:** list, unread count, mark read/read-all, plus in-app messages
- Firebase Cloud Messaging (FCM v1) push delivery

**Admin panel (web)**
- Secure admin login
- Dashboard with users, circles, and winners management
- Soft-delete and restore of users
- Broadcast messages to users
- Export circle results to spreadsheet
- Runtime feature kill-switch to disable functionality during draw windows

---

## Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP 8.1+ |
| Framework | Laravel 10 |
| API Auth | Laravel Passport (OAuth2), Sanctum |
| Database | MySQL |
| Push Notifications | Firebase Cloud Messaging (FCM v1) via `google/apiclient` |
| Payments | JudoPay (REST, via Guzzle) |
| Exports | PhpSpreadsheet |
| Views | Blade (admin panel + email templates) |
| Scheduling | Laravel Scheduler / cron |
| Build | Vite |

---

## Architecture

The application serves two clients from one Laravel codebase:

```
                +-----------------+         +------------------+
 Mobile App --->|  REST API (v1)  |         |   Admin Panel    |<--- Admin (browser)
                |  Passport auth  |         |  Blade + session |
                +--------+--------+         +---------+--------+
                         |                            |
                         v                            v
                +-------------------------------------------+
                |            Application / Models            |
                |   Circles . Users . Draws . Winners . ...  |
                +-----+-----------------+----------------+---+
                      v                 v                v
                  MySQL DB         JudoPay API       Firebase FCM
                      ^
                      |
              +-------+--------+
              | Scheduled Jobs |  (reminders, notifications, kill-switch)
              +----------------+
```

---

## Data Model

The platform is built on 16 Eloquent models:

| Domain | Models |
|---|---|
| Users | `User`, `UserDetails`, `UserRequest`, `UserCardTokens`, `UserPaymentReference` |
| Admin | `AdminUsers`, `AdminMessages` |
| Circles | `Circles`, `GroupMembers` |
| Numbers & Draws | `SavedNumbers`, `DrawNumbers`, `WinningNumber`, `Winners` |
| Platform | `Notifications`, `OTP`, `SwitchTable` |

---

## API Overview

All endpoints are prefixed with `/api/v1`. Authenticated routes require a Passport bearer token (`auth:api`).

**Public**
```
POST  /register              Register a new user
POST  /login                 Log in, returns access token
POST  /verifyEmail           Verify email address
POST  /verifyOtp             Verify OTP code
POST  /resendOtp             Resend OTP
POST  /changePassword        Reset / change password
```

**Authenticated — Numbers**
```
GET   /luckyDipNumbers       Generate random numbers
POST  /addNewNumbers         Add a number set
POST  /addSavedNumbers       Save a number set
GET   /savedNumbersList      List saved sets
POST  /editSavedNumbers/{id} Edit a saved set
GET   /deleteSavedNumbers/{id}
```

**Authenticated — Circles**
```
POST  /startCircle           Create a circle
POST  /joinCricle            Join a circle
POST  /verifyUser            Verify a member
POST  /removeUser            Remove a member
POST  /searchCricle          Search circles
GET   /userCircles           Circles the user belongs to
POST  /myCircles             User's circles
GET   /userCreatedCircle     Circles the user owns
POST  /groupMembers          Members of a circle
POST  /drawNumbers           Draw numbers for a circle
POST  /mycircleresults       Results for the user's circles
```

**Authenticated — Notifications & Messages**
```
GET   /notificationList
POST  /getUnreadCount
POST  /readAll
POST  /readMessage
GET   /messageList
```

**Authenticated — Payments (JudoPay)**
```
POST  /savecard
POST  /payment
POST  /completePayment
```

**Draws & winners**
```
POST  /winner                     Draw a winner
GET   /getWinnerNumber            Latest winning number
POST  /getWinningNumberDateRange  Winners in a date range
GET   /getFriday, /getMonth       Draw scheduling helpers
```

---

## Scheduled Jobs

Registered in `app/Console/Kernel.php` and run via the Laravel scheduler:

| Command | Cadence | Purpose |
|---|---|---|
| `app:send-scheduled-notification` | Twice daily | General scheduled pushes |
| `app:send-notification-for-adding-user` | Sun / Tue / Thu at 10:00 | Prompt users to add members |
| `app:remind-to-verify-the-user` | Daily 00:00 & 12:00 | Verification reminders |
| `app:send-circle-amount-notification-to-all` | Every minute | Payment / amount alerts |
| `app:thursday-time-pressure-notification` | Thursdays at 12:00 | Draw-day urgency nudge |
| `app:switch-off-functionality` | Thursdays at 19:00 | Toggle the feature kill-switch before draw |

To run the scheduler locally:
```bash
php artisan schedule:work
```

---

## Admin Panel

Accessible under `/admin` (session-authenticated). Provides:

- **Dashboard** — overview of platform activity
- **Users** — list, view, soft-delete, restore, and view deleted users
- **Circles** — list, view detail (including draw numbers), delete
- **Winners** — list and per-circle winner detail
- **Messaging** — send broadcast messages to users
- **Results export** — download circle results as a spreadsheet (`/results/{id}`)    

---

## Project Structure

```
app/
|-- Console/Commands/        # 6 scheduled notification / switch commands
|-- Events/                  # StartCircle broadcast event
|-- Http/Controllers/
|   |-- api/                 # UserAuth, Circle, JudoPay (mobile API)
|   |-- Admin/               # Login, Dashboard, Circle, User (admin panel)
|   |-- ExportController.php # Spreadsheet export
|   +-- FirebaseController.php  # FCM v1 push sender
|-- Mail/                    # OTP, Winner, Testing mailables
+-- Models/                  # 16 Eloquent models
resources/views/
|-- admin/                   # Full admin UI (layouts, circles, users, winners)
+-- emails/                  # OTP + winner email templates
routes/
|-- api.php                  # Mobile REST API
+-- web.php                  # Admin panel + utility routes
database/
|-- migrations/ . seeders/ . factories/
```

---

## License

Private / client project. Not licensed for redistribution.
