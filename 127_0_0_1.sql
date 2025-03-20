
--
-- Database: `moviedekhi`
--
CREATE DATABASE IF NOT EXISTS `moviedekhi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moviedekhi`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `ActorID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Biography` text DEFAULT NULL,
  `PhotoURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`ActorID`, `Name`, `Birthdate`, `Country`, `Biography`, `PhotoURL`) VALUES
(3, 'Robert Downey Jr.', '1965-04-04', 'USA', 'American actor and producer. Best known for his role as Tony Stark / Iron Man in the Marvel Cinematic Universe.', 'Assets\\Actorpics\\robert_downey_jr.jpg'),
(4, 'Gwyneth Paltrow', '1972-09-27', 'USA', 'American actress, singer, and author. Known for her role as Pepper Potts in the Marvel Cinematic Universe.', 'Assets\\Actorpics\\gwyneth_paltrow.jpg'),
(5, 'Christian Bale', '1974-01-30', 'UK', 'English actor. Known for his versatility and physical transformations for his roles.', 'Assets\\Actorpics\\christian_bale.jpg'),
(6, 'Heath Ledger', '1979-04-04', 'Australia', 'Australian actor and music video director. Best known for his role as the Joker in \"The Dark Knight\".', 'Assets\\Actorpics\\heath_ledger.jpg'),
(7, 'Leonardo DiCaprio', '1974-11-11', 'USA', 'American actor, producer, and environmentalist. Known for his roles in \"Titanic\" and \"Inception\".', 'Assets\\Actorpics\\leonardo_dicaprio.jpg'),
(8, 'Joseph Gordon-Levitt', '1981-02-17', 'USA', 'American actor, filmmaker, singer, and entrepreneur. Known for his roles in \"500 Days of Summer\" and \"Inception\".', 'Assets\\Actorpics\\joseph_gordon_levitt.jpg'),
(9, 'Tim Robbins', '1958-10-16', 'USA', 'American actor, screenwriter, director, producer, and musician. Known for his role in \"The Shawshank Redemption\".', 'Assets\\Actorpics\\tim_robbins.jpg'),
(10, 'Morgan Freeman', '1937-06-01', 'USA', 'American actor, director, and narrator. Known for his distinctive deep voice and roles in various blockbuster movies.', 'Assets\\Actorpics\\morgan_freeman.jpg'),
(11, 'Tom Hanks', '1956-07-09', 'USA', 'American actor and filmmaker. Known for his comedic and dramatic roles; one of the most popular and recognizable film stars worldwide.', 'Assets\\Actorpics\\tom_hanks.jpg'),
(12, 'Robin Wright', '1966-04-08', 'USA', 'American actress and director. Known for her roles in \"Forrest Gump\" and the Netflix series \"House of Cards\".', 'Assets\\Actorpics\\robin_wright.jpg'),
(13, 'Marlon Brando', '1924-04-03', 'USA', 'American actor and film director with a career spanning 60 years, best known for his role as Vito Corleone in The Godfather.', 'Assets\\Actorpics\\marlon_brando.png'),
(14, 'Al Pacino', '1940-04-25', 'USA', 'American actor and filmmaker, known for playing Michael Corleone in The Godfather series.', 'Assets\\Actorpics\\al_pacino.jpg'),
(15, 'John Travolta', '1954-02-18', 'USA', 'American actor, singer, and dancer, known for his role as Vincent Vega in Pulp Fiction.', 'Assets\\Actorpics\\john_travolta.jpg'),
(16, 'Samuel L. Jackson', '1948-12-21', 'USA', 'American actor and producer, highly recognizable for his roles in over 150 films, including Jules Winnfield in Pulp Fiction.', 'Assets\\Actorpics\\samuel_l_jackson.jpg'),
(17, 'Chris Evans', '1981-06-13', 'USA', 'American actor, best known for his role as Steve Rogers / Captain America in the Marvel Cinematic Universe.', 'Assets\\Actorpics\\chris_evans.jpg'),
(18, 'Matthew McConaughey', '1969-11-04', 'USA', 'American actor and producer. Won the Academy Award for Best Actor for his role in \"Dallas Buyers Club.\"', 'Assets\\Actorpics\\matthew_mcconaughey.jpg'),
(19, 'Anne Hathaway', '1982-11-12', 'USA', 'American actress. Known for her roles in \"The Princess Diaries,\" \"Les Misérables,\" and \"Interstellar.\"', 'Assets\\Actorpics\\anne_hathaway.jpg'),
(20, 'Russell Crowe', '1964-04-07', 'New Zealand', 'Actor and film producer. Best known for his role in \"Gladiator\" for which he won an Academy Award.', 'Assets\\Actorpics\\russell_crowe.jpg'),
(21, 'Joaquin Phoenix', '1974-10-28', 'USA', 'American actor and producer. Known for his roles in \"Gladiator\" and \"Joker.\"', 'Assets\\Actorpics\\joaquin_phoenix.jpg'),
(22, 'Matthew Broderick', '1962-03-21', 'USA', 'American actor and singer. Known for his voice role as Adult Simba in \"The Lion King.\"', 'Assets\\Actorpics\\matthew_broderick.jpg'),
(23, 'James Earl Jones', '1931-01-17', 'USA', 'American actor. Known for his voice roles as Darth Vader in \"Star Wars\" and Mufasa in \"The Lion King.\"', 'Assets\\Actorpics\\james_earl_jones.jpg'),
(24, 'Sam Worthington', '1976-08-02', 'UK', 'English-born Australian actor. Best known for his role as Jake Sully in \"Avatar.\"', 'Assets\\Actorpics\\sam_worthington.jpg'),
(25, 'Zoe Saldana', '1978-06-19', 'USA', 'American actress. Known for her roles in \"Avatar\" and as Gamora in the Marvel Cinematic Universe.', 'Assets\\Actorpics\\zoe_saldana.jpg'),
(26, 'Sam Neill', '1947-09-14', 'Ireland', 'New Zealand actor, known for his role as Dr. Alan Grant in \"Jurassic Park\".', 'Assets\\Actorpics\\sam_neill.jpg'),
(27, 'Laura Dern', '1967-02-10', 'USA', 'American actress, director, and producer. Known for her role as Dr. Ellie Sattler in \"Jurassic Park\".', 'Assets\\Actorpics\\laura_dern.jpg'),
(28, 'Jodie Foster', '1962-11-19', 'USA', 'American actress, director, and producer. Known for her role as Clarice Starling in \"The Silence of the Lambs\".', 'Assets\\Actorpics\\jodie_foster.jpg'),
(29, 'Anthony Hopkins', '1937-12-31', 'UK', 'Welsh actor, director, and producer. Known for his role as Dr. Hannibal Lecter in \"The Silence of the Lambs\".', 'Assets\\Actorpics\\anthony_hopkins.jpg'),
(30, 'Elijah Wood', '1981-01-28', 'USA', 'American actor, voice actor, film producer, and DJ. He is best known for his role as Frodo Baggins in \"The Lord of the Rings\" trilogy.', 'Assets\\Actorpics\\elijah_wood.jpg'),
(31, 'Viggo Mortensen', '1958-10-20', 'USA', 'Danish-American actor, author, musician, photographer, poet, and painter. Best known for his role as Aragorn in \"The Lord of the Rings\" trilogy.', 'Assets\\Actorpics\\viggo_mortensen.jpg'),
(32, 'Keanu Reeves', '1964-09-02', 'Lebanon', 'Canadian actor. Known for his roles in \"The Matrix\" trilogy and the \"John Wick\" series.', 'Assets\\Actorpics\\keanu_reeves.jpg'),
(33, 'Laurence Fishburne', '1961-07-30', 'USA', 'American actor, playwright, producer, screenwriter, and film director. Known for his role as Morpheus in \"The Matrix\" trilogy.', 'Assets\\Actorpics\\laurence_fishburne.jpg'),
(34, 'Kate Winslet', '1975-10-05', 'UK', 'English actress known for her work in independent films, particularly period dramas, and for her portrayals of strong-willed and complicated women. Best known for her role as Rose DeWitt Bukater in \"Titanic\".', 'Assets\\Actorpics\\kate_winslet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `DirectorID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Biography` text DEFAULT NULL,
  `PhotoURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`DirectorID`, `Name`, `Birthdate`, `Country`, `Biography`, `PhotoURL`) VALUES
(3, 'Jon Favreau', '1966-10-19', 'USA', 'An American director, actor, and screenwriter known for directing \"Iron Man\".', 'Assets\\directorpics\\jon_favreau.jpg'),
(4, 'Christopher Nolan', '1970-07-30', 'UK', 'British-American director known for \"The Dark Knight\" and \"Inception\". Renowned for his complex storytelling and innovative use of visual effects.', 'Assets\\directorpics\\christopher_nolan.jpg'),
(5, 'Frank Darabont', '1959-01-28', 'France', 'French-American director known for \"The Shawshank Redemption\". Noted for his adaptation of Stephen King novels.', 'Assets\\directorpics\\frank_darabont.jpg'),
(6, 'Robert Zemeckis', '1951-05-14', 'USA', 'American director and screenwriter known for directing \"Forrest Gump\". His films are characterized by an interest in state-of-the-art special effects.', 'Assets\\directorpics\\robert_zemeckis.jpg'),
(7, 'Francis Ford Coppola', '1939-04-07', 'USA', 'American director, producer, and screenwriter known for \"The Godfather\". He has won numerous awards for his work in the film industry.', 'Assets\\directorpics\\francis_ford_coppola.jpg'),
(8, 'Quentin Tarantino', '1963-03-27', 'USA', 'American director, writer, and actor known for his highly stylized, dialogue-driven films, including \"Pulp Fiction\".', 'Assets\\directorpics\\quentin_tarantino.jpg'),
(9, 'Peter Jackson', '1961-10-31', 'New Zealand', 'New Zealand film director, producer, and screenwriter, best known for \"The Lord of the Rings\" and \"The Hobbit\" film trilogies.', 'Assets\\directorpics\\peter_jackson.jpg'),
(10, 'Lana Wachowski', '1965-06-21', 'USA', 'American film and TV director, producer, and screenwriter. Known for co-directing \"The Matrix\" trilogy with her sister, Lilly Wachowski.', 'Assets\\directorpics\\lana_wachowski.jpg'),
(11, 'Lilly Wachowski', '1967-12-29', 'USA', 'American film and TV director, producer, and screenwriter. Known for co-directing \"The Matrix\" trilogy with her sister, Lana Wachowski.', 'Assets\\directorpics\\lilly_wachowski.jpg'),
(12, 'Joss Whedon', '1964-06-23', 'USA', 'American producer, director, and screenwriter known for creating \"Buffy the Vampire Slayer\" and directing \"The Avengers\".', 'Assets\\directorpics\\joss_whedon.jpg'),
(13, 'Ridley Scott', '1937-11-30', 'UK', 'British director and producer known for his work on \"Gladiator\" and science fiction films such as \"Alien\" and \"Blade Runner\".', 'Assets\\directorpics\\ridley_scott.jpg'),
(14, 'Roger Allers', '1949-06-29', 'USA', 'American film director and screenwriter known for co-directing \"The Lion King\".', 'Assets\\directorpics\\roger_allers.jpg'),
(15, 'Rob Minkoff', '1962-08-11', 'USA', 'American filmmaker known for co-directing \"The Lion King\" along with Roger Allers.', 'Assets\\directorpics\\rob_minkoff.jpg'),
(16, 'James Cameron', '1954-08-16', 'Canada', 'Canadian filmmaker known for directing \"Titanic\" and \"Avatar\". Renowned for his innovative use of technology and special effects in filmmaking.', 'Assets\\directorpics\\james_cameron.jpg'),
(17, 'Steven Spielberg', '1946-12-18', 'USA', 'One of the most influential filmmakers in the history of cinema, known for directing \"Jurassic Park\", \"E.T. the Extra-Terrestrial\", and \"Schindler\'s List\".', 'Assets\\directorpics\\steven_spielberg.jpg'),
(18, 'Jonathan Demme', '1944-02-22', 'USA', 'American filmmaker, best known for directing \"The Silence of the Lambs\". His work is noted for its portrayal of complex characters and social themes.', 'Assets\\directorpics\\jonathan_demme.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MovieID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `Genre` varchar(100) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Language` varchar(100) DEFAULT NULL,
  `Plot` text DEFAULT NULL,
  `PosterURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MovieID`, `Title`, `ReleaseDate`, `Genre`, `Duration`, `Country`, `Language`, `Plot`, `PosterURL`) VALUES
(3, 'Iron Man', '2008-03-23', 'sci-fi', 123, 'US', 'English', 'After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.', 'Assets\\posters\\ironman.jpg'),
(4, 'The Dark Knight', '2008-07-18', 'action', 152, 'US', 'English', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'Assets\\posters\\dark_knight.jpg'),
(5, 'Inception', '2010-07-16', 'sci-fi', 148, 'US', 'English', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'Assets\\posters\\inception.jpg'),
(6, 'The Shawshank Redemption', '1994-10-14', 'drama', 142, 'US', 'English', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'Assets\\posters\\shawshank_redemption.jpg'),
(7, 'Forrest Gump', '1994-07-06', 'drama', 142, 'US', 'English', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 'Assets\\posters\\forrest_gump.jpg'),
(8, 'The Godfather', '1972-03-24', 'crime', 175, 'US', 'English', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'Assets\\posters\\godfather.jpg'),
(9, 'Pulp Fiction', '1994-10-14', 'crime', 154, 'US', 'English', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'Assets\\posters\\pulp_fiction.jpg\n'),
(10, 'The Lord of the Rings: The Return of the King', '2003-12-17', 'fantasy', 201, 'US', 'English', 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 'Assets\\posters\\lotr_return_king.jpg'),
(11, 'The Matrix', '1999-03-31', 'action', 136, 'US', 'English', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'Assets\\posters\\matrix.jpg'),
(12, 'The Avengers', '2012-05-04', 'action', 143, 'US', 'English', 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', 'Assets\\posters\\avengers.jpg'),
(13, 'Interstellar', '2014-11-07', 'sci-fi', 169, 'US', 'English', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', 'Assets\\posters\\interstellar.jpg'),
(14, 'Gladiator', '2000-05-05', 'action', 155, 'US', 'English', 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.', 'Assets\\posters\\gladiator.jpg'),
(15, 'The Lion King', '1994-06-24', 'animation', 88, 'US', 'English', 'A young lion prince flees his kingdom only to learn the true meaning of responsibility and bravery.', 'Assets\\posters\\lion_king.jpg\n'),
(16, 'Titanic', '1997-12-19', 'romance', 195, 'US', 'English', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'Assets\\posters\\titanic.jpg'),
(17, 'Avatar', '2009-12-18', 'action', 162, 'US', 'English', 'A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'Assets\\posters\\avatar.jpg'),
(18, 'Jurassic Park', '1993-06-11', 'sci-fi', 127, 'US', 'English', 'During a preview tour, a theme park suffers a major power breakdown that allows its cloned dinosaur exhibits to run amok.', 'Assets\\posters\\jurassic_park.jpg'),
(19, 'The Silence of the Lambs', '1991-02-14', 'thriller', 118, 'US', 'English', 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.', 'Assets\\posters\\silence_lambs.jpg\n');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actors`
--

CREATE TABLE `movie_actors` (
  `MovieID` int(11) NOT NULL,
  `ActorID` int(11) NOT NULL,
  `CharacterName` varchar(255) DEFAULT NULL,
  `LeadSupportingFlag` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_actors`
--

INSERT INTO `movie_actors` (`MovieID`, `ActorID`, `CharacterName`, `LeadSupportingFlag`) VALUES
(3, 3, 'Tony Stark / Iron Man', 1),
(3, 4, 'Pepper Potts', 0),
(4, 5, 'Bruce Wayne / Batman', 1),
(4, 6, 'Joker', 1),
(5, 7, 'Dom Cobb', 1),
(5, 8, 'Arthur', 0),
(6, 9, 'Andy Dufresne', 1),
(6, 10, 'Ellis Boyd \"Red\" Redding', 1),
(7, 11, 'Forrest Gump', 1),
(7, 12, 'Jenny Curran', 0),
(8, 13, 'Vito Corleone', 1),
(8, 14, 'Michael Corleone', 1),
(9, 15, 'Vincent Vega', 1),
(9, 16, 'Jules Winnfield', 1),
(10, 30, 'Frodo Baggins', 1),
(10, 31, 'Aragorn', 1),
(11, 32, 'Neo', 1),
(11, 33, 'Morpheus', 0),
(12, 3, 'Tony Stark / Iron Man', 1),
(12, 17, 'Steve Rogers / Captain America', 1),
(13, 18, 'Cooper', 1),
(13, 19, 'Dr. Amelia Brand', 0),
(14, 20, 'Maximus', 1),
(14, 21, 'Commodus', 0),
(15, 22, 'Adult Simba', 1),
(15, 23, 'Mufasa', 1),
(16, 7, 'Jack Dawson', 1),
(16, 34, 'Rose DeWitt Bukater', 1),
(17, 24, 'Jake Sully', 1),
(17, 25, 'Neytiri', 0),
(18, 26, 'Dr. Alan Grant', 1),
(18, 27, 'Dr. Ellie Sattler', 0),
(19, 28, 'Clarice Starling', 1),
(19, 29, 'Dr. Hannibal Lecter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie_directors`
--

CREATE TABLE `movie_directors` (
  `MovieID` int(11) NOT NULL,
  `DirectorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_directors`
--

INSERT INTO `movie_directors` (`MovieID`, `DirectorID`) VALUES
(3, 3),
(4, 4),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(11, 11),
(12, 12),
(13, 4),
(14, 13),
(15, 14),
(15, 15),
(16, 16),
(17, 16),
(18, 17),
(19, 18);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `RatingID` int(11) NOT NULL,
  `MovieID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Score` decimal(3,1) DEFAULT NULL,
  `DateRated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`RatingID`, `MovieID`, `UserID`, `Score`, `DateRated`) VALUES
(5, 13, 3, 1.0, '2024-04-22'),
(6, 5, 3, 9.0, '2024-04-22'),
(7, 13, 4, 9.0, '2024-04-22'),
(8, 5, 4, 10.0, '2024-04-22'),
(9, 12, 4, 7.0, '2024-04-22'),
(10, 8, 4, 10.0, '2024-04-22'),
(11, 9, 4, 6.0, '2024-04-22'),
(12, 10, 4, 5.0, '2024-04-22'),
(13, 19, 4, 4.0, '2024-04-22'),
(14, 3, 4, 6.0, '2024-04-22'),
(15, 18, 4, 6.0, '2024-04-22'),
(16, 16, 4, 9.0, '2024-04-22'),
(17, 11, 4, 7.0, '2024-04-22'),
(18, 14, 4, 6.0, '2024-04-22'),
(19, 17, 4, 9.0, '2024-04-22'),
(20, 6, 4, 9.0, '2024-04-22'),
(21, 7, 4, 9.0, '2024-04-22'),
(22, 4, 4, 9.0, '2024-04-22'),
(23, 7, 3, 10.0, '2024-04-22'),
(24, 12, 3, 7.0, '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` int(11) NOT NULL,
  `MovieID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ReviewText` text DEFAULT NULL,
  `Rating` decimal(3,1) DEFAULT NULL,
  `DatePosted` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ReviewID`, `MovieID`, `UserID`, `ReviewText`, `Rating`, `DatePosted`) VALUES
(9, 12, 3, 'Loki is the best villian', NULL, '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `JoinDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `JoinDate`) VALUES
(1, 'johnDoe', 'johndoe@example.com', 'hashedpassword1', '2023-01-01'),
(2, 'janeDoe', 'janedoe@example.com', 'hashedpassword2', '2023-01-02'),
(3, 'Turjoy44', 'turjoy.das007@gmail.com', '$2y$10$3dURyPhzoW1otbOR1.K4.egMlEP5ffmIRkFa6uriYcIrMOcAcCJVe', '2024-04-15'),
(4, 'Dipu47', 'dipu@gmail.com', '$2y$10$xM1EHpHjcucdxnYT8ehmce5.9iSDc9f4cnSUs0Cve8jmHoCTCA92a', '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `watchlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`watchlist_id`, `user_id`, `movie_id`, `added_date`) VALUES
(6, 3, 5, '2024-04-21 21:24:24'),
(9, 4, 4, '2024-04-22 03:49:26'),
(13, 4, 17, '2024-04-22 04:53:58'),
(16, 3, 17, '2024-04-22 07:57:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`ActorID`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`DirectorID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD PRIMARY KEY (`MovieID`,`ActorID`),
  ADD KEY `ActorID` (`ActorID`);

--
-- Indexes for table `movie_directors`
--
ALTER TABLE `movie_directors`
  ADD PRIMARY KEY (`MovieID`,`DirectorID`),
  ADD KEY `DirectorID` (`DirectorID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `MovieID` (`MovieID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `MovieID` (`MovieID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`watchlist_id`),
  ADD UNIQUE KEY `unique_user_movie` (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `ActorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `DirectorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MovieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `watchlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD CONSTRAINT `movie_actors_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MovieID`),
  ADD CONSTRAINT `movie_actors_ibfk_2` FOREIGN KEY (`ActorID`) REFERENCES `actors` (`ActorID`);

--
-- Constraints for table `movie_directors`
--
ALTER TABLE `movie_directors`
  ADD CONSTRAINT `movie_directors_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MovieID`),
  ADD CONSTRAINT `movie_directors_ibfk_2` FOREIGN KEY (`DirectorID`) REFERENCES `directors` (`DirectorID`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MovieID`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MovieID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`MovieID`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"moviedekhi\",\"table\":\"users\"},{\"db\":\"moviedekhi\",\"table\":\"reviews\"},{\"db\":\"moviedekhi\",\"table\":\"ratings\"},{\"db\":\"moviedekhi\",\"table\":\"movie_directors\"},{\"db\":\"moviedekhi\",\"table\":\"movie_actors\"},{\"db\":\"moviedekhi\",\"table\":\"directors\"},{\"db\":\"moviedekhi\",\"table\":\"actors\"},{\"db\":\"moviedekhi\",\"table\":\"movies\"},{\"db\":\"moviedekhi\",\"table\":\"movie\"},{\"db\":\"moviedekhi\",\"table\":\"user\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'moneywave', 'account', '{\"CREATE_TIME\":\"2024-02-25 22:44:27\",\"col_order\":[0,1,2],\"col_visib\":[1,1,1]}', '2024-02-25 17:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-04-02 13:17:12', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
