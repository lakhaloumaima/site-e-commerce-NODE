//url requete http =>  http://localhost:5000/api
// /users/
// les methodes http => post , get , put , delete
///child route
const express = require('express')
const route = express.Router()
const UserController = require('../controllers/UserController')
const isauth = require("../middlewares/auth");
const isadmin = require("../middlewares/isAdmin");
//create user
route.post('/', UserController.createuser);

// get user by id
route.get('/:id', isauth, UserController.getuserbyid);

//update user
route.put('/:id', isauth, UserController.updateuser);


//delete user
route.delete('/:id', isauth, isadmin, UserController.deleteuser);

// get all users 
route.get('/', isauth, isadmin, UserController.getallusers);

//auth
route.post('/login', UserController.authenticate);

module.exports = route;

//create admin et client => admin avec password crypted
//authentificate api users/login(admin,client)
//consommer delete user api