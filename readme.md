# AnnexBios Headquarters API

Welcome to the AnnexBios Headquarters API repository! This project serves as the core backend system for all our movie theater establishments, providing a centralized API for data management and communication between branches. We also host a homepage that provides general information.

## Project Structure

Here's an overview of the main folders and files in this repository:

- **`dummy_data/`**: This folder contains JSON files with dummy data used for testing and development purposes. The structure of these files mimics the actual data used in production.
- **`documents/`**: In this folder, you'll find the API User Guide, which provides comprehensive documentation on how to use the AnnexBios API, including available endpoints and request/response formats.

## Installation Guide

To set up the project on your local environment, follow these steps:

### Prerequisites

1. **XAMPP**: Download and install [XAMPP](https://www.apachefriends.org/index.html), which includes Apache, MySQL (via phpMyAdmin), and PHP.
2. **PHP**: Ensure PHP is installed and configured via XAMPP.
3. **MySQL Database**: The project uses MySQL with the `mysqli` extension.

### Steps

1. **Clone The Repository**:
   Clone the repository to your local machine using Git:
   ```bash
   git clone https://github.com/NoahMelle/annexbios.git

2. **Move Project To XAMPP Folder**:
    Move the cloned project folder to the XAMPP htdocs directory, which is typically located at:
    ```
    C:/xampp/htdocs/

    This step allows the project to be accessible via your local server.
3. **Set Up The Database**:
    Open phpMyAdmin by visiting http://localhost/phpmyadmin/.
    Create a new database with the name `u123340p119668_annexbios`.
    Import the database schema from the provided .sql file, located in the **`db_export/`** folder.

4. **Set Up The .env File**
    Create a .env file in the root directory of this project.
    paste this code with your data inside:
    ```.env
    DBHOST=*YOUR DB HOST*
    DBUSERNAME=*YOUR DB USERNAME*
    DBPASSWORD=*YOUR DB PASSWORD*
    DBNAME=*YOUR DB NAME*

    THEMOVIEDB_AUTH_TOKEN=**PROVIDED IN THE MAIL**
    THEMOVIEDB_AUTH_KEY=**PROVIDED IN THE MAIL**

    BASEURL=http://localhost/annexbios/

    ENCRYPTION_SECRET=**PROVIDED IN THE MAIL**
    MAX_REQUESTS_PER_MINUTE=50
    AVERAGE_MS_FOR_TIMEOUT=1000

    DEFAULT_MINIMUM_PRICE=9,00

5. **Start XAMPP**:
    Open the XAMPP control panel and start Apache and MySQL services.

6. **Access the project**:
    After setting everything up, you can access the API via your web browser by going to:
    ```
    http://localhost/annexbios/