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
    'https://media-exp1.licdn.com/dms/image/C4D0BAQHiNSL4Or29cg/company-logo_200_200/0/1519856215226?e=2159024400&v=beta&t=r--a5-Dl4gvVE-xIkq8QyBzZ8mQ-OYwBOrixNzR95H0',
    '70 Pasir Panjang Rd, #03-71 Mapletree Business City II, Singapore 117371',
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
    'https://media-exp1.licdn.com/dms/image/C560BAQHTvZwCx4p2Qg/company-logo_200_200/0/1612205615891?e=2159024400&v=beta&t=J9qbDyzP2uv1lE1Xb_ieBaWwgeT-u52Mf-4ACuHP_p8',
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
    'https://media-exp1.licdn.com/dms/image/C560BAQGrV5i4K9YdhQ/company-logo_200_200/0/1621582241755?e=2159024400&v=beta&t=jUSQl6ISH9xb-ll-UEVCanO2SAl_dJIhRViAYn2I-fw',
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
    'https://media-exp1.licdn.com/dms/image/C560BAQE88xCsONDULQ/company-logo_200_200/0/1618231291419?e=2159024400&v=beta&t=SI9gH_Nkcfh5HK__JZrDMTM5Uuvi5V9x2sLzuK9QIpw',
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
    'https://media-exp1.licdn.com/dms/image/C560BAQHdAaarsO-eyA/company-logo_200_200/0/1595530301220?e=2159024400&v=beta&t=IJmg_K1W7KCh6082rXN9V7gzlrD9GMwYqk_EjCrDxGw',
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
    'https://media-exp1.licdn.com/dms/image/C4D0BAQEaBXOgNiu3sg/company-logo_200_200/0/1531757731989?e=2159024400&v=beta&t=EVBkl29scWUKf1Am88P1YM8HldhmW5S-xymjLxO0grI',
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
    'https://media-exp1.licdn.com/dms/image/C4E0BAQENO9XZYpLbgQ/company-logo_200_200/0/1519856136149?e=2159024400&v=beta&t=YK8C3UX6VjX3Ozd6rESlaeJlycU4nCEZPAd8gwXqQyw',
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
    'https://media-exp1.licdn.com/dms/image/C4D0BAQH6RAcbwbIQCA/company-logo_200_200/0/1633311711153?e=2159024400&v=beta&t=TUzocMhynz2Zm8urq3ua_XPJR-r9T4uaJ-jBBQ7rF7E',
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
    'https://media-exp1.licdn.com/dms/image/C4E0BAQE2QHNh-jlD8g/company-logo_200_200/0/1625479722494?e=2159024400&v=beta&t=GHz2HTNVmGIxpgGeK3N4dnF3Sve02_s37eSbMzURV3o',
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
    '../IMG/procterNGamble.svg',
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
    '../IMG/dyson.svg',
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
    '../IMG/smuLaw.svg',
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

