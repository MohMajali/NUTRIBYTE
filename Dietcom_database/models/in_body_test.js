const {Sequelize, DataTypes} = require('sequelize');
const sequelize = require('../util/database');

const InBodyTest = sequelize.define('in_body_tests', {
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
    heigh: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    intraoelluar_water: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    extraoelluar_water: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    lean_mass: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    fat_mass: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    body_water: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    weight: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    age: {
        type: DataTypes.DOUBLE,
        allowNull: false,
        required: true
    },
    gender: {
        type: DataTypes.STRING,
        allowNull: false,
        required: true
    },
    created_at: {
        type: DataTypes.DATE,
        allowNull: false,
        defaultValue: Sequelize.literal('CURRENT_TIMESTAMP')
    }

}, {
    timestamps: false
});

module.exports = InBodyTest;