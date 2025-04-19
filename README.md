# newsSite
### Встановлення та підготовка MySQL
    1.  sudo apt install mysql-server
    2.  sudo systemctl start mysql.service
    3.  sudo mysql
    4.  CREATE DATABASE news CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
    5.  CREATE USER 'news_user'@'localhost' IDENTIFIED BY 'strong_password_here';
    6.  GRANT ALL PRIVILEGES ON news.* TO 'news_user'@'localhost';
    7.  FLUSH PRIVILEGES;
    8.  CREATE USER 'news_user'@'localhost' IDENTIFIED WITH mysql_native_password BY 'secure_password';
    9.  CREATE DATABASE news;
    10. GRANT ALL PRIVILEGES ON news.* TO 'news_user'@'localhost';
    11. FLUSH PRIVILEGES;
    12. USE news;
    13. CREATE TABLE `news` (
         `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         `title` VARCHAR(255) NOT NULL,
         `short_description` TEXT NOT NULL,
         `content` TEXT NOT NULL,
         `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
       );
    14. INSERT INTO `news` (title, short_description, content) 
    -> VALUES 
    -> ('Перша новина', 'Короткий опис першої новини', 'Повний текст першої новини.'),
    -> ('Друга новина', 'Короткий опис другої новини', 'Повний текст другої новини.');
