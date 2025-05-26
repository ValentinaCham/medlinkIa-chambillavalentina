# Challenge-02: noIterate Function

Given an array of two strings `[N, K]`, find the smallest substring in `N` that contains all characters of `K` (including duplicates).

## Execute

```bash
php index.php
```

## Example Test Cases

| Input                            | Expected Output     | Description                                        |
| -------------------------------- | ------------------- | -------------------------------------------------- |
| `["ahffaksfajeeubsne", "jefaa"]` | `aksfajee`          | Smallest substring containing all chars in `jefaa` |
| `["abcdefg", "xyz"]`             | ` (empty string) `  | No substring contains all characters               |
| `["abdabca", "abc"]`             | `abc`               | Smallest window is `abc`                           |
| `["xyyzzyx", "xyz"]`             | `yzzyx`             | Includes all `x`, `y`, and `z`                     |
| `["thisisateststring", "tist"]`  | `tist`              | Smallest substring containing `tist`               |
