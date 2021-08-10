const jwt = require('jsonwebtoken');

function isauth(req, res, next) {
    const token = req.header("x-auth-token");
    ///check for token
    if (!token)
        return res.status(401).json({ msg: "no token , authorization denied " });
    try {
        //verify token
        const decoded = jwt.verify(token, "jwt-secret");
        //add user from payload
        req.user = decoded;
        next();

    } catch (e) {
        return res.status(400).json({ msg: "token is not valid " });
    }
};
module.exports = isauth;