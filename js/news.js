const apiKey = '863c086806f4402e9aaf9d727698d41c';
const apiUrl = `https://newsapi.org/v2/top-headlines?q=health&category=health&language=en&apiKey=${apiKey}`;

const MIN_DESCRIPTION_LENGTH = 50;

fetch(apiUrl)
  .then(response => response.json())
  .then(data => {
    const articles = data.articles;
    const articleContainer = document.getElementById('article-container');

    for (let i = 0; i < articles.length; i += 4) {
      const row = document.createElement('div');
      row.classList.add('article-row');

      for (let j = i; j < i + 4 && j < articles.length; j++) {
        const article = articles[j];
        const articleElement = document.createElement('div');
        const truncatedDescription = article.description && article.description.length > MIN_DESCRIPTION_LENGTH
        ? `${article.description.substring(0, MIN_DESCRIPTION_LENGTH)}...`
        : article.description;


        const articleImage = document.createElement('img');
        articleImage.classList.add('articleImg');
        articleImage.src = article.urlToImage;
        articleImage.alt = article.title;

        articleElement.innerHTML = `
          <h3>${article.title}</h3>
          <p>${truncatedDescription}</p>
        `;
        articleElement.onclick = function() {
          window.open(article.url, '_blank');
        };
        articleElement.classList.add('articleDiv');
        articleElement.prepend(articleImage); // Insert the image as the first child

        row.appendChild(articleElement);
      }

      articleContainer.appendChild(row);
    }
  })
  .catch(error => {
    console.log('Error:', error);
});
