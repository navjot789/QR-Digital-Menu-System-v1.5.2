# Overview?
Self ordering restaurant system specially make in COVD19 pandamic for the restaurant owners who are stugling with it. This system allow restaurant owners to take orders from their customers with proper social distancing. With the help of this system customer can order from safe distancing. 

# Requiretments 
1. Owner needs to printout the QR code of the webapp and place it to every table of the restaurant.
2. Owner needs to assign the Table number to each table in the restaurant.

# Use case
Suppose a customer visit in your restaurant for the lunch and the pandamic is still on. Because you already setup this system and fullfill all the requirement above, the customer will add the number of people he/she with and the table number at which he/she sitting on.
Now, he/she will select the item and add it into the cart. Once he/she done with it, will place the order. 
The owner will get the Email with all the order informaion and with table number from which order is comming.

# View
1. Landing page: 

![Landing](https://i.ibb.co/41gKDfh/1.png)

2. Admin console

![Landing](https://i.ibb.co/vqb7WxP/Untitled.png)

# Necessary changes

Change the USER, PASS under inc/config/config.php 

```php
$conn = new mysqli('localhost', 'USER', 'PASS', 'denieuwe_db');
```

Change the Host USER, PASS under inc/mailing_parameters.php for SMTP mail

```php
$mail->Host = 'DOMAIN.COM';
$mail->Username = 'USER_MAIL';
$mail->Password = 'PASSWORD';
```
Add the mailing address here on which you want to recieve order emails. 
```php
$mail->addAddress('email@gamil.com');
```

# Admin console
 Admin panel can be access via WEB-APP/admin/
```
Username: admin
Password: admin
```

# Contact 
1. If you find any problem in setting a this up then you can DM here: [Instagram!](https://www.instagram.com/code_lone/).
2. Youtube channel: [Youtube!](https://www.youtube.com/channel/UCVlSbZdK_7tTF_X91gpD48g).



