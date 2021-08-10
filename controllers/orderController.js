const Order = require('../models/order');
const User = require('../models/user');
/////////order bsh yetzed ken lel client haka
module.exports = {
    createorder: (req, res) => {
        Order.create(req.body, (err, order) => {
            if (err) {
                res.status(500).json({
                    message: "order not created " + err,
                    data: null,
                });
            } else {
                User.findOneAndUpdate({ _id: req.body.client, __t: "client" }, { $push: { orders: order._id } },
                    (error, user) => {
                        if (error) {
                            res.status(500).json({
                                message: "order added but not pushed in user  ",
                                data: null,
                            });
                        } else {
                            res.status(200).json({
                                message: "order added and  pushed in user  ",
                                data: order,
                            });
                        }
                    }
                );
            }
        });
    },
    getallorders: (req, res) => {
        Order.find({})
            .populate({
                path: "client",
            })
            .populate({
                path: "products",
                populate: {
                    path: "category",
                }
            })
            .then((orders) => {
                res.status(201).json({
                    message: "order in system ",
                    data: orders,
                });
            })
            .catch((err) => {
                res.status(500).json({
                    message: "no such order in system",
                    data: null,
                });
            });
    },
    /* updateorder: (req, res) => {
            Order.findByIdAndUpdate({ _id: req.params.id },
                req.body,
                (err, order) => {
                    if (err) {
                        res.status(500).json({
                            message: "order not updated " + err,
                            data: null,
                        });
                    } else {
                        Order.findById({ _id: req.params.id }, (error, ord) => {
                            if (error) {
                                res.status(500).json({
                                    message: "error  updating " + err,
                                    data: null,
                                });
                            } else {
                                res.status(200).json({
                                    message: "order  updated ",
                                    data: ord,
                                });
                            }
                        })
                    }
                }
            );
        },
    */
    updateorder: (req, res) => {
        Order.findByIdAndUpdate({ _id: req.params.id }, req.body, (err, order) => {
            if (err) {
                res.status(500).json({
                    message: "order not updated " + err,
                    data: null,
                });
            } else {
                Order.findById({ _id: req.params.id })
                    .populate({ path: "client" })
                    .populate({
                        path: "products",
                        populate: {
                            path: "category",
                        },
                    })
                    .then((orders) => {
                        res.status(200).json({
                            message: "orders",
                            data: orders,
                        });
                    })
                    .catch((err) => {
                        res.status(500).json({
                            message: "error updateing",
                            data: null,
                        });
                    });
            }
        });
    },
    deleteorder: (req, res) => {
        Order.findByIdAndDelete({ _id: req.params.id }, (err, order) => {
            if (err) {
                res.status(500).json({
                    message: "error deleting order",
                    data: null,
                });
            } else {
                res.status(200).json({
                    message: "success deleting order",
                    data: order,
                });
            }
        });
    },
    getorderbyid: (req, res) => {
        Order.findById({ _id: req.params.id })
            .populate({
                path: "client",
            })
            .populate({
                path: "products",
                populate: {
                    path: "category",
                },
            })
            .then((order) => {
                if (!order) {
                    res.status(500).json({
                        message: "order not found ",
                        data: null,
                    });

                } else {
                    res.status(200).json({
                        message: "order  found ",
                        data: order,
                    });
                }

            })
            .catch((err) => {
                res.status(500).json({
                    message: "order not found in system ",
                    data: null,
                });
            });
    },


}