use intern; 

insert into company(
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
  `averageCriteria6`)
values (
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
) , (
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
)