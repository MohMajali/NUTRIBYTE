const {Sequelize, DataTypes} = require('sequelize');
const sequelize = require('../util/database');

const Status = sequelize.define('statuses', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    name: {
        type: DataTypes.STRING,
        allowNull: false
    },

},{
    timestamps: false
});

/*

INSERT INTO `statuses` (`id`, `name`) VALUES (NULL, 'Pending'), (NULL, 'Accepted'), (NULL, 'Rejected'), (NULL, 'Delivered'), (NULL, 'Delivering');

*/

module.exports = Status;