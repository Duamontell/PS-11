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
    let publishDate = document.getElementById('date-input').value;
    let heroBig = document.getElementById('herobig-image').src;
    let heroSmall = document.getElementById('herosmall-image').src;
    let content = document.getElementById('content-input').value.trim();

    let titleValid = checkInput(title, '#title-input-error', '#title-input');
    let descriptionValid = checkInput(description, '#description-input-error', '#description-input');
    let authorNameValid = checkInput(authorName, '#author-input-error', '#author-input');
    let authorPhotoValid = checkInput(authorPhoto, '#author-photo-error', '#author-photo-input');
    let dateValid = checkInput(publishDate, '#date-input-error', '#date-input');
    let heroBigValid = checkInput(heroBig, '#herobig-input-error', '#herobig-input');
    let heroSmallValid = checkInput(heroSmall, '#herosmall-input-error', '#herosmall-input');

    if (titleValid || descriptionValid || authorNameValid || authorPhotoValid || dateValid || heroBigValid || heroSmallValid) {
        document.getElementById('message-block').style.display = 'flex';
        document.getElementById('message-block').style.borderLeft = '2px solid rgba(232, 105, 97, 1)';
        document.getElementById('message-block').style.background = 'rgba(255, 235, 234, 1)';
        document.getElementById('alert-image').src = 'images/SVG/alert-circle.svg';
        document.getElementById('alert-message').textContent = 'Whoops! Some fields need your attention :o';
        return;
    } else {
        document.getElementById('message-block').style.display = 'flex';
        document.getElementById('message-block').style.borderLeft = '2px solid rgba(103, 195, 140, 1)';
        document.getElementById('message-block').style.background = 'rgba(230, 252, 239, 1)';
        document.getElementById('alert-image').src = 'images/SVG/check-circle.svg';
        document.getElementById('alert-message').textContent = 'Publish Complete!';
    }

    let timestampPublishDate = Date.parse(publishDate); // Преобразуем дату в timestamp

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
        'Author-photo': authorPhoto,
        'Publish date': timestampPublishDate,
        'Hero big image': heroBig,
        'Hero small image': heroSmall,
        'Content': content,

    };
    console.log(JSON.stringify(jsonData, null, 3));
};

// Функция получения картинки автора и декодирования 
function AuthorImageChange(inputId, imageId, uploadButtonId, cameraImageId, removePanelId, previewAuthorPhoto) {
    let file = document.getElementById(inputId).files[0];
    let reader = new FileReader();

    reader.onload = function (srcChange) {
        document.getElementById(imageId).src = srcChange.target.result;
        document.getElementById(previewAuthorPhoto).src = srcChange.target.result;
    };

    setTimeout(() => {
        reader.readAsDataURL(file);
    }, 100);

    document.getElementById('author-photo').removeAttribute('style');
    document.getElementById(uploadButtonId).textContent = 'Upload New';
    document.getElementById(cameraImageId).style.display = 'block';
    document.getElementById(removePanelId).style.display = 'flex';
    document.getElementById(previewAuthorPhoto).removeAttribute('style');
}

// Функция получения картинки для поста 
function HeroImageChange(inputId, imageId, changePanel, heroContainer, uploadPanel, info, maxsize, previewImage) {
    let file = document.getElementById(inputId).files[0];

    if (file.size >= maxsize * 1024 * 1024) {
        document.getElementById(info).style.color = 'rgba(232, 105, 97, 1)';
        return;
    }

    document.getElementById(info).removeAttribute('style');
    let reader = new FileReader();

    reader.onload = function (srcChange) {
        document.getElementById(imageId).src = srcChange.target.result;
        document.getElementById(previewImage).src = srcChange.target.result;
    };

    setTimeout(() => {
        reader.readAsDataURL(file);
    }, 10);

    document.getElementById(info).style.display = 'none';
    document.getElementById(uploadPanel).style.display = 'none';
    document.getElementById(heroContainer).style.borderStyle = 'solid';
    document.getElementById(changePanel).style.display = 'flex';
    document.getElementById(imageId).removeAttribute('style');
    document.getElementById(previewImage).removeAttribute('style');
}

// Функция удаления иконки автора
function clickAuthorRemove() {
    document.getElementById('author-photo').removeAttribute('src');
    document.getElementById('author-photo').style.display = 'none';
    // document.getElementById('author-photo').src = 'images/SVG/author-photo-placeholder.svg';
    document.getElementById('upload-author-image').textContent = 'Upload';
    document.getElementById('camera-picture').removeAttribute('style');
    document.getElementById('remove-panel').removeAttribute('style');
    document.getElementById('preview-author-photo').removeAttribute('src');
    document.getElementById('preview-author-photo').style.display = 'none';
    document.getElementById('author-photo-input').value = '';
}

// Функция удаления изображения поста
function clickHeroRemove(heropanel, heroImage, heroUnderInfo, heroUploadPanel, heroInput, previewImage) {
    document.getElementById(heropanel).removeAttribute('style');
    document.getElementById(heroImage).removeAttribute('src');
    document.getElementById(heroImage).style.display = 'none'
    document.getElementById(previewImage).style.display = 'none'
    document.getElementById(heroUnderInfo).removeAttribute('style');
    document.getElementById(heroUploadPanel).removeAttribute('style');
    document.getElementById(heroInput).value = '';
    document.getElementById(previewImage).removeAttribute('src');
}

// Функция смена формата даты
function formatDate(inputDate) {
    let parts = inputDate.split('-');
    let year = parts[0];
    let month = parseInt(parts[1]);
    let day = parseInt(parts[2]);
    return month + '/' + day + '/' + year;
}

// Функция для изменения поля input content
function Resize(event) {
    contentInput = document.getElementById('content-input');
    let startX = event.clientX;
    let startY = event.clientY;
    let startWidth = contentInput.offsetWidth;
    let startPadding = parseFloat(getComputedStyle(contentInput).paddingBottom);

    function handleMouseMove(event) {
        let newWidth = startWidth + (event.clientX - startX);
        let newPadding = startPadding - (startY - event.clientY);

        if (newWidth > 180 && newWidth <= 940) {
            contentInput.style.width = newWidth + 'px';
        }
        if (newPadding >= 0 && newPadding <= 160) {
            contentInput.style.paddingBottom = newPadding + 'px';
        }
    }

    function handleMouseUp() { // Чтобы курсор не прилип к кнопке
        document.removeEventListener('mousemove', handleMouseMove);
        document.removeEventListener('mouseup', handleMouseUp);
    }

    document.addEventListener('mousemove', handleMouseMove);
    document.addEventListener('mouseup', handleMouseUp);
}
