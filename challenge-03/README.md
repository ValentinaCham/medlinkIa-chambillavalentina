# Challenge-03: The Gilded Rose Kata

## Setup & Installation

1. **Install dependencies**:

```bash
composer install
```

2. **Update Kahlan** (for PHP 8+ compatibility):

```php
composer require --dev kahlan/kahlan:^6.0
```

## Solution Approach

### Key Refactors:

- Replaced nested conditionals with strategy pattern
- Extracted item quality rules into separate classes
- Improved code readability with proper naming

## Run tests

```bash
php vendor\kahlan\kahlan\bin\kahlan
```