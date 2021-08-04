//url requete http =>  http://localhost:5000/api
// /users/
// les methodes http => post , get , put , delete
///child route
const express = require('express')
const route = express.Router()
const UserController = require('../controllers/UserController')

//create user
route.post('/', UserController.createuser);

// get user by id
route.get('/:id', UserController.getuserbyid);

//update user
route.put('/:id', UserController.updateuser);


//delete user
route.delete('/:id', UserController.deleteuser);

// get all users 
route.get('/', UserController.getallusers);

module.exports = route