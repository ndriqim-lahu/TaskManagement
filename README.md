# Task Management Tool

**Task Management Tool** is a web application designed to help users effortlessly organize and manage their tasks. Built with a focus on usability and efficiency, the tool allows users to create, read, and delete tasks, all while ensuring a secure and seamless experience. The application performs input validation during user authentication to maintain data integrity and enhance reliability. By leveraging a robust relational database, it stores and retrieves data persistently, ensuring uninterrupted task management across sessions.

This project is an ideal solution for individuals seeking a straightforward and reliable tool for daily task tracking. Its intuitive design ensures ease of use for beginners, while its underlying architecture is powerful enough to handle more complex workflows. The secure user authentication system offers peace of mind, allowing users to focus entirely on their productivity. Whether you're organizing personal tasks or managing multiple projects, this tool delivers a practical and effective solution.

## Built With

This web application was developed using the following tools, technologies, and resources:
- **HTML**
- **CSS**
- **Bootstrap**
- **JavaScript**
- **jQuery**
- **PHP**
- **MySQL**
- **Start Bootstrap Creative** — [Reference link](https://startbootstrap.com/theme/creative)

## Features

✅ **User Authentication:** Users can securely sign up and log in to their account, ensuring that only authorized individuals can access and manage their tasks.

✅ **Task Management:** The application allows users to easily create, read, and delete tasks, providing a simple yet effective way to stay organized and on top of their responsibilities.

✅ **Persistent Data Storage:** All tasks are stored in a MySQL database, which ensures that data is saved across sessions, so users never lose their information even when they log out or close the app.

✅ **Input Validation:** Input fields are thoroughly validated during user authentication and task creation to maintain data integrity, ensuring only valid information is entered and preventing errors.

✅ **Task List Interface:** The tasks are displayed in a clear, organized list with easy navigation, allowing users to quickly view, manage, and update their tasks efficiently.

✅ **Task Deletion:** Users can remove tasks they no longer need or want, allowing them to keep their task list up-to-date and focused on current priorities.

✅ **Responsive Design:** The web application is fully responsive, ensuring a seamless user experience across various devices such as desktops, tablets, and smartphones, adapting to different screen sizes.

## Prerequisites

Before starting, ensure the following is installed on your system:
- **XAMPP**
  - Download the [XAMPP](https://www.apachefriends.org/download.html).
  - Follow the [installation guide](https://www.apachefriends.org/faq_windows.html) to install and configure it properly.
  - XAMPP is required to run the web server, execute PHP code, and manage the MySQL database locally.
  - Verify your PHP installation by running the following command in your terminal:
    ```
    php -v
    ```
  - Ensure your system's `PATH` is properly configured to allow PHP commands to run globally from any location.

## Installation

1. Clone or download the repository to your local machine:
   ```
   git clone https://github.com/ndriqimlahu/task-management-tool.git
   ```
2. Ensure the repository folder is placed under the `htdocs` directory within your **XAMPP** installation folder, so that the web server can detect and run the web application.
3. Launch the **XAMPP Control Panel** and start the **Apache** and **MySQL** services.
4. Open **phpMyAdmin** or **MySQL**:
    - In your browser, go to `http://localhost/phpmyadmin/` to access the database server.
    - Click on **Databases** at the top.
    - In the **Create database** field, enter `task_management` and click **Create** button.
    - Once the database is created, click on the `task_management` database, then click the **Import** tab.
    - Click **Choose File**, select the `task-management.sql` file from the repository folder, and click **Import** button to import the database.
    - Follow the prompts to complete the import process.
5. Navigate to `http://localhost/task-management-tool/` using any modern web browser to view the web application locally.

## Screenshots

Below you can see some additional useful screenshots of what the web application looks like and how it can be used:

- Home page | Login page
<div>
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/01.1-Home%20page%20(Responsive%20for%20Desktop).png" align="top" width="48%" height="auto">
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/02.1-Login%20page%20(Responsive%20for%20Desktop).png" align="top" width="48%" height="auto">
   <hr>
</div>

- Sign up page | Task List page
<div>
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/03.1-Sign%20Up%20page%20(Responsive%20for%20Desktop).png" align="top" width="48%" height="auto">
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/04.1-Task%20List%20page%20(Responsive%20for%20Desktop).png" align="top" width="48%" height="auto">
   <hr>
</div>

- Add Task page | Task List page — A new task has been added
<div>
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/05.1-Add%20Task%20page%20(Responsive%20for%20Desktop).png" align="top" width="48%" height="auto">
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/06.1-Task%20List%20page%20(Added%20Single%20Task).png" align="top" width="48%" height="auto">
   <hr>
</div>

- Task List page — Many tasks have been added | Task List page — Some tasks have been removed
<div>
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/06.2-Task%20List%20page%20(Added%20Multi%20Tasks).png" align="top" width="48%" height="auto">
   <img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/06.3-Task%20List%20page%20(Delete%20Tasks).png" align="top" width="48%" height="auto">
   <hr>
</div>

- Task List page — All tasks have been removed
<img src="https://raw.githubusercontent.com/ndriqimlahu/task-management-tool/main/preview/06.4-Task%20List%20page%20(No%20Task).png" align="top" width="48%" height="auto">

## Support

If you find this project useful, please consider giving it a star!
