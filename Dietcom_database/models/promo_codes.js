const {Sequelize, DataTypes} = require('sequelize');
const sequelize = require('../util/database');

const PromoCode = sequelize.define('promo_codes', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    code: {
        type: DataTypes.STRING,
        required: true
    },
    discount: {
        type: DataTypes.DOUBLE,
        required: true
    },
    active: {
        type: DataTypes.INTEGER,
        allowNull: false,
        defaultValue: 1,
    },
    created_at: {
        type: DataTypes.DATE,
        allowNull: false,
        defaultValue: Sequelize.literal('CURRENT_TIMESTAMP')
    }
}, {
    timestamps: false
});

/*

INSERT INTO `user_types` (`id`, `name`, `createdAt`, `updatedAt`) 
VALUES (NULL, 'Admin', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000'), 
(NULL, 'Experts', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000'), 
(NULL, 'Provider', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000'), 
(NULL, 'User', '2023-03-18 15:09:35.000000', '2023-03-18 15:09:35.000000');

*/

module.exports = PromoCode;