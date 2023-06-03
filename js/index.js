var currentURL = window.location.href;
var quotes = [
  "Exercise is labor without weariness.",
  "The only person you are destined to become is the person you decide to be.",
  "Once you learn to quit, it becomes a habit.",
  "A year from now you may wish you had started today",
  "Our growing softness, our increasing lack of physical fitness, is a menace to our security.",
  "The human body is the best picture of the human soul.",
  "Exercise is king. Nutrition is queen. Put them together and you’ve got a kingdom"

];

// Function to get a random quote from the array
function getRandomQuote() {
  var randomIndex = Math.floor(Math.random() * quotes.length);
  return `<i>${quotes[randomIndex]}</i>`;
}

// Function to replace the content of the element with a random quote
function replaceRandomQuote() {
  var quoteElement = document.getElementById("random-quote");
  quoteElement.innerHTML = getRandomQuote();
}

