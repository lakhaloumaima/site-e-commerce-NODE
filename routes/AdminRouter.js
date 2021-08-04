///child route
const express = require('express');
const route = express.Router();
const AdminController = require('../controllers/adminController')

//create admin
route.post('/', AdminController.createadmin);

module.exports = route