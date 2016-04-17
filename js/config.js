var config = {
    lang: 'en',
    time: {
        timeFormat: 12,
        displaySeconds: true,
        digitFade: false,
    },
    weather: {
        //change weather params here:
        //units: metric or imperial
        params: {
            q: 'New York, US',
            units: 'imperial',
            // if you want a different lang for the weather that what is set above, change it here
            lang: 'en',
            APPID: '03539488df334c30c7e3c961d9b45d05'
        }
    },
    compliments: {
        interval: 600,
        fadeInterval: 6000,
        morning: [
            'Good morning, handsome!',
            'Enjoy your day!',
            'How was your sleep?',
            'you are the fairest of them all'
        ],
        afternoon: [
            'Hello, beauty!',
            'You look sexy!',
            'Looking good today!',
            'you are the fairest of them all'
        ],
        evening: [
            'Wow, you look hot!',
            'You look nice!',
            'Hi, sexy!',
            'you are the fairest of them all'
        ]
    },
    calendar: {
        maximumEntries: 10, // Total Maximum Entries
		displaySymbol: true,
		defaultSymbol: 'calendar', // Fontawsome Symbol see http://fontawesome.io/cheatsheet/
        urls: [
		{
			symbol: 'calendar-plus-o',
			url: 'https://calendar.google.com/calendar/ical/alexparson1%40gmail.com/private-8428d16a581192c6462f2366360abd96/basic.ics'
		},
		{
			symbol: 'soccer-ball-o',
			url: 'webcal://mlb.am/tix/yankees_schedule_full',
		},
		// {
			// symbol: 'mars',
			// url: "https://server/url/to/his.ics",
		// },
		// {
			// symbol: 'venus',
			// url: "https://server/url/to/hers.ics",
		// },
		// {
			// symbol: 'venus-mars',
			// url: "https://server/url/to/theirs.ics",
		// },
		]
    },
    news: {
        feed: 'http://www.nytimes.com/services/xml/rss/nyt/HomePage.xml'
    }
}
