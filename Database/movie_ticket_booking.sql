-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 06:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_ticket_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `no_ticket` int(11) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `booking_date` varchar(20) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `cust_id`, `show_id`, `no_ticket`, `seat_number`, `booking_date`, `total_amount`) VALUES
(7, 3, 3, 2, 'D10,E10', '2023-08-26', 16000),
(9, 3, 3, 2, 'D11,E10', '2023-08-25', 16000),
(11, 3, 7, 3, 'C7,D6,E5', '2023-08-25', 30000),
(12, 3, 3, 1, 'A12', '2023-08-24', 8000),
(13, 3, 3, 4, 'H1,H2,H3,H4', '2023-08-24', 32000),
(14, 3, 7, 4, 'D5,D6,E5,E6', '2023-08-24', 40000),
(15, 3, 3, 6, 'D5,D6,E6,E7,F7,F8', '2023-08-25', 48000),
(17, 3, 38, 2, 'B11,C11', '2023-09-06', 20000),
(19, 3, 38, 1, 'A10', '2023-09-06', 10000),
(20, 3, 38, 1, 'A10', '2023-09-06', 10000),
(21, 3, 38, 1, 'A10', '2023-09-06', 10000),
(22, 3, 38, 1, 'A10', '2023-09-06', 10000),
(23, 3, 38, 1, 'A10', '2023-09-06', 10000),
(24, 3, 38, 1, 'A10', '2023-09-06', 10000),
(25, 3, 38, 1, 'A10', '2023-09-06', 10000),
(26, 3, 38, 1, 'A10', '2023-09-06', 10000),
(27, 3, 38, 1, 'A10', '2023-09-06', 10000),
(28, 3, 38, 1, 'A10', '2023-09-06', 10000),
(29, 3, 38, 1, 'A10', '2023-09-06', 10000),
(30, 3, 38, 1, 'A10', '2023-09-06', 10000),
(32, 3, 38, 1, 'A5', '2023-09-06', 10000),
(33, 3, 38, 1, 'A5', '2023-09-06', 10000),
(34, 3, 38, 1, 'A5', '2023-09-06', 10000),
(35, 3, 38, 1, 'A5', '2023-09-06', 10000),
(36, 3, 38, 1, 'A5', '2023-09-06', 10000),
(37, 3, 3, 1, 'A12', '2023-09-05', 8000),
(38, 3, 3, 1, 'A12', '2023-09-05', 8000),
(39, 3, 3, 1, 'A12', '2023-09-05', 8000),
(40, 3, 5, 1, 'A12', '2023-09-05', 8000),
(41, 3, 42, 4, 'A11,A12,B11,B12', '2023-09-05', 40000),
(42, 3, 43, 3, 'A11,B10,C9', '2023-09-05', 30000),
(43, 3, 38, 1, 'B6', '2023-10-06', 10000),
(44, 3, 38, 2, 'C8,D8', '2023-10-05', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cinema_photo` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `cinema_photo`, `city`) VALUES
(4, 'Yangon Cineplex', 'images/cinema/cinema-1.jpg', 'Yangon'),
(5, 'Mandalay Cinemagic', 'images/cinema/cinema-2.jpg', ' Mandalay'),
(7, 'Naypyidaw Theatres', 'images/cinema/cinema-3.jpg', 'Naypyidaw'),
(8, 'Golden Cinemas', 'images/cinema/cinema-4.jpg', 'Yangon'),
(9, 'Ruby Plaza Theatres', 'images/cinema/cinema-5.jpg', 'Mandalay'),
(10, 'ScreenGem', 'images/cinema/cinema-6.jpg', 'Mawlamyine'),
(11, 'PictureHouse', 'images/cinema/cinema-7.jpg', 'Mawlamyine'),
(12, 'Naypyidaw FilmHub', 'images/cinema/cinema-9.jpg', 'Naypyidaw');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `num` varchar(50) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `msg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `num`, `msg`, `msg_date`) VALUES
(4, 'Hein Htet', 'heinhtet@gmail.com', '0912345678', 'How can I buy ticket?', '2023-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cellno` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `cellno`, `password`) VALUES
(3, 'Sai Pyae Sone Thu', 'sai@gmail.com', '1234567', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `movie_banner` varchar(100) NOT NULL,
  `rel_date` date NOT NULL,
  `industry_name` varchar(50) NOT NULL,
  `genre_name` varchar(50) NOT NULL,
  `lang_name` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL,
  `cast` varchar(200) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `detail` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `movie_banner`, `rel_date`, `industry_name`, `genre_name`, `lang_name`, `director`, `cast`, `duration`, `trailer`, `detail`) VALUES
(13, 'Insidious', 'images/movie/insidious.jpg', '2023-07-15', 'Pyit Tine Htaung ', 'Horror, Drama', 'English', 'Patrick Wilson', 'Ty Simpkins,Patrick Wilson,Rose Byrne', '1h 49m', 'https://www.youtube.com/watch?v=ZuQuOnYnr3Q&t=13s', 'Insidious : The Red Door Was A Mesmerizing Moving Picture. Very Graphical And Entertaining.\r\nI am Fortunate I have such a positive outlook on Life, because I was discouraged from going to See this at first by so many negative comments from unappreciative big headed unrelatable individuals\r\nThank You God Frequency for allowing Me to Tune into the directors Vision and the dedication and gratitude of the actors who approached these roles full heartedly. This Film is a carefully collaged embodiment.'),
(14, 'BARBIE 2023', 'images/movie/barbie2023.jpg', '2023-08-05', 'Netflix', 'Comedy, Drama', 'English', 'Greta Gerwig', 'Margot Robbie,Ryan Gosling,Issa Rae', '2h 10m', 'https://www.youtube.com/watch?v=pBk4NYhWNMM', 'Barbie is one of the most inventive, immaculately crafted and surprising mainstream films in recent memory – a testament to what can be achieved within even the deepest bowels of capitalism. It’s timely, too, arriving a week after the creative forces behind these stories began striking for their right to a living wage and the ability to work without the threat of being replaced by an AI. It’s a pink-splattered manifesto to the power of irreplaceable creative labour and imagination.'),
(15, 'Oppenheimer', 'images/movie/oppenheimer.jpg', '2023-08-31', 'Syncopy INc. Atalas Entertainment', 'History,Drama,Action', 'English', 'Christopher Nolan', 'Cillian Murphy,Emily Blunt,Matt Damon,Robert Downey', '2h 55m', 'https://www.youtube.com/watch?v=uYPbbksJxIg', 'In 1926, 22-year-old doctoral student J. Robert Oppenheimer studies under experimental physicist Patrick Blackett at the Cavendish Laboratory in Cambridge. He is homesick and suffers from anxiety while struggling with the required lab work.\r\n\r\nOppenheimer, upset with the demanding Blackett, leaves him a poison-laced apple but retrieves it. Visiting scientist Niels Bohr is impressed enough by his intellect to recommend that he should instead study theoretical physics in Germany, where Oppenheimer'),
(16, 'The Num II', 'images/movie/the num.jpg', '2023-08-30', 'Warner Bros. Pictures', 'Horror,Thriller', 'English', ' Michael Chaves', 'Taissa Farmiga,Jonas Bloquet,Storm Reid,Anna Popplewell', '1h 50m', 'https://www.youtube.com/watch?v=cpheekwww5o', 'A follow-up to the enigmatic gothic horror about a strong evil that haunts and causes supernatural harm to everybody it comes into contact with. After the events of the first film, the said powerful evil now begins to spread in 1956 throughout a town in France as word gets out that a priest has been violently murdered. A finished contemplative in her novitiate, Sister Irene, begins to investigate the murder, only to find a demon behind it -- the same evil that terrorized her in the original film'),
(17, 'The Equalizer 3', 'images/movie/the equalizer.jpg', '2023-08-30', 'Columbia Pictures', 'Action,Crime,Thriller', 'English', 'Antoine Fuqua', 'Denzel Washington,Dakota Fanning,David Denman,Sonia Ammar,Remo Girone,David Smith', '1h 48m', 'https://www.youtube.com/watch?v=19ikl8vy4zs', 'He\'s a long way from home and ready for vengeance See Denzel Washington as Robert McCall.The Equalizer 3 is a 2023 American vigilante action thriller film directed by Antoine Fuqua. It is a sequel to The Equalizer 2, and the third and final installment of The Equalizer trilogy, which is loosely based on the television series of the same name. The film stars Denzel Washington, reprising his role as retired U.S. Marine and former DIA officer Robert McCall, with Dakota Fanning, David Denman, Sonia '),
(18, 'A MAN CALLED OTTO', 'images/movie/a man call otto.jpg', '2023-08-30', '2DUX², Playtone, SF Productions', 'Comedy,Drama', 'English', 'Marc Forster', 'Tom Hanks, Rachel Keller, Kailey Hyman, Manuel Garcia-Rulfo, Cameron Britton', '2h', 'https://www.youtube.com/watch?v=eFYUX9l-m5I', 'A grumpy widower whose only joy comes from criticizing and judging his exasperated neighbors meets his match when a lively young family moves in next door, leading to an unexpected friendship that will turn his world upside-down.'),
(19, 'Ride On', 'images/movie/rideon.jpg', '2023-08-30', 'Shanghai Pictures', 'Comedy,Drama,Fantasy', 'Chinese,Mandrian', 'Larry Yang Hanyu Pinyin: Lóngmǎjīngshén', 'Jackie Chan,Liu Haocun,Guo Qilin', '2h 6m', 'https://www.youtube.com/watch?v=NvjVFDMIbus', 'Washed-up stuntman Luo can barely make ends meet, let alone take care of his beloved stunt horse, Red Hare. Luo reluctantly seeks help from his estranged daughter and her lawyer boyfriend when notified the horse may be auctioned off to pay his debts. Luo and Red Hare become an overnight media sensation when their fight with debt collectors goes viral.'),
(20, 'Jungle Book', 'images/movie/jungle book.jpg', '2023-08-30', 'Walt Disney Studios Motion Pictures', 'Adventure,Fantasy,Nature', 'English', 'Jon Favreau', 'Neel Sethi,Bill MurrayBen Kingsley,Idris Elba,Lupita Nyong\'o,Scarlett Johansson,Giancarlo Esposito,Christopher Walken', '1h 46m', 'https://www.youtube.com/watch?v=C4qgAaxB_pc', ' Mowgli is a boy brought up in the jungle by a pack of wolves. When Shere Khan, a tiger, threatens to kill him, a panther and a bear help him escape his clutches.Bagheera eventually finds Mowgli and Baloo and is incensed that Mowgli has not joined the humans as he had agreed, but Baloo calms him down and persuades both of them to sleep on it. During the night, Mowgli finds a herd of elephants gathered around a ditch and uses vines to save their baby. Baloo realizes that he cannot guarantee Mowgl'),
(21, 'Monster Hunt', 'images/movie/monster hunt.jpg', '2023-08-30', 'China Star Film', 'Action,Comedy,Drama', 'Chinese', 'Raman Hui', 'Tony Leung,Bai Baihe,Jing Boran,Li Yuchun,Tony Yang', '1h 58m', 'https://www.youtube.com/watch?v=UegOO1rEbB0', 'Human and monsters have lived in their separate worlds, but after the birth of Wuba, the last of the monster kings, begins the adventure to bring the two races together.Wuba is on his own journey through monster realm. The darker forces of the evil monster king are in search for Wuba. Peace is not restored in the monster world. Wuba meets Tu and BenBen, a human-monster team, and they rescue Wuba multiple times. Meanwhile, Huo and Song are in search of Wuba and reach Monster Hunter Bureau. They u'),
(22, 'I saw the devil', 'images/movie/i saw the devil.jpg', '2023-08-05', 'Showbox (South Korea) Magnet Releasing', 'Action,Drama,Revenge', 'Korean', 'Jee-woon Kim', 'Lee Byung-hun,Choi Min-sik,Oh San-ha,Kim Yoon-seo,Jeon Gook-hwan,Chun Ho-jin', '2h 24m', 'https://www.youtube.com/watch?v=VQlBa5gdwV4', 'It\'s anchored by two fantastic performances. Seeing these two men go head-to-head psychologically and physically is enthralling. There\'s no shortage of Korean revenge-thrillers, but this, along with the recent The Man from Nowhere, proves there is plenty of life left in the genre.'),
(23, 'Patthan', 'images/movie/pathaan.jpg', '2023-09-30', 'Yash Raj Films, Etalon Film', ' Action, Mystery,Romance', 'Hindi,English', 'Siddharth Anand', 'Shah Rukh Khan,Deepika Padukone,John Abraham,Dimple Kapadia,Ashutosh Rana', '2h 26m', 'https://www.youtube.com/watch?v=vqu4z34wENw', 'In the film, Pathaan (Khan), an exiled RAW agent, works with ISI agent Rubina Mohsin (Padukone) to take down Jim (Abraham), a former RAW agent, who plans to attack India with a deadly virus. Produced by Aditya Chopra of Yash Raj Films, the film began principal photography in November 2020 in Mumbai.'),
(24, 'BlackBerry', 'images/movie/blackberry.jpg', '2023-09-30', 'XYZ Films Rhombus Media Zapruder Films', 'Comedy,Drama', 'English', 'Matt Johnson', 'Jay Baruchel, Glenn Howerton, Matt Johnson, Kelly Van der Burg, Gregory Ambrose Calderone, Martin Donovan, James', '1h 30m', 'https://www.youtube.com/watch?v=cXL_HDzBQsM', 'A company that toppled global giants before succumbing to the ruthlessly competitive forces of Silicon Valley. This is not a conventional tale of modern business failure by fraud and greed. The rise and fall of BlackBerry reveals the dangerous speed at which innovators race along the information superhighway.'),
(25, 'Fool\'s Paradise', 'images/movie/fool paradise.jpg', '2023-09-30', 'Armory Films Wrigley Pictures', 'Comedy,Satire', 'English', 'Charlie Day', 'Charlie Day, Ken Jeong, Kate Beckinsale, Adrien Brody, Jason Sudeikis, Ray Liotta, Steve Coulter, Shane Paul McGhie, Aixa Maldonado, Lindsay Musil', '2h', 'https://www.youtube.com/watch?v=ajioU4MCYks', 'A satirical comedy about a down-on-his-luck publicist, who gets his lucky break when he discovers a man recently released from a mental health facility looks just like a method actor who refuses to leave his trailer. With the help of a powerful producer, the publicist helps the man become a huge star, even marrying his beautiful leading lady. Their adventures lead them to cross paths with drunken costars, irreverent unhoused action heroes, unpredictable directors, super-agent, and power-mad mogu'),
(26, 'Spider Man: Across the spider-verse', 'images/movie/spiderman.webp', '2023-09-30', 'Sony Pictures Entertainment', 'Adventure,Fantasy,Sci-Fi', 'English', 'Joaquim Dos Santos, Justin K. Thompson, Kemp Power', 'Shameik Moore,Hailee Steinfeld,Brian Tyree Henry,Lauren Vélez,Jake Johnson,Jason Schwartzman,Issa Rae,Karan Soni,Shea Whigham', '2h 18m', 'https://www.youtube.com/watch?v=cqGjhVJWtEg', 'Miles Morales returns for the next chapter of the Oscar®-winning Spider-Verse saga, an epic adventure that will transport Brooklyn\'s full-time, friendly neighborhood Spider-Man across the Multiverse to join forces with Gwen Stacy and a new team of Spider-People to face off with a villain more powerful than anything they have ever encountered.'),
(27, 'Your Name', 'images/movie/your name.jpg', '2023-09-30', 'CoMix Wave Films', 'Romance,Drama,Animation', 'Japanese', 'Makoto Shinkai', 'Aoi Yuk,Etsuko Ichihara,Kaito Ishikawa,Kazuhiko Inoue,Masami Nagasawa,Mone Kamishiraishi,Nobunaga Shimazaki,Ryou Narita,Ryunosuke Kamiki,Tani Kanon', '1h 46m', 'https://www.youtube.com/watch?v=xU47nhruN-Q', 'Two teenagers share a profound, magical connection upon discovering they are swapping bodies. Things manage to become even more complicated when the boy and girl decide to meet in person.'),
(28, 'Detective K: Secret of the Living Dead', 'images/movie/detective.jpg', '2023-09-30', 'Generation Blue Films', 'Action,Comedy,Drama', 'Korean', 'Kim Sok-yun', 'Ahn Nae-san, Hyun Woo,Kim Bum,Kim Ji-Won,Kim Myung-min,Lee Min-ki,Nam Sung-jin,Oh Dal-su,Park Geun-hyung,Woo Hyeon', '1h 45m', 'https://www.youtube.com/watch?v=6N7trw1_ZWs', 'Detectives Kim Min and Seo Pil investigates a suspicious case, requested by a strange woman. During their investigation, they meet an ambiguous woman and decide to solve the case with her.'),
(29, 'The Little Mermaid', 'images/movie/little mermaid.webp', '2023-09-30', 'Walt Disney Studios Motion Pictures', 'Adventure,Fantasy,Family', 'English', 'Rob Marshall', 'Halle Bailey,Jonah Hauer-King,Daveed Diggs,Awkwafina,Jacob Tremblay,Noma Dumezweni,Art Malik,Javier Bardem,Melissa McCarthy', '2h 15m', 'https://www.youtube.com/watch?v=kpGo2_d3oYE', 'Ariel is a mermaid princess and the youngest daughter of King Triton, ruler of the merpeople of Atlantica. She is fascinated with the human world despite never having seen it, as Triton forbid all merfolk from surfacing there after Ariel\'s mother was killed by a human.One night, Ariel sees fireworks above the ocean and surfaces to see them better. They come from the ship of Eric, the prince of a nearby island.'),
(30, 'Section Eight', 'images/movie/section 8.webp', '2023-09-30', 'RLJE Films ', 'Action,Crime,Adventure', 'English', 'Christian Sesma', 'Ryan Kwan,Lundgren,Dermot Mulroney,Scott Adkins,Mickey Rourke', '1h 38m', 'https://www.youtube.com/watch?v=v1idsDn7_bA', ' Sentenced to prison for avenging the murder of his family, a former soldier gets a second chance when a shadowy government agency recruits him for an assignment. However, he soon realizes that the very people who freed him are not what they seem.');

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` varchar(50) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `ticket_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`id`, `movie_id`, `show_date`, `show_time`, `cinema_id`, `ticket_price`) VALUES
(3, 14, '2023-10-05', '1:00 PM', 4, 8000),
(4, 13, '2023-10-05', '11:00 AM', 5, 8000),
(5, 13, '2023-10-05', '3:00 PM', 7, 8000),
(7, 14, '2023-10-05', '3:30 PM', 4, 10000),
(8, 14, '2023-10-05', '11:00 AM', 5, 12000),
(9, 14, '2023-10-05', '12:00 PM', 12, 10000),
(10, 14, '2023-10-05', '1:00 PM', 11, 10000),
(11, 14, '2023-10-05', '2:00 PM', 5, 12000),
(12, 13, '2023-10-05', '6:30 PM', 7, 10000),
(13, 13, '2023-10-05', '3:00 PM', 5, 9000),
(14, 13, '2023-10-05', '2:00 PM', 4, 11000),
(15, 16, '2023-10-05', '11:00 AM', 10, 12000),
(16, 16, '2023-10-05', '1:30 PM', 10, 12000),
(17, 16, '2023-10-05', '3:30 PM', 8, 10000),
(18, 16, '2023-10-05', '1:00 PM', 9, 12000),
(19, 16, '2023-10-05', '10:30 AM', 8, 12000),
(20, 17, '2023-10-05', '12:30 PM', 8, 12000),
(21, 17, '2023-10-05', '11:00 AM', 12, 10000),
(22, 17, '2023-10-05', '3:30 PM', 12, 10000),
(23, 17, '2023-10-05', '6:00 PM', 8, 12000),
(24, 18, '2023-10-05', '11:30 AM', 4, 11000),
(25, 18, '2023-10-05', '12:00 PM', 9, 11000),
(26, 18, '2023-10-05', '2:00 PM', 10, 10000),
(27, 19, '2023-10-05', '10:30 AM', 8, 12000),
(28, 19, '2023-10-05', '3:00 PM', 8, 12000),
(29, 19, '2023-10-05', '11:30 AM', 5, 11000),
(30, 20, '2023-10-05', '2:00 PM', 11, 10000),
(31, 20, '2023-10-05', '12:00 PM', 7, 10000),
(32, 21, '2023-10-05', '1:00 PM', 4, 10000),
(33, 21, '2023-10-05', '11:00 AM', 9, 10000),
(34, 21, '2023-10-05', '11:30 AM', 12, 10000),
(35, 22, '2023-10-05', '2:30 PM', 10, 10000),
(36, 22, '2023-10-05', '5:00 PM', 10, 10000),
(37, 22, '2023-10-05', '2:00 PM', 9, 12000),
(38, 15, '2023-10-05', '1:00 PM', 4, 10000),
(39, 15, '2023-10-05', '5:00 PM', 4, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img_path`, `alt`) VALUES
(1, 'images/slider/cinema-slider.jpg', 'First slide'),
(2, 'images/slider/slider-3.webp', 'Second slide'),
(3, 'images/slider/warning.png', 'Third slide');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `seat_dt_id` (`seat_number`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cellno` (`cellno`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industry_id` (`industry_name`),
  ADD KEY `genre_id` (`genre_name`),
  ADD KEY `lang_id` (`lang_name`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `show_time_id` (`show_time`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `show`
--
ALTER TABLE `show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `show`
--
ALTER TABLE `show`
  ADD CONSTRAINT `show_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `show_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
