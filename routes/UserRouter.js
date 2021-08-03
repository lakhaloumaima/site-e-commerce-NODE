//url requete http =>  http://localhost:5000/api

// /users/

// les methodes http => post , get , put , delete


///child route
const express = require('express')
const route = express.Router()
const UserController = require('../controllers/UserController')
route.post('/', UserController.createuser);
//route.delete('/:id', UserController.createuser);
module.exports = route