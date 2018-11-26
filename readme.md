# Wannabe Ebates
##### Not sure what this is? Take a look at Ebates.com, this is basically a cashback engine

#### This is built with Laravel 5.6 and Bulma 0.7.0 for Users and CoreUi for Admin

**Warning**: Work in progress

#### Current Database Structure
![Cashback Database](https://raw.githubusercontent.com/BryanYeh/wannabe-ebates/master/cashback.png)

## Progress & Todos

Basic Viewing Functions
- [x] Home Page
- [x] View All Stores
- [x] View Store Page
- [x] Go To Store

User Dashboard
- [x] Dashboard
- [ ] Balance
- [x] Trips
- [x] Withdrawal History
- [ ] Settings
- [ ] Subscriptions

(Social) Signup/Login
- [x] Default
- [x] Google+
- [ ] Facebook

Admin (Generic not going into explaination)
- [x] Admin Dashboard
- [ ] Affliate Networks API
- [ ] Simple Blog

Future Things
- [ ] Upgrade to Laravel 5.7 **Near Future**
- [ ] Code Refactoring
- [ ] Use Angular/Vue
- [ ] Launch a test website

## Setting Up
1. Clone/Download this repo
2. Change directory to project folder
3. Run ```composer install```
4. Rename or copy **.env.example** to **.env**
5. Run ```php artisan key:generate```
6. Have **DB_** and **GOOGLE_** filled out in the **.env**
7. Create an empty database with what you have on **DB_DATABASE**
8. Run ```php artisan migrate --seed``` (The seed will populate the necessary tables AND sample data also)
9. Everything is set up and ready to test!