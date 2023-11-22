const {Sequelize, DataTypes} = require('sequelize');
const sequelize = require('../util/database');

const Orders = sequelize.define('orders', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    provider_id: {
        type: DataTypes.INTEGER,
        references: {
            model: 'providers',
            key: 'id'
        }
    },
    user_id: {
        type: DataTypes.INTEGER,
        references: {
            model: 'users',
            key: 'id'
        }
    },
    status_id: {
        type: DataTypes.INTEGER,
        references: {
            model: 'statuses',
            key: 'id'
        }
    },
    meal_id: {
        type: DataTypes.INTEGER,
        references: {
            model: 'meal_plans',
            key: 'id'
        }
    },
    promo_code_id: {
        type: DataTypes.INTEGER,
        references: {
            model: 'promo_codes',
            key: 'id'
        }
    },
    price_after_discount: {
        type: DataTypes.DOUBLE,
        allowNull: true
    },
    created_at: {
        type: DataTypes.DATE,
        allowNull: false,
        defaultValue: Sequelize.literal('CURRENT_TIMESTAMP')
    }

},{
    timestamps: false
});


module.exports = Orders;