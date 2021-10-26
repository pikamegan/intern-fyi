--
-- Data for table `gender`
--
INSERT INTO 
  gender(
    `genderID`, 
    `genderName`
  )
values
  (
    "M",
    "Male"
  ),
  (
    "F", 
    "Female"
  ), 
  (
    "O", 
    "Others"
  ); 

--
-- Data for table `intern`
--
INSERT INTO 
  intern(
    `firstName`, 
    `lastName`, 
    `genderID`, 
    `country`, 
    `school`, 
    `schoolEmail`, 
    `password`, 
    `profilePictureUrl`, 
    `reviewsNo`
  )
values
  (
    "Esther", 
    "Kim", 
    "F", 
    "Singapore", 
    "Singapore Management University", 
    "esther.2020@scis.smu.edu.sg", 
    "Esther@123", 
    "https://icon-library.com/images/woman-profile-icon/woman-profile-icon-3.jpg", 
    321
  ),
  (
    "Megan", 
    "Thong", 
    "F", 
    "Singapore", 
    "Singapore Management University", 
    "megan.2020@scis.smu.edu.sg", 
    "Megan@45", 
    "https://icon-library.com/images/woman-profile-icon/woman-profile-icon-3.jpg", 
    54
  ), 
  (
    "Patricia", 
    "Loi", 
    "O", 
    "Singapore", 
    "Singapore Management University", 
    "patricia.2020@scis.smu.edu.sg", 
    "Patricia@67", 
    "https://icon-library.com/images/woman-profile-icon/woman-profile-icon-3.jpg", 
    76
  ), 
  (
    "Tianyu", 
    "Chen", 
    "M", 
    "Singapore", 
    "Singapore Management University", 
    "tianyu.2020@scis.smu.edu.sg", 
    "Tianyu@90", 
    "https://cdn5.vectorstock.com/i/1000x1000/13/04/male-profile-picture-vector-2041304.jpg", 
    9
); 

--
-- Data for table `company`
--
insert into
  company(
    -- `companyID`,
    `companyName`,
    `companyDescription`,
    `companyLinkedinLink`,
    `companyWebsite`,
    `industry`,
    `imageLink`,
    `location`,
    `numberOfClicks`,
    `totalNumReviews`,
    `overallRating`,
    `averageCriteria1`,
    `averageCriteria2`,
    `averageCriteria3`,
    `averageCriteria4`,
    `averageCriteria5`,
    `averageCriteria6`
  )
values
  (
    'Google Asia Pacific, Singapore',
    'top tech giant',
    'https://sg.linkedin.com/company/google',
    'https://careers.google.com/locations/sing/',
    'Internet',
    '../IMG/google_staff.svg',
    'Alexandra Road',
    43,
    5,
    4.9,
    4.1,
    4.2,
    4.8,
    4.1,
    4.0,
    4.0
  ),
  (
    'Amazon, Singapore',
    'top tech giant',
    'https://sg.linkedin.com/company/amazon',
    'https://www.amazon.jobs/en-gb/location/singapore-singapore',
    'Internet',
    '../IMG/amazon.jpg',
    '5B Toh Guan Rd E, Singapore 608829',
    78,
    5,
    3.9,
    3.1,
    3.2,
    3.8,
    3.1,
    3.0,
    3.0
  ),
  (
    'Facebook APAC HQ',
    'top tech giant',
    'https://sg.linkedin.com/company/facebook',
    'https://www.facebook.com/careers/v2/locations/singapore/?p[offices][0]=Singapore&offices[0]=Singapore',
    'Internet',
    '../IMG/facebook.jfif',
    '-',
    24,
    5,
    2.5,
    2.9,
    2.1,
    2.2,
    2.8,
    2.1,
    2.0
  ),
  (
    'Microsoft',
    'top tech giant',
    'https://www.linkedin.com/company/microsoft',
    'https://careers.microsoft.com/professionals/us/en/l-singapore',
    'Computer Software',
    '../IMG/microsoft.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),
  (
    'Apple',
    'top tech giant',
    'https://www.linkedin.com/company/apple',
    'https://www.apple.com/careers/sg/',
    'Consumer Electronics',
    '../IMG/apple.jpg',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),
  (
    'DBS Bank',
    'Banking',
    'https://sg.linkedin.com/company/dbs-bank',
    'https://www.dbs.com/careers/default.page',
    'Banking',
    '../IMG/DBS.jpg',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),
  (
    'UOB',
    'Banking',
    'https://sg.linkedin.com/company/uob',
    'https://www.uobgroup.com/uobgroup/index.page',
    'Banking',
    '../IMG/uob.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),
  (
    'OCBC Bank',
    'Banking',
    'https://sg.linkedin.com/company/ocbc-bank',
    'https://www.ocbc.com/',
    'Banking',
    '../IMG/ocbc.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),
  (
    'Standard Chartered Bank',
    'Banking',
    'https://www.linkedin.com/company/standardchartered',
    'https://www.sc.com/en/',
    'Banking',
    '../IMG/StandardCharteredBank.jpg',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'Food Panda',
    'Food Delivery Service',
    'https://sg.linkedin.com/company/foodpanda',
    'https://www.foodpanda.com/',
    'Food Delivery',
    '../IMG/foodpandaoffice.svg',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'DHL',
    'Established in over 220 countries, employing over 100,000 people throughout over 3000 facilities, DHL Express serves over 2.6 million customers worldwide, making us the largest international express courier company in the world.',
    'https://www.linkedin.com/company/dhl',
    'https://dhlexpress.com.sg/',
    'Courier Service',
    '../IMG/DHLbuilding.svg',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'HP',
    'HP Inc. (NYSE: HPQ) creates technology that makes life better for everyone, everywhere. Through our product and service portfolio of personal systems, printers and 3D printing solutions, we engineer experiences that amaze.',
    'https://www.linkedin.com/company/hp',
    'https://www.hp.com/sg-en/home.html',
    'Technology',
    '../IMG/HPstaff.svg',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'Procter & Gamble',
    'The award-winning consumer goods giant is crowned Singapore’s top employer for 2021, and with good reason. Today, Procter & Gamble Singapore is powered by over 2,000 dedicated employees from more than 40 nationalities. An ardent believer in the vast potential of cutting-edge technology, Procter & Gamble plans to invest up to $50 million in total business expenditure in Singapore to further advance digital innovation in the country. Furthermore, it has signalled its intention to train at least 50 employees to embark on novel digital roles.',
    'https://sg.linkedin.com/company/procter-and-gamble',
    'https://www.pgcareers.com/singapore',
    'Consumer Goods',
    '../IMG/procterAndGamble.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'Dyson',
    'The British electric appliance firm employs approximately 1,200 people in Singapore, of whom 350 are engineers and scientists.',
    'https://sg.linkedin.com/company/dyson',
    'https://www.dyson.com.sg/',
    'Electronic',
    '../IMG/dyson.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'Singapore Managment University',
    'A premier university in Asia, the Singapore Management University (SMU) is internationally recognised for its world-class research and distinguished teaching. Established in 2000, SMU’s mission is to generate leading-edge research with global impact and produce broad-based, creative and entrepreneurial leaders for the knowledge-based economy.',
    'https://www.linkedin.com/school/singapore-management-university/',
    'https://www.smu.edu.sg/',
    'Education',
    '../IMG/smu.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'Dell',
    'Dell Inc., formerly PC’s Limited (1984–88) and Dell Computer Corporation (1988–2003), global company that designs, develops, and manufactures personal computers (PCs) and a variety of computer-related products. The company is one of the world’s leading suppliers of PCs. Dell is headquartered in Round Rock, Texas.',
    'https://www.linkedin.com/company/delltechnologies',
    'https://www.dell.com/en-sg',
    'Technology',
    '../IMG/dell.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'Disney',
    'The mission of The Walt Disney Company is to entertain, inform and inspire people around the globe through the power of unparalleled storytelling, reflecting the iconic brands, creative minds and innovative technologies that make ours the world’s premier entertainment company.',
    'https://www.linkedin.com/company/the-walt-disney-company-southeast-asia-pte.-ltd.',
    'https://www.disney.sg/',
    'Entertainment',
    '../IMG/disney.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ),(
    'Lazada Singapore',
    'Lazada Singapore is the leading online shopping platform in Singapore. We are always striving to keep up with what consumers want and need. We are making every effort to achieve maximum customer satisfaction through seamless transactions and competitive product pricing. We are updating and improving our product selections at the best prices to delight our customers along with great deals and flash sales.',
    'https://www.linkedin.com/company/lazada',
    'https://www.lazada.sg/',
    'Ecommerce',
    '../IMG/lazada.jfif',
    '-',
    0,
    0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0,
    0.0
  ); 

--
-- Data for table `review`
--
INSERT INTO 
	review(
    `companyID`, 
    `reviewID`,
	  `jobTitle`,
    `schoolEmail`,
	  `reviewDescription`, 
	  `overallRating`, 
	  `criteria1Rating`, 
	  `criteria2Rating`, 
	  `criteria3Rating`, 
	  `criteria4Rating`, 
	  `criteria5Rating`, 
	  `criteria6Rating`, 
	  `totalUpvotesNo`, 
	  `totalDownvotesNo`, 
	  `checkSFW`
  )
  values(
  1,
  1, 
  "Marketing Intern",
  "esther.2020@scis.smu.edu.sg",
  "I learnt about Search Engine Optimisation (SEO) and Google Ads, which align with my Business Analysis specialisation perfectly!",
  5, 
  5, 
  4.9, 
  5, 
  4.9, 
  5, 
  4.9, 
  34, 
  5, 
  1
  ), 
  (
  1,
  2,
  "Policy Analyst",
  "patricia.2020@scis.smu.edu.sg",
  "The best internship I've had.",
  5, 
  5, 
  4.9, 
  5, 
  4.9, 
  4.8, 
  4.9, 
  12, 
  2, 
  0
  ); 

--
-- Data for table `vote`
--

INSERT INTO
vote(
  `companyID`, 
  `reviewID`, 
  `voteID`, 
  `isUpvote`, 
  `isDownvote`
)
VALUES(
  1,
  1, 
  1,
  1,
  0
), 
(
  1, 
  1,
  2, 
  1,
  0
), 
(
  1, 
  1,
  3, 
  0,
  1
), 
(
  1,
  2,
  4,
  1,
  0
), 
(
  1,
  1,
  5, 
  0,
  1
), 
(
  1,
  2, 
  6,
  1,
  0
), 
(
  1,
  1,
  7, 
  1,
  0
); 

