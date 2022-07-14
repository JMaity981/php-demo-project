

CREATE TABLE `tbl_customer_transection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_ledger_id` int(10) NOT NULL,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''C''=Credit ''D''=Debit',
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `created_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('1','71','D','SL No.-13, Weight-10.7, Ornament-2','50.00','-50.00','2022-03-25 17:11:26');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('2','71','D','16 /13.970/3PICE','75.00','-125.00','2022-03-25 18:35:04');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('3','45','D','SL No.-23, Weight-8.42, Ornament-24','720.00','-720.00','2022-03-26 15:06:40');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('4','10','D','SL No.-28, Weight-109.12, Ornament-10','300.00','-300.00','2022-03-26 18:00:15');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('5','45','D','','720.00','-1440.00','2022-03-26 18:24:14');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('6','83','D','SL No.-41, Weight-11.42, Ornament-5','200.00','-200.00','2022-03-26 18:31:14');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('7','45','C','HALLMARKING DUE COLLECATION','720.00','-720.00','2022-03-26 18:33:19');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('8','45','C','CASH DUE COLLECTION','720.00','0.00','2022-03-26 18:34:07');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('9','76','D','SL No.-43, Weight-28.49, Ornament-2','50.00','-50.00','2022-03-26 19:01:29');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('10','103','D','SL No.-60, Weight-5.45, Ornament-8','320.00','-320.00','2022-03-27 13:18:21');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('11','83','C','SL NO 41  23/03/22 DHAR SODH','200.00','0.00','2022-03-27 15:55:20');

INSERT INTO tbl_customer_transection (id, fk_ledger_id, type, remarks, amount, balance, created_date_time) VALUES ('12','10','D','SL No.-59, Weight-10.17, Ornament-4','120.00','-420.00','2022-03-27 16:46:54');


CREATE TABLE `tbl_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `created_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('1','54.00','TEA & BISCUIT','2022-03-25 19:19:21');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('2','10.00','TIFIN','2022-03-25 19:20:00');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('3','10.00','FLOWERS','2022-03-25 19:20:20');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('4','20.00','26/03/22 - TIFIN','2022-03-27 11:57:20');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('5','10.00','26/03/22 -FLOWERS','2022-03-27 11:58:24');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('6','36.00','26/03/22 TEA','2022-03-27 11:58:58');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('7','60.00','WATER','2022-03-27 12:23:12');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('8','24.00','STAPLES PIN  3 PACKET','2022-03-27 12:44:13');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('9','10.00','FLOWERS','2022-03-27 12:45:23');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('10','28.00','TEA CUP','2022-03-27 12:47:59');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('11','25.00','BISCUIT','2022-03-27 12:49:29');

INSERT INTO tbl_expenses (id, amount, remarks, created_date_time) VALUES ('12','20.00','TIFIN','2022-03-27 18:07:34');


CREATE TABLE `tbl_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jewellers_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `propriter_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `ph_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `lc_no` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `gst_no` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `address` text COLLATE utf8_bin NOT NULL,
  `logo` varchar(15) COLLATE utf8_bin NOT NULL,
  `hallmarking_rate_h` decimal(10,2) NOT NULL,
  `hallmarking_rate_h_more` decimal(10,2) NOT NULL,
  `hallmarking_rate_o` decimal(10,2) NOT NULL,
  `card_rate` decimal(10,2) NOT NULL,
  `photo_rate` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `updated_balance_time` datetime DEFAULT current_timestamp(),
  `is_active` char(1) COLLATE utf8_bin NOT NULL COMMENT 'A=''active'',I=''inactive''',
  `is_delete` char(1) COLLATE utf8_bin NOT NULL COMMENT 'Y=''delete'',N=''notdelete''',
  `created_date_time` datetime NOT NULL,
  `updated_date_time` datetime DEFAULT NULL,
  `last_transaction_time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('1','RAMKRISHNA  JEWELLERS','SUMAN BEJ','1234567890','','','CHANDIPUR','R J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','Y','2022-03-17 22:04:01','','2022-03-17 22:42:17');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('2','Mallick jewellers','Goutam mallick','1234567892','','','Chandipur','M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','Y','2022-03-19 12:32:40','2022-03-19 12:32:55','2022-03-19 13:07:55');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('3','Ramkrishna jewellers','Suman bej','3214569870','','','Chandipur','R J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','Y','2022-03-19 12:34:37','','2022-03-19 13:12:42');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('4','AMRETA JEWELLERY WORKS','JANINA','9876543210','','','NANDIGRAM','ARS+','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','Y','2022-03-19 12:59:46','2022-03-19 12:59:56','2022-03-19 12:59:46');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('5','ANUKUL JEWELLERS','ARUP DAS','9647354389','','','SUTAHATA','A J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-19 17:59:56','','2022-03-21 20:32:37');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('6','ARATI JEWELLERS','TUSHAR DAS','8768647671','','','NETAJINAGAR','A J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-19 18:01:09','','2022-03-22 16:19:52');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('7','ARATI JEWELLERS','MOYNA','9932657674','','','SUJOY DA','A J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-19 18:02:19','2022-03-25 18:23:41','2022-03-19 18:02:19');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('8','MONI KANCHAN JEWELLERS','SOLIL JANA','9932948799','','','MOYNA','M K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 14:54:26','','2022-03-21 14:54:26');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('9','MATREE JEWELLERS','SANTOSH KAMILA','6295921560','','','BAZKUL','M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 14:56:44','','2022-03-21 14:56:44');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('10','MALLIK JEWELLERS','MANOJ   MALLIK','9732979523','','','CHANDIPUR
PURBA MEDINIPUR','M J','120.00','30.00','30.00','100.00','50.00','-420.00','2022-03-27 16:46:54','A','N','2022-03-21 14:58:55','','2022-03-27 16:46:54');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('11','MAKALI JEWELLERS','SUBHANKAR KARMAKAR','8670586130','','','BHIMESWARI','M K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:04:30','','2022-03-21 15:04:30');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('12','MAKALI JEWELLERS','SAMIR HAIT','4444444444','','','MOYNA','M K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:05:53','','2022-03-21 15:05:53');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('13','MAJI JEWELLERS','ASISH MAJI','9679293602','','','CHANDIPUR','M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:07:43','','2022-03-21 15:07:43');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('14','MAITY JEWELLERS','AMAL KUMAR  MAITY','8670155792','','','CHANDIPUR','M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:10:22','','2022-03-21 15:10:22');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('15','MAHALAXMI JEWELLERS','RANJIT JANA','9932450718','','','KHONCHI 
PURBAMEDINIPUR','M L J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:11:23','','2022-03-21 15:11:23');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('16','MAAKALI JEWELLERS','SUBHASH PATRA','8967303416','','','HALDIA','M K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:12:36','','2022-03-21 15:12:36');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('17','MAA SITA JEWELLERS','MAA SITA JEWELLERS','9833966163','','','HANSCHARA','M S J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:13:49','','2022-03-21 15:13:49');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('18','MAA SARASWATI JEWEELRS','TARUN  BERA','7430874491','','','CHANDIPUR
PURBA MEDINI PUR','M S J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:15:00','','2022-03-21 15:15:00');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('19','MAA NACHINDA JEWELLERS','KALIPADA DA','2578966163','','','BAJKUL','M N J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:17:42','','2022-03-21 15:17:42');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('20','MAA LAXMI JEWELLERS','BISWAJIT MAJI','9635013251','','','MOYNA','M L J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:23:57','','2022-03-21 15:23:57');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('21','MAA JEWELLERS','TARAPADA SAMANTA','9609123956','','','THEKUA','M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:25:11','','2022-03-21 15:25:11');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('22','MAA GOURI JEWELLERS','MAHADEV PRADHAN','8918577213','','','GOALAPUKUR
PURBAMEDINIPUR','M G J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:26:18','','2022-03-21 15:26:18');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('23','MAA DURGA JEWELLRS','LAXMIKANTA MAITY','9733781321','','','CHANDIPUR','M D J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:27:18','','2022-03-21 15:27:18');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('24','MAA DAKSHINAKALI JEWELLERS','MIHIR RANA','8768158848','','','MOYNA 
EAST MEDINIPUR','M D K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:28:27','','2022-03-21 15:28:27');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('25','MAA BINDUBASINI JEWELLERS','UTTAM PRAMANIK','7407949776','','','NONAKURI,   KAKTIYA  
PURBAMEDINIPUR','M B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:29:28','','2022-03-21 15:29:28');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('26','MAA BHAVANI JEWELLERS','BHAVANI','9775206789','','','CHANDIPUR','M B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:30:26','','2022-03-21 15:30:26');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('27','MAA BHARGABHIMA JEWELLERS','GOUTAM GHOSH','7703980106','','','DIMARI','M B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:31:19','','2022-03-21 15:31:19');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('28','MAA BARGABHIMA JEWELLERS','KAMAL BERA','9732909504','','','KALIKAKHALI,  CHANDIPUR
PURBA MEDINIPUR','M B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:32:34','','2022-03-21 15:32:34');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('29','MA MANGALCHANDI JEWELLERS','ARJUN MANNA','9734336692','','','KOLSAR','M M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:33:41','','2022-03-21 15:33:41');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('30','M C B JEWELLERS','SIBNATH PATRA','9874967426','','','HORIDASPUR','M C B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:34:38','','2022-03-21 15:34:38');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('31','LOKNATH JEWELLERS','SARAT HAIT','9932048116','','','KOLSAR
PURBAMEDINIPUR','L J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:35:42','','2022-03-21 15:35:42');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('32','LAXMI JEWELLERS','SHUBHAS SAMANTA','6295176972','','','NETAJINAGAR,    TAMLUK
 PURBAMEDINIPUR','L J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:36:33','','2022-03-21 15:36:33');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('33','KRISNAKALI JEWELLERS','DHARMARAJ PRADHAN','8001970414','','','CHOUKHALI
PURBAMEDINIPUR','K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','Y','2022-03-21 15:37:42','','2022-03-21 15:37:42');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('34','KOLE JEWELLERS','DILIP','9064952600','','','TAMLUK','K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:38:45','','2022-03-21 15:38:45');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('35','KOLE JEWELLERS','ASHIS  KOLE','9932847979','','','TAMLUK','K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:39:37','','2022-03-21 15:39:37');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('36','KARMAKAR JEWELLERS','KARMAKAR','4561237890','','','CHANDIPUR','K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:40:28','','2022-03-21 15:40:28');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('37','KANCHAN JEWELLERS','KANCHAN DA','9932905094','','','SONAKHALI','K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:41:20','','2022-03-21 15:41:20');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('38','JOYTI JEWELLERS','GOUR DAS','7797989048','','','CHANDIPUR    
PURBA MEDINIPUR','J J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:42:11','','2022-03-21 15:42:11');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('39','JOYGURU JEWELLERS','PRADIP GANTAIT','9800955495','','','AMRITBERIA','J J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:45:30','','2022-03-21 15:45:30');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('40','JOYGURU JEWELLERS','GURUPADA DHARA','9732973552','','','MOYNA
PURBAMEDINIPUR','J J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:46:22','','2022-03-21 15:46:22');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('41','JANA GINI BHAVAN','SOUMEN JANA','9609133207','','','BHOGPUR','J G B','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:47:18','','2022-03-21 15:47:18');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('42','J P JEWELLERS','Prasanta sahoo','8919261290','','','CHANDIPUR','J P J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 15:48:07','','2022-03-21 15:48:07');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('43','J K JEWELLERS','BISWAJIT DAS','9732893058','','','NONAKURI,  KAKTIYA
PURBA MEDINIPUR','J K','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:14:40','','2022-03-22 11:30:34');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('44','HIMALOYA JEWELLERY','JAGABONDHU','9933749332','','','MOYNA','H J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:15:52','','2022-03-21 16:15:52');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('45','GOURANGA JEWELLERS','MANATOS SAHOO','9800373182','','','CHANDIPUR','G J','120.00','30.00','30.00','100.00','50.00','0.00','2022-03-26 18:34:07','A','N','2022-03-21 16:16:40','','2022-03-26 18:34:07');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('46','GITA JEWELLERS','JAYONTA SAMANTA','6296818283','','','BAHARPOTA','G J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:17:30','','2022-03-21 16:17:30');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('47','GITA JEWELLERS','SUBHENDU KUMAR MAITY','8145395827','','','NARGHAT','G J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:18:37','','2022-03-21 16:18:37');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('48','FENCY JEWELLERS','BHOLANATH GUCHAIT','9732587549','','','KALIKAKHALI,  CHANDIPUR
PURBA MEDINIPUR','F J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:19:33','','2022-03-21 16:19:33');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('49','DAS JEWELLRY PALACE','BIKAS DAS','8348401255','','','CHANDIPUR','D J P','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:20:32','2022-03-27 11:09:51','2022-03-21 16:20:32');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('50','CHANDAN JEWELLERS','CHANDAN KAMILA','9733991526','','','BANSGORA BAZAR','C J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:21:35','','2022-03-21 16:21:35');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('51','CHANCHALA JEWELLRS','JAGANNATH  RANA','9647209412','','','ARGOAL
PURBA MEDINIPUR','C J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:22:35','','2022-03-21 16:22:35');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('52','BISWAKARMA JEWELLERS','LALTU KAMILA','9933538445','','','CHANDIPUR','B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:23:24','','2022-03-21 16:23:24');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('53','BISWAKARMA JEWELLERS','NANDAN PATRA','9734353867','','','ASNANBAZAR','B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:24:09','','2022-03-22 18:51:10');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('54','BIJOLI JEWELLERS','SANDIP MANNA','8927310178','','','HORIDASPUR
PURBAMEDINIPUR','B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:25:42','','2022-03-21 16:25:42');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('55','BARGABHIMA JEWELLERS','SATTYESWAR','9679119627','','','DIMARI','B J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:26:25','','2022-03-21 16:26:25');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('56','BARAMA JEMS & JEWELLERY','SUROJIT KARMAKAR','8900021018','','','REYAPARA','B J J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:27:30','','2022-03-21 16:27:30');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('57','B K JEWELLERY WORKS','KARTIK CH KAMILA','9679467713','','','BIBHISHAN PUR','B K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:28:18','','2022-03-21 16:28:18');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('58','ASHIRBAD JEWELLERS','MAHADEB JANA','9733699749','','','MANUAKHALI','A J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-21 16:29:09','','2022-03-21 16:29:09');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('59','ARATI JEWELLERS','SUJOY DA','9972657674','','','MOYNA','A J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','Y','2022-03-21 16:30:15','','2022-03-21 16:30:15');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('60','RUPAM JEWELLERS','RUPAM','9800542128','','','TAMLUK','R J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:29:48','','2022-03-22 15:29:48');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('61','RUPAM JEWELLERS','UNKNOW','1597533210','','','GOKULNAGAR','R J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:31:17','','2022-03-22 15:31:17');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('62','MATRI JEWELLERS','UNKNOWN','3214567890','','','PANSKURA','M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:34:37','','2022-03-22 15:34:37');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('63','MATRI JEWELLERS','ROGHUNATHBARI','1593574560','','','ROGHUNATH BARI','M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:36:10','','2022-03-22 15:36:10');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('64','PARAMITA JEWELLERS','PORIMAL','3579516540','','','MOYNA','P J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:48:02','','2022-03-22 15:48:02');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('65','J DAS & SONS JEWELLERY','J DAS','3698521470','','','PARBATIPUR   TAMLUK','J S J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:51:45','','2022-03-22 15:51:45');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('66','RANU JEWELLERS','BULAN DA','1234567891','','','TAMLUK','R J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:52:57','','2022-03-22 15:52:57');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('67','NEW RANU JEWELLERS','BULAN DA','1478529630','','','TAMLUK','R J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:54:37','','2022-03-22 15:54:37');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('68','BULBUL','CHILAI BALA','1478523691','','','TAMLUK','B L','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 15:56:25','','2022-03-22 15:56:25');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('69','NAMITA JEWELLERS & BASONALOY','GOYALAPUKUR','9632587410','','','GOYALAPUKUR  BHAGAVANPUR','N P J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 16:41:58','','2022-03-22 16:41:58');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('70','JOYGURU JEWELLERS','TILKHOJA','8521479630','','','TILKHOJA','J J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 11:40:25','A','N','2022-03-22 16:44:14','','2022-03-22 16:44:14');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('71','NAMITA JEWELLERS','CHANDIPUR','7908895778','','','GUCHAIT','N J','140.00','35.00','25.00','100.00','50.00','-125.00','2022-03-25 18:35:04','A','N','2022-03-25 11:51:05','','2022-03-25 18:35:04');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('72','RAMKRISHNA JEWELLERS','CHANDIPUR','8926688244','','','SUMAN BEJ','R J','164.00','41.30','25.00','70.00','50.00','0.00','2022-03-25 11:53:16','A','N','2022-03-25 11:53:16','','2022-03-25 11:53:16');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('73','NEW MAJEE JEWELLERS','CHANDIPUR','9679293502','','','ASISH MAJEE','B P M','236.00','53.10','45.00','100.00','50.00','0.00','2022-03-25 12:04:24','A','N','2022-03-25 12:04:24','','2022-03-25 12:04:24');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('74','NEW STAR JEWELLERS','CHANDIPUR','9593434589','','','JANINI','N S J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 12:05:52','A','N','2022-03-25 12:05:52','','2022-03-25 12:05:52');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('75','KRISHNA JEWELLERS','BACCHU RAKHIT','9732955725','','','KALABERIA','K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 12:10:55','A','N','2022-03-25 12:10:55','2022-03-27 13:10:16','2022-03-25 12:10:55');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('76','NEW SRIGOPAL JEWELLERS','CHANDIPUR','9735534267','','','SUSANTA KAMILA','N S G J','236.00','53.10','25.00','100.00','50.00','-50.00','2022-03-26 19:01:29','A','N','2022-03-25 12:13:08','','2022-03-26 19:01:29');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('77','RAJU JEWELLERS','CHANDIPUR','9434993496','','','RAJU SAHOO','R S','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 12:14:25','A','N','2022-03-25 12:14:25','','2022-03-25 12:14:25');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('78','MAA MANASA JEWELLERS','GOPINATHPUR','9775259218','','','RADHAKANTA KARMAKAR','M M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 12:58:39','A','N','2022-03-25 12:58:39','','2022-03-25 12:58:39');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('79','MOTHER GINI HOUSE','CHANDIPUR','9474190378','','','NOTHING','M G H','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 13:38:55','A','N','2022-03-25 13:38:55','','2022-03-25 13:38:55');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('80','MAA LAXMI JEWELLERS','KULUP BAZAR','9735504937','','','JANINI','S D','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 16:19:12','A','N','2022-03-25 16:19:12','','2022-03-25 16:19:12');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('81','PARBATI  JEWELLERS','KALIPADA KARMAKAR','8637381599','','','NOTHING','P J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 16:58:15','A','N','2022-03-25 16:58:15','','2022-03-25 16:58:15');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('82','MATRI JEWELLERS','SANTOSH KAMILA','9647177318','','','BAJKUL','M * J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 17:23:54','A','N','2022-03-25 17:23:54','','2022-03-25 17:23:54');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('83','KRISHNA KALI JEWELLERS','DHARMARAJ PRADHAN','7679096980','','','BORAJ','K K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-27 15:55:20','A','N','2022-03-25 17:37:27','','2022-03-27 15:55:20');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('84','RADHA KRISHNA JEWELLERS','PRASHANTA KAMILA','1111111111','','','HASCHARA','R K J P','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 18:05:18','A','N','2022-03-25 18:05:18','','2022-03-25 18:05:18');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('85','ARATI JEWELLERS','CHANDIPUR','9732919044','','','SUBHASIS JANA','A J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 18:12:03','A','N','2022-03-25 18:12:03','','2022-03-25 18:12:03');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('86','NARAYANI TOUNCH CENTRE','OUR','9732556171','','','CHANDIPUR','0','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-25 18:58:39','A','N','2022-03-25 18:58:39','','2022-03-25 18:58:39');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('87','SANTANU JEWELLERS','CHANDIPUR','9732982170','','','SANTANU MAITY','S J S','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 10:09:17','A','N','2022-03-26 10:09:17','','2022-03-26 10:09:17');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('88','SRI GOPAL JEWELLERS','PICHALDA','9735648583','','','JADUPATI MAITY','S G J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 11:48:31','A','N','2022-03-26 11:48:31','','2022-03-26 11:48:31');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('89','SRI GOPAL JEWELLERS','KALABERIA','9733363635','','','ANUP KUMAR DUTTA','S G J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 12:31:01','A','N','2022-03-26 12:31:01','','2022-03-26 12:31:01');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('90','SUDESHNA JEWELLERS','NANTU BERA','9654331671','','','KULA PARA, CHOUKHALI BAZAR','S N J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 15:50:51','A','N','2022-03-26 15:50:51','2022-03-26 15:56:09','2022-03-26 15:50:51');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('91','SRI LAXMI JEWELLERS','JHANTU PATRA','7047454673','','','GURGRAM','S L J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 16:05:02','A','N','2022-03-26 16:05:02','','2022-03-26 16:05:02');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('92','NEW RAJDHANI JEWELLERS','MANTU KARAN','9564218153','','','CHANDIPUR','N R J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 17:26:46','A','N','2022-03-26 17:26:46','','2022-03-26 17:26:46');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('93','MAA SANDHYA JEWELLERS','AJAY KAMILA','8840055670','','','NANDIGRAM','M S J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 17:30:04','A','N','2022-03-26 17:30:04','','2022-03-26 17:30:04');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('94','TILOTTAMA JEWELLERS','PRASHANTA KUMAR RANA','9735225271','','','NANDIGRAM','T R P','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 18:16:14','A','N','2022-03-26 18:16:14','','2022-03-26 18:16:14');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('95','ASHIRBAD JEWELLERS','CHANDAN KAMLIYA','9933427095','','','NANDIGRAM','A J C','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 18:54:33','A','N','2022-03-26 18:54:33','','2022-03-26 18:54:33');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('96','TARAMA JEWELLERS','SANJIB KARMAKAR','9732741890','','','HANSCHORA','T M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 19:32:55','A','N','2022-03-26 19:32:55','','2022-03-26 19:32:55');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('97','SRIMATI JEWELLERS','PORIMAL KAMILA','7362955168','','','HANSCHORA','S M J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-26 19:34:04','A','N','2022-03-26 19:34:04','','2022-03-26 19:34:04');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('98','NEW SRI GOURANGA JEWELLERS','SOUMITRA GUCCHAIT','9732546082','','','CHOUKHALI','N G J','236.00','41.30','30.00','100.00','50.00','0.00','2022-03-27 09:57:52','A','N','2022-03-27 09:57:52','','2022-03-27 09:57:52');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('99','NEW SRI GOURANGA JEWELLERS','SOUMITRA GUCCHAIT','2222222222','','','BIJOY MAITY CHAK','N G J','236.00','41.30','30.00','100.00','50.00','0.00','2022-03-27 09:59:42','A','N','2022-03-27 09:59:42','','2022-03-27 09:59:42');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('100','MAA KALI JEWELLERS','RANAJIT KAMILA','9932004571','','','NANDIGRAM/MAHESPUR','M K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-27 10:59:53','A','N','2022-03-27 10:59:53','','2022-03-27 10:59:53');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('101','NEW SAYAN JEWELLERS','NARAYAN DA','8967321530','','','BOROJ','S N J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-27 11:10:45','A','N','2022-03-27 11:10:45','','2022-03-27 11:10:45');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('102','RADHAKRISHNA JEWELLERS','NABA KUMAR DAS','9647003314','','','SASHIGANJ','R K J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-27 11:11:42','A','N','2022-03-27 11:11:42','','2022-03-27 11:11:42');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('103','MAA DURGA JEWELLERS','BHAKTA  DA','3333333333','','','HARIKHALI','M D J','236.00','53.10','40.00','100.00','50.00','-320.00','2022-03-27 13:18:21','A','N','2022-03-27 13:04:54','','2022-03-27 13:18:21');

INSERT INTO tbl_ledger (id, jewellers_name, propriter_name, ph_no, lc_no, gst_no, address, logo, hallmarking_rate_h, hallmarking_rate_h_more, hallmarking_rate_o, card_rate, photo_rate, balance, updated_balance_time, is_active, is_delete, created_date_time, updated_date_time, last_transaction_time) VALUES ('104','SUVANKARI JEWELLERS','GANESH GHORA','8972395300','','','NIMTOURI','S V J','236.00','53.10','40.00','100.00','50.00','0.00','2022-03-27 13:11:54','A','N','2022-03-27 13:11:54','','2022-03-27 13:11:54');


CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` char(1) COLLATE utf8_bin NOT NULL COMMENT 'A=''active'',I=''inactive''',
  `last_login` datetime NOT NULL,
  `licence_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `is_delete` char(1) COLLATE utf8_bin NOT NULL COMMENT 'Y=''delete'',N=''not delete''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_login (id, user_name, password, status, last_login, licence_key, is_delete) VALUES ('1','received','QkBiNzY3NQ==','A','2022-03-27 13:23:45','MjAyMi0xMC0wMQ==','N');

INSERT INTO tbl_login (id, user_name, password, status, last_login, licence_key, is_delete) VALUES ('2','xrf','MTIzNDU=','A','2022-03-27 16:15:36','MjAyMi0xMC0wMQ==','N');

INSERT INTO tbl_login (id, user_name, password, status, last_login, licence_key, is_delete) VALUES ('3','lager','JC9EMzY4Ng==','A','2022-03-27 10:07:33','MjAyMi0xMC0wMQ==','N');

INSERT INTO tbl_login (id, user_name, password, status, last_login, licence_key, is_delete) VALUES ('4','owner','JG5hbEA1NQ==','A','2022-03-28 12:57:14','MjAyMi0xMC0wMQ==','N');

INSERT INTO tbl_login (id, user_name, password, status, last_login, licence_key, is_delete) VALUES ('5','manager','UyNHNzUyNw==','A','2022-03-27 13:22:14','MjAyMi0xMC0wMQ==','N');

INSERT INTO tbl_login (id, user_name, password, status, last_login, licence_key, is_delete) VALUES ('6','card','UCNHMjk2Ng==','A','2022-03-27 16:55:19','MjAyMi0xMC0wMQ==','N');


CREATE TABLE `tbl_own_fund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''P''=Paid Amount, ''C''=Customer Fund',
  `amount` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `updated_balance` decimal(10,2) NOT NULL,
  `created_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_own_fund (id, type, amount, remarks, updated_balance, created_date_time) VALUES ('1','P','3996.00','DADAR HATA GACHHA','0.00','2022-03-25 19:37:30');

INSERT INTO tbl_own_fund (id, type, amount, remarks, updated_balance, created_date_time) VALUES ('2','P','9026.00','26/03/22 + 27/03/22 SHEET AMMOUNT','0.00','2022-03-27 19:02:14');


CREATE TABLE `tbl_rate_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hallmarking_h` decimal(10,2) NOT NULL,
  `hallmarking_h_more` decimal(10,2) NOT NULL,
  `more_then` int(3) NOT NULL,
  `hallmarking_o` decimal(10,2) NOT NULL,
  `card` decimal(10,2) NOT NULL,
  `photo` decimal(10,2) NOT NULL,
  `created_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_rate_update (id, hallmarking_h, hallmarking_h_more, more_then, hallmarking_o, card, photo, created_date_time) VALUES ('1','0.00','0.00','0','0.00','0.00','0.00','2022-03-17 17:39:38');

INSERT INTO tbl_rate_update (id, hallmarking_h, hallmarking_h_more, more_then, hallmarking_o, card, photo, created_date_time) VALUES ('2','53.10','236.00','4','40.00','100.00','50.00','2022-03-17 18:39:16');

INSERT INTO tbl_rate_update (id, hallmarking_h, hallmarking_h_more, more_then, hallmarking_o, card, photo, created_date_time) VALUES ('3','236.00','53.10','4','40.00','100.00','50.00','2022-03-17 22:01:18');

INSERT INTO tbl_rate_update (id, hallmarking_h, hallmarking_h_more, more_then, hallmarking_o, card, photo, created_date_time) VALUES ('4','236.00','53.10','4','40.00','100.00','50.00','2022-03-25 11:28:51');


CREATE TABLE `tbl_received` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_ledger_id` int(10) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `token_no` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `xrf_man` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '''P''= Pass, ''F''=Fail',
  `lager_man` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '''Y''= Yes, ''N''= No',
  `total` decimal(10,2) DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `hallmark_type` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '''H''/''O''',
  `hallmark_rate` decimal(10,2) DEFAULT NULL,
  `hallmark_weight` decimal(10,3) DEFAULT NULL,
  `hallmark_piece` int(10) DEFAULT NULL,
  `hallmark_amount` decimal(10,2) DEFAULT NULL,
  `card_rate` decimal(10,2) NOT NULL,
  `card_weight` decimal(10,3) DEFAULT NULL,
  `card_piece` int(10) DEFAULT NULL,
  `card_amount` decimal(10,2) DEFAULT NULL,
  `photo_rate` decimal(10,2) NOT NULL,
  `photo_weight` decimal(10,3) DEFAULT NULL,
  `photo_piece` int(10) DEFAULT NULL,
  `photo_amount` decimal(10,2) DEFAULT NULL,
  `received_time` datetime NOT NULL,
  `delivery_time` datetime DEFAULT NULL,
  `delivery_weight` decimal(10,3) DEFAULT NULL,
  `is_delete` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'N' COMMENT '''Y''=yes, ''N''=no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('1','77','','','P','Y','371.70','370.00','1.70','H','53.10','15.750','7','371.70','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 12:15:32','2022-03-25 15:15:45','15.750','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('2','75','','','P','Y','160.00','160.00','0.00','O','40.00','2.440','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 12:16:52','2022-03-25 12:29:39','2.440','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('3','76','','','P','Y','40.00','40.00','0.00','O','40.00','2.020','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 12:17:23','2022-03-25 12:29:58','2.020','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('4','28','','','P','Y','40.00','40.00','0.00','O','40.00','12.300','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 12:24:41','2022-03-25 12:30:18','12.300','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('5','73','','','P','Y','225.00','225.00','0.00','O','45.00','26.930','5','225.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 12:26:24','2022-03-25 12:30:46','26.930','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('6','78','','','P','Y','160.00','160.00','0.00','O','40.00','5.490','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 12:59:39','2022-03-25 13:25:39','5.490','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('7','78','','','P','','200.00','200.00','0.00','','0.00','0.000','0','0.00','100.00','2.930','2','200.00','50.00','0.000','0','0.00','2022-03-25 13:03:24','2022-03-25 13:25:53','2.930','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('8','79','','','P','Y','320.00','320.00','0.00','O','40.00','16.800','8','320.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 13:39:27','2022-03-25 19:08:00','16.800','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('9','47','','','P','Y','680.00','680.00','0.00','O','40.00','24.920','17','680.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 16:12:27','2022-03-25 16:23:22','24.920','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('10','80','','','P','Y','80.00','80.00','0.00','O','40.00','2.000','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 16:19:52','2022-03-25 16:25:09','2.000','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('11','81','','','P','Y','40.00','40.00','0.00','O','40.00','2.580','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 16:59:45','2022-03-25 17:10:01','2.580','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('12','0','RAMESH GURIA','','P','Y','40.00','40.00','0.00','O','40.00','6.150','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 17:00:56','2022-03-25 17:10:24','6.150','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('13','71','','','P','Y','50.00','0.00','0.00','O','25.00','10.700','2','50.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 17:02:14','2022-03-25 17:11:26','10.700','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('14','9','','','P','Y','80.00','80.00','0.00','O','40.00','2.040','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 17:25:25','2022-03-25 17:30:42','2.040','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('15','83','','','P','Y','80.00','80.00','0.00','O','40.00','5.420','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 17:38:38','2022-03-25 17:45:59','5.420','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('16','71','','','P','Y','75.00','75.00','0.00','O','25.00','13.970','3','75.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 17:52:20','2022-03-25 18:14:04','13.970','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('17','48','','','P','Y','40.00','40.00','0.00','O','40.00','12.800','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 17:57:23','2022-03-25 18:15:58','12.800','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('18','84','','','P','Y','160.00','160.00','0.00','O','40.00','6.130','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 18:06:25','2022-03-25 18:16:38','6.130','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('19','85','','','P','Y','440.00','440.00','0.00','O','40.00','4.010','11','440.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 18:12:58','2022-03-25 18:30:49','4.000','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('20','85','','','P','Y','80.00','80.00','0.00','O','40.00','0.610','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 18:14:43','2022-03-25 18:31:09','0.610','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('21','86','','','','','600.00','','0.00','O','40.00','0.000','15','600.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 19:02:36','2022-03-25 19:03:27','','Y');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('22','86','','','P','Y','760.00','760.00','0.00','O','40.00','0.000','19','760.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-25 19:04:03','2022-03-25 19:07:30','0.000','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('23','45','','','P','Y','720.00','0.00','0.00','H','30.00','8.420','24','720.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 10:06:50','2022-03-26 15:06:40','8.420','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('24','87','','','P','Y','800.00','800.00','0.00','O','40.00','25.480','20','800.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 10:10:01','2022-03-26 10:39:24','25.480','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('25','28','','','P','Y','80.00','80.00','0.00','O','40.00','35.940','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 10:25:23','2022-03-26 10:40:58','35.940','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('26','88','','','P','Y','40.00','40.00','0.00','O','40.00','1.470','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 11:49:03','2022-03-26 11:57:54','1.470','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('27','89','','','P','Y','160.00','160.00','0.00','O','40.00','7.730','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 12:31:39','2022-03-26 12:41:18','7.730','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('28','10','','','P','Y','300.00','0.00','0.00','H','30.00','109.120','10','300.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 14:11:30','2022-03-26 18:00:15','109.120','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('29','72','','','P','Y','80.00','','0.00','O','40.00','8.410','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 15:34:16','2022-03-26 15:41:11','','Y');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('30','72','','','P','Y','50.00','50.00','0.00','O','25.00','8.410','2','50.00','70.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 15:43:22','2022-03-26 15:48:14','8.410','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('31','90','','','F','','40.00','','0.00','O','40.00','0.890','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 15:52:45','2022-03-26 15:58:27','','Y');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('32','91','','','P','Y','40.00','40.00','0.00','O','40.00','4.540','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 16:05:51','2022-03-26 16:12:26','4.540','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('33','77','','','P','Y','40.00','40.00','0.00','O','40.00','3.330','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 16:33:15','2022-03-26 16:38:53','3.330','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('34','9','','','P','Y','371.70','370.00','1.70','H','53.10','8.590','7','371.70','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 17:02:36','2022-03-26 18:47:45','8.580','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('35','92','','','P','Y','160.00','160.00','0.00','O','40.00','21.470','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 17:27:32','2022-03-26 17:37:07','21.470','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('36','93','','','P','Y','80.00','80.00','0.00','O','40.00','4.690','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 17:30:40','2022-03-26 17:37:34','4.690','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('37','76','','','P','Y','450.00','','0.00','O','45.00','21.460','10','450.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 17:58:01','2022-03-26 18:11:20','','Y');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('38','48','','','P','Y','40.00','40.00','0.00','O','40.00','14.830','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 17:59:44','2022-03-26 18:06:13','14.830','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('39','74','','','P','Y','40.00','40.00','0.00','O','40.00','2.490','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 18:05:01','2022-03-26 18:08:10','2.490','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('40','76','','','P','Y','250.00','250.00','0.00','O','25.00','21.460','10','250.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 18:12:11','2022-03-26 18:13:25','21.460','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('41','83','','','P','Y','200.00','0.00','0.00','O','40.00','11.420','5','200.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 18:18:58','2022-03-26 18:31:14','11.420','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('42','94','','','P','Y','2177.10','2170.00','7.10','H','53.10','184.160','41','2177.10','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 18:21:06','2022-03-27 18:30:41','184.160','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('43','76','','','P','Y','50.00','0.00','0.00','O','25.00','28.490','2','50.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 18:49:47','2022-03-26 19:01:29','28.490','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('44','95','','','P','Y','80.00','80.00','0.00','O','40.00','16.230','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 18:55:47','2022-03-26 19:10:36','16.230','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('45','94','','','P','Y','200.00','200.00','0.00','O','40.00','14.980','5','200.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 18:57:26','2022-03-26 19:10:52','14.980','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('46','96','','','P','Y','160.00','160.00','0.00','O','40.00','2.390','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 19:34:52','2022-03-26 19:40:02','2.380','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('47','97','','','P','Y','40.00','40.00','0.00','O','40.00','2.010','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-26 19:35:24','2022-03-26 19:40:13','2.010','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('48','49','','','P','Y','160.00','160.00','0.00','O','40.00','7.790','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 10:00:58','2022-03-27 10:08:07','7.790','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('49','98','','','P','Y','540.00','540.00','0.00','O','30.00','53.530','18','540.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 10:06:16','2022-03-27 10:08:26','53.520','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('50','100','','','P','Y','360.00','360.00','0.00','O','40.00','39.140','9','360.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 11:00:52','2022-03-27 11:16:29','39.140','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('51','102','','','P','Y','40.00','40.00','0.00','O','40.00','10.260','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 11:12:39','2022-03-27 11:45:12','10.260','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('52','101','','','P','Y','400.00','400.00','0.00','O','40.00','13.350','10','400.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 11:13:22','2022-03-27 11:44:25','13.350','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('53','96','','','P','Y','40.00','40.00','0.00','O','40.00','10.280','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 11:14:35','2022-03-27 11:19:44','10.280','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('54','74','','','P','Y','80.00','80.00','0.00','O','40.00','4.960','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 11:35:21','2022-03-27 11:45:30','4.960','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('55','23','','','P','Y','40.00','40.00','0.00','O','40.00','12.040','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 11:37:13','2022-03-27 11:45:49','12.040','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('56','72','','','P','Y','454.30','454.00','0.30','H','41.30','129.810','11','454.30','70.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 11:41:05','2022-03-27 16:49:11','129.810','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('57','23','','','P','Y','80.00','80.00','0.00','O','40.00','30.050','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 12:06:21','2022-03-27 12:17:48','30.050','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('58','86','','','P','Y','480.00','480.00','0.00','O','40.00','0.000','12','480.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 12:15:47','2022-03-27 12:20:33','0.000','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('59','10','','','P','Y','120.00','0.00','0.00','H','30.00','10.170','4','120.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 12:51:03','2022-03-27 16:46:54','10.170','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('60','103','','','P','Y','320.00','0.00','0.00','O','40.00','5.450','8','320.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 13:05:51','2022-03-27 13:18:21','5.450','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('61','75','','','P','Y','270.00','','0.00','O','45.00','23.760','6','270.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 13:12:30','2022-03-27 13:24:44','','Y');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('62','104','','','P','Y','80.00','80.00','0.00','O','40.00','3.960','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 13:13:25','2022-03-27 13:20:43','3.960','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('63','75','','','P','Y','240.00','240.00','0.00','O','40.00','23.760','6','240.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 13:25:42','2022-03-27 13:27:15','23.760','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('64','96','','','P','Y','80.00','80.00','0.00','O','40.00','7.370','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 13:28:12','2022-03-27 13:35:04','7.370','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('65','90','','','P','Y','160.00','160.00','0.00','O','40.00','6.100','4','160.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 13:29:18','2022-03-27 13:35:20','6.100','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('66','72','','','P','Y','25.00','25.00','0.00','O','25.00','5.230','1','25.00','70.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 16:12:41','2022-03-27 16:16:18','5.230','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('67','85','','','P','Y','180.00','180.00','0.00','O','40.00','34.780','2','80.00','100.00','34.780','1','100.00','50.00','0.000','0','0.00','2022-03-27 16:53:48','2022-03-27 17:04:18','34.780','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('68','92','','','P','Y','220.00','220.00','0.00','O','40.00','9.790','3','120.00','100.00','6.000','1','100.00','50.00','0.000','0','0.00','2022-03-27 17:08:18','2022-03-27 17:19:13','9.780','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('69','23','','','P','Y','80.00','80.00','0.00','O','40.00','5.300','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 17:26:59','2022-03-27 17:32:34','5.300','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('70','23','','','P','Y','40.00','40.00','0.00','O','40.00','5.780','1','40.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 17:56:08','2022-03-27 18:00:03','5.780','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('71','86','','','P','Y','600.00','600.00','0.00','O','40.00','0.000','15','600.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 18:05:21','2022-03-27 18:06:47','0.000','N');

INSERT INTO tbl_received (id, fk_ledger_id, customer_name, token_no, xrf_man, lager_man, total, paid, discount, hallmark_type, hallmark_rate, hallmark_weight, hallmark_piece, hallmark_amount, card_rate, card_weight, card_piece, card_amount, photo_rate, photo_weight, photo_piece, photo_amount, received_time, delivery_time, delivery_weight, is_delete) VALUES ('72','18','','','P','Y','80.00','80.00','0.00','O','40.00','3.620','2','80.00','100.00','0.000','0','0.00','50.00','0.000','0','0.00','2022-03-27 18:11:23','2022-03-27 18:15:18','3.620','N');


CREATE TABLE `tbl_received_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_received_id` int(11) NOT NULL,
  `weight` decimal(10,3) NOT NULL,
  `piece` int(5) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_received_card (id, fk_received_id, weight, piece, remarks) VALUES ('1','7','0.600','1','MAA MANASA JEWELLERS');

INSERT INTO tbl_received_card (id, fk_received_id, weight, piece, remarks) VALUES ('2','7','2.330','1','MAA MANASA JEWELLERS');

INSERT INTO tbl_received_card (id, fk_received_id, weight, piece, remarks) VALUES ('3','67','34.780','1','SAKTIPADA MAJHI');

INSERT INTO tbl_received_card (id, fk_received_id, weight, piece, remarks) VALUES ('4','68','6.000','1','SEKHARLAL MAITY');


CREATE TABLE `tbl_received_hallmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_received_id` int(11) NOT NULL,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''H''/''O''',
  `weight` decimal(10,3) NOT NULL,
  `piece` int(5) NOT NULL,
  `purity` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `delivery_weight` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('1','1','H','15.750','7','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('2','2','O','2.440','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('3','3','O','2.020','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('4','4','O','12.300','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('5','5','O','26.930','5','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('6','6','O','5.490','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('7','8','O','16.800','8','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('8','9','O','24.920','17','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('9','10','O','2.000','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('10','11','O','2.580','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('11','12','O','6.150','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('12','13','O','10.700','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('13','14','O','2.040','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('14','15','O','5.420','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('15','16','O','13.970','3','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('16','17','O','12.800','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('17','18','O','6.130','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('18','19','O','4.010','11','750.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('19','20','O','0.610','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('20','21','O','0.000','15','0.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('21','22','O','0.000','19','0.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('22','23','H','8.420','24','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('23','24','O','25.480','20','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('24','25','O','35.940','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('25','26','O','1.470','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('26','27','O','7.730','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('27','28','H','109.120','10','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('28','29','O','8.410','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('29','30','O','8.410','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('30','31','O','0.890','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('31','32','O','4.540','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('32','33','O','3.330','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('33','34','H','8.590','7','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('34','35','O','21.470','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('35','36','O','4.690','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('36','37','O','21.460','10','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('37','38','O','14.830','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('38','39','O','2.490','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('39','40','O','21.460','10','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('40','41','O','11.420','5','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('41','42','H','184.160','41','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('42','43','O','28.490','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('43','44','O','16.230','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('44','45','O','14.980','5','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('45','46','O','2.390','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('46','47','O','2.010','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('47','48','O','7.790','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('48','49','O','53.530','18','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('49','50','O','39.140','9','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('50','51','O','10.260','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('51','52','O','13.350','10','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('52','53','O','10.280','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('53','54','O','4.960','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('54','55','O','12.040','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('55','56','H','129.810','11','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('56','57','O','30.050','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('57','58','O','0.000','12','916.00','26/03/22 DUE','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('58','59','H','10.170','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('59','60','O','5.450','8','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('60','61','O','23.760','6','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('61','62','O','3.960','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('62','63','O','23.760','6','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('63','64','O','7.370','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('64','65','O','6.100','4','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('65','66','O','5.230','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('66','67','O','34.780','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('67','68','O','9.790','3','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('68','69','O','5.300','2','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('69','70','O','5.780','1','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('70','71','O','0.000','15','916.00','','');

INSERT INTO tbl_received_hallmark (id, fk_received_id, type, weight, piece, purity, remarks, delivery_weight) VALUES ('71','72','O','3.620','2','916.00','','');


CREATE TABLE `tbl_received_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_received_id` int(11) NOT NULL,
  `weight` decimal(10,3) NOT NULL,
  `piece` int(5) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



CREATE TABLE `tbl_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `proprietor_name` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `address` text COLLATE utf8_bin DEFAULT NULL,
  `ph_no` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `billing_name` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_shop (id, shop_name, proprietor_name, address, ph_no, email, billing_name) VALUES ('1','SANATANI','','','','','S.H.C.');


CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card` int(10) NOT NULL,
  `photo` int(10) NOT NULL,
  `rebons` int(10) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `customer_fund` decimal(10,2) NOT NULL,
  `xrf_checked` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'A' COMMENT '''A''=Active, ''I''=Inactive',
  `updated_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_stock (id, card, photo, rebons, paid_amount, customer_fund, xrf_checked, updated_date_time) VALUES ('1','726','0','296','0.00','1640.00','A','2022-03-25 12:55:56');


CREATE TABLE `tbl_stock_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''I''=In, ''R''=Reject, ''S''=Sell',
  `fk_received_id` int(11) DEFAULT NULL COMMENT 'If type=''S''',
  `fk_ledger_id` int(11) DEFAULT NULL,
  `stock_type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''C''=Card, ''P''=Photo, ''R''= Rebons',
  `piece` int(5) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('1','I','','','C','730','730','2022-03-25 12:54:18');

INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('2','I','','','R','300','300','2022-03-25 12:55:56');

INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('3','S','7','78','C','2','728','2022-03-25 13:25:53');

INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('4','S','7','78','R','2','298','2022-03-25 13:25:53');

INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('5','S','67','85','C','1','727','2022-03-27 17:04:18');

INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('6','S','67','85','R','1','297','2022-03-27 17:04:18');

INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('7','S','68','92','C','1','726','2022-03-27 17:19:13');

INSERT INTO tbl_stock_update (id, type, fk_received_id, fk_ledger_id, stock_type, piece, balance, created_date_time) VALUES ('8','S','68','92','R','1','296','2022-03-27 17:19:13');
