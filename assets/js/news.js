const deleteNewsForm = document.querySelector("#delete-news-form");
const imageUpload = document.querySelector("#image_url");
const imagePreview = document.querySelector(".image-preview");
const imagePreviewImage = document.querySelector(".image-preview-img");
const titleInput = document.querySelector("#news_title");
const contentInput = document.querySelector("#news_content");
const titleError = document.querySelector("#title-error");
const contentError = document.querySelector("#content-error");
const newsSubmitButton = document.querySelector("#news-submit-btn");
const imageError = document.querySelector("#image-error");
const editNewsId = document.querySelector("#edit-news-id");

imageUpload.addEventListener("change", function () {
  const file = this.files[0];

  if (file) {
    const reader = new FileReader();

    imagePreview.querySelectorAll(".news-img").forEach((img) => img.remove());

    reader.addEventListener("load", function () {
      imagePreviewImage.src = reader.result;
    });

    reader.readAsDataURL(file);
  }
});

function deleteNews(element) {
  deleteNewsForm.classList.toggle("active");
  const titleConfirm = deleteNewsForm.querySelector(".title-confirm");
  const id = element.getAttribute("data-id");
  const title = element.getAttribute("data-title");
  titleConfirm.textContent = title;

  deleteNewsForm.querySelector('input[name="delete-news-id"]').value = id;
}

const handleTitleValidation = () => {
  if (titleInput.value.length === 0) {
    titleError.textContent = "";
    return false;
  } else if (titleInput.value.length < 5) {
    titleError.textContent = "De titel moet minstens 5 karakters lang zijn.";
    return false;
  } else {
    titleError.textContent = "";
    return true;
  }
};

const handleContentValidation = () => {
  if (contentInput.value.length === 0) {
    contentError.textContent = "";
    return false;
  } else if (contentInput.value.length < 10) {
    contentError.textContent =
      "Het nieuwsbericht moet minstens 10 karakters lang zijn.";
    return false;
  } else {
    contentError.textContent = "";
    return true;
  }
};

const handleImageValidation = () => {
  if (imageUpload.value.length === 0) {
    imageError.textContent = "";
    return false;
  } else {
    imageError.textContent = "";
    return true;
  }
};

titleInput.addEventListener("input", () => {
  [handleTitleValidation(), validateForm()];
});
contentInput.addEventListener("input", () => {
  [handleContentValidation(), validateForm()];
});
imageUpload.addEventListener("change", () => {
  [handleImageValidation(), validateForm()];
});

function validateForm() {
  if (handleTitleValidation() && handleContentValidation() && handleImageValidation()) {
    newsSubmitButton.disabled = false;
  } else {
    newsSubmitButton.disabled = true;
  }
}

function editNews(element) {
  const row = element.closest("tr");
  const newsContent = row.querySelector(".news-content");
  const newsTitle = row.querySelector(".news-title");

  const editContentInput = document.createElement("textarea");
  editContentInput.innerText = newsContent.textContent;
  editContentInput.name = "news-content";
  editContentInput.setAttribute("form", "edit-news-form");

  const editTitleInput = document.createElement("input");
  editTitleInput.value = newsTitle.textContent;
  editTitleInput.name = "news-title";
  editTitleInput.setAttribute("form", "edit-news-form");

  const saveEditButton = document.createElement("input");
  saveEditButton.type = "submit";
  saveEditButton.value = "Opslaan";
  saveEditButton.name = "edit-news-submit";
  saveEditButton.setAttribute("form", "edit-news-form");

  editNewsId.value = element.getAttribute("data-id");

  element.replaceWith(saveEditButton);
  newsContent.replaceWith(editContentInput);
  newsTitle.replaceWith(editTitleInput);
}