----- Added by Minh
--
-- Adding new 1 column into project table for state management
--
ALTER TABLE `project`
ADD COLUMN `state_id`  int(11) NOT NULL DEFAULT 1 AFTER `txn_id`;

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--
INSERT INTO `state` (`id`, `code`, `name`) VALUES
(1, 'ACT', 'Australia/Australian Capital Territory'),
(2, 'NSW', 'Australia/New South Wales'),
(3, 'VIC', 'Australia/Victoria'),
(4, 'QLD', 'Australia/Queensland'),
(5, 'SA', 'Australia/South Australia'),
(6, 'WA', 'Australia/Western Australia'),
(7, 'TAS', 'Australia/Tasmania'),
(8, 'NT', 'Australia/Northern Territory');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
--
-- Adding new 1 column into project table for state management
--
ALTER TABLE `user`
ADD COLUMN `state_id`  int(11) NOT NULL DEFAULT 1 AFTER `password`;


----------- WHEN YOU ADD A QUERY ADD YOUR NAME PLEASE (i.e. "Added by ...")