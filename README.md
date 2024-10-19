## About Project

- This is simple project for a required task from HMASRV software company
- This project for RESTAPI of a simple task management app
- With this project, the client can: get tasks for assign user, top 10 assigned users have heighest tasks, create task by admin user and assigned it to a normal users
- Has 10000 normal user and 100 admin user ALREADY SEEDED :)
- All Controller Functions have tested

## Installation 
- Make clone from this repo ex: git clone ex:[web_url].
- Install dependences -> composer install.
- The env file is already exists [In the real .env file shoudn't be in the repo, but i left it becouse this project for testing my skills and give to you an idea of how my approach tasks relevant]
- Make sure that RDBMS is MySQL, so you should have XAMMP desktop application
- Make -> php artisan migrate:fresh --seed for create the database and seed it with fake data
- Make -> php artisan test -> for testing.
- After that -> php artisan serve -> for running in dev mode and test the app E2E.

## Database

- Having two table (User, Task)
- User attributes are (id, username, role[admin or assigned], timestamp(created_at, updated_at))
- Task attributes are (id, title, description, created_by, assigned_to, timestamp(created_at, updated_at))
- User whose role is admin can create many tasks
- User whose role is assigned has many assigned tasks

## Documentation
https://documenter.getpostman.com/view/18043505/2sAXxWYUQp

### Time for developing
date: from 16/10 to 17/10/2024
- Migration with database and seed -> 2 Hours
- Make Model and controllers -> 4 hours
- Testing -> 8 hours

