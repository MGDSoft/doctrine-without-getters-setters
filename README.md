### Trying to use public properties in doctrine and remove getters & setters

It has always been said that code generators are not good practice, since the problem is not to generate them but to maintain the code.

In this case in an application, if you want to overwrite or reuse entities many times you have to change the properties of these getters and setters and it is a great effort and it does not benefit us so much.

Another good practice would be that the default behavior is what is expected and when there is a special occasion it is overwritten.
For fast development applications it is a real tedium to generate and maintain all this code, which we will rarely change its base behavior.

This simple project shows the possibility of not using getters and setters, but for collections it is advisable to use internal methods. Because we have 2 big problems.

- Prevent the lack of synchronization when they are bidirectional relationships.
- When you want to add an element that already exists, the application will give us an error ...

My conclusion, avoid getters & setters and use public properties but in collection must be declared with his own methods.

What do you think about this? 

If you want to try something to install

```sh
docker-compose up -d
docker-compose exec php bash
composer install
```

To execute 

```sh
php src/cli/1_create_data.php
```
