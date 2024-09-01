<br />

![GitHub repo size](https://img.shields.io/github/repo-size/inesmith/QuickHome?color=lightblue)
![GitHub watchers](https://img.shields.io/github/watchers/inesmith/QuickHome?color=lightblue)
![GitHub language count](https://img.shields.io/github/languages/count/inesmith/QuickHome?color=lightblue)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/inesmith/QuickHome?color=lightblue)

<h5 align="center" style="padding:0;margin:0;">Iné Smith</h5>
<h5 align="center" style="padding:0;margin:0;">Student Number: 221076 <br> Email: 221076@virtualwindow.co.za</h5>
<h6 align="center">DV200 | Semester 2 Term 3</h6>

</br>
<p align="center">

  <a href="https://github.com/inesmith/QuickHome">
    <div align="center">
  <img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Untitled-43.png" width="200px">
</div>
  </a>

<h3 align="center">QuickHome Real Estate</h3>

  <p align="center">
    QuickHome is an online real estate platform that allows registered users to buy or rent properties and registered agencies to publish listings, providing a comprehensive and user-friendly experience for property sales and searches.
   <br />
   <br />
   <a href="">View Demo</a>
    ·
    <a href="https://github.com/inesmith/QuickHome/issues">Report Bug</a>
    ·
    <a href="https://github.com/inesmith/QuickHome/issues">Request Feature</a>
</p>

## Table of Contents

- [About the Project](#about-the-project)
  - [Project Description](#project-description)
  - [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Features and Functionality](#features-and-functionality)
- [Concept Process](#concept-process)
  - [Ideation](#ideation)
  - [Wireframes](#wireframes)
- [Development Process](#development-process)
  - [Implementation Process](#implementation-process)
    - [Highlights](#highlights)
    - [Challenges](#challenges)
  - [Future Implementation](#future-implementation)
- [Final Outcome](#final-outcome)
  - [Mockups](#mockups)
  - [Video Demonstration](#video-demonstration)
- [Conclusion](#conclusion)
- [License](#license)
- [Contact](#contact)
- [Acknowledgements](#acknowledgements)

## About the Project

### Project Description

Project Overview
QuickHome is an online real estate platform designed to streamline the process of buying, renting, and listing properties. The platform is specifically tailored to cater to the needs of both potential buyers/renters and real estate agencies. By providing a user-friendly interface and robust functionalities, QuickHome offers a seamless experience for property transactions, making it easier for users to find their desired properties and for agencies to manage their listings.

Problem It Solves
The real estate market often suffers from scattered information, inefficient communication, and outdated listings. QuickHome solves these issues by providing a centralized platform where users can easily browse available properties, and agencies can manage their listings in real-time. It addresses the need for a modern, intuitive, and responsive real estate website that caters to both users looking to buy or rent properties and real estate agencies looking to publish and manage property listings.

Main Features and Functionalities
User Registration and Authentication:

Only registered users can buy or rent properties, ensuring a secure and trustworthy environment.
Registration requires users to provide a unique username, email address, password, and other personal details like name and surname.
Secure login system with password encryption to protect user information.
Agency Registration and Listing Management:

Real estate agencies can register and publish listings on the platform.
Agencies can manage their listings, including adding property images, descriptions, pricing, and detailed specifications (interior and exterior features).
Each listing goes through a review process to ensure quality and compliance.
Property Listings with Detailed Information:

Listings provide comprehensive details, including property title, description, address, type (e.g., apartment, house), pricing, and availability.
Interior details such as the number of rooms, floor size, and amenities like WiFi, air conditioning, and floor heating.
Exterior details like lot size, garden, parking, and additional features such as pool access and gated community.
Users can view agent contact details for further inquiries.
Property Search and Filters:

Advanced search functionality allows users to filter properties by type, price range, location, and availability.
Dynamic search results ensure that users find the most relevant properties quickly.
Property Comparison:

Users can compare two properties side-by-side based on their features, pricing, and other details, helping them make informed decisions.
User Comments and Feedback:

Registered users can comment on property listings to share feedback or ask questions.
Each comment is associated with a unique CommentID, the user's username, and a date for easy tracking.
Secure Transactions:

The platform ensures that a listing can only be sold or rented to one user at a time, preventing double-booking and ensuring smooth transactions.
Responsive Design:

The website is built with a responsive design to provide an optimal experience on both desktop and mobile devices.
Unique Aspects and Technologies Used
LAMP Stack (Linux, Apache, MySQL, PHP): The platform is built using the LAMP stack, utilizing XAMPP as the local development environment. This stack provides a robust, reliable, and scalable backend with a dynamic and responsive frontend.
PHP and MySQL Integration: For secure user authentication, data management, and efficient CRUD operations for properties and users.
AJAX and JavaScript: For seamless user interactions and dynamic content updates without full-page reloads.
CSS and HTML: To create a responsive and visually appealing user interface that enhances the user experience.
Admin Dashboard: A backend dashboard for administrators to review listings, manage users, and handle disputes.

Project Structure and Flow

Home Page: The landing page provides an overview of the platform, featured listings, and a search bar for quick property searches.
User Dashboard: After logging in, users can access their dashboard to view saved properties, manage comments, and track their rental/purchase history.
Agency Dashboard: A dedicated section for registered agencies to manage their listings, view analytics on their properties, and respond to user inquiries.
Listing Detail Page: Displays all details about a property, including images, descriptions, features, and agent contact details.
Registration and Login Pages: User-friendly forms for new user or agency registration and existing user login.
Admin Panel: A separate section for site administrators to manage user accounts, approve or reject listings, and monitor site activity.

### Built With

1. MySQL: Used for the database to store all necessary data such as user information, property listings, and transactions.
2. PHP: A server-side scripting language that handles backend operations, connects to the MySQL database, processes forms, manages sessions, and performs CRUD (Create, Read, Update, Delete) operations.
3. CSS: Styles the HTML elements and ensures that the website is visually appealing and responsive across devices.
4. HTML: Provides the structure of the web pages.
5. avaScript: Adds interactivity to the front end, manages client-side validation, and can also be used for AJAX calls to dynamically update parts of the page without a full reload.

<img src="https://www.mysql.com/common/logos/logo-mysql-170x115.png" alt="MySQL Logo" width="100"> 
<img src="https://www.php.net/images/logos/new-php-logo.svg" alt="myPHP Logo" width="100">

## Getting Started

These instructions will help you set up the project locally for development and testing.

### Prerequisites

Before setting up and running the QuickHome real estate platform locally, ensure you have the following prerequisites installed on your machine:

PHP and MySQL:

To run PHP and MySQL locally, you need a local server stack. We recommend using XAMPP.
XAMPP: Download and install XAMPP, which comes bundled with Apache, PHP, and MySQL. This will provide a local server environment for development.

Git: Download and install Git for version control. It allows you to clone the repository, manage versions, and collaborate with others.
After installation, you can verify Git is installed by running the command git --version in your terminal or command prompt.

Web Browser: A modern web browser like Google Chrome or Mozilla Firefox is required to view and test the web application.
Additional Tools (Optional but Recommended)

### Installation

For installation, first, clone the repository from GitHub to your local machine. Open your terminal and:

1. Clone the repository:

```bash
git clone https://github.com/inesmith/QuickHome.git
```

2. Navigate to the project directory:

```bash
cd YourRepository
```

3. Set Up the Backend Server

   If you are using PHP and MySQL, set up your backend server with XAMPP.
   Place the project folder in the htdocs directory or the appropriate web root directory for your local server.

4. Configure the Database

   Open phpMyAdmin by navigating to http://localhost/phpmyadmin.
   Create a new database (e.g., realestate).
   Import the provided SQL file located in the /sql folder of your project to set up the necessary tables and data.

   Update the config.php or the environment configuration file with your database credentials:

```bash
 <?php
  $servername = "localhost";
  $username = "root"; // Default XAMPP username
  $password = ""; // Default XAMPP password (empty)
  $dbname = "your_database_name";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  ?>
```

5. Install Frontend Dependencies

   If your project involves using frontend libraries or frameworks (like React or Bootstrap), navigate to the frontend directory and install the necessary dependencies.

   For example, if you are using React (this command will install all the dependencies listed in package.json):

```bash
cd frontend
npm install
```

6. Run the Backend Server

   Start Apache and MySQL from your XAMPP control panel.
   Navigate to http://localhost/YourRepository in your browser to see the backend in action.

7. Start the Frontend Server (if applicable)

   If you are using a JavaScript framework like React for the frontend (this will start the frontend development server, typically available at http://localhost:3000):

```bash
npm start
```

8. Build the Frontend (if applicable)

   If you need to build the frontend for production, run (the production-ready files will be in the build directory, which can then be integrated with the PHP backend):

```bash
npm run build
```

9. Configure Environment Variables (if any)

   If your project requires environment variables, create a .env file in the root directory and add the necessary environment variables, such as API keys or other sensitive information.

```bash
REACT_APP_API_KEY=your_api_key_here
DB_HOST=localhost
DB_USER=root
DB_PASS=password
```

10. Debugging and Troubleshooting

    If you encounter any issues, check the browser console, terminal output, or server logs to identify and resolve errors.
    Ensure that Apache and MySQL services are running correctly.

## Planning & Results

### Logo

</br>
<p align="center">

  <a href="https://github.com/inesmith/QuickHome">
    <div align="center">
  <img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Untitled-43.png" width="200px">
</div>
  </a>

### Wireframes

<a href="https://github.com/inesmith/QuickHome"> 
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Sign Up QH.jpg" width="300px">
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Login QH.jpg" width="300px">
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Admin - Pending Comments QH.png" width="300px">
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Admin - Property Listings QH.png" width="300px">
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/All Listings QH.jpg" width="300px">
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Create Listing Wireframe QH.png" width="300px">
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Profile Page Wireframe QH.png" width="300px">
<div align="center">
<img src="/Applications/XAMPP/xamppfiles/htdocs/realestate/images/Listing Detail QH.jpg" width="300px">
</div>
<div align="left"></div>
  </a>

### Mockups
