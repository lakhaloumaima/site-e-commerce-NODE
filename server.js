const express = require('express');
//var bodyParser = require('body-parser');
const app = express();
const db = require('./config/database');


// parse application/x-www-form-urlencoded
//app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.urlencoded({ extended: false }));
// parse application/json
//app.use(bodyParser.json());
app.use(express.json());

/// use t3awedh get post delete put mtaa user
const userrouter = require('./routes/UserRouter');
const adminrouter = require('./routes/AdminRouter');
const clientrouter = require('./routes/ClientRouter');
const productrouter = require('./routes/ProductRouter');
const categoryrouter = require('./routes/CategoryRouter');

//parent routes
app.use('/users', userrouter);
app.use('/admins', adminrouter);
app.use('/clients', clientrouter);
app.use('/products', productrouter);
app.use('/categories', categoryrouter);

app.get('/', (req, res) => {
    res.send('hello world')
})

app.get('/hello/:name', (req, res) => {
    res.send('hello ' + req.params.name)
})



////requete tetbaath aal localhost 50000 tetsama middleware
app.listen(5000, () => {
        console.log('server is listening on port 5000');
    })
    /////////////////////////////////////////////////////////////
    /// c'est quoi un API , nosql database , expressjs , nodejs backend developpment , mohamed essa ?
    /// a telecharger : mongodb , robo 3t (kime phpmyadmin) , vscode , postm chrome extension or postman