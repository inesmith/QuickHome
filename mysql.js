const mysql = require('mysql2');
const express = require('express');
const app = express();
const PORT = 3000; // or any port of your choice

// Create MySQL connection
const db = mysql.createConnection({
    host: 'localhost', // or your database host
    user: '', // your MySQL username
    password: '', // your MySQL password
    database: 'realestate' // your database name
});

// Connect to the database
db.connect((err) => {
    if (err) {
        console.error('Database connection failed: ' + err.stack);
        return;
    }
    console.log('Connected to database.');
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});

// Get all listings
app.get('/listings', (req, res) => {
    const query = 'SELECT * FROM Listings';
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            res.json(results);
        }
    });
});

// Get all users
app.get('/users', (req, res) => {
    const query = 'SELECT * FROM Users';
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            res.json(results);
        }
    });
});

// Get all agencies
app.get('/agencies', (req, res) => {
    const query = 'SELECT * FROM Agencies';
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            res.json(results);
        }
    });
});

// Get all comments
app.get('/comments', (req, res) => {
    const query = 'SELECT * FROM Comments';
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            res.json(results);
        }
    });
});

// Get all sales
app.get('/sales', (req, res) => {
    const query = 'SELECT * FROM Sales';
    db.query(query, (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            res.json(results);
        }
    });
});

// Add a new listing
app.post('/add-listing', (req, res) => {
    const { title, description, address, type, price, availableFrom, interiorDetails, exteriorDetails, features, agentId } = req.body;
    const query = 'INSERT INTO Listings (Title, Description, Address, Type, Price, AvailableFrom, InteriorDetails, ExteriorDetails, Features, AgentID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    
    db.query(query, [title, description, address, type, price, availableFrom, interiorDetails, exteriorDetails, features, agentId], (err, results) => {
        if (err) {
            res.status(500).send(err);
        } else {
            res.status(201).send('Listing added successfully.');
        }
    });
});
