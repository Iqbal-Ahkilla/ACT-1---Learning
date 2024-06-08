/*
 Navicat Premium Data Transfer

 Source Server         : Iqbal
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : cafe_mojo_test

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 07/06/2024 20:45:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for best_sellers
-- ----------------------------
DROP TABLE IF EXISTS `best_sellers`;
CREATE TABLE `best_sellers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `number_of_sales` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fkbs_menu_id`(`menu_id` ASC) USING BTREE,
  CONSTRAINT `fkbs_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of best_sellers
-- ----------------------------
INSERT INTO `best_sellers` VALUES (1, 10, 7);
INSERT INTO `best_sellers` VALUES (2, 11, 12);
INSERT INTO `best_sellers` VALUES (3, 9, 10);
INSERT INTO `best_sellers` VALUES (4, 2, 2);
INSERT INTO `best_sellers` VALUES (5, 23, 1);

-- ----------------------------
-- Table structure for contact_messages
-- ----------------------------
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact_messages
-- ----------------------------
INSERT INTO `contact_messages` VALUES (1, 'Iqbal Ahkilla', 'ia@gov.id', 'Lorem ipsum dolor sit amet consecteur adipicisim');
INSERT INTO `contact_messages` VALUES (2, 'Arjuna Rifa&#039;i', 'monarch@gmail.com', 'Woilah cafe kok ngedol rawon, ngakak cik');
INSERT INTO `contact_messages` VALUES (3, 'M Risky', 'rzk@gmail.com', 'Kelas web e mas broo');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `menu_price` decimal(10, 2) NULL DEFAULT NULL,
  `menu_category` enum('food','drink') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Nasi Goreng', 'Nasi yang digoreng dengan bumbu kecap, telur, dan berbagai tambahan lainnya.', 12.00, 'food', 'Nasi Goreng.jpg');
INSERT INTO `menus` VALUES (2, 'Mie Goreng', 'Mie yang digoreng dengan bumbu kecap sayuran dan tambahan protein.', 10.00, 'food', 'Mie Goreng.jpg');
INSERT INTO `menus` VALUES (3, 'Sate Ayam', 'Tusukan daging ayam yang dipanggang dan disajikan dengan bumbu kacang.', 6.00, 'food', 'Sate Ayam.jpg');
INSERT INTO `menus` VALUES (4, 'Martabak Telur', 'Martabak tipis dengan isian telur, daging, dan bumbu rempah.', 12.00, 'food', 'Martabak Telur.jpg');
INSERT INTO `menus` VALUES (5, 'Martabak Manis', 'Martabak tebal dengan isian seperti cokelat, keju, kacang dan tambahan susu kental manis.', 8.00, 'food', 'Martabak Manis.jpg');
INSERT INTO `menus` VALUES (6, 'Jus Jeruk', 'Jus segar dari jeruk peras dengan es batu.', 6.00, 'drink', 'Jus Jeruk.jpg');
INSERT INTO `menus` VALUES (7, 'Jus Apel', 'Jus segar dari olahan buah apel berkualitas tinggi.', 6.00, 'drink', 'Jus Apel.jpg');
INSERT INTO `menus` VALUES (8, 'Kopi Hitam', 'Kopi original dengan rasa yang fantastik.', 4.00, 'drink', 'Kopi Hitam.jpg');
INSERT INTO `menus` VALUES (9, 'Gado Gado', 'Salad sayuran dengan bumbu kacang yang gurih dan pedas.', 10.00, 'food', 'Gado Gado.jpg');
INSERT INTO `menus` VALUES (10, 'Bakso', 'Bola-bola daging yang disajikan dalam kuah kaldu dengan mie dan sayuran.', 12.00, 'food', 'Bakso.jpg');
INSERT INTO `menus` VALUES (11, 'Ayam Geprek', 'Ayam goreng geprek dengan sambal melimpah.', 14.00, 'food', 'Ayam Geprek.jpg');
INSERT INTO `menus` VALUES (12, 'Nasi Lemak', 'Nasi yang dimasak dengan menggunakan santan kelapa untuk memberikan cita rasa yang gurih', 18.00, 'food', 'Nasi Lemak.jpg');
INSERT INTO `menus` VALUES (13, 'Nasi Pecel', 'Makanan yang menggunakan bumbu sambal kacang sebagai bahan utamanya yang dicampur dengan aneka jenis sayuran.', 10.00, 'food', 'Pecel.jpg');
INSERT INTO `menus` VALUES (14, 'Rawon', 'Sup daging berkuah hitam dengan campuran bumbu khas yang menggunakan kluwek.', 12.00, 'food', 'Rawon.jpg');
INSERT INTO `menus` VALUES (15, 'Pempek', 'Hidangan bercita rasa ikan dengan kuah khas Palembang', 14.00, 'food', 'Pempek.jpg');
INSERT INTO `menus` VALUES (16, 'Bajigur', 'Minuman hangat dari santan, gula aren, dan jahe.', 6.00, 'drink', 'Bajigur.jpg');
INSERT INTO `menus` VALUES (17, 'Es Cendol', 'Minuman dingin dari tepung beras, santan, gula merah, dan cendol hijau.', 6.00, 'drink', 'Es Cendol.jpg');
INSERT INTO `menus` VALUES (18, 'Es Doger', 'Es campur dengan sirup merah, tape, ketan hitam, dan kelapa muda.', 6.00, 'drink', 'Es Doger.jpg');
INSERT INTO `menus` VALUES (19, 'Jus Mangga', 'Jus buah segar dari mangga yang manis dan menyegarkan.', 5.00, 'drink', 'Jus Mangga.jpg');
INSERT INTO `menus` VALUES (20, 'Kopi Dalgona', 'Minuman yang dibuat dengan mengocok bubuk kopi instan , gula, dan air panas dengan perbandingan yang sama hingga menjadi krim lalu ditambahkan ke dalam susu dingin atau panas.', 8.00, 'drink', 'Kopi Dalgona.jpg');
INSERT INTO `menus` VALUES (21, 'Ice Boba', 'Minuman yang terbuat dari tepung tapioka dengan tambahan teh dan susu.', 8.00, 'drink', 'Ice Boba.jpg');
INSERT INTO `menus` VALUES (22, 'Matcha Tea', 'Teh hijau berbentuk bubuk yang dibuat dari menggiling teh hijau hingga halus seperti tepung.', 8.00, 'drink', 'Matcha.jpg');
INSERT INTO `menus` VALUES (23, 'Es Teh Manis', 'Minuman yang terbuat dari teh yang telah diseduh, kemudian dicampur dengan gula dan es batu.', 3.00, 'drink', 'Es Teh Manis.jpg');

-- ----------------------------
-- Table structure for order_items
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NULL DEFAULT NULL,
  `menu_id` int NULL DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_order_id`(`order_id` ASC) USING BTREE,
  INDEX `fk_menu_id`(`menu_id` ASC) USING BTREE,
  CONSTRAINT `fk_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES (7, 6, 1, '2');
INSERT INTO `order_items` VALUES (8, 6, 2, '1');
INSERT INTO `order_items` VALUES (9, 7, 10, '2');
INSERT INTO `order_items` VALUES (10, 7, 23, '2');
INSERT INTO `order_items` VALUES (11, 8, 18, '2');
INSERT INTO `order_items` VALUES (12, 8, 6, '5');
INSERT INTO `order_items` VALUES (13, 9, 10, '2');
INSERT INTO `order_items` VALUES (14, 9, 11, '2');
INSERT INTO `order_items` VALUES (15, 9, 9, '4');
INSERT INTO `order_items` VALUES (16, 10, 9, '4');
INSERT INTO `order_items` VALUES (17, 11, 9, '2');
INSERT INTO `order_items` VALUES (18, 12, 11, '2');
INSERT INTO `order_items` VALUES (19, 12, 2, '2');
INSERT INTO `order_items` VALUES (20, 13, 11, '4');
INSERT INTO `order_items` VALUES (21, 14, 10, '1');
INSERT INTO `order_items` VALUES (22, 14, 23, '1');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `table_id` int NULL DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_table_id`(`table_id` ASC) USING BTREE,
  CONSTRAINT `fk_table_id` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (6, 2, NULL);
INSERT INTO `orders` VALUES (7, 4, NULL);
INSERT INTO `orders` VALUES (8, 3, NULL);
INSERT INTO `orders` VALUES (9, 2, '2024-06-07 01:10:58');
INSERT INTO `orders` VALUES (10, 2, '2024-06-07 01:11:56');
INSERT INTO `orders` VALUES (11, 2, '2024-06-07 01:13:19');
INSERT INTO `orders` VALUES (12, 2, '2024-06-07 01:13:36');
INSERT INTO `orders` VALUES (13, 2, '2024-06-07 01:14:52');
INSERT INTO `orders` VALUES (14, 3, '2024-06-07 12:47:43');

-- ----------------------------
-- Table structure for orders_test
-- ----------------------------
DROP TABLE IF EXISTS `orders_test`;
CREATE TABLE `orders_test`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders_test
-- ----------------------------
INSERT INTO `orders_test` VALUES (1, 'Sate Ayam', 6.00, '1');
INSERT INTO `orders_test` VALUES (2, 'Nasi Goreng', 12.00, '3');
INSERT INTO `orders_test` VALUES (3, 'Mie Goreng', 10.00, '2');
INSERT INTO `orders_test` VALUES (4, 'Gado Gado', 10.00, '1');
INSERT INTO `orders_test` VALUES (5, 'Jus Apel', 6.00, '3');
INSERT INTO `orders_test` VALUES (6, 'Mie Goreng', 10.00, '1');

-- ----------------------------
-- Table structure for tables
-- ----------------------------
DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `capacity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `available` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `current_use` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tables
-- ----------------------------
INSERT INTO `tables` VALUES (1, 'TABLE A', '6', 'true', 0);
INSERT INTO `tables` VALUES (2, 'TABLE B', '6', 'true', 0);
INSERT INTO `tables` VALUES (3, 'TABLE C', '8', 'true', 0);
INSERT INTO `tables` VALUES (4, 'TABLE D', '10', 'true', 0);

SET FOREIGN_KEY_CHECKS = 1;
