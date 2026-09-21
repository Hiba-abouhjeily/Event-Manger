# Event Management System

A dynamic web application designed for organizing, managing, and registering events with role-based access control and administrative analytics.

## Overview

This project provides an end-to-end platform for event administration. Users can register, log in, browse available events, and manage their ticket reservations, while administrators can oversee event listings, ticket distribution, and user registrations through a dedicated dashboard.

## Features

- **User Authentication**: Secure user login, registration, and password recovery flow.
- **Event Dashboard**: Interface for viewing and interacting with active and scheduled events.
- **Ticket System**: Module for issuing and viewing individual user tickets.
- **Admin & User Management**: Administrative views to monitor users and system activity.
- **Database Backend**: Complete MySQL relational schema for entities, dynamic ticketing, and roles.

## Tech Stack

- **Backend**: PHP
- **Frontend**: HTML5, CSS3, JavaScript
- **Database**: MySQL / phpMyAdmin

## Project Structure

```text
Event-Manger/
│
├── images/               # Application media and event graphics
├── includes/             # Modular PHP scripts and database connections
├── dashbaord.php         # Admin and activity monitoring dashboard
├── forgot_password.php   # Account password reset workflow
├── login.php             # User login portal
├── main.php              # Main landing/portal page
├── register.php          # Account creation interface
├── tickets.php           # User event ticket display and management
├── users.php             # User account administration script
├── scripts.sql           # Database schema and table definitions
├── styledash.css         # Styling for dashboard views
├── stylelog.css          # Styling for login and authentication pages
├── stylereg.css          # Styling for registration forms
└── styleuser.css         # General user view styling rules
