// Create a new Date object
var currentDate = new Date();
  

// Define the month names
var monthNames = [
  "January", "February", "March", "April",
  "May", "June", "July", "August",
  "September", "October", "November", "December"
];

// Define the day names
var dayNames = [
  "Sunday", "Monday", "Tuesday", "Wednesday",
  "Thursday", "Friday", "Saturday"
];

// Get the day, month, and year from the Date object
var day = currentDate.getDate();
var month = monthNames[currentDate.getMonth()];
var year = currentDate.getFullYear();

// Get the day of the week from the Date object
var dayOfWeek = dayNames[currentDate.getDay()];

// Format the date string
var formattedDate = day + " " + month + " " + year + ", " + dayOfWeek;
document.getElementById('date').innerHTML = formattedDate;
console.log(formattedDate);