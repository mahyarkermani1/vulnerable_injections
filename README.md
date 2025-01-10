
# introduction

This project includes separate files with html, bootstrap, javascript, php and python, each of which is a lab vulnerable to injection attacks (command, os, code and sql injections).

The purpose of designing this series of labs is to understand how a vulnerable code works and how they can be exploited.

This project includes 4 vulnerable files with php and 1 vulnerable file with Python. It also has a new lab (sqlitraining) to practice SQL injection attacks in a unique way.

## How to use this repository

> [!WARNING]
> The codes in this repository are designed and written in  html, bootstrap, javascript, php and python. This source code has various vulnerabilities including **command injection**, **os injection**, **code injection**, **sql injections** and **other vulnerabilities**. So **do not** test and execute it in a real environment.

The purpose of designing this series of labs is to understand how a vulnerable code works and how they can be exploited.

The functions in this repository are described in a simple and understandable way so that users can study the source codes and understand how they work. You can run the codes by cloning the repository and run a web-server like apache.

**Linux Commands**

    # clone and move project files
    git clone https://github.com/mahyarkermani1/vulnerable_injections.git
    cd vulnerable_injections
    mv * /var/www/html

    # run the apache web-server
    sudo systemctl start apache2


Then after launching, you can access all the labs through the index.php file.
- You can first treat each lab as a normal user. Understand what the lab is used for and give it input and see the normal output.
- Then try to inject a vulnerability on it and see the output.
- To better understand the lab, you can click on the View Source button to show you the full source code of that lab.
- After exploiting that section, you can modify that source code, and secure it against your attack. To make sure that the application is secure, run your exploit once again.
