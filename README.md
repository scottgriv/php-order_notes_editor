<!-- Begin README -->

<div align="center">
    <a href="https://github.com/scottgriv/php-order_notes_editor" target="_blank">
        <img src="./docs/images/icon.png" width="150" height="150"/>
    </a>
</div>
<p align="center">
    <a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php" alt="PHP Badge" /></a>
    <a href="https://www.mysql.com/"><img src="https://img.shields.io/badge/MySQL-8.3-4479A1?style=for-the-badge&logo=mysql" alt="MySQL Badge" /></a>
    <a href="https://www.apachefriends.org/blog/new_xampp_20220516.html"><img src="https://img.shields.io/badge/XAMPP-8.1.6-FB7A24?style=for-the-badge&logo=xampp" alt="XAMPP Badge" /></a>
    <br>
    <a href="https://github.com/scottgriv"><img src="https://img.shields.io/badge/github-follow_me-181717?style=for-the-badge&logo=github&color=181717" alt="GitHub Badge" /></a>
    <a href="mailto:scott.grivner@gmail.com"><img src="https://img.shields.io/badge/gmail-contact_me-EA4335?style=for-the-badge&logo=gmail" alt="Email Badge" /></a>
    <a href="https://www.buymeacoffee.com/scottgriv"><img src="https://img.shields.io/badge/buy_me_a_coffee-support_me-FFDD00?style=for-the-badge&logo=buymeacoffee&color=FFDD00" alt="BuyMeACoffee Badge" /></a>
    <br>
    <a href="https://prgportfolio.com" target="_blank"><img src="https://img.shields.io/badge/PRG-Bronze Project-CD7F32?style=for-the-badge&logo=data:image/svg%2bxml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMjYuMDAwMDAwcHQiIGhlaWdodD0iMzQuMDAwMDAwcHQiIHZpZXdCb3g9IjAgMCAyNi4wMDAwMDAgMzQuMDAwMDAwIgogcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pZFlNaWQgbWVldCI+Cgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjAwMDAwMCwzNC4wMDAwMDApIHNjYWxlKDAuMTAwMDAwLC0wLjEwMDAwMCkiCmZpbGw9IiNDRDdGMzIiIHN0cm9rZT0ibm9uZSI+CjxwYXRoIGQ9Ik0xMiAzMjggYy04IC04IC0xMiAtNTEgLTEyIC0xMzUgMCAtMTA5IDIgLTEyNSAxOSAtMTQwIDQyIC0zOCA0OAotNDIgNTkgLTMxIDcgNyAxNyA2IDMxIC0xIDEzIC03IDIxIC04IDIxIC0yIDAgNiAyOCAxMSA2MyAxMyBsNjIgMyAwIDE1MCAwCjE1MCAtMTE1IDMgYy04MSAyIC0xMTkgLTEgLTEyOCAtMTB6IG0xMDIgLTc0IGMtNiAtMzMgLTUgLTM2IDE3IC0zMiAxOCAyIDIzCjggMjEgMjUgLTMgMjQgMTUgNDAgMzAgMjUgMTQgLTE0IC0xNyAtNTkgLTQ4IC02NiAtMjAgLTUgLTIzIC0xMSAtMTggLTMyIDYKLTIxIDMgLTI1IC0xMSAtMjIgLTE2IDIgLTE4IDEzIC0xOCA2NiAxIDc3IDAgNzIgMTggNzIgMTMgMCAxNSAtNyA5IC0zNnoKbTExNiAtMTY5IGMwIC0yMyAtMyAtMjUgLTQ5IC0yNSAtNDAgMCAtNTAgMyAtNTQgMjAgLTMgMTQgLTE0IDIwIC0zMiAyMCAtMTgKMCAtMjkgLTYgLTMyIC0yMCAtNyAtMjUgLTIzIC0yNiAtMjMgLTIgMCAyOSA4IDMyIDEwMiAzMiA4NyAwIDg4IDAgODggLTI1eiIvPgo8L2c+Cjwvc3ZnPgo=" alt="Bronze" /></a>
</p>

---------------

<h1 align="center">Order Notes Editor</h1>

This webapp solves a specific problem with ERP applications - the inability to paste multiple lines of text into note fields. It allows users to easily paste and manage multiline text, overcoming the limitations commonly found in ERP systems. This tool focuses on simplicity and efficiency, making it ideal for enhancing data entry and note-taking within enterprise applications. 

Add, edit, and delete order notes in bulk using a `PHP` script and `MySQL` database (or any other database of your choice).

<div align="center">
    <img src="./docs/images/demo_1.png" width="50%" />
</div>
<br>
<div align="center">
    <img src="./docs/images/demo_2.png" width="50%" />
</div>
<br>
<div align="center">
    <img src="./docs/images/demo_3.png" width="50%" />
</div>

---------------

## Table of Contents

- [Getting Started](#getting-started)
- [Resources](#resources)
- [License](#license)
- [Credits](#credits)

## Getting Started

> [!TIP]
> By default, the application uses `mysqli` to connect to a `MySQL` database. You can use any database you want by changing the connection method in the `config.php` file (to `odbc`, `pdo`, etc. for example).

This project is designed to be run on a local server. You can use [XAMPP](https://www.apachefriends.org/index.html) to run a local server on your machine.

1. Clone the repository to your local machine.
2. Create a database in MySQL using the `order_notes.sql` file in the `sql` folder.
3. Update the `config.php` file in the `includes` folder with your database credentials.
4. Open the `access.php` file in your browser.
5. Enter a valid order number and click the `Submit` button.
6. Add, edit, or delete notes as needed.
7. Click the `Submit` button to save your changes.
8. Click the `Back` button to return to the order number input screen.
9. Click the `Lines` button to view the order lines for the order number you entered.
10. Add, edit, or delete notes as needed for each order line.

## Resources

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [XAMPP](https://www.apachefriends.org/index.html)

## License

This project is released under the terms of the **MIT License**, which permits use, modification, and distribution of the code, subject to the conditions outlined in the license.
- The [MIT License](https://choosealicense.com/licenses/mit/) provides certain freedoms while preserving rights of attribution to the original creators.
- For more details, see the [LICENSE](LICENSE) file in this repository. in this repository.

## Credits

**Author:** [Scott Grivner](https://github.com/scottgriv) <br>
**Email:** [scott.grivner@gmail.com](mailto:scott.grivner@gmail.com) <br>
**Website:** [linktr.ee/scottgriv](https://www.linktr.ee/scottgriv) <br>
**Reference:** [Main Branch](https://github.com/scottgriv/php-order_notes_editor) <br>

---------------

<div align="center">
    <a href="https://linktr.ee/scottgriv" target="_blank">
        <img src="./docs/images/footer.png" width="100" height="100"/>
    </a>
</div>

<!-- End README -->