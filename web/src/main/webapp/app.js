//const http = require('http')


// const server = http.createServer(onRequest).listen(port);

var express = require('express');
var app = express();
var morgan = require('morgan');             // log requests to the console (express4)
var bodyParser = require('body-parser');    // pull information from HTML POST (express4)
var methodOverride = require('method-override'); // simulate DELETE and PUT (express4)


const hostname = '127.0.0.1';
const port = 8080;

/* set up functions */
function onRequest(request, response) {
    response.writeHead(200, {'Content-Type': 'text/plain'});
    response.end('Hello World \n');
 }

/* set up routes */
app.get('/', onRequest);

app.use(express.static(__dirname));                // set the static files location
app.use(morgan('dev'));                                         // log every request to the console
app.use(bodyParser.urlencoded({'extended':'true'}));            // parse application/x-www-form-urlencoded
app.use(bodyParser.json());                                     // parse application/json
app.use(bodyParser.json({ type: 'application/vnd.api+json' })); // parse application/vnd.api+json as json
app.use(methodOverride());


/* run app */
app.listen(port);
console.log('Server running on port http://${hostname}:${port}/');
