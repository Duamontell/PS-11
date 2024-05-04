//Функция проверки формы
function checkInput(inputValue, error, inputSelector) {
    if (inputValue === '') {
        document.querySelector(error).style.display = 'block';
        document.querySelector(error).style.color = 'rgba(232, 105, 97, 1)';
        document.querySelector(inputSelector).style.borderBottom = '1px solid rgba(232, 105, 97, 1)';
        document.querySelector(inputSelector).style.backgroundColor = 'rgba(255, 255, 255, 1)';
        return true;
    } else {
        // document.querySelector(error).style.display = 'none';
        // document.querySelector(inputSelector).style.borderBottom = '1px solid rgba(46, 46, 46, 1)';
        // document.querySelector(inputSelector).style.backgroundColor = 'rgba(247, 247, 247, 1)';
        document.querySelector(inputSelector).removeAttribute('style');
        document.querySelector(error).style.color = 'rgba(153, 153, 153, 1)';
        return false;
    }
};

// Функция отправки формы в консоль
function validateInputs() {
    let title = document.getElementById('title-input').value.trim();
    let description = document.getElementById('description-input').value.trim();
    let authorName = document.getElementById('author-input').value.trim();
    let authorPhoto = document.getElementById('author-photo').src;

    let titleValid = checkInput(title, '#title-input-error', '#title-input');
    let descriptionValid = checkInput(description, '#description-input-error', '#description-input');
    let authorValid = checkInput(authorName, '#author-input-error', '#author-input');

    if (titleValid || descriptionValid || authorValid) {
        return;
    }

    // const inputFields = document.querySelectorAll('.input-text');

    document.querySelectorAll('.input-text').forEach(input => {
        input.addEventListener('input', function () {
            this.removeAttribute('style');
        });
    });

    let jsonData = {
        "Post title": title,
        'Description': description,
        'Author-name': authorName,
        'Author-photo': authorPhoto
        
    };
    console.log(JSON.stringify(jsonData, null, 3));
};

// Функция получения картинки и декодирования
function handleImageChange() {
    const fileInput = this;
    const imageElement = document.getElementById('author-photo');
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function (srcChange) {
        imageElement.src = srcChange.target.result;
    };

    reader.readAsDataURL(file);
    document.getElementById('upload-author-image').textContent = 'Upload New';
    document.getElementById('camera-picture').style.display = 'block';
    document.getElementById('author-remove-panel').style.display = 'flex';
}