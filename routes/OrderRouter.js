//url requete http =>  http://localhost:5000/api
// /orders/
// les methodes http => post , get , put , delete
///child route
const express = require('express')
const route = express.Router()
const OrderController = require('../controllers/orderController')
const isadmin = require("../middlewares/isAdmin");
const isauth = require("../middlewares/auth");
//create user
route.post('/', isauth, OrderController.createorder);

// get user by id
route.get('/:id', isauth, OrderController.getorderbyid);

//update user
route.put('/:id', isauth, OrderController.updateorder);

//delete user
route.delete('/:id', isauth, OrderController.deleteorder);

// get all users 
route.get('/', isauth, isadmin, OrderController.getallorders);

module.exports = route;