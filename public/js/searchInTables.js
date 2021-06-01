let inputSearchBook = document.getElementById('inputSearchBook');
let inputSearchAuthor = document.getElementById('inputSearchAuthor');
let inputSearchGenre = document.getElementById('inputSearchGenre');
let inputSearchUser = document.getElementById('inputSearchUser');

let divNoFound = document.getElementById('divNoFound');
let new_Tr = document.getElementById('new_Tr');
let new_Td = document.getElementsByClassName('new_Td');

new_Tr.style.display = "none";


function convertDate(date) {

    let mm = parseInt(date.getMonth()) + 1;
    let dd = date.getDate();
    let yy = date.getFullYear();
    let hh = date.getHours() - 2;
    let min = parseInt(date.getMinutes());
    let ss = parseInt(date.getSeconds());


    if (mm.toString().length === 1) {
        mm = "0" + mm;
    }
    if (hh.toString().length === 1) {
        hh = "0" + hh;
    }
    if (min.toString().length === 1) {
        min = "0" + min;
    }
    if (ss.toString().length === 1) {
        ss = "0" + ss;
    }

    date = yy + "-" + mm + "-" + dd + " " + hh + ":" + min + ":" + ss;

    return date;
}


function searchTableBook() {
    let text = inputSearchBook.value.toLowerCase();

    if (text == 0) {

        divNoFound.style.display = "none";
        new_Tr.style.display = "none";

    }

    if (text.length > 0) {

        fetch("api/ApiSearch/book/?text=" + text, {
                method: 'get'
            })
            .then(function (response) {
                if (!response.ok) {
                    throw Error(response.statusText);
                }
                return response.json();
            }).then(function (data) {

                if (data.length < 1) {

                    divNoFound.style.display = "block";
                    new_Tr.style.display = "none";

                } else {
                    new_Tr.style.display = "table-row";

                    if (divNoFound.style.display == "block") {
                        divNoFound.style.display = "none"
                    }

                    data.forEach(book => {
                        let created_at = new Date(book.created_at);
                        let updated_at = new Date(book.updated_at);
                        let formDeleteBook = document.getElementById('formDeleteBook');
                        let linkEditBook = document.getElementById('linkEditBook');

                        formDeleteBook.action = "/AdminBook/" + book.id;
                        linkEditBook.setAttribute('href', "/AdminBook/" + book.id + "/edit")

                        new_Td[0].textContent = book.id;
                        new_Td[1].innerHTML = "<img src='/" + book.cover_link + "' class='adminListCovers'style=' width: 100px;  height: 120px;'>";
                        new_Td[2].textContent = book.title;
                        new_Td[3].innerHTML = book.author_id + "- <br>" + book.author_name;
                        new_Td[4].textContent = book.genre_id + " - " + book.genre_name;
                        new_Td[5].innerHTML = "<div><p class='pSynopsis'>" + book.synopsis + "</p></div>";
                        new_Td[6].textContent = book.download_link;
                        new_Td[7].innerHTML = convertDate(created_at);
                        new_Td[8].innerHTML = convertDate(updated_at);

                    });
                }

            }).catch(function (error) {
                console.error("Error en fetch de buscar Libro en el listado de libros", error);
            });
    }
};

function searchTableAuthor() {
    let text = inputSearchAuthor.value.toLowerCase();

    if (text == 0) {

        divNoFound.style.display = "none";
        new_Tr.style.display = "none";

    }

    if (text.length > 0) {

        fetch("api/ApiSearch/author/?text=" + text, {
                method: 'get'
            })
            .then(function (response) {
                if (!response.ok) {
                    throw Error(response.statusText);
                }
                return response.json();
            }).then(function (data) {

                if (data.length < 1) {

                    divNoFound.style.display = "block";
                    new_Tr.style.display = "none";

                } else {
                    new_Tr.style.display = "table-row";

                    if (divNoFound.style.display == "block") {
                        divNoFound.style.display = "none"
                    }

                    data.forEach(author => {

                        let formDeleteAuthor = document.getElementById('formDeleteAuthor');
                        let linkEditAuthor = document.getElementById('linkEditAuthor');

                        formDeleteAuthor.action = "/AdminAuthor/" + author.id;
                        linkEditAuthor.setAttribute('href', "/AdminAuthor/" + author.id + "/edit")

                        new_Td[0].textContent = author.id;
                        new_Td[1].textContent = author.name;

                    });
                }

            }).catch(function (error) {
                console.error("Error en fetch de buscar Autor en el listado de autores", error);
            });
    }
}


function searchTableGenre() {
    let text = inputSearchGenre.value.toLowerCase();

    if (text == 0) {

        divNoFound.style.display = "none";
        new_Tr.style.display = "none";

    }

    if (text.length > 0) {

        fetch("api/ApiSearch/genre/?text=" + text, {
                method: 'get'
            })
            .then(function (response) {
                if (!response.ok) {
                    throw Error(response.statusText);
                }
                return response.json();
            }).then(function (data) {

                if (data.length < 1) {

                    divNoFound.style.display = "block";
                    new_Tr.style.display = "none";

                } else {
                    new_Tr.style.display = "table-row";

                    if (divNoFound.style.display == "block") {
                        divNoFound.style.display = "none"
                    }

                    data.forEach(genre => {

                        let formDeleteGenre = document.getElementById('formDeleteGenre');
                        let linkEditGenre = document.getElementById('linkEditGenre');

                        formDeleteGenre.action = "/AdminGenre/" + genre.cod;
                        linkEditGenre.setAttribute('href', "/AdminGenre/" + genre.cod + "/edit")

                        new_Td[0].textContent = genre.cod;
                        new_Td[1].textContent = genre.name;

                    });
                }

            }).catch(function (error) {
                console.error("Error en fetch de buscar Género en el listado de géneros", error);
            });
    }
}

function searchTableUser() {
    let text = inputSearchUser.value.toLowerCase();

    if (text == 0) {

        divNoFound.style.display = "none";
        new_Tr.style.display = "none";

    }

    if (text.length > 0) {

        fetch("api/ApiSearch/user/?text=" + text, {
                method: 'get'
            })
            .then(function (response) {
                if (!response.ok) {
                    throw Error(response.statusText);
                }
                return response.json();
            }).then(function (data) {

                if (data.length < 1) {

                    divNoFound.style.display = "block";
                    new_Tr.style.display = "none";

                } else {
                    new_Tr.style.display = "table-row";

                    if (divNoFound.style.display == "block") {
                        divNoFound.style.display = "none"
                    }
                    data.forEach(user => {

                        let created_at = new Date(user.created_at);
                        let updated_at = new Date(user.updated_at);
                        let formDeleteUser = document.getElementById('formDeleteUser');
                        let linkEditUser = document.getElementById('linkEditUser');

                        formDeleteUser.action = "/AdminUser/" + user.id;
                        linkEditUser.setAttribute('href', "/AdminUser/" + user.id + "/edit")

                        new_Td[0].textContent = user.id;
                        new_Td[1].textContent = user.name;
                        new_Td[2].textContent = user.email;
                        new_Td[3].textContent = user.rol;
                        new_Td[4].textContent = convertDate(created_at);
                        new_Td[5].textContent = convertDate(updated_at);

                    });
                }

            }).catch(function (error) {
                console.error("Error en fetch de buscar Usuario en el listado de usuarios", error);
            });
    }
}


if (inputSearchBook) {
    inputSearchBook.addEventListener('keyup', searchTableBook);
} else if (inputSearchAuthor) {
    inputSearchAuthor.addEventListener('keyup', searchTableAuthor);
} else if (inputSearchGenre) {
    inputSearchGenre.addEventListener('keyup', searchTableGenre);
} else if (inputSearchUser) {
    inputSearchUser.addEventListener('keyup', searchTableUser);
}
