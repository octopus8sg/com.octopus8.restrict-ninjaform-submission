# Restrict Ninjaform Submission Plugin

## Description
This WordPress plugin allows you to restrict the submission of Ninja Forms after a specified expiration date. When the expiration date is reached, the form will no longer be displayed, and an optional custom message can be shown to the users.

## Features
- Restrict form submission after a specified date.
- Display a custom expiration message when the form is no longer available.
  
## Installation
1. Download the plugin files and upload the entire `restrict-ninjaform-submission` directory to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress. 

## Usage
1. **Add Hidden Fields to Your Form:**
   - For each form where you want to apply an expiration date, include a hidden field with the key set to `custom_expiration_date` and set its default value to the desired expiration date in `YYYY-MM-DD` format.
   - Optionally, include another hidden field with the key set to `custom_expiration_message` to customize the message displayed when the form is expired.

2. **Example:**
   - Add a hidden field to your Ninja Form:
     - Key: `custom_expiration_date`
     - Default Value: `2024-12-31`
   - Add another hidden field to customize the expiration message:
     - Key: `custom_expiration_message`
     - Default Value: `Sorry, this form is no longer available.`
