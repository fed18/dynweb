# SQL Queries

```sql
SELECT * FROM `users`
SELECT * FROM `animals`
SELECT * FROM animals, users
SELECT * FROM animals, users WHERE animals.owned_by = users.id
Expand Requery Edit Explain Profiling Database: fed18 Queried time: 13:9:40
SELECT * FROM animals JOIN users ON animals.owned_by = users.id
SELECT * FROM animals JOIN users ON animals.owned_by = users.id
SELECT * FROM animals LEFT JOIN users ON animals.owned_by = users.id
SELECT * FROM animals RIGHT JOIN users ON animals.owned_by = users.id
SELECT * FROM `animals`
UPDATE `animals` SET `owned_by` = '2' WHERE `animals`.`id` = 2;
UPDATE `animals` SET `owned_by` = '4' WHERE `animals`.`id` = 5;
UPDATE `animals` SET `owned_by` = '10' WHERE `animals`.`id` = 6;
UPDATE `animals` SET `owned_by` = '05' WHERE `animals`.`id` = 7;
INSERT INTO `animals` (`id`, `animal`, `color`, `weight`, `born`, `owned_by`) VALUES (NULL, 'Kitten', 'red', '5.6', '2018-10-09 00:00:00', '2');
SELECT * FROM `animals`
SELECT * FROM `animals`
SELECT COUNT(animals.id) as ani FROM animals JOIN users ON users.id = animals.owned_by GROUP BY users.id
SELECT COUNT(animals.id) as ani, users.username FROM animals JOIN users ON users.id = animals.owned_by GROUP BY users.id
SELECT COUNT(animals.id) as ani, users.username FROM animals JOIN users ON users.id = animals.owned_by GROUP BY users.id
SELECT * FROM `users`
SELECT * FROM `animals`
SELECT * FROM animals JOIN users ON users.id = animals.owned_by
SELECT animals.id, animals.animal, animals.color, animals.weight, users.username FROM animals JOIN users ON users.id = animals.owned_by
SELECT animals.id, animals.animal, animals.color, animals.weight, users.username as owned_by FROM animals JOIN users ON users.id = animals.owned_by
SELECT animals.id, animals.animal, animals.color, animals.weight, u.username as owned_by FROM animals JOIN users AS u ON u.id = animals.owned_by
SELECT animals.id, animals.animal, animals.color, animals.weight, u.username AS owned_by FROM animals JOIN users AS u ON u.id = animals.owned_by AND u.id = 3
SELECT animals.id, animals.animal, animals.color, animals.weight, u.username AS owned_by FROM animals JOIN users AS u ON u.id = animals.owned_by AND u.id = 3
SELECT * FROM `animals`
SELECT * FROM `animals`
SELECT * FROM `animals`
SELECT COUNT(animals.id), u.username FROM animals JOIN users AS u ON u.id = animals.owned_by
SELECT * FROM `animals`
SELECT COUNT(animals.id), u.username FROM animals JOIN users AS u ON u.id = animals.owned_by GROUP BY u.username
SELECT COUNT(animals.id) AS number_of_animals, users.username FROM animals JOIN users ON users.id = animals.owned_by GROUP BY users.username
SELECT * FROM animals, users
SELECT * FROM animals JOIN users ON users.id = animals.owned_by
SELECT animals.id, animals.animal, users.username FROM animals JOIN users ON users.id = animals.owned_by
SELECT COUNT(animals.id) AS number_of_animals, users.username FROM animals JOIN users ON users.id = animals.owned_by GROUP BY users.username
SELECT * FROM `users`
SELECT COUNT(animals.id) AS number_of_animals, users.username FROM animals JOIN users ON users.id = animals.owned_by GROUP BY users.username
SELECT * FROM animals, users
```

```sql
SELECT * FROM `products`
SELECT * FROM `products`
SELECT * FROM `products`
SELECT * FROM `products`
INSERT INTO `products` (`product_name`, `price`) VALUES ('En kotte', '10'), ('Kotte (Svenskt Tenn)', '6999');
SELECT * FROM `products`
INSERT INTO `products` (`product_name`, `price`) VALUES ('Inte kotte', '1');
SELECT * FROM `products`
SELECT * FROM `products`
SELECT * FROM `products`
SELECT * FROM `products`
SELECT * FROM `products`
SELECT product_name FROM `products`
SELECT price FROM `products`
SELECT price FROM products
SELECT product_name, price FROM products ORDER BY product_name ASC
SELECT product_name, price FROM products ORDER BY price ASC
SELECT product_name, price FROM products ORDER BY `products`.`price` DESC
SELECT product_name, price FROM products ORDER BY `products`.`product_name` ASC
SELECT product_name, price FROM products ORDER BY products.product_name ASC
SELECT product_name, price FROM products WHERE products.price > 10
SELECT product_name, price FROM products WHERE products.price > 10 AND products.price < 10000
SELECT product_name, price FROM products WHERE products.price > 10 AND products.price < 10000
```