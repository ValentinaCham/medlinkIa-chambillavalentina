# Challenge-01: findPoint Function

This PHP function takes an array of two comma-separated number strings and returns the sorted intersection of numbers as a comma-separated string. If there is no intersection, it returns `'false'`.

## Execute

```bash
php index.php
```

## Example Test Cases

| Input                                   | Expected Output | Description                        |
| --------------------------------------- | --------------- | ---------------------------------- |
| `['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']` | `1,4,13`        | Common numbers are 1, 4, 13        |
| `['2, 5, 6', '3, 7, 8']`                | `false`         | No common numbers                  |
| `['10, 20, 30', '10, 20, 30']`          | `10,20,30`      | All numbers are common             |
| `['100, 200', '100, 300, 400']`         | `100`           | Only 100 is common                 |
