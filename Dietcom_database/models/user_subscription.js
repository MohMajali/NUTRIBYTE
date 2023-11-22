const {Sequelize, DataTypes} = require('sequelize');
const sequelize = require('../util/database');

const SubscriptionPayment = sequelize.define('subscriptions_payments', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    user_id: {
        type: DataTypes.INTEGER,
        references: {
            model: 'users',
            key: 'id'
        }
    },
    subscription_type: {
        type: DataTypes.STRING,
        allowNull: true
    },
    payment_type: {
        type: DataTypes.STRING,
        allowNull: true
    },
    from_date: {
        type: DataTypes.STRING,
        allowNull: true
    },
    to_date: {
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

},{
    timestamps: false
});


module.exports = SubscriptionPayment;