const deleteNewsForm = document.querySelector("#delete-news-form");

function deleteNews(element) {
  deleteNewsForm.classList.toggle("active");
  const titleConfirm = deleteNewsForm.querySelector(".title-confirm");
  const id = element.getAttribute("data-id");
  const title = element.getAttribute("data-title");
  titleConfirm.textContent = title;

  deleteNewsForm.querySelector('input[name="delete-news-id"]').value = id;
}
