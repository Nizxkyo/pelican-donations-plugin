# Donations Plugin for Pelican Panel

Adds a Support Us page to the Pelican Panel where administrators can configure donation links for their community.

## Features

- Support Us page accessible to all users via the sidebar
- Available in both the server list and server console panels
- Configurable donation links with custom labels, URLs, button colors, and optional emoji
- Customizable support message
- Admin settings page for managing all options without editing config files

## Installation

Install the plugin via the Pelican admin panel or by placing the plugin folder in /var/www/pelican/plugins/ and running:

    php artisan p:plugin:install

## Configuration

1. Go to Admin > Plugins
2. Click the settings icon next to Donations
3. Add your donation links and customize the message
4. Save

No manual .env editing is required after installation.

## Link Fields

Each donation link accepts the following:

- Label - the button text (e.g. Buy Me a Coffee)
- URL - the full donation URL
- Emoji - optional, displayed to the left of the label
- Color - hex color for the button background
- Black or White selection for button text

## Author

nizxkyo
