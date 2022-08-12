/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : dichvudb

 Target Server Type    : MariaDB
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 12/08/2022 17:20:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dichvu
-- ----------------------------
DROP TABLE IF EXISTS `dichvu`;
CREATE TABLE `dichvu`  (
  `MaDV` int(11) NOT NULL,
  `TenDV` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LoaiDV` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DonGia` float NOT NULL,
  PRIMARY KEY (`MaDV`) USING BTREE,
  INDEX `MaDV`(`MaDV`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dichvu
-- ----------------------------
INSERT INTO `dichvu` VALUES (1, 'Sửa chữa điện gia dụng', 'Điện gia dụng', 150000);
INSERT INTO `dichvu` VALUES (2, 'Sửa chữa điện lạnh', 'Điện dân dụng', 150000);
INSERT INTO `dichvu` VALUES (3, 'Lắp đặt sửa chữa mạng wifi internet', 'Điện dân dụng', 150000);
INSERT INTO `dichvu` VALUES (4, 'Lắp đặt sửa chữa ống nước', 'Điện nước', 100000);
INSERT INTO `dichvu` VALUES (5, 'Lắp đặt wifi tại nhà', '', 150000);

-- ----------------------------
-- Table structure for donhang
-- ----------------------------
DROP TABLE IF EXISTS `donhang`;
CREATE TABLE `donhang`  (
  `MaDH` int(11) NOT NULL,
  `TenKH` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DienThoai` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DiaChi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ThoiGianBD` date NOT NULL,
  `TrangThai` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ThoiGianKT` datetime NULL DEFAULT NULL,
  `MaDV` int(11) NOT NULL,
  `SoLuong` float NOT NULL,
  `ThanhTien` float NOT NULL,
  `GhiChu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaDangKy` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`MaDH`) USING BTREE,
  INDEX `donhang_ibfk_1`(`MaDV`) USING BTREE,
  CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaDV`) REFERENCES `dichvu` (`MaDV`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of donhang
-- ----------------------------
INSERT INTO `donhang` VALUES (14747369, 'Nguyễn Thái Thiện', '0981230906', 'HCM', '2022-08-12', 'DAKHOITAO', NULL, 5, 1, 150000, 'abv', 'fd94b9f370');
INSERT INTO `donhang` VALUES (305683874, 'Phan Thị Mai Hoa', '0981230906', 'HCM', '2022-08-12', 'DAKHOITAO', NULL, 2, 1, 150000, 'abc', 'fd94b9f370');
INSERT INTO `donhang` VALUES (336201486, 'Lê Văn Sơn abc', '0981230906', 'HCM', '2022-08-12', 'DAKHOITAO', NULL, 1, 1, 150000, 'a', 'fd94b9f370');
INSERT INTO `donhang` VALUES (683737190, 'Hoàng Văn Hà', '0981230906', 'HCM', '2022-08-02', 'DAKHOITAO', NULL, 1, 1, 150000, 'abc', 'fd94b9f370');
INSERT INTO `donhang` VALUES (768980283, 'nguyễn Bỉnh Khiêm', '0981230906', 'HCM', '2022-08-03', 'DAXACNHAN', NULL, 1, 1, 150000, 'abc', 'fd94b9f370');
INSERT INTO `donhang` VALUES (819934177, 'Anh Em Họ', '0987654321', 'HCM', '2022-08-04', 'DAKHOITAO', NULL, 1, 1, 150000, 'abv', 'fd94b9f370');
INSERT INTO `donhang` VALUES (982215053, 'Nguyễn Thái Học', '0981230906', 'HCM', '2022-08-12', 'DAKHOITAO', NULL, 5, 1, 150000, 'abv', 'fd94b9f370');
INSERT INTO `donhang` VALUES (1047110573, 'Anh Em Họ', '0981230906', 'HCM', '2022-08-05', 'DAKHOITAO', NULL, 1, 1, 150000, '2', 'fd94b9f370');
INSERT INTO `donhang` VALUES (1799188033, 'nguyễn Bính', '0981230906', 'HCM', '2022-08-06', 'DAKHOITAO', NULL, 1, 1, 150000, 'abc', 'fd94b9f370');
INSERT INTO `donhang` VALUES (1832853380, 'Anh Em Họ', '0987654321', 'HCM', '2022-08-07', 'DAKHOITAO', NULL, 1, 1, 150000, 'abv', 'fd94b9f370');
INSERT INTO `donhang` VALUES (1892816257, 'Phan Thị Mai Huong', '0981230906', 'HCM', '2022-08-12', 'DAKHOITAO', NULL, 2, 1, 150000, 'abc', 'fd94b9f370');
INSERT INTO `donhang` VALUES (2010546844, 'Nguyễn Thái Nhân', '0981230906', 'HCM', '2022-08-12', 'DAKHOITAO', NULL, 5, 1, 150000, 'abv', 'fd94b9f370');
INSERT INTO `donhang` VALUES (2042232436, 'Hoàng Minh Giám', '0981230906', 'HCM', '2022-08-08', 'DAKHOITAO', NULL, 1, 1, 150000, 'abc', 'fd94b9f370');
INSERT INTO `donhang` VALUES (2147483647, 'Hoàng Lê Bình', '0981230906', 'HN', '2022-08-11', 'DAKHOITAO', NULL, 1, 1, 150000, 'a', '123');

-- ----------------------------
-- Table structure for taikhoan
-- ----------------------------
DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE `taikhoan`  (
  `TenTK` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MatKhau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LoaiTK` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  PRIMARY KEY (`TenTK`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of taikhoan
-- ----------------------------
INSERT INTO `taikhoan` VALUES ('levanson', '62ef34f4e7b271b4ccdb5cbeb1546fd5', 0, 0);

SET FOREIGN_KEY_CHECKS = 1;
