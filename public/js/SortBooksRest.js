
let selectOrderBy = document.querySelector('#orderBy');
let formSortBooks= document.getElementById('formSortBooks');
let sortOptions= document.getElementsByClassName('sortOptions');
let optionHidden= document.getElementById('optionHidden').value;


selectOrderBy.addEventListener('change', () => {formSortBooks.submit();});

for (let i = 0; i < sortOptions.length; i++) {

    if(sortOptions[i].value === optionHidden){
        sortOptions[i].setAttribute("selected","");
    }
}

