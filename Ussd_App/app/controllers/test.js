module.exports = test;

var newline = '\r\n';


function test (req, res, next) {
  var response = {
    Type: 'Response',
    Message: 'Welcome to the SMART TICKETS ZAMBIA, User.' + newline
      + 'Select an option.' + newline
      + '1. Make a Booking' + newline
      + '2. Show Available Buses' + newline
	  + '3. Routes and Fares' + newline
	  + '4. Book for Many' + newline
	  + '5. Past Transactions' + newline
	  + '6. My Account' + newline
      + '0. Exit'
  };
  var release = {
    Type: 'Release',
    Message: 'Thank you for testing me.'
  };
  var body = req.body;
  switch (body.Type) {
    case 'Initiation':
    case 'Response':
      return res.json(response);
    case 'Timeout':
    case 'Release':
      return res.json(release);
    default:
      return res.status(400).json({});
  }
}