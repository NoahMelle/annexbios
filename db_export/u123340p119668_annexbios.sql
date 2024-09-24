-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2024 at 01:36 PM
-- Server version: 10.4.27-MariaDB-cll-lve
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u123340p119668_annexbios`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor_data`
--

CREATE TABLE `actor_data` (
  `actor_id` int(11) NOT NULL,
  `imdb_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `actor_data`
--

INSERT INTO `actor_data` (`actor_id`, `imdb_id`, `name`, `gender`, `image_path`) VALUES
(1364, 1683343, 'Cailee Spaeny', 1, 'assets/img/actors/1683343.jpg'),
(1365, 2761308, 'David Jonsson', 2, 'assets/img/actors/2761308.jpg'),
(1366, 2164506, 'Archie Renaux', 2, 'assets/img/actors/2164506.jpg'),
(1367, 1428070, 'Isabela Merced', 1, 'assets/img/actors/1428070.jpg'),
(1368, 2304140, 'Spike Fearn', 2, 'assets/img/actors/2304140.jpg'),
(1369, 3948018, 'Aileen Wu', 1, 'assets/img/actors/3948018.jpg'),
(1370, 1737976, 'Rosie Ede', 1, 'assets/img/actors/1737976.jpg'),
(1371, 4848544, 'Soma Simon', 0, NULL),
(1372, 4848546, 'Bence Okeke', 0, NULL),
(1373, 4848547, 'Viktor Orizu', 0, NULL),
(1374, 4848549, 'Robert Bobroczkyi', 2, 'assets/img/actors/4848549.jpg'),
(1375, 3958162, 'Trevor Newlin', 0, NULL),
(1376, 107733, 'Daniel Betts', 2, 'assets/img/actors/107733.jpg'),
(1377, 1094091, 'Maika Monroe', 1, 'assets/img/actors/1094091.jpg'),
(1378, 2963, 'Nicolas Cage', 2, 'assets/img/actors/2963.jpg'),
(1379, 56871, 'Blair Underwood', 2, 'assets/img/actors/56871.jpg'),
(1380, 3128, 'Alicia Witt', 1, 'assets/img/actors/3128.jpg'),
(1381, 1840725, 'Michelle Choi-Lee', 1, 'assets/img/actors/1840725.jpg'),
(1382, 1002369, 'Dakota Daulby', 2, 'assets/img/actors/1002369.jpg'),
(1383, 4686681, 'Lauren Acala', 1, 'assets/img/actors/4686681.jpg'),
(1384, 934289, 'Kiernan Shipka', 1, 'assets/img/actors/934289.jpg'),
(1385, 4686689, 'MaÃ¯la Hosie', 0, 'assets/img/actors/4686689.jpg'),
(1386, 83445, 'Jason William Day', 2, 'assets/img/actors/83445.jpg'),
(1387, 1075842, 'Lisa Chandler', 1, 'assets/img/actors/1075842.jpg'),
(1388, 2855445, 'Ava Kelders', 0, 'assets/img/actors/2855445.jpg'),
(1389, 3177922, 'Rryla McIntosh', 1, 'assets/img/actors/3177922.jpg'),
(1390, 1392937, 'Carmel Amit', 1, 'assets/img/actors/1392937.jpg'),
(1391, 2675284, 'Shafin Karim', 2, 'assets/img/actors/2675284.jpg'),
(1392, 4785366, 'Trey Helten', 0, NULL),
(1393, 61187, 'Daniel Bacon', 2, 'assets/img/actors/61187.jpg'),
(1394, 1298187, 'Vanessa Walsh', 1, 'assets/img/actors/1298187.jpg'),
(1395, 2505813, 'Beatrix Perkins', 1, NULL),
(1396, 1781693, 'Scott Nicholson', 2, 'assets/img/actors/1781693.jpg'),
(1397, 25389, 'Peter Bryant', 2, 'assets/img/actors/25389.jpg'),
(1398, 3652048, 'Hazel Bartlett-Sias', 1, 'assets/img/actors/3652048.jpg'),
(1399, 2840848, 'Marlea Cleveland', 1, NULL),
(1400, 4785367, 'Melissa Shim', 0, NULL),
(1401, 1882939, 'Malcolm Masters', 2, 'assets/img/actors/1882939.jpg'),
(1402, 53718, 'Erin Boyes', 1, 'assets/img/actors/53718.jpg'),
(1403, 3237320, 'Lumen Beltran', 0, NULL),
(1404, 2412181, 'Anita Wittenberg', 1, 'assets/img/actors/2412181.jpg'),
(1405, 4071021, 'Michelle Cyr', 1, 'assets/img/actors/4071021.jpg'),
(1406, 10859, 'Ryan Reynolds', 2, 'assets/img/actors/10859.jpg'),
(1407, 6968, 'Hugh Jackman', 2, 'assets/img/actors/6968.jpg'),
(1408, 2324569, 'Emma Corrin', 3, 'assets/img/actors/2324569.jpg'),
(1409, 15576, 'Matthew Macfadyen', 2, 'assets/img/actors/15576.jpg'),
(1410, 1464650, 'Dafne Keen', 1, 'assets/img/actors/1464650.jpg'),
(1411, 15277, 'Jon Favreau', 2, 'assets/img/actors/15277.jpg'),
(1412, 54882, 'Morena Baccarin', 1, 'assets/img/actors/54882.jpg'),
(1413, 1091324, 'Rob Delaney', 2, 'assets/img/actors/1091324.jpg'),
(1414, 122750, 'Leslie Uggams', 1, 'assets/img/actors/122750.jpg'),
(1415, 9278, 'Jennifer Garner', 1, 'assets/img/actors/9278.jpg'),
(1416, 10814, 'Wesley Snipes', 2, 'assets/img/actors/10814.jpg'),
(1417, 38673, 'Channing Tatum', 2, 'assets/img/actors/38673.jpg'),
(1418, 16828, 'Chris Evans', 2, 'assets/img/actors/16828.jpg'),
(1419, 73968, 'Henry Cavill', 2, 'assets/img/actors/73968.jpg'),
(1420, 134774, 'Wunmi Mosaku', 1, 'assets/img/actors/134774.jpg'),
(1421, 11022, 'Aaron Stanford', 2, 'assets/img/actors/11022.jpg'),
(1422, 9832, 'Tyler Mane', 2, 'assets/img/actors/9832.jpg'),
(1423, 1109702, 'Karan Soni', 2, 'assets/img/actors/1109702.jpg'),
(1424, 1492326, 'Brianna Hildebrand', 1, 'assets/img/actors/1492326.jpg'),
(1425, 230660, 'å¿½é‚£ æ±é‡Œ', 1, 'assets/img/actors/230660.jpg'),
(1426, 80507, 'Stefan Kapicic', 2, 'assets/img/actors/80507.jpg'),
(1427, 215887, 'Randal Reeder', 2, 'assets/img/actors/215887.jpg'),
(1428, 1610940, 'Lewis Tan', 2, 'assets/img/actors/1610940.jpg'),
(1429, 4561764, 'Nick Pauley', 2, 'assets/img/actors/4561764.jpg'),
(1430, 963257, 'Sonita Henry', 1, 'assets/img/actors/963257.jpg'),
(1431, 1850835, 'Ryan McKen', 2, 'assets/img/actors/1850835.jpg'),
(1432, 4848497, 'Nanak Phlora', 0, NULL),
(1433, 4848499, 'Aydin Ahmed', 0, NULL),
(1434, 1649401, 'Leemore Marrett Jr.', 2, 'assets/img/actors/1649401.jpg'),
(1435, 1587576, 'James Dryden', 2, 'assets/img/actors/1587576.jpg'),
(1436, 4698632, 'Ollie Palmer', 2, 'assets/img/actors/4698632.jpg'),
(1437, 167008, 'Greg Hemphill', 2, 'assets/img/actors/167008.jpg'),
(1438, 3158217, 'Aaron W Reed', 2, 'assets/img/actors/3158217.jpg'),
(1439, 4854075, 'Mike Waters', 0, NULL),
(1440, 78597, 'Rob McElhenney', 2, 'assets/img/actors/78597.jpg'),
(1441, 4854086, 'James Reynolds', 1, NULL),
(1442, 1364950, 'Ed Kear', 2, 'assets/img/actors/1364950.jpg'),
(1443, 1951011, 'Paul G. Raymond', 2, 'assets/img/actors/1951011.jpg'),
(1444, 59175, 'Blake Lively', 1, 'assets/img/actors/59175.jpg'),
(1445, 4846410, 'Inez Reynolds', 1, 'assets/img/actors/4846410.jpg'),
(1446, 51797, 'Nathan Fillion', 2, 'assets/img/actors/51797.jpg'),
(1447, 10297, 'Matthew McConaughey', 2, 'assets/img/actors/10297.jpg'),
(1448, 4850040, 'OIin Reynolds', 0, NULL),
(1449, 4338091, 'Paul Mullin', 0, 'assets/img/actors/4338091.jpg'),
(1450, 74568, 'Chris Hemsworth', 2, 'assets/img/actors/74568.jpg'),
(1451, 4857614, 'Daniel Medina Ramos', 2, 'assets/img/actors/4857614.jpg'),
(1452, 1674196, 'Harry Holland', 2, 'assets/img/actors/1674196.jpg'),
(1453, 1537686, 'Naomi Ackie', 1, 'assets/img/actors/1537686.jpg'),
(1454, 1371297, 'Adria Arjona', 1, 'assets/img/actors/1371297.jpg'),
(1455, 61178, 'Alia Shawkat', 1, 'assets/img/actors/61178.jpg'),
(1456, 3514776, 'Liz Caribel Sierra', 1, 'assets/img/actors/3514776.jpg'),
(1457, 2599167, 'Trew Mullen', 1, 'assets/img/actors/2599167.jpg'),
(1458, 2224, 'Christian Slater', 2, 'assets/img/actors/2224.jpg'),
(1459, 35548, 'Simon Rex', 2, 'assets/img/actors/35548.jpg'),
(1460, 9640, 'Haley Joel Osment', 2, 'assets/img/actors/9640.jpg'),
(1461, 3560034, 'Levon Hawke', 2, 'assets/img/actors/3560034.jpg'),
(1462, 16935, 'Geena Davis', 1, 'assets/img/actors/16935.jpg'),
(1463, 6677, 'Kyle MacLachlan', 2, 'assets/img/actors/6677.jpg'),
(1464, 3769862, 'Cris Costa', 0, 'assets/img/actors/3769862.jpg'),
(1465, 1317845, 'MarÃ­a Elena Olivares', 0, 'assets/img/actors/1317845.jpg'),
(1466, 1985, 'Saul Williams', 2, 'assets/img/actors/1985.jpg'),
(1467, 3022365, 'Tiffany Persons', 0, 'assets/img/actors/3022365.jpg'),
(1468, 43373, 'Aaron Himelstein', 2, 'assets/img/actors/43373.jpg'),
(1469, 78328, 'Julian Sedgwick', 2, NULL),
(1470, 1799774, 'Ben Jacobson', 0, NULL),
(1471, 4904750, 'Caroline Forsythe', 0, NULL),
(1472, 2714803, 'Kerry Ardra', 1, 'assets/img/actors/2714803.jpg'),
(1473, 2221430, 'Mika Kubo', 1, 'assets/img/actors/2221430.jpg'),
(1474, 4904752, 'Carlotta Kohl', 0, NULL),
(1475, 4904753, 'Tanya Windman', 0, NULL),
(1476, 976042, 'Nuria Bages', 1, 'assets/img/actors/976042.jpg'),
(1477, 4904754, 'Eduardo Lopez Morton', 0, NULL),
(1478, 4904755, 'EmirÃ© Arellano', 0, NULL),
(1479, 37153, 'ZoÃ« Kravitz', 1, 'assets/img/actors/37153.jpg'),
(1480, 137905, 'Bill SkarsgÃ¥rd', 2, 'assets/img/actors/137905.jpg'),
(1481, 1503200, 'FKA Twigs', 1, 'assets/img/actors/1503200.jpg'),
(1482, 6413, 'Danny Huston', 2, 'assets/img/actors/6413.jpg'),
(1483, 212815, 'Laura Birn', 1, 'assets/img/actors/212815.jpg'),
(1484, 1674734, 'Jordan Bolger', 2, 'assets/img/actors/1674734.jpg'),
(1485, 3578843, 'Isabella Wei', 1, 'assets/img/actors/3578843.jpg'),
(1486, 20667, 'Sami Bouajila', 2, 'assets/img/actors/20667.jpg'),
(1487, 993074, 'David Bowles', 2, 'assets/img/actors/993074.jpg'),
(1488, 1857604, 'Dukagjin Podrimaj', 2, 'assets/img/actors/1857604.jpg'),
(1489, 4120723, 'Paul Maynard', 2, 'assets/img/actors/4120723.jpg'),
(1490, 1394090, 'Jim High', 2, 'assets/img/actors/1394090.jpg'),
(1491, 3400508, 'Sebastian Orozco', 2, 'assets/img/actors/3400508.jpg'),
(1492, 1817100, 'Kim Girschner', 2, 'assets/img/actors/1817100.jpg'),
(1493, 3950317, 'Baha Chbani', 0, NULL),
(1494, 2232, 'Michael Keaton', 2, 'assets/img/actors/2232.jpg'),
(1495, 1920, 'Winona Ryder', 1, 'assets/img/actors/1920.jpg'),
(1496, 11514, 'Catherine O\'Hara', 1, 'assets/img/actors/11514.jpg'),
(1497, 974169, 'Jenna Ortega', 1, 'assets/img/actors/974169.jpg'),
(1498, 15009, 'Justin Theroux', 2, 'assets/img/actors/15009.jpg'),
(1499, 5293, 'Willem Dafoe', 2, 'assets/img/actors/5293.jpg'),
(1500, 28782, 'Monica Bellucci', 1, 'assets/img/actors/28782.jpg'),
(1501, 3706720, 'Arthur Conti', 2, 'assets/img/actors/3706720.jpg'),
(1502, 1233264, 'Nick Kellington', 2, 'assets/img/actors/1233264.jpg'),
(1503, 34065, 'Santiago Cabrera', 2, 'assets/img/actors/34065.jpg'),
(1504, 39659, 'Burn Gorman', 2, 'assets/img/actors/39659.jpg'),
(1505, 518, 'Danny DeVito', 2, 'assets/img/actors/518.jpg'),
(1506, 3163471, 'Sami Slimane', 2, 'assets/img/actors/3163471.jpg'),
(1507, 1160625, 'Amy Nuttall', 1, 'assets/img/actors/1160625.jpg'),
(1508, 1226434, 'Mark Heenehan', 2, 'assets/img/actors/1226434.jpg'),
(1509, 4926264, 'Charlie Hopkinson', 0, NULL),
(1510, 2261891, 'Liv Spencer', 0, NULL),
(1511, 4926265, 'Skylar Park', 0, 'assets/img/actors/4926265.jpg'),
(1512, 3788323, 'Matt Lyons', 0, NULL),
(1513, 2615219, 'Jane Leaney', 1, 'assets/img/actors/2615219.jpg'),
(1514, 2566843, 'David Ayres', 0, 'assets/img/actors/2566843.jpg'),
(1515, 1640424, 'Sophie Holland', 0, 'assets/img/actors/1640424.jpg'),
(1516, 1562105, 'Walles Hamonde', 2, 'assets/img/actors/1562105.jpg'),
(1517, 1401548, 'Rebecca O\'Mara', 1, 'assets/img/actors/1401548.jpg'),
(1518, 3795643, 'Adam Speers', 0, 'assets/img/actors/3795643.jpg'),
(1519, 2067775, 'Daryl Kwan', 2, 'assets/img/actors/2067775.jpg'),
(1520, 3799619, 'Caroline Lawrie', 0, NULL),
(1521, 1518112, 'Philip Philmar', 2, 'assets/img/actors/1518112.jpg'),
(1522, 225202, 'Stephen K. Amos', 2, 'assets/img/actors/225202.jpg'),
(1523, 4926267, 'Sean Verre', 0, NULL),
(1524, 4003170, 'Noah Mendes', 2, NULL),
(1525, 4610760, 'Bea Svistunenko', 0, NULL),
(1526, 3174934, 'Filipe Cates', 0, 'assets/img/actors/3174934.jpg'),
(1527, 4380539, 'Alex Michael Stoll', 0, NULL),
(1528, 4926270, 'Rupi Lal', 0, NULL),
(1529, 1294272, 'Georgina Beedle', 1, NULL),
(1530, 4926271, 'Samantha Chung', 0, NULL),
(1531, 1087066, 'James Fisher', 2, 'assets/img/actors/1087066.jpg'),
(1532, 4926276, 'Travis Campbell', 0, NULL),
(1533, 3103570, 'Ian Hawkins', 0, 'assets/img/actors/3103570.jpg'),
(1534, 4043309, 'Christopher C. James', 0, NULL),
(1535, 4926280, 'Tim Kavanagh', 0, NULL),
(1536, 88675, 'Justin Baldoni', 2, 'assets/img/actors/88675.jpg'),
(1537, 1855143, 'Brandon Sklenar', 2, 'assets/img/actors/1855143.jpg'),
(1538, 213001, 'Jenny Slate', 1, 'assets/img/actors/213001.jpg'),
(1539, 552252, 'Hasan Minhaj', 2, 'assets/img/actors/552252.jpg'),
(1540, 26930, 'Amy Morton', 1, 'assets/img/actors/26930.jpg'),
(1541, 9013, 'Kevin McKidd', 2, 'assets/img/actors/9013.jpg'),
(1542, 2109661, 'Isabela Ferrer', 1, 'assets/img/actors/2109661.jpg'),
(1543, 1388470, 'Alex Neustaedter', 2, 'assets/img/actors/1388470.jpg'),
(1544, 2256, 'Robert Clohessy', 2, 'assets/img/actors/2256.jpg'),
(1545, 15905, 'Robyn Lively', 1, 'assets/img/actors/15905.jpg'),
(1546, 3951052, 'Megan Robinson', 1, 'assets/img/actors/3951052.jpg'),
(1547, 3394743, 'Robin S. Walker', 0, NULL),
(1548, 209200, 'Emily Baldoni', 1, 'assets/img/actors/209200.jpg'),
(1549, 2118672, 'Adam Mondschein', 0, NULL),
(1550, 4876463, 'Caroline Siegrist', 0, NULL),
(1551, 131125, 'Steve Monroe', 2, 'assets/img/actors/131125.jpg'),
(1552, 3261864, 'Daphne Zelle', 1, 'assets/img/actors/3261864.jpg'),
(1553, 1269, 'Kevin Costner', 2, 'assets/img/actors/1269.jpg'),
(1554, 23459, 'Sienna Miller', 1, 'assets/img/actors/23459.jpg'),
(1555, 65731, 'Sam Worthington', 2, 'assets/img/actors/65731.jpg'),
(1556, 20089, 'Jena Malone', 1, 'assets/img/actors/20089.jpg'),
(1557, 1036288, 'Abbey Lee', 1, 'assets/img/actors/1036288.jpg'),
(1558, 12132, 'Michael Rooker', 2, 'assets/img/actors/12132.jpg'),
(1559, 36422, 'Luke Wilson', 2, 'assets/img/actors/36422.jpg'),
(1560, 989411, 'Ella Hunt', 1, 'assets/img/actors/989411.jpg'),
(1561, 1112417, 'Tatanka Means', 2, 'assets/img/actors/1112417.jpg'),
(1562, 3130876, 'Owen Crow Shoe', 2, 'assets/img/actors/3130876.jpg'),
(1563, 20495, 'Jeff Fahey', 2, 'assets/img/actors/20495.jpg'),
(1564, 30319, 'Tom Payne', 2, 'assets/img/actors/30319.jpg'),
(1565, 83356, 'Jamie Campbell Bower', 2, 'assets/img/actors/83356.jpg'),
(1566, 11665, 'Michael Angarano', 2, 'assets/img/actors/11665.jpg'),
(1567, 3729892, 'Georgia MacPhail', 1, 'assets/img/actors/3729892.jpg'),
(1568, 1771, 'Giovanni Ribisi', 2, 'assets/img/actors/1771.jpg'),
(1569, 883, 'Will Patton', 2, 'assets/img/actors/883.jpg'),
(1570, 165827, 'Jim Lau', 2, 'assets/img/actors/165827.jpg'),
(1571, 77517, 'Isabelle Fuhrman', 1, 'assets/img/actors/77517.jpg'),
(1572, 40275, 'Tim Guinee', 2, 'assets/img/actors/40275.jpg'),
(1573, 1218926, 'Colin Cunningham', 2, 'assets/img/actors/1218926.jpg'),
(1574, 87954, 'Scott Haze', 2, 'assets/img/actors/87954.jpg'),
(1575, 60077, 'Douglas Smith', 2, 'assets/img/actors/60077.jpg'),
(1576, 1809025, 'Alejandro Edda', 2, 'assets/img/actors/1809025.jpg'),
(1577, 3721031, 'WasÃ© Chief', 1, 'assets/img/actors/3721031.jpg'),
(1578, 2464, 'Angus Macfadyen', 2, 'assets/img/actors/2464.jpg'),
(1579, 1175676, 'Jon Beavers', 2, 'assets/img/actors/1175676.jpg'),
(1580, 8183, 'Kathleen Quinlan', 1, 'assets/img/actors/8183.jpg'),
(1581, 2375821, 'Etienne Kellici', 2, 'assets/img/actors/2375821.jpg'),
(1582, 4243818, 'Bodhi Okuma Linton', 2, 'assets/img/actors/4243818.jpg'),
(1583, 66585, 'Gregory Cruz', 2, 'assets/img/actors/66585.jpg'),
(1584, 3038148, 'Joe Burns', 0, 'assets/img/actors/3038148.jpg'),
(1585, 785, 'James Russo', 2, 'assets/img/actors/785.jpg'),
(1586, 2482, 'David O\'Hara', 2, 'assets/img/actors/2482.jpg'),
(1587, 1597992, 'Chris Conner', 2, 'assets/img/actors/1597992.jpg'),
(1588, 3962206, 'Leroy Silva', 2, NULL),
(1589, 46814, 'Dale Dickey', 1, 'assets/img/actors/46814.jpg'),
(1590, 426, 'Larry Bagby', 2, 'assets/img/actors/426.jpg'),
(1591, 1170659, 'James Landry HÃ©bert', 2, 'assets/img/actors/1170659.jpg'),
(1592, 4795205, 'Claudia Conner', 1, NULL),
(1593, 1959629, 'Daniel Link', 2, 'assets/img/actors/1959629.jpg'),
(1594, 4795207, 'Hayes Costner', 2, NULL),
(1595, 3529517, 'Roger Ivens', 2, 'assets/img/actors/3529517.jpg'),
(1596, 134424, 'Charles Halford', 2, 'assets/img/actors/134424.jpg'),
(1597, 2138161, 'Whitney Palmer', 1, 'assets/img/actors/2138161.jpg'),
(1598, 1281174, 'Austin R. Grant', 2, 'assets/img/actors/1281174.jpg'),
(1599, 4795208, 'Bryan Hisey', 2, NULL),
(1600, 1513669, 'Ariel Llinas', 0, 'assets/img/actors/1513669.jpg'),
(1601, 21082, 'Raynor Scheine', 2, 'assets/img/actors/21082.jpg'),
(1602, 4891444, 'Lindsay Foster', 1, 'assets/img/actors/4891444.jpg'),
(1603, 155349, 'Cici Lau', 1, 'assets/img/actors/155349.jpg'),
(1604, 92611, 'Antonio D. Charity', 2, 'assets/img/actors/92611.jpg'),
(1605, 1517710, 'Adriane McLean', 1, 'assets/img/actors/1517710.jpg'),
(1606, 4803811, 'John Coinman', 2, NULL),
(1607, 4803812, 'Cleo Eringer-Parker', 0, NULL),
(1608, 4803814, 'Nyla Eringer-Parker', 0, NULL),
(1609, 3248000, 'Aidan McCann', 2, 'assets/img/actors/3248000.jpg'),
(1610, 3638620, 'Dawn Lura', 1, NULL),
(1611, 4803815, 'Teyton Allan Colbert', 2, NULL),
(1612, 3411129, 'Derek Hinkey', 2, NULL),
(1613, 4803816, 'H. Jack Williams', 2, NULL),
(1614, 4803817, 'Fiyero Barehand', 2, NULL),
(1615, 993608, 'Boo Arnold', 2, NULL),
(1616, 2894351, 'Brandon Shaffer', 2, NULL),
(1617, 4907480, 'Moimoi Gilmore', 2, NULL),
(1618, 4867261, 'Phoebe Ho', 1, NULL),
(1619, 4907483, 'Amos Little', 0, NULL),
(1620, 4907495, 'Ave Solvei', 1, NULL),
(1621, 21484, 'Todd Allen', 2, 'assets/img/actors/21484.jpg'),
(1622, 4907498, 'Keegan Perez', 2, NULL),
(1623, 4907501, 'Hallie Purser', 1, NULL),
(1624, 3371918, 'Naomi Winders', 1, NULL),
(1625, 154954, 'Elizabeth Dennehy', 1, 'assets/img/actors/154954.jpg'),
(1626, 200829, 'Austin Archer', 2, 'assets/img/actors/200829.jpg'),
(1627, 2084512, 'Dalton Baker', 2, NULL),
(1628, 3174923, 'Chase Ramsey', 2, 'assets/img/actors/3174923.jpg'),
(1629, 1367224, 'Michael Todd Behrens', 2, NULL),
(1630, 4907517, 'John Melo', 2, NULL),
(1631, 4907522, 'Sarah Shippobotham', 1, NULL),
(1632, 4907523, 'Aaron Bruderer', 2, NULL),
(1633, 4907526, 'Steve Redd', 2, NULL),
(1634, 4882706, 'Liam Bradford', 2, 'assets/img/actors/4882706.jpg'),
(1635, 2079000, 'Zachary Hokeah', 2, 'assets/img/actors/2079000.jpg'),
(1636, 4330483, 'Samuel Gray', 2, NULL),
(1637, 2000930, 'Duane Stephens', 2, 'assets/img/actors/2000930.jpg'),
(1638, 2749703, 'Michael Anthony Christian', 2, NULL),
(1639, 4907551, 'Stephen Robert Schultz', 0, NULL),
(1640, 4907552, 'Tice O. Guymon', 0, NULL),
(1641, 1999587, 'Joseph Williams', 2, NULL),
(1642, 4907564, 'Dustyn Horse', 2, NULL),
(1643, 4907570, 'Ryan Swanson', 2, NULL),
(1644, 4907578, 'Hy Woong', 0, NULL),
(1645, 13240, 'Mark Wahlberg', 2, 'assets/img/actors/13240.jpg'),
(1646, 4587, 'Halle Berry', 1, 'assets/img/actors/4587.jpg'),
(1647, 18999, 'J.K. Simmons', 2, 'assets/img/actors/18999.jpg'),
(1648, 450, 'Mike Colter', 2, 'assets/img/actors/450.jpg'),
(1649, 31164, 'Adewale Akinnuoye-Agbaje', 2, 'assets/img/actors/31164.jpg'),
(1650, 1196822, 'Jessica De Gouw', 1, 'assets/img/actors/1196822.jpg'),
(1651, 1517252, 'Alice Lee', 1, 'assets/img/actors/1517252.jpg'),
(1652, 17183, 'Jackie Earle Haley', 2, 'assets/img/actors/17183.jpg'),
(1653, 55467, 'Stephen Campbell Moore', 2, 'assets/img/actors/55467.jpg'),
(1654, 11478, 'Lorraine Bracco', 1, 'assets/img/actors/11478.jpg'),
(1655, 65002, 'Dana Delany', 1, 'assets/img/actors/65002.jpg'),
(1656, 172156, 'Patch Darragh', 2, 'assets/img/actors/172156.jpg'),
(1657, 1319037, 'James McMenamin', 2, 'assets/img/actors/1319037.jpg'),
(1658, 116714, 'Juan Carlos HernÃ¡ndez', 2, 'assets/img/actors/116714.jpg'),
(1659, 2007198, 'Alex Brightman', 2, 'assets/img/actors/2007198.jpg'),
(1660, 1504796, 'Andrei Lenart', 2, 'assets/img/actors/1504796.jpg'),
(1661, 1385098, 'Susan Fordham', 1, 'assets/img/actors/1385098.jpg'),
(1662, 109669, 'Fahim Fazli', 2, 'assets/img/actors/109669.jpg'),
(1663, 3291978, 'Robert Ryan', 2, 'assets/img/actors/3291978.jpg'),
(1664, 3725862, 'JeÅ›ka Pike', 1, 'assets/img/actors/3725862.jpg'),
(1665, 1423823, 'Jen Jacob', 1, 'assets/img/actors/1423823.jpg'),
(1666, 4182228, 'Scott Rees', 0, NULL),
(1667, 3353402, 'Julianna Kurokawa', 1, 'assets/img/actors/3353402.jpg'),
(1668, 1675387, 'Adam Collins', 2, 'assets/img/actors/1675387.jpg'),
(1669, 4182237, 'Richard Sutar', 0, NULL),
(1670, 3398994, 'John-Deric Mitchell', 0, NULL),
(1671, 3916721, 'Smilla', 0, NULL),
(1672, 1475496, 'Riley Neldam', 0, 'assets/img/actors/1475496.jpg'),
(1673, 4011560, 'Luis Arroyo Jr.', 0, NULL),
(1674, 1854056, 'Claire Ashton', 1, 'assets/img/actors/1854056.jpg'),
(1675, 2655218, 'Christian Yeung', 2, NULL),
(1676, 2939069, 'Liam Edwards', 0, NULL),
(1677, 3840978, 'Tianyi Kiy', 0, NULL),
(1678, 1553053, 'Tommy Bayiokos', 2, 'assets/img/actors/1553053.jpg'),
(1679, 4182037, 'Stephane Fichet', 2, NULL),
(1680, 1132158, 'Steve Mullins', 0, NULL),
(1681, 4182238, 'Elena Bielova', 0, NULL),
(1682, 1566132, 'Nathan Hall', 0, 'assets/img/actors/1566132.jpg'),
(1683, 3685928, 'Luqman A. Agiya', 0, NULL),
(1684, 4182239, 'Tatanya Lowed-Spence', 0, NULL),
(1685, 1172059, 'Guy Robbins', 0, NULL),
(1686, 3728083, 'Benny Bereal', 0, NULL),
(1687, 2506333, 'Obie Matthew', 2, 'assets/img/actors/2506333.jpg'),
(1688, 3538726, 'Giovanni James Bertoia', 2, NULL),
(1689, 2732471, 'Robert John Gallagher', 2, NULL),
(1690, 4182242, 'Eugene Lin', 0, NULL),
(1691, 2435626, 'MJ Lee', 0, NULL),
(1692, 4182243, 'Charlotte Aldhouse', 0, NULL),
(1693, 3891303, 'Nikky Athan', 0, NULL),
(1694, 3678118, 'Nas Ganev', 0, NULL),
(1695, 4182244, 'Jason Charles Onion', 0, NULL),
(1696, 4182245, 'Prince Marfo', 0, 'assets/img/actors/4182245.jpg'),
(1697, 4182247, 'Mamie Barry', 0, NULL),
(1698, 4136021, 'David Ambler', 0, 'assets/img/actors/4136021.jpg'),
(1699, 4182248, 'Gaj Mirtic', 0, NULL),
(1700, 2405880, 'Anthony Thomas', 2, 'assets/img/actors/2405880.jpg'),
(1701, 4182251, 'Simon Steggall', 0, NULL),
(1702, 2766131, 'Cain Aiden', 2, 'assets/img/actors/2766131.jpg'),
(1703, 4187325, 'Jason Latief Anderson', 2, 'assets/img/actors/4187325.jpg'),
(1704, 4187328, 'Lincoln R. Beckett', 0, NULL),
(1705, 2057332, 'Doug Berry', 0, NULL),
(1706, 3588769, 'Patrice Bevans', 0, NULL),
(1707, 4187330, 'Carlos Damasceno', 0, NULL),
(1708, 4187332, 'Nick Donald', 0, NULL),
(1709, 1785923, 'Jag Patel', 2, 'assets/img/actors/1785923.jpg'),
(1710, 2303017, 'Daniel Joseph Woolf', 2, 'assets/img/actors/2303017.jpg'),
(1711, 2803710, 'Mason Thames', 2, 'assets/img/actors/2803710.jpg'),
(1712, 2368719, 'Ramon Reed', 2, 'assets/img/actors/2368719.jpg'),
(1713, 1368512, 'Raphael Alejandro', 2, 'assets/img/actors/1368512.jpg'),
(1714, 2551677, 'Isabella Ferreira', 1, 'assets/img/actors/2551677.jpg'),
(1715, 2225741, 'Bardia Seiri', 2, 'assets/img/actors/2225741.jpg'),
(1716, 2779399, 'Loren Gray', 1, 'assets/img/actors/2779399.jpg'),
(1717, 2909582, 'Ali Gallo', 1, 'assets/img/actors/2909582.jpg'),
(1718, 209087, 'Scott MacArthur', 2, 'assets/img/actors/209087.jpg'),
(1719, 1540601, 'Thomas Barbusca', 2, 'assets/img/actors/1540601.jpg'),
(1720, 116575, 'Kim Hawthorne', 1, 'assets/img/actors/116575.jpg'),
(1721, 1491255, 'Victoria Moroles', 1, 'assets/img/actors/1491255.jpg'),
(1722, 4901363, 'Kayvan Shai', 0, 'assets/img/actors/4901363.jpg'),
(1723, 95102, 'Kaitlin Olson', 1, 'assets/img/actors/95102.jpg'),
(1724, 21127, 'Bobby Cannavale', 2, 'assets/img/actors/21127.jpg'),
(1725, 1783263, 'Nolan Bateman', 2, 'assets/img/actors/1783263.jpg'),
(1726, 4901367, 'Eric Grooms', 0, NULL),
(1727, 117885, 'Gattlin Griffith', 2, 'assets/img/actors/117885.jpg'),
(1728, 4901369, 'Phillip M. Lawrence', 0, NULL),
(1729, 3167042, 'Javion Allen', 0, NULL),
(1730, 1286744, 'Steele Stebbins', 2, 'assets/img/actors/1286744.jpg'),
(1731, 212205, 'Dinora Walcott', 1, 'assets/img/actors/212205.jpg'),
(1732, 4901371, 'Elijah Ocelotzin Espinoza', 0, NULL),
(1733, 2596176, 'Stefanie Rons', 0, 'assets/img/actors/2596176.jpg'),
(1734, 4901372, 'Devon Weetly', 0, NULL),
(1735, 4901373, 'Kirsten Song', 0, NULL),
(1736, 2095114, 'Lauren Mendoza', 0, NULL),
(1737, 1781003, 'Max Tepper', 0, NULL),
(1738, 4664819, 'Chase Edmondson', 0, NULL),
(1739, 4901375, 'Tommy Miller', 0, NULL),
(1740, 2551869, 'Sammi-Jack Martincak', 1, 'assets/img/actors/2551869.jpg'),
(1741, 3246946, 'Danny Miller', 0, NULL),
(1742, 1759659, 'Anissa Borrego', 1, 'assets/img/actors/1759659.jpg'),
(1743, 3553329, 'Ronin Lee', 2, 'assets/img/actors/3553329.jpg'),
(1744, 1545263, 'Imogen Tear', 1, 'assets/img/actors/1545263.jpg'),
(1745, 3531003, 'Caroline Anna-Kaye Green', 1, NULL),
(1746, 2230991, 'Daisy Edgar-Jones', 1, 'assets/img/actors/2230991.jpg'),
(1747, 83271, 'Glen Powell', 2, 'assets/img/actors/83271.jpg'),
(1748, 1560244, 'Anthony Ramos', 2, 'assets/img/actors/1560244.jpg'),
(1749, 1602972, 'Brandon Perea', 2, 'assets/img/actors/1602972.jpg'),
(1750, 16307, 'Maura Tierney', 1, 'assets/img/actors/16307.jpg'),
(1751, 145133, 'Harry Hadden-Paton', 2, 'assets/img/actors/145133.jpg'),
(1752, 1535218, 'Sasha Lane', 1, 'assets/img/actors/1535218.jpg'),
(1753, 1829245, 'Daryl McCormack', 2, 'assets/img/actors/1829245.jpg'),
(1754, 1466581, 'Nik Dodani', 2, 'assets/img/actors/1466581.jpg'),
(1755, 1785590, 'David Corenswet', 2, 'assets/img/actors/1785590.jpg'),
(1756, 94476, 'Tunde Adebimpe', 2, 'assets/img/actors/94476.jpg'),
(1757, 2252989, 'Katy O\'Brian', 1, 'assets/img/actors/2252989.jpg'),
(1758, 110993, 'David Born', 2, 'assets/img/actors/110993.jpg'),
(1759, 59843, 'Paul Scheer', 2, 'assets/img/actors/59843.jpg'),
(1760, 1381496, 'Laura Poe', 1, 'assets/img/actors/1381496.jpg'),
(1761, 2899698, 'Austin Bullock', 2, 'assets/img/actors/2899698.jpg'),
(1762, 1451123, 'Stephen Oyoung', 2, 'assets/img/actors/1451123.jpg'),
(1763, 4830556, 'Chris Adrien', 2, 'assets/img/actors/4830556.jpg'),
(1764, 1335252, 'Samantha Ireland', 1, 'assets/img/actors/1335252.jpg'),
(1765, 4830561, 'Aila Grey', 2, 'assets/img/actors/4830561.jpg'),
(1766, 1587908, 'Jeff Swearingen', 2, 'assets/img/actors/1587908.jpg'),
(1767, 1231768, 'James Paxton', 2, 'assets/img/actors/1231768.jpg'),
(1768, 4842980, 'Lily Smith', 0, 'assets/img/actors/4842980.jpg'),
(1769, 4830578, 'Randy Ballard', 2, NULL),
(1770, 1445422, 'Ashley Moss', 1, NULL),
(1771, 4830581, 'Mike Morgan', 2, NULL),
(1772, 4830584, 'Emily Sutton', 1, NULL),
(1773, 1405895, 'Julie Oliver-Touchstone', 1, 'assets/img/actors/1405895.jpg'),
(1774, 2956118, 'Austin Brooks', 2, 'assets/img/actors/2956118.jpg'),
(1775, 97391, 'Darryl Cox', 2, 'assets/img/actors/97391.jpg'),
(1776, 4830600, 'Clay Edward Jones', 2, NULL),
(1777, 3354655, 'Victoria Angelina Cruz', 1, NULL),
(1778, 4830602, 'Ben Scott', 2, NULL),
(1779, 1509281, 'Elizabeth Ann Townsend', 1, 'assets/img/actors/1509281.jpg'),
(1780, 4830647, 'Capri O\'Neill', 1, NULL),
(1781, 4830648, 'Livia Chung', 1, NULL),
(1782, 4680223, 'Chris Zurcher', 2, 'assets/img/actors/4680223.jpg'),
(1783, 4830651, 'Maxim Helmerich', 2, NULL),
(1784, 4830652, 'Ken Pomeroy', 1, NULL),
(1785, 3263877, 'James McAlister', 2, 'assets/img/actors/3263877.jpg'),
(1786, 4830654, 'Damien Lodes', 2, NULL),
(1787, 3735356, 'Jennifer Rader', 1, 'assets/img/actors/3735356.jpg'),
(1788, 4830655, 'Shaun Maher', 2, NULL),
(1789, 4830656, 'Tyler Kijac', 2, NULL),
(1790, 4830657, 'Daniel Fortman', 2, 'assets/img/actors/4830657.jpg'),
(1791, 222121, 'Ben Schwartz', 2, 'assets/img/actors/222121.jpg'),
(1792, 206, 'Jim Carrey', 2, 'assets/img/actors/206.jpg'),
(1793, 17605, 'Idris Elba', 2, 'assets/img/actors/17605.jpg'),
(1794, 1212864, 'Colleen O\'Shaughnessey', 1, 'assets/img/actors/1212864.jpg'),
(1795, 6384, 'Keanu Reeves', 2, 'assets/img/actors/6384.jpg'),
(1796, 11006, 'James Marsden', 2, 'assets/img/actors/11006.jpg'),
(1797, 110742, 'Tika Sumpter', 1, 'assets/img/actors/110742.jpg'),
(1798, 1546282, 'Natasha Rothwell', 1, 'assets/img/actors/1546282.jpg'),
(1799, 50266, 'Shemar Moore', 2, 'assets/img/actors/50266.jpg'),
(1800, 115974, 'Adam Pally', 2, 'assets/img/actors/115974.jpg'),
(1801, 208677, 'Lee Majdoub', 2, 'assets/img/actors/208677.jpg'),
(1802, 2431565, 'Alyla Browne', 1, 'assets/img/actors/2431565.jpg'),
(1803, 78080, 'Krysten Ritter', 1, 'assets/img/actors/78080.jpg'),
(1804, 85922, 'Tom Butler', 2, 'assets/img/actors/85922.jpg'),
(1805, 222129, 'James Wolk', 2, 'assets/img/actors/222129.jpg'),
(1806, 62863, 'Jorma Taccone', 2, 'assets/img/actors/62863.jpg'),
(1807, 2627590, 'Cristo FernÃ¡ndez', 2, 'assets/img/actors/2627590.jpg'),
(1808, 115625, 'Sofia Pernas', 1, 'assets/img/actors/115625.jpg'),
(1809, 54693, 'Emma Stone', 1, 'assets/img/actors/54693.jpg'),
(1810, 88124, 'Jesse Plemons', 2, 'assets/img/actors/88124.jpg'),
(1811, 1392137, 'Margaret Qualley', 1, 'assets/img/actors/1392137.jpg'),
(1812, 1360317, 'Hong Chau', 1, 'assets/img/actors/1360317.jpg'),
(1813, 1639848, 'Mamoudou Athie', 2, 'assets/img/actors/1639848.jpg'),
(1814, 1496392, 'Joe Alwyn', 2, 'assets/img/actors/1496392.jpg'),
(1815, 2340180, 'Hunter Schafer', 1, 'assets/img/actors/2340180.jpg'),
(1816, 4230763, 'Yorgos Stefanakos', 2, 'assets/img/actors/4230763.jpg'),
(1817, 4768291, 'Fadeke Adeola', 1, NULL),
(1818, 4698500, 'Tessa Bourgeois', 1, 'assets/img/actors/4698500.jpg'),
(1819, 4768312, 'Kencil Mejia', 2, NULL),
(1820, 4768315, 'Thaddeus Burbank', 2, NULL),
(1821, 4768318, 'Suzanna Stone', 1, NULL),
(1822, 4768354, 'Lawrence Johnson', 2, NULL),
(1823, 1566766, 'Lindsey G. Smith', 1, 'assets/img/actors/1566766.jpg'),
(1824, 4768294, 'Kevin Guillot', 2, NULL),
(1825, 3513744, 'Ja\'Quan Monroe-Henderson', 2, 'assets/img/actors/3513744.jpg'),
(1826, 4768338, 'Ivy Ray', 1, NULL),
(1827, 2381968, 'Susan Elle', 1, 'assets/img/actors/2381968.jpg'),
(1828, 4768355, 'Dominique Shy', 1, NULL),
(1829, 1651955, 'Harold Gervais', 2, NULL),
(1830, 4768335, 'Buddy Jones', 2, NULL),
(1831, 3420019, 'Merah Benoit', 1, 'assets/img/actors/3420019.jpg'),
(1832, 2993619, 'Kien Spiller', 2, 'assets/img/actors/2993619.jpg'),
(1833, 3858470, 'Krystal Alayne Chambers', 1, 'assets/img/actors/3858470.jpg'),
(1834, 2446329, 'Jeffrey Riseden', 2, 'assets/img/actors/2446329.jpg'),
(1835, 2000489, 'Julianne Binard', 1, 'assets/img/actors/2000489.jpg'),
(1836, 4698508, 'Lance Michael Weller', 2, 'assets/img/actors/4698508.jpg'),
(1837, 4225495, 'Emily Brady', 1, NULL),
(1838, 4824856, 'Tremayne Cole', 2, NULL),
(1839, 1397778, 'Anya Taylor-Joy', 1, 'assets/img/actors/1397778.jpg'),
(1840, 52891, 'Tom Burke', 2, 'assets/img/actors/52891.jpg'),
(1841, 148899, 'George Shevtsov', 2, 'assets/img/actors/148899.jpg'),
(1842, 75122, 'Lachy Hulme', 2, 'assets/img/actors/75122.jpg'),
(1843, 102603, 'John Howard', 2, 'assets/img/actors/102603.jpg'),
(1844, 59117, 'Angus Sampson', 2, 'assets/img/actors/59117.jpg'),
(1845, 4441956, 'Charlee Fraser', 1, 'assets/img/actors/4441956.jpg'),
(1846, 73269, 'Elsa Pataky', 1, 'assets/img/actors/73269.jpg'),
(1847, 24898, 'Nathan Jones', 2, 'assets/img/actors/24898.jpg'),
(1848, 1056053, 'Josh Helman', 2, 'assets/img/actors/1056053.jpg'),
(1849, 57795, 'David Field', 2, 'assets/img/actors/57795.jpg'),
(1850, 1551044, 'Rahel Romahn', 2, 'assets/img/actors/1551044.jpg'),
(1851, 150030, 'David Collins', 2, 'assets/img/actors/150030.jpg'),
(1852, 61784, 'Goran D. Kleut', 2, 'assets/img/actors/61784.jpg'),
(1853, 4377186, 'CJ. Bloomfield', 2, 'assets/img/actors/4377186.jpg'),
(1854, 3054747, 'Matuse Paz', 2, 'assets/img/actors/3054747.jpg'),
(1855, 1224391, 'Ian Roberts', 2, 'assets/img/actors/1224391.jpg'),
(1856, 3055705, 'Guy Spence', 2, NULL),
(1857, 1734182, 'Robert Jones', 2, 'assets/img/actors/1734182.jpg'),
(1858, 109437, 'Clarence John Ryan', 2, 'assets/img/actors/109437.jpg'),
(1859, 1125220, 'Tim Burns', 2, 'assets/img/actors/1125220.jpg'),
(1860, 2627443, 'Tim Rogers', 2, NULL),
(1861, 1513568, 'Florence Mezzara', 1, 'assets/img/actors/1513568.jpg'),
(1862, 3579580, 'Quaden Bayles', 2, 'assets/img/actors/3579580.jpg'),
(1863, 4728208, 'Peter Stephens', 2, NULL),
(1864, 4728209, 'Sean Millis', 2, NULL),
(1865, 1445417, 'Lee Perry', 2, 'assets/img/actors/1445417.jpg'),
(1866, 4728211, 'Dylan Adonis', 1, 'assets/img/actors/4728211.jpg'),
(1867, 2259783, 'David Barnett', 2, NULL),
(1868, 3549271, 'Anna Adams', 1, NULL),
(1869, 4274663, 'Peter Sammak', 2, 'assets/img/actors/4274663.jpg'),
(1870, 56162, 'Josh Randall', 2, 'assets/img/actors/56162.jpg'),
(1871, 112698, 'Dawn Klingberg', 1, NULL),
(1872, 66055, 'Richard Norton', 2, 'assets/img/actors/66055.jpg'),
(1873, 4728215, 'Stephen Amadasun', 2, NULL),
(1874, 3366121, 'Nick Annas', 2, 'assets/img/actors/3366121.jpg'),
(1875, 1734188, 'Ripley Voeten', 2, NULL),
(1876, 105124, 'Shane Dundas', 2, 'assets/img/actors/105124.jpg'),
(1877, 4728218, 'Jamie Cluff', 0, NULL),
(1878, 4728219, 'Adam Thompson', 2, NULL),
(1879, 1734184, 'Shyan Tonga', 0, NULL),
(1880, 4728221, 'Nellie Collins', 0, NULL),
(1881, 4728222, 'Adam Washbourne', 2, NULL),
(1882, 4728224, 'James Corcoran', 2, NULL),
(1883, 4728225, 'Sasa Vitanovic', 0, NULL),
(1884, 4728227, 'Tige Sixel Miller', 0, NULL),
(1885, 4728228, 'Justice Jones', 1, NULL),
(1886, 3711093, 'Maleeka Gasbarri', 1, 'assets/img/actors/3711093.jpg'),
(1887, 4728230, 'Keza Ishimwe', 1, NULL),
(1888, 2728596, 'Nat Buchanan', 1, 'assets/img/actors/2728596.jpg'),
(1889, 215913, 'Jacob Tomuri', 2, 'assets/img/actors/215913.jpg'),
(1890, 4728232, 'Mark Wales', 2, NULL),
(1891, 1014587, 'Bryan Probets', 2, 'assets/img/actors/1014587.jpg'),
(1892, 4201101, 'Danny Lim', 2, NULL),
(1893, 3067900, 'Darcy Bryce', 2, 'assets/img/actors/3067900.jpg'),
(1894, 4728234, 'Chudier Gatwech', 2, 'assets/img/actors/4728234.jpg'),
(1895, 2259333, 'Shivantha Wijesinha', 2, 'assets/img/actors/2259333.jpg'),
(1896, 4589981, 'Spencer Connelly', 2, 'assets/img/actors/4589981.jpg'),
(1897, 1734178, 'Ben Smith-Petersen', 2, 'assets/img/actors/1734178.jpg'),
(1898, 1394442, 'Toby Fuller', 2, NULL),
(1899, 2911018, 'Jayden Irving', 2, 'assets/img/actors/2911018.jpg'),
(1900, 2220846, 'Jesse Turner', 2, 'assets/img/actors/2220846.jpg'),
(1901, 1734173, 'Jon Iles', 2, NULL),
(1902, 4728239, 'Harrison Norris', 2, NULL),
(1903, 3705641, 'Ash Hodgkinson', 2, 'assets/img/actors/3705641.jpg'),
(1904, 4728241, 'Sean Renfrey', 2, NULL),
(1905, 2993591, 'Alex Time', 2, 'assets/img/actors/2993591.jpg'),
(1906, 234548, 'Daniel Webber', 2, 'assets/img/actors/234548.jpg'),
(1907, 4589985, 'å‘¨å¶å¶', 1, 'assets/img/actors/4589985.jpg'),
(1908, 3100178, 'Kelli Bailey', 1, 'assets/img/actors/3100178.jpg'),
(1909, 4287863, 'Marcia Coronado', 1, NULL),
(1910, 3585651, 'Matt De Souza', 2, NULL),
(1911, 1394433, 'Hiroshi Kasuga', 2, 'assets/img/actors/1394433.jpg'),
(1912, 3435712, 'Shakriya Tarinyawat', 2, 'assets/img/actors/3435712.jpg'),
(1913, 4735305, 'å¼ å´‡å·', 2, 'assets/img/actors/4735305.jpg'),
(1914, 117690, 'Prithviraj Sukumaran', 2, 'assets/img/actors/117690.jpg'),
(1915, 4558836, 'K R  Gokul', 2, NULL),
(1916, 105762, 'Jimmy Jean-Louis', 2, 'assets/img/actors/105762.jpg'),
(1917, 4837924, 'Talib Al Balushi', 0, NULL),
(1918, 3101516, 'Rik Aby', 0, NULL),
(1919, 593025, 'Robin Das', 0, NULL),
(1920, 223164, 'Amala Paul', 1, 'assets/img/actors/223164.jpg'),
(1921, 584769, 'Shobha Mohan', 1, 'assets/img/actors/584769.jpg'),
(1922, 2016029, 'Nasar Karutheni', 2, 'assets/img/actors/2016029.jpg'),
(1923, 4837927, 'Baburaj Thiruvalla', 0, NULL),
(1924, 2635612, 'Akef Najem', 2, 'assets/img/actors/2635612.jpg'),
(1925, 73457, 'Chris Pratt', 2, 'assets/img/actors/73457.jpg'),
(1926, 8691, 'Zoe SaldaÃ±a', 1, 'assets/img/actors/8691.jpg'),
(1927, 543530, 'Dave Bautista', 2, 'assets/img/actors/543530.jpg'),
(1928, 12835, 'Vin Diesel', 2, 'assets/img/actors/12835.jpg'),
(1929, 51329, 'Bradley Cooper', 2, 'assets/img/actors/51329.jpg'),
(1930, 72095, 'Lee Pace', 2, 'assets/img/actors/72095.jpg'),
(1931, 543261, 'Karen Gillan', 1, 'assets/img/actors/543261.jpg'),
(1932, 938, 'Djimon Hounsou', 2, 'assets/img/actors/938.jpg'),
(1933, 4764, 'John C. Reilly', 2, 'assets/img/actors/4764.jpg'),
(1934, 515, 'Glenn Close', 1, 'assets/img/actors/515.jpg'),
(1935, 1121, 'Benicio del Toro', 2, 'assets/img/actors/1121.jpg'),
(1936, 209578, 'Laura Haddock', 1, 'assets/img/actors/209578.jpg'),
(1937, 51663, 'Sean Gunn', 2, 'assets/img/actors/51663.jpg'),
(1938, 11115, 'Peter Serafinowicz', 2, 'assets/img/actors/11115.jpg'),
(1939, 8399, 'Christopher Fairbank', 2, 'assets/img/actors/8399.jpg'),
(1940, 1405259, 'Krystian Godlewski', 0, NULL),
(1941, 1148455, 'Wyatt Oleff', 2, 'assets/img/actors/1148455.jpg'),
(1942, 2518, 'Gregg Henry', 2, 'assets/img/actors/2518.jpg'),
(1943, 1405269, 'Janis Ahern', 1, NULL),
(1944, 1405309, 'Solomon Mousley', 0, 'assets/img/actors/1405309.jpg'),
(1945, 1405311, 'Lindsay Morton', 0, NULL),
(1946, 1405317, 'Robert Firth', 2, 'assets/img/actors/1405317.jpg'),
(1947, 1133011, 'Melia Kreiling', 1, 'assets/img/actors/1133011.jpg'),
(1948, 95051, 'Tom Proctor', 2, 'assets/img/actors/95051.jpg'),
(1949, 191264, 'Nick Holmes', 2, 'assets/img/actors/191264.jpg'),
(1950, 1202683, 'Max Wrottesley', 2, 'assets/img/actors/1202683.jpg'),
(1951, 1186515, 'Nicole Alexandra Shipley', 1, 'assets/img/actors/1186515.jpg'),
(1952, 1211966, 'Sharif Atkins', 2, 'assets/img/actors/1211966.jpg'),
(1953, 72440, 'Brendan Fehr', 2, 'assets/img/actors/72440.jpg'),
(1954, 941, 'Tomas Arana', 2, 'assets/img/actors/941.jpg'),
(1955, 1363394, 'Mikaela Hoover', 1, 'assets/img/actors/1363394.jpg'),
(1956, 1111204, 'Emmett Scanlan', 2, 'assets/img/actors/1111204.jpg'),
(1957, 1405441, 'Dominic Grant', 0, 'assets/img/actors/1405441.jpg'),
(1958, 25451, 'Spencer Wilding', 2, 'assets/img/actors/25451.jpg'),
(1959, 1405444, 'Alison Lintott', 1, 'assets/img/actors/1405444.jpg'),
(1960, 1211540, 'Alexis Rodney', 2, 'assets/img/actors/1211540.jpg'),
(1961, 1234991, 'Keeley Forsyth', 1, 'assets/img/actors/1234991.jpg'),
(1962, 1405453, 'Frank Gilhooley', 0, 'assets/img/actors/1405453.jpg'),
(1963, 1214673, 'Alexis Denisof', 2, 'assets/img/actors/1214673.jpg'),
(1964, 91494, 'Enzo Cilenti', 2, 'assets/img/actors/91494.jpg'),
(1965, 25679, 'Richard Katz', 2, 'assets/img/actors/25679.jpg'),
(1966, 56617, 'Ene Frost', 2, 'assets/img/actors/56617.jpg'),
(1967, 1132153, 'Ronan Summers', 2, 'assets/img/actors/1132153.jpg'),
(1968, 82639, 'Ophelia Lovibond', 1, 'assets/img/actors/82639.jpg'),
(1969, 59286, 'Laura Ortiz', 1, 'assets/img/actors/59286.jpg'),
(1970, 1312266, 'Marama Corlett', 1, 'assets/img/actors/1312266.jpg'),
(1971, 1405537, 'Rosie Jones', 0, NULL),
(1972, 1405538, 'Abidemi Sobande', 0, NULL),
(1973, 1405540, 'Alex Rose', 2, 'assets/img/actors/1405540.jpg'),
(1974, 1394341, 'Ekaterina Zalitko', 1, 'assets/img/actors/1394341.jpg'),
(1975, 1405552, 'Emily Redding', 0, 'assets/img/actors/1405552.jpg'),
(1976, 85096, 'Stephen Blackehart', 2, 'assets/img/actors/85096.jpg'),
(1977, 1405554, 'Jennifer Moylan-Taylor', 1, NULL),
(1978, 1227575, 'Bruce Mackinnon', 2, 'assets/img/actors/1227575.jpg'),
(1979, 202032, 'Ralph Ineson', 2, 'assets/img/actors/202032.jpg'),
(1980, 1229414, 'Naomi Ryan', 1, 'assets/img/actors/1229414.jpg'),
(1981, 222906, 'John Brotherton', 2, 'assets/img/actors/222906.jpg'),
(1982, 92615, 'Graham Shiels', 2, 'assets/img/actors/92615.jpg'),
(1983, 1405566, 'Douglas Robson', 0, NULL),
(1984, 1405567, 'Rachel Cullen', 1, 'assets/img/actors/1405567.jpg'),
(1985, 1405570, 'Isabella Poynton', 1, 'assets/img/actors/1405570.jpg'),
(1986, 1405571, 'Imogen Poynton', 0, NULL),
(1987, 1283880, 'Miriam Lucia', 1, 'assets/img/actors/1283880.jpg'),
(1988, 16851, 'Josh Brolin', 2, 'assets/img/actors/16851.jpg'),
(1989, 13922, 'Seth Green', 2, 'assets/img/actors/13922.jpg'),
(1990, 1388891, 'Jozef Aoki', 2, NULL),
(1991, 4343648, 'Erica Melargo', 1, 'assets/img/actors/4343648.jpg'),
(1992, 3223, 'Robert Downey Jr.', 2, 'assets/img/actors/3223.jpg'),
(1993, 18288, 'Terrence Howard', 2, 'assets/img/actors/18288.jpg'),
(1994, 1229, 'Jeff Bridges', 2, 'assets/img/actors/1229.jpg'),
(1995, 12052, 'Gwyneth Paltrow', 1, 'assets/img/actors/12052.jpg'),
(1996, 57451, 'Leslie Bibb', 1, 'assets/img/actors/57451.jpg'),
(1997, 17857, 'Shaun Toub', 2, 'assets/img/actors/17857.jpg'),
(1998, 57452, 'Faran Tahir', 2, 'assets/img/actors/57452.jpg'),
(1999, 9048, 'Clark Gregg', 2, 'assets/img/actors/9048.jpg'),
(2000, 17200, 'Bill Smitrovich', 2, 'assets/img/actors/17200.jpg'),
(2001, 173810, 'Sayed Badreya', 2, 'assets/img/actors/173810.jpg'),
(2002, 6162, 'Paul Bettany', 2, 'assets/img/actors/6162.jpg'),
(2003, 12708, 'Peter Billingsley', 2, 'assets/img/actors/12708.jpg'),
(2004, 163671, 'Will Lyman', 2, 'assets/img/actors/163671.jpg'),
(2005, 78299, 'Tom Morello', 2, 'assets/img/actors/78299.jpg'),
(2006, 54809, 'Marco Khan', 2, 'assets/img/actors/54809.jpg'),
(2007, 944830, 'Daston Kalili', 2, 'assets/img/actors/944830.jpg'),
(2008, 1209417, 'Ido Mor', 2, 'assets/img/actors/1209417.jpg'),
(2009, 95698, 'Kevin Foster', 2, 'assets/img/actors/95698.jpg'),
(2010, 1209418, 'Garret NoÃ«l', 2, NULL),
(2011, 62037, 'Eileen Weisinger', 1, 'assets/img/actors/62037.jpg'),
(2012, 183439, 'Ahmed Ahmed', 2, 'assets/img/actors/183439.jpg'),
(2013, 104669, 'Gerard Sanders', 2, NULL),
(2014, 195442, 'Russell Richardson', 2, 'assets/img/actors/195442.jpg'),
(2015, 142213, 'Ù†Ø§Ø²Ù†ÛŒÙ† Ø¨Ù†ÛŒØ§Ø¯ÛŒ', 1, 'assets/img/actors/142213.jpg'),
(2016, 1209702, 'Thomas Craig Plumer', 2, NULL),
(2017, 1209703, 'Robert Berkman', 2, NULL),
(2018, 183037, 'Stacy Stas Hurst', 1, 'assets/img/actors/183037.jpg'),
(2019, 1209704, 'Lauren Scyphers', 1, 'assets/img/actors/1209704.jpg'),
(2020, 214951, 'Frank Nyi', 2, NULL),
(2021, 205362, 'Marvin Jordan', 2, NULL),
(2022, 203468, 'Jim Cramer', 2, 'assets/img/actors/203468.jpg'),
(2023, 1209706, 'Summer Kylie Remington', 1, NULL),
(2024, 1209707, 'Ava Rose Williams', 1, NULL),
(2025, 1209708, 'Vladimir Kubr', 2, 'assets/img/actors/1209708.jpg'),
(2026, 1209710, 'Javan Tahir', 2, 'assets/img/actors/1209710.jpg'),
(2027, 206423, 'Sahar Bibiyan', 1, 'assets/img/actors/206423.jpg'),
(2028, 133121, 'Patrick O\'Connell', 2, NULL),
(2029, 181895, 'Adam Harrington', 2, 'assets/img/actors/181895.jpg'),
(2030, 62843, 'Meera Simhan', 1, 'assets/img/actors/62843.jpg'),
(2031, 204606, 'Ben Newmark', 2, 'assets/img/actors/204606.jpg'),
(2032, 210842, 'Ricki Lander', 1, 'assets/img/actors/210842.jpg'),
(2033, 205720, 'Jeannine Kaspar', 1, 'assets/img/actors/205720.jpg'),
(2034, 1005698, 'Sarah Cahill', 1, 'assets/img/actors/1005698.jpg'),
(2035, 1209711, 'Justin Rex', 2, NULL),
(2036, 90721, 'Zorianna Kit', 1, 'assets/img/actors/90721.jpg'),
(2037, 169681, 'Lana Kinnear', 1, 'assets/img/actors/169681.jpg'),
(2038, 1209712, 'Nicole Lindeblad', 1, 'assets/img/actors/1209712.jpg'),
(2039, 1209713, 'Masha Lund', 1, 'assets/img/actors/1209713.jpg'),
(2040, 169642, 'Gabrielle Tuite', 1, NULL),
(2041, 27031, 'Tim Griffin', 2, 'assets/img/actors/27031.jpg'),
(2042, 34544, 'Joshua Harto', 2, 'assets/img/actors/34544.jpg'),
(2043, 150669, 'Micah A. Hauptman', 2, 'assets/img/actors/150669.jpg'),
(2044, 1209714, 'James Bethea', 2, NULL),
(2045, 1209716, 'Mike Cochrane', 2, NULL),
(2046, 1089759, 'Flavia Manes Rossi', 1, 'assets/img/actors/1089759.jpg'),
(2047, 2231, 'Samuel L. Jackson', 2, 'assets/img/actors/2231.jpg'),
(2048, 3955051, 'Kristin J. Hooper', 1, 'assets/img/actors/3955051.jpg'),
(2049, 17178, 'Patrick Wilson', 2, 'assets/img/actors/17178.jpg'),
(2050, 21657, 'Vera Farmiga', 1, 'assets/img/actors/21657.jpg'),
(2051, 3127, 'Lili Taylor', 1, 'assets/img/actors/3127.jpg'),
(2052, 17402, 'Ron Livingston', 2, 'assets/img/actors/17402.jpg'),
(2053, 851784, 'Mackenzie Foy', 1, 'assets/img/actors/851784.jpg'),
(2054, 125025, 'Joey King', 1, 'assets/img/actors/125025.jpg'),
(2055, 979807, 'Shannon Kook', 2, 'assets/img/actors/979807.jpg'),
(2056, 63663, 'Hayley McFarland', 1, 'assets/img/actors/63663.jpg'),
(2057, 553504, 'Shanley Caswell', 1, 'assets/img/actors/553504.jpg'),
(2058, 1186839, 'Kyla Deaver', 1, 'assets/img/actors/1186839.jpg'),
(2059, 1186840, 'Sterling Jerins', 1, 'assets/img/actors/1186840.jpg'),
(2060, 196899, 'Marion Guyot', 1, 'assets/img/actors/196899.jpg'),
(2061, 1186841, 'Morganna Bridgers', 1, 'assets/img/actors/1186841.jpg'),
(2062, 1186842, 'Amy Tipton', 1, 'assets/img/actors/1186842.jpg'),
(2063, 1631174, 'Zach Pappas', 2, NULL),
(2064, 1849975, 'Rose Bachtel', 1, 'assets/img/actors/1849975.jpg'),
(2065, 1849976, 'James D. Nelson', 0, NULL),
(2066, 1697718, 'Christof Veillon', 2, 'assets/img/actors/1697718.jpg'),
(2067, 1026921, 'Carmella Gioio', 1, 'assets/img/actors/1026921.jpg'),
(2068, 80619, 'Steve Coulter', 2, 'assets/img/actors/80619.jpg'),
(2069, 2005177, 'Ashley White', 1, 'assets/img/actors/2005177.jpg'),
(2070, 2228393, 'Kymoura Kennedy', 1, 'assets/img/actors/2228393.jpg'),
(2071, 2228394, 'Sean Flynn', 0, NULL),
(2072, 2228398, 'George T. Zervos', 0, NULL),
(2073, 1716891, 'Desi Domo', 0, 'assets/img/actors/1716891.jpg'),
(2074, 1990251, 'Nate Seman', 2, 'assets/img/actors/1990251.jpg'),
(2075, 1511263, 'Lorraine Warren', 0, 'assets/img/actors/1511263.jpg'),
(2076, 181521, 'Arnell Powell', 2, 'assets/img/actors/181521.jpg'),
(2077, 3289537, 'Tony Spera', 2, 'assets/img/actors/3289537.jpg'),
(2078, 26851, 'Rei Hance', 1, 'assets/img/actors/26851.jpg'),
(2079, 26852, 'Joshua Leonard', 2, 'assets/img/actors/26852.jpg'),
(2080, 26853, 'Michael C. Williams', 2, 'assets/img/actors/26853.jpg'),
(2081, 3653054, 'Bob Griffin', 0, NULL),
(2082, 81062, 'Jim King', 2, NULL),
(2083, 1724341, 'Sandra SÃ¡nchez', 1, NULL),
(2084, 81064, 'Ed Swanson', 2, NULL),
(2085, 3653055, 'Patricia DeCou', 0, NULL),
(2086, 81066, 'Mark Mason', 0, NULL),
(2087, 81067, 'Susie Gooch', 0, NULL),
(2088, 15762, 'Tara Strong', 1, 'assets/img/actors/15762.jpg'),
(2089, 94481, 'Ashleigh Ball', 1, 'assets/img/actors/94481.jpg'),
(2090, 74368, 'Andrea Libman', 1, 'assets/img/actors/74368.jpg'),
(2091, 74360, 'Tabitha St. Germain', 1, 'assets/img/actors/74360.jpg'),
(2092, 94479, 'Cathy Weseluck', 1, 'assets/img/actors/94479.jpg'),
(2093, 5081, 'Emily Blunt', 1, 'assets/img/actors/5081.jpg'),
(2094, 454, 'Michael PeÃ±a', 2, 'assets/img/actors/454.jpg'),
(2095, 23626, 'Liev Schreiber', 2, 'assets/img/actors/23626.jpg'),
(2096, 17637, 'Taye Diggs', 2, 'assets/img/actors/17637.jpg'),
(2097, 52775, 'Kristin Chenoweth', 1, 'assets/img/actors/52775.jpg'),
(2098, 1332680, 'Uzo Aduba', 1, 'assets/img/actors/1332680.jpg'),
(2099, 1136517, 'Sia', 1, 'assets/img/actors/1136517.jpg'),
(2100, 1240646, 'Rebecca Shoichet', 1, 'assets/img/actors/1240646.jpg'),
(2101, 221843, 'Shannon Chan-Kent', 1, 'assets/img/actors/221843.jpg'),
(2102, 569211, 'Kazumi Evans', 1, 'assets/img/actors/569211.jpg'),
(2103, 52284, 'Mark Oliver', 2, 'assets/img/actors/52284.jpg'),
(2104, 94864, 'Max Martini', 2, 'assets/img/actors/94864.jpg'),
(2105, 2948464, 'Adam Bengis', 0, NULL),
(2106, 74370, 'Nicole Oliver', 1, 'assets/img/actors/74370.jpg'),
(2107, 74365, 'Britt McKillip', 1, 'assets/img/actors/74365.jpg'),
(2108, 89547, 'Brian Dobson', 2, 'assets/img/actors/89547.jpg'),
(2109, 83424, 'Peter New', 2, 'assets/img/actors/83424.jpg'),
(2110, 1027643, 'Michelle Creber', 1, 'assets/img/actors/1027643.jpg'),
(2111, 74362, 'Michael Dobson', 2, 'assets/img/actors/74362.jpg'),
(2112, 106776, 'Sam Vincent', 2, 'assets/img/actors/106776.jpg'),
(2113, 1117313, 'John David Washington', 2, 'assets/img/actors/1117313.jpg'),
(2114, 11288, 'Robert Pattinson', 2, 'assets/img/actors/11288.jpg'),
(2115, 1133349, 'Elizabeth Debicki', 1, 'assets/img/actors/1133349.jpg'),
(2116, 11181, 'Kenneth Branagh', 2, 'assets/img/actors/11181.jpg'),
(2117, 78921, 'Dimple Kapadia', 1, 'assets/img/actors/78921.jpg'),
(2118, 3895, 'Michael Caine', 2, 'assets/img/actors/3895.jpg'),
(2119, 42993, 'Martin Donovan', 2, 'assets/img/actors/42993.jpg'),
(2120, 204468, 'Fiona Dourif', 1, 'assets/img/actors/204468.jpg'),
(2121, 238130, 'Ð®Ñ€Ð¸Ð¹ ÐšÐ¾Ð»Ð¾ÐºÐ¾Ð»ÑŒÐ½Ð¸ÐºÐ¾Ð²', 2, 'assets/img/actors/238130.jpg'),
(2122, 1227717, 'Himesh Patel', 2, 'assets/img/actors/1227717.jpg'),
(2123, 11291, 'ClÃ©mence PoÃ©sy', 1, 'assets/img/actors/11291.jpg'),
(2124, 27428, 'Aaron Taylor-Johnson', 2, 'assets/img/actors/27428.jpg'),
(2125, 2491916, 'Laurie Shepherd', 2, 'assets/img/actors/2491916.jpg'),
(2126, 202930, 'Anthony Molinari', 2, 'assets/img/actors/202930.jpg'),
(2127, 137489, 'Juhan Ulfsak', 2, 'assets/img/actors/137489.jpg'),
(2128, 109322, 'Jefferson Hall', 2, 'assets/img/actors/109322.jpg'),
(2129, 137447, 'Ivo Uukkivi', 2, 'assets/img/actors/137447.jpg'),
(2130, 67206, 'Andrew Howard', 2, 'assets/img/actors/67206.jpg'),
(2131, 141041, 'Rich Ceraulo Ko', 2, 'assets/img/actors/141041.jpg'),
(2132, 1481136, 'Jonathan Camp', 2, 'assets/img/actors/1481136.jpg'),
(2133, 51682, 'Wes Chatham', 2, 'assets/img/actors/51682.jpg'),
(2134, 3480527, 'Sander Rebane', 2, 'assets/img/actors/3480527.jpg'),
(2135, 40039, 'Josh Stewart', 2, 'assets/img/actors/40039.jpg'),
(2136, 933391, 'Denzil Smith', 2, 'assets/img/actors/933391.jpg'),
(2137, 70230, 'Jeremy Theobald', 2, 'assets/img/actors/70230.jpg'),
(2138, 3750710, 'Tom Nolan', 0, NULL),
(2139, 1345429, 'Marcel Sabat', 2, 'assets/img/actors/1345429.jpg'),
(2140, 2491907, 'Julia-Maria Arnolds', 1, 'assets/img/actors/2491907.jpg'),
(2141, 1499831, 'Jack Cutmore-Scott', 2, 'assets/img/actors/1499831.jpg'),
(2142, 1808343, 'Adam Cropper', 0, 'assets/img/actors/1808343.jpg'),
(2143, 137578, 'Jan UuspÃµld', 2, 'assets/img/actors/137578.jpg'),
(2144, 1418968, 'Kaspar Velberg', 2, 'assets/img/actors/1418968.jpg'),
(2145, 137833, 'Sergo Vares', 2, 'assets/img/actors/137833.jpg'),
(2146, 79759, 'Rain Tolk', 2, 'assets/img/actors/79759.jpg'),
(2147, 1418971, 'Henrik Kalmet', 2, 'assets/img/actors/1418971.jpg'),
(2148, 543819, 'Sean Avery', 2, 'assets/img/actors/543819.jpg'),
(2149, 1502285, 'John Orantes', 0, 'assets/img/actors/1502285.jpg'),
(2150, 1945885, 'Seb Carrington', 0, 'assets/img/actors/1945885.jpg'),
(2151, 12793, 'Matthew Marsden', 2, 'assets/img/actors/12793.jpg'),
(2152, 2131774, 'Mark Krenik', 2, 'assets/img/actors/2131774.jpg'),
(2153, 2491934, 'Kenneth Wolf Andersen Haugen', 0, 'assets/img/actors/2491934.jpg'),
(2154, 2677373, 'Marek Angelstok', 2, 'assets/img/actors/2677373.jpg'),
(2155, 2677420, 'Klaus Peeter RÃ¼Ã¼tli', 2, 'assets/img/actors/2677420.jpg'),
(2156, 2677424, 'Daniel Olesk', 0, NULL),
(2157, 1979413, 'Ingrid Margus', 1, 'assets/img/actors/1979413.jpg'),
(2158, 2491928, 'Carina Velva', 1, 'assets/img/actors/2491928.jpg'),
(2159, 2491913, 'Glenn Lawrence', 0, 'assets/img/actors/2491913.jpg'),
(2160, 1759682, 'Katie McCabe', 1, 'assets/img/actors/1759682.jpg'),
(2161, 2491942, 'Ronald Pelin', 2, 'assets/img/actors/2491942.jpg'),
(2162, 2491944, 'Schezaad Ausman', 0, NULL),
(2163, 2496641, 'Anterro Ahonen', 0, NULL),
(2164, 2491937, 'Aleksei Podlesnov', 2, 'assets/img/actors/2491937.jpg'),
(2165, 2491917, 'Trent Buxton', 2, 'assets/img/actors/2491917.jpg'),
(2166, 488150, 'Jess Weber', 0, NULL),
(2167, 3529383, 'Martin TÃµnumaa', 0, NULL),
(2168, 2677433, 'Lisa Marie', 0, NULL),
(2169, 2815480, 'Loora-Eliise Kaarelson', 1, 'assets/img/actors/2815480.jpg'),
(2170, 2509522, 'Andres Oja', 2, 'assets/img/actors/2509522.jpg'),
(2171, 1456090, 'Anton Klink', 0, 'assets/img/actors/1456090.jpg'),
(2172, 3673203, 'Viktoria Jelizarova', 1, 'assets/img/actors/3673203.jpg'),
(2173, 996701, 'Miles Teller', 2, 'assets/img/actors/996701.jpg'),
(2174, 781, 'Paul Reiser', 2, 'assets/img/actors/781.jpg'),
(2175, 129104, 'Melissa Benoist', 1, 'assets/img/actors/129104.jpg'),
(2176, 970216, 'Austin Stowell', 2, 'assets/img/actors/970216.jpg'),
(2177, 1451540, 'Nate Lang', 2, 'assets/img/actors/1451540.jpg'),
(2178, 15824, 'Chris Mulkey', 2, 'assets/img/actors/15824.jpg'),
(2179, 53454, 'Damon Gupton', 2, 'assets/img/actors/53454.jpg'),
(2180, 1212459, 'Suanne Spoke', 1, 'assets/img/actors/1212459.jpg'),
(2181, 52939, 'Max Kasch', 2, 'assets/img/actors/52939.jpg'),
(2182, 1451542, 'Charlie Ian', 0, 'assets/img/actors/1451542.jpg'),
(2183, 223012, 'Jayson Blair', 2, 'assets/img/actors/223012.jpg'),
(2184, 1451543, 'Kofi Siriboe', 2, 'assets/img/actors/1451543.jpg'),
(2185, 159366, 'Kavita Patil', 1, 'assets/img/actors/159366.jpg'),
(2186, 1451545, 'C.J. Vana', 0, 'assets/img/actors/1451545.jpg'),
(2187, 171766, 'Tarik Lowe', 2, 'assets/img/actors/171766.jpg'),
(2188, 1398714, 'Tyler Kimball', 0, 'assets/img/actors/1398714.jpg'),
(2189, 1503721, 'Rogelio Douglas Jr.', 2, 'assets/img/actors/1503721.jpg'),
(2190, 1503834, 'Adrian Burks', 0, 'assets/img/actors/1503834.jpg'),
(2191, 1145677, 'Calvin C. Winbush', 2, 'assets/img/actors/1145677.jpg'),
(2192, 1503835, 'Joseph Bruno', 0, NULL),
(2193, 1296849, 'Michael D. Cohen', 2, 'assets/img/actors/1296849.jpg'),
(2194, 1098246, 'Jocelyn Ayanna', 1, 'assets/img/actors/1098246.jpg'),
(2195, 1503836, 'Keenan Henson', 2, 'assets/img/actors/1503836.jpg'),
(2196, 1503837, 'Janet Hoskins', 0, 'assets/img/actors/1503837.jpg');
INSERT INTO `actor_data` (`actor_id`, `imdb_id`, `name`, `gender`, `image_path`) VALUES
(2197, 10691, 'April Grace', 1, 'assets/img/actors/10691.jpg'),
(2198, 1503838, 'Clifton \'Fou Fou\' Eddie', 0, 'assets/img/actors/1503838.jpg'),
(2199, 1291961, 'Marcus Henderson', 2, 'assets/img/actors/1291961.jpg'),
(2200, 1503841, 'Tony Baker', 0, 'assets/img/actors/1503841.jpg'),
(2201, 16506, 'Henry G. Sanders', 2, 'assets/img/actors/16506.jpg'),
(2202, 1503842, 'Sam Campisi', 0, NULL),
(2203, 1503843, 'Jimmie Kirkpatrick', 0, NULL),
(2204, 1503844, 'Keenan Allen', 2, 'assets/img/actors/1503844.jpg'),
(2205, 1503845, 'Ayinde Vaughan', 0, NULL),
(2206, 1435768, 'Shai Golan', 0, NULL),
(2207, 1503846, 'Yancey Wells', 0, NULL),
(2208, 1503847, 'Candace Roberge', 0, NULL),
(2209, 1503848, 'Krista Kilber', 0, NULL),
(2210, 1503853, 'Stephen Hsu', 2, NULL),
(2211, 1503854, 'Herman Johansen', 2, 'assets/img/actors/1503854.jpg'),
(2212, 79051, 'Wendee Lee', 1, 'assets/img/actors/79051.jpg'),
(2213, 1360008, 'Joseph Oliveira', 2, NULL),
(2214, 81380, 'Michelle Ruff', 1, 'assets/img/actors/81380.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_header_pages_data`
--

CREATE TABLE `admin_header_pages_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `is_permission` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_header_pages_data`
--

INSERT INTO `admin_header_pages_data` (`id`, `title`, `url`, `img_url`, `sort`, `is_permission`) VALUES
(1, 'Dashboard', '', 'home.svg', 0, b'0'),
(2, 'Filmgegevens', 'films', 'movie.svg', 1, b'1'),
(3, 'Filmladder', 'filmladder', 'calendar.svg', 2, b'1'),
(4, 'Vestigingen', 'vestigingen', 'location.svg', 3, b'1'),
(5, 'Gebruikers', 'gebruikers', 'person.svg', 4, b'0'),
(6, 'Nieuws', 'nieuws', 'news.svg', 5, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `api_requests`
--

CREATE TABLE `api_requests` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `request_context` varchar(255) NOT NULL DEFAULT '',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api_requests`
--

INSERT INTO `api_requests` (`id`, `token`, `ip_address`, `user_agent`, `request_context`, `timestamp`) VALUES
(1, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:46:35'),
(2, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:46:36'),
(3, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:57:18'),
(4, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:57:21'),
(5, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', 'f3b137a08e84170d6c02ab8ddd2bd8de0c83e2f25bd26e461c560278bdab3dc9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.6422.78 Safari/537.36', 'GET /api/v1/getnews', '2024-09-19 09:58:04'),
(6, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', 'f3b137a08e84170d6c02ab8ddd2bd8de0c83e2f25bd26e461c560278bdab3dc9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.6422.78 Safari/537.36', 'GET /api/v1/movieData', '2024-09-19 09:58:04'),
(7, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:59:09'),
(8, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:59:10'),
(9, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:59:33'),
(10, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:59:34'),
(11, '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'PostmanRuntime/7.42.0', 'GET /api/v1/movieData', '2024-09-19 09:59:35'),
(12, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:02:43'),
(13, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:02:43'),
(14, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', 'Unknown', 'GET /api/v1/movieData/83', '2024-09-19 10:02:43'),
(15, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:02:44'),
(16, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:02:55'),
(17, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '10b1d62da7ee2d2f6e0f8ab830ca8f048531431eb6edc7a323d2f699fbb0f31f', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:02:55'),
(18, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '10b1d62da7ee2d2f6e0f8ab830ca8f048531431eb6edc7a323d2f699fbb0f31f', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:02:55'),
(19, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:02:58'),
(20, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '10b1d62da7ee2d2f6e0f8ab830ca8f048531431eb6edc7a323d2f699fbb0f31f', 'Unknown', 'GET /api/v1/movieData/85', '2024-09-19 10:03:00'),
(21, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '10b1d62da7ee2d2f6e0f8ab830ca8f048531431eb6edc7a323d2f699fbb0f31f', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:00'),
(22, '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:01'),
(23, '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/playingMovies', '2024-09-19 10:03:01'),
(24, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData/84', '2024-09-19 10:03:02'),
(25, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:02'),
(26, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '10b1d62da7ee2d2f6e0f8ab830ca8f048531431eb6edc7a323d2f699fbb0f31f', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:03'),
(27, '2b8e7f9a3c1d5e4f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6a7b8c9d', '377eb06854a20847ff736809834256b79c975ceaac20f0d98ab53d4c84d5c714', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:04'),
(28, '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:04'),
(29, '2b8e7f9a3c1d5e4f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6a7b8c9d', '377eb06854a20847ff736809834256b79c975ceaac20f0d98ab53d4c84d5c714', 'Unknown', 'GET /api/v1/playingMovies/', '2024-09-19 10:03:04'),
(30, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData/', '2024-09-19 10:03:05'),
(31, '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:06'),
(32, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', 'Unknown', 'GET /api/v1/movieData/83', '2024-09-19 10:03:07'),
(33, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', 'Unknown', 'GET /api/v1/movieData/84', '2024-09-19 10:03:08'),
(34, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', 'Unknown', 'GET /api/v1/movieData/85', '2024-09-19 10:03:08'),
(35, '2b8e7f9a3c1d5e4f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6a7b8c9d', '377eb06854a20847ff736809834256b79c975ceaac20f0d98ab53d4c84d5c714', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:09'),
(36, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData/85', '2024-09-19 10:03:13'),
(37, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:15'),
(38, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', 'Unknown', 'GET /api/v1/movieData', '2024-09-19 10:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `api_timeouts`
--

CREATE TABLE `api_timeouts` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `level` enum('1','2','3','') NOT NULL DEFAULT '1' COMMENT '1 = HOUR, 2 = DAY, 3 = PERMANENT',
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api_timeouts`
--

INSERT INTO `api_timeouts` (`id`, `token`, `ip_address`, `level`, `expires_at`, `created_at`) VALUES
(1, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:46', '2024-09-19 12:02:46'),
(2, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:46', '2024-09-19 12:02:46'),
(3, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:46', '2024-09-19 12:02:46'),
(4, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:51', '2024-09-19 12:02:51'),
(5, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:51', '2024-09-19 12:02:51'),
(6, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:51', '2024-09-19 12:02:51'),
(7, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:53', '2024-09-19 12:02:53'),
(8, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:53', '2024-09-19 12:02:53'),
(9, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:02:53', '2024-09-19 12:02:53'),
(10, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:02', '2024-09-19 12:03:02'),
(11, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:03', '2024-09-19 12:03:03'),
(12, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:03', '2024-09-19 12:03:03'),
(13, '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2', '9738b914e5424432bfd408ad4abb51a6030396f80a32cbc4d04a148ec35cacb4', '1', '2024-09-19 13:03:04', '2024-09-19 12:03:04'),
(14, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:08', '2024-09-19 12:03:08'),
(15, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:08', '2024-09-19 12:03:08'),
(16, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:09', '2024-09-19 12:03:09'),
(17, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:09', '2024-09-19 12:03:09'),
(18, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:09', '2024-09-19 12:03:09'),
(19, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:09', '2024-09-19 12:03:09'),
(20, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:10', '2024-09-19 12:03:10'),
(21, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:10', '2024-09-19 12:03:10'),
(22, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:10', '2024-09-19 12:03:10'),
(23, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:11', '2024-09-19 12:03:11'),
(24, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:14', '2024-09-19 12:03:14'),
(25, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:14', '2024-09-19 12:03:14'),
(26, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:15', '2024-09-19 12:03:15'),
(27, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:16', '2024-09-19 12:03:16'),
(28, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:16', '2024-09-19 12:03:16'),
(29, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:17', '2024-09-19 12:03:17'),
(30, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:18', '2024-09-19 12:03:18'),
(31, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:18', '2024-09-19 12:03:18'),
(32, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:19', '2024-09-19 12:03:19'),
(33, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:19', '2024-09-19 12:03:19'),
(34, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:19', '2024-09-19 12:03:19'),
(35, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:19', '2024-09-19 12:03:19'),
(36, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(37, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(38, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(39, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(40, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(41, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(42, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(43, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:20', '2024-09-19 12:03:20'),
(44, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(45, '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(46, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(47, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(48, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(49, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(50, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(51, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:21', '2024-09-19 12:03:21'),
(52, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:22', '2024-09-19 12:03:22'),
(53, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:22', '2024-09-19 12:03:22'),
(54, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:22', '2024-09-19 12:03:22'),
(55, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:22', '2024-09-19 12:03:22'),
(56, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:22', '2024-09-19 12:03:22'),
(57, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:23', '2024-09-19 12:03:23'),
(58, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:23', '2024-09-19 12:03:23'),
(59, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:27', '2024-09-19 12:03:27'),
(60, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:28', '2024-09-19 12:03:28'),
(61, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:28', '2024-09-19 12:03:28'),
(62, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:28', '2024-09-19 12:03:28'),
(63, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:28', '2024-09-19 12:03:28'),
(64, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:29', '2024-09-19 12:03:29'),
(65, '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', '5f36f42a2c48eab9f2ac0203f77ecade4dffa6d152e505ef7dfd9ebe261db9d5', '1', '2024-09-19 13:03:29', '2024-09-19 12:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `director_data`
--

CREATE TABLE `director_data` (
  `director_id` int(11) NOT NULL,
  `imdb_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `director_data`
--

INSERT INTO `director_data` (`director_id`, `imdb_id`, `name`, `gender`, `image_path`) VALUES
(45, 932248, 'Fede Ãlvarez', 2, 'assets/img/directors/932248.jpg'),
(46, 90609, 'Osgood Perkins', 2, 'assets/img/directors/90609.jpg'),
(47, 17825, 'Shawn Levy', 2, 'assets/img/directors/17825.jpg'),
(48, 37153, 'ZoÃ« Kravitz', 1, 'assets/img/directors/37153.jpg'),
(49, 228134, 'Rupert Sanders', 2, 'assets/img/directors/228134.jpg'),
(50, 510, 'Tim Burton', 2, 'assets/img/directors/510.jpg'),
(51, 88675, 'Justin Baldoni', 2, 'assets/img/directors/88675.jpg'),
(52, 1269, 'Kevin Costner', 2, 'assets/img/directors/1269.jpg'),
(53, 173667, 'Julian Farino', 2, 'assets/img/directors/173667.jpg'),
(54, 217147, 'Dave Chernin', 2, 'assets/img/directors/217147.jpg'),
(55, 217148, 'John Chernin', 2, NULL),
(56, 931952, 'Lee Isaac Chung', 2, 'assets/img/directors/931952.jpg'),
(57, 93364, 'Jeff Fowler', 2, 'assets/img/directors/93364.jpg'),
(58, 122423, 'Yorgos Lanthimos', 2, 'assets/img/directors/122423.jpg'),
(59, 20629, 'George Miller', 2, 'assets/img/directors/20629.jpg'),
(60, 580661, 'Blessy', 2, 'assets/img/directors/580661.jpg'),
(61, 15218, 'James Gunn', 2, 'assets/img/directors/15218.jpg'),
(62, 15277, 'Jon Favreau', 2, 'assets/img/directors/15277.jpg'),
(63, 2127, 'James Wan', 2, 'assets/img/directors/2127.jpg'),
(64, 26849, 'Daniel Myrick', 2, 'assets/img/directors/26849.jpg'),
(65, 26850, 'Eduardo SÃ¡nchez', 2, 'assets/img/directors/26850.jpg'),
(66, 1363226, 'Jayson Thiessen', 2, 'assets/img/directors/1363226.jpg'),
(67, 525, 'Christopher Nolan', 2, 'assets/img/directors/525.jpg'),
(68, 136495, 'Damien Chazelle', 2, 'assets/img/directors/136495.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `function_data`
--

CREATE TABLE `function_data` (
  `function_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `function_data`
--

INSERT INTO `function_data` (`function_id`, `name`) VALUES
(1, 'Hoofdkantoor'),
(2, 'Regiokantoor');

-- --------------------------------------------------------

--
-- Table structure for table `genre_data`
--

CREATE TABLE `genre_data` (
  `genre_id` int(11) NOT NULL,
  `imdb_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `genre_data`
--

INSERT INTO `genre_data` (`genre_id`, `imdb_id`, `title`) VALUES
(10790, 28, 'Actie'),
(10791, 12, 'Avontuur'),
(10792, 16, 'Animatie'),
(10793, 35, 'Komedie'),
(10794, 80, 'Misdaad'),
(10795, 99, 'Documentaire'),
(10796, 18, 'Drama'),
(10797, 10751, 'Familie'),
(10798, 14, 'Fantasie'),
(10799, 36, 'Geschiedenis'),
(10800, 27, 'Horror'),
(10801, 10402, 'Muziek'),
(10802, 9648, 'Mysterie'),
(10803, 10749, 'Romantiek'),
(10804, 878, 'Sciencefiction'),
(10805, 10770, 'TV-film'),
(10806, 53, 'Thriller'),
(10807, 10752, 'Oorlog'),
(10808, 37, 'Western'),
(10809, 28, 'Actie'),
(10810, 28, 'Actie'),
(10811, 12, 'Avontuur'),
(10812, 16, 'Animatie'),
(10813, 35, 'Komedie'),
(10814, 80, 'Misdaad'),
(10815, 99, 'Documentaire'),
(10816, 18, 'Drama'),
(10817, 10751, 'Familie'),
(10818, 14, 'Fantasie'),
(10819, 36, 'Geschiedenis'),
(10820, 27, 'Horror'),
(10821, 10402, 'Muziek'),
(10822, 9648, 'Mysterie'),
(10823, 10749, 'Romantiek'),
(10824, 878, 'Sciencefiction'),
(10825, 10770, 'TV-film'),
(10826, 53, 'Thriller'),
(10827, 10752, 'Oorlog'),
(10828, 37, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `kijkwijzer_genre_link`
--

CREATE TABLE `kijkwijzer_genre_link` (
  `kijkwijzer_genre_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `symbols` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`symbols`))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kijkwijzer_genre_link`
--

INSERT INTO `kijkwijzer_genre_link` (`kijkwijzer_genre_id`, `genre_id`, `name`, `age`, `symbols`) VALUES
(80, 28, 'Actie', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"},{\"name\":\"Drugs\",\"image\":\"assets\\/img\\/viewing_guides\\/drugs-en-alcohol.png\"}]'),
(81, 12, 'Avontuur', 9, '[{\"name\":\"9\",\"image\":\"assets\\/img\\/viewing_guides\\/9.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"}]'),
(82, 16, 'Animatie', 0, '[{\"name\":\"AL\",\"image\":\"assets\\/img\\/viewing_guides\\/al.png\"}]'),
(83, 35, 'Komedie', 6, '[{\"name\":\"6\",\"image\":\"assets\\/img\\/viewing_guides\\/6.png\"},{\"name\":\"Grof taalgebruik\",\"image\":\"assets\\/img\\/viewing_guides\\/taal.png\"}]'),
(84, 80, 'Misdaad', 18, '[{\"name\":\"18\",\"image\":\"assets\\/img\\/viewing_guides\\/18.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"},{\"name\":\"Drugs\",\"image\":\"assets\\/img\\/viewing_guides\\/drugs-en-alcohol.png\"},{\"name\":\"Seksuele inhoud\",\"image\":\"assets\\/img\\/viewing_guides\\/seks.png\"},{\"name\":\"Grof taalgebruik\",\"image\":\"assets\\/img\\/viewing_guides\\/taal.png\"}]'),
(85, 99, 'Documentaire', 0, '[{\"name\":\"AL\",\"image\":\"assets\\/img\\/viewing_guides\\/al.png\"}]'),
(86, 18, 'Drama', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"},{\"name\":\"Seksuele inhoud\",\"image\":\"assets\\/img\\/viewing_guides\\/seks.png\"}]'),
(87, 10751, 'Familie', 6, '[{\"name\":\"6\",\"image\":\"assets\\/img\\/viewing_guides\\/6.png\"},{\"name\":\"Angst\",\"image\":\"assets\\/img\\/viewing_guides\\/angst.png\"}]'),
(88, 14, 'Fantasie', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Angst\",\"image\":\"assets\\/img\\/viewing_guides\\/angst.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"}]'),
(89, 36, 'Geschiedenis', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"}]'),
(90, 27, 'Horror', 16, '[{\"name\":\"16\",\"image\":\"assets\\/img\\/viewing_guides\\/16.png\"},{\"name\":\"Angst\",\"image\":\"assets\\/img\\/viewing_guides\\/angst.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"}]'),
(91, 10402, 'Muziek', 0, '[{\"name\":\"AL\",\"image\":\"assets\\/img\\/viewing_guides\\/al.png\"}]'),
(92, 9648, 'Mysterie', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Angst\",\"image\":\"assets\\/img\\/viewing_guides\\/angst.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"}]'),
(93, 10749, 'Romantiek', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Seksuele inhoud\",\"image\":\"assets\\/img\\/viewing_guides\\/seks.png\"}]'),
(94, 878, 'Sciencefiction', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Angst\",\"image\":\"assets\\/img\\/viewing_guides\\/angst.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"}]'),
(95, 10770, 'TV-film', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"}]'),
(96, 53, 'Thriller', 16, '[{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"},{\"name\":\"Angst\",\"image\":\"assets\\/img\\/viewing_guides\\/angst.png\"}]'),
(97, 10752, 'Oorlog', 16, '[{\"name\":\"16\",\"image\":\"assets\\/img\\/viewing_guides\\/16.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"},{\"name\":\"Angst\",\"image\":\"assets\\/img\\/viewing_guides\\/angst.png\"}]'),
(98, 37, 'Western', 12, '[{\"name\":\"12\",\"image\":\"assets\\/img\\/viewing_guides\\/12.png\"},{\"name\":\"Geweld\",\"image\":\"assets\\/img\\/viewing_guides\\/geweld.png\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `location_data`
--

CREATE TABLE `location_data` (
  `location_id` int(11) NOT NULL,
  `function` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `website_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location_data`
--

INSERT INTO `location_data` (`location_id`, `function`, `image_path`, `city`, `address`, `postal_code`, `website_link`) VALUES
(3, 1, '', 'Utrecht', 'Klompenstraat 123', '3512AB', 'https://www.google.com'),
(7, 2, 'leerdam.png', 'Leerdam', 'Glasblazerslaan 45', '4141CD', 'http://annexbiosleerdam2.gluwebsite.nl/'),
(8, 2, 'maarssen.png', 'Maarssen', 'Vechtkade 78', '3601BR', 'http://annexbiosmaarssen2.gluwebsite.nl/'),
(9, 2, 'breukelen.png', 'Breukelen', 'Brugstraat 56', '3621XA', 'http://annexbiosbreukelen2.gluwebsite.nl/'),
(10, 2, 'bilthoven.png', 'Bilthoven', 'Dennendreef 34', '3722KM', 'http://annexbiosbilthoven2.gluwebsite.nl/'),
(12, 2, 'montfoort.png', 'Montfoort', 'Molenstraat 22', '3417RD', 'http://annexbiosmontfoort2.gluwebsite.nl/'),
(13, 2, '', 'Woerden', 'Havenweg 11', '3441BG', 'https://www.google.com'),
(14, 2, '', 'Leidsche Rijn', 'Laan van Leidsche Rijn 89', '3541CV', 'http://annexbiosleidscherijn2.gluwebsite.nl/'),
(22, 2, '', 'Leidsche Rijn (2WDV1)', 'Laan van Leidsche Rijn 89', '3541CV', 'http://annexbiosleidscherijn.gluwebsite.nl/'),
(23, 2, '', 'Montfoort (2WDV1)', 'Molenstraat 22', '3417RD', 'http://annexbiosmontfoort.gluwebsite.nl/'),
(24, 2, '', 'Bilthoven (2WDV1)', 'Dennendreef 34', '3722KM', 'http://annexbiosbilthoven.gluwebsite.nl/');

-- --------------------------------------------------------

--
-- Table structure for table `location_movie_data`
--

CREATE TABLE `location_movie_data` (
  `location_movie_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `place_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `play_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location_movie_data`
--

INSERT INTO `location_movie_data` (`location_movie_id`, `movie_id`, `location_id`, `place_data`, `play_time`) VALUES
(19, 83, 7, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":false,\"name\":\"Rick de Groot\",\"email\":\"rickdegroot0705@gmail.com\"},{\"place\":4,\"available\":false,\"name\":\"Rick de Groot\",\"email\":\"rickdegroot0705@gmail.com\"},{\"place\":5,\"available\":false,\"name\":\"Rick de Groot\",\"email\":\"rickdegroot0705@gmail.com\"},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-09-26 20:00:00'),
(20, 84, 8, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true}]', '2024-09-24 20:00:00'),
(21, 85, 9, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true}]', '2024-09-24 21:00:00'),
(22, 86, 10, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true}]', '2024-10-11 19:00:00'),
(23, 87, 12, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true},{\"place\":37,\"available\":true},{\"place\":38,\"available\":true},{\"place\":39,\"available\":true},{\"place\":40,\"available\":true}]', '2024-10-16 18:00:00'),
(24, 88, 13, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true}]', '2024-09-13 06:00:00'),
(25, 89, 14, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true}]', '2024-09-19 20:00:00'),
(26, 90, 7, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true}]', '2024-09-29 17:00:00'),
(27, 91, 8, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true},{\"place\":37,\"available\":true},{\"place\":38,\"available\":true},{\"place\":39,\"available\":true},{\"place\":40,\"available\":true},{\"place\":41,\"available\":true},{\"place\":42,\"available\":true}]', '2024-09-21 20:00:00'),
(28, 92, 10, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true}]', '2024-10-30 22:00:00'),
(29, 93, 12, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true},{\"place\":37,\"available\":true},{\"place\":38,\"available\":true},{\"place\":39,\"available\":true},{\"place\":40,\"available\":true},{\"place\":41,\"available\":true},{\"place\":42,\"available\":true}]', '2024-09-16 17:00:00'),
(31, 95, 9, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true}]', '2024-10-15 20:00:00'),
(32, 96, 9, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true}]', '2024-09-27 15:30:00'),
(43, 90, 7, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true},{\"place\":37,\"available\":true},{\"place\":38,\"available\":true},{\"place\":39,\"available\":true},{\"place\":40,\"available\":true}]', '2024-09-20 19:00:00'),
(44, 91, 7, '[{\"place\":1,\"available\":false,\"name\":\"Lisa Guijt\",\"email\":\"mail.lisageurts@gmail.com\"},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":false,\"name\":\"Lisa Guijt\",\"email\":\"mail.lisageurts@gmail.com\"},{\"place\":5,\"available\":false,\"name\":\"Lisa Guijt\",\"email\":\"mail.lisageurts@gmail.com\"},{\"place\":6,\"available\":false,\"name\":\"Lisa Guijt\",\"email\":\"mail.lisageurts@gmail.com\"},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":false,\"name\":\"Lisa Guijt\",\"email\":\"mail.lisageurts@gmail.com\"},{\"place\":17,\"available\":false,\"name\":\"Lisa Guijt\",\"email\":\"mail.lisageurts@gmail.com\"},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":false,\"name\":\"Lisa Guijt\",\"email\":\"mail.lisageurts@gmail.com\"}]', '2024-09-20 20:00:00'),
(49, 90, 7, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":false,\"name\":\"Lukas Stroomer\",\"email\":\"lukasstroomer@gmail.com\"},{\"place\":21,\"available\":false,\"name\":\"Lukas Stroomer\",\"email\":\"lukasstroomer@gmail.com\"},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-16 08:00:00'),
(50, 96, 8, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-10 07:00:00'),
(51, 95, 9, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-13 09:00:00'),
(52, 99, 10, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true}]', '2024-10-12 04:00:00'),
(53, 83, 22, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true}]', '2024-10-12 09:00:00'),
(54, 84, 22, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-11 08:00:00'),
(55, 86, 22, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true}]', '2024-09-17 08:00:00'),
(56, 92, 22, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true},{\"place\":37,\"available\":true},{\"place\":38,\"available\":true},{\"place\":39,\"available\":true},{\"place\":40,\"available\":true},{\"place\":41,\"available\":true},{\"place\":42,\"available\":true}]', '2024-10-04 09:00:00'),
(57, 83, 23, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-03 20:00:00'),
(58, 84, 23, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true}]', '2024-10-11 17:00:00'),
(59, 85, 23, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-02 20:00:00'),
(60, 88, 23, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true}]', '2024-10-18 20:00:00'),
(61, 89, 23, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true}]', '2024-10-11 20:00:00'),
(62, 96, 23, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true}]', '2024-10-04 16:00:00'),
(64, 83, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-11 20:00:00'),
(65, 84, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-12 19:00:00'),
(66, 85, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true}]', '2024-10-14 15:00:00'),
(67, 86, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-08 19:00:00'),
(68, 87, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-22 20:00:00'),
(69, 88, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true},{\"place\":33,\"available\":true},{\"place\":34,\"available\":true},{\"place\":35,\"available\":true},{\"place\":36,\"available\":true}]', '2024-10-18 14:00:00'),
(70, 108, 7, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-09 08:00:00'),
(71, 83, 8, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-10 08:00:00'),
(72, 109, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-09 02:00:00'),
(73, 88, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-24 16:00:00'),
(74, 90, 24, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-10-11 15:00:00'),
(75, 86, 9, '[{\"place\":1,\"available\":true},{\"place\":2,\"available\":true},{\"place\":3,\"available\":true},{\"place\":4,\"available\":true},{\"place\":5,\"available\":true},{\"place\":6,\"available\":true},{\"place\":7,\"available\":true},{\"place\":8,\"available\":true},{\"place\":9,\"available\":true},{\"place\":10,\"available\":true},{\"place\":11,\"available\":true},{\"place\":12,\"available\":true},{\"place\":13,\"available\":true},{\"place\":14,\"available\":true},{\"place\":15,\"available\":true},{\"place\":16,\"available\":true},{\"place\":17,\"available\":true},{\"place\":18,\"available\":true},{\"place\":19,\"available\":true},{\"place\":20,\"available\":true},{\"place\":21,\"available\":true},{\"place\":22,\"available\":true},{\"place\":23,\"available\":true},{\"place\":24,\"available\":true},{\"place\":25,\"available\":true},{\"place\":26,\"available\":true},{\"place\":27,\"available\":true},{\"place\":28,\"available\":true},{\"place\":29,\"available\":true},{\"place\":30,\"available\":true},{\"place\":31,\"available\":true},{\"place\":32,\"available\":true}]', '2024-09-27 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location_tokens`
--

CREATE TABLE `location_tokens` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `token_role` bit(1) NOT NULL DEFAULT b'0',
  `token` varchar(255) NOT NULL,
  `is_blocked` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location_tokens`
--

INSERT INTO `location_tokens` (`id`, `location_id`, `token_role`, `token`, `is_blocked`) VALUES
(4, 12, b'0', '0be8d9266c188d1e2e2550f41b7ba5f965c8daa4046c3a62f996e5547ac834b7', b'0'),
(5, 3, b'1', '1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t', b'0'),
(6, 7, b'0', '2b8e7f9a3c1d5e4f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6a7b8c9d', b'0'),
(7, 8, b'0', '3c9f6d2e8a5b7g1h4i0j2k3l4m5n6o7p8q9r0s1t2u3v4w5x6y7z8a9b0c1d2e3f', b'0'),
(8, 9, b'0', '4d8e9f1a2b3c6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6a7b8c9d0e1f', b'0'),
(9, 10, b'0', '5e9f2a3b8c1d6g7h0i4j5k6l7m8n9o0p1q2r3s4t5u6v7w8x9y0z1a2b3c4d5e6f', b'0'),
(10, 13, b'0', '1eb4a8e655a1167a3083f75ac35ca8e974d993e898182b13e4a1fe3eeb6acead', b'0'),
(11, 14, b'0', '0846816a0159843d9760b0f09ca8baf990dad297a07ab223d0a34068b5c6f8f2', b'0'),
(17, 22, b'0', '50e0ad3617490b19272646df7ce799f0d78d517240e650830a4ddcab9e3bd8aa', b'0'),
(18, 23, b'0', '8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5', b'0'),
(19, 24, b'0', '91e72f6956518f0337d9eaf07add3f1ec1737a2bdf0c64ff782bf50558375947', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actor_link`
--

CREATE TABLE `movie_actor_link` (
  `id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `character_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movie_actor_link`
--

INSERT INTO `movie_actor_link` (`id`, `actor_id`, `movie_id`, `character_name`) VALUES
(1035, 1364, 83, 'Rain'),
(1036, 1365, 83, 'Andy'),
(1037, 1366, 83, 'Tyler'),
(1038, 1367, 83, 'Kay'),
(1039, 1368, 83, 'Bjorn'),
(1040, 1369, 83, 'Navarro'),
(1041, 1370, 83, 'WY Officer'),
(1042, 1371, 83, '10-Year-Old Punk #1'),
(1043, 1372, 83, '10-Year-Old Punk #2'),
(1044, 1373, 83, '10-Year-Old Punk #3'),
(1045, 1374, 83, 'Offspring'),
(1046, 1375, 83, 'Xenomorph'),
(1047, 1376, 83, 'Rook (Facial and Vocal Performance)'),
(1048, 1377, 84, 'Agent Lee Harker'),
(1049, 1378, 84, 'Longlegs'),
(1050, 1379, 84, 'Agent Carter'),
(1051, 1380, 84, 'Ruth Harker'),
(1052, 1381, 84, 'Agent Browning'),
(1053, 1382, 84, 'Agent Fisk'),
(1054, 1383, 84, 'Young Lee Harker'),
(1055, 1384, 84, 'Carrie Anne Camera'),
(1056, 1385, 84, 'Young Carrie Anne Camera'),
(1057, 1386, 84, 'Father Camera'),
(1058, 1387, 84, 'Mother Camera'),
(1059, 1388, 84, 'Ruby Carter'),
(1060, 1389, 84, 'Adult Ruby Carter'),
(1061, 1390, 84, 'Anna Carter'),
(1062, 1391, 84, 'Clinical Doctor'),
(1063, 1392, 84, 'Suspect'),
(1064, 1393, 84, 'Coroner'),
(1065, 1394, 84, 'CSI Agent'),
(1066, 1395, 84, 'Teenage Clerk'),
(1067, 1396, 84, 'Agent Kurt Kobble'),
(1068, 1397, 84, 'Senior FBI Agent'),
(1069, 1398, 84, 'Birthday Girl'),
(1070, 1399, 84, 'Alder Family Mom'),
(1071, 1400, 84, 'Hotel Bar Server'),
(1072, 1401, 84, 'Gus'),
(1073, 1402, 84, 'Young Agent'),
(1074, 1403, 84, 'Student'),
(1075, 1404, 84, 'Older Female Orderly'),
(1076, 1405, 84, 'Admitting Nurse'),
(1077, 1406, 85, 'Wade Wilson / Deadpool / Nicepool'),
(1078, 1407, 85, 'Logan / Wolverine'),
(1079, 1408, 85, 'Cassandra Nova'),
(1080, 1409, 85, 'Mr. Paradox'),
(1081, 1410, 85, 'Laura / X-23'),
(1082, 1411, 85, 'Happy Hogan'),
(1083, 1412, 85, 'Vanessa'),
(1084, 1413, 85, 'Peter'),
(1085, 1414, 85, 'Blind Al'),
(1086, 1415, 85, 'Elektra'),
(1087, 1416, 85, 'Blade'),
(1088, 1417, 85, 'Gambit'),
(1089, 1418, 85, 'Johnny Storm'),
(1090, 1419, 85, 'The Cavillrine'),
(1091, 1420, 85, 'B-15'),
(1092, 1421, 85, 'Pyro'),
(1093, 1422, 85, 'Sabretooth'),
(1094, 1423, 85, 'Dopinder'),
(1095, 1424, 85, 'Negasonic Teenage Warhead'),
(1096, 1425, 85, 'Yukio'),
(1097, 1426, 85, 'Colossus (voice)'),
(1098, 1427, 85, 'Buck'),
(1099, 1428, 85, 'Shatterstar'),
(1100, 1429, 85, 'Dancepool'),
(1101, 1430, 85, 'Mrs. Chipman'),
(1102, 1431, 85, 'Mr. Chipman'),
(1103, 1432, 85, 'Elliot Chipman'),
(1104, 1433, 85, 'Kevin Chipman'),
(1105, 1434, 85, 'Minuteman Leader'),
(1106, 1435, 85, 'TVA Tech'),
(1107, 1436, 85, 'Bar Patron'),
(1108, 1437, 85, 'Seedy Bartender'),
(1109, 1438, 85, 'Juggernaut'),
(1110, 1439, 85, 'Blob'),
(1111, 1440, 85, 'TVA Soldier'),
(1112, 1441, 85, 'Screaming Mutant (voice)'),
(1113, 1442, 85, 'Outpost Tech'),
(1114, 1443, 85, 'TVA Office Agent'),
(1115, 1444, 85, 'Ladypool (voice)'),
(1116, 1445, 85, 'Kidpool (voice)'),
(1117, 1446, 85, 'Headpool (voice)'),
(1118, 1447, 85, 'Cowboypool (voice)'),
(1119, 1448, 85, 'Babypool (voice)'),
(1120, 1449, 85, 'Welshpool'),
(1121, 1450, 85, 'Thor Odinson (archive footage) (uncredited)'),
(1122, 1451, 85, 'Toad (uncredited)'),
(1123, 1452, 85, 'Haroldpool (uncredited)'),
(1124, 1453, 86, 'Frida'),
(1125, 1417, 86, 'Slater King'),
(1126, 1454, 86, 'Sarah'),
(1127, 1455, 86, 'Jess'),
(1128, 1456, 86, 'Camilla'),
(1129, 1457, 86, 'Heather'),
(1130, 1458, 86, 'Vic Daymond'),
(1131, 1459, 86, 'Cody'),
(1132, 1460, 86, 'Tom'),
(1133, 1461, 86, 'Lucas'),
(1134, 1462, 86, 'Stacy'),
(1135, 1463, 86, 'Rich'),
(1136, 1464, 86, 'Stan'),
(1137, 1465, 86, 'Maid'),
(1138, 1466, 86, 'Emcee'),
(1139, 1467, 86, 'Interviewer'),
(1140, 1468, 86, 'Manager'),
(1141, 1469, 86, 'Husband'),
(1142, 1470, 86, 'Ben'),
(1143, 1471, 86, 'Caroline'),
(1144, 1472, 86, 'Woman'),
(1145, 1473, 86, 'Cocktail Waitress'),
(1146, 1474, 86, 'Young Woman'),
(1147, 1475, 86, 'Young Woman'),
(1148, 1476, 86, 'Beautiful Woman Gala'),
(1149, 1477, 86, 'Auctioneer'),
(1150, 1478, 86, 'Hannah Marshall'),
(1151, 1479, 86, 'Swanky Stewardess'),
(1152, 1480, 87, 'Eric / The Crow'),
(1153, 1481, 87, 'Shelly'),
(1154, 1482, 87, 'Vincent Roeg'),
(1155, 1483, 87, 'Marion'),
(1156, 1484, 87, 'Chance'),
(1157, 1485, 87, 'Zadie'),
(1158, 1486, 87, 'Kronos'),
(1159, 1487, 87, 'Wickham'),
(1160, 1488, 87, 'Detective Milch'),
(1161, 1489, 87, 'Malcolm'),
(1162, 1490, 87, 'Uniformed Cop 1'),
(1163, 1491, 87, 'Dorm'),
(1164, 1492, 87, 'Asian Businessman'),
(1165, 1493, 87, 'Arabic Businessman #2'),
(1166, 1494, 88, 'Betelgeuse'),
(1167, 1495, 88, 'Lydia Deetz'),
(1168, 1496, 88, 'Delia Deetz'),
(1169, 1497, 88, 'Astrid Deetz'),
(1170, 1498, 88, 'Rory'),
(1171, 1499, 88, 'Wolf Jackson'),
(1172, 1500, 88, 'Delores'),
(1173, 1501, 88, 'Jeremy'),
(1174, 1502, 88, 'Bob-Shrinker'),
(1175, 1503, 88, 'Richard'),
(1176, 1504, 88, 'Father Damien'),
(1177, 1505, 88, 'Janitor'),
(1178, 1506, 88, 'Le Tigre'),
(1179, 1507, 88, 'Jane Butterfield'),
(1180, 1508, 88, 'Clive'),
(1181, 1509, 88, 'Clive (voice)'),
(1182, 1510, 88, 'Olga'),
(1183, 1511, 88, 'Littler Jane'),
(1184, 1512, 88, 'Dave-Shrinker'),
(1185, 1513, 88, 'Jeremy\'s Mom'),
(1186, 1514, 88, 'Jeremy\'s Dad'),
(1187, 1515, 88, 'Hot Dog Lady on a Stick'),
(1188, 1516, 88, 'Glen'),
(1189, 1517, 88, 'Jody Welch'),
(1190, 1518, 88, 'Emmet Welch'),
(1191, 1519, 88, 'Eddy'),
(1192, 1520, 88, 'Dead Cat Lady'),
(1193, 1521, 88, 'Hooded Pagan'),
(1194, 1522, 88, 'Conductor'),
(1195, 1523, 88, 'Josh'),
(1196, 1524, 88, 'Ethan'),
(1197, 1525, 88, 'Nadia'),
(1198, 1526, 88, 'Vlad'),
(1199, 1527, 88, 'TV Interviewer'),
(1200, 1528, 88, 'Astrid\'s Doctor'),
(1201, 1529, 88, 'Jackson\'s Secretary'),
(1202, 1530, 88, 'Littler Jane Picture Double'),
(1203, 1531, 88, 'Detective'),
(1204, 1532, 88, 'Funeral Mourner (uncredited)'),
(1205, 1533, 88, 'Funeral Mourner (uncredited)'),
(1206, 1534, 88, 'Funeral Mourner (uncredited)'),
(1207, 1535, 88, 'Funeral Mourner (uncredited)'),
(1208, 1444, 89, 'Lily Bloom'),
(1209, 1536, 89, 'Ryle Kincaid'),
(1210, 1537, 89, 'Atlas Corrigan'),
(1211, 1538, 89, 'Allysa'),
(1212, 1539, 89, 'Marshall'),
(1213, 1540, 89, 'Jenny Bloom'),
(1214, 1541, 89, 'Andrew Bloom'),
(1215, 1542, 89, 'Young Lily Bloom'),
(1216, 1543, 89, 'Young Atlas Corrigan'),
(1217, 1544, 89, 'Sheriff'),
(1218, 1545, 89, 'Ms. Byland'),
(1219, 1546, 89, 'Ms. Smith'),
(1220, 1547, 89, 'Doctor Johnson'),
(1221, 1548, 89, 'Doctor Julie'),
(1222, 1549, 89, 'Doctor Dunbar'),
(1223, 1550, 89, 'Katie'),
(1224, 1551, 89, 'Realtor'),
(1225, 1552, 89, 'Female Waiter'),
(1226, 1553, 90, 'Hayes Ellison'),
(1227, 1554, 90, 'Frances Kittredge'),
(1228, 1555, 90, 'Trent Gephart'),
(1229, 1556, 90, '\"Ellen\" Harvey'),
(1230, 1557, 90, 'Marigold'),
(1231, 1558, 90, 'Sgt. Major Thomas Riordan'),
(1232, 1482, 90, 'Col. Albert Houghton'),
(1233, 1559, 90, 'Matthew Van Weyden'),
(1234, 1560, 90, 'Juliette Chesney'),
(1235, 1561, 90, 'Taklishim'),
(1236, 1562, 90, 'Pionsenay'),
(1237, 1563, 90, 'Tracker'),
(1238, 1564, 90, 'Hugh Proctor'),
(1239, 1565, 90, 'Caleb Sykes'),
(1240, 1566, 90, 'Walt'),
(1241, 1567, 90, 'Elizabeth Kittredge'),
(1242, 1568, 90, 'Pickering'),
(1243, 1569, 90, 'Owen Kittredge'),
(1244, 1570, 90, 'Mr. Hong'),
(1245, 1571, 90, 'Diamond Kittredge'),
(1246, 1572, 90, 'James Kittredge'),
(1247, 1573, 90, 'Chisholm'),
(1248, 1574, 90, 'Elias Janney'),
(1249, 1575, 90, 'Sig'),
(1250, 1576, 90, 'Neron Chavez'),
(1251, 1577, 90, 'Liluye'),
(1252, 1578, 90, 'Desmarais'),
(1253, 1579, 90, 'Junior Sykes'),
(1254, 1580, 90, 'Annie Pine'),
(1255, 1581, 90, 'Russell Ganz'),
(1256, 1582, 90, 'Sacaton'),
(1257, 1583, 90, 'Tuayeseh'),
(1258, 1584, 90, 'Ben Sykes'),
(1259, 1585, 90, 'Abel Naughton'),
(1260, 1586, 90, 'Bowler Hat Surveyor'),
(1261, 1587, 90, 'Second Surveyor'),
(1262, 1588, 90, 'MimbreÃ±o Brave'),
(1263, 1589, 90, 'Mrs. Sykes'),
(1264, 1590, 90, 'Bill Landry'),
(1265, 1591, 90, 'Flagg'),
(1266, 1592, 90, 'Mrs. Bowman'),
(1267, 1593, 90, 'Malcolm'),
(1268, 1594, 90, 'Nathaniel Kittredge'),
(1269, 1595, 90, 'Birke'),
(1270, 1596, 90, 'James Sykes'),
(1271, 1597, 90, 'Junior\'s Wife'),
(1272, 1598, 90, 'Gratton Sykes'),
(1273, 1599, 90, 'Uncle Sykes'),
(1274, 1600, 90, 'Mike Connolly'),
(1275, 1601, 90, 'Hermit'),
(1276, 1602, 90, 'Mrs. Van Weyden'),
(1277, 1603, 90, 'Mrs. Hong'),
(1278, 1604, 90, 'Joseph'),
(1279, 1605, 90, 'Joseph\'s Wife'),
(1280, 1606, 90, 'Dr. Bowman'),
(1281, 1607, 90, 'Samson'),
(1282, 1608, 90, 'Samson'),
(1283, 1609, 90, 'Young Boy Surveyor'),
(1284, 1610, 90, 'Tonto Woman'),
(1285, 1611, 90, 'Tonto Boy - Second Sentry'),
(1286, 1612, 90, 'Papago Scout'),
(1287, 1613, 90, 'Gaunt Scalp-Hunter'),
(1288, 1614, 90, 'Cautious Tonto Boy'),
(1289, 1615, 90, 'Wagon Driver'),
(1290, 1616, 90, 'Young Farmer'),
(1291, 1617, 90, 'Tall Boy'),
(1292, 1618, 90, 'Yuan'),
(1293, 1619, 90, 'Ralston'),
(1294, 1620, 90, 'Young Coyotera Woman'),
(1295, 1621, 90, 'Buckhout'),
(1296, 1622, 90, 'Boy With Horses'),
(1297, 1623, 90, 'Evie Kittredge'),
(1298, 1624, 90, 'Martha Kittredge'),
(1299, 1625, 90, 'Mrs. Riordan'),
(1300, 1626, 90, 'Virgil'),
(1301, 1627, 90, 'Private Epps'),
(1302, 1628, 90, 'Private Eklund'),
(1303, 1629, 90, 'Surgeon Vreeland'),
(1304, 1630, 90, 'Thickset Volunteer'),
(1305, 1631, 90, 'Proprietress'),
(1306, 1632, 90, 'Clerk'),
(1307, 1633, 90, 'Foreman'),
(1308, 1634, 90, 'Gambler'),
(1309, 1635, 90, 'Apache At Post'),
(1310, 1636, 90, 'Apache Boy'),
(1311, 1637, 90, 'Guard'),
(1312, 1638, 90, 'Translator'),
(1313, 1639, 90, 'Ft Gallant Infantry'),
(1314, 1640, 90, 'Ft Gallant Cavalry'),
(1315, 1641, 90, 'Pawnee Brave #1'),
(1316, 1642, 90, 'Pawnee Brave #2'),
(1317, 1643, 90, 'Tall Rider'),
(1318, 1644, 90, 'Migrant Camp Worker'),
(1319, 1645, 91, 'Mike McKenna'),
(1320, 1646, 91, 'Roxanne Hall'),
(1321, 1647, 91, 'Tom Brennan'),
(1322, 1648, 91, 'Nick Faraday'),
(1323, 1649, 91, 'Frank Preiffer'),
(1324, 1650, 91, 'Juliet Quinn'),
(1325, 1651, 91, 'Athena Kim'),
(1326, 1652, 91, 'Foreman'),
(1327, 1653, 91, 'Cameron Foster'),
(1328, 1654, 91, 'Lorraine McKenna'),
(1329, 1655, 91, 'Nicole'),
(1330, 1656, 91, 'Bobby Breslin'),
(1331, 1657, 91, 'Johnny Healy'),
(1332, 1658, 91, 'Billy Lewis'),
(1333, 1659, 91, 'Gary'),
(1334, 1660, 91, 'Suspicious Man'),
(1335, 1661, 91, 'Rollerskater'),
(1336, 1662, 91, 'Mo'),
(1337, 1663, 91, 'Union Mechanic'),
(1338, 1664, 91, 'CIA Operative'),
(1339, 1665, 91, 'Stephanie'),
(1340, 1666, 91, 'Sam'),
(1341, 1667, 91, 'Agent Martin'),
(1342, 1668, 91, 'Agent Glover'),
(1343, 1669, 91, 'Airport Ground Staff'),
(1344, 1670, 91, 'Head Bartender'),
(1345, 1671, 91, 'Girl on Bus'),
(1346, 1672, 91, 'Derek Mitchell'),
(1347, 1673, 91, 'Union Construction Worker'),
(1348, 1674, 91, 'Office Worker'),
(1349, 1675, 91, 'Agent Cheung'),
(1350, 1676, 91, 'Member of the Public'),
(1351, 1677, 91, 'Pub Punter'),
(1352, 1678, 91, 'Wedding Guest'),
(1353, 1679, 91, 'Maitre dâ€™'),
(1354, 1680, 91, 'Agent Sanson'),
(1355, 1681, 91, 'Pub Guest'),
(1356, 1682, 91, 'Passerby'),
(1357, 1683, 91, 'NJ Construction Worker'),
(1358, 1684, 91, 'Assistant Stage Manager'),
(1359, 1685, 91, 'Passerby'),
(1360, 1686, 91, 'Runway Marshall'),
(1361, 1687, 91, 'Union Worker'),
(1362, 1688, 91, ''),
(1363, 1689, 91, 'Union Construction Worker'),
(1364, 1690, 91, 'Union Construction Worker'),
(1365, 1691, 91, 'American News Presenter'),
(1366, 1692, 91, 'Unison Worker'),
(1367, 1693, 91, 'Electrician'),
(1368, 1694, 91, 'Suspicious Man'),
(1369, 1695, 91, 'Party Guest'),
(1370, 1696, 91, 'Union Worker'),
(1371, 1697, 91, 'Girl'),
(1372, 1698, 91, 'Delivery Driver'),
(1373, 1699, 91, 'Quin\'s bodyguard'),
(1374, 1700, 91, 'Boxer'),
(1375, 1701, 91, 'Tourist'),
(1376, 1702, 91, 'Union Workman'),
(1377, 1703, 91, 'Pedestrian'),
(1378, 1704, 91, 'Passerby'),
(1379, 1705, 91, 'Commuter'),
(1380, 1706, 91, 'Woman in the Square'),
(1381, 1707, 91, 'Spy'),
(1382, 1708, 91, 'Union Robot Operator'),
(1383, 1709, 91, 'Theater Audience'),
(1384, 1710, 91, 'Agent'),
(1385, 1711, 92, 'Benj Nielsen'),
(1386, 1712, 92, 'Eddie'),
(1387, 1713, 92, 'Connor'),
(1388, 1714, 92, 'Bailey'),
(1389, 1715, 92, 'Danah \'Koosh\' Koushani'),
(1390, 1716, 92, 'Katrina Aurienna'),
(1391, 1717, 92, 'Alyssa Nielsen'),
(1392, 1718, 92, 'Dennis'),
(1393, 1719, 92, 'Ruby'),
(1394, 1720, 92, 'Principal Hutchens'),
(1395, 1721, 92, 'Gabrielle'),
(1396, 1722, 92, 'Kayvon Koushani'),
(1397, 1723, 92, 'Ms. Nielsen'),
(1398, 1724, 92, 'Mr. Studebaker'),
(1399, 1725, 92, 'Upperclassman 2'),
(1400, 1726, 92, 'Upperclassman 1'),
(1401, 1727, 92, 'Shaved Head'),
(1402, 1728, 92, 'Dreadlocks'),
(1403, 1729, 92, 'Knucklehead 1'),
(1404, 1730, 92, 'Knucklehead 2'),
(1405, 1731, 92, 'Eddie\'s Mom'),
(1406, 1732, 92, 'Aaron The Student'),
(1407, 1733, 92, 'Jessica'),
(1408, 1734, 92, 'Cool Jeff'),
(1409, 1735, 92, 'Friend #1'),
(1410, 1736, 92, 'Friend #2'),
(1411, 1737, 92, 'Guy In Common Area'),
(1412, 1738, 92, 'Lover #1'),
(1413, 1739, 92, 'Lover #2'),
(1414, 1740, 92, 'Nicole'),
(1415, 1741, 92, 'Random Partier'),
(1416, 1742, 92, 'Trendy Girl'),
(1417, 1743, 92, 'Officer'),
(1418, 1744, 92, 'Awkward Sophomore'),
(1419, 1745, 92, 'Kissing Girl'),
(1420, 1746, 93, 'Kate'),
(1421, 1747, 93, 'Tyler'),
(1422, 1748, 93, 'Javi'),
(1423, 1749, 93, 'Boone'),
(1424, 1750, 93, 'Cathy'),
(1425, 1751, 93, 'Ben'),
(1426, 1752, 93, 'Lily'),
(1427, 1753, 93, 'Jeb'),
(1428, 1384, 93, 'Addy'),
(1429, 1754, 93, 'Praveen'),
(1430, 1755, 93, 'Scott'),
(1431, 1756, 93, 'Dexter'),
(1432, 1757, 93, 'Dani'),
(1433, 1758, 93, 'Riggs'),
(1434, 1759, 93, 'Airport Traffic Police'),
(1435, 1760, 93, 'Debra'),
(1436, 1761, 93, 'Manny'),
(1437, 1762, 93, 'Mike'),
(1438, 1763, 93, 'Andy'),
(1439, 1764, 93, 'Mother'),
(1440, 1765, 93, 'Toddler Girl'),
(1441, 1766, 93, 'Desk Clerk'),
(1442, 1767, 93, 'Cody'),
(1443, 1768, 93, 'Kayleigh'),
(1444, 1769, 93, 'Rodeo Security'),
(1445, 1770, 93, 'Crystal Springs Reporter'),
(1446, 1771, 93, 'OKC Meteorologist'),
(1447, 1772, 93, 'OKC Meteorologist'),
(1448, 1773, 93, 'Local Crystal Springs Woman'),
(1449, 1774, 93, 'El Reno Cop'),
(1450, 1775, 93, 'Trailer Salesperson'),
(1451, 1776, 93, 'Storm Survivor'),
(1452, 1777, 93, 'Storm Survivor'),
(1453, 1778, 93, 'NYC Cab Driver'),
(1454, 1779, 93, 'NWS Weather Guide'),
(1455, 1780, 93, 'Tessa Elaine'),
(1456, 1781, 93, 'The \'Whoa\' Kid'),
(1457, 1782, 93, 'Derek'),
(1458, 1783, 93, 'Medford Motel Musician'),
(1459, 1784, 93, 'Medford Motel Musician'),
(1460, 1785, 93, 'Medford Motel Musician'),
(1461, 1786, 93, 'Tulsa Meteorologist'),
(1462, 1787, 93, 'Crystal Springs Police Officer'),
(1463, 1788, 93, 'Rodeo Announcer'),
(1464, 1789, 93, 'Arena Announcer'),
(1465, 1790, 93, 'Cowboy (uncredited)'),
(1484, 1809, 95, 'Rita / Liz / Emily'),
(1485, 1810, 95, 'Robert / Daniel / Andrew'),
(1486, 1499, 95, 'Raymond / George / Omi'),
(1487, 1811, 95, 'Vivian / Martha / Ruth / Rebecca'),
(1488, 1812, 95, 'Sarah / Sharon / Aka'),
(1489, 1813, 95, 'Will / Neil / Morgue Nurse'),
(1490, 1814, 95, 'Collectibles Appraiser / Passenger / Joseph'),
(1491, 1815, 95, 'Anna'),
(1492, 1816, 95, 'R.M.F.'),
(1493, 1817, 95, 'Paramedic'),
(1494, 1818, 95, 'Louise'),
(1495, 1819, 95, 'Cheval Barman'),
(1496, 1820, 95, 'Collectibles Appraiser 2'),
(1497, 1821, 95, 'Mr. Smith\'s Secretary'),
(1498, 1822, 95, 'Police Chief'),
(1499, 1823, 95, 'Female Police Officer'),
(1500, 1824, 95, 'Male Speaker'),
(1501, 1825, 95, 'Jonathan'),
(1502, 1826, 95, 'Bank Teller'),
(1503, 1827, 95, 'Young Woman Driver'),
(1504, 1828, 95, 'Gynaecologist'),
(1505, 1829, 95, 'Anna\'s Father'),
(1506, 1830, 95, 'Lakehouse Person'),
(1507, 1831, 95, 'Emily\'s Daughter'),
(1508, 1832, 95, 'Jack'),
(1509, 1833, 95, 'Susan'),
(1510, 1834, 95, 'Mr. Weber'),
(1511, 1835, 95, 'Rachel (uncredited)'),
(1512, 1836, 95, 'Banquet Guest #06 (uncredited)'),
(1513, 1837, 95, 'Clemi (uncredited)'),
(1514, 1838, 95, 'Ceremony Attendee (uncredited)'),
(1515, 1839, 96, 'Furiosa'),
(1516, 1450, 96, 'Dementus'),
(1517, 1840, 96, 'Praetorian Jack'),
(1518, 1802, 96, 'Young Furiosa'),
(1519, 1841, 96, 'The History Man'),
(1520, 1842, 96, 'Immortan Joe / Rizzdale Pell'),
(1521, 1843, 96, 'The People Eater'),
(1522, 1844, 96, 'Organic Mechanic'),
(1523, 1845, 96, 'Mary Jabassa'),
(1524, 1846, 96, 'Vuvalini General / Mr Norton'),
(1525, 1847, 96, 'Rictus Erectus'),
(1526, 1848, 96, 'Scrotus'),
(1527, 1849, 96, 'Toe Jam'),
(1528, 1850, 96, 'Vulture'),
(1529, 1851, 96, 'Smeg'),
(1530, 1852, 96, 'The Octoboss'),
(1531, 1853, 96, 'Big Jilly'),
(1532, 1854, 96, 'Fang'),
(1533, 1855, 96, 'Mr Harley'),
(1534, 1856, 96, 'Mr Davidson'),
(1535, 1857, 96, 'Squint'),
(1536, 1858, 96, 'Black Thumb'),
(1537, 1859, 96, 'Hungry Eyes'),
(1538, 1860, 96, 'Snapper'),
(1539, 1861, 96, 'Sad Eyes'),
(1540, 1862, 96, 'War Pup'),
(1541, 1863, 96, 'Guardian of Gastown'),
(1542, 1864, 96, 'Lone War Boy'),
(1543, 1865, 96, 'The Bullet Farmer'),
(1544, 1866, 96, 'Little Valkyrie'),
(1545, 1867, 96, 'The Cycling Man'),
(1546, 1868, 96, 'Vuvalini'),
(1547, 1869, 96, 'Vuvalini'),
(1548, 1870, 96, 'Savage'),
(1549, 1871, 96, 'Corpse Minder'),
(1550, 1872, 96, 'The Prime Imperator'),
(1551, 1873, 96, 'Shotgun Praetorian'),
(1552, 1874, 96, 'First Pick War Boy'),
(1553, 1875, 96, 'Chosen War Boy'),
(1554, 1876, 96, 'Gastown Gate Watchman'),
(1555, 1877, 96, 'Gastown Gate Opener'),
(1556, 1878, 96, 'Gastown Gate Opener'),
(1557, 1879, 96, 'Gastown Rider'),
(1558, 1880, 96, 'Winchman'),
(1559, 1881, 96, 'Watch Tower Praetorian Guard'),
(1560, 1882, 96, 'Watch Tower Praetorian Guard'),
(1561, 1883, 96, 'Watch Tower Praetorian Guard'),
(1562, 1884, 96, 'Watch Tower Praetorian Guard'),
(1563, 1885, 96, 'Praetorian Pup'),
(1564, 1886, 96, 'Pregnant Wife'),
(1565, 1887, 96, 'Immortan\'s Harem'),
(1566, 1888, 96, 'Immortan\'s Harem'),
(1567, 1889, 96, 'The Dogman / Mad Max'),
(1568, 1890, 96, 'Brake Man'),
(1569, 1891, 96, 'Chumbucket'),
(1570, 1892, 96, 'High Master Black Thumb'),
(1571, 1893, 96, 'Pissboy'),
(1572, 1894, 96, 'Wretched Man Recruit'),
(1573, 1895, 96, 'Welder Recruit'),
(1574, 1896, 96, 'Rakka The Brackish'),
(1575, 1897, 96, 'Ace Warboy'),
(1576, 1898, 96, 'Lookout Warboy'),
(1577, 1899, 96, 'Witness Warboy'),
(1578, 1900, 96, 'Bommyknocker Warboy'),
(1579, 1901, 96, 'Bullet Farm Senior War Boy'),
(1580, 1902, 96, 'Hazz The Valiant'),
(1581, 1903, 96, 'Valiant Lancer'),
(1582, 1904, 96, 'The Echo Man'),
(1583, 1905, 96, 'Dementus Biker (uncredited)'),
(1584, 1906, 96, 'War Boy (uncredited)'),
(1585, 1907, 96, 'Treadmill Rat (uncredited)'),
(1586, 1908, 96, 'The Wretched (uncredited)'),
(1587, 1909, 96, 'Vuvalini (uncredited)'),
(1588, 1910, 96, 'Treadmill Rat (uncredited)'),
(1589, 1911, 96, 'Gas Towner (uncredited)'),
(1590, 1912, 96, 'Biker (uncredited)'),
(1591, 1913, 96, 'Corpse Minder (uncredited)'),
(1614, 1925, 99, 'Peter Quill'),
(1615, 1926, 99, 'Gamora'),
(1616, 1927, 99, 'Drax'),
(1617, 1928, 99, 'Groot (voice)'),
(1618, 1929, 99, 'Rocket (voice)'),
(1619, 1930, 99, 'Ronan'),
(1620, 1558, 99, 'Yondu Udonta'),
(1621, 1931, 99, 'Nebula'),
(1622, 1932, 99, 'Korath'),
(1623, 1933, 99, 'Corpsman Dey'),
(1624, 1934, 99, 'Nova Prime'),
(1625, 1935, 99, 'The Collector'),
(1626, 1936, 99, 'Meredith Quill'),
(1627, 1937, 99, 'Kraglin / On Set Rocket'),
(1628, 1938, 99, 'Denarian Saal'),
(1629, 1939, 99, 'The Broker'),
(1630, 1940, 99, 'On Set Groot'),
(1631, 1941, 99, 'Young Quill'),
(1632, 1942, 99, 'Grandpa'),
(1633, 1943, 99, 'Meredith\'s Mother'),
(1634, 1944, 99, 'Meredith\'s Brother'),
(1635, 1945, 99, 'Meredith\'s Best Friend'),
(1636, 1946, 99, 'Dr. Fitzgibbon'),
(1637, 1947, 99, 'Bereet'),
(1638, 1948, 99, 'Horuz'),
(1639, 1949, 99, 'Horuz\' Mate'),
(1640, 1950, 99, 'Sacrificed Nova Corpsman'),
(1641, 1951, 99, 'Pretty Xandarian'),
(1642, 1952, 99, 'Nova Arresting Pilot'),
(1643, 1953, 99, 'Corpsman Dey\'s Partner'),
(1644, 1954, 99, 'Kree Ambassador'),
(1645, 1955, 99, 'Nova Prime\'s Assistant'),
(1646, 1956, 99, 'Head Riot Guard'),
(1647, 1957, 99, 'Angry Guard'),
(1648, 1958, 99, 'Mean Guard'),
(1649, 1959, 99, 'Sad Woman with Horns'),
(1650, 1960, 99, 'Moloka Dar'),
(1651, 1446, 99, 'Monstrous Inmate'),
(1652, 1961, 99, 'Mottled Prisoner'),
(1653, 1962, 99, 'Burly Prisoner'),
(1654, 1963, 99, 'The Other'),
(1655, 1964, 99, 'Watchtower Guard'),
(1656, 1965, 99, 'One Legged Prisoner'),
(1657, 1966, 99, 'Rifle Guard'),
(1658, 1967, 99, '\'Drop the Leg\' Guard'),
(1659, 1968, 99, 'Carina'),
(1660, 1969, 99, 'Tortured Pink Girl'),
(1661, 1970, 99, 'Pit Boss'),
(1662, 1971, 99, 'Lady of the Boot of Jemiah'),
(1663, 1972, 99, 'Lady of the Boot of Jemiah'),
(1664, 1973, 99, 'Lady of the Boot of Jemiah'),
(1665, 1974, 99, 'Lady of the Boot of Jemiah'),
(1666, 1975, 99, 'Lady of the Boot of Jemiah'),
(1667, 1976, 99, 'Knowhere Dispatcher'),
(1668, 1977, 99, 'Sad Krylorian Girl'),
(1669, 1978, 99, 'One-Eyed Ravager'),
(1670, 1979, 99, 'Ravager Pilot'),
(1671, 1980, 99, 'Nova Centurion'),
(1672, 1981, 99, 'Nova Starblaster Pilot'),
(1673, 1982, 99, 'Alien Nova Pilot'),
(1674, 1983, 99, 'Maskless Sakaaran'),
(1675, 1984, 99, 'Corpsman Dey\'s Wife'),
(1676, 1985, 99, 'Corpsman Dey\'s Daughter'),
(1677, 1986, 99, 'Corpsman Dey\'s Daughter'),
(1678, 1987, 99, 'Crying Xandarian Citizen'),
(1679, 1988, 99, 'Thanos (uncredited)'),
(1680, 1989, 99, 'Howard the Duck (voice) (uncredited)'),
(1681, 1990, 99, 'Kyln Prisoner (uncredited)'),
(1682, 1991, 99, 'Xandar Resident (uncredited)'),
(1893, 2078, 108, 'Heather Donahue'),
(1894, 2079, 108, 'Joshua Leonard'),
(1895, 2080, 108, 'Michael Williams'),
(1896, 2081, 108, 'Short Fisherman'),
(1897, 2082, 108, 'Interviewee (uncredited)'),
(1898, 2083, 108, 'Waitress'),
(1899, 2084, 108, 'Fisherman With Glasses (uncredited)'),
(1900, 2085, 108, 'Mary Brown'),
(1901, 2086, 108, 'Man in Yellow Hat (uncredited)'),
(1902, 2087, 108, 'Interviewee with Child (uncredited)'),
(1903, 2088, 109, 'Twilight Sparkle (voice)'),
(1904, 2089, 109, 'Applejack / Rainbow Dash (voice)'),
(1905, 2090, 109, 'Pinkie Pie / Fluttershy (voice)'),
(1906, 2091, 109, 'Rarity / Princess Luna / Granny Smith / Derpy Hooves (voice)'),
(1907, 2092, 109, 'Spike (voice)'),
(1908, 2093, 109, 'Tempest Shadow / Fizzlepop Berrytwist (voice)'),
(1909, 2094, 109, 'Grubber (voice)'),
(1910, 2095, 109, 'The Storm King (voice)'),
(1911, 2096, 109, 'Capper (voice)'),
(1912, 1926, 109, 'Captain Celaeno (voice)'),
(1913, 2097, 109, 'Princess Skystar (voice)'),
(1914, 2098, 109, 'Queen Novo (voice)'),
(1915, 2099, 109, 'Songbird Serenade (voice)'),
(1916, 2100, 109, 'Twilight Sparkle (singing voice)'),
(1917, 2101, 109, 'Pinkie Pie (singing voice)'),
(1918, 2102, 109, 'Rarity (singing voice)'),
(1919, 2103, 109, 'First Mate Mullet (voice)'),
(1920, 2104, 109, 'Boyle (voice)'),
(1921, 2105, 109, 'Code Red (voice)'),
(1922, 2106, 109, 'Princess Celestia / Lix Spittle (voice)'),
(1923, 2107, 109, 'Princess Cadance (voice)'),
(1924, 2108, 109, 'Verko (voice)'),
(1925, 2109, 109, 'Big McIntosh (voice)'),
(1926, 2110, 109, 'Apple Bloom (voice)'),
(1927, 2111, 109, 'Bulk Biceps (voice)'),
(1928, 2112, 109, 'Party Favor (voice)'),
(2049, 2113, 112, 'Protagonist'),
(2050, 2114, 112, 'Neil'),
(2051, 2115, 112, 'Kat'),
(2052, 2116, 112, 'Sator'),
(2053, 2117, 112, 'Priya'),
(2054, 2118, 112, 'Crosby'),
(2055, 2119, 112, 'Fay'),
(2056, 2120, 112, 'Wheeler'),
(2057, 2121, 112, 'Volkov'),
(2058, 2122, 112, 'Mahir'),
(2059, 2123, 112, 'Barbara'),
(2060, 2124, 112, 'Ives'),
(2061, 2125, 112, 'Max'),
(2062, 2126, 112, 'Rohan'),
(2063, 2127, 112, 'Passenger'),
(2064, 2128, 112, 'Well-dressed Man'),
(2065, 2129, 112, 'Uniformed Official'),
(2066, 2130, 112, 'Driver'),
(2067, 2131, 112, 'SWAT / Target'),
(2068, 2132, 112, 'SWAT 2'),
(2069, 2133, 112, 'SWAT 3'),
(2070, 2134, 112, 'Ukrainian SWAT'),
(2071, 2135, 112, 'Male Voice (voice)'),
(2072, 2136, 112, 'Sanjay'),
(2073, 2137, 112, 'Steward'),
(2074, 2138, 112, 'Shipley\'s Representive'),
(2075, 2139, 112, 'Gaunt Russian'),
(2076, 2140, 112, 'Nanny'),
(2077, 2141, 112, 'Klaus'),
(2078, 2142, 112, 'Young Sator'),
(2079, 2143, 112, 'Blue Co-Pilot'),
(2080, 2144, 112, 'Police Operator'),
(2081, 2145, 112, 'Police Supervisor'),
(2082, 2146, 112, 'Policeman Passenger'),
(2083, 2147, 112, 'Medic'),
(2084, 2148, 112, 'Red Soldier 1'),
(2085, 2149, 112, 'Red Soldier 2'),
(2086, 2150, 112, 'Junior Crew Member'),
(2087, 2151, 112, 'Blue Team Soldier'),
(2088, 2152, 112, 'Toby (uncredited)'),
(2089, 2153, 112, 'Tourist in Oslo (uncredited)'),
(2090, 2154, 112, 'Usher (uncredited)'),
(2091, 2155, 112, 'SWAT (uncredited)'),
(2092, 2156, 112, 'SWAT (uncredited)'),
(2093, 2157, 112, 'Usher (uncredited)'),
(2094, 2158, 112, 'Tourist in Oslo (uncredited)'),
(2095, 2159, 112, 'Russian Soldier (uncredited)'),
(2096, 2160, 112, 'Flight Attendant Anne (uncredited)'),
(2097, 2161, 112, 'Art Gallery Employee (uncredited)'),
(2098, 2162, 112, 'High Security Guard (uncredited)'),
(2099, 2163, 112, 'Military Officer (uncredited)'),
(2100, 2164, 112, 'Pedestrian (uncredited)'),
(2101, 2165, 112, 'Soldier (uncredited)'),
(2102, 2166, 112, 'Soldier (uncredited)'),
(2103, 2167, 112, 'Soldier (uncredited)'),
(2104, 2168, 112, 'Soldier (uncredited)'),
(2105, 2169, 112, 'Coat Check Girl (uncredited)'),
(2106, 2170, 112, 'Audience Member (uncredited)'),
(2107, 2171, 112, 'Audience Member (uncredited)'),
(2108, 2172, 112, 'Hostage (uncredited)'),
(2195, 2173, 115, 'Andrew'),
(2196, 1647, 115, 'Fletcher'),
(2197, 2174, 115, 'Jim'),
(2198, 2175, 115, 'Nicole'),
(2199, 2176, 115, 'Ryan'),
(2200, 2177, 115, 'Carl'),
(2201, 2178, 115, 'Uncle Frank'),
(2202, 2179, 115, 'Mr. Kramer'),
(2203, 2180, 115, 'Aunt Emma'),
(2204, 2181, 115, 'Dorm Neighbor'),
(2205, 2182, 115, 'Dustin'),
(2206, 2183, 115, 'Travis'),
(2207, 2184, 115, 'Bassist (Nassau)'),
(2208, 2185, 115, 'Assistant - Sophie'),
(2209, 2186, 115, 'Metz'),
(2210, 2187, 115, 'Pianist (Studio Band)'),
(2211, 2188, 115, 'Saxophonist #2 (Studio Band)'),
(2212, 2189, 115, 'Trumpeter #1 (Studio Band)'),
(2213, 2190, 115, 'Trumpeter #2 (Studio Band)'),
(2214, 2191, 115, 'Saxophonist (Studio Band)'),
(2215, 2192, 115, 'Technician (Overbrook) - Mike'),
(2216, 2193, 115, 'Stage Hand (Overbrook)'),
(2217, 2194, 115, 'Passerby (Bus Station)'),
(2218, 2195, 115, 'Truck Driver'),
(2219, 2196, 115, 'Passerby (Dunellen)'),
(2220, 2197, 115, 'Rachel Bornholdt'),
(2221, 2198, 115, 'Drummer (Quartet)'),
(2222, 2199, 115, 'Bassist (JVC)'),
(2223, 2200, 115, 'Stage Hand (Carnegie Hall)'),
(2224, 2201, 115, 'Red Henderson'),
(2225, 2202, 115, 'Andrew (8 years old)'),
(2226, 2203, 115, 'Nassau Trumpeter #2'),
(2227, 2204, 115, 'Studio Core Member #1'),
(2228, 2205, 115, 'Studio Core Member #2'),
(2229, 2206, 115, 'Studio Core Member #3'),
(2230, 2207, 115, 'Studio Core Member #4'),
(2231, 2208, 115, 'Student #1'),
(2232, 2209, 115, 'Student #2'),
(2233, 2210, 115, 'JVC Guitarist (uncredited)'),
(2234, 2211, 115, 'Music Competition Judge (uncredited)'),
(2235, 2212, 115, 'Audience Member (uncredited)'),
(2236, 2213, 115, 'Bartender (uncredited)'),
(2237, 2214, 115, 'Audience Member (uncredited)');

-- --------------------------------------------------------

--
-- Table structure for table `movie_data`
--

CREATE TABLE `movie_data` (
  `movie_id` int(11) NOT NULL,
  `imdb_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `length_minutes` varchar(255) NOT NULL,
  `release_date` date NOT NULL DEFAULT current_timestamp(),
  `trailer_link` varchar(255) DEFAULT NULL,
  `is_adult_movie` bit(1) NOT NULL,
  `minimum_price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movie_data`
--

INSERT INTO `movie_data` (`movie_id`, `imdb_id`, `title`, `description`, `image_path`, `rating`, `length_minutes`, `release_date`, `trailer_link`, `is_adult_movie`, `minimum_price`) VALUES
(83, 'tt18412256', 'Alien: Romulus', 'Tijdens het verkennen van een verlaten ruimtestation komt een groep jonge ruimtekolonisten oog in oog te staan met de meest angstaanjagende levensvorm in het universum.', 'assets/img/movies/tt18412256.jpg', '7.1', '119', '2024-08-13', 'https://www.youtube.com/watch?v=A8CMggxPlcc', b'0', '9.00'),
(84, 'tt23468450', 'Longlegs', 'Tijdens de jacht op een seriemoordenaar ontdekt een FBI-agent een aantal occulte aanwijzingen die ze moet oplossen om een eind te maken aan een ijzingwekkende reeks moordpartijen.', 'assets/img/movies/tt23468450.jpg', '6.7', '101', '2024-07-10', 'https://www.youtube.com/watch?v=6hlDgMrYUmc', b'0', '9.00'),
(85, 'tt6263850', 'Deadpool & Wolverine', 'Leden van de bureaucratische organisatie, de \'Time Variance Authority\', weten de verblijfplaats van Wade Wilson te traceren en brengen hem vervolgens een bezoek. Daarbij doen ze een beroep op Wade, waarmee hij zich onder de helden binnen het universum kan scharen. Het lot van de Marvel Cinematic Universe wordt daarmee in handen van de onverantwoordelijke Deadpool gelegd.', 'assets/img/movies/tt6263850.jpg', '7.7', '128', '2024-07-24', 'https://www.youtube.com/watch?v=65oqnYN6as8', b'0', '9.00'),
(86, 'tt14858658', 'Blink Twice', 'Als techmiljardair Slater King cocktailserveerster Frida ontmoet tijdens zijn fundraiser, klikt het enorm goed. Hij nodigt haar uit om met hem en zijn vrienden mee te gaan op een droomvakantie naar zijn paradijselijke privÃ©-eiland. Daar wisselen wilde nachten en zonovergoten dagen elkaar af en vermaakt iedereen zich uitstekend. Niemand wil dat er een eind aan komt. Maar als er dan vreemde dingen gebeuren, slaat bij Frida de twijfel toe. Er is iets mis met het eiland en als ze het levend wil verlaten, zal ze de waarheid moeten achterhalen.', 'assets/img/movies/tt14858658.jpg', '6.8', '103', '2024-08-21', 'https://www.youtube.com/watch?v=JXGEYyVyB2k', b'0', '9.00'),
(87, 'tt1340094', 'The Crow', 'Soulmates Eric Draven en Shelly Webster worden op brute wijze vermoord doordat de demonen uit haar duistere verleden hen inhalen. Als Eric de kans krijgt om zijn ware liefde te wreken door zichzelf op te offeren, gaat hij op zoek naar hun moordenaars. Hierbij zal hij de werelden van de levenden en de doden moeten doorkruisen om wraak te nemen.', 'assets/img/movies/tt1340094.jpg', '5.3', '113', '2024-08-21', 'https://www.youtube.com/watch?v=cT4CCK3lxiI', b'0', '9.00'),
(88, 'tt2049403', 'Beetlejuice Beetlejuice', 'Zesendertig jaar na de gebeurtenissen in de eerste film keert de familie Deetz terug naar Winter River na de onverwachte dood van Charles Deetz. Lydia\'s leven staat op zijn kop als haar rebelse tienerdochter Astrid het mysterieuze model van de stad op zolder ontdekt en het portaal naar het hiernamaals per ongeluk wordt geopend, waardoor Betelgeuze vrijkomt.', 'assets/img/movies/tt2049403.jpg', '7.2', '105', '2024-09-04', 'https://www.youtube.com/watch?v=6b7-49Y23vg', b'0', '9.00'),
(89, 'tt10655524', 'It Ends with Us', 'Lily Bloom is een vrouw die na een traumatische jeugd opnieuw wil beginnen in Boston, waar ze hoopt haar droom van een eigen bloemenzaak waar te maken. Bij toeval ontmoet ze de charmante neurochirurg Ryle Kincaid met wie ze meteen een klik heeft. Ze vallen als een blok voor elkaar, maar na een tijdje krijgt Lily een kant van Ryle te zien die haar aan de relatie van haar ouders doet denken. Als Lilyâ€™s eerste grote liefde Atlas Corrigan ineens weer opduikt in haar leven, komt haar relatie met Ryle onder grote druk te staan. Lily beseft dat ze moet leren vertrouwen op haar eigen kracht om een onmogelijke keuze te maken die bepalend is voor haar toekomst.', 'assets/img/movies/tt10655524.jpg', '6.7', '131', '2024-08-07', 'https://www.youtube.com/watch?v=sqJKomzE1bo', b'0', '9.00'),
(90, 'tt17505010', 'Horizon: An American Saga - Chapter 1', 'Ontdek de aantrekkingskracht van het Oude Westen en hoe het werd gewonnen (en verloren) door het bloed, zweet en tranen van velen. Tijdens de vier jaar van de burgeroorlog, van 1861 tot 1865, begin je aan een emotionele reis door een land dat in oorlog is met zichzelf, ervaren door de lens van families, vrienden en vijanden die allemaal proberen te ontdekken wat het werkelijk betekent om de Verenigde Staten te zijn van Amerika.', 'assets/img/movies/tt17505010.jpg', '6.9', '181', '2024-06-26', 'https://www.youtube.com/watch?v=rLaYzHhHdok', b'0', '9.00'),
(91, 'tt12610390', 'The Union', 'Een bouwvakker uit New Jersey wordt een spion in opleiding wanneer zijn vroegere vriendin hem rekruteert voor een geheime missie.', 'assets/img/movies/tt12610390.jpg', '6.3', '109', '2024-08-15', 'https://www.youtube.com/watch?v=vea9SdnRMyg', b'0', '9.00'),
(92, 'tt21284218', 'Incoming', 'Hun eerste week op de middelbare school. Het grootste feest van het jaar. Tijdens een chaotische, losbandige nacht maken vier tienerjongens verkeerde keuzes.', 'assets/img/movies/tt21284218.jpg', '6.1', '92', '2024-08-22', 'https://www.youtube.com/watch?v=E_Vc11HVEYo', b'0', '9.00'),
(93, 'tt12584954', 'Twisters', 'Naarmate het stormseizoen intensiever wordt, botsen de paden van voormalig stormjager Kate Carter en roekeloze superster Tyler Owens op sociale media wanneer angstaanjagende verschijnselen worden ontketend die nog nooit eerder zijn gezien. Het paar en hun concurrerende teams bevinden zich op het pad van meerdere stormsystemen die samenkomen boven het centrum van Oklahoma in het gevecht van hun leven.', 'assets/img/movies/tt12584954.jpg', '7.0', '123', '2024-07-10', 'https://www.youtube.com/watch?v=5fuQUrEW8oc', b'0', '9.00'),
(95, 'tt22408160', 'Kinds of Kindness', 'Een drieluik fabel over een man zonder keuze die zijn eigen leven in handen probeert te nemen; een politieagent die gealarmeerd is dat zijn vrouw, die vermist was op zee, is teruggekeerd en een ander persoon lijkt; en een vrouw die vastbesloten is om een specifiek iemand te vinden met een speciale vaardigheid, die voorbestemd is om een wonderbaarlijke spirituele leider te worden.', 'assets/img/movies/tt22408160.jpg', '6.6', '164', '2024-05-30', 'https://www.youtube.com/watch?v=WR4nAs6UPAo', b'0', '9.00'),
(96, 'tt12037194', 'Furiosa: A Mad Max Saga', 'Na de ondergang van de wereld wordt de jonge Furiosa meegenomen uit de Green Place of Many Mothers en komt ze in handen van een grote motorbende aangevoerd door Warlord Dementus. Op hun tocht door de woestijn bereiken ze de Citadel, waar Immortan Joe de baas is. Terwijl de twee tirannen om de macht strijden, moet Furiosa vele beproevingen doorstaan en een manier vinden om terug te kunnen keren naar huis.', 'assets/img/movies/tt12037194.jpg', '7.6', '148', '2024-05-22', 'https://www.youtube.com/watch?v=LYV3001u574', b'0', '9.00'),
(99, 'tt2015381', 'Guardians of the Galaxy', 'In het heelal wordt onverbiddelijk jacht gemaakt op de onbezonnen avonturier Peter Quill, die een geheimzinnige bol heeft gestolen. Ronan, een machtige slechterik met plannen die het hele universum in gevaar dreigen te brengen, heeft zijn zinnen op de bol gezet.', 'assets/img/movies/tt2015381.jpg', '7.9', '121', '2014-07-30', 'https://www.youtube.com/watch?v=3CqymRQ1uUU', b'0', '9.00'),
(108, 'tt0185937', 'The Blair Witch Project', 'Drie filmstudenten reizen naar het Black Hills bos om een documentaire te maken over de legendarisch Blair-heks. Na een tijd rondgelopen raken Heather, Josh en Mike verdwaald, onderkoeld en opgejaagd. Uiteindelijk wordt er nooit meer iets van ze vernomen. Tot een jaar later hun filmmateriaal wordt gevonden...', 'assets/img/movies/tt0185937.jpg', '6.3', '86', '1999-07-14', 'https://www.youtube.com/watch?v=AcTh2YItSaM', b'0', '9.00'),
(109, 'tt4131800', 'My Little Pony: The Movie', 'Een nieuwe duistere kracht bedreigt Ponyville. De zes pony\'s Sparkle, Applejack, Rainbow Dash, Pinkie Pie, Fluttershy en Rarity gaan op een onvergetelijk reis voorbij Equestria. Daar ontmoeten ze nieuwe vrienden en staan ze voor spannende uitdagingen.', 'assets/img/movies/tt4131800.jpg', '7.2', '99', '2017-10-05', 'https://www.youtube.com/watch?v=kIv_ConaZ1c', b'0', '9.00'),
(112, 'tt6723592', 'Tenet', 'Gewapend met slechts Ã©Ã©n woord - Tenet - en vechtend voor het voortbestaan â€‹â€‹van de hele wereld, reist de hoofdrolspeler door een schemerige wereld van internationale spionage op een missie die zich in iets meer dan realtime zal ontvouwen.', 'assets/img/movies/tt6723592.jpg', '7.2', '150', '2020-08-22', 'https://www.youtube.com/watch?v=KJP5RunZUKk', b'1', '9.00'),
(115, 'tt2582802', 'Whiplash', 'Andrew is een veelbelovende 19-jarige drummer die studeert aan een berucht conservatorium in Manhattan. Hij wil echter niet zo maar een muzikant zijn. Achtervolgd door de mislukte carriÃ¨re van zijn vader, die schrijver was, en de angst dat het wel eens genetisch kan zijn, droomt hij ervan om de top te bereiken.', 'assets/img/movies/tt2582802.jpg', '8.4', '106', '2014-10-10', 'https://www.youtube.com/watch?v=Q7kZy3T6vRM', b'1', '11.00');

-- --------------------------------------------------------

--
-- Table structure for table `movie_director_link`
--

CREATE TABLE `movie_director_link` (
  `id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movie_director_link`
--

INSERT INTO `movie_director_link` (`id`, `director_id`, `movie_id`) VALUES
(42, 45, 83),
(43, 46, 84),
(44, 47, 85),
(45, 48, 86),
(46, 49, 87),
(47, 50, 88),
(48, 51, 89),
(49, 52, 90),
(50, 53, 91),
(51, 54, 92),
(52, 55, 92),
(53, 56, 93),
(55, 58, 95),
(56, 59, 96),
(59, 61, 99),
(64, 64, 108),
(65, 65, 108),
(66, 66, 109),
(69, 67, 112),
(72, 68, 115);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre_link`
--

CREATE TABLE `movie_genre_link` (
  `link_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movie_genre_link`
--

INSERT INTO `movie_genre_link` (`link_id`, `genre_id`, `movie_id`) VALUES
(46, 10800, 83),
(47, 10804, 83),
(48, 10794, 84),
(49, 10800, 84),
(50, 10806, 84),
(51, 10790, 85),
(52, 10793, 85),
(53, 10804, 85),
(54, 10802, 86),
(55, 10806, 86),
(56, 10798, 87),
(57, 10790, 87),
(58, 10806, 87),
(59, 10793, 88),
(60, 10800, 88),
(61, 10798, 88),
(62, 10803, 89),
(63, 10796, 89),
(64, 10808, 90),
(65, 10796, 90),
(66, 10790, 91),
(67, 10793, 91),
(68, 10793, 92),
(69, 10790, 93),
(70, 10791, 93),
(71, 10806, 93),
(77, 10796, 95),
(78, 10790, 96),
(79, 10791, 96),
(80, 10804, 96),
(83, 10790, 99),
(84, 10804, 99),
(85, 10791, 99),
(97, 10800, 108),
(98, 10802, 108),
(99, 10797, 109),
(100, 10792, 109),
(101, 10791, 109),
(102, 10798, 109),
(109, 10790, 112),
(110, 10806, 112),
(111, 10804, 112),
(116, 10796, 115),
(117, 10801, 115);

-- --------------------------------------------------------

--
-- Table structure for table `movie_kijkwijzer_link`
--

CREATE TABLE `movie_kijkwijzer_link` (
  `kijkwijzer_movie_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `kijkwijzer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movie_kijkwijzer_link`
--

INSERT INTO `movie_kijkwijzer_link` (`kijkwijzer_movie_id`, `movie_id`, `kijkwijzer_id`) VALUES
(31, 83, 90),
(32, 83, 94),
(33, 84, 84),
(34, 84, 90),
(35, 84, 96),
(36, 85, 80),
(37, 85, 83),
(38, 85, 94),
(39, 86, 92),
(40, 86, 96),
(41, 87, 88),
(42, 87, 80),
(43, 87, 96),
(44, 88, 83),
(45, 88, 90),
(46, 88, 88),
(47, 89, 93),
(48, 89, 86),
(49, 90, 98),
(50, 90, 86),
(51, 91, 80),
(52, 91, 83),
(53, 92, 83),
(54, 93, 80),
(55, 93, 81),
(56, 93, 96),
(62, 95, 86),
(63, 96, 80),
(64, 96, 81),
(65, 96, 94),
(68, 99, 80),
(69, 99, 94),
(70, 99, 81);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `news_content` varchar(4096) DEFAULT NULL,
  `published_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `image_url`, `news_content`, `published_at`) VALUES
(13, 'Lorem Ipsum', '66ebe7986e4e3-Bert-en-Ernie-Euro-Entertainment.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula laoreet odio dapibus porttitor. Donec vitae lectus nisi. Ut quis libero quis justo tempor aliquam. Fusce id ante in ligula egestas pulvinar eu a velit. Quisque lobortis dignissim fringilla. Duis malesuada tincidunt risus sed tincidunt. Nunc pharetra nisl id aliquam pellentesque. Sed ornare, lacus et lacinia tincidunt, erat dui gravida elit, in lacinia ex ipsum quis sem. Aliquam et ipsum vel enim pellentesque egestas ac vel dui. Duis nisl tellus, pulvinar a varius id, consequat vel tortor. Morbi vel neque at ex ullamcorper volutpat at sit amet nulla. Cras lorem purus, lobortis sit amet eros et, tempus convallis mi.', '2024-09-19 10:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `cms_access` bit(1) DEFAULT b'0',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `superuser` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `cms_access`, `username`, `password`, `last_login`, `superuser`) VALUES
(1, b'1', 'L^Z7Tusd@*VDGVs$R%RyJHiCGS5mfj#4', '$2y$10$MaWAF7aH01j5JhBM4BaAiuFQ11ORsQ4P7EJxgL2mx.iq4z64PoYm2', '2024-09-20 16:25:25', b'1'),
(40, b'1', 'test_account2', '$2y$10$.7NiE0q0aeHLKv.E5sSmUun6LTSLDtS9D9FIta/1ccYttvyv0JEK6', '2024-09-20 15:15:24', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `user_page_permission_link`
--

CREATE TABLE `user_page_permission_link` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_page_permission_link`
--

INSERT INTO `user_page_permission_link` (`id`, `page_id`, `user_id`) VALUES
(85, 2, 40),
(86, 3, 40),
(87, 4, 40),
(88, 6, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor_data`
--
ALTER TABLE `actor_data`
  ADD PRIMARY KEY (`actor_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `admin_header_pages_data`
--
ALTER TABLE `admin_header_pages_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sort` (`sort`);

--
-- Indexes for table `api_requests`
--
ALTER TABLE `api_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_timeouts`
--
ALTER TABLE `api_timeouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director_data`
--
ALTER TABLE `director_data`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `function_data`
--
ALTER TABLE `function_data`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `genre_data`
--
ALTER TABLE `genre_data`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `kijkwijzer_genre_link`
--
ALTER TABLE `kijkwijzer_genre_link`
  ADD PRIMARY KEY (`kijkwijzer_genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `location_data`
--
ALTER TABLE `location_data`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `function` (`function`);

--
-- Indexes for table `location_movie_data`
--
ALTER TABLE `location_movie_data`
  ADD PRIMARY KEY (`location_movie_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `location_tokens`
--
ALTER TABLE `location_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location_token` (`token`) USING BTREE,
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `movie_actor_link`
--
ALTER TABLE `movie_actor_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movie_data`
--
ALTER TABLE `movie_data`
  ADD PRIMARY KEY (`movie_id`),
  ADD UNIQUE KEY `imdb_id` (`imdb_id`);

--
-- Indexes for table `movie_director_link`
--
ALTER TABLE `movie_director_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movie_genre_link`
--
ALTER TABLE `movie_genre_link`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movie_kijkwijzer_link`
--
ALTER TABLE `movie_kijkwijzer_link`
  ADD PRIMARY KEY (`kijkwijzer_movie_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `kijkwijzer_id` (`kijkwijzer_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_page_permission_link`
--
ALTER TABLE `user_page_permission_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor_data`
--
ALTER TABLE `actor_data`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2215;

--
-- AUTO_INCREMENT for table `admin_header_pages_data`
--
ALTER TABLE `admin_header_pages_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `api_requests`
--
ALTER TABLE `api_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `api_timeouts`
--
ALTER TABLE `api_timeouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `director_data`
--
ALTER TABLE `director_data`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `function_data`
--
ALTER TABLE `function_data`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre_data`
--
ALTER TABLE `genre_data`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10829;

--
-- AUTO_INCREMENT for table `kijkwijzer_genre_link`
--
ALTER TABLE `kijkwijzer_genre_link`
  MODIFY `kijkwijzer_genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `location_data`
--
ALTER TABLE `location_data`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `location_movie_data`
--
ALTER TABLE `location_movie_data`
  MODIFY `location_movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `location_tokens`
--
ALTER TABLE `location_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `movie_actor_link`
--
ALTER TABLE `movie_actor_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2238;

--
-- AUTO_INCREMENT for table `movie_data`
--
ALTER TABLE `movie_data`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `movie_director_link`
--
ALTER TABLE `movie_director_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `movie_genre_link`
--
ALTER TABLE `movie_genre_link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `movie_kijkwijzer_link`
--
ALTER TABLE `movie_kijkwijzer_link`
  MODIFY `kijkwijzer_movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_page_permission_link`
--
ALTER TABLE `user_page_permission_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location_data`
--
ALTER TABLE `location_data`
  ADD CONSTRAINT `location_data_ibfk_1` FOREIGN KEY (`function`) REFERENCES `function_data` (`function_id`);

--
-- Constraints for table `location_movie_data`
--
ALTER TABLE `location_movie_data`
  ADD CONSTRAINT `location_movie_data_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie_data` (`movie_id`),
  ADD CONSTRAINT `location_movie_data_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `location_data` (`location_id`);

--
-- Constraints for table `location_tokens`
--
ALTER TABLE `location_tokens`
  ADD CONSTRAINT `location_tokens_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location_data` (`location_id`);

--
-- Constraints for table `movie_actor_link`
--
ALTER TABLE `movie_actor_link`
  ADD CONSTRAINT `movie_actor_link_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actor_data` (`actor_id`),
  ADD CONSTRAINT `movie_actor_link_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie_data` (`movie_id`);

--
-- Constraints for table `movie_director_link`
--
ALTER TABLE `movie_director_link`
  ADD CONSTRAINT `movie_director_link_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `director_data` (`director_id`),
  ADD CONSTRAINT `movie_director_link_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie_data` (`movie_id`);

--
-- Constraints for table `movie_genre_link`
--
ALTER TABLE `movie_genre_link`
  ADD CONSTRAINT `movie_genre_link_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre_data` (`genre_id`),
  ADD CONSTRAINT `movie_genre_link_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie_data` (`movie_id`);

--
-- Constraints for table `movie_kijkwijzer_link`
--
ALTER TABLE `movie_kijkwijzer_link`
  ADD CONSTRAINT `movie_kijkwijzer_link_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie_data` (`movie_id`),
  ADD CONSTRAINT `movie_kijkwijzer_link_ibfk_2` FOREIGN KEY (`kijkwijzer_id`) REFERENCES `kijkwijzer_genre_link` (`kijkwijzer_genre_id`);

--
-- Constraints for table `user_page_permission_link`
--
ALTER TABLE `user_page_permission_link`
  ADD CONSTRAINT `user_page_permission_link_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `admin_header_pages_data` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_page_permission_link_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
