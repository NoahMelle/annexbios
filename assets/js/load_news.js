const apiToken =
  "1a9d5b3f8c2e7d4a5b8e9f1c6d7a8b9c0e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t";
const newsItems = document.querySelectorAll(".news-item:not(.template)");
const newsItemsContainer = document.querySelector(".news");

async function loadNews() {
  const dummyDataEndpoint = "./api/v1/getnews";

  try {
    const response = await fetch(dummyDataEndpoint, {
      method: "GET",
      headers: {
        Authorization: `Bearer ${apiToken}`,
        "Content-Type": "application/json",
      },
    });
    if (!response.ok) {
      throw new Error(`Failed to fetch data: ${response.statusText}`);
    }

    const news = await response.json();

    news.forEach((element, i) => {
      const { title, image, content } = element;
      const date = new Date(element.date);

      const newsElement =
        i < newsItems.length ? newsItems[i] : newsItems[0].cloneNode(true);
      if (i >= newsItems.length) {
        newsItemsContainer.appendChild(newsElement);
      }
      const newsTitle = newsElement.querySelector(".news-title");
      const newsImageContainer = newsElement.querySelector(".news-image");
      const newsDescription = newsElement.querySelector(".news-description");
      const newsDate = newsElement.querySelector(".news-date");

      // Set movie details
      newsTitle.textContent = title;
      newsDescription.textContent = content;
      newsDate.textContent =
        "Gepubliceerd: " +
        `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;

      // Update the image only if necessary
      if (!newsImageContainer.querySelector(".news-img")) {
        const newsImageElement = document.createElement("img");
        newsImageElement.src = "./assets/img/news/" + image;
        newsImageElement.alt = `Image for ${title}`;
        newsImageElement.classList.add("news-img");
        newsImageContainer.appendChild(newsImageElement);
      }

      // Remove skeleton loaders
      newsElement.classList.remove("skeleton");
    });
  } catch (error) {
    console.error("Error loading recommended movies:", error);
  }

  const excessElements = newsItemsContainer.querySelectorAll(
    ".news-item.skeleton:not(.template)"
  );
  excessElements.forEach((element) => {
    element.style.display = "none";
  });
}

// Simulate loading with a delay
setTimeout(loadNews, 2000);
