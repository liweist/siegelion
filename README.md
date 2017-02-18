# SiegeLion Framework
### A Lightweight PHP Framework based on Enterprise Architecture
- Demo: Easy to create Router and Action like design a business process
- Use Doctrine as ORM

### Architecture

**Application** *(Business process)*

In this layer, you can design your business process as concepts. Just use the APIs of Service, and do not need to care about the service implementation. Also it communicates with Front-end, getting request from user's action. 

**Service** *(Service provider)*

As service providers, here processes the request from Application layer. And implement functions and use the data manager from Storage layer to process data. 

**Storage** *(Data manager)*

Data entities will store here.

**System** *(Infrastructure)*

Basic functions, utilities, runtime and router.

---
By Wei Li (liweist.william@gmail.com)