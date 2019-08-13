### Setup
1. clone the repo
2. run `composer install`
3. create your database
	* `create database todo`
 
> create tables
 ```
CREATE TABLE tasks(
id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
description TEXT NOT NULL
);
```

#### update `tasks` with your database credentials 
```php
...
    $pdo = new PDO('mysql:host=localhost;dbname=your database name', 'root', 'your password');
...
```

### Usage
run `./tasks command`

> commands
   * `show` shows the list of tasks
   * `add` this requires argument `./tasks add "your reminder goes here"`
   * `completed`
   
### TODO

