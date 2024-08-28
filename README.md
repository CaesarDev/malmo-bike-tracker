# Malmö Bike Tracker

Welcome to **Malmö Bike Tracker**! This repository is dedicated to providing real-time information about bike availability at various bike stations across Malmö. Our goal is to make it quick and easy to check bike availability whenever and whereever you need.

## Features
- **User-Friendly Interface**: Designed for quick and easy access to bike availability data.
- **Live Bike Count**: Get instant updates on the number of bikes at each station.
- **Station Information**: Detailed info about each bike station, including location and capacity.

- ## Upcoming features
- **Low Bike Count Text Alerts**: Receive text alerts when the number of bikes at a station falls below a certain threshold.
- **Station unavailable Text Alerts**: Receive text alerts when your preferred station is unavailable.
- **Find Closest Available slot/bike**: Given the users position find the closes station with bikes/slots available.

## Development
Start the server by running `sail up` in the root directory. Then run `sail npm run dev` to start the development server.

## Contributing

We welcome contributions! If you have suggestions for improvements or find any bugs, please open an issue or submit a pull request.

## License

This project is licensed under the MIT License

## Acknowledgements
We are using the [Malmö By Bike API](https://www.malmobybike.se/api/) to provide real-time bike availability data.
Special thanks to Malmö By Bike for the inspiration and data.

## Data from API
Here are example data from the API for future reference:  
`/station`
```json
[
    {
        "id":"001",
        "name":"Malmö C Norra",
        "address":"Skeppsbron",
        "addressNumber":null,
        "zipCode":null,
        "districtCode":null,
        "districtName":null,
        "location":{
            "lat":"55.60899",
            "lon":"12.99907"
        },
        "stationType":"BIKE,TPV"
    },
    {
        "id":"002",
        "name":"Malmö C Södra",
        "address":"Skeppsbron",
        "addressNumber":null,
        "zipCode":null,
        "districtCode":null,
        "districtName":null,
        "location":{
            "lat":"55.60865",
            "lon":"12.99927"
        },
        "stationType":"BIKE,TPV"
    },
    {
        "id":"003",
        "name":"Bagers plats",
        "address":"Hjälmaregatan",
        "addressNumber":"1",
        "zipCode":"211 18",
        "districtCode":null,
        "districtName":null,
        "location":{
            "lat":"55.60819",
            "lon":"12.99670"
        },
        "stationType":"BIKE"
    }
]
``` 
`/stationStatus`
```json
[
    {
        "id":"001",
        "status":"OPN",
        "statusDetail":{
            "operationalStatus":"Operational",
            "calendarStatus":"Open",
            "connectivityStatus":"Connected"
        },
        "mobileCheckoutStatus":"OPN",
        "mobileCheckoutStatusDetail":{
            "mobileCheckoutOperationalState":"Operational",
            "mobileCheckoutConnectivityStatus":"Connected",
            "operationalStatus":"Operational",
            "calendarStatus":"Open",
            "connectivityStatus":"Connected"
        },
        "availability":{
            "bikes":11,
            "slots":13
        }
    },
    {
        "id":"002",
        "status":"OPN",
        "statusDetail":{
            "operationalStatus":"Operational",
            "calendarStatus":"Open",
            "connectivityStatus":"Connected"
        },
        "mobileCheckoutStatus":"OPN",
        "mobileCheckoutStatusDetail":{
            "mobileCheckoutOperationalState":"Operational",
            "mobileCheckoutConnectivityStatus":"Connected",
            "operationalStatus":"Operational",
            "calendarStatus":"Open",
            "connectivityStatus":"Connected"
        },
        "availability":{
            "bikes":16,
            "slots":3
        }
    },
    {
        "id":"003",
        "status":"OPN",
        "statusDetail":{
            "operationalStatus":"Operational",
            "calendarStatus":"Open",
            "connectivityStatus":"Connected"
        },
        "mobileCheckoutStatus":"OPN",
        "mobileCheckoutStatusDetail":{
            "mobileCheckoutOperationalState":"Operational",
            "mobileCheckoutConnectivityStatus":"Connected",
            "operationalStatus":"Operational",
            "calendarStatus":"Open",
            "connectivityStatus":"Connected"
        },
        "availability":{
            "bikes":6,
            "slots":18
        }
    }
]
```
