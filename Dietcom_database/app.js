const express = require('express');
const sequelize = require('./util/database');
const bodyParser = require('body-parser');
const path = require('path');

const UserTypes = require('./models/user_type');
const Advertisement = require('./models/advertisement');
const Status = require('./models/status');
const User = require('./models/user');
const InBodyTest = require('./models/in_body_test');
const Provider = require('./models/provider');
const MealPlan = require('./models/meal_plans');
const Chat = require('./models/chat');
const PromoCode = require('./models/promo_codes');
const Orders = require('./models/order');
const SubscriptionPayment = require('./models/user_subscription');
const Reservation = require('./models/reservation');

const app = express();
app.use(bodyParser.json());


sequelize
.sync({ force: true })
// .sync()
.then(result => {
    const server = app.listen(8080);
})
.catch(err => {
    console.log('ERROR',err);
});