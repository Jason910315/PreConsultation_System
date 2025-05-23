-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-10-30 16:36:01
-- 伺服器版本： 10.4.25-MariaDB
-- PHP 版本： 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hospital`
--

-- --------------------------------------------------------

--
-- 資料表結構 `patient`
--

CREATE TABLE `patient` (
  `ssid` char(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `No` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `patient`
--

INSERT INTO `patient` (`ssid`, `name`, `department`, `No`) VALUES
('A123456797', '廖曉安', '家庭醫事科', '24574531'),
('b123456798', '黃小安', '家庭醫事科', '24574532'),
('b123456799', '李二二', '家庭醫事科', '24574533'),
('b123456800', '李案三', '家庭醫事科', '24574534'),
('b123456801', '李三三', '家庭醫事科', '24574535'),
('c123456802', '鄭小二', '家庭醫事科', '24574536'),
('c123456803', '許因因', '家庭醫事科', '24574537'),
('c123456804', '蘇小二', '家庭醫事科', '24574538'),
('c123456805', '洪一二', '家庭醫事科', '24574539'),
('d123456806', 'allen', '家庭醫事科', '24574540'),
('d123456807', 'nini', '家庭醫事科', '24574541'),
('d123456808', 'anny', '家庭醫事科', '24574542'),
('E123456789', 'teresa', '家庭醫事科', '24574523'),
('E123456790', 'Terry', '家庭醫事科', '24574524'),
('E123456791', 'Jason', '家庭醫事科', '24574525'),
('E123456792', 'Eason', '家庭醫事科', '24574526'),
('E123456793', '李一心', '家庭醫事科', '24574527'),
('E123456794', 'Gunn', '家庭醫事科', '24574528'),
('E123456795', '王以安', '家庭醫事科', '24574529'),
('t123456796', '陳小安', '家庭醫事科', '24574530');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `sssid` char(10) NOT NULL,
  `predict` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `symptom`
--

CREATE TABLE `symptom` (
  `symptom_ssid` char(10) NOT NULL,
  `symptom1` varchar(20) DEFAULT NULL,
  `symptom2` varchar(20) DEFAULT NULL,
  `symptom3` varchar(20) DEFAULT NULL,
  `symptom4` varchar(20) DEFAULT NULL,
  `symptom5` varchar(20) DEFAULT NULL,
  `symptom6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `symptom_code`
--

CREATE TABLE `symptom_code` (
  `sNo` char(10) CHARACTER SET utf8 NOT NULL,
  `sName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `sName_C` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `symptom_code`
--

INSERT INTO `symptom_code` (`sNo`, `sName`, `sName_C`) VALUES
('1', 'itching', '發癢'),
('2', 'skin_rash', '紅疹'),
('3', 'nodal_skin_eruptions', '淋巴結紅疹'),
('4', 'dischromic _patches', '斑點'),
('5', 'continuous_sneezing', '持續打噴嚏'),
('6', 'shivering', '顫抖'),
('7', 'chills', '發冷'),
('8', 'watering_from_eyes', '眼睛流淚'),
('9', 'stomach_pain', '胃痛'),
('10', 'acidity', '胃酸過多'),
('12', 'vomiting', '嘔吐'),
('13', 'cough', '咳嗽'),
('14', 'chest_pain', '胸痛'),
('15', 'yellowish_skin', '皮膚蠟黃'),
('16', 'nausea', '噁心想吐'),
('17', 'loss_of_appetite', '食欲不振'),
('18', 'abdominal_pain', '腹痛'),
('19', 'yellowing_of_eyes', '眼白變黃'),
('20', 'burning_micturition', '排尿灼熱'),
('21', 'spotting_ urination', '點尿'),
('22', 'passage_of_gases', '腹部脹氣'),
('24', 'indigestion', '消化不良'),
('25', 'muscle_wasting', '肌肉流失'),
('26', 'patches_in_throat', '喉嚨有斑'),
('27', 'high_fever', '發燒'),
('28', 'extra_marital_contac', '婚外性行為'),
('29', 'fatigue', '疲勞'),
('30', 'weight_loss', '體重減輕'),
('31', 'restlessness', '心神不定'),
('32', 'lethargy', '昏睡'),
('34', 'blurred_and_distorte', '視力模糊扭曲'),
('35', 'obesity', '肥胖'),
('37', 'increased_appetite', '食慾增加'),
('39', 'sunken_eyes', '眼睛凹陷'),
('40', 'dehydration', '脫水'),
('41', 'diarrhoea', '腹瀉'),
('42', 'breathlessness', '呼吸急促'),
('44', 'mucoid_sputum', '痰呈黏稠狀'),
('45', 'headache', '頭痛'),
('46', 'dizziness', '頭暈'),
('47', 'loss_of_balance', '失去平衡'),
('48', 'lack_of_concentratio', '注意力不集中'),
('49', 'stiff_neck', '脖子僵硬'),
('50', 'depression', '時常憂鬱'),
('51', 'irritability', '易怒/易興奮'),
('53', 'back_pain', '背痛'),
('54', 'weakness_in_limbs', '四肢無力'),
('55', 'neck_pain', '脖子痛'),
('57', 'altered_sensorium', '意識模糊'),
('58', 'dark_urine', '尿液顏色深黃'),
('59', 'muscle_pain', '肌肉痠痛'),
('61', 'swelled_lymph_nodes', '淋巴結腫大'),
('64', 'pain_behind_the_eyes', '眼窩痛'),
('67', 'constipation', '便秘'),
('71', 'sweating', '出汗'),
('72', 'joint_pain', '關節處疼痛'),
('73', 'swelling_of_stomach', '腹部脹氣'),
('74', 'distention_of_abdome', '腹部脹大'),
('75', 'history_of_alcohol_c', '酗酒'),
('76', 'fluid_overload', ''),
('77', 'phlegm', '痰'),
('78', 'throat_irritation', '喉嚨不適'),
('79', 'redness_of_eyes', '眼睛紅腫'),
('81', 'runny_nose', '流鼻水'),
('82', 'congestion', '阻塞'),
('83', 'blood_in_sputum', '血痰'),
('84', 'loss_of_smell', '味覺喪失'),
('85', 'fast_heart_rate', '心跳加快'),
('88', 'pain_in_anal_region', '肛門疼痛'),
('89', 'bloody_stool', '血便'),
('91', 'cramps', '痙孿'),
('92', 'bruising', '瘀青'),
('94', 'swollen_blood_vessel', '血管腫脹'),
('95', 'prominent_veins_on_c', '下肢靜脈曲張'),
('96', 'puffy_face_and_eyes', '臉、眼腫脹'),
('97', 'enlarged_thyroid', '甲狀腺腫大'),
('98', 'weight_gain', '體重增加'),
('99', 'swollen_extremeties', '四肢腫脹'),
('100', 'abnormal_menstruatio', '經期異常'),
('101', 'muscle_weakness', '肌肉無力'),
('102', 'palpitations', '心悸'),
('103', 'slurred_speech', '口齒不清'),
('104', 'drying_and_tingling_', '嘴唇乾燥刺痛'),
('105', 'cold_hands_and_feets', '手腳冰冷'),
('106', 'mood_swings', '情緒起伏大'),
('107', 'anxiety', '焦慮'),
('108', 'knee_pain', '膝蓋痛'),
('109', 'hip_joint_pain', '髖關節疼痛'),
('110', 'swelling_joints', '關節處腫脹'),
('111', 'painful_walking', '行走痛苦'),
('112', 'movement_stiffness', '舉止僵硬'),
('114', 'unsteadiness', '步態不穩'),
('115', 'pus_filled_pimples', '青春痘、膿'),
('116', 'blackheads', '黑頭粉刺'),
('117', 'scurring', '結疤'),
('120', 'continuous_feel_of_u', '頻尿'),
('121', 'skin_peeling', '脫皮'),
('122', 'silver_like_dusting', '銀色的癬'),
('123', 'inflammatory_nails', '指甲發炎'),
('124', 'blister', '水泡'),
('125', 'red_sore_around_nose', '鼻頭出現紅瘡'),
('126', 'yellow_crust_ooze', '黃色滲液'),
('127', 'coma', '昏迷'),
('129', 'stomach_bleeding', '胃腸道出血');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ssid`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`sssid`);

--
-- 資料表索引 `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`symptom_ssid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
