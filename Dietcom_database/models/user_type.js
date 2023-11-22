const {Sequelize, DataTypes} = require('sequelize');
const sequelize = require('../util/database');

const UserTypes = sequelize.define('user_types', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    name: {
        type: DataTypes.STRING,
        required: true
    }

});

/*

INSERT INTO `user_types` (`id`, `name`, `createdAt`, `updatedAt`) 
VALUES (NULL, 'Admin', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000'), 
(NULL, 'Nutrionist', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000'), 
(NULL, 'Provider', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000'), 
(NULL, 'User', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000');

*/

module.exports = UserTypes;