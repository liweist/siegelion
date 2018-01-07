# SiegeLion Framework
### A Lightweight PHP Framework based on Enterprise Architecture
- Design and planning a web application like Enterprise Architecture
- Use Doctrine as ORM
- Reference from NodeJS Express, Java Servlet
- Code easy and clear understanding
- Pre-defined RESTful API Module and router
- Support muilt-subdomain application in one framework and share service components
- Hook for AOP
- Demo Project(Couqiao Weixin Online Market): Easy to create Router and Action like design a business process

### Architecture

**Application** *(Business process)*

In this layer, you can design your business process as concepts. Just use the APIs of Service, and do not need to care about the service implementation. Also it communicates with Front-end, getting request from user's action. 

**Service** *(Service provider)*

As service providers, here processes the request from Application layer. And implement functions and use the data manager from Storage layer to process data. 

**Storage** *(Data manager)*

Data entities will store here.

**System** *(Infrastructure)*

Basic functions, utilities, runtime and router.

### Requirement

`php >= 5.6`

### Install

```bash
composer install
```

### Usage

Easy to bind a route url path to defined Action, support sign `:id` as parameter pass into Action
```php
class App extends AppKernel implements AppInterface
{
    public function run()
    {
        Router::setAction('/login', 'UserLogin');
        Router::setAction('/user/:id', 'UserInfo');
    }
}
```

```php
class UserInfo extends Action implements RestfulActionInterface
{   
    //[GET] /user/:id
    public function get($params, $query)
    {
        return $params['id'];  // will echo the content of parameter id from url
    }

    //...
}
```

Easy render template
```html
<p>{title}</p>
```

```php
class Home extends Action implements ActionInterface
{
    public function index()
    {
        $replaces = [
            'title' => 'Siegelion demo'
        ];
        return $this->render('home.html', $replaces);
    }
}
```

### Demo Project (Couqiao Weixin Online Market)

**Tech Stack**
- Frontend: React + Redux + Webpack
- Database: MySQL + Redis(Session Cache)

**Initial Setting**
- Frontend initial setting (src -> Frontend)

```bash
npm init
npm start
```

- Config file (src -> Siegelion)

1. Edit your own database configuration in config.json

- Weixin connection (src -> Siegelion -> Service)

1. OAuth -> WxLogin.php : Edit your weixin login configuration
2. Payment -> WxPay.php : Edit your weixin payment configuration

**Enjoy your coding**

---
Copyright (c) 2016 Wei Li (liweist.william@gmail.com)
MIT Licence