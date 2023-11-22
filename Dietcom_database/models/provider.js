const {Sequelize, DataTypes} = require('sequelize');
const sequelize = require('../util/database');

const Provider = sequelize.define('providers', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    user_type_id: {
        type: DataTypes.INTEGER,
        references: {
            model: 'user_types',
            key: 'id'
        }
    },
    name: {
        type: DataTypes.STRING,
        allowNull: false,
        required: true
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false,
        required: true
    },
    password: {
        type: DataTypes.STRING,
        allowNull: false,
        required: true
    },
    phone: {
        type: DataTypes.STRING,
        allowNull: false,
        required: true
    },
    description: {
        type: DataTypes.TEXT,
        allowNull: true
    },
    image: {
        type: DataTypes.STRING,
        allowNull: true
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

INSERT INTO `users` (`id`, `user_type_id`, `name`, `email`, `password`, `phone`, `image`, `active`, `created_at`) 
VALUES 
(NULL, '3', 'Provider', 'provider@shout-out.com', '123456', '0147852369', 'Provider_images/defalutUser.png', '1', current_timestamp());

*/

module.exports = Provider;