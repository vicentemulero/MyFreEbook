let divStars = document.querySelector('#divStars');
let divStarsNoUsers = document.querySelector('#divStarsNoUsers');
let qualifyStar = document.getElementById('averageRate').textContent;
let inputUserId = document.getElementById('inputUserId');
let inputBookId = document.getElementById('inputbookId');
let spanUserCommentary = document.getElementById('spanUserCommentary');
let buttonEditCommentary = document.getElementById('buttonEditCommentary');
let buttonSendCommentary = document.getElementById('buttonSendCommentary');
let buttonDeleteCommentary = document.getElementById('buttonDeleteCommentary');


/**
 * Shows the colored stars according to the value of the book
 */
for (let i = 1; i <= 5; i++) {
    if (qualifyStar >= i) {
        divStars.insertAdjacentHTML("beforeend", "<span><i class='fa fa-star' style='color: yellow 'id='" + i + "star' onclick='qualify(this)'></i></span>");
        divStarsNoUsers.insertAdjacentHTML("beforeend", "<span><i class='fa fa-star' style='color: yellow 'id='" + i + "star'></i></span>");
    } else {
        divStars.insertAdjacentHTML("beforeend", "<span><i class='fa fa-star' id='" + i + "star' onclick='qualify(this)'></i></span>");
        divStarsNoUsers.insertAdjacentHTML("beforeend", "<span><i class='fa fa-star' id='" + i + "star'></i></span>");
    }
}


let inputStar = document.getElementById('inputStar');
let starCount;

/**
 * Color the stars when the user clicks them
 *
 * @param item
 */
function qualify(item) {
    starCount = item.id[0];
    let nameStar = item.id.substring(1);
    for (let i = 0; i < 5; i++) {
        if (i < starCount) {
            document.getElementById((i + 1) + nameStar).style.color = "yellow";
            inputStar.setAttribute('value', starCount);
        } else {
            document.getElementById((i + 1) + nameStar).style.color = "black";
        }
    }
}

let linkShowImputCommentary = document.getElementById('showImputCommentary');
let inputCommentary = document.getElementById('commentary');

if (linkShowImputCommentary) {
    linkShowImputCommentary.addEventListener('click', function () {

        inputCommentary.removeAttribute('hidden');
    });

}

/**
 * Edit the user's comment using Fetch Api
 */
function editCommentary() {
    let newCommentary = document.getElementById('inputEditCommentary').value;
    let userId = inputUserId.value;
    let bookId = inputBookId.value;


    fetch("/api/ApiUserCommentary/editCommentary/?newCommentary=" + newCommentary + "&bookId=" + bookId + "&userId=" + userId, {
        method: 'get'
    }).then(function (response) {
        if (!response.ok) {
            throw Error(response.statusText);
        }
        return response.json();
    }).then(function (data) {

        spanUserCommentary.textContent = newCommentary;
        buttonEditCommentary.style.display = "block";
        buttonDeleteCommentary.style.display = "block";
        buttonSendCommentary.style.display = "none"

    }).catch(function (error) {
        console.error("Error en fetch de editar el comentario del usuario", error);
    });
}

/**
 * Remove the user's comment using Fetch Api
 */
function deleteCommentary() {
    let userId = inputUserId.value;
    let bookId = inputBookId.value;


    fetch("/api/ApiUserCommentary/deleteCommentary/?&bookId=" + bookId + "&userId=" + userId, {
        method: 'get'
    }).then(function (response) {
        if (!response.ok) {
            throw Error(response.statusText);
        }
        return response.json();
    }).then(function (data) {

        spanUserCommentary.textContent = "Tu comentario ha sido eliminado";
        buttonEditCommentary.style.display = "none";
        buttonSendCommentary.style.display = "none"
        buttonDeleteCommentary.style.display = "none";

    }).catch(function (error) {
        console.error("Error en fetch de borrar el comentario del usuario", error);
    });


}


if (spanUserCommentary) {

    buttonSendCommentary.style.display = "none";
    buttonEditCommentary.addEventListener('click', function () {

        let commentary = spanUserCommentary.textContent;
        spanUserCommentary.innerHTML = "<input class='form-control' type='text' value='" + commentary + "' id='inputEditCommentary'>";
        buttonEditCommentary.style.display = "none";
        buttonDeleteCommentary.style.display = "none";
        buttonSendCommentary.style.display = "block";
        buttonSendCommentary.addEventListener('click', editCommentary);
    });

    buttonDeleteCommentary.addEventListener('click', deleteCommentary);
};
