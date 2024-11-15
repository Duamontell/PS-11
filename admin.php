<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <script src="js\admin.js"></script>
</head>

<body>
    <header>
        <div class="panel">
            <img class="header-logo" src="images\SVG\escape-author.svg" alt="Logo Escape">
            <div class="panel__menu">
                <div class="user-avatar">N</div>
                <img class="logout-button" src="images\SVG\logout-white.svg" alt="Logout button">
            </div>
        </div>
    </header>
    <div class="new-post-publish">
        <div>
            <h1 class="title">New Post</h1>
            <h2 class="subtitle">Fill out the form bellow and publish your article</h2>
        </div>
        <button type="button" class="publish-button">Publish</button>
        <script>
            document.querySelector('.publish-button').addEventListener('click', function () {
                validateInputs();
            });
        </script>
    </div>
    <div class="main-information">
        <div id="message-block">
            <img id="alert-image">
            <h4 id="alert-message"></h4>
        </div>
        <div class="main-information-block">
            <h2 class="main-information__title">Main Information</h2>
            <div class="post">
                <form class="post-form">
                    <div class="post-input-info">
                        <h3 class="small-titles">Title</h3>
                        <input id="title-input" class="input-text" type="text" placeholder="New Post" required size="62"
                            maxlength="90">
                        <div id="title-input-error" class="input-error">Title is required.</div>
                    </div>
                    <div class="post-input-info">
                        <h3 class="small-titles">Short description</h3>
                        <input id="description-input" class="input-text" type="text"
                            placeholder="Please, enter any description" required size="90" maxlength="150">
                        <div id="description-input-error" class="input-error">Description is required.</div>
                    </div>
                    <div class="post-input-info">
                        <h3 class="small-titles">Author name</h3>
                        <input id="author-input" class="input-text" type="text" placeholder="Please, enter author name"
                            required maxlength="90">
                        <div id="author-input-error" class="input-error">Author name is required.</div>
                    </div>
                    <div class="post-input-info">
                        <h3 class="small-titles">Author Photo </h3>
                        <div class="photo-upload-container">
                            <div id="image-container">
                                <img id="author-photo">
                            </div>
                            <input id="author-photo-input" type="file">
                            <div class="upload-panel">
                                <img id="camera-picture" src="images\SVG\camera.svg">
                                <button type=button id='upload-author-image' class="upload-button"
                                    onclick="document.getElementById('author-photo-input').click()">Upload</button>
                            </div>
                            <div id="remove-panel">
                                <img class="trash-can" src="images\SVG\trash-can.svg">
                                <button type="button" id="remove-author-image" class="remove-button">Remove</button>
                            </div>
                        </div>
                        <div id="author-photo-error" class="input-error">Author photo is required.</div>
                    </div>
                    <div class="post-input-info">
                        <h3 class="small-titles">Publish Date</h3>
                        <input id="date-input" class="input-text" type="date" required>
                        <div id="date-input-error" class="input-error">Publish Date is required.</div>
                    </div>
                    <div class="post-input-info">
                        <h3 class="small-titles">Hero Image </h3>
                        <input id="herobig-input" class="input-text" type="file" required>
                        <div id="herobig-container" class="hero-container" style="position: relative;">
                            <img id="herobig-image" class="hero-image" style="display: none;">
                            <div id="herobig-upload-panel" class="upload-panel">
                                <img id="camera-picture" src="images\SVG\camera.svg" style="display: block;">
                                <button type=button id='upload-herobig-image' class="upload-button"
                                    onclick="document.getElementById('herobig-input').click()">Upload</button>
                            </div>
                        </div>
                        <div id="herobig-panel" class="hero-panel">
                            <div class="upload-panel">
                                <img id="camera-picture" src="images\SVG\camera.svg" style="display: flex;">
                                <button type=button id='upload-herobig-image' class="upload-button"
                                    onclick="document.getElementById('herobig-input').click()">Upload New</button>
                            </div>
                            <div id="remove-panel" style="display: flex;">
                                <img class="trash-can" src="images\SVG\trash-can.svg">
                                <button type="button" id="remove-herobig-image" class="remove-button">Remove</button>
                            </div>
                        </div>
                        <div id="herobig-input-error" class="input-error">Hero Image is required.</div>
                        <div id="herobig-under-info" class="small-titles hero-small-titles">Size up to 10mb. Format:
                            png, jpeg, gif.
                        </div>
                    </div>
                    <div class="post-input-info">
                        <h3 class="small-titles">Hero Image</h3>
                        <input id="herosmall-input" class="input-text" type="file" required>
                        <div id="herosmall-container" class="hero-container" style="position: relative;">
                            <img id="herosmall-image" class="hero-image" style="display: none;">
                            <div id="herosmall-upload-panel" class="upload-panel">
                                <img id="camera-picture" src="images\SVG\camera.svg" style="display: block;">
                                <button type=button id='upload-herosmall-image' class="upload-button"
                                    onclick="document.getElementById('herosmall-input').click()">Upload</button>
                            </div>
                        </div>
                        <div id="herosmall-panel" class="hero-panel">
                            <div class="upload-panel">
                                <img id="camera-picture" src="images\SVG\camera.svg" style="display: flex;">
                                <button type=button id='upload-herosmall-image' class="upload-button"
                                    onclick="document.getElementById('herosmall-input').click()">Upload New</button>
                            </div>
                            <div id="remove-panel" style="display: flex;">
                                <img class="trash-can" src="images\SVG\trash-can.svg">
                                <button type="button" id="remove-herosmall-image" class="remove-button">Remove</button>
                            </div>
                        </div>
                        <div id="herosmall-input-error" class="input-error">Hero Image is required.</div>
                        <div id="herosmall-under-info" class="small-titles hero-small-titles">Size up to 5mb. Format:
                            png, jpeg, gif.
                        </div>
                    </div>
                    <div class="post-input-info">
                        <h3 class="small-titles">Select category</h3>
                        <div class="select-type">
                        <label>
                            <input type="radio" name="post-category" value="1" id="featured-type-post">
                            <span class="type-name">Featured</span>
                        </label>
                        <label>
                            <input type="radio" name="post-category" value="0" id="most-recent-type-post">
                            <span class="type-name">Most recent</span>
                        </label>
                        </div>
                        <div id="type-post-error" class="input-error">Type post is required.</div>
                    </div>
                </form>
                <div class="post-preview">
                    <div class="article-preview">
                        <h3 class="preview-small-titles">Article preview</h3>
                        <div class="page-preview">
                            <div class="page-post-preview">
                                <div class="page-panel">
                                    <div class="ball"></div>
                                    <div class="ball"></div>
                                    <div class="ball"></div>
                                </div>
                                <h3 id="preview-title">New Post</h3>
                                <h4 id="preview-subtitle">Please, enter any description</h4>
                                <div class="preview-herobig">
                                    <img id="preview-herobig-image" class="hero-image preview-image"
                                        style="display: none;">
                                </div>
                            </div>
                            <!-- <div class="page-gradient"></div> -->
                        </div>
                    </div>
                    <div class="post-card-preview" style="max-width: 400px;">
                        <h3 class="preview-small-titles">Post card preview</h3>
                        <div class="page-preview">
                            <div class="post-card">
                                <div class="preview-herosmall">
                                    <img id="preview-herosmall-image" class="hero-image preview-image"
                                        style="display: none;">
                                </div>
                                <div class="preview-description">
                                    <h3 id="preview-card-title">New Post</h3>
                                    <h4 id="preview-card-subtitle">Please, enter any description</h4>
                                </div>
                                <div class="preview-info-panel">
                                    <div class="preview-author">
                                        <img id="preview-author-photo" style="display: none;">
                                    </div>
                                    <h3 id="preview-author-name">Enter author name</h3>
                                    <h3 id="preview-date">4/19/2023</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-information-block">
            <h2 class="main-information__title">Content</h2>
            <div class="content-info">
                <h3 class="small-titles">Post content (plain text)</h3>
                <input id="content-input" type="text" required>
                <button id="resize-button"></button>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.input-text').forEach(input => {
            input.addEventListener('input', () => {
                input.removeAttribute('style');
            });
        });
        document.getElementById('author-photo-input').addEventListener('change', function () {
            AuthorImageChange('author-photo-input', 'author-photo', 'upload-author-image', 'camera-picture', 'remove-panel', 'preview-author-photo');
        });
        document.getElementById('remove-author-image').addEventListener('click', clickAuthorRemove);
        document.getElementById('herobig-input').addEventListener('change', function () {
            HeroImageChange('herobig-input', 'herobig-image', 'herobig-panel', 'herobig-container', 'herobig-upload-panel', 'herobig-under-info', 10, 'preview-herobig-image');
        });
        document.getElementById('remove-herobig-image').addEventListener('click', function () {
            clickHeroRemove('herobig-panel', 'herobig-image', 'herobig-under-info', 'herobig-upload-panel', 'herobig-input', 'preview-herobig-image')
        });
        document.getElementById('herosmall-input').addEventListener('change', function () {
            HeroImageChange('herosmall-input', 'herosmall-image', 'herosmall-panel', 'herosmall-container', 'herosmall-upload-panel', 'herosmall-under-info', 5, 'preview-herosmall-image');
        });
        document.getElementById('remove-herosmall-image').addEventListener('click', function () {
            clickHeroRemove('herosmall-panel', 'herosmall-image', 'herosmall-under-info', 'herosmall-upload-panel', 'herosmall-input', 'preview-herosmall-image')
        });
        document.getElementById('title-input').addEventListener('input', function () {
            if (document.getElementById('title-input').value.trim() !== '') {
                document.getElementById('preview-title').textContent = document.getElementById('title-input').value;
                document.getElementById('preview-card-title').textContent = document.getElementById('title-input').value;
            } else {
                document.getElementById('preview-title').textContent = document.getElementById('title-input').getAttribute('placeholder');
                document.getElementById('preview-card-title').textContent = document.getElementById('title-input').getAttribute('placeholder');
            }
        });
        document.getElementById('description-input').addEventListener('input', function () {
            if (document.getElementById('description-input').value.trim() !== '') {
                document.getElementById('preview-subtitle').textContent = document.getElementById('description-input').value;
                document.getElementById('preview-card-subtitle').textContent = document.getElementById('description-input').value;
            } else {
                document.getElementById('preview-subtitle').textContent = document.getElementById('description-input').getAttribute('placeholder');
                document.getElementById('preview-card-subtitle').textContent = document.getElementById('description-input').getAttribute('placeholder');
            }
        });
        document.getElementById('author-input').addEventListener('input', function () {
            if (document.getElementById('author-input').value.trim() !== '') {
                document.getElementById('preview-author-name').textContent = document.getElementById('author-input').value;
            } else {
                document.getElementById('preview-author-name').textContent = document.getElementById('author-input').getAttribute('placeholder');
            }
        });
        document.getElementById('date-input').addEventListener('change', function () {
            let selectedDate = document.getElementById('date-input').value;
            let formattedDate = formatDate(selectedDate);
            document.getElementById('preview-date').textContent = formattedDate;
        });
        var resizableInput = document.getElementById('content-input');
        document.getElementById('resize-button').addEventListener('mousedown', Resize);
    </script>
</body>

</html>