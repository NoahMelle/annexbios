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
const editImageInput = document.querySelector("#edit-image-url");

// File preview logic for creation form
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

// Title validation function
const handleTitleValidation = (titleElement, errorElement) => {
  if (titleElement.value.length === 0) {
    errorElement.textContent = "";
    return false;
  } else if (titleElement.value.length < 5) {
    errorElement.textContent = "De titel moet minstens 5 karakters lang zijn.";
    return false;
  } else if (titleElement.value.length > 255) {
    errorElement.textContent = "De titel is te lang (max. 255 karakters).";
    return false;
  } else {
    errorElement.textContent = "";
    return true;
  }
};

// Content validation function
const handleContentValidation = (contentElement, errorElement) => {
  if (contentElement.value.length === 0) {
    errorElement.textContent = "";
    return false;
  } else if (contentElement.value.length < 10) {
    errorElement.textContent =
      "Het nieuwsbericht moet minstens 10 karakters lang zijn.";
    console.log(errorElement.textContent);

    return false;
  } else if (contentElement.value.length > 4096) {
    errorElement.textContent =
      "Het nieuwsbericht is te lang (max. 4096 karakters).";
    return false;
  } else {
    errorElement.textContent = "";
    return true;
  }
};

// Image validation function
const handleImageValidation = (imageInputElement, errorElement) => {
  if (imageInputElement.value.length === 0) {
    errorElement.textContent = "";
    return false;
  } else {
    errorElement.textContent = "";
    return true;
  }
};

// Form validation
function validateForm(
  titleInput,
  contentInput,
  imageUpload,
  titleError,
  contentError,
  imageError,
  submitButton,
  validateImage = true
) {
  const isTitleValid = handleTitleValidation(titleInput, titleError);
  const isContentValid = handleContentValidation(contentInput, contentError);
  const isImageValid = validateImage
    ? handleImageValidation(imageUpload, imageError)
    : true;

  if (isTitleValid && isContentValid && isImageValid) {
    submitButton.disabled = false;
  } else {
    submitButton.disabled = true;
  }
}

// Delete news function
function deleteNews(element) {
  deleteNewsForm.classList.toggle("active");
  const titleConfirm = deleteNewsForm.querySelector(".title-confirm");
  const id = element.getAttribute("data-id");
  const title = element.getAttribute("data-title");
  titleConfirm.textContent = title;

  deleteNewsForm.querySelector('input[name="delete-news-id"]').value = id;
}

// Attach validation to creation form
titleInput.addEventListener("input", () => {
  validateForm(
    titleInput,
    contentInput,
    imageUpload,
    titleError,
    contentError,
    imageError,
    newsSubmitButton
  );
});
contentInput.addEventListener("input", () => {
  validateForm(
    titleInput,
    contentInput,
    imageUpload,
    titleError,
    contentError,
    imageError,
    newsSubmitButton
  );
});
imageUpload.addEventListener("change", () => {
  validateForm(
    titleInput,
    contentInput,
    imageUpload,
    titleError,
    contentError,
    imageError,
    newsSubmitButton
  );
});

// Edit news function
function editNews(element) {
  const row = element.closest("tr");
  const newsContent = row.querySelector(".news-content");
  const newsTitle = row.querySelector(".news-title");
  const newsImage = row.querySelector(".news-image");

  const editContentInput = document.createElement("textarea");
  editContentInput.innerText = newsContent.textContent;
  editContentInput.name = "edit-news-content";
  editContentInput.setAttribute("form", "edit-news-form");

  const editTitleInput = document.createElement("input");
  editTitleInput.value = newsTitle.textContent;
  editTitleInput.name = "edit-news-title";
  editTitleInput.setAttribute("form", "edit-news-form");
  editTitleInput.classList.add("edit-news-title");

  const saveEditButton = document.createElement("input");
  saveEditButton.type = "submit";
  saveEditButton.value = "Opslaan";
  saveEditButton.name = "edit-news-submit";
  saveEditButton.setAttribute("form", "edit-news-form");

  const editImageInputLabel = document.createElement("label");
  editImageInputLabel.htmlFor = "edit-image-url";
  editImageInputLabel.classList.add("edit-news-image-preview");
  editImageInputLabel.title = "Klik om afbeelding te wijzigen";

  const editImageInputLabelImage = document.createElement("img");
  editImageInputLabelImage.src = newsImage.src;

  editImageInputLabel.appendChild(editImageInputLabelImage);
  editNewsId.value = element.getAttribute("data-id");

  newsImage.replaceWith(editImageInputLabel);
  element.replaceWith(saveEditButton);
  newsContent.replaceWith(editContentInput);
  newsTitle.replaceWith(editTitleInput);

  editContentInput.focus();

  editImageInput.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();
      reader.addEventListener("load", function () {
        editImageInputLabelImage.src = reader.result;
      });
      reader.readAsDataURL(file);
    }
  });

  // Attach validation for the edit form
  const editSubmitButton = saveEditButton;
  const editTitleError = document.createElement("p");
  const editContentError = document.createElement("p");
  const editImageError = document.createElement("p");

  [editTitleError, editContentError, editImageError].forEach((error) => {
    error.classList.add("error");
  });

  editTitleInput.insertAdjacentElement("afterend", editTitleError);
  editContentInput.insertAdjacentElement("afterend", editContentError);
  editImageInputLabel.insertAdjacentElement("afterend", editImageError);

  function validateEditForm() {
    validateForm(
      editTitleInput,
      editContentInput,
      editImageInput,
      editTitleError,
      editContentError,
      editImageError,
      editSubmitButton,
      false
    );
  }

  editTitleInput.addEventListener("input", validateEditForm);
  editContentInput.addEventListener("input", validateEditForm);
  editImageInput.addEventListener("change", validateEditForm);
}
