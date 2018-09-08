const express = require('express')
const app = express()

var phpExpress = require('php-express')({
 
  // assumes php is in your PATH
  binPath: 'php'
});

//set view engine to php-express
app.set('views', './views');
app.engine('php', phpExpress.engine);
app.set('view engine', 'php');

//routing all .php file to php-express
app.all(/.+\.php$/, phpExpress.router);


app.use('/chel', express.static('chealsea-website'))
app.listen(3000, function () {
  console.log('Example app listening on port 3000!')
})
