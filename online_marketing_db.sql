-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 04:02 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_marketing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `pass`, `phone`) VALUES
(2, 'super user', '1234', '0908'),
(3, 'admin', '1234', '098');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE IF NOT EXISTS `bill_details` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `combo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `typetickket` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  ` screen` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26823 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `note`) VALUES
(1, 'Phim đang chiếu', ''),
(2, 'Phim sắp chiếu', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trailer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `vote` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `dateopen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `trailer`, `price`, `description`, `vote`, `image`, `type`, `dateopen`) VALUES
(1, 'Thiên linh cái', 'video/thienlinhcai.mp4', 70000, 'Phim kinh dị thiên linh cái là một câu về bùa ngải đáng sợ dựa trên câu chuyện có thật cách đây 20 năm.', 4, 'image/thienlinhcai.png', 1, '2019-04-19'),
(2, 'Trạng Quỳnh', 'video/trangquynh.mp4', 80000, 'Với bối cảnh làng quê Việt xưa và lối gây cười dí dỏm được yêu thích trong dân gian, Trạng Quỳnh là tác phẩm xứng đáng để mong đợi.', 3, 'image/trangquynh.png', 2, '2019-04-05'),
(3, 'Ông ngoại tuổi 30', 'video/ongngoaituoi30.mp4', 60000, 'Ông Ngoại Tuổi 30 là câu chuyện xoay quanh anh chàng phát thanh viên điển trai nổi tiếng Sơn Huy. Ở tuổi 30 Huy có một cuộc sống đáng mơ ước và cuộc sống mỹ mãn đó bị xáo trộn khi một cô gái tìm đến..', 4, 'image/ongngoaituoi.png', 2, '2019-04-12'),
(4, 'Lật mặt 3', 'video/latmat3.mp4', 70000, ' Ba chàng khuyết quy tụ bộ ba ‘ăn khách’ trên màn ảnh rộng hiện nay: Huy Khánh, Kiều Minh Tuấn và Song Luân. Trong phim, Huy Khánh sẽ vào vai một chàng trai tên Đức với tính cách ba phải, hoạt ngôn đến “lắm điều”. Vốn đã quen mặt với những vai diễn hài hước, đáng yêu, nhân vật của Huy Khánh hứa hẹn sẽ mang lại những tiếng cười không ngớt cho khán giả. Còn chàng playboy của Em Chưa 18 Kiều Minh Tuấn sẽ vào vai Lộc, một người có tính tình cố chấp và nóng nảy. Trong khi đó “trai đẹp 6 múi” Song Luân sẽ vào vai Tâm, một người hiền lành, cởi mở và luôn sẵn lòng giúp đỡ mọi người.', 2, 'image/latmat3.png', 2, '2019-05-02'),
(5, 'Siêu sao siêu ngố', 'video/sieusaosieungo.mp4', 80000, 'Phim Hài Tết, Hài Hước: Siêu Sao Siêu Ngố (2019) full trọn bộ vietsub, thuyết minh 1 giờ 27 phút - Full HD  Siêu Sao Siêu Ngố là bộ phim hài – tình cảm có nội dung xoay quanh nhân vật chính là ngôi sao điện ảnh Thế Sơn. Mặc dù sở hữu sự nghiệp thành công hàng đầu và có cuộc sống sang chảnh bậc nhất khiến vạn người mê, nhưng Thế Sơn lại chẳng thể tự do yêu đương hay làm những gì mà mình yêu thích. Anh luôn bị giám sát và phải chịu nhiều chi phối từ công ty quản lý, nhà đầu tư, vấn đề tiền bạc… đặc biệt là Tony Dũng.', 2, 'image/sieusaosieungo.png', 2, '2019-04-20'),
(6, 'Xưởng 13', 'video/xuong13.mp4', 60000, 'Để quay clip câu view, một nhóm bạn trẻ gồm ba nam một nữ quyết tâm đột nhập vào khu xưởng may bỏ hoang bị đồn đại ma ám. Trong quá trình tìm hiểu về hiện tượng kỳ lạ xảy ra sau khi người bảo vệ ở đây nhảy lầu tự sát, họ liên tục gặp phải những “tai nạn” vô cùng đáng sợ. Tính mạng mọi người bị đe dọa bởi một thế lực bí ẩn phía trong khu nhà. Đó là ai, hoặc là Gì', 5, 'image/xuong13.png', 1, '2019-05-06'),
(7, 'Cua lại vợ bầu', 'video/cualaivobau.mp4', 90000, 'Cua Lại Vợ Bầu là câu chuyện tình hoàn hảo của Trọng Thoại và Nhã Linh. Nhưng đời không như mơ khi người yêu cũ của Nhã Linh là Quý Khánh thình lình xuất hiện và gây nên hàng loạt xáo trộn trong trái tim cô gái. Vậy mối tình tay ba này sẽđi về đâu? Trọng Thoại sẽ làm gì khi Nhã Linh đột ngột tuyên bố có bầu và quyết định rời xa anh? Quý Khánh có vì tình xưa nghĩa cũ mà giành lấy Nhã Linh từ tay Trọng Thoại bất luận kết quả có ra sao?', 5, 'image/cualaivobau.png', 1, '2019-04-19'),
(8, 'Chị trợ lý của anh', 'video/chitrolycuaanh.mp4', 80000, 'Nội dung chính của “Chị trợ lý của anh” xoay quanh câu chuyện giữa một cô gái thông minh giỏi việc Khả Doanh (do Mỹ Tâm thủ vai) và chàng doanh nhân trẻ tuổi Phúc Nam (Mai Tài Phến). Vì muốn cứu doanh nghiệp sữa của gia đình thoát khỏi sự thâu tóm của một tập đoàn nước ngoài, cô đành tạm rời bỏ chức vụ phó tổng giám đốc trong công ty mình để trở thành trợ lý cho Phúc Nam – giám đốc một công ty cà phê cùng với nhiệm vụ phải tìm cho anh ta một cô bạn gái.', 3, 'image/chitrolycuaanh.png', 2, '2019-05-12'),
(9, 'Hai Phượng', 'video/haiphuong.mp4', 100000, 'CBộ phim là hành trình nghẹt thở và căng thẳng của bà mẹ đơn thân Hai Phượng (Ngô Thanh Vân) khi phải đối đầu với cả 1 đường dây tội phạm bắt cóc và buôn bán nội tạng xuyên quốc gia để cứu đứa con gái bé bỏng Mai (Mai Cát Vi). Để cứu được con, Hai Phượng chỉ có 14 tiếng đồng hồ rượt đuổi từ Cần Thơ, Sài Gòn cho đến Phan Thiết, và phải đối đầu với rất nhiều giang hồ cộm cán, sẵn sàng tiêu diệt ai dám cản đường chúng. Hành trình cứu con của Hai Phượng càng trở nên gian nan và khó khăn hơn khi bất kỳ một sơ xuất nhỏ nào cũng sẽ phải trả giá bằng chính mạng sống của chính cô và bé Mai.', 3, 'image/haiphuong.png', 2, '2019-05-14'),
(10, 'Những cô gái & găng tơ', 'video/nhungcogaivagangto.mp4', 75000, 'Phim Những Cô Gái Và Găng – Tơ bộ ba xuất hiện với gương mặt lấm lem, đầu bù tóc rối và phát hiện trang phục đã bị lột sạch. Được giải cứu bởi người đàn ông mang thân hình vạm vỡ (Mike Tyson), song kế hoạch lẩn trốn gã đại gia và nữ sát thủ bí ẩn của ba cô gái này lại liên tục gặp thêm nhiều những khó khăn, rắc rối, phiền toái tạo hài hước cho người xem.', 3, 'image/nhungcogaivagangto.png', 1, '2019-05-12'),
(11, 'Avenger', 'video/avenger.mp4', 80000, 'Marvel’s The Avengers là bộ phim giả tưởng kể về một nhóm siêu anh hùng với những khả năng đặc biệt, họ bao gồm: Người Sắt, Thor, Captain America, và Người Khổng Lồ được gọi chung với cái tên SHIELD. Mục đích của SHIELD là nhằm bảo vệ Trái đất khỏi âm mưu hủy hoại của những thế lực xấu từ ngoài địa cầu mà kẻ cầm đầu là Loki. Marvel’s The Avengers Là một trong những phim được mong đợi nhất hè 2012, phim quy tụ dàn diễn viên đẹp với những cảnh quay sống động đã mang về cho nhà sản xuất hơn 1 tỷ USD. Nếu bạn đã từng là Fan của những siêu phẩm như: Spider-Man, Batman thì Marvel’s The Avengers quả là một bộ phim khó có thể bỏ qua.', 3, 'image/avenger.png', 1, '2019-05-15'),
(12, 'Avenger-Hồi kết', 'video/avenger_hoiket.mp4', 80000, 'Cú búng tay của Thanos đã khiến toàn bộ dân số biến mất một nửa. Các siêu anh hùng đánh mất bạn bè, người thân và đánh mất cả chính mình. Bộ sáu Avengers đầu tiên tứ tán. Iron Man kẹt lại ngoài không gian, Hawkeye mất tích. Thor, Captain America, Hulk và Black Widow đều chìm trong nỗi đau vô tận vì mất đi những người thân yêu. Họ phải làm gì để cứu vãn mọi chuyện ở Avengers: Hồi Kết?  ', 3, 'image/avenger_hoiket.png', 2, '2019-05-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26823;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
