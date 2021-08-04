///child route
const express = require('express');
const route = express.Router();
const ClientController = require('../controllers/clientController')

//create admin
route.post('/', ClientController.createclient);

module.exports = route