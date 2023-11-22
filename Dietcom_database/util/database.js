const mysql = require('mysql2');

const Sequelize = require('sequelize');
const sequelize = new Sequelize('nutrlbyte_2023', 'root', '', {
    dialect: 'mysql',
    host: 'localhost'
});

module.exports = sequelize;