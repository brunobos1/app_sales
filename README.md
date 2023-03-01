<br />
<div align="center">

  <h3 align="center">Project Chart with API</h3>

</div>

## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

Simple project that extracts data from the portal https://www.mcoutinhopecas.pt/ adds it to data from a database, and converts it into a graph.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* [![Vue][Vue.js]][Vue-url]
* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

* [PHP 7+](https://www.php.net/downloads.php) 

* [Composer](https://getcomposer.org/download/) 

* npm
  ```sh
  npm install npm@latest -g
  ```

### Installation

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._

1. Clone the repo
    ```sh
    git clone https://github.com/your_username_/Project-Name.git
    ```

2. Install NPM packages
    ```sh
    npm install
    ```

3. Run the dev command
    ```sh
    npm run dev
    ```

4. Set Up the Application
    ```sh
    php artisan serve
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Optional

To use the API's CRUD routes, it is necessary to configure the Database, the application will work without it but only the GET method.

1. Configure then .env file with BD acess informations

2. Do the Migrations
    ```sh
    php artisan migrate
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Usage

The main page will only have the graph and the table, with the data merged from the page https://www.mcoutinhopecas.pt/ with whatever you want to insert in the database.

    ```sh
    php artisan migrate
    ```

With the command above you can take a look at the API routes and the methods to use them, the POST and PUT/PATCH methods, they need to contain a json in their body with the information year and value.

    ```sh
    {
        "year": "2023",
        "value": "10000000"
    }
    ```

To use the show, update and destroy methods you need to pass the year you want to query, the years extracted from mcoutinhopecas.pt are not available for consultation by these 3 methods.

    ```sh
    localhost:8000/api/production/2023
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Contact

Bruno Oliveira - [@Linkedin](https://www.linkedin.com/in/bruno-oliveira-4a6bb8169/) - brunobos21@gmail.com

Project Link: [Github](https://github.com/brunobos1/app_sales)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: Screenshot_1.png
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
